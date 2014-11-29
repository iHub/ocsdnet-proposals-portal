<?php
class User extends CI_Controller {
    function __construct() {
        parent::__construct();
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
        
        $user=$this->user_model->getUser($id);
        $data['present'] = 0;
        if($user){
            $data['present'] = 1;
        }
        $data['user']=$user;
        
        
        
        $this->load->view("users/edit_user",$data);
    }
    public function editpost(){
        
    }
}