<?php
class Registration_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    //Register new account
    function register_account($role_id) {
        $data = array();
        $plain_password = $_POST['password'];
        $email = $_POST['email'];
        $hashed = $this -> password -> create_hash($_POST['password']);
        $data['password'] = $hashed;
        $data['email'] = $email;
        $data['created'] = time();
         $data['user_role_id'] = $role_id; //Researcher role
        $query = $this -> db -> insert("users", $data);
        if ($this -> db -> affected_rows() > 0) {
            //Email user
            $message = "Dear esteemed colleague " . "\r\n";
            $message .= "Thank you for registering for an account with the Open and Collaborative Science in Development Network. 
                        This email has been sent to confirm your registration." . "\r\n";
                        
            $message .="To access your account, please follow this link or copy and paste it in your browser: ";
            
            $message .= base_url() . "\r\n";
            
            // $message .= "Your username is: " . $data['email'] . "\r\n";
            // $message .= "Your password is: " . $plain_password . "\r\n";
<<<<<<< HEAD
=======
            
>>>>>>> 0cab48cb2e5a5e49c9725bb59dd53b4120d02688
            $message .="Use your email and password to login ";
            
            $message .="If you experience any problems please contact us at info@ocsdnet.org" . "\r\n";
            
            $message .="Best Regards," . "\r\n";
            
            $message .="OCSDNet Team" . "\r\n";
            
            $message = str_replace("\r\n", "<br>", $message);
            
            //Email user
            $this -> send_email($message, $email, "OCSDNet Registration");
            $this -> session -> set_flashdata('message', 'Check your email for your registration details.');
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
    }

    //Fetch users
    function get_users($user_id = NULL, $user_role_id = NULL, $name = NULL) {
        $this -> db -> select("user_id, email, first_name, last_name, user_role");
        $this -> db -> from("users");
        $this -> db -> join("user_roles", "users.user_role_id = user_roles.user_role_id", "left");
        (!is_null($user_id) ? $this -> db -> where('user_id', $user_id) : "");
        (!is_null($user_role_id) ? $this -> db -> where('users.user_role_id', $user_role_id) : "");

        if (!is_null($name)) {
            $this -> db -> like('first_name', $name);
            $this -> db -> or_like('last_name', $name);
        }
        $query = $this -> db -> get();

        if ($query) {
            return $query -> result_array();
        }
    }

    //User roles
    function get_roles() {
        $user_roles = array();
        $user_roles[0] = "Assign role";
        $query = $this -> db -> get("user_roles");

        if ($query) {
            foreach ($query->result() as $row) {
                $user_roles[$row -> user_role_id] = $row -> user_role;
            }
        }
        return $user_roles;
    }

    

    

    //Update user
    function update($user_id) {
        $data['username'] = $_POST['email'];
        $data['email'] = $_POST['email'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['modified'] = time();
        $role_id = $_POST['user_role_id'];
        ($role_id > 0 ? $data['user_role_id'] = $role_id : "");
        $this -> db -> where('user_id', $user_id);
        $this -> db -> update("users", $data);

    }

    //Delete user
    function delete_user($user_id) {
        $this -> db -> where('user_id', $user_id);
        $this -> db -> delete("users");
    }

}
