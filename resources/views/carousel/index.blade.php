@extends('layouts.master')

@section('content')
    <div class="text-slate-300 m-10">
        <p class="text-center">This is my carousel</p>

  


    <div class="flex justify-center gap-4 bg-slate-400">
        @foreach ($images as $image)
            <img src="{{ asset('storage/images/' . $image->pictures->first()->file_name) }}" alt="">
        @endforeach
    </div>

<div id="carousel" class="mt-8 flex justify-center relative bg-green-500 p-4">
    <img id="image" src="{{ asset('/carousel/guns.jfif') }}" alt="" 
    class="w-6/12 h-[28rem] relative animate-pulse duration-1000 ease-linear">
    <button id="nextBtn" onclick="nextImage()"
     class="absolute transition-transform right-[22rem] top-[12rem] text-blue-800 font-extrabold">Next</button>
    <button id="prevBtn" onclick="prevImage()" class="absolute left-[22rem] top-[12rem] text-blue-800 font-extrabold">Previous</button>
   
</div>

</div>

<script>

let imageIndex = 0;
const images = ["{{asset('carousel/cctv.jfif')}}", "{{asset('carousel/gloves.jfif')}}", "{{asset('carousel/guns.jfif')}}"];
const image = document.getElementById('image');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

// setting the time interval for image automatic change

const interval=5000;
let carouselInterval;

function prevImage() {
    clearInterval(carouselInterval);
    imageIndex--;
    if (imageIndex < 0) {
        imageIndex = images.length - 1;
    }
    image.src = images[imageIndex];
    carouselInterval = setInterval(nextImage, interval);
}

function nextImage() {
    imageIndex++;
    if (imageIndex >= images.length) {
        imageIndex = 0;
    }
    
    image.src = images[imageIndex];

}

// Start the carousel

carouselInterval = setInterval(nextImage, interval);

prevBtn.addEventListener('click', prevImage);
nextBtn.addEventListener('click', nextImage);

// image.addEventListener('load', function(){
//   image.classList.add('opacity-100');
// });

</script>
@endsection
