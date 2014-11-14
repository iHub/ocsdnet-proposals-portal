<?php
class Activate extends CI_Controller {

	protected $data = array("title" => "User activation");
    protected $form = array();
	function __construct() {
		parent::__construct();

		$this -> load -> library('password');
		$this -> load -> library('email');
		$this -> load -> model("users/activation_model");
		$this -> data['user_roles'] = $this -> activation_model -> get_roles();

	}

	function index() {
		
	}
	
	function user_activation(){
		$hash = $this -> uri -> segment(3);
		
		if (isset($hash)) {
			$this -> data['form'] = $this -> activation_model -> user_to_activate($hash);
			$this -> template -> load('user', "users/activate", $this -> data);

		} else {
			redirect("auth");
		}
	}

	function save_sys_user() {
		$valid = $this -> validate_activation();

		if ($valid) {
			$id = $_POST['user_id'];
			$this -> activation_model -> save_sys_user($id);
			redirect("auth");
		} else {
			$this->form['id'] = $_POST['user_id'];
			$this->form['email'] = $_POST['user_email'];
			$this->data['form'] = $this->form;
			$this -> template -> load('user', "users/activate", $this -> data);
		}
	}

	//On user activation validate
	function validate_activation() {
		$this -> form_validation -> set_rules('first_name', 'First name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('last_name', 'Last name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|matches[password_conf]|xss_clean');
		$this -> form_validation -> set_rules('password_conf', 'Password confirmation', 'trim|required|xss_clean');
		return $this -> form_validation -> run();
	}

}
