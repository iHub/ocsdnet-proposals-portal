<?php
class Coordinators_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Get Advisor/Coordinator
	//Get users
	function get_users($id) {
		$users = array();
		$this -> db -> where("id", $id);
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			if (is_null($id)) {
				$users = $query -> result_array();
			} else {
				$users = $query -> row_array();
			}

		}

		return $users;
	}

	//Get proposals
	function get_researchers($id = NULL) {
		$this -> db -> where("user_role_id", 3);

		(!is_null($id) ? $this -> db -> where("id", $id) : "");

		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}
	}

	function get_completes($incompletes = NULL, $column = NULL, $order = NULL, $reviewed = NULL) {
		$sql = "SELECT u.id, u.first_name, u.last_name, u.organization, p.id as proposal_id, 
				p.study_title, p.countries_covered, p.reviewer_id, p.award_status, p.review_status
				FROM users u
				INNER JOIN  proposals p ON u.id = p.researcher_id
				WHERE u.user_role_id = 3 
				AND p.proposal_status = '1'
				";
		//Incomplete - Complete
		$sql .= (is_null($incompletes) ? " AND p.status = 'complete'" : " AND p.status != 'complete'");
		
		
		
		//Reviewed
		$sql .= (!is_null($reviewed) ? " AND p.review_status = 'complete'" : "");

		//Order By
		$sql .= (!is_null($sql) && !is_null($order) ? "ORDER BY $column $order" : "");

		$query = $this -> db -> query($sql);
		
		$data = array();

		if ($query -> num_rows() > 0) {

			foreach ($query->result() as $row) {
				$temp = array();
				$temp["first_name"] = $row -> first_name;
				$temp["last_name"] = $row -> last_name;
				$temp["organization"] = $row -> organization;
				$temp["proposal_id"] = $row -> proposal_id;
				$temp["study_title"] = $row -> study_title;
				$temp["countries_covered"] = $row -> countries_covered;
				$temp["reviewer_id"] = $row -> reviewer_id;
				$temp["award_status"] = $row->award_status;
				$temp["review_status"] = $row->review_status;
				

				if (isset($row -> reviewer_id)) {
					$this -> db -> select("first_name, last_name");
					$this -> db -> from("users");
					$this -> db -> where("id", $row -> reviewer_id);
					$advisor_query = $this -> db -> get();
					if ($advisor_query -> num_rows() > 0) {
						$advisor_row = $advisor_query -> row();
						$names = $advisor_row -> first_name . " " . $advisor_row -> last_name;
						$temp["advisor"] = $names;
					}
				}

				$data[] = $temp;

			}
			//return $query -> result_array();

			return $data;
		}
	}

	//get_advisors();
	function fetch_advisors() {
		$this -> db -> select("id, first_name, last_name");
		$this -> db -> from("users");
		$this -> db -> where("user_role_id", 2);
		$query = $this -> db -> get();
		$advisors = array();
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$names = $row -> first_name . " " . $row -> last_name;
				$advisors[$row -> id] = $names;
			}
		}

		return $advisors;

	}
	
	//fetch proposal advisors
		function fetch_reviewers($proposal_id) {
		$this -> db -> select("id,reviewer_id,review_status");
		$this -> db -> from("proposal_reviewers");
		$this -> db -> where("proposal_id", $proposal_id);
		$query = $this -> db -> get();
		$reviewers = array();
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->review_status;
				$this -> db -> select("id, first_name, last_name");
				$this -> db -> from("users");
				$this -> db -> where("id", $row->reviewer_id);
				$query = $this -> db -> get();
				if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row2) {
				
				$reviewers[$row2 -> id] = $row2;
				$reviewers[$row2 -> id]->status = $status;
				}
				}
			}
		}

		return $reviewers;

	}
	
	function remove_advisors($proposal_id,$reviewer_id){
		$this -> db -> where("proposal_id", $proposal_id);
		$this -> db -> where("reviewer_id", $reviewer_id);
		return $this -> db -> delete("proposal_reviewers");
		
	}
	
	function save_assignment($proposal_id) {
		$re_assigned = false;

		$study_data = $this -> get_study($proposal_id);

		if (isset($study_data["reviewer"])) {
			//Reset reviwer comments
			$review_data = array();
			$review_data["review_status"] = "";
			$review_data["reviewer_comments"] = "";
			$this -> db -> where("id", $proposal_id);
			$this -> db -> update("proposals", $review_data);

			//Delete reviews
			$this -> db -> where("proposal_id", $proposal_id);
			$this -> db -> delete("proposal_reviews");

			//Delete tracking of proposal_reviews
			$this -> db -> where("proposal_id", $proposal_id);
			$this -> db -> delete("review_status");

			$re_assigned = true;
		}

		$data = array();
		$reviewer_id = $_POST['advisor'];
		$data['reviewer_id'] = $reviewer_id;
		$this -> db -> where("id", $proposal_id);
		$this -> db -> update("proposals", $data);

		$response_message = ($this -> db -> affected_rows() > 0 ? "<p>Advisor assigned successfully </p>" : "");

		//Get advisor name

		$this -> db -> select("first_name, last_name, email");
		$this -> db -> from("users");
		$this -> db -> where("id", $reviewer_id);
		$query = $this -> db -> get();

		$names = "";
		$email = "";
		if ($query -> num_rows() > 0) {
			$row = $query -> row();
			$names = $row -> first_name . " " . $row -> last_name;
			$email = $row -> email;
		}

		//Email advisor
		$message = "Hello $names" . "\r\n";
		
		$message .= "\r\n";
		$message .= "\r\n";

		if ($re_assigned) {
			$message .= "The coordinators have re-assigned you a concept note from your colleague to review. 
			This may have occurred because your colleague has not completed all of their reviews or because the 
			coordinators would like to distribute the concept notes more equally by thematic areas. " . "\r\n";

		} else {
			$message .= "The coordinators have assigned you with a new concept note to review. " . "\r\n";

		}

		$message .= "\r\n";
		

		$message .= "Please login to the portal to review the concept note(s) assigned to you and submit your reviews here: " . "\r\n";

		$message .= "\r\n";

		$message .= "http://www.apply.ocsdnet.org" . "\r\n";

		$message .= "\r\n";
		
		$message .= "We look forward to receiving your review by <strong>September 20th!</strong>." . "\r\n";

		$message .= "\r\n";

		$message .= "Thank you," . "\r\n";
		
		$message .= "\r\n";

		$message .= "OCSDNet Team" . "\r\n";

		$message = str_replace("\r\n", "<br>", $message);

		$subject = "";

		$subject = ($re_assigned ? " OCSDNet Concept Note Assignment Change" : "OCSDNet Concept Note Assigned to You");

		$this -> send_email($message, $email, $subject);

		return $response_message;

	}
	
		function save_advisor($proposal_id) {
		$reviewer_id = $_POST['advisor'];
		
		$this -> db -> select("id");
		$this -> db -> from("proposal_reviewers");
		$this -> db -> where("reviewer_id", $reviewer_id);
		$this -> db -> where("proposal_id", $proposal_id);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {
		}else{
		$data['proposal_id'] = $proposal_id;
		$data['reviewer_id'] = $reviewer_id;
		$this -> db -> insert("proposal_reviewers", $data);
		}

		//Get advisor name

		$this -> db -> select("first_name, last_name, email");
		$this -> db -> from("users");
		$this -> db -> where("id", $reviewer_id);
		$query = $this -> db -> get();

		$names = "";
		$email = "";
		if ($query -> num_rows() > 0) {
			$row = $query -> row();
			$names = $row -> first_name . " " . $row -> last_name;
			$email = $row -> email;
		}

		//Email advisor
		$message = "Hello $names" . "\r\n";
		
		$message .= "\r\n";
		$message .= "\r\n";
		
		$re_assigned = FALSE;
		if ($re_assigned) {
			$message .= "The coordinators have assigned you a concept note from your colleague to review. 
			This may have occurred because your colleague has not completed all of their reviews or because the 
			coordinators would like to distribute the concept notes more equally by thematic areas. " . "\r\n";

		} else {
			$message .= "The coordinators have assigned you with a new concept note to review. " . "\r\n";

		}

		$message .= "\r\n";
		

		$message .= "Please login to the portal to review the concept note(s) assigned to you and submit your reviews here: " . "\r\n";

		$message .= "\r\n";

		$message .= "http://www.apply.ocsdnet.org" . "\r\n";

		$message .= "\r\n";
		
		$message .= "We look forward to receiving your review." . "\r\n";

		$message .= "\r\n";

		$message .= "Thank you," . "\r\n";
		
		$message .= "\r\n";

		$message .= "OCSDNet Team" . "\r\n";

		$message = str_replace("\r\n", "<br>", $message);

		$subject = "";

		$subject = ($re_assigned ? " OCSDNet Concept Note Assignment Change" : "OCSDNet Concept Note Assigned to You");

		$this -> send_email($message, $email, $subject);

		return TRUE;

	}
	function get_study($id) {
		$this -> db -> where("id", $id);
		$query = $this -> db -> get("proposals");
		$reviewer = "";
		$data = array();
		if ($query -> num_rows() > 0) {
			$row = $query -> row_array();
			$data["study_title"] = $row['study_title'];

			if (isset($row['reviewer_id'])) {
				//Get reviewer names
				$this -> db -> select("id, first_name, last_name");
				$this -> db -> from("users");
				$this -> db -> where("id", $row['reviewer_id']);
				$query = $this -> db -> get();
				if ($query -> num_rows() > 0) {
					$row = $query -> row_array();
					$reviewer = $row["first_name"] . " " . $row["last_name"];
					$data["reviewer"] = $reviewer;
				}

			}

		}

		return $data;
	}

	function get_all($id) {
		$researcher_id = "";
		$preview_data = array();
		//Proposal
		$this -> db -> where("id", $id);
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

	//Get user roles
	function get_roles() {
		$query = $this -> db -> get("user_roles");
		$user_roles = array();
		$user_roles[0] = "-- Select user role -- ";
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {

				$user_roles[$row -> id] = $row -> user_role;
			}
		}

		return $user_roles;
	}

	//Add new system User
	function add_sys_user() {
		$data = array();
		$data['email'] = $_POST['email'];
		$user_role_id = $_POST['user_role_id'];
		$data['user_role_id'] = $_POST['user_role_id'];
		$this -> db -> insert("users", $data);
		$email = $_POST['email'];

		if ($this -> db -> affected_rows() > 0) {
			$id = $this -> db -> insert_id();

			//Generate hash
			$hash = $this -> getRandomWord();

			$data = array();
			$data['activation_hash'] = $hash;
			$data['activation_timestamp'] = time();
			$this -> db -> where('id', $id);
			$this -> db -> update("users", $data);

			$role_name = ($user_role_id == 1 ? "coordinator" : "advisor");

			//Now notify user to activate via email
			//Email user
			$message = "Dear  esteemed OCSDNet $role_name " . "\r\n";
			$message .= "\r\n";
			$message .= "\r\n";
			$message .= "Thank you for registering to use the review portal. Please click the link below or copy and paste it on your browser to complete your OCSDNet account registration." . "\r\n";
			
			$message .= "\r\n";
			
			$activation_link = site_url() . "/activate/user_activation/" . $hash;
			$message .= $activation_link . "\r\n";
				
			$message .= "\r\n";

			$message .= "We look forward to receiving your reviews by September 19th 2014." . "\r\n";
			
			$message .= "\r\n";

			$message .= "Thank you," . "\r\n";
			
			$message .= "\r\n";

			$message .= "OCSDNet Team" . "\r\n";

			$message = str_replace("\r\n", "<br>", $message);

			$this -> send_email($message, $email, "OCSDNet account activation");

		}

	}

	//Get coordinators
	function get_coordinators() {
		$this -> db -> where("user_role_id", 1);
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}

	}

	//Get advisors
	function get_advisors() {
		$this -> db -> where("user_role_id", 2);
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			return $query -> result_array();
		}
	}

	//Save user
	function save_user($id) {
		$data = array();
		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
		$data['modified'] = time();
		//Update
		$this -> db -> where("id", $id);
		$this -> db -> update("users", $data);

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

	//Get random word
	function getRandomWord() {
		$len = 20;
		$word = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
		shuffle($word);
		$random = substr(implode($word), 0, $len);
		return md5($random);
	}

	//Delete table
	function delete($table, $id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($table);
	}

}
