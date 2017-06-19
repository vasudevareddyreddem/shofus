<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class New_orders_model extends MY_Model 



{

	


	public function __construct()


	{

	parent::__construct();


	}


  public function get_neworders()
{

          $this->db->select('*');
          $this->db->from('orders');
	  $this->db->join('sellers', 'orders.seller_id = sellers.seller_id');
	  $this->db->where('orders.order_status','0');
	  $this->db->order_by("orders.order_id","desc");    
	  $query=$this->db->get();
	  return $query->result();
}

public function get_deliveryboys()
{
        $this->db->select('*');
        $this->db->from('deliveryboy');
        $this->db->order_by("deliveryboy_id","desc");    
        $query=$this->db->get();
        return $query->result();

}

 public function get_neworderdata($id)
{

  $this->db->select('*');
  $this->db->from('orders');
  $this->db->join('sellers', 'orders.seller_id = sellers.seller_id');
  $this->db->where('orders.order_status','0');
  $this->db->where('orders.order_id',$id);
  $this->db->order_by("orders.order_id","desc");    
  $query=$this->db->get();
 return $query->row();
}


public function search($match)
{

 

    $this->db->select('*');
    $this->db->from('orders');
    $this->db->join('sellers', 'orders.seller_id = sellers.seller_id');
  
    $this->db->like('order_id',$match);
    $this->db->or_like('sellers.seller_shop',$match);
    $this->db->or_like('sellers.seller_address',$match);    
    $this->db->where('orders.order_status','0');
    $this->db->order_by("orders.order_id","desc");    
    $query=$this->db->get();
    return $query->result();
     
   
}
}