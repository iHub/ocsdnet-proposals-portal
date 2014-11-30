<?php

class Budget extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$user_data = $this -> session -> userdata("user_data");

        $this->load->model("proposal/proposal_model");
        $this->load->model("users/user_model");
        $this->load->model("proposal/budget_model");
    }
    public function edit(){
        $user_data = $this->session->userdata("user_data");
        $user_id = $user_data['id'];
        if(!$user_id){
            
        }
        $id=$this->uri->segment(3);
        if(!$id){
            
        }
        
        $budget=$this->budget_model->getbudget($id);
        $data['present'] = 0;
        if($budget){
            $data['present'] = 1;
        }
        
        $data['budget']=$budget;
        
       $this->load->view("budget/edit_budget",$data);
    }
    public function editbudget(){
        $data['donor'] = $_POST['donor'];
        $id=$_POST['budget_id'];
        $data['amount'] = $_POST['amount'];
        $data['currency'] = $_POST['currency'];
        $data['timeframe'] = $_POST['timeframe'];      
        $budget_id = $this->budget_model->update($data,$id);
        echo json_encode($budget_id);
    }
}