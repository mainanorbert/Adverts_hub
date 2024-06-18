<?php

namespace App\Http\Controllers;

use App\Jobs\SendSubscribersEmailJob;
use App\Mail\SubscribersEmail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailSubscriptionController extends Controller
{
    public function index(Request $request){
        

        

        $request->validate([
            'email'=>'required|email|unique:subscribes'
        ]);

        Subscribe::create([
            'email'=>$request->email
        ]);

        // $mailData = ['message'=>"welcome to CentSys Products"];


        // $users = Subscribe::latest()->limit(4)->get();

        // foreach($users as $user){
         
            
        //     Mail::to($user)->later(now()->addMicroseconds(),new SubscribersEmail($mailData));
        // }

       

        return back()->with('message', 'You will receive via email: '.$request->email);



        


    }
       


    //
}
