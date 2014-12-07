<?php
class Coordinators extends CI_Controller {

	protected $data = array("title" => "Coordinators");
	protected $form = array();

	function __construct() {
		parent::__construct();

		//Check if session has been set
		$user_data = $this -> session -> userdata("user_data");

		$role_id = $user_data['user_role_id'];

		if ($role_id == 1 || $role_id == 4) {

			$this -> data['active_menu'] = NULL;
			$this -> load -> library('password');
			$this -> load -> library('email');
			$this -> load -> model("users/coordinators_model");
			$this -> data["user_roles"] = $this -> coordinators_model -> get_roles();

		} else {
			//If no session
			$this -> session -> set_flashdata('auth_message', 'Please login.');
			redirect("auth");
		}

	}

	function index() {

		$this -> data['active_menu'] = 1;
		$this -> data["table_headers"] = $this -> table_headers();
		$completes = $this -> coordinators_model -> get_completes();
		//reviewers
		$this -> data['completes'] = $completes;
		//reviewers
		$reviewers = array();
		foreach ($completes as $key => $value) {
			
			$reviewers[$value['proposal_id']]  = $this -> coordinators_model -> fetch_reviewers($value['proposal_id']);
		}
		$this -> data['reviewers'] = $reviewers;
		
		$this -> template -> load('advisor', "coordinators/proposals", $this -> data);
	}
    
	//Order by columns
	function order_by() {
		$column = $this -> uri -> segment(3);
		$order = $this -> uri -> segment(4);
		$this -> data['active_menu'] = 1;
		$this -> data["table_headers"] = $this -> table_headers($column, $order);
		$this -> data['completes'] = $this -> coordinators_model -> get_completes(NULL, $column, $order, NULL);
		$this -> template -> load('user', "coordinators/proposals", $this -> data);
		
	}

     function incompletes(){
     	$column = $this -> uri -> segment(3);
		$order = $this -> uri -> segment(4);
		$this -> data['active_menu'] = 4;
		$Incomplete = true;
		$this -> data["table_headers"] = $this -> table_headers();
		$this -> data['completes'] = $this -> coordinators_model -> get_completes($Incomplete, NULL ,NULL, NULL);
		$this -> template -> load('user', "coordinators/proposals", $this -> data);
     }

	//Save system
	function add_sys_user() {
		$this -> data['active_menu'] = 1;
		$valid = $this -> validate_user_addition();

		if ($valid) {
			$this -> coordinators_model -> add_sys_user();
			$user_role_id = $_POST['user_role_id'];
			$dest = ($user_role_id == 1 ? "coordinators/panel" : "coordinators/advisors");
			redirect($dest);

		} else {
			$user_role_id = $_POST['user_role_id'];
			$dest = ($user_role_id == 1 ? "coordinators/add_coordinators" : "coordinators/add_advisors");
			$this -> data['user_role_id'] = $_POST['user_role_id'];
			$this -> template -> load('user', "coordinators/add_sys_user", $this -> data);
		}
	}
	
	function reviewed(){
		$column = $this -> uri -> segment(3);
		$order = $this -> uri -> segment(4);
		$this -> data['active_menu'] = 5;
		$this -> data["table_headers"] = $this -> table_headers();
		$this -> data['completes'] = $this -> coordinators_model -> get_completes(NULL, NULL ,NULL, true);
		$this -> template -> load('user', "coordinators/reviewed", $this -> data);
	}
	
	//Edit user
	function edit_user() {
		$this -> data['active_menu'] = 1;
		$id = $this -> uri -> segment(3);
		$this -> data['form'] = $this -> coordinators_model -> get_users($id);
		$this -> template -> load('user', "coordinators/edit_user", $this -> data);
	}

	function save_user_edits() {

		$redirect = "coordinators";
		$source = $this -> session -> userdata("origin");

		if (strcasecmp($source, "coordinators") == 0) {
			$redirect .= "/panel";
			$this -> data['active_menu'] = 2;
		} else if (strcasecmp($source, "advisors") == 0) {
			$this -> data['active_menu'] = 3;
			$redirect .= "/advisors";
		}

		$valid = $this -> validate_user_edits();
		$id = $_POST['user_id'];

		if ($valid) {
			$this -> coordinators_model -> save_user($id);
			redirect($redirect);

		} else {
			$this -> data['form'] = $this -> coordinators_model -> get_users($id);
			$this -> template -> load('user', "coordinators_model/edit_user", $this -> data);
		}
	}

	function delete_coordinators() {
		$id = $this -> uri -> segment(3);

		$this -> coordinators_model -> delete("users", $id);

		redirect("coordinators/panel");
	}

	function delete_advisors() {
		$id = $this -> uri -> segment(3);

		$this -> coordinators_model -> delete("users", $id);

		redirect("coordinators/advisors");
	}

