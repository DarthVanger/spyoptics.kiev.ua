<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	public function load($pageName) {
		$this->load->model('Header');

		$this->load->view('header/forPage', $this->Header->getViewData());
		$this->load->view('pages/'.$pageName);
		$this->load->view('footer/forPage');
	}
}
