<?php include 'headerPage.php'?>
<div id="cart-page">
	<div class="cart">
		<?php foreach($sunglasses as $sunglass): ?> 
			<img src="<?=$sunglass['mini_img_path']?>" />	
		<?php endforeach; ?>
	</div>
</div>
<?php include 'footer.php'?>
