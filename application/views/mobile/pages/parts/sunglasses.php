<!-- mobile/sunglasses page
 -
 -	 Shows sunglasses
 -
-->

<link href="<?=CSS?>mobile/pages/sunglasses.css" rel="stylesheet" type="text/css" />

<div id="sunglasses-page">
	<div class="sunglasses">
		<?php $i=0; ?>
		<?php foreach($sunglasses as $sunglass): ?>
			<?php if($i == 0): ?>
				<div class="sunglassesImgContainer">
					<div class="inCart">в корзинке</div>
					<img class="sunglasses" src="<?=IMG.$sunglass['mini_img_path']?>" />
				</div>
			<?php endif; ?>
			<?php $i++; ?>
		<?php endforeach; ?>
	</div>
</div>


