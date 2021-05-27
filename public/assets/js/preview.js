var input = document.querySelector('#file-input');
input.addEventListener('change',preview);
function preview(){
    var fileObject=this.files[0];
    var fileReader = new FileReader();
    fileReader.readAsDataURL(fileObject);
    fileReader.onload =function(){
        var result = fileReader.result;
        var img =document.querySelector('#preview');
        img.setAttribute('src',result);
    }
}

 
$(document).ready(function () {
    $(this).addClass('active').siblings().removeClass('active');
});