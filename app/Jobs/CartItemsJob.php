<?php

namespace App\Jobs;

use App\Mail\CartItemsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CartItemsJob implements ShouldQueue
{
    
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $items;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($items)
    {

        $this->items=$items;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail=new CartItemsMail($this->items);
        // dd($this->items);
        Mail::to($this->items['email'])->send($mail);
        //
    }
}
