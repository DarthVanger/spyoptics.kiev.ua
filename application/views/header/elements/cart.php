<!-- cart is absolutely positioned block -->
<div id="cart">
	<a class="cart" href="<?=site_url()?>/cartcontroller/view">
		<img class="cart" src="<?=base_url()?>images/cart1_blue.png" />
		<img class="cartHover" src="<?=base_url()?>images/cart1_red.png" />
	</a>
	<div id="cartContent">
		<!-- <img src="<?=base_url()?>images/sunglassesMini/flynn3_h30.png" />	-->
		<?php if(!is_null($cartContent)): ?>
			<?php foreach($cartContent as $item):?>
				<div class="imgContainer">
					<img src="<?=$item['mini_img_path']?>" />
					<button class="removeItem" id="<?=$item['id']?>"><img src="<?=base_url()?>images/removeItem3.png" /></button>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
