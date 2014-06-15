<!-- header/cart view
 -
 -	 This view is absolutely positioned cart in the top right corner of the page.
 -	 It is a part of the page header.
 -
-->

<!-- CartJS sources -->
<!-- depends on jquery (assuming it was already included) -->
	<script src="<?=JS?>cart/cart.js" type="text/javascript"></script> 
	<script>
		$(document).ready(function() {
			var cartJS = new CartJS();
			cartJS.init({
				cartId: "cartContent",
				addItemButtonClass: "orderButton",
				removeItemButtonClass: "removeItem"
			});
		});
	</script>
<!-- END CartJS sources -->

<!-- cart is absolutely positioned block -->
<div id="cart" class="cart">
	<a class="cart" href="<?=site_url()?>/cartcontroller/order">
		<img class="cart" src="<?=IMG?>cart1_blue.png" />
		<img class="cartHover" src="<?=IMG?>cart1_red.png" />
	</a>
	<div id="cartContent">
		<?php if(!is_null($cartContent)): ?>
			<?php foreach($cartContent as $item):?>
				<div class="imgContainer">
					<img src="<?=IMG?><?=$item['thumbnail_img_path']?>" />
					<a href="javascript: void(0)" class="removeItem" id="<?=$item['id']?>"><img src="<?=IMG?>removeItemH20.png" /></a>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
