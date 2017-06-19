<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sellercat_model extends MY_Model 
{
	protected $_table="seller_categories";

	protected $primary_key="seller_cat_id";

	protected $soft_delete = FALSE;

    public $before_create = array( 'created_at', 'updated_at' );

    public $before_update = array( 'updated_at' );
	
		
	public function __construct()

	{
	parent::__construct();

	}
	public function insertseller_cat($data)
	{
		 $this->db->insert('seller_categories', $data);
  		return $insert_id = $this->db->insert_id();
	}

  public function save_sub_cat_id($data)
{
		$this->db->insert('seller_categories', $data);
  		return $insert_id = $this->db->insert_id();
 
}


  

}


