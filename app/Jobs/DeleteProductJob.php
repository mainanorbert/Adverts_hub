<?php

namespace App\Jobs;

use App\Models\Picture;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $image;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->image=$file;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Picture $image)
    {

      $this->image->delete();
      if(Storage::exists('public/images'.$this->image->file_name)){
        Storage::delete('public/images'.$this->image->file_name);
      }
        //
    }
}
