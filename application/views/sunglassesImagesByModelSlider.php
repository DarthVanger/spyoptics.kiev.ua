<!-- This view is a flexslider showing pictures of sunglasses of a model specified in $model variable -->
<!-- IMPORTANT: $model variable must be set in php before loading this view -->

	<div class="pictures">
		<div class="modelName"><?=$model?></div>
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($sunglasses as $sunglass): ?>
					<?php if($sunglass['model']==$model): ?>
						<li>
							<img class="flex" src="<?=IMG?><?=$sunglass['img_path']?>" />
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
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
