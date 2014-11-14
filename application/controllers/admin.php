<?php
class Admin extends CI_Controller {

	protected $data = array("title" => "Admin");
	protected $form = array();
	function __construct() {
		parent::__construct();
		//Check if session has been set
		$user_data = $this -> session -> userdata("user_data");

		$role_id = $user_data['user_role_id'];

		if ($role_id == 4) {
			$this -> data['active_menu'] = NULL;
			$this -> load -> library('password');
			$this -> load -> library('email');
			$this -> load -> model("users/admin_model");
			$this -> data['user_roles'] = $this -> admin_model -> get_roles();

		} else {
			//If no session
			$this -> session -> set_flashdata('auth_message', 'Please login.');
			redirect("auth");
		}

	}

	function index() {
		$this -> data['users'] = $this -> admin_model -> get_users();
		$this -> data['active_menu'] = 1;
		$this -> template -> load('user', "admin/users", $this -> data);
	}

	//Add system admin
	function add_user() {
		$this -> data['active_menu'] = 1;
		$this -> template -> load('user', "admin/add_user", $this -> data);
	}

	//Save system user update
	function save_user() {
		$this -> data['active_menu'] = 1;
		$valid = $this -> validate_user();
		if ($valid) {
			$this -> admin_model -> save_user();
			redirect("admin");
		} else {
			(isset($_POST['user_role_id']) ? $this -> form['user_role_id'] = $_POST['user_role_id'] : "");
			$this -> data["form"] = $this -> form;
			$this -> template -> load('user', "admin/add_user", $this -> data);
		}
	}

	//User edits
	function edit_user() {
		$this -> data['active_menu'] = 1;
		$id = $this -> uri -> segment(3);
		$this -> data['form'] = $this -> admin_model -> get_users($id);
		$this -> template -> load('user', "admin/edit_user", $this -> data);
	}

	function save_user_edits() {
		$this -> data['active_menu'] = 1;
		$valid = $this -> validate_user_edits();
		$id = $_POST['user_id'];
		if ($valid) {
			$this -> admin_model -> save_user($id);
			redirect("admin");
		} else {
			$this -> data['form'] = $this -> admin_model -> get_users($id);
			$this -> template -> load('user', "admin/edit_user", $this -> data);
		}
	}

	function delete_user() {
		$id = $this -> uri -> segment(3);
		$this -> admin_model -> delete("users", $id);
		redirect("admin");
	}

	//Review tabs
	function review_tabs() {
		$this -> data['review_tabs'] = $this -> admin_model -> get_tabs();
		$this -> data['active_menu'] = 2;
		$this -> template -> load('user', "admin/review_tabs", $this -> data);
	}

	//Add tab
	function add_tab() {
		$this -> data['active_menu'] = 2;
		$this -> template -> load('user', "admin/add_tab", $this -> data);
	}

	//Edit tab
	function edit_tab() {
		$this -> data['active_menu'] = 2;
		$id = $this -> uri -> segment(3);
		$this -> data['form'] = $this -> admin_model -> get_tabs($id);
		$this -> template -> load('user', "admin/add_tab", $this -> data);
	}

	//Save tab
	function save_tab() {
		$this -> data['active_menu'] = 2;
		$valid = $this -> validate_tab();
		if ($valid) {
			//save
			$this -> admin_model -> save_tab();
			redirect("admin/review_tabs");
		} else {
			(isset($_POST['tab_id']) ? $this -> form['id'] = $_POST['tab_id'] : "");
			$this -> data['form'] = $this -> form;
			$this -> template -> load('user', "admin/add_tab", $this -> data);
		}
	}

	//Delete tab
	function delete_tab() {
		$this -> data['active_menu'] = 2;
		$id = $this -> uri -> segment(3);
		$this -> admin_model -> delete("review_tabs", $id);
		redirect("admin/review_tabs");
	}

	//Tab questions
	function tab_questions() {
		$this -> data['active_menu'] = 2;
		$this -> session -> unset_userdata("tab_id");
		$tab_id = $this -> uri -> segment(3);
		$this -> session -> set_userdata("tab_id", $tab_id);
		$this -> data['tab_data'] = $this -> admin_model -> get_tabs($tab_id, NULL);
		$this -> data["tab_id"] = $tab_id;
		$this -> data['questions'] = $this -> admin_model -> get_questions($tab_id);
		$this -> template -> load('user', "admin/tab_questions", $this -> data);

	}

	//Add questions
	function add_question() {
		$this -> data['active_menu'] = 2;
		$this -> form['tab_id'] = $this -> uri -> segment(3);
		$this -> data['form'] = $this -> form;
		$this -> data["question_types"] = $this -> admin_model -> get_question_types();
		$this -> template -> load('user', "admin/add_questions", $this -> data);

	}

	//Edit question
	function edit_question() {
		$this -> data['active_menu'] = 2;
		$id = $this -> uri -> segment(3);
		$this -> data["question_types"] = $this -> admin_model -> get_question_types();
		$this -> data['form'] = $this -> admin_model -> get_questions(NULL, $id);
		$this -> template -> load('user', "admin/add_questions", $this -> data);
	}

