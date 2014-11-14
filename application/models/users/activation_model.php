<?php
class Activation_model extends CI_Model {
	function __construct() {
		parent::__construct();
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

	//Get user to activate
	function user_to_activate($hash) {
		$this -> db -> where("activation_hash", $hash);
		$query = $this -> db -> get("users");
		if ($query -> num_rows() > 0) {
			return $query -> row_array();
		}
	}

	//Save user
	function save_sys_user($id) {
		$data = array();
		$plain_password = $_POST['password'];
		$email = $_POST['email'];
		$hashed = $this -> password -> create_hash($_POST['password']);
		$data['password'] = $hashed;
		$data['email'] = $email;
		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
		$data['activation_hash'] = "";
		$data['activation_timestamp'] = 0;
		$data['modified'] = time();
		
		//Update
		$this -> db -> where("id", $id);
		$this -> db -> update("users", $data);

		if ($this -> db -> affected_rows() > 0) {
			$this -> session -> set_flashdata('message', 'Please login using the credentials you just created.');
		}
	}

}
