<link href="<?=CSS?>pages/main.css" rel="stylesheet" type="text/css" /> 
<!-- flex slider sources -->
	<!-- including jquery -->
	<script type="text/javascript">
	if(typeof jQuery == 'undefined'){
		document.write('<script type="text/javascript" src="<?=JS?>jquery/jquery.min.js"></'+'script>');
	  }
	</script>

	<link rel="stylesheet" href="<?=TOOLS?>flexSlider/flexslider.css" type="text/css">
	<script src="<?=TOOLS?>flexSlider/jquery.flexslider.js"></script>

	<script type="text/javascript" charset="utf-8">
	  $(window).load(function() {
		$('.flexslider').flexslider();
	  });
	</script>
<!-- END flex slider sources -->

<!-- mousewheelSliding sources -->
	<script src="<?=JS?>jquery/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?=JS?>jquery/jquery.mobile.touch.min.js"></script>
	<script src="<?=JS?>jquery/jquery.mobile.touch.patch.js"></script>
	<script src="<?=TOOLS?>hammer.min.js"></script>
	<script src="<?=JS?>mousewheelSliding.js" type="text/javascript"></script>
<!-- END mousewheelSliding sources -->

<div id="page1">
	<?php
		$model = 'Flynn';
		include 'sunglassesImagesByModelSlider.php';
	?>
</div> <!-- end page1 -->

<div id="page2">
	<?php
		$model = 'Ken Block Helm';
		include 'sunglassesImagesByModelSlider.php';
	?>
</div> <!-- end page2 -->

<div id="page3">
	<div class="page-body">
		<h1>Just a hot chick</h1>
		<img src="<?=IMG?>spyFlynnGirl.jpg" />
	</div>
</div> <!-- end page3 -->


