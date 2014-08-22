<!-- admin/page view
 -
 -	 Most common template for admin pages.
 -	 Loads page named $pageName from views/admin/pages/.
 -	 Should be supplied with $pageName variable.
 -
 -------- Usage --------
 -	 Following code in a controller will load page named "examplePage" from views/admin/pages/.
 -
 -	 $viewData["pageName"] = "exapmlePage";
 -	 $this->load->view("admin/page", $viewData);
 ------------------------------------------------
-->

<?php $this->load->view("pc/header/minimal"); ?>

<?php $this->load->view("admin/pages/".$pageName); ?>

<?php $this->load->view("pc/footer/minimal"); ?>
