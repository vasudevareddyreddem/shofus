<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personnel_details_model extends MY_Model 

{

	protected $_table="sellers";

	protected $primary_key="seller_id";

	protected $soft_delete = FALSE;

    public $before_create = array( 'created_at', 'updated_at' );

    public $before_update = array( 'updated_at' );

	public function __construct()

	{

	parent::__construct();
	}

public function getlocations()
{

$query = $this->db->get('locations');
return $query->result();


}	

public function getsellerlocation()
{
$sid= $this->session->userdata('seller_id');	
	
$this->db->where('seller_id',$sid);	
$query = $this->db->get('sellers');
return $query->row();	
	
	
	
}


public function updatedd($data)
{
	
$sid= $this->session->userdata('seller_id');	
	
$this->db->where('seller_id',$sid);
		$query=$this->db->update('sellers',$data);
		return $query; 	
	
	
	
	
	
	
}

public function updatepd($data)
{
	
$sid= $this->session->userdata('seller_id');	
	
$this->db->where('seller_id',$sid);
		$query=$this->db->update('sellers',$data);
		return $query; 	
	
	
	
	
	
	
}
public function updatebd($data)
{
	
$sid= $this->session->userdata('seller_id');	
	
$this->db->where('seller_id',$sid);
		$query=$this->db->update('sellers',$data);
		return $query; 	
	
	
	
	
	
	
}

public function updatebankd($data)
{
	
$sid= $this->session->userdata('seller_id');	
	
$this->db->where('seller_id',$sid);
		$query=$this->db->update('sellers',$data);
		return $query; 	
	
	
	
	
	
	
}

public function insertFiles($images){
	$sid= $this->session->userdata('seller_id');
	for($i=0; $i<count($images); $i++)
	{
	$data=array('seller_id'=>$sid,'file_name'=>$images[$i]);
	$this->db->insert('kyc_reports',$data);
	}
	return true;
	}

}


	