<?php
class Budget_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	public function save($data) {
		
			$this->db->insert("budgets", $data);
			return $this->db->insert_id();
	}
    public function update(){
        
    }
    public function getbudgets($proposal_id){
        $this -> db -> where("proposal_id", $proposal_id);
       
        $query = $this -> db -> get("budgets");
        $budgets="";
        if ($query -> num_rows() > 0) {
            $budgets = $query ->result_array();
        }
        return $budgets;
    }
}
