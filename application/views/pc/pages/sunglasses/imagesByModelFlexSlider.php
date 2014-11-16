<!-- sunglasses/imagesByModelFlexSlider
 -	 FlexSlider showing sunglasses images of model specified in $model variable.
-->

	<div class="pictures">
		<div class="modelName"><?=$model?></div>
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($sunglasses as $sunglass): ?>
					<?php if($sunglass['model']==$model): ?>
						<li>
							<div class="container">
								<!-- "lazy-src" - is for image lazy loading: it will be changed to "src" when page is shown by PageSlidingEffect script -->
								<img
                                    <?php if($model=="Flynn"): ?>
                                        class="height-100-percent"
                                    <?php else: ?>
                                        class="width-75-percent"
                                    <?php endif; ?>
                                    src="#"
                                    lazy-src="<?=IMG?><?=$sunglass['img_path']?>"
                                    id="<?=$sunglass['id']?>"
                                />
								 <p class="flex-caption">
								<div class="priceAndCart">
									<div class="price">
										<?=$sunglass['price']?> грн
									</div>
                                <a href="javascript: void(0)" class="orderButton" id="<?=$sunglass['id']?>">
                                    <img src="#" lazy-src="<?=IMG?>addToCart.png" />
                                    <div>добавить <br /> в корзинку</div>
                                </a>
								</div>

								<div class="color">
									<?=$sunglass['color']?>
								</div>

                                <?php if ($model == 'Ken Block Helm'): ?>
                                    <div class="product-description">
                                        <div class="heading">
                                            В комплекте мешочек
                                        </div>
                                        <img class="pouch" src="<?=IMG?>pouch.jpg" />
                                    </div>
                                <?php endif; ?>
								 </p>
							</div> <!-- end .container -->
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
