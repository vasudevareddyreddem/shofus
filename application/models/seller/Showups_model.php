<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Showups_model extends MY_Model 
{
	
	
		
	public function __construct()

	{
	parent::__construct();

	}

  public function save_banner_image($data)
{
	$this->db->insert('home_banner',$data);
	//print_r($data); exit;
	return $insert_id = $this->db->insert_id();	
 
}

}