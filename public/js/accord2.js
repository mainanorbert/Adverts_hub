var acc = document.getElementsByClassName("accordion");

var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("bg-green-700");
        var panel = this.nextElementSibling;
        var mysgn = this.firstElementChild;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            mysgn.innerText = "-";
        } else {
            panel.style.maxHeight = "0";
            mysgn.innerText = "+";

        }
    });
}