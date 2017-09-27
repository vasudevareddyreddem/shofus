<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Cron extends Front_Controller 
{	
	public function __construct() 
		{

		parent::__construct();	
		$this->load->helper(array('url','html','form'));
		$this->load->library('session','form_validation');
		$this->load->library('email');
		$this->load->model('customer_model'); 
	}
	
	public function index (){
		echo '<pre>';print_r('jhhgjhg');exit;
		
		
		
	}
 

  



}		
?>