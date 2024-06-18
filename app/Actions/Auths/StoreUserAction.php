<?php
namespace App\Actions\Auths;

use App\Http\Requests\StoreUserRequest;
use App\Models\Code;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Nette\Utils\Random;

class StoreUserAction{
    public function createUser(StoreUserRequest $request){

       $myuser=User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)

        ]);
            Code::create([
            'code'=>rand(1111,8888),
            'user_id'=>$myuser->id,
        ]);
        return $myuser;        
    }

   
}