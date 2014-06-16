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
				<div class="sunglassesImgContainer" id="<?=$sunglass['id']?>" >
					<img
						src="<?=IMG?>mobile/pages/shop/inCart.svg" 
						class = "isInCartMark"
						<?php if($sunglass['inCart']): ?>
							style = "display: inline-block";
						<?php endif; ?>
					/>
					<img class="sunglasses" src="<?=IMG.$sunglass['mini_img_path']?>" />
				</div>
			<?php $i++; ?>
		<?php endforeach; ?>
	</div>
</div>


