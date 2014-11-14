<?php
class Register extends CI_Controller {
	protected $data = array("title" => "Register");

	function __construct() {
		parent::__construct();
		$this->load->library('password');
        $this->load->library('email');
		$this->load->model("users/registration_model");
	}
	
	function index() {
		$this -> template -> load('user', "users/register", $this -> data);
	}
		
	function  new_user(){
		$valid = $this->validate();
		if($valid){
			//Register User
			$this->registration_model->register_account(3);
			redirect("auth");
		}else{
			$this -> template -> load('user', "users/register", $this -> data);
		}
		
	}
	
	
	function validate(){
        $this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this -> form_validation -> set_rules('password', 'Password', 'trim|required|matches[password_conf]|xss_clean');
        $this -> form_validation -> set_rules('password_conf', 'Password confirmation', 'trim|required|xss_clean');
        return $this -> form_validation -> run();
	}

}
