<?php
class Proposal_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	

	//Proposal status

	function status($researcher_id, $proposal_id = NULL) {

		$research_status = true;
		$proposal_status = true;

		//Researcher Fields
		$fields = $this -> db -> list_fields("users");
		$remove = array("designation", "telephone", "website", "role_in_project",  "idrc_affiliation", "created", "modified", "reset_hash", "reset_timestamp", "activation_hash", "activation_timestamp");
		$researcher_fields = array_diff($fields, $remove);
		
		//Researcher check
		$this -> db -> where("id", $researcher_id);
		$query = $this -> db -> get("users");
		if ($query -> num_rows() > 0) {
			$data = array();
			$data = $query -> row_array();

			foreach ($researcher_fields as $key => $value) {
				$field = $researcher_fields[$key];
				if (strcasecmp($data[$field], "") == 0 || is_null($data[$field])) {
					$research_status = false;
					break;
				}
			}
		}

		//Proposal check
		if (is_null($proposal_id)) {
			$proposal_status = false;
		} else {
			//Proposal
		    $fields = $this -> db -> list_fields("proposals");
			$remove = array("status", "attending_workshop", "completed_timestamp", "reviewer_id", "review_status", "reviewer_comments", "coordinators_comments");
			$proposal_fields = array_diff($fields, $remove);
			
			
			
			
			//Loop through content to check it out
			$this -> db -> where("id", $proposal_id);
			$query = $this -> db -> get("proposals");
			if ($query -> num_rows() > 0) {
				$data = array();
				$data = $query -> row_array();

				foreach ($proposal_fields as $key => $value) {
					$field = $proposal_fields[$key];
					if (strcasecmp($data[$field], "") == 0 || is_null($data[$field])) {
						$proposal_status = false;
						break;
					}
				}
			}
		}
		//Unset
		$this->session->unset_userdata("researcher_status");
		$this->session->unset_userdata("proposal_status");
		
		//Set
		$this->session->set_userdata("researcher_status", $research_status);
		$this->session->set_userdata("proposal_status", $proposal_status);
	
	}
     
	 //If proposal exists
     function proposal_exists($id){
     	$this->db->where("id", $id);
		$query = $this->db->get("proposals");
		
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
     	
     }

     //Function check submitted
     function has_submitted($researcher_id){
     	$this->db->where("researcher_id", $researcher_id);
		$query = $this->db->get("proposals");
		
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				if(strcasecmp($row->status, "complete")==0){
					$this->session->unset_userdata("completed_proposal_id");
					$this->session->set_userdata("completed_proposal_id", $row->id);
					return true;
					
					break;
				}
				
			}
		}
		
		return false;
		
		
     }
	 
	 function has_proposal($researcher_id){
	 	$this->db->where("researcher_id", $researcher_id);
		$query = $this->db->get("proposals");
		
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}
	 	
	 }
	 

	//Get proposals
	function get_proposals($researcher_id) {
		$this -> db -> select("*");
		$this -> db -> from("proposals");
		$this -> db -> where("researcher_id", $researcher_id);

		$query = $this -> db -> get();

		$proposals = array();

		if ($query -> num_rows() > 0) {

			$proposals = $query -> result_array();

		}

		return $proposals;
	}

	function get_all($proposal_id) {
		$preview_data = array();
		$researcher_id = "";

		//Proposal
		$this -> db -> where("id", $proposal_id);
		$query = $this -> db -> get("proposals");
		if ($query -> num_rows() > 0) {
			$proposal_data = $query -> row_array();
			$researcher_id = $proposal_data["researcher_id"];
			$preview_data['proposal'] = $proposal_data;
		}

		//Researcher
		$this -> db -> where("id", $researcher_id);
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			$preview_data['researcher'] = $query -> row_array();
		}

		//Collaborators
		$this -> db -> where("researcher_id", $researcher_id);
		$query = $this -> db -> get("collaborators");

		if ($query -> num_rows() > 0) {
			$preview_data['collaborators'] = $query -> result_array();
		}

		return $preview_data;
	}

	//Researchers
	function get_researchers($id = null) {
		(!is_null($id) ? $this->db->where("id", $id) : "");

		$query = $this -> db -> get("users");

		$research_data = array();

		if ($query -> num_rows() > 0) {
			$research_data = $query -> row_array();
		}
		return $research_data;
	}

	//Collaborators
	function get_collaborators($id = null, $researcher_id = null) {
		(!is_null($id) ? $this -> db -> where("id", $id) : "");
		(!is_null($researcher_id) ? $this -> db -> where("researcher_id", $researcher_id) : "");
		$query = $this -> db -> get("collaborators");

		$research_data = array();

		if ($query -> num_rows() > 0) {
			if (is_null($id)) {
				//Multiple collaborators
				$research_data = $query -> result_array();

			} else {
				//Single collaborator
				$research_data = $query -> row_array();
			}

		}
		return $research_data;
	}

	//Function save researcher
	function save_researcher($table, $id = null, $fk = null) {
		$data = array();
		$countries = $this->get_countries();
		$data["first_name"] = $this -> input -> post("first_name", true);
		$data["designation"] = $this -> input -> post("designation", true);
		$data["gender"] = $_POST['gender'];
		$data["email"] = $this -> input -> post("email", true);
		$data["last_name"] = $this -> input -> post("last_name", true);
		$data["telephone"] = $this -> input -> post("telephone", true);
		$data["website"] = $this -> input -> post("website", true);
		$data["organization"] = $this -> input -> post("organization", true);
		$data["country_of_incorporation"] = $countries[$_POST["country_of_incorporation"]];
		$data["country_of_residence"] = $countries[$_POST["country_of_residence"]];
		$data["country_of_citizenship"] =  $countries[$_POST["country_of_citizenship"]];
		$data["expertise"] = $this -> input -> post("expertise", true);
		$data["publications"] = $this -> input -> post("publications", true);
		$data["office_address"] = $this -> input -> post("office_address", true);
		$data["role_in_project"] = $this -> input -> post("role_in_project", true);

		//If IRDC affiliation is set
		(isset($_POST['idrc_affiliation']) ? ($data["idrc_affiliation"] = $_POST['idrc_affiliation']) : "");

		//If $fk is set and collabos
		((!is_null($fk) && strcasecmp("collaborators", $table) == 0) ? $data['researcher_id'] = $fk : "");

		$data["modified"] = time();
		if (is_null($id)) {
			//Insert
			$this -> db -> insert($table, $data);
		} else {
			//Update
			$this -> db -> where("id", $id);
			$this -> db -> update($table, $data);
		}
	}

	//Save study info
	function save_study_info($data, $id = null) {
		if (is_null($id)) {
			//Insert new proposal
			$this -> db -> insert("proposals", $data);
			return $this->db->insert_id();
		} else {
			//Update proposal
			$this -> db -> where("id", $id);
			$this -> db -> update("proposals", $data);
		}
	}

	//Get Study info
	function get_study_data($id = null, $researcher_id) {
		(!is_null($id) ? $this -> db -> where("id", $id) : "");
		$this -> db -> where("researcher_id", $researcher_id);
		$query = $this -> db -> get("proposals");

		$study_data = array();

		if ($query -> num_rows() > 0) {
			if (is_null($id)) {
				//Multiple proposals
				$study_data = $query -> result_array();

			} else {
				//Single proposal
				$study_data = $query -> row_array();
			}

		}
		return $study_data;

	}

	//Proposal status

	function update_proposal_status($id = NULL, $proposal_id, $status) {
		$data = array();
		if (is_null($id)) {
			//Insert
			$data['status'] = $status;
			$data['proposal_id'] = $proposal_id;
			$this -> db -> insert("proposal_status", $data);
		} else {
			//Insert
			$data['status'] = $status;
			$this -> db -> where("id", $id);
			$this -> db -> update("proposal_status", $data);
		}

	}

	//Delete table
	function delete_table($table, $id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($table);
	}
	
	//Complete submission
	function complete(){
		
		$id = $_POST['proposal_id'];
		$email = $_POST["user_email"];

		$data = array();
		if(isset($_POST["attending_workshop"])){
			$data["attending_workshop"] = $_POST["attending_workshop"] ;
		}
		$data['status'] = 'complete';
		$data["completed_timestamp"] = time();
		$this->db->where("id", $id);
		$this->db->update("proposals", $data);

		 if ($this -> db -> affected_rows() > 0) {
            //Email user
            $message = "Dear esteemed colleague " . "\r\n";
            $message .= "Thank you very much for submitting your application. It will be reviewed by the board of advisors and short-listed Concept Notes will be notified on September 24, 2014." . "\r\n";
						 
            $message .="Best Regards," . "\r\n";
			
			$message .="OCSDNet Team" . "\r\n";

            $message = str_replace("\r\n", "<br>", $message);
			
            //Email user
            $this -> send_email($message, $email, "OCSDNet confirmation");
        }
		 
	}
	//Check if complete
	function check_complete($id){
		$complete = false;
		$this->db->where("id", $id);
		$query = $this->db->get("proposals");
		if($query->num_rows()>0){
			$row = $query->row_array();
			if(strcasecmp($row['status'], "complete")==0 ){
				$complete = true;
			}
		}
		return $complete;
	}
	
	//Get countries
	function get_countries(){
		$countries = array();
		$countries[0] = "-- Select country --";
		$this->db->order_by("country","asc");
		$query =$this->db->get("countries");

		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$countries[$row->id] = $row->country;
			}
		}
		return $countries;
	}
	
	function get_gender(){
		$gender = array();
		$gender[0] = "--Select gender--";
		$gender['male'] = "Male";
		$gender['female'] = "Female";
		$gender['other'] = "Other";
		return $gender;
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
	
		function get_approved_proposals(){
		//get name of researcher and advisor
		//$this->db->select("CONCAT(first_name, ' ', last_name) AS full_name", FALSE);
		$this->db->select('U.first_name,U.last_name,U.organization,A.countries_covered,A.study_title,A.id');
		$this->db->select("CONCAT(B.first_name, ' ', B.last_name) AS full_name", FALSE);
		$this->db->from('users AS U');
		$this->db->join('proposals AS A', 'A.researcher_id = U.id','left');
		$this->db->join('users AS B', 'A.reviewer_id = B.id','left');
		$this->db->where('A.shortlisted','yes');

		$query=$this->db->get();
		if($query->num_rows()>0){
			 foreach ($query->result() as $row)
			   {
			
			   	
				 $row->first_name;
				 $row->last_name;
				 $row->organization;
				 $row->countries_covered;
				 $row->study_title;
				$row->full_name;
				 	
			
					return $query->result();
			  }
			   
			
			
		
		}

	}
		

}
