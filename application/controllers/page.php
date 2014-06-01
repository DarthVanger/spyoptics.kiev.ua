<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Page controller
 *
 *	Takes care of loading pages with simple html content.
 *
 */
class Page extends CI_Controller {
	/** load
	 *	Loads page named $pageName from views/pages/ folder.
	 *	Also loads "forPage" header and footer.
	 */
	public function load($pageName) {
		$this->load->model('Header');

		$this->load->view('header/forPage', $this->Header->getViewData());
		$this->load->view('pages/'.$pageName);
		$this->load->view('footer/forPage');
	}
}
