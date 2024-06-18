<?php

namespace App\Console\Commands;

use App\Mail\CartUpdatesMail;
use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class CartUpdatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the User Before Cart is emptied';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach($users as $user){
            $carts = Cart::where('user_id', $user->id)->latest()->limit(1)->get();
           if($carts!=null){

            foreach($carts as $cart){
                    $expiry_date = Carbon::parse($cart->time_expiry);
                    $time_now = Carbon::parse(now());
                    $rem_time = $expiry_date->diffInHours($time_now);


                    Mail::to($user)->send(new CartUpdatesMail($rem_time));
                    
            }

           }

        }
    

    


        return Command::SUCCESS;
    }
}