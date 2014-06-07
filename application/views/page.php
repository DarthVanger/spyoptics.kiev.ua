<!-- page view
 -	
 -	 View for common pages.
 -
 -	 Loads minimal header, navigation bar, cart, and a page named $pageName from "views/pages/" folder.
 -	 Is used to load most of the site's pages (contact, about, ...).
 -
 ----- Usage -----
 -	 Following code loads page "examplePage.php" from "views/pages/" folder.
 -	 In a controller write:
 -	 $viewData['pageName'] = 'examplePage';	 
 -	 $this->load->view('page', $viewData);	
 -----------------
-->

<?php $this->load->view('header/minimal.php');?>
<?php $this->load->view('header/cart.php');?>
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
