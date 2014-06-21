<!-- mobile/peoplePhotos page 
 -	 Shows photos of people wearing spy sunglasses, using FlexSlider.
-->

<!-- flex slider js -->
    <link rel="stylesheet" href="<?=CSS?>mobile/flexSlider.css" type="text/css">
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
<!-- END flex slider js -->

<div class="pictures">
    <div class="flexslider">
        <ul class="slides">
            <?php foreach($peoplePhotos as $photo): ?>
                <li>
                    <div class="container">
                        <img class="flex peoplePhoto" src="<?=IMG?><?=$photo['img_path']?>" />
                    </div> <!-- end .container -->
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
