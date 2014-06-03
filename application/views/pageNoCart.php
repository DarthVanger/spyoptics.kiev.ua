<!-- pageNoCart view
 -	 This view is just like "page" view, but without cart in header.
 -	 Page is loaded from "views/pages/".$pageName.
-->

<?php $this->load->view('header/minimal.php');?>
<?php $this->load->view('header/navbar.php');?>

<link href="<?=CSS?>content.css" rel="stylesheet" type="text/css" />

<div id="body">
	<div class="page-body">
		<div id="content" class="text">
			<?php $this->load->view("pages/".$pageName); ?>
		</div>
	</div>
	<?php $this->load->view('footer/signature'); ?>
</div>

<?php $this->load->view('footer/minimal'); ?>
