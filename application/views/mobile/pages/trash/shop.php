<link rel="stylesheet" href="<?=CSS?>mobile/pages/shop.css" type="text/css" />

<!-- Initiate JS touch controls -->
	<script src="<?=JS?>cart/CartAjax.js"></script>
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

<div id="shop-page">
	<div id="pagesContainer">
		<div class="page" id="sunglasses-page">
			<?php $this->load->view("mobile/pages/sunglasses"); ?>
		</div><div class="page" id="order-page">
			<?php $this->load->view("mobile/pages/order"); ?>
		</div>
	</div>
</div>
