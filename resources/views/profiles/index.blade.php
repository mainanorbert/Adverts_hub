@extends('layouts.master')

@section('content')

<div class="m-10">

    <div class="flex items-center justify-center md:w-10/12 m-4">

  

        @if (auth()->user()->profile==null)
        <div class="grow grid place-content-center items-center text-center w-10/12 mr-20 ">
            <p class="text-4xl text-gray-400">Oops!!! Your profile is not updated!!</p>
            <div class="flex justify-center text-center items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-24 h-24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
            </div>
            <a class="flex gap-4 justify-center items-center hover:bg-gray-500 rounded-full" href="{{route('profiles.create')}}"><p class="text-xl uppercase text-blue-800">Update now</p> <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
              </svg>
              </span></a>
        </div>
            
        @else

       <div class="grid relative place-items-center mt-4 md:m-10 md:w-6/12 w-full border pb-10 bg-slate-600">
        <a title="Edit profile" class="flex top-0 right-0 absolute text-neutral-300" href="{{route('profiles.create')}}"> <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
          </svg>
          </span></a>
        <div class="md:text-2xl"> <span >{{auth()->user()->profile->name}}</span><span>'s Profile</span> </div>
        <div class="mt-8 mb-4">  <img class="w-32 rounded-full" src="{{asset('storage/profiles/'.auth()->user()->profile->photo)}}" alt=""></div>
        <div class=" rounded p-2 text-xl">Current Location: <span class="text-2xl my-2">{{auth()->user()->profile->location}}</span></div>
        <div class="b w-full text-center">
            <p class="underline md:text-2xl"> Contact Information</p>
            <p>Primary Phone: {{auth()->user()->profile->phone}}</p>
            <p>Phone 2(Optional): {{auth()->user()->profile->phone2}}</p>
            <p>Email Addres:{{auth()->user()->email}}</p>

          <div class="bg-red-400 relative">
            <form action="{{route('profile-destroy.delete',auth()->user()->profile)}}" method="POST">
              @csrf
              @method('DELETE')

              <button id="mybutton" title="Delete Your Profile" class="absolute right-0  text-neutral-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
              </svg>
            </button>
            </form>
            <script>
              var mybtn=document.getElementById('mybutton');

              mybtn.addEventListener('click',function(event){

                setTimeout(function(){
                  event.target.disabled=true;
                  event.target.textContent='Deleting..';

                },0)
              })
            </script>
          </div>

        </div>
  

       </div>
            
        @endif

        

        

     
   

    </div>
    
</div>
    
@endsection