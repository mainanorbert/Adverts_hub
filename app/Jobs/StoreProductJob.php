<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $device;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($device)
    {
        $this->device=$device;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
$product=$this->device['product'];
        $product->update([
            'name' =>$this->device['name'],
            'brand' => $this->device['brand'],
            'description' => $this->device['description'],
            'price' => $this->device['price'],
            'trending' =>$this->device['trending'],
        ]);

    }
}
