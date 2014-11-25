<?php
class Budget_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	public function save($data) {
		
			$this->db->insert("budgets", $data);
			return $this->db->insert_id();
	}
}
