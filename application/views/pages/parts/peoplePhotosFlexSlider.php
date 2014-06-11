<!-- sunglasses/peoplePhotosFlexSlider view
 -	 Shows photos of people wearing spy sunglasses, using FlexSlider.
 -	 FOR NOW IT'S ONLY A COPY OF imagesByModelFlexSlider.php, so to say, it's under development :)
-->
	<div class="pictures">
		<div class="modelName"><?=$model?></div>
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($sunglasses as $sunglass): ?>
					<?php if($sunglass['model']==$model): ?>
						<li>
							<div class="container">
								<img class="flex <?=$sunglass['css_class']?>" src="<?=IMG?><?=$sunglass['img_path']?>" />
								 <p class="flex-caption">
								<div class="priceAndCart">
									<div class="price">
										<?=$sunglass['price']?> грн
									</div>
								<button class="orderButton" id="<?=$sunglass['id']?>"><img src="<?=IMG?>addToCart.png" /></button>
								</div>

								<div class="color">
									<?=$sunglass['color']?>
								</div>
								 </p>
							</div> <!-- end .container -->
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
