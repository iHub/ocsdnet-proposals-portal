<?php
class Auth extends CI_Controller {
	
	protected $data = array("title" => "User authentication");

	function __construct() {
		parent::__construct();
		$this->load->library('password');
        $this->load->library('email');
		$this->load->model("users/auth_model");
	}

	function index() {
		$this -> template -> load('user', "users/login", $this -> data);	
	}
	function login(){
		$valid = $this->validate();
		if($valid){
			$this->auth_model->login("users");
		}else{
			$this -> template -> load('user', "users/login", $this -> data);
		}
	}
	
	//Validate login
	function validate(){
        $this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
        $this -> form_validation -> set_rules('password', 'Password', 'trim|required|xss_clean');
        
        return $this -> form_validation -> run();
	}
	
	//Logout user
    function logout() {
        $this -> session -> sess_destroy();
        redirect('auth');
    }
	
	/*
	 * Edit functions below here
	 * to reflect
	 */    
    function password_reset() {
        //Load form for password reset
        $this->data['title'] = "Reset password";
        $this -> template -> load('default', 'users/request_reset', $this -> data);
    }

    //Check if email for request exists
    function email_exists() {
        $this -> form_validation -> set_rules('email_reset', 'Email', 'required|valid_email|xss_clean');
        $valid = $this -> form_validation -> run();

        if ($valid) {
            //Check if email exists
            $email = $this -> input -> post('email_reset', true);
            $exists = $this -> auth_model -> check_exists($email, "users");
				
            
            if ($exists) {
                $reset_hash = $this -> getRandomWord();
                
                $this -> auth_model -> save_hash_key($email, $reset_hash, "users");

                //Send email to given user with reset link
                $reset_link = site_url() . "/auth/recover_password/" . $reset_hash;

                $message = "Click on the link below within the next 24 hours to reset your password.";

                $message = $message . "\r\n" . $reset_link;

                $message = str_replace("\r\n", "<br>", $message);
                 
                //Email reset Link and notify user
                $this -> session -> set_flashdata('message', 'A password reset email has been sent to you.');
                $this -> send_email($message, $email, "Password reset");
                
                redirect('auth/login');
            }else{
       
                $this -> session -> set_flashdata('message', 'Email does not exist.');
                redirect('auth/password_reset');
                
            }
            
        } else {
            
            //Not valid email display errors.
            $this -> template -> load('default', 'users/request_reset', $this -> data);
            
        }
    }

    //Send email
    function send_email($message, $email_address, $subject) {
        $this -> email -> from('info@ocsdnet.org', 'OCSDNet');
        $this -> email -> to($email_address);
        $this -> email -> subject($subject);
        $this -> email -> message($message);
        $this -> email -> send(); 
        //echo $this -> email -> print_debugger();
        //die;
    }

    //Recover password
    function recover_password() {
        $this->data['title'] = "Reset password";
        $reset_hash= $this -> uri -> segment(3);
        $this -> session -> unset_userdata('reset_user_data');
        $reset_user_data = $this -> auth_model -> get_user($reset_hash, "users");
		$hours = NULL;
        if (count($reset_user_data) > 0) {
            $reset_timestamp = $reset_user_data[0]['reset_timestamp'];
            $now = time();
            $time_diff = $now - $reset_timestamp ;
            $hours = floor($time_diff / 3600);
        }
        if ($hours <= 25) {
            $this -> session -> set_userdata('reset_user_data', $reset_user_data);
            $this -> template -> load('default', 'users/reset_form', $this -> data);
        } else {
            $this -> session -> set_flashdata('message', 'Reset link has expired.');
            redirect('auth/password_reset');
        }
    }
    //Reset user password
    function reset_user_password() {
        $this -> form_validation -> set_rules('user_password', 'Password', 'trim|required|matches[user_password2]|xss_clean');
        $this -> form_validation -> set_rules('user_password2', 'Password confirmation', 'trim|required|xss_clean');
        $valid = $this -> form_validation -> run();

        if ($valid) {
            $user_reset_data = $this -> session -> userdata('reset_user_data');
            $id = $user_reset_data[0]['id'];
            //Now change password
            $this -> auth_model -> reset_password("users", $id);
			
            redirect('auth');
        } else {
            $this -> template -> load('default', 'users/reset_form', $this -> data);
        }
    }

    //Get random word
    function getRandomWord() {
        $len = 20;
        $word = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        shuffle($word);
        $random =  substr(implode($word), 0, $len); 
        return md5($random);
    }

}
