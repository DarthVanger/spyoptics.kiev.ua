<!-- sunglasses view 
 -
 -	 Shows all sunglasses using FlexSlider 
 -	
 -	 Loads minimal header, navigation bar, cart, and 2 pages with flexslider showing sunglasses.
 -
-->
<?php $this->load->view('pc/header/minimal.php');?>
<?php $this->load->view('pc/header/cart.php');?>
<?php $this->load->view('pc/header/navbar.php');?>


<link href="<?=CSS.$userDevice?>/pages/sunglasses.css" rel="stylesheet" type="text/css" /> 
<!-- flex slider sources -->
	<!-- including jquery (if it's not already included) -->
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
	<script src="<?=JS?>PageSlidingEffect.js" type="text/javascript"></script>

	<script type="text/javascript" charset="utf-8">
	  $(window).load(function() {
			(new PageSlidingEffect).init();
	  });
	</script>
<!-- END Page Sliding Effect sources -->

<div id="body">

	<!-- pageSlidingNavbar has absolute position -->
	<div id="pageSlidingNavbar">
		<a href="javascript: void(0)" id="kenBlockButton" class="pageSlidingButton current">
			<img src="<?=IMG?>pages/sunglasses/kenBlockIconBlack.png" />
		</a>
		<a href="javascript: void(0)" class="pageSlidingButton">
			<img src="<?=IMG?>pages/sunglasses/flynnIconBlack.png" />
		</a>
		<a href="javascript: void(0)" class="pageSlidingButton">
			<img src="<?=IMG?>pages/sunglasses/touringIconBlack.png" />
		</a>
        <!--
		<a href="javascript: void(0)" class="pageSlidingButton">
			<img src="<?=IMG?>pages/sunglasses/videoIcon3.png" />
		</a>
        -->
		<a href="javascript: void(0)" class="pageSlidingButton">
			<img src="<?=IMG?>pages/sunglasses/photosIcon.png" />
		</a>
	</div>

	<div class="page">
		<?php
			$viewData['model'] = 'Ken Block Helm';
			$this->load->view('pc/pages/sunglasses/imagesByModelFlexSlider.php', $viewData);
		?>
	</div> <!-- end page1 -->

	<div class="page">
		<?php
			$viewData['model'] = 'Flynn';
			$this->load->view('pc/pages/sunglasses/imagesByModelFlexSlider.php', $viewData);
		?>
	</div>

	<div class="page">
		<?php
			$viewData['model'] = 'Touring';
			$this->load->view('pc/pages/sunglasses/imagesByModelFlexSlider.php', $viewData);
		?>
	</div>

	<div class="page">
		<?php
			$this->load->view('pc/pages/sunglasses/peoplePhotosFlexSlider.php');
		?>
    </div>

	<div class="page">
		<?php
			$this->load->view('pc/pages/sunglasses/site-description.php');
		?>
    </div>
</div> <!-- end div id="body" -->

<?php $this->load->view('pc/footer/minimal'); ?>
