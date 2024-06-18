@extends('layouts.master')

@section('content')
    <div class="accordion grid w-full p-10 place-items-center"
        style="background-image: url({{ asset('images/images.jfif') }})">
        <div class="w-6/12 bg-green-700 px-4">
            <p class="accordion-title text-center text-slate-200 font-bold">Frequently asked Questions</p>
            <div class="bg-transparent">
                <div class="question grid grid-cols-8 text-slate-300 font-semibold border-b">
                    <p class="col-span-6 text-center">What is Laravel</p>
                    <p class="accord cursor-pointer" onclick="myfunc()">+</p>
                    <p class="accord2 hidden cursor-pointer" onclick="myfunc()">-</p>
                </div>
                <div class="answer hidden">The simplest and fastest way to get up and running with Tailwind CSS from scratch
                    is with
                    the Tailwind CLI tool. The CLI is also available as
                    a standalone executable if you want to use it without installing Node.js.</div>

            </div>
            <div class="">
              <div class="content-container">
                <div class="question grid grid-cols-4 text-slate-300 font-semibold border-b">
                    <p class="col-span-3 text-center">What is Laravel</p>
                    <p class="accord cursor-pointer">+</p>
                </div>
                <div class="answer hidden">The simplest and fastest way to get up and running with Tailwind CSS
                    from scratch is with
                    the Tailwind CLI tool. The CLI is also available as
                    a standalone executable if you want to use it without installing Node.js.</div>

              </div>
            </div>
            <div class="content-container">
                <div class="question grid grid-cols-4 text-slate-300 font-semibold border-b">
                    <p class="col-span-3 text-center">What is Laravel</p>
                    <p class="accord cursor-pointer">+</p>
                </div>
                <div class="answer">The simplest and fastest way to get up and running with Tailwind CSS from scratch is
                    with
                    the Tailwind CLI tool. The CLI is also available as
                    a standalone executable if you want to use it without installing Node.js.</div>

            </div>
        </div>
    </div>

    <script>
        const myanswer = document.querySelector('.answer')
        const myaccord = document.querySelector('.accord')
        const myaccord2 = document.querySelector('.accord2')

        function myfunc() {

            if (myanswer.classList.contains('hidden')) {
                myanswer.classList.remove('hidden')
                myaccord.classList.add('hidden')
                myaccord2.classList.remove('hidden')

            } else {
                myanswer.classList.add('hidden');
                myaccord.classList.remove('hidden')
                myaccord2.classList.add('hidden')
            }

        }
    </script>

    <script>
        const myaccordion = document.querySelector('.content-container')
        const myans = document.querySelector('.answer')

        var i = 0;

        for (i = 0; i < myaccordion.length; i++) {
            myaccordion[i].addEventListener('click'function() {

                this.classList.toggle('active');

                var my=this.nextElementSibling

            });
        }
    </script>
@endsection
