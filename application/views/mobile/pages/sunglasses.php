<!-- mobile/sunglasses page
 -
 -	 Shows sunglasses
 -
-->


<!-- Initiate JS touch controls -->
	<script src="<?=JS?>cart/CartAjax.js"></script>
	<script src="<?=TOOLS?>jquery-flip/jquery.flip.min.js"></script>
	<script src="<?=JS?>mobile/ShopControls.js"></script>
	<script>
		$(document).ready(function() {
			(new ShopControls).init();
			var cartAjax = new CartAjax();
			cartAjax.initListeners({
				cartId: "cart-view",
				removeItemButtonClass: "removeItem"
			});
		});
	</script>
<!-- ------------------------- -->

<!-- lazy load images -->
<script src="<?=TOOLS?>jquery.lazyload.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $("img.lazy").lazyload();
});
</script>
<!-- ------------------------- -->

<link href="<?=CSS?>mobile/pages/sunglasses.css" rel="stylesheet" type="text/css" />

<div id="sunglasses-page" class="page-padding text">
	<div>
		Нажмите на очки, чтобы добавить/убрать очки из корзинки. <br />
        Нажмите на кнопку-корзинку вверху страницы, когда определитесь с выбором.
	</div>
	<div class="sunglasses-block">
        <!-- Ken Block Helm -->
		<?php foreach($sunglasses as $sunglass): ?>
            <?php if($sunglass['model'] == 'Ken Block Helm'): ?>
                <div class="sunglasses-item">
                        <div class="description">
                            <?=$sunglass['price']?> грн | <?=$sunglass['model']?> <?=$sunglass['color']?>
                        </div>
                        <div class="sunglassesImgContainer" id="<?=$sunglass['id']?>" >
                            <img
                                src="<?=IMG?>mobile/pages/sunglasses/inCart.svg" 
                                class = "isInCartMark"
                                <?php if($sunglass['inCart']): ?>
                                    style = "display: inline-block";
                                <?php endif; ?>
                            />
                            <img class = "loadingIcon" src="<?=IMG?>mobile/pages/sunglasses/loadingIcon.gif" />
                            <img class = "sunglasses lazy" data-original="<?=IMG.$sunglass['mini_img_path']?>" />
                        </div>
                </div>
            <?php endif; ?>
		<?php endforeach; ?>
        <!-- Flynn -->
		<?php foreach($sunglasses as $sunglass): ?>
            <?php if($sunglass['model'] == 'Flynn'): ?>
                <div class="sunglasses-item">
                        <div class="description">
                            <?=$sunglass['price']?> грн | <?=$sunglass['model']?> <?=$sunglass['color']?>
                        </div>
                        <div class="sunglassesImgContainer" id="<?=$sunglass['id']?>" >
                            <img
                                src="<?=IMG?>mobile/pages/sunglasses/inCart.svg" 
                                class = "isInCartMark"
                                <?php if($sunglass['inCart']): ?>
                                    style = "display: inline-block";
                                <?php endif; ?>
                            />
                            <img class = "loadingIcon" src="<?=IMG?>mobile/pages/sunglasses/loadingIcon.gif" />
                            <img class = "sunglasses lazy" data-original="<?=IMG.$sunglass['mini_img_path']?>" />
                        </div>
                </div>
            <?php endif; ?>
		<?php endforeach; ?>
</div>


