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
      <!--
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

      -->
       
        <br />

        <div>
            <p>
                В данный момент администрация  интернет магазина в отпуске. Все заказы и сообщения для компании, присланные с с 09.11 до 18.11, будут обработаны 19.11.2018.
            </p>
            <strong style="font-size: 1.2em">
            <p>
                В период отсутсвия администрации сайта, очки можно купить в городе Киеве на нашем складе самовывоза. <br />
                Контакты склада самовывоза по ссылке: <a href="http://spyoptics.kiev.ua/blog/?p=97">http://spyoptics.kiev.ua/blog/?p=97</a>
            </p>
            </strong>
            <p>
                Приносим извинения за неудобства.
            </p>
        </div>
       
	</div>
</div>
<?php $this->load->view("pc/pages/contact");?>
