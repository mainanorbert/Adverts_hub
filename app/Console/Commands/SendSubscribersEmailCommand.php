<?php

namespace App\Console\Commands;

use App\Mail\SubscribersEmail;
use App\Models\Subscribe;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSubscribersEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriber:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends emails to random subscribers after a certain period of time';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mailData = ['message'=>"welcome to CentSys Products",
    ];


        $users = Subscribe::latest()->limit(4)->get();

        foreach($users as $user){
         
            
            Mail::to($user)->send(new SubscribersEmail($mailData));
        }
        return Command::SUCCESS;
    }
}
