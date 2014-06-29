
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** mobile/Sunglasses controller
 *
 *	Takes care of viewing sunglasses for mobile version of site.
 *	
 */
class Sunglasses extends CI_Controller {
	
	/** show 
	 *	Loads sunglasses page using main mobile template.
	 */
	public function show() {
		$this->load->model('SunglassesModel');
		
		$viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$viewData['pageName'] = "sunglasses";

		$this->load->view('mobile/templates/main', $viewData);
	}
}
