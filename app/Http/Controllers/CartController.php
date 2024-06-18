<?php

namespace App\Http\Controllers;

use App\Jobs\CartItemsJob;
use App\Mail\CartUpdatesMail;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function cart(Device $product)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('device_id', $product->id)->first();
        if ($cart) {
            $itemCount = $cart->item_count;
            $itemCount += 1;
            $cart->update([
                'item_count' => $itemCount,
                'time' => now()->addDays(2)
            ]);
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'device_id' => $product->id,
                'item_count' => 1,
                'time' => now()->addDays(2),
            ]);

        }
        $mycarts = Cart::where('user_id', auth()->user()->id)->first()->get();

        if ($mycarts) {
            foreach ($mycarts as $mycart) {
                $dueDate = Carbon::parse($mycart->time);
                $timeNow = Carbon::parse(now());
                if ($dueDate->isPast()) {
                    // $t_rem = "expired";
                    $mycart->delete();
                } else {
                    $t_rem = $dueDate->diffInHours($timeNow);
                    $mycart->Update([
                        'time_expiry' => $t_rem
                    ]);
                }
            }

        }



        return to_route('products');
    }
    public function index(Device $product, Cart $carts)
    {
        $sum = Cart::join('devices', 'carts.device_id', '=', 'devices.id')->where('carts.user_id', auth()->user()->id)
            ->selectRaw('carts.item_count*devices.price')
            ->get();
        $mysum = 0;
        foreach ($sum as $arr => $val) {
            foreach ($val->toArray() as $price => $vals) {
                $mysum += $vals;
            }
        }
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $totals = Cart::where('user_id', auth()->user()->id)->sum('item_count');
        $sum = 0;
        foreach ($carts as $cart) {
            $prices = $cart->product->price;
            $sum += $prices;
        }
        $items = [
            'message' => 'You have selected ' . $totals . ' items at CentSys. Pay Sh.' . $mysum . ' for delivery',
            'email' => auth()->user()->email
        ];

        return view('cartlists.index', compact('carts', 'totals', 'product', 'sum', 'mysum'));
    }

    public function destroy(Cart $cart, User $user)
    {
        // $products=Cart::where('user_id',auth()->user()->id)->first()->get();
        $cart->delete();

        return back()->with('message', 'One item was successfully Removed');
    }

    public function mymail()
    {
        $users = User::all();

        foreach ($users as $user) {
            $carts = Cart::where('user_id', $user->id)->latest()->limit(1)->get();
            if ($carts != null) {

                foreach ($carts as $cart) {
                    $expiry_date = Carbon::parse($cart->time_expiry);
                    $time_now = Carbon::parse(now());
                    $rem_time = $expiry_date->diffInHours($time_now);


                    Mail::to($user)->send(new CartUpdatesMail($rem_time));

                }

            }

        }






    }


}