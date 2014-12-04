<?php
class Advisors_model extends CI_Model {
	function __construct() {

	}

	//Fetch current advisor details
	function get_advisor() {
		$user_data = $this -> session -> userdata("user_data");
		$id = $user_data['id'];
		$advisor = array();

		if (isset($id)) {
			$this -> db -> where("id", $id);
			$query = $this -> db -> get("users");
			if ($query -> num_rows() > 0) {
				$advisor = $query -> row_array();
			}
		}
		return $advisor;
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
		$this -> session -> set_flashdata('advisor_message', 'User details updated...!');

	}

	//Get proposals assigned to this user
	function get_proposals($reviewer_id) {
		$this -> db -> select("id, study_title, reviewer_id, review_status,researcher_id");
		$this -> db -> from("proposals");
		$this -> db -> where("reviewer_id", $reviewer_id);
		$this -> db -> where("status", "complete");
		//$this -> db -> where("review_status !=", "complete");

		$query = $this -> db -> get();
		$proposals = array();

		if ($query -> num_rows() > 0) {
			$proposals = $query -> result_array();
		}
		foreach ($proposals as $key => $value) {
			
		$this -> db -> where("id", $value['researcher_id']);
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			$proposals[$key]['researcher'] = $query -> row_array();
		}
		}
		
