<!-- mobile/templates/main view
 -
 -	 Main template for mobile pages
 -
 -	 Loads page named $pageName from views/mobile/pages/ folder.
 -
 -------- Usage --------
 -	Following code in controller will load "examplePage.php" from views/mobile/pages/ folder:
 -
 -	$viewData["pageName"] = "examplePage";
 -	$this->load->view("mobile/templates/main", $viewData);
 -
 ------------------------
 -
-->

<?php $this->load->view("mobile/templates/parts/header.php"); ?>

<div id="pageContainer">
	<div class="page">

<?php $this->load->view("mobile/pages/".$pageName); ?>

	</div> <!-- end div class="page" -->
</div> <!-- end di id="pageContainer -->

<?php $this->load->view("mobile/templates/parts/footer.php"); ?>
