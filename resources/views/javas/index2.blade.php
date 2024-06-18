@extends('layouts.master')
@section('content')

<div class="m-10">
    <button id="hidden " class="btn bg-green-400 rounded p-1">Show More Content</button>

    <p class="myp">We have described almost all devices that will increase security in your network. Some of them, such as firewalls and antivirus software, are must-have network security devices; others are nice to have. Before implementing any new security device, always perform an IT security risk assessment; it will help you determine whether the investment is worth</p>



    
</div>
    <script>
        const mybtn=document.querySelector('button');
        const myp=document.querySelector('.myp');

        // console.log(myp.classList.add('bold'));

        

        function revealContent(){
            if(myp.classList.contains('hidden')){
                myp.classList.remove('hidden')
            }
            else{
                myp.classList.add('hidden')
            }

        }

        mybtn.addEventListener('click',revealContent)
        
    </script>
@endsection