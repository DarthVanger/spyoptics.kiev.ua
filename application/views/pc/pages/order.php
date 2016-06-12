<!-- order page
 -	 Shows order form and cart contents
-->

<link href="<?=CSS?>pc/pages/order.css" rel="stylesheet" type="text/css" />

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

<form class="order" method="POST" id="orderForm" action="<?=site_url('/shop/submitOrder')?>">
<div id="order-page" class="pagePadding">
    <div class="inner-container">
        <!-- cart -->
        <div class="cart" id="cart-view">
            <h1 class="textAlignCenter">Ваш заказ</h1>
            <?php if(is_array($cart['items']) && $cart['totalPrice']>0):?>
                <?php $count = 1; foreach($cart['items'] as $item): ?> 
                    <div class="item">
                        <div class="description">
                            <?=$item['model']?>, 
                            <?=$item['color']?>, 
                            <?=$item['price']?> грн
                            <strong id="case-price-value-id-<?=$count?>"></strong>

                        </div>

                        <div class="imgContainer" id="<?=$item['id']?>" >
                            <img class="glasses" src="<?=IMG?><?=$item['mini_img_path']?>" />
                        </div>


                        <input type="hidden" name="orderItems[<?=$count?>][model]" value="<?=$item['model']?>" />
                        <input type="hidden" name="orderItems[<?=$count?>][color]" value="<?=$item['color']?>" />
                        <input type="hidden" name="orderItems[<?=$count?>][price]" value="<?=$item['price']?>" />

                        <?php if ($item['model'] == 'Ken Block Helm'): ?>
                            <!-- <span class="plus">+</span>
                            <div class="imgContainer" id="<?=$item['id']?>" >
                                <img class="pouch" src="<?=IMG?>pouch.jpg" />
                            </div>
                            -->

                            <!-- Section for cases. We need empty onClick becouse of maintain apple devices -->
                            <section class="item-cases-section">
                                    <p class="attention-message-for-choose"><small>Выберите кейс для очков:</small></p>
                                    <input type="radio" class="radio-free" id="flag-<?=$count?>" >
                                    <input type="radio" class="radio-free" onclick="" id="input-free-<?=$count?>" value="case-free" name="orderItems[<?=$count?>][case]" required> 
                                    <label for="input-free-<?=$count?>" class="label-free">
                                        <img src="<?=IMG?>pouch_135_90.jpg">
                                        0 грн
                                    </label>
                                    <input type="radio" class="radio-200" onclick="" id="input-200-<?=$count?>" value="case-200" name="orderItems[<?=$count?>][case]" required>
                                    <label for="input-200-<?=$count?>" class="label-200">
                                        <img src="<?=IMG?>pouch_135_90.jpg">
                                        200 грн
                                    </label>
                            </section>
                        <?php else: ?>
                            <input type="hidden" value="no-choice" name="orderItems[<?=$count?>][case]"> 
                        <?php endif; ?>

                        <a id="<?=$item['id']?>" class="removeItem" order-id="<?=$count?>" href="javascript:void(0)">
                            <img src="<?=IMG?>mobile/layout/cartRemoveIcon.svg" />
                        </a>
                    </div>
                    <hr>
                    <?php $count++;?>
                <?php endforeach; ?>
                <script>var casesPrices = new Array(<?=$count-1?>)</script>
                <div class="total-price">Общая стоимость заказа: <span id="total-price"><?=$cart['totalPrice']?></span> грн (+ доставка)</div>
                <input type="hidden" value="<?=$cart['totalPrice']?>" id="input-total-price" name="totalPrice"> 
            <?php else:?>
                <div>Ваша корзинка пуста</div>
                <div>
                    <a href="<?=base_url()?>">Выбрать и добавить в корзинку очки</a> <br />
                    Или заказывайте по телефону 063 206 60 97
                </div>
            <?php endif;?>
        </div>

        <br />

        <div class="orderFormContainer">
            
                <h2 class="textAlignCenter">Оформление заказа</h2>
                <div class="fieldName">Фамилия, имя, отчество</div>
                <input name="name" type="text" class="glowing-border" value="<?=set_value('name')?>" required />
                <br />
                <div class="fieldName">Телефон</div>
                <input name="phone"  id="phoneInput" type="text" class="glowing-border" value="<?=set_value('phone')?>" required   
                pattern="(?:[\.\-\s]?\d\d\d){2}(?:[\.\-\s]?\d\d){2}$" title="Формат ввода 0XX XXX XX XX" placeholder="0XX XXX XX XX"/>
                <!-- default pattern pattern="[0-9]{3}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}" -->
                
                 <br />
                <!-- darthvanger@gmail.com 2015-05-09: do we need email in the form? -->
                <!--
                <div class="fieldName">E-mail</div>
                <input name="email" type="text" class="glowing-border" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
                <br />
                -->

                <div class="fieldName">Город</div>
                <input name="city" type="text" class="glowing-border" value="<?=set_value('city')?>"/>
                <br />

                <div class="fieldName">Адрес или № отделения Новой Почты</div>
                <input name="addressOrNovaPoshtaOffice" type="text" class="glowing-border" value="<?=set_value('address')?>" required />
                <br />
                <div class="fieldName">Доставка</div>
                <select name="delivery" class="glowing-border">
                    <option
                        value="Новая Почта"
                        <?php if(isset($_POST['delivery'])  && $_POST['delivery']=='Новая Почта') echo 'selected="selected"'?>
                    >
                        Новая Почта
                    </option>
                    <option
                        value="Курьерская"
                        <?php if(isset($_POST['delivery']) && $_POST['delivery']=='Курьерская') echo 'selected="selected"'?>
                    >
                        Курьерская (только г. Киев)
                    </option>
                </select>
                <!--
                <div class="fieldName">№ Отделения Новой Почты</div>
                <input
                    name="novaPoshtaOffice"
                    type="text"
                    class="glowing-border novaPoshtaOffice"
                    value="<?php if(isset($_POST['novaPoshtaOffice'])) echo $_POST['novaPoshtaOffice']; ?>"
                />
                <br />
                -->
                <div class="fieldName">Способ оплаты</div>
                <select name="paymentMethod" class="glowing-border">
                    <option
                        value="Оплата при получении"
                        <?php if(isset($_POST['paymentMethod']) && $_POST['paymentMethod']=='Оплата при получении') echo 'selected="selected"';  ?>
                    >
                        Оплата при получении
                    </option>
                    <option
                        value="Предоплата на карточку ПриватБанк"
                        <?php if(isset($POST['paymentMethod']) && $_POST['paymentMethod']=='Предоплата на карточку ПриватБанк') echo 'selected="selected"'; ?>
                    >
                        Предоплата на карточку ПриватБанк (номер будет сообщен по смс)
                    </option>
                </select>
                <br />
                <div class="fieldName">Доп. информация</div>
                <textarea name="additionalInfo" class="glowing-border" rows="5"><?php if(isset($_POST['additionalInfo'])) echo $_POST['additionalInfo']; ?></textarea>
                <br />

                <div class="fieldName">Вам необходимо подтверждение заказа оператором Call-центра?</div>
                <div style="text-align: left; padding: 1em;">
                    <input id="orderConfirmByCallYes" type="radio" name="orderConfirmByCall" value="yes" />
                    <label for="orderConfirmByCallYes" style="cursor: pointer">Да</label>
                    <input id="orderConfirmByCallNo"type="radio" name="orderConfirmByCall" value="no" checked="checked" />
                    <label for="orderConfirmByCallNo" style="cursor: pointer">Нет</label>
                </div>

                <?=validation_errors('<div class="validationError">', '</div>')?>

                <input type="submit" value="Готово" />

            </form>
        </div>
    </div> <!-- end .page-container -->
</div> <!-- end #order-page -->
