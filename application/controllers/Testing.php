<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Testing extends MY_Controller 
{

  public function __construct()
    {
        
        parent::__construct();
      
    }
public function index(){
	
	//echo "fsfdsgd";exit;
$this->load->view('productcategory');	
}


}