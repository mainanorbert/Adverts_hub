const image=document.getElementById('image');
const nextBtn=document.getElementById('nextBtn');
const prevBtn=document.getElementById('prevBtn');

const images = ["{{asset('carousel/cctv.jfif')}}", "{{asset('carousel/gloves.jfif')}}", "{{asset('carousel/guns.jfif')}}"];


let imageIndex=0;
const interval=5000;
let carouselInterval;

function prevImage(){
    clearInterval(carouselInterval)
    imageIndex--;
    if(imageIndex<0){
        imageIndex=images.length-1;
         }
        image.src=images[imageIndex];
        carouselInterval=setInterval(nextImage,interval);

}

function nextImage(){
    imageIndex++;
    if(imageIndex>=images.length){
        imageIndex=0;
    }
    image.src=images[imageIndex];
}

carouselInterval=setInterval(nextImage,interval);

prevBtn.addEventListener('click',prevImage);
nextBtn.addEventListener('click',nextImage);