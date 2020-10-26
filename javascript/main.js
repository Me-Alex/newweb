
var Buton = document.getElementById("make-active");

var ancora = Buton.getElementsByClassName("inactiv");


for (var i = 0; i < ancora.length; i++) {
  ancora[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    var last = document.getElementsByClassName("active");
  });
}
function uploadImage() {
  var button = $('.images .pic')
  var uploader = $('<input type="file" accept="image/*" />')
  var images = $('.images')

  button.on('click', function () {
    uploader.click()
  })

  uploader.on('change', function () {
    var reader = new FileReader()
    reader.onload = function (event) {
      images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="' + event.target.result + '"><span>remove</span></div>')
    }
    reader.readAsDataURL(uploader[0].files[0])

  })

  images.on('click', '.img', function () {
    $(this).remove()
  })

}