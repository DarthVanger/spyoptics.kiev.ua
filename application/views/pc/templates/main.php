<!-- pc/templates/main view
 -	
 -	 Main template for common pages.
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

<?php $this->load->view('pc/header/minimal.php');?>
<?php $this->load->view('pc/header/cart.php');?>
<?php $this->load->view('pc/header/navbar.php');?>

<div id="body">
	<div class="page-body">
		<div id="content" class="text">
			<?php $this->load->view("pc/pages/".$pageName); ?>
		</div>
	</div>
	<?php $this->load->view('pc/footer/signature'); ?>
</div>

<?php $this->load->view('pc/footer/minimal'); ?> 
