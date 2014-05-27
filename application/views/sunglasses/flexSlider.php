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

<!-- Page Sliding Effect sources -->
	<script src="<?=JS?>jquery/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?=JS?>jquery/jquery.mobile.touch.min.js"></script>
	<script src="<?=JS?>jquery/jquery.mobile.touch.patch.js"></script>
	<script src="<?=TOOLS?>hammer.min.js"></script>
	<script src="<?=JS?>PageSlidingEffect.js" type="text/javascript"></script>

	<script type="text/javascript" charset="utf-8">
	  $(window).load(function() {
		if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/.test(navigator.userAgent) ) {
			PageSlidingEffect.init();
		 }

	  });
	</script>
<!-- END Page Sliding Effect sources -->

<div class="page">
	<?php
		$model = 'Ken Block Helm';
		include 'imagesByModelFlexSlider.php';
	?>
</div> <!-- end page1 -->

<div class="page">
	<?php
		$model = 'Flynn';
		include 'imagesByModelFlexSlider.php';
	?>
</div> <!-- end page2 -->

<!-- third page is under development right now -->
<!-- <div class="page"> -->
	<?php
		//include 'peoplePhotosFlexSlider.php';
	?>
<!-- </div> --> <!-- end page3 -->
