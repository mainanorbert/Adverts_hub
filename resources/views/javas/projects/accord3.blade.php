@extends('layouts.master')

@section('content')
    <div class=" flex justify-center m-10">
        <div class="w-6/12">
            <div class="accordion cursor-pointer text-neutral-200 font-bold rounded">What is laravel?
            </div>

            <div class="answer text-neutral-300 hidden peer-block">The simplest and fastest way to get up and running with
                <p> Tailwind CSS
                    from scratch is with
                    the Tailwind CLI tool. The CLI is also available as
                    a standalone executable if you want to use it without installing Node.js.</p>
            </div>

            <div class="accordion cursor-pointer text-neutral-200 font-bold">What is laravel?
            </div>

            <div class="answer text-neutral-300" >The simplest and fastest way to get up and running with
                <p> Tailwind CSS
                    from scratch is with
                    the Tailwind CLI tool. The CLI is also available as
                    a standalone executable if you want to use it without installing Node.js.</p>
            </div>
            <div class="accordion cursor-pointer text-neutral-200 font-bold">What is laravel?
            </div>

            <div class="answer text-neutral-300">The simplest and fastest way to get up and running with
                <p> Tailwind CSS
                    from scratch is with
                    the Tailwind CLI tool. The CLI is also available as
                    a standalone executable if you want to use it without installing Node.js.</p>
            </div>

        </div>



    </div>

    <script src="{{asset('js/accord3.js')}}" type="text/javascript">

console.log(myaccord);
// console.log(myaccord.length)
     
    </script>
@endsection
