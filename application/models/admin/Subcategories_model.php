<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories_model extends MY_Model 

{

	protected $_table="subcategories";
	protected $primary_key="subcategory_id";
	protected $soft_delete = FALSE;
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );
	public function __construct()

	{

	parent::__construct();


	}

public function search(){

    $match = $this->input->post('search');
    $this->db->from('subcategories');
    $this->db->join('category', 'category.category_id =subcategories.category_id');
	$this->db->like('subcategory_name',$match);
	$this->db->or_like('category.category_name',$match);
	$query = $this->db->get();
	return $query->result();

}

public function get_subcat()
{
	
	$this->db->select('*');
	$this->db->from('subcategories');
    $this->db->join('category', 'category.category_id =subcategories.category_id');
    $query = $this->db->get();
    return $query->result();	
}

public function get_subcatsingle($id)
{
	
	$this->db->select('*');
	$this->db->from('subcategories');
    $this->db->join('category', 'category.category_id =subcategories.category_id');
	$this->db->where('subcategory_id',$id);
    $query = $this->db->get();
    return $query->row();	
}
}


	