<?php

Class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	public function save($data) {
		if ($data['id']) {
			$this->db->where("id", $data['id']);
			if ($this->db->update("proposals", $data)) {
				return $data['id'];
			}
		} else {
			$this->db->insert("users", $data);
			return $this->db->insert_id();
		}

	}
}