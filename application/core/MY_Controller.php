<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() 



	{



        parent::__construct();




	}



   function prepare_flashmessage($msg, $type) {



        $returnmsg = '';



        switch ($type) {



            case 0: $returnmsg = " <div class='col-md-12'>



                <div class='alert alert-success'>



                <a href='#' class='close' data-dismiss='alert'>&times;</a>



                <strong>Success!</strong> " . $msg . "</div></div>";



                break;







            case 1: $returnmsg = " <div class='col-md-12'>



                <div class='alert alert-danger'>



                <a href='#' class='close' data-dismiss='alert'>&times;</a>



                <strong>Error!</strong> " . $msg . "</div></div>";



                break;







            case 2: $returnmsg = " <div class='col-md-12'>



                <div class='alert alert-info'>



                <a href='#' class='close' data-dismiss='alert'>&times;</a>



                <strong>Info!</strong> " . $msg . "</div></div>";



                break;







            case 3: $returnmsg = " <div class='col-md-12'>



                <div class='alert alert-warning'>



                <a href='#' class='close' data-dismiss='alert'>&times;</a>



                <strong>Warning!</strong> " . $msg . "</div></div>";



                break;



        }



        $this->session->set_flashdata("message", $returnmsg);



    }







}