<?php

namespace App\Http\Controllers;

use App\Jobs\SendUserEmailJob;
use App\Jobs\UserRegistrationJob;
use App\Mail\ProductsWelcome;
use App\Mail\SendEmailVerificationCodeMail;
use App\Mail\SendEmailToUser;
use App\Mail\UserEmails;
use App\Mail\UserMail;
use App\Models\Code;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Actions\Auths\StoreUserAction;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Device;

use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    function __construct()
    {
        $this->middleware(['guest'])->only('create', 'loguser');
    }
    public function create()
    {
        return view('auth.registration');
    }
    public function store(StoreUserAction $create, StoreUserRequest $request)
    {

       
       $myuser = $create->createUser($request);


        $data=["message"=>"You Registered at CentSys Website, Enjoy viewing and Discovering New Security Equipment, You can order through our contacts, 0799535642",
        'email'=>$request->email
    ];

        // dd($myuser->id);
    

        $code = Code::where('user_id', $myuser->id)->first();
        $code=$code->code;
        



        Mail::to($request->email)->later(now(), new SendEmailVerificationCodeMail($code));

        // $id = $myuser->id;
        // {}

       

    
       

        // SendUserEmailJob::dispatch($data);

        return to_route('email.verify',$myuser)->with('message', 'You Created an Account! Verify to Login');



    }
    public function loguser()
    {
        return view('auth.login');
    }
    public function authenticate()
    {
        // dd(request()->email);
        $users = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $myuser = User::where('email', request()->email)->first();

        if($myuser==null){
            return back()->with('message', request()->email . ' is not registered');
        }
        
        if($myuser && $myuser->email_verified_at!=null){
            if (auth()->attempt($users, request()->remember)) {
                request()->session()->regenerate();
    
               
                return to_route('products')->with('message', 'Welcome, ' . auth()->user()->name);
    
            }
           
            return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');

        }
       
        else{
            return to_route('email.verify',$myuser)->with('message', 'Verify your email first');
        }
        
    }
    public function logout(Request $request)
    {

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $message="You have logged out";

        

        // Mail::to('mainanorbert@gmail.com')->send(new SendEmailToUser($message));

        // Artisan::call('send:email');

        return to_route('products')->with('message', 'You logged out successfully');

    }


    public function sendMail(){
        // dd('d');
        $mydata=Device::where('name','Admin');

     
        $data=[
            'url'=>'centsys.com',
            'message'=>"Your Registered in our Website Follow this link for more"
        ];

        Mail::to(auth()->user()->email)->send(new ProductsWelcome($data));

        // dd('email was sent successfully');

    }
    

   

}