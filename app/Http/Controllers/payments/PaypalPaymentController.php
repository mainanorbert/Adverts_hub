<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Device;
use Illuminate\Http\Request;

class PaypalPaymentController extends Controller
{
    public function index(Cart $cart, Device $product)
    {
        $carts = Cart::join('devices', 'devices.id', 'carts.device_id')->where('carts.user_id', auth()->user()->id)
            ->selectRaw('carts.item_count*devices.price')->get();
        $mysum = 0;
        foreach ($carts as $sum => $val) {
            foreach ($val->toArray() as $sums => $vals) {
                $mysum += $vals;
            }
        }

        return view('payments.paypal', compact('mysum'));
    }
//
}