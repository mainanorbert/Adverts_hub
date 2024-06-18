// var btn = document.getElementById('mybtn2');
// btn.addEventListener('click', function(event) {
//     setTimeout(function() {

//         event.target.disabled = true;
//         event.target.textContent = "Adding...";

//     }, 2);
// })

function countFiles(){
    var myFiles=document.getElementById('myfile')

    myFiles.addEventListener('change',function(){
        var len=this.files.length;

        var noOfFiles=document.getElementById('no_of_files')
        noOfFiles.textContent="("+len+" Files selected)";
    })
}

countFiles();



