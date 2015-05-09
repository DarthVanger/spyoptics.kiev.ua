<!-- header/navbar view
 -
 -	 This view is a horizontal navigation bar.
 -	 It is a part of the page header.
 -
-->

<div id="topNavbar">
	<div id="topLine"></div>
	<div class="navbar">
		<a href="<?=site_url('/')?>">Spyoptic</a>
		<a href="<?=site_url('/shop/loadSimplePage/about-glasses')?>">описание</a>
		<a href="<?=site_url('/shop/order')?>">заказать</a>
		<a href="<?=site_url('/shop/loadSimplePage/delivery')?>">доставка</a>
		<a href="<?=site_url('/shop/loadSimplePage/contact')?>">контакты</a>
	</div>

    <div class="social-like-buttons">
        <div class="like-button-container">
            <div class="fb-like" data-href="http://spyoptics.kiev.ua/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <div class="like-button-container">
            <div id="vk_share"></div>
            <div id="vk_like"></div>
        </div>
        <div class="like-button-container">
            <div class="g-plusone" data-href="http://spyoptics.kiev.ua/"></div>
        </div>
    </div>

    <div class="loading-container">
        <div id="loading" class="hidden">loading...</div>
    </div>
</div>
