<?php

Class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function save($data, $id = 0) {
		if ($id) {
			$this->db->where("id", $id);
			$this->db->update('users', $data);
            return $id;
		} else {
			$this->db->insert("users", $data);
			return $this->db->insert_id();
		}

	}
}
