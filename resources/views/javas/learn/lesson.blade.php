@extends('layouts.master')

@section('content')
    <div class="my-container flex justify-center m-10">
        <div class="mydiv bg-green-200">
            <div id="main-title" class="title text-xl" style="">Learn Java</div>
            
            <ul class="ul">
                <li class="my-list">list1</li>
                <li class="my-list">list2</li>
                <li class="my-list">list3</li>
                <li class="my-list">list4</li>
            </ul>
        </div>



    </div>

    <script src="{{ asset('js/mydom.js') }}" type="text/javascript">
    
    </script>
@endsection
