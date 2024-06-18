const myaccord = document.getElementsByClassName("accordion")


for (i = 0; i < myaccord.length; i++) {

    myaccord[i].addEventListener('click', function () {
        
        console.log(this.classList.toggle('active'));
    })
}