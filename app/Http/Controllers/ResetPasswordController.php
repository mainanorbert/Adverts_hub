<?php

namespace App\Http\Controllers;

use App\Mail\SendResetPasswordCodeMail;
use App\Models\Code;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Testing\Fluent\Concerns\Has;

class ResetPasswordController extends Controller
{
    
    public function reset(){

        return view('reset.reset');

    }

    public function myreset(Request $request){
    
        $myreset = $request -> validate([
            'email'=>'required|email',
           
        ]);

        $user = User::where('email', $request->email)->first();

       
        if($user){
        $mycode = Code::where('code', $user->code->code)->first();


            $newCode=rand(1111, 8888);
            $mycode->code = $newCode;
            $mycode->save();




            Mail::to($user)->later(now(), new SendResetPasswordCodeMail($newCode));
            
            

           
            return to_route('password.change',$user)->with('message','Check your email for reset code');

        }
        else{
            return redirect()->back()->with('message', $request->email . ' was not found in database');
        }
        
    }

    public function index($id){

        $user = User::find($id);


        return view('reset.changepass',compact('user'));


    }

    function passReset(Request $request){
        
        $request->validate([

            'code'=>'required',
            'password'=>'required|confirmed'

        ]);

        $code = Code::where('code', $request->code)->first();

        if($code){
            $user = User::where('id', $code->user_id)->first();
            $mypassword=Hash::make($request->password);
            $user->password = $mypassword;
            $user->save();

            return to_route('login')->with('message',"Password was Changed Successfully");

        }

        return back()->with('message','Code entere is incorrect');
        

        

        
        
        
       

        return to_route('login')->with('message', 'Password was successfully changed');



    }
    //
}

// {{-- mysql://bff59d0e74622d:efe9639f@eu-cdbr-west-03.cleardb.net/heroku_7cf4b986be7c4cd?reconnect=true --}}
// {{-- 3cc9f423-18f5-4d47-a2b4-eca81f86c5e8 --}}