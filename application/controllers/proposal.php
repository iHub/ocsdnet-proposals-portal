<?php
class Proposal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$user_data = $this -> session -> userdata("user_data");
        
        $this -> load -> model("proposal/proposal_model");
    }

    public function index() {
        // $user_data = $this -> session -> userdata("user_data");
        // $id = $user_data['id'];
        // $this -> data['active_menu'] = 1;
        // $this -> data['form'] = $this -> proposal_model -> get_researchers($id);
        //$this-> load('default', "new-proposal/proposal_form", $this -> data);
        $this->load->view("new-proposal/proposal_form");
    }

   

}
