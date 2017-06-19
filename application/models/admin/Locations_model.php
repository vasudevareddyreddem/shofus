<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locations_model extends MY_Model 

{

	protected $_table="locations";
	protected $primary_key="location_id";
	protected $soft_delete = FALSE;
    //public $before_create = array( 'created_at', 'updated_at' );
    //public $before_update = array( 'updated_at' );
	public function __construct()

	{

	parent::__construct();


	}

public function search($match){

	$this->db->like('location_name',$match);
	if($match=='Available' || $match=='available')
	{
		
		$this->db->or_like('status','1');
	}elseif($match=='Unavailable' || $match=='unavailable')
	{

		$this->db->or_like('status','0');
	}	
	$query = $this->db->get('locations');
	return $query->result();

}
}


	