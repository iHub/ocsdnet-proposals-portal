<?php
class Proposal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$user_data = $this -> session -> userdata("user_data");

        $this -> load -> model("proposal/proposal_model");
    }

    public function index() {
        $user_data = $this -> session -> userdata("user_data");

        $id = $user_data['id'];
        $this -> data['active_menu'] = 1;
        $this -> data['form'] = $this -> proposal_model -> get_researchers($id);
        $proposal = $this -> proposal_model -> get_proposals($id);
        $data=array();
        if ($proposal) {
            $data = $proposal[0];
            $data['present']=1;
        } else {
            $data['present']=0;
        }
       
       
        
        $this -> load -> view("new-proposal/proposal_form", $data);
    }

    public function projectinfo() {
        $data['title'] = $_POST['title'];
        $data['duration'] = $_POST['duration'];
        $data['countries_covered'] = $_POST['countries'];
        $data['regions'] = $_POST['regions'];
        $data['research_themes'] = $_POST['themes'];
        $data['justification_of_research_themes'] = $_POST['justifythemes'];
        $data['budget'] = $_POST['budget'];
        $proposal_id = $this -> proposal_model -> save_study_info($data);
        echo json_encode($proposal_id);

    }

}
