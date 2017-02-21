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
                                        class="width-75-percent"
										alt="Очки Spy Optic Flynn"
                                    <?php else: ?>
                                        class="width-75-percent"
										alt="Очки Spy Optic Ken Block Helm"
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
                                    <!--
                                    <img src="#" class="cart-icon" lazy-src="<?=IMG?>addToCart.png" />
                                    -->
                                    <span class="cart-icon fa fa-cart-plus"></span>
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
                                        <div class="heading">
                                            или твердый кейс
                                        </div>
                                        <img class="pouch" src="<?=IMG?>pouch_solid_.jpg" />
                                    </div>
                                <?php endif; ?>
								 </p>
							</div> <!-- end .container -->
							<div id="shop-benefits-infographic">
							  <div class="center-infograph">
									<div id="infographic-5-years"></div>
									<div id="infographic-uv-protect"></div>
									<div id="infographic-100-percent"></div>
									<div id="infographic-many-clients"></div>
									<div id="infographic-14-days"></div>
							  </div>
							</div>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
