<?php include './application/views/cart.js'; ?>
<script>
	CartJS.init({
		cartId: "cartContent"
	});
</script>
<!-- cart is absolutely positioned block -->
<div id="cart" class="cart">
	<a class="cart" href="<?=site_url()?>/cartcontroller/view">
		<img class="cart" src="<?=base_url()?>images/cart1_blue.png" />
		<img class="cartHover" src="<?=base_url()?>images/cart1_red.png" />
	</a>
	<div id="cartContent">
		<?php if(!is_null($cartContent)): ?>
			<?php foreach($cartContent as $item):?>
				<div class="imgContainer">
					<img src="<?=base_url()?><?=$item['thumbnail_img_path']?>" />
					<button class="removeItem" id="<?=$item['id']?>"><img src="<?=base_url()?>images/removeItem3.png" /></button>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
