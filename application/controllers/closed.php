<?php
class Closed extends CI_Controller {
	
	protected $data = array("title" => "Application closed");
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this -> template -> load('user', "users/closed", $this -> data);
		
	}
}