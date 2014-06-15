<link rel="stylesheet" href="<?=CSS?>mobile/pages/shop.css" type="text/css" />

<!-- Initiate JS touch controls -->
	<script src="<?=JS?>cart/cart.js"></script>
	<script src="<?=TOOLS?>jquery-flip/jquery.flip.min.js"></script>
	<script src="<?=JS?>mobile/ShopControls.js"></script>
	<script>
		$(document).ready(function() {
			(new ShopControls).init();
			var cartJS = new CartJS();
			cartJS.init({
				cartId: "cart-view",
				removeItemButtonClass: "removeItem"
			});
		});
	</script>
<!-- ------------------------- -->

<div id="shop-page">
	<div id="pagesContainer">
		<div class="page" id="sunglasses-page">
			<?php $this->load->view("mobile/pages/parts/sunglasses"); ?>
		</div><div class="page" id="order-page">
			<?php $this->load->view("mobile/pages/parts/order"); ?>
		</div>
	</div>
</div>
