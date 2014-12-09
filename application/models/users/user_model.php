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
    function get_collaborators($id) {
        $users = array();
        $this -> db -> where("researcher_id", $id);
        $this -> db -> where("user_role_id", 5);
        $query = $this -> db -> get("users");
 
        if ($query -> num_rows() > 0) {
           
                $users = $query -> result_array();
           
        }
 
        return $users;
    }
    public function getUser($id){
        $this -> db -> where("id", $id);
       
        $query = $this -> db -> get("users");
        $user="";
        if ($query -> num_rows() > 0) {
            $user = $query ->row_array();
        }
        return $user;
    }
    public function getproposing($id){
        $users = array();
        $this -> db -> where("researcher_id", $id);
        $this -> db -> where("user_role_id", 6);
        $query = $this -> db -> get("users");
 
        if ($query -> num_rows() > 0) {
           
                $users = $query -> row_array();
           
        }
 
        return $users;
    }
    public function getparticipating($id){
         $users = array();
        $this -> db -> where("researcher_id", $id);
        $this -> db -> where("user_role_id", 7);
        $query = $this -> db -> get("users");
 
        if ($query -> num_rows() > 0) {
           
                $users = $query -> result_array();
           
        }
 
        return $users;
    }
}