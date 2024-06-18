function countMyFiles(){
    var x=document.getElementById('myfiles')
    x.addEventListener('change',function(){
        var len=this.files.length;
        var z=document.getElementById('num_of_file');

        z.textContent="("+len+ " Profile Photo selected)"
    })
}
countMyFiles();