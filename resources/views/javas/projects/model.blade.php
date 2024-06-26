@extends('layouts.master')

@section('content')
  <div class="m-10 w-full grid place-items-center bg-green-400  rounded-xl">
   <div class="w-6/12 bg-green-600 grid place-items-center p-4 h-screen" style="background-image: url('data:image/jpeg;base64,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')">
    <button id="open-btn" class=" rounded bg-transparent border p-2 text-neutral-200 font-bold text-xl">
        <p>Where is our modal</p>
    </button>
    <div id="modal-container"  style="display: none" class="absolute right-[32rem] top-[20rem]">
        <div id="modal" class="flex justify-around gap-8 hover:bg-green-400 hover:text-white rounded mt-2 p-1" style="animation-name: animatemodal " style="animation-duration: .10ms">
            <P class="text-xl text-gray-100">Hey am there</P>
            <div id="close-btn" class="text-gray-100 text-2xl cursor-pointer ">&times;</div>
        </div>
    </div>
  </div>
   </div>

   <script>
    let openBtn=document.getElementById('open-btn');
    let modelContainer=document.getElementById('modal-container');
    let closeBtn=document.getElementById('close-btn');

    openBtn.addEventListener('click', function(){
        modelContainer.style.display='block';

    });
    closeBtn.addEventListener('click',function(){
        modelContainer.style.display='none';
    });

    window.addEventListener('click', function(e){
        if(e.target===modelContainer){
            modelContainer.style.display='none';
        }
    });
   </script>
@endsection
