<!-- mobile order page
 -	 Shows order form and cart contents
-->

<link href="<?=CSS?>mobile/pages/order.css" rel="stylesheet" type="text/css" />

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
            (new CartAjax).initListeners({
                cartId: 'cart-view',
                removeItemButtonClass: 'removeItem'
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


<div id="order-page">
	<div class="cart" id="cart-view">
        <img class="cart" src="<?=IMG?>mobile/layout/cartIcon.png" /><span class="cartSemicolon" />:</span>
        <?php if(is_array($cart['items']) && $cart['totalPrice']>0):?>
            <?php foreach($cart['items'] as $item): ?> 
                <div class="item">
                    <div class="description">
                        <?=$item['model']?>, 
                        <?=$item['color']?>, 
                        <?=$item['price']?> грн
                    </div>
                    <div class="imgContainer" id="<?=$item['id']?>" >
                        <img class="glasses" src="<?=IMG?><?=$item['mini_img_path']?>" />
                    </div>
                    <a id="<?=$item['id']?>" class="removeItem" href="javascript:void(0)">
                        <img src="<?=IMG?>mobile/layout/cartRemoveIcon.svg" />
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="total-price">Общая стоимость заказа: <?=$cart['totalPrice']?> грн (+ доставка)</div>
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
			<div class="fieldName">Фамилия, имя, отчество</div>
			<input name="name" type="text"  placeholder="Фамилия, имя, отчество" />
			<br />
			<div class="fieldName">Телефон</div>
			<input name="phone"  id="phoneInput" type="text" placeholder="Телефон" />
			<br />
			<div class="fieldName">E-mail</div>
			<input name="email" type="text" placeholder="email" />
			<br />
			<div class="fieldName">Адрес</div>
			<input name="address" type="text" placeholder="адрес" />
			<br />
			<div class="fieldName">Доставка</div>
			<select name="delivery" >
				<option>Новая Почта</option>
				<option>Курьерская (только г. Киев, правый берег)</option>
			</select>
			<div class="fieldName">№ Отделения Новой Почты</div>
			<input name="novaPostaOffice" type="text" class="novaPoshtaOffice" placeholder="№ отделения новой почты" />
			<br />
			<div class="fieldName">Способ оплаты</div>
			<select name="paymentMethod" >
				<option>Оплата при получении</option>
				<option>Предоплата на карточку ПриватБанк (номер будет сообщен по смс)</option>
			</select>
			<br />
			<div class="fieldName">Доп. информация</div>
			<textarea name="additionalInfo"  rows="5" placeholder="Дополнительная информация"></textarea>

			<div id="phoneValidation">&nbsp;</div>
			<input type="submit" value="Готово" />
		</form>
	</div>

	<?php //$this->load->view("cart/liqpayButton"); ?>

</div>

<div class="clear">&nbsp;</div>
