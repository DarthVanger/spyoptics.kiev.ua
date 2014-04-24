<!-- css is included via php so that php variables can be used inside css file -->
<style> <?php $this->load->view('style/pages/order.css') ?> </style>

<div id="order-page">
	Заказывайте по телефону. Будем рады Вашему звонку!
	<?php include 'contact.php' ?>
</div>

<?php include 'delivery.php' ?>
