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

<!-- model choosing script -->
<script src="<?=JS?>mobile/ModelSwitchingNavbar.js" type="text/javascript"></script>
</script>
<!-- ------------------------- -->

<link href="<?=CSS?>mobile/pages/sunglasses.css" rel="stylesheet" type="text/css" />

<div id="sunglasses-page" class="page-padding text">
	<div>
		Нажмите на очки, чтобы добавить/убрать очки из корзинки. <br />
        Нажмите на кнопку-корзинку вверху страницы, когда определитесь с выбором.
	</div>
    
    <div class="loading-model-spinner">
        Loading...
    </div>
	<div class="sunglasses-block">
        <?php
            /**
             * Sort the sunglasses by model, in order
             * 'Ken Block Helm' > 'Flynn' > 'Touring'.
             */
            function compareModel($a, $b) {
                $order = ['Ken Block Helm', 'Flynn', 'Touring'];
                $orderA = array_search($a['model'], $order);
                $orderB = array_search($b['model'], $order);
                return $orderA > $orderB;
            }
            usort($sunglasses, 'compareModel');
        ?>
        <?php foreach($sunglasses as $sunglass): ?>
            <div class="sunglasses-item" data-model="<?=$sunglass['model']?>">
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
        <?php endforeach; ?>
    </div>
</div>


