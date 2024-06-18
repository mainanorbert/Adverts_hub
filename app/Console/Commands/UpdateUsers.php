<?php

namespace App\Console\Commands;

use App\Mail\UpdateUserMail;
use App\Models\Device;
use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;
use App\Mail\UpdateUsersMail;
use Illuminate\Support\Facades\Mail;

class UpdateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates users on new trendings on Centsys Devices';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products=Device::where('trending',true)->latest()->limit(4)->get();

        // where('trending',true)->latest()->limit(4)->get();
       
        $users=User::all();

        // foreach($users as $user){

        //     $name = $user->name;
            
            
        // }
      

        

        $myData = [
            'message'=>'Hi,  Check on our new products  at CentSys to enhance your security, New trending include',
           
            'products'=>$products,
            'name'=>[]


        ];
foreach($users as $user){
            $name = $user->name;
            $myData['name'] = $name;

    Mail::to($user)->send(new UpdateUserMail($myData));
}

        return Command::SUCCESS;
    }
}