	function panel() {
		$this -> data['active_menu'] = 2;
		$this -> data['coordinators'] = $this -> coordinators_model -> get_coordinators();
		$this -> template -> load('user', "coordinators/coordinators", $this -> data);
	}

	//Add coordinators
	function add_coordinators() {
		$this -> data['user_role_id'] = 2;
		$this -> data['active_menu'] = 2;
		$this -> template -> load('user', "coordinators/add_coordinators", $this -> data);
	}

	//Advisors panel
	function advisors() {
		$this -> data['active_menu'] = 3;
		$this -> data['advisors'] = $this -> coordinators_model -> get_advisors();
		$this -> template -> load('user', "coordinators/advisors", $this -> data);
	}

	//Add advisors
	function add_advisors() {
		$this -> data['active_menu'] = 3;
		$this -> data['user_role_id'] = 3;
		$this -> template -> load('user', "coordinators/add_advisors", $this -> data);
	}

	//Preview
	function preview() {
		$this -> data['active_menu'] = 1;
		$proposal_id = $this -> uri -> segment(3);
		$this -> data['proposal_id'] = $proposal_id;
		$this -> data['preview_data'] = $this -> coordinators_model -> get_all($proposal_id);
		$this -> template -> load('user', "coordinators/preview", $this -> data);
	}

	//Assign advisor
	function assign_advisor() {
		$this -> data['active_menu'] = 1;
		$this -> data['proposal_id'] = $this -> uri -> segment(3);
		$this -> data['advisors'] = $this -> coordinators_model -> fetch_advisors();
		$this -> data["study_data"] = $this -> coordinators_model -> get_study($this -> data['proposal_id']);
		$this -> template -> load('user', "coordinators/assign_advisors", $this -> data);
	}
	
		function remove_advisor() {
		
		$proposal_id = $this -> uri -> segment(3);
		$reviewer_id = $this -> uri -> segment(4);
		$msg = $this -> coordinators_model -> remove_advisors($proposal_id,$reviewer_id);
		redirect("coordinators");

	}

	function save_assignment() {
		$this -> data['active_menu'] = 1;
		$proposal_id = $_POST['proposal_id'];
		$this -> data['proposal_id'] = $proposal_id;
		$msg = $this -> coordinators_model -> save_assignment($proposal_id);
		$this -> data["study_data"] = $this -> coordinators_model -> get_study($proposal_id);
		$this -> data['assignment_msg'] = $msg;
		$this -> data['advisors'] = $this -> coordinators_model -> fetch_advisors();
		if($msg){
			redirect("coordinators");
		}else{
		$this -> template -> load('user', "coordinators/assign_advisors", $this -> data);
		}

	}

	//Validations: Validate addition of system user
	function validate_user_addition() {
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		return $this -> form_validation -> run();
	}

	function validate_user_edits() {
		$this -> form_validation -> set_rules('first_name', 'First name', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('last_name', 'Last name', 'trim|required|xss_clean');
		return $this -> form_validation -> run();
	}

	function validate_assignment() {
		$advisors = $this -> session -> userdata("advisors");

		for ($i = 0; $i < count($advisors); $i++) {
			$advisor = $advisors[$i];

			if (isset($_POST[$advisor['id']])) {
				return true;

			}
		}

		return false;

	}

	function table_headers($column = NULL, $order = NULL) {
		$table_columns = array();

		$table_columns['first_name'] = array("order" => "asc", "label" => "First Name");
		$table_columns['last_name'] = array("order" => "asc", "label" => "Last Name");
		$table_columns['organization'] = array("order" => "asc", "label" => "Organization");
		$table_columns['countries_covered'] = array("order" => "asc", "label" => "Countries covererd");
		$table_columns['study_title'] = array("order" => "asc", "label" => "Study title");

		if (!is_null($column) && !is_null($order)) {
			$temp = $table_columns[$column];
			$temp['order'] = (strcasecmp($order, "asc") == 0 ? "desc" : "asc");
			$table_columns[$column] = $temp;
		}

		return $table_columns;

	}
	
	
	function shortlisted(){
		
		$this -> data['active_menu'] = 1;
		$this -> load -> model("proposal/proposal_model");
		$this-> data['approved'] = $this -> proposal_model -> get_approved_proposals();		
		
		// print_r($this -> data['approved']);
		// exit;
		$this -> template -> load('default', "coordinators/approved", $this -> data);


	}
	
	
	
	
	
	
	
	

	/*
	 * <script type="text/javascript">// <![CDATA[
	 $(document).ready(function(){
	 $('#category').change(function(){ //any select change on the dropdown with id country trigger this code
	 var cat_id = $('#category').val();  // here we are taking organization id of the selected one.

	 var url="<?php echo base_url() ?>index.php/documents/<?php echo $region_id; ?>/<?php echo $organization_id; ?>/"+cat_id;
	 //                    alert(url)
	 //                    return false;
	 //we now redirect to the relevant controller
	 window.location.replace(url);
	 });
	 });
	 // ]]>
	 </script>
	 */

}
