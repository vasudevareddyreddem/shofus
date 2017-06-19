<?php

defined('BASEPATH') OR exit('No direct script access allowed');

@include_once( APPPATH . 'controllers/Front_Controller.php');



class Front_Controller extends MY_Controller {



	

	public function __construct() {

			parent::__construct();
            $this->load->library('cart');
			$this->load->model('home_model');
			
			$data['catdata'] = $this->home_model->getcatsubcat();
            $data['locationdata'] = $this->home_model->getlocations();
			//$this->load->library('googleplus');

			//$data['login_url'] = $this->googleplus->loginURL();

		   // $data['citiesnames'] = $this->home_model->getcitiesdata();

		    //$data['searchtype'] = $this->input->get('search');

            //$data['searchid'] = $this->input->get('searchtype');

            //$data['searchcity'] = $this->input->get('selectedcity');

		$this->template->set_template('website'); 

		$this->template->write_view('header', 'shared/header',$data);

        $this->template->write_view('footer', 'shared/footer');



        

		

	}

}