<!-- load jquery (if it's not already loaded) -->
<script type="text/javascript">
if(typeof jQuery == 'undefined'){
	document.write('<script type="text/javascript" src="<?=JS?>jquery/jquery.min.js"></'+'script>');
  }
</script>


<script type="text/javascript" src="<?=JS?>jquery/jquery-ui-effects.min.js"></script>
<script type="text/javascript" src="<?=JS?>cart/formValidation.js"></script>
<script type="text/javascript" src="<?=JS?>cart/cart.js"></script>
<script>
	CartJS.init({
		cartId: "cart-view"
	});
</script>

<link href="<?=CSS?>pages/cart.css" rel="stylesheet" type="text/css" />


<div id="cart-page">

	<div class="cart" id="cart-view">
		<h2 class="textAlignCenter">Ваш заказ</h2>
		<?php if(is_array($cart['items']) && $cart['totalPrice']>0):?>
			<div class="total-price">Общая стоимость заказа: <?=$cart['totalPrice']?> грн (+ доставка)</div>
			<?php foreach($cart['items'] as $item): ?> 
				<div class="item">
					<div class="imgContainer">
						<button class="removeItem" id="<?=$item['id']?>"><img src="<?=IMG?>removeItemH20.png" /></button>
						<img class="glasses" src="<?=IMG?><?=$item['mini_img_path']?>" />
					</div>
					<div class="description">
						<div><?=$item['model']?></div>
						<div><?=$item['color']?></div>
						<div><?=$item['price']?> грн</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else:?>
			<div>Ваша корзинка пуста</div>
			<div>
				<a href="<?=base_url()?>">Выбрать и добавить в корзинку очки</a> <br />
				Или заказывайте по телефону 063 206 60 97
			</div>
		<?php endif;?>
	</div>

	<form id="orderForm" class="order" method="POST" action="<?=site_url()?>/cartcontroller/submitOrder">
		<h2 class="textAlignCenter">Оформление заказа</h2>
		<div class="fieldName">Имя</div> <input name="name" type="text" class="glowing-border" />
		<br />
		<div class="fieldName">Телефон</div> <input name="phone"  id="phoneInput" type="text" class="glowing-border" />
		<div id="phoneValidation">&nbsp;</div>
		<br />
		<div class="fieldName">E-mail</div> <input name="email" type="text" class="glowing-border" />
		<br />
		<div class="fieldName">Адрес</div> <input name="address" type="text" class="glowing-border" />
		<br />
		<div class="fieldName">Доставка</div>
		<select name="delivery" class="glowing-border">
			<option>Новая Почта</option>
			<option>Курьерская (только г. Киев, правый берег)</option>
		</select>
		<div class="fieldName">№ Отделения <br />Новой Почты</div> <input name="novaPostaOffice" type="text" class="glowing-border novaPoshtaOffice" />
		<br />
		<div class="fieldName">Способ оплаты</div>
		<select name="paymentMethod" class="glowing-border">
			<option>Оплата при получении</option>
			<option>Предоплата на карточку ПриватБанк (номер будет сообщен по смс)</option>
		</select>
		<br />
		<div class="fieldName">Доп. информация</div> <textarea name="additionalInfo" class="glowing-border" rows="5"></textarea>
		<input type="submit" value="Готово" />
	</form>
</div>

<div class="clear">&nbsp;</div>
