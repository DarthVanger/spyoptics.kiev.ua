<!-- sunglasses/peoplePhotosFlexSlider view
 -	 Shows photos of people wearing spy sunglasses, using FlexSlider.
 -	 FOR NOW IT'S ONLY A COPY OF imagesByModelFlexSlider.php, so to say, it's under development :)
-->
	<div class="pictures">
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($peoplePhotos as $photo): ?>
					<li>
						<div class="container">
							<img class="flex peoplePhoto" src="<?=IMG?><?=$photo['img_path']?>" />
							 <p class="flex-caption">
								<div class="modelName"><?=$photo['model']?></div>
								<div class="priceAndCart">
									<div class="price">
										<?=$photo['price']?> грн
									</div>
									<button class="orderButton" id="<?=$photo['sunglasses_id']?>"><img src="<?=IMG?>addToCart.png" /></button>
								</div>
								<div class="color">
									<?=$photo['color']?>
								</div>
							 </p>
						</div> <!-- end .container -->
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
