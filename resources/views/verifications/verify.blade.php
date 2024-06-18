@extends('layouts.master')

@section('content')
@if (session('message'))

<div class="flex justify-center">
    <div class="text-green-600 bg-green-400 w-6/12 h-8 mt-2 rounded text-center">{{session('message')}}</div>
</div>
    
@endif
    <div class="p-10 text-green-400 flex justify-center">
<div class="w-7/12 p-2 text-2xl">Use Email Verification Code sent to your email to verify before log in
        <form method="POST" class="mt-3 w-full" action="{{route('email.verified',$myuser)}}"  >
           @csrf
            <div>
                <label class="text-green-300 font-bold" for="">Enter Code</label> <br>
            <input class="h-10 bg-transparent border w-8/12 rounded pl-4" type="text" name="code" placeholder="Enter Code.." id=""> <br>
            </div>

            <div class="flex justify-between font-semibold ">
            <button class="text-center w-4/12 rounded mt-3 p-2 bg-green-800">Verify</button>

            </div>
        </form>

<form action="{{route('route.resend',$myuser->id)}}" method="POST">
    @csrf
    <button class="right-20 underline hover:text-white top-6">Resend</button>

</form>
    </div>



    </div>
@endsection
