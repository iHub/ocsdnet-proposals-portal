<?php
class Admin_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Get users
	function get_users($id = null) {
		$users = array();
		(is_null($id) ? "" : $this -> db -> where("id", $id));
		$this -> db -> where("user_role_id !=", 3);	
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			if (is_null($id)) {
				$users = $query -> result_array();
			} else {
				$users = $query -> row_array();
			}

		}

		return $users;
	}

	//Get user roles
	function get_roles() {
		$query = $this -> db -> get("user_roles");
		$user_roles = array();
		$user_roles[0] = "-- Select user role -- ";
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {

				$user_roles[$row -> id] = $row -> user_role;
			}
		}

		return $user_roles;
	}

	//Save user
	function save_user($id = null) {
		$data = array();
		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
		$data['email'] = $_POST['email'];
		$data['user_role_id'] = $_POST['user_role_id'];
		if (isset($_POST['password'])) {

			$hashed = $this -> password -> create_hash($_POST['password']);
			$data['password'] = $hashed;
		}

		if (is_null($id)) {
			//Insert
			$data['created'] = time();
			$this -> db -> insert("users", $data);

		} else {
			//Update
			$data['modified'] = time();
			$this -> db -> where("id", $id);
			$this -> db -> update("users", $data);
		}
	}

	//Save tab
	function save_tab() {
		$data = array();
		$data["tab"] = $_POST["tab"];
		$data["description"] = $_POST["description"];
		if (isset($_POST['tab_id'])) {
			//Update
			$id = $_POST["tab_id"];
			$this -> db -> where("id", $id);
			$this -> db -> update("review_tabs", $data);
		} else {
			//Insert
			$this -> db -> insert("review_tabs", $data);
		}

		if ($this -> db -> affected_rows() > 0) {
			$this -> session -> set_flashdata("tab_message", "Review tab saved successfully..!");
		}
	}

	//Get tabs
	function get_tabs($id = null) {
		(is_null($id) ? "" : $this -> db -> where("id", $id));

		$query = $this -> db -> get("review_tabs");

		$review_tabs = array();

		if ($query -> num_rows() > 0) {

			if (is_null($id)) {
				$review_tabs = $query -> result_array();
			} else {
				$review_tabs = $query -> row_array();
			}

		}

		return $review_tabs;
	}

	//Get Questions
	function get_questions($tab_id = NULL, $id = NULL) {
		(is_null($id) ? "" : $this -> db -> where("id", $id));
		(is_null($tab_id) ? "" : $this -> db -> where("tab_id", $tab_id));
		
		$query = $this -> db -> get("review_questions");

		$questions = array();

		if ($query -> num_rows() > 0) {
			if (is_null($id)) {
				$questions = $query -> result_array();
			} else {
				$questions = $query -> row_array();
			}
		}

		return $questions;

	}
	

	//Get question types
	function get_question_types() {
		$types = array();

		$query = $this -> db -> get("question_types");

		if ($query -> num_rows() > 0) {

			$types[0] = "-- Select type -- ";

			foreach ($query->result() as $row) {
				$types[$row -> id] = $row -> question_type;
			}
		}

		return $types;

	}

	//Save questions
	function save_questions($id = null) {
		$data = array();
		$data["question"] = $_POST["question"];
		$data["type_id"] = $_POST["type_id"];
		$data["tab_id"] = $_POST["tab_id"];

		if (is_null($id)) {
			//Insert
			$this -> db -> insert("review_questions", $data);
		} else {
			//Update
			$this -> db -> where("id", $id);
			$this -> db -> update("review_questions", $data);
		}
	}
	
	//Get options
	function get_options($question_id = NULL, $id = NULL) {
		(is_null($id) ? "" : $this -> db -> where("id", $id));
		(is_null($question_id) ? "" : $this -> db -> where("question_id", $question_id));
		
		$query = $this -> db -> get("question_options");

		$options = array();

		if ($query -> num_rows() > 0) {
			if (is_null($id)) {
				$options = $query -> result_array();
			} else {
				$options = $query -> row_array();
			}
		}
		return $options;
	}
	
	//Save options
	function save_options($id=NULL){
		$data = array();
		$data["option"] = $_POST["option"];
		$data["description"] = $_POST["description"];
		$data["question_id"] = $_POST["question_id"];
		
		if (is_null($id)) {
			//Insert
			$this -> db -> insert("question_options", $data);
		} else {
			//Update
			$this -> db -> where("id", $id);
			$this -> db -> update("question_options", $data);
		}
	}

	//Delete table
	function delete($table, $id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($table);
	}

}
