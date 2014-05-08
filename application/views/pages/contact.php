<!-- css is included via php so that php variables can be used inside css file -->
<style> <?php $this->load->view('style/pages/contact.css') ?> </style>

<div id="contact-page">
	<a id="instagramLogoContainer" target="_blank" href="http://instagram.com/spyoptics_kiev">
		<img id="instagramLogo" src="<?=base_url()?>images/social/instagramLogoBeautifulBlue.png" />
		<img id="instagramLogoHover" src="<?=base_url()?>images/social/instagramLogoBeautiful.png" />
	</a>

	<img class="contacts" src="<?=base_url()?>images/phoneIcon2.png" />063 206 60 97<br />
	<img class="contacts" src="<?=base_url()?>images/skypeIcon.png" />spyoptics_kiev<br />
	<a style="color: #555" href="mailto:spyoptics@ukr.net" target="_blank">
		<img class="contacts" src="<?=base_url()?>images/envelope.jpg" />spyoptics@ukr.net<br />
	</a>


	<!-- not working. Display is set to none -->
	<div name="instagramLinkCode" style="display: none">
		<style>.ig-b- { display: inline-block; }
		.ig-b- img { visibility: hidden; }
		.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
		.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-spri..) no-repeat 0 0; }
		@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
		.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
		<a href="http://instagram.com/spyoptics_kiev?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
	</div>

</div>
