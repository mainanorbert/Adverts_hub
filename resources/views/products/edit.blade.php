@extends('layouts..master')
@section('title','Edit Product')
@section('content')

@if (session('message'))

<div class="text-center text-red-300">{{session('message')}}</div>
    
@endif

<div class="container flex justify-center mx-auto">
   
    
<form class="flex mt-10 pt-8 h-full justify-center md:w-6/12 mb-3 pb-4 border" action="{{route('update',$product)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="bottom-2 w-full md:w-11/12 h-full pb-8 ">
            <p class="text-center mt-4 text-2xl text-neutral-200 font-bold">Edit this Product</p>
    
           @include('forms.create')

           {{-- @can('update', $product) --}}

           <div class="w-full flex justify-center">
            <button id="mybtn" class="w-10/12 bg-green-500 text-xl rounded text-neutral-300 font-bold h-8">Update</button>

           </div>
            
               
           {{-- @endcan --}}
   
           
        </div>

        <script>
            var btn=document.getElementById("mybtn");
            btn.addEventListener('click',function(event){
                setTimeout(function(){
                    event.target.disabled=true;
                    event.target.textContent="Editing...";
                },2)

            });
          </script>
        
    </form>
</div>
<div class="container flex justify-center text-green-400 text-xs mx-auto"><p>Delete Your Images and Replace</p></div>
<div class="container flex justify-center mx-auto">
  
    
@foreach ($files as $file)


    <form class=" mb-4 grid grid-cols-2 gap-2 place-items-center relative w-6/12" action="/images/{{$file->id}}/delete" method="POST">
        @csrf
        @method('DELETE')
        <div>
            <img class="w-20" src="{{asset('storage/images/'.$file->file_name)}}" alt="">
        <button id="mybtn" class="flex items-center absolute bottom-0 md:h-8" title="Delete This Image">
            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
          </svg>
          </button>
        </div>
          
    </form>
    
@endforeach

</div>
@endsection