<?php include 'headerPage.php'?>
<div id="cart-page">
	<div class="cart">
		<?php foreach($this->cart->contents() as $item): ?> 
			<img src="<?=$item['mini_img_path']?>" />	
		<?php endforeach; ?>
	</div>
</div>
<?php include 'footer.php'?>
