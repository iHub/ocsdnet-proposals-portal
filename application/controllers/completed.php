<?php
class Completed extends CI_Controller {

	protected $data = array("title" => "Completed");

	protected $form = array();

	function __construct() {
		parent::__construct();
		$this -> load -> model("proposal/proposal_model");
		
		//Check if session has been set
		$user_data = $this -> session -> userdata("user_data");
		
		if ($user_data) {
			$this -> data['countries'] = $this -> proposal_model -> get_countries();
			$this -> data['gender_array'] = $this -> proposal_model -> get_gender();

			//If not registerd
			if (empty($user_data['user_role_id'])) {
				$this -> session -> set_flashdata('message', 'Please login.');
				redirect("auth");
			}
			
			//IF submited
			if (!$this -> proposal_model -> has_submitted($user_data['id'])) {
				redirect("submit_proposal");
			}

		} else {
			//If no session
			$this -> session -> set_flashdata('auth_message', 'Please login.');
			redirect("auth");
		}
	}

	function index() {
		$user_data = $this -> session -> userdata("user_data");
		$researcher_id = $user_data['id'];
		$proposal_id = $this -> session -> userdata("completed_proposal_id");
		$this -> data["preview_data"] = $this -> proposal_model -> get_all($proposal_id);
		$this -> template -> load('default', "proposal/preview_complete", $this -> data);
	}

}
