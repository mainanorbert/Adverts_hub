<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscribe;
use App\Mail\SubscribersEmail;

class SendSubscriberEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

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
        $emailData=[
            'message'=>'CentSysss Solutions offers you digital security equipments at affordable price.
            We offer free installation and maintenance services of our systems:',
            'url'=>'www.CentSys.com',
            'contacts'=>'Contact us on: 0799535642, our email :centsys.info@gmail.com'
        ];
        $subscribes=Subscribe::latest()->limit(10)->get();


        
        foreach($subscribes as $subscribe){
            Mail::to($subscribe->email)->later(now()->addSeconds(3),new SubscribersEmail($emailData));
        }
        return Command::SUCCESS;
        
    }
}
