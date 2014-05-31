<!-- This view is under development, liqpay payment system is tested -->
<form method="POST" accept-charset="utf-8" action="https://www.liqpay.com/api/pay">
	<input type="hidden" name="public_key" value="i36679239154" />
	<input type="hidden" name="amount" value="<?=$liqpay['amount']?>" />
	<input type="hidden" name="currency" value="UAH" />
	<input type="hidden" name="description" value="<?=$liqpay['description']?>" />
	<input type="hidden" name="type" value="buy" />
	<input type="hidden" name="language" value="ru" />
	<input type="hidden" name="result_url" value="<?=$liqpay['result_url']?>" />
	<input type="hidden" name="server_url" value="<?=$liqpay['server_url']?>" />
	<input type="hidden" name="sandbox" value="<?=$liqpay['sandbox']?>" />
	
	
	<input type="image" src="//static.liqpay.com/buttons/p1ru.radius.png" name="btn_text" />
</form>