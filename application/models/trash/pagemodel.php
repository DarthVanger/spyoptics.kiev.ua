<?php

/** PageModel
 *		
 *	Is responsible for getting content of pages like contacts, about, etc.
 *
 */
class PageModel extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function getContent($pageName) {
		$pagePath = base_url()."assets/pages/".$pageName.".php";
		$pageContents = file_get_contents($pagePath);
		
		return $pageContents;
	}

}
