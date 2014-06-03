<!-- liqpayTest view
 -	 I used to test/debug liqpay payment system
-->

<form action="<?=site_url('cartcontroller/liqpayPaymentResponseHandler')?>" method="POST">
	<input type="hidden" name="test" value="testValue" />
	<input type="submit" />
</form>
