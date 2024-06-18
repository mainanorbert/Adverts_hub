@extends('layouts.master')

@section('content')

<div class="p-10 text-green-400"> You have  <span class="text-red-700 border-b">{{$tm3}} minutes</span> To expiry </div>
<p class="text-red-400">You have {{$tm5}} remaining</p>
    
@endsection