<!-- pageNoCart view
 -	
 -	 View for pages that need the cart to be NOT displayed in header.
 -	 This view is just like "page" view, but without cart in header. 
 -
 -	 Loads minimal header, navigation bar, and a page named $pageName from "views/pages/" folder.
 -	 Is used to load pages like 'order', 'orderSubmitSuccess', 'orderSubmitFail', etc.
 -
 ----- Usage -----
 -	 Following code loads page "examplePage.php" from "views/pages/" folder.
 -	 In a controller write:
 -	 $viewData['pageName'] = 'examplePage';	 
 -	 $this->load->view('pageNoCart', $viewData);	
 -----------------
-->

<?php $this->load->view('header/minimal.php');?>
<?php $this->load->view('header/navbar.php');?>

<link href="<?=CSS.$userDevice?>/content.css" rel="stylesheet" type="text/css" />

<div id="body">
	<div class="page-body">
		<div id="content" class="text">
			<?php $this->load->view("pages/".$pageName); ?>
		</div>
	</div>
	<?php $this->load->view('footer/signature'); ?>
</div>

<?php $this->load->view('footer/minimal'); ?>
