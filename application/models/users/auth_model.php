<?php
class Auth_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//User login
	function login($table) {

		$this->db->select('*');
		$this->db->where('email', $_POST['email']);
		$query = $this->db->get($table);
		$row = $query->row();
		$user_data = array();

		$this->session->unset_userdata("user_data");

		if ($this->password->validate_password($_POST['password'], $row->password)) {
			$user_data['id'] = $row->id;
			$user_data['email'] = $row->email;
			$user_data['first_name'] = $row->first_name;
			$user_data['last_name'] = $row->last_name;
			$user_data['user_role_id'] = $row->user_role_id;
			$this->session->set_userdata("user_data", $user_data);
			$role_id = $user_data['user_role_id'];
			switch ($role_id) {
				case '1':
					redirect('coordinators');
					break;
				case '2':
					redirect('advisors');
					break;
				case '3':
					redirect('proposal');
					break;
				case '4':
					redirect('admin');

				default:
					redirect('auth');
					break;
			}
		} else {
			$this->session->set_flashdata('message', 'Sorry, wrong username/password OR you haven’t created an account yet. Click on "register" if this is your first time.');
			redirect("auth");
		}
	}

	//Check if given user email exists
	function check_exists($email, $table) {
		$this->db->where("email", $email);
		$query = $this->db->get($table);
		$exists = false;

		if ($query) {
			if ($query->num_rows() > 0) {
				$exists = true;
			}
		}
		return $exists;
	}

	//Save reset hash
	function save_hash_key($email, $reset_hash, $table) {
		$this->db->where('email', $email);
		$data = array();
		$data['reset_hash'] = $reset_hash;
		$data['reset_timestamp'] = time();
		$this->db->update($table, $data);
	}

	//Get user details
	function get_user($reset_hash, $table) {
		$this->db->where('reset_hash', $reset_hash);
		$query = $this->db->get($table);
		if ($query) {
			return $query->result_array();
		}
	}
	//Reset password
	function reset_password($table, $id) {
		$plain_pass = $this->input->post("user_password", true);
		$data = array();
		$data['password'] = $this->password->create_hash($plain_pass);
		$data['reset_hash'] = "";
		$data['modified'] = time();
		$data['reset_timestamp'] = 0;
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Password reset.');
		}
	}

}
