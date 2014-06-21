<!-- sunglasses/peoplePhotosFlexSlider view
 -	 Shows photos of people wearing spy sunglasses, using FlexSlider.
-->
	<div class="pictures">
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($peoplePhotos as $photo): ?>
					<li>
						<div class="container">
							<img class="flex peoplePhoto" lazy-src="<?=IMG?><?=$photo['img_path']?>" />
							<!--
								Some photos have sunglasses_id = NULL, when we don't have glasses that are on photo.
								So we don't display "add to cart" button if no sunglasses are acosiated with current photo.
							-->
							<?php if($photo['sunglasses_id'] > 0): ?>
								<p class="flex-caption">
									<div class="modelName"><?=$photo['model']?></div>
									<div class="priceAndCart">
										<div class="price">
											<?=$photo['price']?> грн
										</div>
										<a href="javascript: void(0)" class="orderButton" id="<?=$photo['sunglasses_id']?>">
											<img src="<?=IMG?>addToCart.png" />
										</a>
									</div>
									<div class="color">
										<?=$photo['color']?>
									</div>
								 </p>
							<?php endif; ?>
						</div> <!-- end .container -->
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
