<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Customer extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url', 'html'));
			$this->load->library('session');
			$this->load->helper(array('url','html','form'));
			$this->load->model('category_model'); 
			
 }
 
 public function index(){
	
	$this->template->write_view('content', 'customer/register');
	$this->template->render();
	
 } 
 

	
	
}
?>