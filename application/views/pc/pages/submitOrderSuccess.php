<!-- submitOrderSuccess page 
 -	 Shows congradulations of successeful ordering
-->

<!-- Send Google Analytics notification that new order was made -->
<script src="<?=JS?>GoogleAnalyticsAPI.js"></script>
<script>
  $(document).ready(function(){
    var cartItems = JSON.parse('<?=$cartItemsJSON?>');
    var totalPrice = <?=$totalPrice?>;
    api = new GoogleAnalyticsAPI();
    api.placeOrder(cartItems, totalPrice);
  });
</script>

<link href="<?=CSS.$userDevice?>/pages/submitOrderSuccess.css" rel="stylesheet" type="text/css" />
<div id="submitOrderSuccess-page" class="page-padding text">
	<div>
        Спасибо,
        <?php if(isset($post['name'])):?>
            <?=$post['name']?>
        <?php endif;?>
        !

        <p>
          Ваш заказ принят и будет отправлен в течении 24 часов по адресу (или на отделение новой почты) <span class="address"><?=$post['addressOrNovaPoshtaOffice']?></span>. 
        </p>
          Возможно, Вам перезвонят на номер <span class="phone"><?=$post['phone']?></span> для уточнения деталей.<br />
        <br />
        Если хотите нам что-нибудь еще сказать перед отправкой заказа, звоните!

        <!--
        <br />
        <br />

        <div>
            <strong style="font-size: 1.2em">
            В данный момент администрация <span style="color:red">интернет магазина в отпуске</span>. Все заказы и сообщения для компании, присланные с <span style="color:red">08.07.2017</span> по <span style="color:red">23.07.2017</span>, будут обработаны <span style="color:red">27.07.2017</span>.В период отсутсвия администрации сайта, очки можно купить в городе киеве на нашем складе самовывоза http://spyoptics.kiev.ua/blog/?p=97.  Приносим извинения за неудобства.
            </strong>
        </div>
        -->
	</div>
</div>
<?php $this->load->view("pc/pages/contact");?>
