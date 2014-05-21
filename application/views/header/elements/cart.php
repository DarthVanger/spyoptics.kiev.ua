<script src="<?=JS?>jquery/jquery.min.js" type="text/javascript"></script> 
<script src="<?=JS?>cart/cart.js" type="text/javascript"></script> 
<script>
	CartJS.init({
		cartId: "cartContent"
	});
</script>
<!-- cart is absolutely positioned block -->
<div id="cart" class="cart">
	<a class="cart" href="<?=site_url()?>/cartcontroller/view">
		<img class="cart" src="<?=IMG?>cart1_blue.png" />
		<img class="cartHover" src="<?=IMG?>cart1_red.png" />
	</a>
	<div id="cartContent">
		<?php if(!is_null($cartContent)): ?>
			<?php foreach($cartContent as $item):?>
				<div class="imgContainer">
					<img src="<?=IMG?><?=$item['thumbnail_img_path']?>" />
					<button class="removeItem" id="<?=$item['id']?>"><img src="<?=IMG?>removeItem3.png" /></button>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
