<!-- order page
 -	 Shows order form and cart contents
-->

<link href="<?=CSS.$userDevice?>/pages/cart.css" rel="stylesheet" type="text/css" />

<!-- load jquery (if it's not already loaded) -->
	<script type="text/javascript">
	if(typeof jQuery == 'undefined'){
		document.write('<script type="text/javascript" src="<?=JS?>jquery/jquery.min.js"></'+'script>');
	  }
	</script>
<!-- ----------------------------------------- -->

<!-- CartAjax -->
	<script type="text/javascript" src="<?=JS?>cart/CartAjax.js"></script>
	<script>
		$(document).ready(function() {
			cartAjax = new CartAjax();
			cartAjax.initListeners({
				cartId: "cart-view",
				removeItemButtonClass: "removeItem"
			});
		});
	</script>
<!-- ---------------------------------------- -->

<!-- FormValidator -->
	<script type="text/javascript" src="<?=JS?>jquery/jquery-ui-effects.min.js"></script>
	<script type="text/javascript" src="<?=JS?>cart/FormValidator.js"></script>
	<script>
		$(document).ready(function() {
			FormValidator.init();
		});
	</script>
<!-- ---------------------------------------- -->


<div id="cart-page">

	<div class="cart" id="cart-view">
		<h2 class="textAlignCenter">Ваш заказ</h2>
		<?php if(is_array($cart['items']) && $cart['totalPrice']>0):?>
			<div class="total-price">Общая стоимость заказа: <br /> <?=$cart['totalPrice']?> грн (+ доставка)</div>
			<?php foreach($cart['items'] as $item): ?> 
				<div class="item">
					<div class="description">
						<?=$item['model']?>,
						<?=$item['color']?>,
						<?=$item['price']?> грн
					</div>
					<div class="imgContainer">
						<a href="javascript: void(0)" class="removeItem" id="<?=$item['id']?>"><img src="<?=IMG?>removeItemH20.png" /></a>
						<img class="glasses" src="<?=IMG?><?=$item['mini_img_path']?>" />
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

	<div id="orderForm">
		<form class="order" method="POST" action="<?=site_url()?>/shop/submitOrder">
			<h2 class="textAlignCenter">Оформление заказа</h2>
			<div class="fieldName">Фамилия, имя, отчество</div> <input name="name" type="text" class="glowing-border" />
			<br />
			<div class="fieldName">Телефон</div> <input name="phone"  id="phoneInput" type="text" class="glowing-border" />
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
			<div class="fieldName">№ Отделения Новой Почты</div> <input name="novaPostaOffice" type="text" class="glowing-border novaPoshtaOffice" />
			<br />
			<div class="fieldName">Способ оплаты</div>
			<select name="paymentMethod" class="glowing-border">
				<option>Оплата при получении</option>
				<option>Предоплата на карточку ПриватБанк (номер будет сообщен по смс)</option>
			</select>
			<br />
			<div class="fieldName">Доп. информация</div> <textarea name="additionalInfo" class="glowing-border" rows="5"></textarea>
            <!-- div for phone validation message for formValidation.js -->
			<div id="phoneValidation">&nbsp;</div>

            <!-- php phone validation fallback (if js fails) -->
            <?php if(is_array($validationErrors)): ?>
                <?php foreach($validationErrors as $validationError): ?>
                    <div class = "validationError">
                        <?=$validationError?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

			<input type="submit" value="Готово" />

		</form>
	</div>

    <!-- liqpay button is under development -->
	<?php //$this->load->view("cart/liqpayButton"); ?>

</div>

<div class="clear">&nbsp;</div>
