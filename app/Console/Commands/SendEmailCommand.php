<?php

namespace App\Console\Commands;

use App\Jobs\CartItemsJob;
use App\Mail\CartItemsMail;
use App\Mail\SendEmailToUser;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
// use App\Mail\CartItemsMail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $users=User::all();

        // foreach($users as $user){

        //     if($user->email=="admin@gmail.com"){
        //         $user->Auth::logout();
        //     }

        // }
        
        $message="You logged out";
  Mail::to(auth()->user()->email)->send(new SendEmailToUser($message));
        return Command::SUCCESS;
    }
}
