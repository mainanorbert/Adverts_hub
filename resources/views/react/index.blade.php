@extends('layouts.myreact')

@section('content')

<div class="p-[10px]">
    This is my react
    <div id="like_button_container" class=" bg-green-500 rounded"></div>
</div>



<script src="{{asset('js/like_button.js')}}" type="text/babel"></script>
    
@endsection


