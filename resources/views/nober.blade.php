@extends('layouts.master')

@section('content')
<div class="container">
    <div class="relative h-screen bg-red-200">
        <p>static</p>
        <div class="absolute bottom-20 left-20 bg-blue-300">
            <p>absolute child</p>
    
        </div>
    </div>
</div>
@endsection