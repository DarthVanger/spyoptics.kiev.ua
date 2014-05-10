<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- Google analytics src - uncomment when uploaded on web -->
	<!-- <script src="<?=base_url()?>plugins/googleAnalytics.js"></script> -->

	<!-- css is included via php so that php variables can be used inside css file -->
	<style> <?php $this->load->view('style/layout.css') ?> </style>
	<link rel="icon" 
	      type="image/png" 
				      href="<?=base_url()?>images/faviconEye1-6.png"> <!--favicon2.2.png-->

	<title>Spyoptic Киев Украина | Стильные очки Киев Украина</title>
</head>
<body>
<div id="header">
	<div id="topLine"></div>
	<div id="topNavbar">
		<a href="<?=site_url()?>/">Spy Optics</a>
		<a href="<?=site_url()?>/page/load/about-glasses">описание</a>
		<a href="<?=site_url()?>/page/load/order">заказать</a>
		<a href="<?=site_url()?>/page/load/delivery">доставка</a>
		<a href="<?=site_url()?>/page/load/contact">контакты</a>
	</div>

	<!-- cart is absolutely positioned block -->
	<div id="cart">
		<a class="cart" href="<?=site_url()?>/cart/view">
			<img class="cart" src="<?=base_url()?>images/cart1_blue.png" />
			<img class="cartHover" src="<?=base_url()?>images/cart1_red.png" />
		</a>
		<!-- <div id="cartCount"><?=$this->cart->total_items()?></div> -->
		<div id="cartContent">
			<!-- <img src="<?=base_url()?>images/sunglassesMini/flynn3_h30.png" />	-->
			<?php foreach($this->cart->contents() as $item):?>
				<div class="imgContainer">
					<img src="<?=$item['mini_img_path']?>" />
					<?php if($item['qty']>1): ?>
						<div class="itemCount"><?=$item['qty']?></div>
					<?php endif; ?>
					<button class="removeItem" id="<?=$item['rowid']?>"><img src="<?=base_url()?>images/removeItem3.png" /></button>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div> <!-- end header -->


<div id="body">


