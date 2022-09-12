
const previewImg = $('.imagem');
const fileChooser = $('.input-file');

fileChooser.onchange = e => {
  const fileToUpload = e.target.files.item(0);
  const reader = new FileReader();
  reader.onload = e => previewImg.src = e.target.result;
  reader.readAsDataURL(fileToUpload);

  console.log('teste')
};


/*mudar password para text*/
(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$(".toggle-password").click(function() {

	  $(this).toggleClass("fa-eye fa-eye-slash");
	  var input = $($(this).attr("toggle"));
	  if (input.attr("type") == "password") {
	    input.attr("type", "text");
	  } else {
	    input.attr("type", "password");
	  }
	});

})(jQuery);

/*preview foto perfil*/
function readImage() {
  if (this.files && this.files[0]) {
      var file = new FileReader();
      file.onload = function(e) {
          document.getElementById("preview").src = e.target.result;
          document.getElementById("preview2").src = e.target.result;
      };       
      file.readAsDataURL(this.files[0]);
  }
}

document.getElementById("img-input").addEventListener("change", readImage, false);