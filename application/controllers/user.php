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
        $user_role=$_POST['user_role_id'];
        if($user_role < 6){
            $data['first_name'] = $_POST['name'];
            $data['gender'] = $_POST['gender'];
            $data['email'] = $_POST['email'];
            $data['telephone'] = $_POST['phone'];
            $data['designation'] = $_POST['designation'];
            $data['organization'] = $_POST['organization'];
            $data['country_of_incorporation'] = $_POST['countryincorporation'];
            $data['office_address'] = $_POST['address'];
            $data['idrc_affiliation'] = $_POST['affliation'];
            $data['country_of_citizenship'] = $_POST['citizenship'];
            $data['website'] = $_POST['website'];
             $data['website'] = $_POST['website'];
            $data['idrc_affiliation'] = $_POST['affliation'];
            $data['country_of_residence'] = $_POST['residence'];
            $data['expertise'] = $_POST['expertise'];
            $data['relevant_publications'] = $_POST['publications'];
            $uploaddir = realpath(dirname(__DIR__));
            $upload_array=explode("/application", $uploaddir);
            $uploaddir = $upload_array[0]."/uploads";
            $upload_path=base_url()."uploads";
            $tmp_name = $_FILES["qualification"]["tmp_name"];
            
            $name = $_FILES["qualification"]["name"];
            $name_array=explode('.',$name);
            
            $name_path=$name_array[0].time();
            $file_name=$name_path.".".$name_array[1];
            
            $path = $upload_path.'/'.$file_name;
            $data["qualifications_and_experience"] = "";
            
            if (move_uploaded_file($tmp_name, "$uploaddir/$file_name")) {
                $data["qualifications_and_experience"] = $path;
            }
        }elseif($user_role==6){
            $data['first_name'] = $_POST['name'];
           $data['email'] = $_POST['email'];
           $data['telephone'] = $_POST['phone'];
           $data['mailing_address'] = $_POST['mailaddress'];
           $data['finance_name'] = $_POST['financename'];
           $data['office_address'] = $_POST['address'];
           $data['finance_email'] = $_POST['financeemail'];
           $data['finance_phone'] = $_POST['financephone'];
           $data['researcher_id'] = $_POST['researcher_id'];
           $data['user_role_id']=6;
        }elseif($user_role==7){
            $data['first_name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['telephone'] = $_POST['phone'];
            $data['mailing_address'] = $_POST['mailingaddress'];
            $data['office_address'] = $_POST['address'];
            $data['role_in_project'] = $_POST['role'];
            $data['researcher_id'] = $_POST['researcher_id'];
            $data['user_role_id']=7;
        }
            $id=$_POST['user_id'];
            
            $user_id = $this->user_model->save($data, $id);
           echo json_encode($user_id);
        
    }
}