		return $proposals;
	}

	//Get reviewer status
	function reviewer_status($reviewer_id) {
		$this -> db -> where("reviewer_id", $reviewer_id);
		$this -> db -> where("review_status", 'complete');
		$this -> db -> from('proposals');
		$completed = $this -> db -> count_all_results();

		$this -> db -> where("reviewer_id", $reviewer_id);
		$this -> db -> from('proposals');
		$total = $this -> db -> count_all_results();
		
		return "$completed of $total Review Forms Completed";

	}

	//Get proposal
	function get_review_data($id) {
		$review_data = array();
		$researcher_id = "";
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
		$this -> db -> where("id", $researcher_id);
		$query = $this -> db -> get("users");

		if ($query -> num_rows() > 0) {
			$preview_data['collaborators'] = $query -> result_array();
		}

		return $preview_data;
	}
	
	function complete_form(){
		$tabs = array();
		$query = $this->db->get("review_tabs");
		
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$tabs[] = $this->get_tab_data($row->id);
			}
		}
		
		return $tabs;
		
	}

	function get_tab_data($id) {
		$tab_data = array();
		$this -> db -> where("id", $id);
		$query = $this -> db -> get("review_tabs");

		//Review tab
		if ($query -> num_rows() > 0) {
			$review_tab = $query -> row_array();
			$tab_data['review_tab'] = $review_tab;
		}

		//Review questions
		$this -> db -> where("tab_id", $id);
		$query = $this -> db -> get("review_questions");
		$question_ids = array();
		$questions = array();
		if ($query -> num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$questions[$row['id']] = $row;
				$question_ids[] = $row['id'];
			}
			$tab_data["questions"] = $questions;
		}

		//Question options
		$question_options = array();
		if (count($question_ids) > 0) {
			for ($i = 0; $i < count($question_ids); $i++) {
				$id = $question_ids[$i];
				$this -> db -> where("question_id", $id);
				$query = $this -> db -> get("question_options");
				if ($query -> num_rows() > 0) {
					$question_options[$id] = $query -> result_array();

					$tab_data["question_options"] = $question_options;
				}
			}
		}

		return $tab_data;

	}

	function submit_review() {
		$proposal_id = $this -> session -> userdata("proposal_id");
		$is_complete = $this -> is_complete($proposal_id);

		if (!$is_complete) {
			//Redirect to tab 5 with warning
			$this -> session -> set_flashdata("incomplete_review", "<p>Complete all tabs before submitting..! </p>");
			redirect("advisors/review_tab/5");
		} else {
			$data = array();
			$data["completed_timestamp"] = time();
			$data["review_status"] = "complete";
			$data["review_status"] = "complete";
			$data["reviewer_comments"] = $_POST["reviewer_comments"];
			$this -> db -> where("id", $proposal_id);
			$this -> db -> update("proposals", $data);
		}
	}

	function save_tabs($tab_id) {
		// print_r($tab_id);
		// exit;
		$data = array();
		$proposal_id = $this -> session -> userdata("proposal_id");
		$data['proposal_id'] = $proposal_id;

		//Delete old rows
		$option_ids = array();
		foreach ($_POST as $key => $value) {
			$option_ids[] = $value;
		}

		$old_row_ids = $this -> old_rows($option_ids, $proposal_id);

		if ($old_row_ids) {
			$this -> db -> where_in("id", $old_row_ids);
			$this -> db -> delete("proposal_reviews");
		}
	//print_r($_POST);
	//exit;
		foreach ($_POST as $key => $value) {
			$data['option_id'] = $value;
			$this -> db -> insert('proposal_reviews', $data);

		}

		//Keep track of status
		$this -> track_status($tab_id, $proposal_id);

	}

	function track_status($tab_id, $proposal_id) {
		//Track review status
		$review_status = array();
		$review_status["tab_id"] = $tab_id;
		$review_status["proposal_id"] = $proposal_id;
		$review_status["review_time"] = time();

		//First reset
		$this -> db -> where("proposal_id", $proposal_id);
		$this -> db -> where("tab_id", $tab_id);
		$this -> db -> delete("review_status");

		//Then insert new status
		$this -> db -> where("proposal_id", $proposal_id);
		$this -> db -> where("tab_id", $tab_id);
		$this -> db -> insert("review_status", $review_status);
	}

	function is_complete($proposal_id) {
		$tabs = array();
		$this -> db -> where("proposal_id", $proposal_id);
		$query = $this -> db -> get("review_status");

		if ($query -> num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$tabs[] = $row["tab_id"];
			}
		}

		if (count($tabs) > 3) {
			return true;
		} else {
			return false;
		}

	}

	//Saved proposals
	function get_proposal_review($proposal_id) {
		$this -> db -> where("proposal_id", $proposal_id);
		$query = $this -> db -> get("proposal_reviews");
		$reviews = array();
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$reviews[$row -> option_id] = $row -> option_id;
			}

		}

		return $reviews;
	}

	function old_rows($ids, $proposal_id) {
		$question_ids = array();
		$proposal_review_ids = array();

		//Get option_ids
		$this -> db -> select("id, question_id");
		$this -> db -> distinct();
		$this -> db -> from("question_options");
		$this -> db -> where_in("id", $ids);
		$query = $this -> db -> get();

		if ($query -> num_rows() > 0) {

			foreach ($query->result() as $row) {
				$question_ids[] = $row -> question_id;
			}

			$this -> db -> where_in("question_id", $question_ids);
			$query = $this -> db -> get("question_options");
			$option_ids = array();

			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row) {
					$option_ids[] = $row -> id;
				}

				//Get proposal_review_ids
				$this -> db -> where_in("option_id", $option_ids);
				$this -> db -> where("proposal_id", $proposal_id);
				$query = $this -> db -> get("proposal_reviews");

				if ($query -> num_rows() > 0) {

					foreach ($query->result() as $row) {

						$proposal_review_ids[] = $row -> id;
					}

				}

			}
		}
		return $proposal_review_ids;
	}

	//Tab 5 data

	function get_comments($proposal_id) {
		$this -> db -> select("reviewer_comments");
		$this -> db -> from("proposals");
		$this -> db -> where("id", $proposal_id);
		$query = $this -> db -> get();
		$comments = array();
		if ($query -> num_rows() > 0) {
			$row = $query -> row();
			$comments["reviewer_comments"] = $row -> reviewer_comments;

		}

		return $comments;

	}

	//Question ids
	function question_ids($tab_id) {
		$this -> db -> where("tab_id", $tab_id);
		$query = $this -> db -> get("questions");
		$ids = array();
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$ids[] = $row -> id;
			}
		}

		return $id;
	}

	function get_reviews($proposal_) {

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

}
