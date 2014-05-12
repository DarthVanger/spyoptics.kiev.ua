<script src="<?=base_url()?>plugins/jquery.min.js"></script>
<?php $this->load->view('cart.js');?>
<script>
	CartJS.init({
		cartId: "cart-page"
	});
</script>

<!-- css is included via php so that php variables can be used inside css file -->
<style> <?php $this->load->view('style/pages/cart.css') ?> </style>


<div id="cart-page">

	<div class="cart" id="cart-view">
		<h2 class="textAlignCenter">Ваш заказ</h2>
		<?php foreach($cart['items'] as $item): ?> 
			<div class="item">
				<div class="imgContainer">
					<button class="removeItem" id="<?=$item['id']?>"><img src="<?=base_url()?>images/removeItem3.png" /></button>
					<img class="glasses" src="<?=$item['mini_img_path']?>" />
				</div>
				<div class="description">
					<div><?=$item['model']?></div>
					<div><?=$item['color']?></div>
					<div><?=$item['price']?> грн</div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="total-price">Общая стоимость заказа: <?=$cart['totalPrice']?> грн (+ доставка)</div>
	</div>

	<form class="order">
		<h2 class="textAlignCenter">Оформление заказа</h2>
		<div class="fieldName">Имя</div> <input type="text" class="glowing-border" />
		<br />
		<div class="fieldName">Телефон</div> <input type="text" class="glowing-border" />
		<br />
		<div class="fieldName">Адрес</div> <input name="address" type="text" class="glowing-border" />
		<br />
		<div class="fieldName">Доставка</div>
		<select class="glowing-border">
			<option>Новая Почта</option>
			<option>Курьерская (только г. Киев, правый берег)
		</select>
		<br />
		<div class="fieldName">Доп. информация</div> <textarea name="additionalInfo" class="glowing-border" rows="5"></textarea>
		<input type="submit" value="Готово" />


	</form>
</div>
