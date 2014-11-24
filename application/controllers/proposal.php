<?php
class Proposal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$user_data = $this -> session -> userdata("user_data");

		$this->load->model("proposal/proposal_model");
	}

	public function index() {
		$user_data = $this->session->userdata("user_data");

		$id = $user_data['id'];
		$this->data['active_menu'] = 1;
		$this->data['form'] = $this->proposal_model->get_researchers($id);
		$proposal = $this->proposal_model->get_proposals($id);

		$data = array();
		if ($proposal) {
			$data = $proposal[0];
			$data['present'] = 1;
		} else {
			$data['present'] = 0;
		}

		$this->load->view("new-proposal/proposal_form", $data);
	}

	public function projectinfo() {
		$data['id'] = $_POST['proposal_id'];
		$data['title'] = $_POST['title'];
		$data['duration'] = $_POST['duration'];
		$data['countries_covered'] = $_POST['countries'];
		$data['regions'] = $_POST['regions'];
		$data['research_themes'] = $_POST['themes'];
		$data['justification_of_research_themes'] = $_POST['justifythemes'];
		$data['budget'] = $_POST['budget'];
		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);

	}
	public function stepthree() {
		$data['id'] = $_POST['proposal_id'];
		$data['research_project_abstract'] = $_POST['researchproject'];
		$data['research_problem_significance_and_justification'] = $_POST['researchproblem'];
		$data['research_questions_and_objectives'] = $_POST['researchquestions'];
		$data['research_design_and_methods'] = $_POST['researchdesign'];
		$data['analysis_and_synthesis'] = $_POST['analysissynthesis'];
		$data['outcomes_and_outputs'] = $_POST['outcomesoutputs'];
		$data['knowledge_translation_and_dissemination'] = $_POST['translationdissemination'];
		$data['network_connections_and_interactions'] = $_POST['networkconnetions'];
		$data['bibliography'] = $_POST['bibliography'];
		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);
	}
	public function stepfour() {

		$data['id'] = $_POST['proposal_id'];
		//$data['project_timelines'] = $_POST['projecttimeline'];
		$data['research_ethics'] = $_POST['researchethics'];
		$data['internal_project_communication_and_management'] = $_POST['internalproject'];
		$data['challenges_and_risks'] = $_POST['challengesandrisks'];
		$data['monitoring_and_evaluation'] = $_POST['monitoringevaluation'];
		$proposal_id = $this->proposal_model->save_study_info($data);
		echo json_encode($proposal_id);

	}
	public function researchinfo() {
		$data = $_POST;
		echo json_encode($data);
	}
	public function updater() {
		$data = $_POST;
		echo json_encode($data);
		exit;
	}

}
