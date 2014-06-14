<link rel="stylesheet" href="<?=CSS?>mobile/pages/shop.css" type="text/css" />

<div id="shop-page">
	<div id="pagesContainer">
		<div class="page" id="sunglasses-page">
			<?php $this->load->view("mobile/pages/parts/sunglasses"); ?>
		</div>
		<div class="page" id="order-page">
			<?php $this->load->view("mobile/pages/parts/order"); ?>
		</div>
	</div>
</div>
