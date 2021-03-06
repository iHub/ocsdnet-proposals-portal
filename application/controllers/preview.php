<?php

class Preview extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$user_data = $this -> session -> userdata("user_data");

        $this->load->model("proposal/proposal_model");
        $this->load->model("users/user_model");
        $this->load->model("proposal/budget_model");
    }
    public function index(){
        $user_data = $this->session->userdata("user_data");
        $id = $user_data['id'];
        $user=$this->user_model->getUser($id);
        
        $proposal = $this->proposal_model->get_proposals($id);
        $data = array();
        if ($proposal) {
            $data = $proposal[0];
            $data['present'] = 1;
        } else {
            $data['present'] = 0;
        } 
        
        if($data['proposal_status']==1){
            redirect('proposal/submit');
        }
             
        $collaborators=$this->user_model->get_collaborators($id);
        $proposing_institution=$this->user_model->getproposing($id);
        $participating_institution=$this->user_model->getparticipating($id);
        $budgets=$this->budget_model->getbudgets($data['id']);
        $data['budgets']=$budgets;
        $data['proposing_institution']=$proposing_institution;
        $data['participating_institution']=$participating_institution;
        $data['collaborators']=$collaborators;
        $data['user']=$user;
        
        $this->load->view("new-proposal/proposal_preview", $data);
    }
}