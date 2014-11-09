/* This script is in debug state is not used right now */
$(document).ready(function() {
	var img = $('img.kenBlockHelm2');
	for(i=0; i<img.length; i++) {
		$img = $(img[i]);
		$img.on('load', function() {
			console.log($(this).css('opacity'));
		});
	}
		//var h = $this.height();
		//alert(h);
		//$($img[i]).css('margin-top', + h / -2 + "px"); //margin-top should be negative half of image height. This will center the image vertically when combined with position:absolute and top:50%.

});
