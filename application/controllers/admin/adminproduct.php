<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Admin controller
 *
 *	Is under development. Is intented to provide e-shop backend interface for managers.
 *
 */
class AdminProduct extends CI_Controller {

	public function login() {
        $this->load->helper('cookie');

        $pass = !empty($_GET['pass']) ? $_GET['pass'] : null;
        $passIsGood = ( sha1($pass) == '3640a512b2c8867eb78422def819b1be717fcc21' );

        if ($passIsGood || $this->isLoggedIn()) {
            set_cookie(array(
                'name' => 'admin',
                'value' => 1,
                'expire' => '86500'
            ));
            $this->load->helper('url');
            redirect('/admin/photo');
        } else {
            $this->output->set_status_header('401');
            echo 'Wrong pass bitch';
        }
	}

	public function logout() {
        $this->load->helper('cookie');
        delete_cookie('admin');
        $this->load->helper('url');
        redirect('/');
	}

	public function checkPass() {

	}

    public function isLoggedIn() {
        $this->load->helper('cookie');
        $logged_in = get_cookie('admin');
        return $logged_in;
    }

    public function checkAuth() {
        if (!$this->isLoggedIn()) {
            $this->output->set_status_header('401');
            echo '401 Unauthorized';
            die();
        }
    }

	/** uploadPeoplePhotos
	 *	Loads uploadPeoplePhotos page, which provides form for uploading photos of people wearing Spyoptic sunglasses.
	 */
	public function uploadPeoplePhotos($message="") {
        $this->checkAuth();

		$this->load->model("SunglassesModel");

		$viewData["sunglasses"] = $this->SunglassesModel->selectAll();
		$viewData["message"] = $message;
		$viewData["userDevice"] = "pc";

		$viewData["pageName"] = "uploadPeoplePhotos";
		$this->load->view("admin/page.php", $viewData);
	}

	/** savePeoplePhoto
	 *	Saves new photo of people wearing spyoptic from $_POST.
	 *	Is used by uploadPoeplePhotos form.
	 *
	 *	@return void
	 */	
	public function savePeoplePhoto() {

		// config for photo uploading
		$config['upload_path'] = "./assets/img/peoplePhotos/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) { // on upload failure
			$this->uploadPeoplePhotos($this->upload->display_errors());
		} else { // on upload success
			$uploadData = $this->upload->data();

			$this->load->model("PeoplePhoto");
			$this->PeoplePhoto->addToDb($uploadData["file_name"]);

			$this->uploadPeoplePhotos($uploadData);
		}
	}
}