	//Save questions
	function save_questions() {
		$this -> data['active_menu'] = 2;
		$valid = $this -> validate_questions();
		$id = null;

		if ($valid) {
			$tab_id = $_POST['tab_id'];
			(isset($_POST['id']) ? $id = $_POST['id'] : "");
			$this -> admin_model -> save_questions($id);
			redirect("admin/tab_questions/$tab_id");
		} else {
			(isset($_POST['id']) ? $this -> form['id'] = $_POST['id'] : "");
			(isset($_POST['type_id']) ? $this -> form['type_id'] = $_POST['type_id'] : "");
			(isset($_POST['tab_id']) ? $this -> form['tab_id'] = $_POST['tab_id'] : "");

			$this -> data["form"] = $this -> form;
			$this -> data["question_types"] = $this -> admin_model -> get_question_types();
			$this -> template -> load('user', "admin/add_questions", $this -> data);
		}
	}

	//Delete question
	function delete_question() {
		$this -> data['active_menu'] = 2;
		$id = $this -> uri -> segment(3);
		$this -> admin_model -> delete("review_questions", $id);
		$tab_id = $this -> session -> userdata("tab_id");
		$redirect = ($tab_id ? "admin/tab_questions/$tab_id" : "admin/review_tabs");
		redirect($redirect);
	}

	function question_options() {
		$this -> data['active_menu'] = 2;

		$this -> session -> unset_userdata("question_id");
		$question_id = $this -> uri -> segment(3);
		$this -> session -> set_userdata("question_id", $question_id);

		$this -> data['question_data'] = $this -> admin_model -> get_questions(NULL, $question_id);
		$this -> data["question_id"] = $question_id;
		$this -> data['options'] = $this -> admin_model -> get_options($question_id, NULL);

		$this -> template -> load('user', "admin/question_options", $this -> data);
	}

	//Add questions
	function add_options() {
		$this -> data['active_menu'] = 2;
		$question_id = $this -> uri -> segment(3);
		$this -> form['question_id'] = $question_id;
		$this -> data['question_data'] = $this -> admin_model -> get_questions(NULL, $question_id);
		$this -> data['form'] = $this -> form;
		$this -> template -> load('user', "admin/add_options", $this -> data);
	}
	
	//Edit options
	function edit_option(){
		$this -> data['active_menu'] = 2;
		$id = $this -> uri -> segment(3);
		$this -> data['form'] = $this -> admin_model -> get_options(NULL, $id);
		$this -> template -> load('user', "admin/add_options", $this -> data);
	}

	//Save option
	function save_options() {
		
		$this -> data['active_menu'] = 2;
		$valid = $this -> validate_options();
		$id = null;

		if ($valid) {
			$question_id = $_POST['question_id'];
			(isset($_POST['id']) ? $id = $_POST['id'] : "");
			$this -> admin_model -> save_options($id);
			redirect("admin/question_options/$question_id");
		} else {
			(isset($_POST['id']) ? $this -> form['id'] = $_POST['id'] : "");
			(isset($_POST['question_id']) ? $this -> form['question_id'] = $_POST['question_id'] : "");
			$this -> data["form"] = $this -> form;
			$this -> template -> load('user', "admin/add_options", $this -> data);
		}
		
	}
	
	function delete_option(){
		$this -> data['active_menu'] = 2;
		$id = $this -> uri -> segment(3);
		$this -> admin_model -> delete("question_options", $id);
		$question_id = $this -> session -> userdata("question_id");
		$redirect = ($question_id ? "admin/question_options/$question_id" : "admin/review_tabs");
		redirect($redirect);
	}
	
	

	//On user activation validate
	function validate_user() {
		$this -> form_validation -> set_rules('first_name', 'First name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('last_name', 'Last name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|matches[password_conf]|xss_clean');
		$this -> form_validation -> set_rules('password_conf', 'Password confirmation', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('user_role_id', 'User role', 'trim|xss_clean|callback_check_dropdown');
		return $this -> form_validation -> run();
	}

	//On user activation validate
	function validate_user_edits() {
		$this -> form_validation -> set_rules('first_name', 'First name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('last_name', 'Last name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('user_role_id', 'User role', 'trim|xss_clean|callback_check_dropdown');
		return $this -> form_validation -> run();
	}

	//Validate tab
	function validate_tab() {
		$this -> form_validation -> set_rules("tab", "Review tab", "trim|required|xss_clean");
		$this -> form_validation -> set_rules("description", "Review tab description", "trim|xss_clean");
		return $this -> form_validation -> run();
	}

	//Validate questions
	function validate_questions() {
		$this -> form_validation -> set_rules('question', 'Question', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('type_id', 'Question type', 'trim|xss_clean|callback_check_dropdown');
		return $this -> form_validation -> run();
	}
	
	function validate_options(){
		$this -> form_validation -> set_rules('option', 'Option', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('description', 'Description', 'trim|required|xss_clean');
		return $this -> form_validation -> run();
	}

	//Validate dropdown
	function check_dropdown($value) {
		if ($value == 0) {
			$this -> form_validation -> set_message('check_dropdown', "Please select %s");
			return false;
		} else {
			return true;
		}
	}

}
