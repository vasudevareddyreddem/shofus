<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliveryboy_location_model extends MY_Model 

{

	protected $_table="deliveryboy_location";
	protected $primary_key="deliveryboy_location_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );


public function __construct()

	{
	parent::__construct();
	}



}