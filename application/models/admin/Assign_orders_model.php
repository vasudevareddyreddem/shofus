<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign_orders_model extends MY_Model 



{

	protected $_table="assign_orders";
	protected $primary_key="assign_order_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );


	public function __construct()


	{

	parent::__construct();


	}

public function get_busydeliveryboys()
{

	$this->db->select('*');
	$this->db->from('deliveryboy');
	$this->db->where('status','1');
    $this->db->order_by("deliveryboy_id","desc");    
	$query=$this->db->get();
     return $query->result();
}

public function get_freedeliveryboys()
{

	$this->db->select('*');
	$this->db->from('deliveryboy');
	$this->db->where('status','0');
    $this->db->order_by("deliveryboy_id","desc");    
	$query=$this->db->get();
     return $query->result();
}

 public function get_notassignedorders()
 {

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->where('order_status','0');
    $this->db->order_by("order_id","desc");    
	$query=$this->db->get();
     return $query->result();
}

 public function updatedeliveryboy_status($deliveryboy_id)
 {
    $data=array('status'=>'1');
 	$this->db->where('deliveryboy_id',$deliveryboy_id);
    if($this->db->update('deliveryboy',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
 }

public function updateorder_status($order_id)
{
    $data=array('order_status'=>'1');
 	$this->db->where('order_id',$order_id);
    if($this->db->update('orders',$data))
      {
        return true;
      }
      else
      {
        return false;
      }
 }

public function search_busydeliveryboys($match)
{

  $this->db->select('*');
  $this->db->from('deliveryboy');
   $this->db->like('deliveryboy_name',$match);
  $this->db->where('status','1');
  $this->db->order_by("deliveryboy_id","desc");    
  $query=$this->db->get();
     return $query->result();
}

public function search_freedeliveryboys($match)
{

  $this->db->select('*');
  $this->db->from('deliveryboy');
  $this->db->like('deliveryboy_name',$match);
  $this->db->where('status','0');
    $this->db->order_by("deliveryboy_id","desc");    
  $query=$this->db->get();
     return $query->result();
}
}