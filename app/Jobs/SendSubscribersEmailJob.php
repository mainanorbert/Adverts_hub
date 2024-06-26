<?php

namespace App\Jobs;

use App\Mail\SubscribersEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscribersEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

 

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $emails = $this->data['emails'];
        $message = $this->data['message'];
        foreach($emails as $email){
            Mail::to($email->email)
            ->send(new SubscribersEmail($message));
        }
        
    }
}
