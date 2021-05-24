/*var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
});
*/
$('li').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
});

var input = document.querySelector('#file-input');
input.addEventListener('change', preview);
function preview() {
    var fileObject = this.files[0];
    var fileReader = new FileReader();
    fileReader.readAsDataURL(fileObject);
    fileReader.onload = function () {
        var result = fileReader.result;
        var img = document.querySelector('#preview');
        img.setAttribute('src', result);
    }
}

function model() {
$('#loginModel').on('submit', function(){
    $('#modal').on('hide.bs.modal', function(e){
        e.preventDefault();
    })
})
}