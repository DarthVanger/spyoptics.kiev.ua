<!-- submitOrderSuccess page 
 -	 Shows congradulations of successeful ordering
-->

<link href="<?=CSS?>pages/submitOrderSuccess.css" rel="stylesheet" type="text/css" />
<div id="submitOrderSuccess-page">
	<div>
		Спасибо, <?php if(isset($post['name'])):?><?=$post['name']?><?php endif;?>! Ваш заказ принят. <br />
		Вам перезвонят на номер <span class="phone"><?php if(isset($post['phone'])):?> <?=$post['phone']?> <?php endif;?></span>для подтверждения заказа в течении дня.<br />
		<br />
		Если Вам не перезвонят по поводу заказа в течении двух дней, пожалуйста, свяжитесь с нами по телефону!
	</div>
</div>
<?php $this->load->view("pages/contact");?>
