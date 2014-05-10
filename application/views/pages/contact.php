<!-- css is included via php so that php variables can be used inside css file -->
<style> <?php $this->load->view('style/pages/contact.css') ?> </style>

<div id="contact-page">
	<img class="contacts" src="<?=base_url()?>images/phoneIcon2.png" />063 206 60 97<br />
	<img class="contacts" src="<?=base_url()?>images/skypeIcon.png" />spyoptics_kiev<br />
	<a style="color: #555" href="mailto:spyoptics@ukr.net" target="_blank">
		<img class="contacts" src="<?=base_url()?>images/envelope.jpg" />spyoptics@ukr.net<br />
	</a>
	<a id="instagramLogoContainer" target="_blank" href="http://instagram.com/spyoptics_kiev">
		<img id="instagramLogo" src="<?=base_url()?>images/social/instagramLogoBeautifulBlue.png" />
		<img id="instagramLogoHover" src="<?=base_url()?>images/social/instagramLogoBeautiful.png" />
	</a>
	spyoptics_kiev

</div>
