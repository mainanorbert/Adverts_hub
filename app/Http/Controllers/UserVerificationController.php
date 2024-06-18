<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailVerificationCodeMail;
use App\Models\Code;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserVerificationController extends Controller
{

    function index($id)
    {

        $myuser = User::find($id);


        // $mydata = Code::all();
        return view('verifications.verify', compact('myuser'));
    }

    function store(Request $request, User $user)
    {


        // dd('ee');



        $data = $request->validate([
            'code' => 'required'

        ]);

        $mycode = Code::where('user_id', $request->id)->first();
        $user = User::where('id', $request->id)->first();

        if ($user->email_verified_at) {
            return to_route('login')->with('message', $user->email . ", has been verified! Login");
        }


        if ($request->code === $mycode->code) {
            // dd($request->code===$mycode->code);
            // dd($user->id);

            $user->email_verified_at = now();

            $user->save();
            return to_route('login')->with('message', 'Email verified ');
        } else {
            return back()->with('message', 'You entered incorrect Code');
        }




    }
    function resend(Request $request)
    {


        //  dd($request->id);
        $user = User::find($request->id);
        $email = $user->email;

        $code = Code::where('user_id', $request->id)->first();
        $mycode=rand(1118,8888);
        if ($code == NULL)
        {
            Code::create([
                'code'=>$mycode,
                'user_id'=>$request->id
            ]);    
            Mail::to($email)->later(now(), new SendEmailVerificationCodeMail($mycode));
            return to_route('email.verify', $request->id)->with('message', 'Code sent to ' . $email);
        }
        if ($code != NULL) {
            $code->code = $mycode;
            $code->save();

        }
        // Mail::to($request->email)->later(now(), new SendEmailVerificationCodeMail($code));
        Mail::to($email)->later(now(), new SendEmailVerificationCodeMail($mycode));

        return to_route('email.verify', $request->id)->with('message', 'Code sent to ' . $email);



    }
    //
}