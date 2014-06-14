<!-- mobile/sunglasses page
 -
 -	 Shows sunglasses
 -
-->

<link href="<?=CSS?>mobile/pages/sunglasses.css" rel="stylesheet" type="text/css" />

<div id="sunglasses-page">
	<div class="sunglasses">
		<?php foreach($sunglasses as $sunglass): ?>
			<img class="sunglasses" src="<?=IMG.$sunglass['mini_img_path']?>" />
		<?php endforeach; ?>
	</div>
</div>


