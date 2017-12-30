<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');
class Category extends Front_Controller 
{	
	public function __construct() 
  {

		parent::__construct();	
			$this->load->helper(array('url','html','form'));
			$this->load->library('session');
			$this->load->model('category_model'); 
			
 }
 
 public function subview(){
	 $this->template->write_view('content', 'customer/added_page');
	$this->template->render();
 }
 public function subcategorywiseearch(){
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	if($post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['offers']==$post['productsvalues']){
						$this->category_model->update_offer_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$offer='';
				}
				if($post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$this->category_model->update_brand_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$brand='';
				}
				
				if(isset($post['searchvalue']) && $post['searchvalue']=='color' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='color'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['color']==$post['productsvalues']){
						$this->category_model->update_color_privoussubcategory_searchdata($list['id'],'');
						}
					} 
				}else{
					$color='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$this->category_model->update_size_privous_subcategorysearchdata($list['id'],'');
						}
					} 
				}else{
					$size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
					$ram=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['ram']==$post['productsvalues']){
						$this->category_model->update_ram_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$ram='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
					$colour=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					foreach ($removesearch as $list){
						if($list['colour']==$post['productsvalues']){
						$this->category_model->update_colour_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$colour='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
					$os=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
				
					$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
					//print_r($removesearch);exit;
					foreach ($removesearch as $list){
						if($list['os']==$post['productsvalues']){
						$this->category_model->update_os_privous_subcategorysearchdata($list['id'],'');
						//echo $this->db->last_query();exit;
						}
					} 
				}else{
					$os='';
				}
				
				
				
			
	$ip=$this->input->ip_address();
	$data1=array(
	'Ip_address'=>$ip,
	'category_id'=>$post['categoryid'],
	'subcategory_id'=>$post['subcategoryid'],
	'mini_amount'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'max_amount'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'offers'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'color'=>isset($color) ? $color:'',
	'ram'=>isset($ram) ? $ram:'',
	'colour'=>isset($colour) ? $colour:'',
	'os'=>isset($os) ? $os:'',
	'create'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$brand1= $this->category_model->save_sub_searchdata($data1);
	if(count($brand1)>0){
		$removesearch= $this->category_model->get_all_previous_subcategorywise_search_fields();
		foreach ($removesearch as $list){
			$this->category_model->update_amount_privous_subcategory_wise_searchdata($post['mini_mum'],$post['maxi_mum'],$list['id']);
			//echo $this->db->last_query();exit;
		
		}
		redirect('category/subcategoryfiltersearch');
		
	}
		
	
	

} 
 public function subcategoryfiltersearch(){
	 
	$post=$this->input->post();
	$data['productlist']= $this->category_model->get_search_all_subcategorywise_products();
	$cat_subcat_ids= $this->category_model->get_search_all_subcategory_id();

	$caterory_id=$cat_subcat_ids[0]['category_id'];
	$subcaterory_id=$cat_subcat_ids[0]['subcategory_id'];
	$data['caterory_id']=$caterory_id;
	$data['subcaterory_id']=$subcaterory_id;
	$data['subcatdetais']=$this->category_model->get_subcategory_details($subcaterory_id);
	if(isset($data['productlist']) && count($data['productlist'])>0){
					foreach($data['productlist'] as $lists){ 
							$plistsdata=$lists;
					}
					foreach($plistsdata as $lis){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list_sub($caterory_id,$subcaterory_id);

		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
					$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
					$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
	//echo '<pre>';print_r($productlist);exit;
	
	$data['previousdata']= $this->category_model->get_all_previous_search_subcategory_fields();
	
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	$this->load->view('customer/subcategoryresult',$data);
	//echo '<pre>';print_r($data);exit;
}

 public function productview(){
	$pid=base64_decode($this->uri->segment(3));
	if($this->session->userdata('userdetails'))
	 {
		$custib=$customerdetails['customer_id'];
	 }else{
		 $custib='';
	 }
	 $savingdata=array(
	 'item_id'=>$pid,
	 'customer_id'=>$custib,
	 'created_at'=>date('Y-m-d H:i:s'),
	 );
	 $this->category_model->save_virew_products($savingdata);
	//echo '<pre>';print_r($pid);exit;
	$data['products_list']= $this->category_model->get_products($pid);
	$data['similarproducts_list']= $this->category_model->get_simular_products($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_color_list']= $this->category_model->get_same_products_color($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_size_list']= $this->category_model->get_same_products_size($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_ram_list']= $this->category_model->get_same_products_ram($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['sameproducts_unit_list']= $this->category_model->get_same_products_unit($data['products_list']['subcategory_id'],$data['products_list']['name'],$data['products_list']['item_id']);
	$data['products_reviews']= $this->category_model->get_products_reviews($pid);
	$data['products_specufucation']= $this->category_model->get_products_specifications_list($pid);
	$data['products_desc_list']= $this->category_model->get_products_desc_list($pid);
	$data['sizes_list']= $this->category_model->get_products_sizes_list($pid);
	$data['uksizes_list']= $this->category_model->get_products_uksizes_list($pid);
	$data['colors_list']= $this->category_model->get_products_colos_list($pid);
	$data['colorcnt']= count($data['colors_list']);
	$data['sizecnt']= count($data['sizes_list']);
	$data['uksizecnt']= count($data['uksizes_list']);
	$data['bothsizecnt']= count($data['sizes_list'])+ count($data['uksizes_list']);
	$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'customer/productview', $data);
	$this->template->render();
	
 }
public function productreview(){
	$post=$this->input->post();
	//echo '<pre>';print_r($post);exit;
	$details=array(
	'customer_id'=>$post['customer_id'],
	'item_id'=>$post['product_id'],
	'name'=>$post['name'],
	'email'=>$post['email'],
	'review_content'=>$post['review'],
	'seller_id'=>$post['seller_id'],
	'create_at'=>date('Y-m-d H:i:s A'),
	);
	$savereview= $this->category_model->save_review($details);
	if(count($savereview)>0){
		if($post['count']!=''){
			$addrataing=array(
			'customer_id'=>$post['customer_id'],
			'review_id'=>$savereview,
			'item_id'=>$post['product_id'],
			'name'=>$post['name'],
			'email'=>$post['email'],
			'rating'=>$post['count'],
			'seller_id'=>$post['seller_id'],
			'create_at'=>date('Y-m-d H:i:s A'),
		);
		$saverating= $this->category_model->save_rating($addrataing);
		//echo $this->db->last_query();exit;
		}
		$this->session->set_flashdata('success',"review Successfully Submitted");
		redirect('customer/orederdetails/'.base64_encode($post['order_item_id']));	
	}else{
		$this->session->set_flashdata('error',"Error will occured!");
		redirect('customer/orederdetails/'.base64_encode($post['order_item_id']));	
	}

	//echo '<pre>';print_r($data);exit;
 }
public function productscompare()
 {

 	$pid=base64_decode($this->uri->segment(3));
 	$category_ld =base64_decode($this->uri->segment(4));
 	//print_r($category_ld);exit;
	$data['compore_products']= $this->category_model->get_products($pid);
	$data['item']=$this->category_model->getsubitemdata($category_ld);
	$data['first_item']=$pid;
	$this->template->write_view('content', 'customer/compare',$data);
	$this->template->render();
	
 }
public function compare_items_list()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		//print_r($category_ld);exit;
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		//print_r($data);exit;
		$this->load->view('customer/compareone',$data);

	}
	public function compare_items_list_two()
	{
		$items=$this->input->post('item_id');
		$category =$this->input->post('category_id');
		$data['compare_one']=$this->category_model->getcompare_item_details($items);
		$data['items']=$this->category_model->getsubitemdata($category);
		$this->load->view('customer/comparetwo',$data);
  	}
	public function checkpincodes()
	{
		$pinid=$this->input->post('pincode');
		$pinode_list= $this->category_model->get_area_pincodes($pinid);
		if (count($pinode_list)>0) {
				$this->session->set_userdata('pincode',trim($pinid));	
				$this->session->set_userdata('time',$pinode_list['hours']);	
				$data['msg']=1;
				$data['time']=$pinode_list['hours'];
				echo json_encode($data);
			}else{
				$this->session->set_userdata('pincode',trim($pinid));
				$this->session->set_userdata('time',"We don't have service in your pincode");
				$data['msg']=0;
				$data['time']='';
				echo json_encode($data);
			}
  }
	public function billingcheckpincodes()
	{
		$pinid=$this->input->post('pincode');
		$pinode_list= $this->category_model->get_area_pincodes($pinid);
		if (count($pinode_list)>0) {
				$data['msg']=1;
				$data['time']=$pinode_list['hours'];
				echo json_encode($data);
			}else{
				$data['msg']=0;
				$data['time']='';
				echo json_encode($data);
			}
  }
public function suitemwiseproductslist(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$subitem_list= $this->category_model->get_subitem_list($post['subitem_id'],$post['item_id']);
		//echo $this->db->last_query();
		//echo '<pre>';print_r($subitem_list);exit;
		if(count($subitem_list)>0){
		foreach($subitem_list as $list){
		//echo '<pre>';print_r($list);exit;
		$sameunitproduct=$this->category_model->get_subitemwise_unit_products_list($list['subitemid'],$list['unit']);

		$desc=$this->category_model->get_products_desc_list($list['item_id']);
		$plist[$list['item_id']]['list']=$list;
		$plist[$list['item_id']]['list']['descriptions_list']=$desc;
		$plist[$list['item_id']]['list']['unitproducts_list']=$sameunitproduct;
		}
		foreach($plist as $list){
		foreach($list as $li){
		$plist_list[]=$li;
		
		}
		}
		$data['subcategory_porduct_list']=$plist_list;

		}else{
		$data['subcategory_porduct_list']=array();
		}
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$this->load->view('customer/grocerysubitemwisefiltersproduct',$data);
	}
	public function unitwiseproduct_details(){
		$post=$this->input->post();
		//secho '<pre>';print_r($post);exit;
		$products_list= $this->category_model->get_untiwise_product_details($post['item_id']);
		//echo '<pre>';print_r($products_list);exit;
		if(count($products_list)>0){
		foreach($products_list as $list){
		//echo '<pre>';print_r($list);
		$desc=$this->category_model->get_products_desc_list($list['item_id']);
		$sameunitproduct=$this->category_model->get_sameunit_products_list($list['item_name']);
		$plist[$list['item_id']]['list']=$list;
		$plist[$list['item_id']]['list']['descriptions_list']=$desc;
		$plist[$list['item_id']]['list']['unitproducts_list']=$sameunitproduct;
		}
		foreach($plist as $list){
		foreach($list as $li){
		$plist_list[]=$li;
		
		}
		}
		$data['subcategory_porduct_list']=$plist_list;

		}else{
		$data['subcategory_porduct_list']=array();
		}
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
		foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
		
	//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$this->load->view('customer/unitwiseproductdetails',$data);
	}
	public function offers(){
		$ids= $this->category_model->get_ll_products();
		foreach ($ids as $productslist){
			$item_price= $productslist['special_price'];
			echo $prices= ($productslist['item_cost']-$productslist['special_price']);
			echo '--';
			echo $percentage= (($prices) /$productslist['item_cost'])*100;
			echo '<br>';
			$orginal_price=$productslist['item_cost'];
			$this->category_model->get_ll_products_update($productslist['item_id'],$prices,number_format($percentage, 2));
		}
		//echo '<pre>';print_r($ids);exit;
	}
	public function mobileviewsubcategorywiseproducts(){
		$post=$this->input->post();
		$plist=$this->category_model->mobileviewsubcategorywiseproducts_list($post['subcatid']);
		$getcatidlis=$this->category_model->get_category_details($post['subcatid']);
		$subcaterory_id=$post['subcatid'];
		$caterory_id=$getcatidlis['category_id'];
		$data['subcategory_id']=$subcaterory_id;
		$data['categoryid']=$caterory_id;
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$price_list= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		
		//echo $this->db->last_query();exit;
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data['color_list']);exit;
		foreach ($price_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		if(count($plist)>0){
			foreach($plist as $list){
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			}
	
				if(isset($reviewrating) && count($reviewrating)>0){
					$data['avg_count']=$reviewrating;
				}else{
					$data['avg_count']=array();
				}
				if(isset($reviewcount) && count($reviewcount)>0){
					$data['rating_count']=$reviewcount;
				}else{
					$data['rating_count']=array();
				}
				$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
				if(count($wishlist_ids)>0){
				foreach ($wishlist_ids as  $list){
					$customer_ids_list[]=$list['cust_id'];
					$whishlist_item_ids_list[]=$list['item_id'];
					$whishlist_ids_list[]=$list['id'];
				}
				$data['customer_ids_list']=$customer_ids_list;
				$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
				$data['whishlist_ids_list']=$whishlist_ids_list;
				}else{
				$data['customer_ids_list']=array();
				$data['whishlist_item_ids_list']=array();
				$data['whishlist_ids_list']=array();
				}
			$data['product_list']=$plist;
		}else{
			$data['product_list']=array();
		}
		$this->load->view('customer/mobileviewproducts',$data);
	
	}
	public function mobileviewfilers(){
		$post=$this->input->post();
		$ip=$this->input->ip_address();
		$removesearch= $this->category_model->get_all_previous_search_fields();
		foreach ($removesearch as $list){
		$this->category_model->delete_privous_searchdata($list['id']);
		}
		if(isset($post['brand'])&& $post['brand']!=''){
			foreach ($post['brand'] as $li){
				$lists[]=$li;
			}
			foreach($lists as $list){
				$data1=array(
						'Ip_address'=>$ip,
						'category_id'=>$post['categoryid'],
						'subcategory_id'=>$post['subcategory_id'],
						'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
						'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
						'brand'=>isset($list) ? $list:'',
						'create'=>date('Y-m-d H:i:s'),
						);
						$this->category_model->save_mobileviewfilter_data($data1);
					} 
			}
			if(isset($post['offers'])&& $post['offers']!=''){
			foreach ($post['offers'] as $li){
				$offerlists[]=$li;
			}
			foreach($offerlists as $list){
				$data1=array(
						'Ip_address'=>$ip,
						'category_id'=>$post['categoryid'],
						'subcategory_id'=>$post['subcategory_id'],
						'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
						'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
						'offers'=>isset($list) ? $list:'',
						'create'=>date('Y-m-d H:i:s'),
						);
						$this->category_model->save_mobileviewfilter_data($data1);
					} 
			}
			if(isset($post['colors'])&& $post['colors']!=''){
			foreach ($post['colors'] as $li){
				$colorslists[]=$li;
			}
			foreach($colorslists as $list){
				$data1=array(
						'Ip_address'=>$ip,
						'category_id'=>$post['categoryid'],
						'subcategory_id'=>$post['subcategory_id'],
						'mini_amount'=>isset($post['min_amount']) ? $post['min_amount']:'',
						'max_amount'=>isset($post['max_amount']) ? $post['max_amount']:'',
						'color'=>isset($list) ? $list:'',
						'create'=>date('Y-m-d H:i:s'),
						);
						$this->category_model->save_mobileviewfilter_data($data1);
					} 
			}
		redirect('category/mobileviewfilers_result');
	}
	public function mobileviewfilers_result(){
		$post=$this->input->post();
		$product_detals=$this->category_model->get_Mobile_search_all_subcategory_products();
		$data['previousdata']= $this->category_model->get_all_previous_search_fields();
		if(count($data['previousdata'])==0){
			redirect();
		}
		//echo '<pre>';print_r($product_detals);exit;
		$subcaterory_id=$data['previousdata'][0]['subcategory_id'];
		$caterory_id=$data['previousdata'][0]['category_id'];
		$data['subcategory_id']=$subcaterory_id;
		$data['categoryid']=$caterory_id;
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$price_list= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		
		//echo $this->db->last_query();exit;
		$data['discount_list']= $this->category_model->get_all_discount_list_sub($caterory_id,$subcaterory_id);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data['color_list']);exit;
		foreach ($price_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		if(count($product_detals[0])>0){
			foreach($product_detals[0] as $list){
			$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
			$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
			}
	
				if(isset($reviewrating) && count($reviewrating)>0){
					$data['avg_count']=$reviewrating;
				}else{
					$data['avg_count']=array();
				}
				if(isset($reviewcount) && count($reviewcount)>0){
					$data['rating_count']=$reviewcount;
				}else{
					$data['rating_count']=array();
				}
				$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
				if(count($wishlist_ids)>0){
				foreach ($wishlist_ids as  $list){
					$customer_ids_list[]=$list['cust_id'];
					$whishlist_item_ids_list[]=$list['item_id'];
					$whishlist_ids_list[]=$list['id'];
				}
				$data['customer_ids_list']=$customer_ids_list;
				$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
				$data['whishlist_ids_list']=$whishlist_ids_list;
				}else{
				$data['customer_ids_list']=array();
				$data['whishlist_item_ids_list']=array();
				$data['whishlist_ids_list']=array();
				}
			$data['product_list']=$product_detals[0];
		}else{
			$data['product_list']=array();
		}
		//echo '<pre>';print_r($data['previousdata']);exit;
		//$this->load->view('customer/mobileviewproductsresult',$data);
		$this->template->write_view('content', 'customer/mobileviewproductsresult',$data);
		$this->template->render();
	}
	/* subcategorys wise*/
	public function subitemwise(){
	    $subitemid=base64_decode($this->uri->segment(3));
		$subcatid=base64_decode($this->uri->segment(4));
	    $catid=base64_decode($this->uri->segment(5));
		if($subitemid=='' ||  $subcatid ==''){
			redirect();
		}
		$removesearch= $this->category_model->get_all_previous_subitem_search_fields($this->input->ip_address());
		foreach ($removesearch as $list){
		$this->category_model->delete_privous_subitemwise_searchdata($list['id']);
		}
		$data['subitemid']=$subitemid;
		$data['subcatid']=$subcatid;
		if(isset($catid) && $catid==21){
			$subitemwise= $this->category_model->get_all_itemproducts_list($subcatid,$subitemid);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($subitemwise);exit;
				if(count($subitemwise)>0){
					foreach($subitemwise as $list){
					//echo '<pre>';print_r($list);
					$desc=$this->category_model->get_products_desc_list($list['item_id']);
					$sameunitproduct=$this->category_model->get_subitemwise_unit_products_list($list['subitemid'],$list['unit']);
					$plist[$list['item_id']]=$list;
					$plist[$list['item_id']]['descriptions_list']=$desc;
					$plist[$list['item_id']]['unitproducts_list']=$sameunitproduct;
					}
					
					//echo '<pre>';print_r($plist);exit;
					if(isset($subitemwise) && count($subitemwise)>0){
					foreach($subitemwise as $list){
					$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
					}
					}
				$data['subitemwise']=$plist;
				}else{
					$data['subitemwise']=array();
				}
		}else{
			$data['subitemwise']= $this->category_model->get_all_itemproducts_list($subcatid,$subitemid);
			//echo $this->db->last_query();
				if(isset($data['subitemwise']) && count($data['subitemwise'])>0){
				foreach($data['subitemwise'] as $list){
					$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
					}
				}

		}
		//echo '<pre>';print_r($data);exit;
		$data['brand_list']= $this->category_model->get_subitem_all_brand_list($subcatid,$subitemid);
		$data['price_list']= $this->category_model->get_subitem_all_price_list($subcatid,$subitemid);
		//$data['discount_list']= $this->category_model->get_subitem_all_discount_list($subitemid);
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_subitem_all_offer_list($subcatid,$subitemid);
		$data['color_list']= $this->category_model->get_subitem_all_color_list($subcatid,$subitemid);
		$data['ram_list']= $this->category_model->get_ram_type_list_itemwise($subcatid,$subitemid);
		$data['os_list']= $this->category_model->get_os_type_list_itemwise($subcatid,$subitemid);
		$data['sim_list']= $this->category_model->get_sim_type_type_list_itemwise($subcatid,$subitemid);
		$data['camera_list']= $this->category_model->get_camera_type_list_itemwise($subcatid,$subitemid);
		$data['internal_memeory_list']= $this->category_model->get_internal_memeory_list_itemwise($subcatid,$subitemid);
		$data['screen_size_list']= $this->category_model->get_screen_size_list_itemwise($subcatid,$subitemid);
		$data['Processor_list']= $this->category_model->get_Processor_list_itemwise($subcatid,$subitemid);
		$data['printer_type']= $this->category_model->get_printer_type_list_itemwise($subcatid,$subitemid);
		$data['type_list']= $this->category_model->get_type_list_itemwise($subcatid,$subitemid);
		$data['max_copies']= $this->category_model->get_maxcopies_list_itemwise($subcatid,$subitemid);
		$data['paper_size']= $this->category_model->get_paper_size_list_itemwise($subcatid,$subitemid);
		$data['headphone_jack']= $this->category_model->get_headphone_jack_list_itemwise($subcatid,$subitemid);
		$data['noise_reduction']= $this->category_model->get_noise_reduction_list_itemwise($subcatid,$subitemid);
		$data['usb_port']= $this->category_model->get_usbr_port_list_itemwise($subcatid,$subitemid);
		$data['compatible_for']= $this->category_model->get_compatible_for_list_itemwise($subcatid,$subitemid);
		$data['scanner_type']= $this->category_model->get_scanner_type_list_itemwise($subcatid,$subitemid);
		$data['resolution']= $this->category_model->get_resolution_list_itemwise($subcatid,$subitemid);
		$data['f_stop']= $this->category_model->get_f_stop_list_itemwise($subcatid,$subitemid);
		$data['minimum_focusing_distance']= $this->category_model->get_minimum_focusing_distance_list_itemwise($subcatid,$subitemid);
		$data['aperture_withmaxfocal_length']= $this->category_model->get_aperture_withmaxfocal_length_list_itemwise($subcatid,$subitemid);
		$data['picture_angle']= $this->category_model->get_picture_angle_list_itemwise($subcatid,$subitemid);
		$data['size_list']= $this->category_model->get_size_list_itemwise($subcatid,$subitemid);
		$data['weight_list']= $this->category_model->get_weight_list_itemwise($subcatid,$subitemid);
		$data['occasion_list']= $this->category_model->get_occasion_list_itemwise($subcatid,$subitemid);
		$data['material_list']= $this->category_model->get_material_list_itemwise($subcatid,$subitemid);
		$data['collar_type']= $this->category_model->get_collar_type_itemwise($subcatid,$subitemid);
		$data['gender_list']= $this->category_model->get_gender_list_itemwise($subcatid,$subitemid);
		$data['sleeve_list']= $this->category_model->get_sleeve_list_itemwise($subcatid,$subitemid);
		$data['look_list']= $this->category_model->get_look_list_itemwise($subcatid,$subitemid);
		$data['style_code']= $this->category_model->get_style_code_itemwise($subcatid,$subitemid);
		$data['inner_material']= $this->category_model->get_inner_material_itemwise($subcatid,$subitemid);
		$data['waterproof']= $this->category_model->get_waterproof_itemwise($subcatid,$subitemid);
		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
				$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
				$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
			$data['offer_list']=$uniids;
	
	
				if(isset($reviewrating) && count($reviewrating)>0){
					$data['avg_count']=$reviewrating;
				}else{
					$data['avg_count']=array();
				}
				if(isset($reviewcount) && count($reviewcount)>0){
					$data['rating_count']=$reviewcount;
				}else{
					$data['rating_count']=array();
				}
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
		if(count($cartitemids)>0){
		foreach($cartitemids as $list){
			$cust_ids[]=$list['cust_id'];
			$cart_item_ids[]=$list['item_id'];
			$cart_ids[]=$list['id'];
			
		}
		$data['cust_ids']=$cust_ids;
		$data['cart_item_ids']=$cart_item_ids;
		$data['cart_ids']=$cart_ids;
		
	}else{
		$data['cust_ids']=array();
		$data['cart_item_ids']=array();
		$data['cart_ids']=array();
	}
	$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$data['subitemwise_item_list']= $this->category_model->get_all_subwise_item_list($subcatid,$subitemid);
	//echo '<pre>';print_r($data);exit;
	if($catid==21){
		$this->template->write_view('content', 'customer/grocerysubcategorywiseproducts',$data);
		$this->template->render();
	}else{
		$this->template->write_view('content', 'customer/subitemwise',$data);
		$this->template->render();
	}
		
	  
	  //echo 'dfd';exit;
	}
public function subitemwise_search(){
	
	$post=$this->input->post();
	//echo '<pre>';print_r($cusine);
	//echo '<pre>';print_r($post);exit;
	
				if(isset($post['searchvalue']) && $post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
					$offer=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['offer']==$post['productsvalues']){
						$data=array('offer'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$offer='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
					$brand=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['brand']==$post['productsvalues']){
						$data=array('brand'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$brand='';
				}
				
				if($post['searchvalue']=='discount' && $post['unchecked']!='uncheck'){
					$discount=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='discount'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['discount']==$post['productsvalues']){
						$data=array('discount'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$discount='';
				}
				if($post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
					$color=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['colour']==$post['productsvalues']){
						$data=array('colour'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$color='';
				}
				if($post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
					$size=$post['productsvalues'];
				}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['size']==$post['productsvalues']){
						$data=array('size'=>'');
						$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
					$ram=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['ram']==$post['productsvalues']){
							$data=array('ram'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$ram='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
					$os=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['os']==$post['productsvalues']){
							$data=array('os'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$os='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
					$sim_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['sim_type']==$post['productsvalues']){
							$data=array('sim_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$sim_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='camera' && $post['unchecked']!='uncheck'){
					$camera=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='camera'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['camera']==$post['productsvalues']){
							$data=array('camera'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$camera='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='internal_memeory' && $post['unchecked']!='uncheck'){
					$internal_memeory=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_memeory'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['internal_memeory']==$post['productsvalues']){
							$data=array('internal_memeory'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$internal_memeory='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='screen_size' && $post['unchecked']!='uncheck'){
					$screen_size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='screen_size'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['screen_size']==$post['productsvalues']){
							$data=array('screen_size'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$screen_size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='Processor' && $post['unchecked']!='uncheck'){
					$Processor=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='Processor'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['Processor']==$post['productsvalues']){
							$data=array('Processor'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$Processor='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='type' && $post['unchecked']!='uncheck'){
					$type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['type']==$post['productsvalues']){
							$data=array('type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='printer_type' && $post['unchecked']!='uncheck'){
					$printer_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='printer_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['printer_type']==$post['productsvalues']){
							$data=array('printer_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$printer_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='max_copies' && $post['unchecked']!='uncheck'){
					$max_copies=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='max_copies'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['max_copies']==$post['productsvalues']){
							$data=array('max_copies'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$max_copies='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='paper_size' && $post['unchecked']!='uncheck'){
					$paper_size=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='paper_size'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['paper_size']==$post['productsvalues']){
							$data=array('paper_size'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$paper_size='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='headphone_jack' && $post['unchecked']!='uncheck'){
					$headphone_jack=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='headphone_jack'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['headphone_jack']==$post['productsvalues']){
							$data=array('headphone_jack'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$headphone_jack='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='noise_reduction' && $post['unchecked']!='uncheck'){
					$noise_reduction=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='noise_reduction'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['noise_reduction']==$post['productsvalues']){
							$data=array('noise_reduction'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$noise_reduction='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='usb_port' && $post['unchecked']!='uncheck'){
					$usb_port=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usb_port'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['usb_port']==$post['productsvalues']){
							$data=array('usb_port'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$usb_port='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='compatible_for' && $post['unchecked']!='uncheck'){
					$compatible_for=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='compatible_for'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['compatible_for']==$post['productsvalues']){
							$data=array('compatible_for'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$compatible_for='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='scanner_type' && $post['unchecked']!='uncheck'){
					$scanner_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='scanner_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['scanner_type']==$post['productsvalues']){
							$data=array('scanner_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$scanner_type='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='resolution' && $post['unchecked']!='uncheck'){
					$resolution=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='resolution'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['resolution']==$post['productsvalues']){
							$data=array('resolution'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$resolution='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='f_stop' && $post['unchecked']!='uncheck'){
					$f_stop=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='f_stop'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['f_stop']==$post['productsvalues']){
							$data=array('f_stop'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$f_stop='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='minimum_focusing_distance' && $post['unchecked']!='uncheck'){
					$minimum_focusing_distance=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='minimum_focusing_distance'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['minimum_focusing_distance']==$post['productsvalues']){
							$data=array('minimum_focusing_distance'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$minimum_focusing_distance='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='aperture_withmaxfocal_length' && $post['unchecked']!='uncheck'){
					$aperture_withmaxfocal_length=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='aperture_withmaxfocal_length'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['aperture_withmaxfocal_length']==$post['productsvalues']){
							$data=array('aperture_withmaxfocal_length'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$aperture_withmaxfocal_length='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='picture_angle' && $post['unchecked']!='uncheck'){
					$picture_angle=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='picture_angle'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['picture_angle']==$post['productsvalues']){
							$data=array('picture_angle'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$picture_angle='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='weight' && $post['unchecked']!='uncheck'){
					$weight=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='weight'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['weight']==$post['productsvalues']){
							$data=array('weight'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$weight='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='occasion' && $post['unchecked']!='uncheck'){
					$occasion=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='occasion'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['occasion']==$post['productsvalues']){
							$data=array('occasion'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$occasion='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='material' && $post['unchecked']!='uncheck'){
					$material=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='material'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['material']==$post['productsvalues']){
							$data=array('material'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$material='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='collar_type' && $post['unchecked']!='uncheck'){
					$collar_type=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='collar_type'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['collar_type']==$post['productsvalues']){
							$data=array('collar_type'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$collar_type='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='gender' && $post['unchecked']!='uncheck'){
					$gender=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='gender'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['gender']==$post['productsvalues']){
							$data=array('gender'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$gender='';
				}
				if(isset($post['searchvalue']) && $post['searchvalue']=='sleeve' && $post['unchecked']!='uncheck'){
					$sleeve=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sleeve'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['sleeve']==$post['productsvalues']){
							$data=array('sleeve'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$sleeve='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='look' && $post['unchecked']!='uncheck'){
					$look=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='look'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['look']==$post['productsvalues']){
							$data=array('look'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$look='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='style_code' && $post['unchecked']!='uncheck'){
					$style_code=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='style_code'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['style_code']==$post['productsvalues']){
							$data=array('style_code'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$style_code='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='inner_material' && $post['unchecked']!='uncheck'){
					$inner_material=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='inner_material'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['inner_material']==$post['productsvalues']){
							$data=array('inner_material'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$inner_material='';
				}if(isset($post['searchvalue']) && $post['searchvalue']=='waterproof' && $post['unchecked']!='uncheck'){
					$waterproof=$post['productsvalues'];
				}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='waterproof'){
					$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
					foreach ($removesearch as $list){
						if($list['waterproof']==$post['productsvalues']){
							$data=array('waterproof'=>'');
							$this->category_model->subitem_wise_update_deails($list['id'],$data);
						}
					} 
				}else{
					$waterproof='';
				}
				
		
	
	$ip=$this->input->ip_address();
	
	$data1=array(
	'ip_address'=>$ip,
	'subcategory_id'=>$post['subcatid'],
	'subitemid'=>$post['subitemid'],
	'minimum_price'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
	'maximum_price'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
	'offer'=>isset($offer) ? $offer:'',
	'brand'=>isset($brand) ? $brand:'',
	'colour'=>isset($color) ? $color:'',
	'discount'=>isset($discount) ? $discount:'',
	'size'=>isset($size) ? $size:'',
	'ram'=>isset($ram) ? $ram:'',
	'os'=>isset($os) ? $os:'',
	'sim_type'=>isset($sim_type)?$sim_type:'',
	'camera'=>isset($camera)?$camera:'',
	'internal_memeory'=>isset($internal_memeory)?$internal_memeory:'',
	'screen_size'=>isset($screen_size)?$screen_size:'',
	'Processor'=>isset($Processor)?$Processor:'',
	'printer_type'=>isset($printer_type)?$printer_type:'',
	'type'=>isset($type)?$type:'',
	'max_copies'=>isset($max_copies)?$max_copies:'',
	'paper_size'=>isset($paper_size)?$paper_size:'',
	'headphone_jack'=>isset($headphone_jack)?$headphone_jack:'',
	'noise_reduction'=>isset($noise_reduction)?$noise_reduction:'',
	'usb_port'=>isset($usb_port)?$usb_port:'',
	'compatible_for'=>isset($compatible_for)?$compatible_for:'',
	'scanner_type'=>isset($scanner_type)?$scanner_type:'',
	'resolution'=>isset($resolution)?$resolution:'',
	'f_stop'=>isset($f_stop)?$f_stop:'',
	'minimum_focusing_distance'=>isset($minimum_focusing_distance)?$minimum_focusing_distance:'',
	'aperture_withmaxfocal_length'=>isset($aperture_withmaxfocal_length)?$aperture_withmaxfocal_length:'',
	'picture_angle'=>isset($picture_angle)?$picture_angle:'',
	'weight'=>isset($weight)?$weight:'',
	'occasion'=>isset($occasion)?$occasion:'',
	'material'=>isset($material)?$material:'',
	'collar_type'=>isset($collar_type)?$collar_type:'',
	'gender'=>isset($gender)?$gender:'',
	'sleeve'=>isset($sleeve)?$sleeve:'',
	'look'=>isset($look)?$look:'',
	'style_code'=>isset($style_code)?$style_code:'',
	'inner_material'=>isset($inner_material)?$inner_material:'',
	'waterproof'=>isset($waterproof)?$waterproof:'',
	'create_at'=>date('Y-m-d H:i:s'),
	);
	//echo '<pre>';print_r($data1);
	//exit;
	$s_s_i_data= $this->category_model->save_subitemsearchdata($data1);
	if(count($s_s_i_data)>0){
		$removesearch= $this->category_model->get_subitem_all_previous_search_fields();
		foreach ($removesearch as $list){
			$data=array('minimum_price'=>$post['mini_mum'],'maximum_price'=>$post['maxi_mum']);
			$this->category_model->subitem_wise_update_deails($list['id'],$data);	
		}
		redirect('category/subitemwise_searchresult');
		
	}
 }
 
	 public function subitemwise_searchresult(){
				$data['subitemwise']= $this->category_model->get_subitemwise_search_result_data($this->input->ip_address());
				$data['previousdata']= $this->category_model->get_all_previous_subitemwise_search_fields($this->input->ip_address());
				$filterscatid= $this->category_model->get_subitemwise_data_category_id($this->input->ip_address());
				$data['subitemdetais']=$this->category_model->get_subitem_details($filterscatid['subitemid']);
				$data['subitemid']=$filterscatid['subitemid'];
				$data['subcatid']=$filterscatid['subcategory_id'];
				$subcatid=$filterscatid['subcategory_id'];
				$subitemid=$filterscatid['subitemid'];
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_subitem_all_brand_list($subcatid,$subitemid);
				$data['price_list']= $this->category_model->get_subitem_all_price_list($subcatid,$subitemid);
				//$data['discount_list']= $this->category_model->get_subitem_all_discount_list($subitemid);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_subitem_all_offer_list($subcatid,$subitemid);
				$data['color_list']= $this->category_model->get_subitem_all_color_list($subcatid,$subitemid);
				$data['ram_list']= $this->category_model->get_ram_type_list_itemwise($subcatid,$subitemid);
				$data['os_list']= $this->category_model->get_os_type_list_itemwise($subcatid,$subitemid);
				$data['sim_list']= $this->category_model->get_sim_type_type_list_itemwise($subcatid,$subitemid);
				$data['camera_list']= $this->category_model->get_camera_type_list_itemwise($subcatid,$subitemid);
				$data['internal_memeory_list']= $this->category_model->get_internal_memeory_list_itemwise($subcatid,$subitemid);
				$data['screen_size_list']= $this->category_model->get_screen_size_list_itemwise($subcatid,$subitemid);
				$data['Processor_list']= $this->category_model->get_Processor_list_itemwise($subcatid,$subitemid);
				$data['printer_type']= $this->category_model->get_printer_type_list_itemwise($subcatid,$subitemid);
				$data['type_list']= $this->category_model->get_type_list_itemwise($subcatid,$subitemid);
				$data['max_copies']= $this->category_model->get_maxcopies_list_itemwise($subcatid,$subitemid);
				$data['paper_size']= $this->category_model->get_paper_size_list_itemwise($subcatid,$subitemid);
				$data['headphone_jack']= $this->category_model->get_headphone_jack_list_itemwise($subcatid,$subitemid);
				$data['noise_reduction']= $this->category_model->get_noise_reduction_list_itemwise($subcatid,$subitemid);
				$data['usb_port']= $this->category_model->get_usbr_port_list_itemwise($subcatid,$subitemid);
				$data['compatible_for']= $this->category_model->get_compatible_for_list_itemwise($subcatid,$subitemid);
				$data['scanner_type']= $this->category_model->get_scanner_type_list_itemwise($subcatid,$subitemid);
				$data['resolution']= $this->category_model->get_resolution_list_itemwise($subcatid,$subitemid);
				$data['f_stop']= $this->category_model->get_f_stop_list_itemwise($subcatid,$subitemid);
				$data['minimum_focusing_distance']= $this->category_model->get_minimum_focusing_distance_list_itemwise($subcatid,$subitemid);
				$data['aperture_withmaxfocal_length']= $this->category_model->get_aperture_withmaxfocal_length_list_itemwise($subcatid,$subitemid);
				$data['picture_angle']= $this->category_model->get_picture_angle_list_itemwise($subcatid,$subitemid);
				$data['size_list']= $this->category_model->get_size_list_itemwise($subcatid,$subitemid);
				$data['weight_list']= $this->category_model->get_weight_list_itemwise($subcatid,$subitemid);
				$data['occasion_list']= $this->category_model->get_occasion_list_itemwise($subcatid,$subitemid);
				$data['material_list']= $this->category_model->get_material_list_itemwise($subcatid,$subitemid);
				$data['collar_type']= $this->category_model->get_collar_type_itemwise($subcatid,$subitemid);
				$data['gender_list']= $this->category_model->get_gender_list_itemwise($subcatid,$subitemid);
				$data['sleeve_list']= $this->category_model->get_sleeve_list_itemwise($subcatid,$subitemid);
				$data['look_list']= $this->category_model->get_look_list_itemwise($subcatid,$subitemid);
				$data['style_code']= $this->category_model->get_style_code_itemwise($subcatid,$subitemid);
				$data['inner_material']= $this->category_model->get_inner_material_itemwise($subcatid,$subitemid);
				$data['waterproof']= $this->category_model->get_waterproof_itemwise($subcatid,$subitemid);
				foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
					$amounts[]=$list['item_cost'];
					}else{
					$amounts[]=$list['special_price'];
					}

				}
				$minamt = min($amounts);
				$maxamt= max($amounts);
				//echo '<pre>';print_r( $amounts);exit;
				$data['minimum_price'] = array('item_cost'=>$minamt);
				$data['maximum_price'] = array('item_cost'=>$maxamt);
				//echo '<pre>';print_r($data);exit;
				//echo max($data['price_list']);
				foreach ($offer_list as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						if($list['offer_percentage']!=''){
						$ids[]=$list['offer_percentage'];
						}
					}else{
						if($list['offers']!=''){
						$ids[]=$list['offers'];
						}
					}
					
				}
				foreach (array_unique($ids) as $Li){
					$uniids[]=array('offers'=>$Li);
					
				}
					$data['offer_list']=$uniids;
				if(isset($data['subitemwise']) && count($data['subitemwise'])>0){
					foreach($data['subitemwise'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
						$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			$this->load->view('customer/subitemwiseliterresult',$data);
	 }
	 
	 public function subcategorys(){
		$cateid=base64_decode($this->uri->segment(3));
		//echo '<pre>';print_r($cateid);exit;
		$step_one= $this->category_model->step_one_data(1);
		$data['step_one']=array_chunk($step_one, 3);
		$data['step_two']= $this->category_model->step_two_data($cateid);
		$data['step_three']= $this->category_model->step_three_data($cateid);
		$step_four= $this->category_model->step_four_data(2);
		$data['step_four']=array_chunk($step_four, 2);
		$step_five= $this->category_model->step_five_data($cateid);
		//echo '<pre>';print_r($step_five);exit;
		$amt= ($step_five['max'])/4;
		$amount=array(array($amt),array($amt*2),array($amt*3),array($amt*4),$step_five['category_id']);
		$data['step_five']=array_chunk($amount, 5);
		//echo '<pre>';print_r($data['step_five']);exit;
		if($cateid==21 || $cateid==31 || $cateid==19 || $cateid==24 || $cateid==35 ||  $cateid==28 ||  $cateid==20){
		$data['step_six']= $this->category_model->step_six_data($cateid);
		$data['step_sixlabel']='Offer';
		}else if($cateid==19 || $cateid==24){
			$data['step_sixlabel']='Type';
			$data['step_six']= $this->category_model->step_six_data($cateid);
		}if($cateid==21 || $cateid==31){
			$data['step_sixlabel']='Offer';
		}if($cateid==28 ){
			$data['step_sixlabel']='Offer';
		}if($cateid==35 ){
			$data['step_sixlabel']='Type';
		}if($cateid==20 ){
			$data['step_sixlabel']='Screen Size';
		}
		$step_seven= $this->category_model->step_seven_data(3);
		$data['step_seven']=array_chunk($step_seven, 3);
		$data['step_eight']= $this->category_model->step_eight_data($cateid);
		if($cateid==21 || $cateid==31 || $cateid==19 || $cateid==24 || $cateid==35 ||  $cateid==28 ||  $cateid==20){
			if($cateid==21){
				$data['step_nine']= $this->category_model->step_dealsnine_data($cateid);
				$data['step_ninelabel']='Deals of the day';
			}else {
				$data['step_nine']= $this->category_model->step_nine_data($cateid);
			}
			if($cateid==19 || $cateid==24){
				$data['step_ninelabel']='Occasion';
			}else if($cateid==20){
				$data['step_ninelabel']='Battery Capacity';
			}else if($cateid!=21){
				$data['step_ninelabel']='X';
			}
		}
		if($cateid==21 || $cateid==31 || $cateid==19 || $cateid==24 || $cateid==35 ||  $cateid==28 ||  $cateid==20){
			if($cateid==21){
				$data['step_ten']= $this->category_model->step_seasonten_data($cateid);
					$data['step_tenlabel']='Season of the day';
			}else if($cateid==19 || $cateid==24){
				$data['step_ten']= $this->category_model->step_tenfootwear_data($cateid);
			}else{
				$data['step_ten']= $this->category_model->step_ten_data($cateid);
			}
			if($cateid==19 || $cateid==24){
				$data['step_tenlabel']='Footware';
			}else if($cateid!=21 && $cateid==20){
				$data['step_tenlabel']='camera';
			}else if($cateid==30){
				$data['step_tenlabel']='age';
			}else if($cateid!=21){
				$data['step_tenlabel']='Z';
			}
		}
		$step_eleven= $this->category_model->step_eleven_data(4);
		$data['step_eleven']=array_chunk($step_eleven, 4);
		$data['step_twelve']= $this->category_model->step_twelve_data($cateid);
		$data['step_thirteen']= $this->category_model->step_thirteen_data($cateid);
		$step_fourteen= $this->category_model->step_fourteen_data(5);
		$data['step_fourteen']=array_chunk($step_fourteen, 4);
	
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data['step_eight']);exit;
		$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
		 $this->template->write_view('content', 'customer/subcategorypage',$data);
		$this->template->render();
		 
	 }
	 public function subcategory(){
		 $getprovious=$this->category_model->get_subcategory_privousdata($this->input->ip_address());
		 if(count($getprovious)>0){
			 foreach ($getprovious as $list){
				 $this->category_model->delete_privous_subcategort_searchdata($list['id']);
			 }
		 }
		 $catid=base64_decode($this->uri->segment(3));
		 $subcatid=base64_decode($this->uri->segment(4));
		 $caterory_id=$catid;
		 $subcaterory_id=$subcatid;
		 $data['caterory_id']=$catid;
		 $data['subcaterory_id']=$subcatid;
		 $data['itemlist']= $this->category_model->subcategorywise_subitems($subcatid);
		 //echo '<pre>';print_r($data);exit;
		 if(isset($caterory_id) && $caterory_id==21){
			$subitemwise= $this->category_model->get_all_subcatproducts_list($subcatid);
			//echo $this->db->last_query();
			//echo '<pre>';print_r($subitemwise);exit;
				if(count($subitemwise)>0){
					foreach($subitemwise as $list){
					//echo '<pre>';print_r($list);
					$desc=$this->category_model->get_products_desc_list($list['item_id']);
					$sameunitproduct=$this->category_model->get_subitemwise_unit_products_list($list['subitemid'],$list['unit']);
					$plist[$list['item_id']]=$list;
					$plist[$list['item_id']]['descriptions_list']=$desc;
					$plist[$list['item_id']]['unitproducts_list']=$sameunitproduct;
					}
					
					//echo '<pre>';print_r($plist);exit;
					if(isset($subitemwise) && count($subitemwise)>0){
					foreach($subitemwise as $list){
					$reviewrating[]=$this->category_model->product_reviews_avg($list['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($list['item_id']);
					}
					}
					//echo '<pre>';print_r($plist);exit;
				$data['subitemwise']=$plist;
				}else{
					$data['subitemwise']=array();
				}
		}else{
		 $data['productlist']= $this->category_model->subcategorywise_productlist($subcatid);
		 if(isset($data['productlist']) && count($data['productlist'])>0){
					foreach($data['productlist'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
								
		}
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
		
		 //echo '<pre>';print_r($data['itemlist']);exit;
		$data['subcatdetais']=$this->category_model->get_subcategory_details($subcaterory_id);
		$data['brand_list']= $this->category_model->get_all_brand_list_sib($caterory_id,$subcaterory_id);
		$data['price_list']= $this->category_model->get_all_price_list_sub($caterory_id,$subcaterory_id);
		//echo $this->db->last_query();
		//echo '<pre>';print_r($data['price_list']);exit;
		$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
		$offer_list= $this->category_model->get_all_offer_list_sub($caterory_id,$subcaterory_id);
		$data['color_list']= $this->category_model->get_all_color_list_sub($caterory_id,$subcaterory_id);
		$data['sizes_list']= $this->category_model->get_all_size_list_sub($caterory_id,$subcaterory_id);

		foreach ($data['price_list'] as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				$amounts[]=$list['item_cost'];
			}else{
				$amounts[]=$list['special_price'];
			}
			
		}
		$minamt = min($amounts);
		$maxamt= max($amounts);
		//echo '<pre>';print_r( $amounts);exit;
		$data['minimum_price'] = array('item_cost'=>$minamt);
		$data['maximum_price'] = array('item_cost'=>$maxamt);
		//echo max($data['price_list']);
		foreach ($offer_list as $list) {
			$date = new DateTime("now");
			$curr_date = $date->format('Y-m-d h:i:s A');
			if($list['offer_expairdate']>=$curr_date){
				if($list['offer_percentage']!=''){
					$ids[]=$list['offer_percentage'];
				}
			}else{
				if($list['offers']!=''){
					$ids[]=$list['offers'];
				}
			}
			
		}
		foreach (array_unique($ids) as $Li){
			$uniids[]=array('offers'=>$Li);
			
		}
		$data['offer_list']=$uniids;
		//echo '<pre>';print_r($data);exit;
		 $cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
		if($catid==21){
			$data['subitemwise_item_list']= $this->category_model->get_all_subcatwise_item_list($subcatid);
			//echo '<pre>';print_r($data['subitemwise_item_list']);exit;
			$this->template->write_view('content', 'customer/grocerysubcategorywiseproducts',$data);
			$this->template->render();
		}else{
			$this->template->write_view('content', 'customer/subcategory',$data);
			$this->template->render(); 

		}
	 }
	 public function item(){
		 	 $itemid=base64_decode($this->uri->segment(3));
				 if( $itemid==''){
					 redirect('');
				}	
				$data['itemdetails']= $this->category_model->item_details($itemid);
				$data['subitemwise']= $this->category_model->get_all_itemwiseproducts_list($itemid);
				if(isset($data['subitemwise']) && count($data['subitemwise'])>0){
					foreach($data['subitemwise'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
				$data['brand_list']= $this->category_model->get_item_all_brand_list($itemid,'brand');
				$data['price_list']= $this->category_model->get_item_all_price_list($itemid);
				//echo $this->db->last_query();
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_item_all_offer_list($itemid);
				$data['color_list']= $this->category_model->get_item_all_brand_list($itemid,'colour');
				$data['ram_list']= $this->category_model->get_item_all_brand_list($itemid,'ram');
				$data['os_list']= $this->category_model->get_item_all_brand_list($itemid,'os');
				$data['sim_list']= $this->category_model->get_item_all_brand_list($itemid,'sim_type');
				$data['camera_list']= $this->category_model->get_item_all_brand_list($itemid,'camera');
				$data['internal_memeory_list']= $this->category_model->get_item_all_brand_list($itemid,'internal_memeory');
				$data['screen_size_list']= $this->category_model->get_item_all_brand_list($itemid,'screen_size');
				$data['Processor_list']= $this->category_model->get_item_all_brand_list($itemid,'Processor');
				$data['printer_type']= $this->category_model->get_item_all_brand_list($itemid,'printer_type');
				$data['type_list']= $this->category_model->get_item_all_brand_list($itemid,'type');
				$data['max_copies']= $this->category_model->get_item_all_brand_list($itemid,'max_print_resolution');
				$data['paper_size']= $this->category_model->get_item_all_brand_list($itemid,'paper_size');
				$data['headphone_jack']= $this->category_model->get_item_all_brand_list($itemid,'headphone_jack');
				$data['noise_reduction']= $this->category_model->get_item_all_brand_list($itemid,'noise_reduction');
				$data['usb_port']= $this->category_model->get_item_all_brand_list($itemid,'usb_port');
				$data['compatible_for']= $this->category_model->get_item_all_brand_list($itemid,'compatible_for');
				$data['scanner_type']= $this->category_model->get_item_all_brand_list($itemid,'scanner_type');
				$data['resolution']= $this->category_model->get_item_all_brand_list($itemid,'resolution');
				$data['f_stop']= $this->category_model->get_item_all_brand_list($itemid,'f_stop');
				$data['minimum_focusing_distance']= $this->category_model->get_item_all_brand_list($itemid,'minimum_focusing_distance');
				$data['aperture_withmaxfocal_length']= $this->category_model->get_item_all_brand_list($itemid,'aperture_withmaxfocal_length');
				$data['picture_angle']= $this->category_model->get_item_all_brand_list($itemid,'picture_angle');
				$data['size_list']= $this->category_model->get_item_all_brand_list($itemid,'size');
				$data['weight_list']= $this->category_model->get_item_all_brand_list($itemid,'weight');
				$data['occasion_list']= $this->category_model->get_item_all_brand_list($itemid,'occasion');
				$data['material_list']= $this->category_model->get_item_all_brand_list($itemid,'material');
				$data['collar_type']= $this->category_model->get_item_all_brand_list($itemid,'collar_type');
				$data['gender_list']= $this->category_model->get_item_all_brand_list($itemid,'gender');
				$data['sleeve_list']= $this->category_model->get_item_all_brand_list($itemid,'sleeve');
				$data['look_list']= $this->category_model->get_item_all_brand_list($itemid,'look');
				$data['style_code']= $this->category_model->get_item_all_brand_list($itemid,'style_code');
				$data['inner_material']= $this->category_model->get_item_all_brand_list($itemid,'inner_material');
				$data['waterproof']= $this->category_model->get_item_all_brand_list($itemid,'waterproof');
				 foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						$amounts[]=$list['item_cost'];
					}else{
						$amounts[]=$list['special_price'];
					}
				 }
					$minamt = min($amounts);
					$maxamt= max($amounts);
					//echo '<pre>';print_r($data['price_list']);exit;
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					//echo max($data['price_list']);
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
							if($list['offer_percentage']!=''){
								$ids[]=$list['offer_percentage'];
							}
						}else{
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}
						
					}
					foreach (array_unique($ids) as $Li){
						$uniids[]=array('offers'=>$Li);
						
					}
				$data['offer_list']=$uniids;
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
				//echo '<pre>';print_r($data);exit;
				$this->template->write_view('content', 'customer/item',$data);
				$this->template->render();
	 }
	 public function itemwise_search(){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($cusine);
				//echo '<pre>';print_r($post);exit;
				
							if(isset($post['searchvalue']) && $post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
								$offer=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['offer']==$post['productsvalues']){
									$data=array('offer'=>'');
									$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$offer='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
								$brand=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['brand']==$post['productsvalues']){
									$data=array('brand'=>'');
									$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$brand='';
							}
							if($post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
								$color=$post['productsvalues'];
							}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['colour']==$post['productsvalues']){
									$data=array('colour'=>'');
									$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$color='';
							}
							
							//echo $color;exit;
							if($post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
								$size=$post['productsvalues'];
							}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['size']==$post['productsvalues']){
									$data=array('size'=>'');
									$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
								$ram=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['ram']==$post['productsvalues']){
										$data=array('ram'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$ram='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
								$os=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['os']==$post['productsvalues']){
										$data=array('os'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$os='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
								$sim_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['sim_type']==$post['productsvalues']){
										$data=array('sim_type'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$sim_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='camera' && $post['unchecked']!='uncheck'){
								$camera=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='camera'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['camera']==$post['productsvalues']){
										$data=array('camera'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$camera='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='internal_memeory' && $post['unchecked']!='uncheck'){
								$internal_memeory=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_memeory'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['internal_memeory']==$post['productsvalues']){
										$data=array('internal_memeory'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$internal_memeory='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='screen_size' && $post['unchecked']!='uncheck'){
								$screen_size=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='screen_size'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['screen_size']==$post['productsvalues']){
										$data=array('screen_size'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$screen_size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='Processor' && $post['unchecked']!='uncheck'){
								$Processor=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='Processor'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['Processor']==$post['productsvalues']){
										$data=array('Processor'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$Processor='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='type' && $post['unchecked']!='uncheck'){
								$type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='type'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['type']==$post['productsvalues']){
										$data=array('type'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='printer_type' && $post['unchecked']!='uncheck'){
								$printer_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='printer_type'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['printer_type']==$post['productsvalues']){
										$data=array('printer_type'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$printer_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='max_copies' && $post['unchecked']!='uncheck'){
								$max_copies=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='max_copies'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['max_copies']==$post['productsvalues']){
										$data=array('max_copies'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$max_copies='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='paper_size' && $post['unchecked']!='uncheck'){
								$paper_size=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='paper_size'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['paper_size']==$post['productsvalues']){
										$data=array('paper_size'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$paper_size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='headphone_jack' && $post['unchecked']!='uncheck'){
								$headphone_jack=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='headphone_jack'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['headphone_jack']==$post['productsvalues']){
										$data=array('headphone_jack'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$headphone_jack='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='noise_reduction' && $post['unchecked']!='uncheck'){
								$noise_reduction=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='noise_reduction'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['noise_reduction']==$post['productsvalues']){
										$data=array('noise_reduction'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$noise_reduction='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='usb_port' && $post['unchecked']!='uncheck'){
								$usb_port=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usb_port'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['usb_port']==$post['productsvalues']){
										$data=array('usb_port'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$usb_port='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='compatible_for' && $post['unchecked']!='uncheck'){
								$compatible_for=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='compatible_for'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['compatible_for']==$post['productsvalues']){
										$data=array('compatible_for'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$compatible_for='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='scanner_type' && $post['unchecked']!='uncheck'){
								$scanner_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='scanner_type'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['scanner_type']==$post['productsvalues']){
										$data=array('scanner_type'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$scanner_type='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='resolution' && $post['unchecked']!='uncheck'){
								$resolution=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='resolution'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['resolution']==$post['productsvalues']){
										$data=array('resolution'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$resolution='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='f_stop' && $post['unchecked']!='uncheck'){
								$f_stop=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='f_stop'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['f_stop']==$post['productsvalues']){
										$data=array('f_stop'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$f_stop='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='minimum_focusing_distance' && $post['unchecked']!='uncheck'){
								$minimum_focusing_distance=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='minimum_focusing_distance'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['minimum_focusing_distance']==$post['productsvalues']){
										$data=array('minimum_focusing_distance'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$minimum_focusing_distance='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='aperture_withmaxfocal_length' && $post['unchecked']!='uncheck'){
								$aperture_withmaxfocal_length=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='aperture_withmaxfocal_length'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['aperture_withmaxfocal_length']==$post['productsvalues']){
										$data=array('aperture_withmaxfocal_length'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$aperture_withmaxfocal_length='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='picture_angle' && $post['unchecked']!='uncheck'){
								$picture_angle=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='picture_angle'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['picture_angle']==$post['productsvalues']){
										$data=array('picture_angle'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$picture_angle='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='weight' && $post['unchecked']!='uncheck'){
								$weight=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='weight'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['weight']==$post['productsvalues']){
										$data=array('weight'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$weight='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='occasion' && $post['unchecked']!='uncheck'){
								$occasion=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='occasion'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['occasion']==$post['productsvalues']){
										$data=array('occasion'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$occasion='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='material' && $post['unchecked']!='uncheck'){
								$material=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='material'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['material']==$post['productsvalues']){
										$data=array('material'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$material='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='collar_type' && $post['unchecked']!='uncheck'){
								$collar_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='collar_type'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['collar_type']==$post['productsvalues']){
										$data=array('collar_type'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$collar_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='gender' && $post['unchecked']!='uncheck'){
								$gender=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='gender'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['gender']==$post['productsvalues']){
										$data=array('gender'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$gender='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='sleeve' && $post['unchecked']!='uncheck'){
								$sleeve=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sleeve'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['sleeve']==$post['productsvalues']){
										$data=array('sleeve'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$sleeve='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='look' && $post['unchecked']!='uncheck'){
								$look=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='look'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['look']==$post['productsvalues']){
										$data=array('look'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$look='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='style_code' && $post['unchecked']!='uncheck'){
								$style_code=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='style_code'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['style_code']==$post['productsvalues']){
										$data=array('style_code'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$style_code='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='inner_material' && $post['unchecked']!='uncheck'){
								$inner_material=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='inner_material'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['inner_material']==$post['productsvalues']){
										$data=array('inner_material'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$inner_material='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='waterproof' && $post['unchecked']!='uncheck'){
								$waterproof=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='waterproof'){
								$removesearch= $this->category_model->get_item_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['waterproof']==$post['productsvalues']){
										$data=array('waterproof'=>'');
										$this->category_model->item_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$waterproof='';
							}
							
					
				
				$ip=$this->input->ip_address();
				
				$data1=array(
				'ip_address'=>$ip,
				'itemid'=>$post['itemid'],
				'minimum_price'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
				'maximum_price'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
				'offer'=>isset($offer) ? $offer:'',
				'brand'=>isset($brand) ? $brand:'',
				'colour'=>isset($color) ? $color:'',
				'discount'=>isset($discount) ? $discount:'',
				'size'=>isset($size) ? $size:'',
				'ram'=>isset($ram) ? $ram:'',
				'os'=>isset($os) ? $os:'',
				'sim_type'=>isset($sim_type)?$sim_type:'',
				'camera'=>isset($camera)?$camera:'',
				'internal_memeory'=>isset($internal_memeory)?$internal_memeory:'',
				'screen_size'=>isset($screen_size)?$screen_size:'',
				'Processor'=>isset($Processor)?$Processor:'',
				'printer_type'=>isset($printer_type)?$printer_type:'',
				'type'=>isset($type)?$type:'',
				'max_copies'=>isset($max_copies)?$max_copies:'',
				'paper_size'=>isset($paper_size)?$paper_size:'',
				'headphone_jack'=>isset($headphone_jack)?$headphone_jack:'',
				'noise_reduction'=>isset($noise_reduction)?$noise_reduction:'',
				'usb_port'=>isset($usb_port)?$usb_port:'',
				'compatible_for'=>isset($compatible_for)?$compatible_for:'',
				'scanner_type'=>isset($scanner_type)?$scanner_type:'',
				'resolution'=>isset($resolution)?$resolution:'',
				'f_stop'=>isset($f_stop)?$f_stop:'',
				'minimum_focusing_distance'=>isset($minimum_focusing_distance)?$minimum_focusing_distance:'',
				'aperture_withmaxfocal_length'=>isset($aperture_withmaxfocal_length)?$aperture_withmaxfocal_length:'',
				'picture_angle'=>isset($picture_angle)?$picture_angle:'',
				'weight'=>isset($weight)?$weight:'',
				'occasion'=>isset($occasion)?$occasion:'',
				'material'=>isset($material)?$material:'',
				'collar_type'=>isset($collar_type)?$collar_type:'',
				'gender'=>isset($gender)?$gender:'',
				'sleeve'=>isset($sleeve)?$sleeve:'',
				'look'=>isset($look)?$look:'',
				'style_code'=>isset($style_code)?$style_code:'',
				'inner_material'=>isset($inner_material)?$inner_material:'',
				'waterproof'=>isset($waterproof)?$waterproof:'',
				'create_at'=>date('Y-m-d H:i:s'),
				);
				//echo '<pre>';print_r($data1);
				//exit;
				$s_s_i_data= $this->category_model->save_itemsearchdata($data1);
				if(count($s_s_i_data)>0){
					$removesearch= $this->category_model->get_item_all_previous_search_fields();
					foreach ($removesearch as $list){
						$data=array('minimum_price'=>$post['mini_mum'],'maximum_price'=>$post['maxi_mum']);
						$this->category_model->item_wise_update_deails($list['id'],$data);	
					}
					redirect('category/itemwise_searchresult');
				}
			 }
			  public function itemwise_searchresult(){
				$data['itemwise']= $this->category_model->get_itemwise_search_result_data($this->input->ip_address());
				if(isset($data['itemwise']) && count($data['itemwise'])>0){
					foreach($data['itemwise'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
				$data['previousdata']= $this->category_model->get_all_previous_itemwise_search_fields($this->input->ip_address());
				$data['itemdetails']= $this->category_model->item_details($data['previousdata'][0]['itemid']);
				$filtersitemid= $this->category_model->get_itemwise_data_item_id($this->input->ip_address());
				$data['itemid']=$filtersitemid['itemid'];
				$itemid=$filtersitemid['itemid'];
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_item_all_brand_list($itemid,'brand');
				$data['price_list']= $this->category_model->get_item_all_price_list($itemid);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_item_all_offer_list($itemid);
				$data['color_list']= $this->category_model->get_item_all_brand_list($itemid,'colour');
				$data['ram_list']= $this->category_model->get_item_all_brand_list($itemid,'ram');
				$data['os_list']= $this->category_model->get_item_all_brand_list($itemid,'os');
				$data['sim_list']= $this->category_model->get_item_all_brand_list($itemid,'sim_type');
				$data['camera_list']= $this->category_model->get_item_all_brand_list($itemid,'camera');
				$data['internal_memeory_list']= $this->category_model->get_item_all_brand_list($itemid,'internal_memeory');
				$data['screen_size_list']= $this->category_model->get_item_all_brand_list($itemid,'screen_size');
				$data['Processor_list']= $this->category_model->get_item_all_brand_list($itemid,'Processor');
				$data['printer_type']= $this->category_model->get_item_all_brand_list($itemid,'printer_type');
				$data['type_list']= $this->category_model->get_item_all_brand_list($itemid,'type');
				$data['max_copies']= $this->category_model->get_item_all_brand_list($itemid,'max_print_resolution');
				$data['paper_size']= $this->category_model->get_item_all_brand_list($itemid,'paper_size');
				$data['headphone_jack']= $this->category_model->get_item_all_brand_list($itemid,'headphone_jack');
				$data['noise_reduction']= $this->category_model->get_item_all_brand_list($itemid,'noise_reduction');
				$data['usb_port']= $this->category_model->get_item_all_brand_list($itemid,'usb_port');
				$data['compatible_for']= $this->category_model->get_item_all_brand_list($itemid,'compatible_for');
				$data['scanner_type']= $this->category_model->get_item_all_brand_list($itemid,'scanner_type');
				$data['resolution']= $this->category_model->get_item_all_brand_list($itemid,'resolution');
				$data['f_stop']= $this->category_model->get_item_all_brand_list($itemid,'f_stop');
				$data['minimum_focusing_distance']= $this->category_model->get_item_all_brand_list($itemid,'minimum_focusing_distance');
				$data['aperture_withmaxfocal_length']= $this->category_model->get_item_all_brand_list($itemid,'aperture_withmaxfocal_length');
				$data['picture_angle']= $this->category_model->get_item_all_brand_list($itemid,'picture_angle');
				$data['size_list']= $this->category_model->get_item_all_brand_list($itemid,'size');
				$data['weight_list']= $this->category_model->get_item_all_brand_list($itemid,'weight');
				$data['occasion_list']= $this->category_model->get_item_all_brand_list($itemid,'occasion');
				$data['material_list']= $this->category_model->get_item_all_brand_list($itemid,'material');
				$data['collar_type']= $this->category_model->get_item_all_brand_list($itemid,'collar_type');
				$data['gender_list']= $this->category_model->get_item_all_brand_list($itemid,'gender');
				$data['sleeve_list']= $this->category_model->get_item_all_brand_list($itemid,'sleeve');
				$data['look_list']= $this->category_model->get_item_all_brand_list($itemid,'look');
				$data['style_code']= $this->category_model->get_item_all_brand_list($itemid,'style_code');
				$data['inner_material']= $this->category_model->get_item_all_brand_list($itemid,'inner_material');
				$data['waterproof']= $this->category_model->get_item_all_brand_list($itemid,'waterproof');
				 foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						$amounts[]=$list['item_cost'];
					}else{
						$amounts[]=$list['special_price'];
					}
				 }
					$minamt = min($amounts);
					$maxamt= max($amounts);
					//echo '<pre>';print_r( $amounts);exit;
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					//echo max($data['price_list']);
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
							if($list['offer_percentage']!=''){
								$ids[]=$list['offer_percentage'];
							}
						}else{
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}
						
					}
					foreach (array_unique($ids) as $Li){
						$uniids[]=array('offers'=>$Li);
						
					}
				$data['offer_list']=$uniids;
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			$this->load->view('customer/itemwiseliterresult',$data);
	 }
	 
	 //*groupwise*/
	 
	 public function groupwise(){
		 
		 /*delete privous data*/
		 $previousdata=$this->category_model->get_categoryprivous_data($this->input->ip_address());
		 foreach($previousdata as $lis){
			 $this->category_model->delete_previous_data($lis['id']);
		 }
		 /*delete privous data*/
		  $catid=base64_decode($this->uri->segment(3));
		  $brand=base64_decode($this->uri->segment(4));
		  $group=base64_decode($this->uri->segment(5));
			$data['product_list']= $this->category_model->get_groupwise_product_list($catid,$brand);
			$data['caterory_id']=$catid;
			$data['brand']=$brand;
			$data['category_details']= $this->category_model->category_details($catid);
			if(isset($data['product_list']) && count($data['product_list'])>0){
					foreach($data['product_list'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_group_all_brand_list($catid,'brand',$brand);
				$data['price_list']= $this->category_model->get_groupwise_all_price_list($catid,$brand);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_group_all_offer_list($catid,$brand);
				$data['color_list']= $this->category_model->get_group_all_brand_list($catid,'colour',$brand);
				$data['ram_list']= $this->category_model->get_group_all_brand_list($catid,'ram',$brand);
				//echo $this->db->last_query();exit;
				$data['os_list']= $this->category_model->get_group_all_brand_list($catid,'os',$brand);
				$data['sim_list']= $this->category_model->get_group_all_brand_list($catid,'sim_type',$brand);
				$data['camera_list']= $this->category_model->get_group_all_brand_list($catid,'camera',$brand);
				$data['internal_memeory_list']= $this->category_model->get_group_all_brand_list($catid,'internal_memeory',$brand);
				$data['screen_size_list']= $this->category_model->get_group_all_brand_list($catid,'screen_size',$brand);
				$data['Processor_list']= $this->category_model->get_group_all_brand_list($catid,'Processor',$brand);
				$data['printer_type']= $this->category_model->get_group_all_brand_list($catid,'printer_type',$brand);
				$data['type_list']= $this->category_model->get_group_all_brand_list($catid,'type',$brand);
				$data['max_copies']= $this->category_model->get_group_all_brand_list($catid,'max_print_resolution',$brand);
				$data['paper_size']= $this->category_model->get_group_all_brand_list($catid,'paper_size',$brand);
				$data['headphone_jack']= $this->category_model->get_group_all_brand_list($catid,'headphone_jack',$brand);
				$data['noise_reduction']= $this->category_model->get_group_all_brand_list($catid,'noise_reduction',$brand);
				$data['usb_port']= $this->category_model->get_group_all_brand_list($catid,'usb_port',$brand);
				$data['compatible_for']= $this->category_model->get_group_all_brand_list($catid,'compatible_for',$brand);
				$data['scanner_type']= $this->category_model->get_group_all_brand_list($catid,'scanner_type',$brand);
				$data['resolution']= $this->category_model->get_group_all_brand_list($catid,'resolution',$brand);
				$data['f_stop']= $this->category_model->get_group_all_brand_list($catid,'f_stop',$brand);
				$data['minimum_focusing_distance']= $this->category_model->get_group_all_brand_list($catid,'minimum_focusing_distance',$brand);
				$data['aperture_withmaxfocal_length']= $this->category_model->get_group_all_brand_list($catid,'aperture_withmaxfocal_length',$brand);
				$data['picture_angle']= $this->category_model->get_group_all_brand_list($catid,'picture_angle',$brand);
				$data['size_list']= $this->category_model->get_group_all_brand_list($catid,'size',$brand);
				$data['weight_list']= $this->category_model->get_group_all_brand_list($catid,'weight',$brand);
				$data['occasion_list']= $this->category_model->get_group_all_brand_list($catid,'occasion',$brand);
				$data['material_list']= $this->category_model->get_group_all_brand_list($catid,'material',$brand);
				$data['collar_type']= $this->category_model->get_group_all_brand_list($catid,'collar_type',$brand);
				$data['gender_list']= $this->category_model->get_group_all_brand_list($catid,'gender',$brand);
				$data['sleeve_list']= $this->category_model->get_group_all_brand_list($catid,'sleeve',$brand);
				$data['look_list']= $this->category_model->get_group_all_brand_list($catid,'look',$brand);
				$data['style_code']= $this->category_model->get_group_all_brand_list($catid,'style_code',$brand);
				$data['inner_material']= $this->category_model->get_group_all_brand_list($catid,'inner_material',$brand);
				$data['waterproof']= $this->category_model->get_group_all_brand_list($catid,'waterproof',$brand);
				 foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						$amounts[]=$list['item_cost'];
					}else{
						$amounts[]=$list['special_price'];
					}
				 }
					$minamt = min($amounts);
					$maxamt= max($amounts);
					//echo '<pre>';print_r( $amounts);exit;
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					//echo max($data['price_list']);
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
							if($list['offer_percentage']!=''){
								$ids[]=$list['offer_percentage'];
							}
						}else{
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}
						
					}
					foreach (array_unique($ids) as $Li){
						$uniids[]=array('offers'=>$Li);
						
					}
				$data['offer_list']=$uniids;
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			//echo '<pre>';print_r($data);exit;
			$this->template->write_view('content', 'customer/groupwise',$data);
			$this->template->render(); 
	 }
	  public function categorywise_search(){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($cusine);
				//echo '<pre>';print_r($post);exit;
				
							if(isset($post['searchvalue']) && $post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
								$offer=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['offer']==$post['productsvalues']){
									$data=array('offer'=>'');
									$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$offer='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
								$brand=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['brand']==$post['productsvalues']){
									$data=array('brand'=>'');
									$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$brand='';
							}
							if($post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
								$color=$post['productsvalues'];
							}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['colour']==$post['productsvalues']){
									$data=array('colour'=>'');
									$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$color='';
							}
							
							//echo $color;exit;
							if($post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
								$size=$post['productsvalues'];
							}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['size']==$post['productsvalues']){
									$data=array('size'=>'');
									$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
								$ram=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['ram']==$post['productsvalues']){
										$data=array('ram'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$ram='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
								$os=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['os']==$post['productsvalues']){
										$data=array('os'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$os='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
								$sim_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['sim_type']==$post['productsvalues']){
										$data=array('sim_type'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$sim_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='camera' && $post['unchecked']!='uncheck'){
								$camera=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='camera'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['camera']==$post['productsvalues']){
										$data=array('camera'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$camera='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='internal_memeory' && $post['unchecked']!='uncheck'){
								$internal_memeory=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_memeory'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['internal_memeory']==$post['productsvalues']){
										$data=array('internal_memeory'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$internal_memeory='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='screen_size' && $post['unchecked']!='uncheck'){
								$screen_size=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='screen_size'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['screen_size']==$post['productsvalues']){
										$data=array('screen_size'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$screen_size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='Processor' && $post['unchecked']!='uncheck'){
								$Processor=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='Processor'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['Processor']==$post['productsvalues']){
										$data=array('Processor'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$Processor='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='type' && $post['unchecked']!='uncheck'){
								$type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='type'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['type']==$post['productsvalues']){
										$data=array('type'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='printer_type' && $post['unchecked']!='uncheck'){
								$printer_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='printer_type'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['printer_type']==$post['productsvalues']){
										$data=array('printer_type'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$printer_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='max_copies' && $post['unchecked']!='uncheck'){
								$max_copies=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='max_copies'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['max_copies']==$post['productsvalues']){
										$data=array('max_copies'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$max_copies='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='paper_size' && $post['unchecked']!='uncheck'){
								$paper_size=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='paper_size'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['paper_size']==$post['productsvalues']){
										$data=array('paper_size'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$paper_size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='headphone_jack' && $post['unchecked']!='uncheck'){
								$headphone_jack=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='headphone_jack'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['headphone_jack']==$post['productsvalues']){
										$data=array('headphone_jack'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$headphone_jack='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='noise_reduction' && $post['unchecked']!='uncheck'){
								$noise_reduction=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='noise_reduction'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['noise_reduction']==$post['productsvalues']){
										$data=array('noise_reduction'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$noise_reduction='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='usb_port' && $post['unchecked']!='uncheck'){
								$usb_port=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usb_port'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['usb_port']==$post['productsvalues']){
										$data=array('usb_port'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$usb_port='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='compatible_for' && $post['unchecked']!='uncheck'){
								$compatible_for=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='compatible_for'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['compatible_for']==$post['productsvalues']){
										$data=array('compatible_for'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$compatible_for='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='scanner_type' && $post['unchecked']!='uncheck'){
								$scanner_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='scanner_type'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['scanner_type']==$post['productsvalues']){
										$data=array('scanner_type'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$scanner_type='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='resolution' && $post['unchecked']!='uncheck'){
								$resolution=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='resolution'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['resolution']==$post['productsvalues']){
										$data=array('resolution'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$resolution='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='f_stop' && $post['unchecked']!='uncheck'){
								$f_stop=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='f_stop'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['f_stop']==$post['productsvalues']){
										$data=array('f_stop'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$f_stop='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='minimum_focusing_distance' && $post['unchecked']!='uncheck'){
								$minimum_focusing_distance=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='minimum_focusing_distance'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['minimum_focusing_distance']==$post['productsvalues']){
										$data=array('minimum_focusing_distance'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$minimum_focusing_distance='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='aperture_withmaxfocal_length' && $post['unchecked']!='uncheck'){
								$aperture_withmaxfocal_length=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='aperture_withmaxfocal_length'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['aperture_withmaxfocal_length']==$post['productsvalues']){
										$data=array('aperture_withmaxfocal_length'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$aperture_withmaxfocal_length='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='picture_angle' && $post['unchecked']!='uncheck'){
								$picture_angle=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='picture_angle'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['picture_angle']==$post['productsvalues']){
										$data=array('picture_angle'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$picture_angle='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='weight' && $post['unchecked']!='uncheck'){
								$weight=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='weight'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['weight']==$post['productsvalues']){
										$data=array('weight'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$weight='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='occasion' && $post['unchecked']!='uncheck'){
								$occasion=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='occasion'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['occasion']==$post['productsvalues']){
										$data=array('occasion'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$occasion='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='material' && $post['unchecked']!='uncheck'){
								$material=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='material'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['material']==$post['productsvalues']){
										$data=array('material'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$material='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='collar_type' && $post['unchecked']!='uncheck'){
								$collar_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='collar_type'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['collar_type']==$post['productsvalues']){
										$data=array('collar_type'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$collar_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='gender' && $post['unchecked']!='uncheck'){
								$gender=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='gender'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['gender']==$post['productsvalues']){
										$data=array('gender'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$gender='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='sleeve' && $post['unchecked']!='uncheck'){
								$sleeve=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sleeve'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['sleeve']==$post['productsvalues']){
										$data=array('sleeve'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$sleeve='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='look' && $post['unchecked']!='uncheck'){
								$look=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='look'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['look']==$post['productsvalues']){
										$data=array('look'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$look='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='style_code' && $post['unchecked']!='uncheck'){
								$style_code=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='style_code'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['style_code']==$post['productsvalues']){
										$data=array('style_code'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$style_code='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='inner_material' && $post['unchecked']!='uncheck'){
								$inner_material=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='inner_material'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['inner_material']==$post['productsvalues']){
										$data=array('inner_material'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$inner_material='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='waterproof' && $post['unchecked']!='uncheck'){
								$waterproof=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='waterproof'){
								$removesearch= $this->category_model->get_category_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['waterproof']==$post['productsvalues']){
										$data=array('waterproof'=>'');
										$this->category_model->category_wise_update_deails($list['id'],$data);
									}
								} 
							}else{
								$waterproof='';
							}
							
					
				
				$ip=$this->input->ip_address();
				
				$data1=array(
				'ip_address'=>$ip,
				'category_id'=>$post['categoryid'],
				'group'=>$post['group'],
				'minimum_price'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
				'maximum_price'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
				'offer'=>isset($offer) ? $offer:'',
				'brand'=>isset($brand) ? $brand:'',
				'colour'=>isset($color) ? $color:'',
				'discount'=>isset($discount) ? $discount:'',
				'size'=>isset($size) ? $size:'',
				'ram'=>isset($ram) ? $ram:'',
				'os'=>isset($os) ? $os:'',
				'sim_type'=>isset($sim_type)?$sim_type:'',
				'camera'=>isset($camera)?$camera:'',
				'internal_memeory'=>isset($internal_memeory)?$internal_memeory:'',
				'screen_size'=>isset($screen_size)?$screen_size:'',
				'Processor'=>isset($Processor)?$Processor:'',
				'printer_type'=>isset($printer_type)?$printer_type:'',
				'type'=>isset($type)?$type:'',
				'max_copies'=>isset($max_copies)?$max_copies:'',
				'paper_size'=>isset($paper_size)?$paper_size:'',
				'headphone_jack'=>isset($headphone_jack)?$headphone_jack:'',
				'noise_reduction'=>isset($noise_reduction)?$noise_reduction:'',
				'usb_port'=>isset($usb_port)?$usb_port:'',
				'compatible_for'=>isset($compatible_for)?$compatible_for:'',
				'scanner_type'=>isset($scanner_type)?$scanner_type:'',
				'resolution'=>isset($resolution)?$resolution:'',
				'f_stop'=>isset($f_stop)?$f_stop:'',
				'minimum_focusing_distance'=>isset($minimum_focusing_distance)?$minimum_focusing_distance:'',
				'aperture_withmaxfocal_length'=>isset($aperture_withmaxfocal_length)?$aperture_withmaxfocal_length:'',
				'picture_angle'=>isset($picture_angle)?$picture_angle:'',
				'weight'=>isset($weight)?$weight:'',
				'occasion'=>isset($occasion)?$occasion:'',
				'material'=>isset($material)?$material:'',
				'collar_type'=>isset($collar_type)?$collar_type:'',
				'gender'=>isset($gender)?$gender:'',
				'sleeve'=>isset($sleeve)?$sleeve:'',
				'look'=>isset($look)?$look:'',
				'style_code'=>isset($style_code)?$style_code:'',
				'inner_material'=>isset($inner_material)?$inner_material:'',
				'waterproof'=>isset($waterproof)?$waterproof:'',
				'create_at'=>date('Y-m-d H:i:s'),
				);
				//echo '<pre>';print_r($data1);
				//exit;
				$s_s_i_data= $this->category_model->save_categorysearchdata($data1);
				if(count($s_s_i_data)>0){
					$removesearch= $this->category_model->get_category_all_previous_search_fields();
					foreach ($removesearch as $list){
						$data=array('minimum_price'=>$post['mini_mum'],'maximum_price'=>$post['maxi_mum']);
						$this->category_model->category_wise_update_deails($list['id'],$data);	
					}
				redirect('category/categorywise_searchresult');
				}
			 }
			 public function categorywise_searchresult(){
				$data['itemwise']= $this->category_model->get_categorywise_search_result_data($this->input->ip_address());
				if(isset($data['itemwise']) && count($data['itemwise'])>0){
					foreach($data['itemwise'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
				$data['previousdata']= $this->category_model->get_category_all_previous_search_fields($this->input->ip_address());
				$data['category_details']= $this->category_model->category_details($data['previousdata'][0]['category_id']);
				$filtersitemid= $this->category_model->get_categorywise_data_item_id($this->input->ip_address());
				$data['category_id']=$filtersitemid['category_id'];
				$data['brand']=$filtersitemid['group'];
				$category_id=$filtersitemid['category_id'];
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_group_all_brand_list($category_id,'brand',$data['brand'],$filtersitemid['group']);
				$data['price_list']= $this->category_model->get_groupwise_all_price_list($category_id,$filtersitemid['group']);
				//$data['price_list']= $this->category_model->get_groupwise_all_price_list($catid,$brand);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_group_all_offer_list($category_id,$filtersitemid['group']);
				$data['color_list']= $this->category_model->get_group_all_brand_list($category_id,'colour',$filtersitemid['group']);
				$data['ram_list']= $this->category_model->get_group_all_brand_list($category_id,'ram',$filtersitemid['group']);
				$data['os_list']= $this->category_model->get_group_all_brand_list($category_id,'os',$filtersitemid['group']);
				$data['sim_list']= $this->category_model->get_group_all_brand_list($category_id,'sim_type',$filtersitemid['group']);
				$data['camera_list']= $this->category_model->get_group_all_brand_list($category_id,'camera',$filtersitemid['group']);
				$data['internal_memeory_list']= $this->category_model->get_group_all_brand_list($category_id,'internal_memeory',$filtersitemid['group']);
				$data['screen_size_list']= $this->category_model->get_group_all_brand_list($category_id,'screen_size',$filtersitemid['group']);
				$data['Processor_list']= $this->category_model->get_group_all_brand_list($category_id,'Processor',$filtersitemid['group']);
				$data['printer_type']= $this->category_model->get_group_all_brand_list($category_id,'printer_type',$filtersitemid['group']);
				$data['type_list']= $this->category_model->get_group_all_brand_list($category_id,'type',$filtersitemid['group']);
				$data['max_copies']= $this->category_model->get_group_all_brand_list($category_id,'max_print_resolution',$filtersitemid['group']);
				$data['paper_size']= $this->category_model->get_group_all_brand_list($category_id,'paper_size',$filtersitemid['group']);
				$data['headphone_jack']= $this->category_model->get_group_all_brand_list($category_id,'headphone_jack',$filtersitemid['group']);
				$data['noise_reduction']= $this->category_model->get_group_all_brand_list($category_id,'noise_reduction',$filtersitemid['group']);
				$data['usb_port']= $this->category_model->get_group_all_brand_list($category_id,'usb_port',$filtersitemid['group']);
				$data['compatible_for']= $this->category_model->get_group_all_brand_list($category_id,'compatible_for',$filtersitemid['group']);
				$data['scanner_type']= $this->category_model->get_group_all_brand_list($category_id,'scanner_type',$filtersitemid['group']);
				$data['resolution']= $this->category_model->get_group_all_brand_list($category_id,'resolution',$filtersitemid['group']);
				$data['f_stop']= $this->category_model->get_group_all_brand_list($category_id,'f_stop',$filtersitemid['group']);
				$data['minimum_focusing_distance']= $this->category_model->get_group_all_brand_list($category_id,'minimum_focusing_distance',$filtersitemid['group']);
				$data['aperture_withmaxfocal_length']= $this->category_model->get_group_all_brand_list($category_id,'aperture_withmaxfocal_length',$filtersitemid['group']);
				$data['picture_angle']= $this->category_model->get_group_all_brand_list($category_id,'picture_angle',$filtersitemid['group']);
				$data['size_list']= $this->category_model->get_group_all_brand_list($category_id,'size',$filtersitemid['group']);
				$data['weight_list']= $this->category_model->get_group_all_brand_list($category_id,'weight',$filtersitemid['group']);
				$data['occasion_list']= $this->category_model->get_group_all_brand_list($category_id,'occasion',$filtersitemid['group']);
				$data['material_list']= $this->category_model->get_group_all_brand_list($category_id,'material',$filtersitemid['group']);
				$data['collar_type']= $this->category_model->get_group_all_brand_list($category_id,'collar_type',$filtersitemid['group']);
				$data['gender_list']= $this->category_model->get_group_all_brand_list($category_id,'gender',$filtersitemid['group']);
				$data['sleeve_list']= $this->category_model->get_group_all_brand_list($category_id,'sleeve',$filtersitemid['group']);
				$data['look_list']= $this->category_model->get_group_all_brand_list($category_id,'look',$filtersitemid['group']);
				$data['style_code']= $this->category_model->get_group_all_brand_list($category_id,'style_code',$filtersitemid['group']);
				$data['inner_material']= $this->category_model->get_group_all_brand_list($category_id,'inner_material',$filtersitemid['group']);
				$data['waterproof']= $this->category_model->get_group_all_brand_list($category_id,'waterproof',$filtersitemid['group']);
				 foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						$amounts[]=$list['item_cost'];
					}else{
						$amounts[]=$list['special_price'];
					}
				 }
					$minamt = min($amounts);
					$maxamt= max($amounts);
					//echo '<pre>';print_r( $amounts);exit;
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					//echo max($data['price_list']);
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
							if($list['offer_percentage']!=''){
								$ids[]=$list['offer_percentage'];
							}
						}else{
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}
						
					}
					foreach (array_unique($ids) as $Li){
						$uniids[]=array('offers'=>$Li);
						
					}
				$data['offer_list']=$uniids;
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			$this->load->view('customer/groupwiseresult',$data);
	 }
	 
	 
	 /*pricewise products list*/
	  public function price(){
		 
		 /*delete privous data*/
		 $previousdata=$this->category_model->get_categoryprice_all_previous_search_fields($this->input->ip_address());
		 foreach($previousdata as $lis){
			 $this->category_model->delete_privous_categoryprice_searchdata($lis['id']);
		 }
		 /*delete privous data*/
		  $catid=base64_decode($this->uri->segment(3));
		  $brand=base64_decode($this->uri->segment(4));
		  $group=base64_decode($this->uri->segment(5));
		  $minprice=base64_decode($this->uri->segment(6));
		  $data['product_list']= $this->category_model->get_groupwise_price_product_list($catid,$brand,$minprice);
			//echo $this->db->last_query();exit;		  
			//echo '<pre>';print_r($data['product_list']);exit;
			$data['caterory_id']=$catid;
			$data['brand']=$brand;
			$data['minprice']=$minprice;
			$data['category_details']= $this->category_model->category_details($catid);
			if(isset($data['product_list']) && count($data['product_list'])>0){
					foreach($data['product_list'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_group_all_pricewise_list($catid,'brand',$brand,$minprice);
				
				$data['price_list']= $this->category_model->get_group_all_price_list($catid,$brand,$minprice);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_price_all_offer_list($catid,$brand,$minprice);
				//echo $this->db->last_query();exit;
				$data['color_list']= $this->category_model->get_group_all_pricewise_list($catid,'colour',$brand,$minprice);
				$data['ram_list']= $this->category_model->get_group_all_pricewise_list($catid,'ram',$brand,$minprice);
				//echo $this->db->last_query();exit;
				$data['os_list']= $this->category_model->get_group_all_pricewise_list($catid,'os',$brand,$minprice);
				$data['sim_list']= $this->category_model->get_group_all_pricewise_list($catid,'sim_type',$brand,$minprice);
				$data['camera_list']= $this->category_model->get_group_all_pricewise_list($catid,'camera',$brand,$minprice);
				$data['internal_memeory_list']= $this->category_model->get_group_all_pricewise_list($catid,'internal_memeory',$brand,$minprice);
				$data['screen_size_list']= $this->category_model->get_group_all_pricewise_list($catid,'screen_size',$brand,$minprice);
				$data['Processor_list']= $this->category_model->get_group_all_pricewise_list($catid,'Processor',$brand,$minprice);
				$data['printer_type']= $this->category_model->get_group_all_pricewise_list($catid,'printer_type',$brand,$minprice);
				$data['type_list']= $this->category_model->get_group_all_pricewise_list($catid,'type',$brand,$minprice);
				$data['max_copies']= $this->category_model->get_group_all_pricewise_list($catid,'max_print_resolution',$brand,$minprice);
				$data['paper_size']= $this->category_model->get_group_all_pricewise_list($catid,'paper_size',$brand,$minprice);
				$data['headphone_jack']= $this->category_model->get_group_all_pricewise_list($catid,'headphone_jack',$brand,$minprice);
				$data['noise_reduction']= $this->category_model->get_group_all_pricewise_list($catid,'noise_reduction',$brand,$minprice);
				$data['usb_port']= $this->category_model->get_group_all_pricewise_list($catid,'usb_port',$brand,$minprice);
				$data['compatible_for']= $this->category_model->get_group_all_pricewise_list($catid,'compatible_for',$brand,$minprice);
				$data['scanner_type']= $this->category_model->get_group_all_pricewise_list($catid,'scanner_type',$brand,$minprice);
				$data['resolution']= $this->category_model->get_group_all_pricewise_list($catid,'resolution',$brand,$minprice);
				$data['f_stop']= $this->category_model->get_group_all_pricewise_list($catid,'f_stop',$brand,$minprice);
				$data['minimum_focusing_distance']= $this->category_model->get_group_all_pricewise_list($catid,'minimum_focusing_distance',$brand,$minprice);
				$data['aperture_withmaxfocal_length']= $this->category_model->get_group_all_pricewise_list($catid,'aperture_withmaxfocal_length',$brand,$minprice);
				$data['picture_angle']= $this->category_model->get_group_all_pricewise_list($catid,'picture_angle',$brand,$minprice);
				$data['size_list']= $this->category_model->get_group_all_pricewise_list($catid,'size',$brand,$minprice);
				$data['weight_list']= $this->category_model->get_group_all_pricewise_list($catid,'weight',$brand,$minprice);
				$data['occasion_list']= $this->category_model->get_group_all_pricewise_list($catid,'occasion',$brand,$minprice);
				$data['material_list']= $this->category_model->get_group_all_pricewise_list($catid,'material',$brand,$minprice);
				$data['collar_type']= $this->category_model->get_group_all_pricewise_list($catid,'collar_type',$brand,$minprice);
				$data['gender_list']= $this->category_model->get_group_all_pricewise_list($catid,'gender',$brand,$minprice);
				$data['sleeve_list']= $this->category_model->get_group_all_pricewise_list($catid,'sleeve',$brand,$minprice);
				$data['look_list']= $this->category_model->get_group_all_pricewise_list($catid,'look',$brand,$minprice);
				$data['style_code']= $this->category_model->get_group_all_pricewise_list($catid,'style_code',$brand,$minprice);
				$data['inner_material']= $this->category_model->get_group_all_pricewise_list($catid,'inner_material',$brand,$minprice);
				$data['waterproof']= $this->category_model->get_group_all_pricewise_list($catid,'waterproof',$brand,$minprice);
				 foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						$amounts[]=$list['item_cost'];
					}else{
						$amounts[]=$list['special_price'];
					}
				 }
						$minamt = min($amounts);
					$maxamt= max($amounts);
					//echo '<pre>';print_r( $amounts);exit;
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					//echo '<pre>';print_r($data['maximum_price']);exit;
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}else{
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}
						
					}
					if(isset($ids) && count($ids)>0){
						foreach (array_unique($ids) as $Li){
							$uniids[]=array('offers'=>$Li);
							
						}
						$data['offer_list']=$uniids;
					}
				
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			//echo '<pre>';print_r($data);exit;
			$this->template->write_view('content', 'customer/pricewise',$data);
			$this->template->render(); 
	 }
	 public function categorypricewise_search(){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($cusine);
				//echo '<pre>';print_r($post);exit;
				
							if(isset($post['searchvalue']) && $post['searchvalue']=='offer' && $post['unchecked']!='uncheck'){
								$offer=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='offer'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['offer']==$post['productsvalues']){
									$data=array('offer'=>'');
									$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$offer='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='brand' && $post['unchecked']!='uncheck'){
								$brand=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='brand'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['brand']==$post['productsvalues']){
									$data=array('brand'=>'');
									$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$brand='';
							}
							if($post['searchvalue']=='colour' && $post['unchecked']!='uncheck'){
								$color=$post['productsvalues'];
							}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='colour'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['colour']==$post['productsvalues']){
									$data=array('colour'=>'');
									$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$color='';
							}
							
							//echo $color;exit;
							if($post['searchvalue']=='size' && $post['unchecked']!='uncheck'){
								$size=$post['productsvalues'];
							}else if($post['unchecked']=='uncheck' && $post['searchvalue']=='size'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['size']==$post['productsvalues']){
									$data=array('size'=>'');
									$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='ram' && $post['unchecked']!='uncheck'){
								$ram=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='ram'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['ram']==$post['productsvalues']){
										$data=array('ram'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$ram='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='os' && $post['unchecked']!='uncheck'){
								$os=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='os'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['os']==$post['productsvalues']){
										$data=array('os'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$os='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='sim_type' && $post['unchecked']!='uncheck'){
								$sim_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sim_type'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['sim_type']==$post['productsvalues']){
										$data=array('sim_type'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$sim_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='camera' && $post['unchecked']!='uncheck'){
								$camera=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='camera'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['camera']==$post['productsvalues']){
										$data=array('camera'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$camera='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='internal_memeory' && $post['unchecked']!='uncheck'){
								$internal_memeory=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='internal_memeory'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['internal_memeory']==$post['productsvalues']){
										$data=array('internal_memeory'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$internal_memeory='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='screen_size' && $post['unchecked']!='uncheck'){
								$screen_size=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='screen_size'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['screen_size']==$post['productsvalues']){
										$data=array('screen_size'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$screen_size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='Processor' && $post['unchecked']!='uncheck'){
								$Processor=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='Processor'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['Processor']==$post['productsvalues']){
										$data=array('Processor'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$Processor='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='type' && $post['unchecked']!='uncheck'){
								$type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='type'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['type']==$post['productsvalues']){
										$data=array('type'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='printer_type' && $post['unchecked']!='uncheck'){
								$printer_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='printer_type'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['printer_type']==$post['productsvalues']){
										$data=array('printer_type'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$printer_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='max_copies' && $post['unchecked']!='uncheck'){
								$max_copies=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='max_copies'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['max_copies']==$post['productsvalues']){
										$data=array('max_copies'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$max_copies='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='paper_size' && $post['unchecked']!='uncheck'){
								$paper_size=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='paper_size'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['paper_size']==$post['productsvalues']){
										$data=array('paper_size'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$paper_size='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='headphone_jack' && $post['unchecked']!='uncheck'){
								$headphone_jack=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='headphone_jack'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['headphone_jack']==$post['productsvalues']){
										$data=array('headphone_jack'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$headphone_jack='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='noise_reduction' && $post['unchecked']!='uncheck'){
								$noise_reduction=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='noise_reduction'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['noise_reduction']==$post['productsvalues']){
										$data=array('noise_reduction'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$noise_reduction='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='usb_port' && $post['unchecked']!='uncheck'){
								$usb_port=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='usb_port'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['usb_port']==$post['productsvalues']){
										$data=array('usb_port'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$usb_port='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='compatible_for' && $post['unchecked']!='uncheck'){
								$compatible_for=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='compatible_for'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['compatible_for']==$post['productsvalues']){
										$data=array('compatible_for'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$compatible_for='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='scanner_type' && $post['unchecked']!='uncheck'){
								$scanner_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='scanner_type'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['scanner_type']==$post['productsvalues']){
										$data=array('scanner_type'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$scanner_type='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='resolution' && $post['unchecked']!='uncheck'){
								$resolution=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='resolution'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['resolution']==$post['productsvalues']){
										$data=array('resolution'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$resolution='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='f_stop' && $post['unchecked']!='uncheck'){
								$f_stop=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='f_stop'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['f_stop']==$post['productsvalues']){
										$data=array('f_stop'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$f_stop='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='minimum_focusing_distance' && $post['unchecked']!='uncheck'){
								$minimum_focusing_distance=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='minimum_focusing_distance'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['minimum_focusing_distance']==$post['productsvalues']){
										$data=array('minimum_focusing_distance'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$minimum_focusing_distance='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='aperture_withmaxfocal_length' && $post['unchecked']!='uncheck'){
								$aperture_withmaxfocal_length=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='aperture_withmaxfocal_length'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['aperture_withmaxfocal_length']==$post['productsvalues']){
										$data=array('aperture_withmaxfocal_length'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$aperture_withmaxfocal_length='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='picture_angle' && $post['unchecked']!='uncheck'){
								$picture_angle=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='picture_angle'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['picture_angle']==$post['productsvalues']){
										$data=array('picture_angle'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$picture_angle='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='weight' && $post['unchecked']!='uncheck'){
								$weight=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='weight'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['weight']==$post['productsvalues']){
										$data=array('weight'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$weight='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='occasion' && $post['unchecked']!='uncheck'){
								$occasion=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='occasion'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['occasion']==$post['productsvalues']){
										$data=array('occasion'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$occasion='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='material' && $post['unchecked']!='uncheck'){
								$material=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='material'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['material']==$post['productsvalues']){
										$data=array('material'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$material='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='collar_type' && $post['unchecked']!='uncheck'){
								$collar_type=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='collar_type'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['collar_type']==$post['productsvalues']){
										$data=array('collar_type'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$collar_type='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='gender' && $post['unchecked']!='uncheck'){
								$gender=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='gender'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['gender']==$post['productsvalues']){
										$data=array('gender'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$gender='';
							}
							if(isset($post['searchvalue']) && $post['searchvalue']=='sleeve' && $post['unchecked']!='uncheck'){
								$sleeve=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='sleeve'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['sleeve']==$post['productsvalues']){
										$data=array('sleeve'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$sleeve='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='look' && $post['unchecked']!='uncheck'){
								$look=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='look'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['look']==$post['productsvalues']){
										$data=array('look'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$look='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='style_code' && $post['unchecked']!='uncheck'){
								$style_code=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='style_code'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['style_code']==$post['productsvalues']){
										$data=array('style_code'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$style_code='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='inner_material' && $post['unchecked']!='uncheck'){
								$inner_material=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='inner_material'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['inner_material']==$post['productsvalues']){
										$data=array('inner_material'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$inner_material='';
							}if(isset($post['searchvalue']) && $post['searchvalue']=='waterproof' && $post['unchecked']!='uncheck'){
								$waterproof=$post['productsvalues'];
							}else if(isset($post['unchecked']) && $post['unchecked']=='uncheck' && $post['searchvalue']=='waterproof'){
								$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
								foreach ($removesearch as $list){
									if($list['waterproof']==$post['productsvalues']){
										$data=array('waterproof'=>'');
										$this->category_model->category_wiseprice_update_deails($list['id'],$data);
									}
								} 
							}else{
								$waterproof='';
							}
							
					
				
				$ip=$this->input->ip_address();
				
				$data1=array(
				'ip_address'=>$ip,
				'category_id'=>$post['categoryid'],
				'group'=>$post['group'],
				'minamt'=>$post['min'],
				'minimum_price'=>isset($post['mini_mum']) ? $post['mini_mum']:'',
				'maximum_price'=>isset($post['maxi_mum']) ? $post['maxi_mum']:'',
				'offer'=>isset($offer) ? $offer:'',
				'brand'=>isset($brand) ? $brand:'',
				'colour'=>isset($color) ? $color:'',
				'discount'=>isset($discount) ? $discount:'',
				'size'=>isset($size) ? $size:'',
				'ram'=>isset($ram) ? $ram:'',
				'os'=>isset($os) ? $os:'',
				'sim_type'=>isset($sim_type)?$sim_type:'',
				'camera'=>isset($camera)?$camera:'',
				'internal_memeory'=>isset($internal_memeory)?$internal_memeory:'',
				'screen_size'=>isset($screen_size)?$screen_size:'',
				'Processor'=>isset($Processor)?$Processor:'',
				'printer_type'=>isset($printer_type)?$printer_type:'',
				'type'=>isset($type)?$type:'',
				'max_copies'=>isset($max_copies)?$max_copies:'',
				'paper_size'=>isset($paper_size)?$paper_size:'',
				'headphone_jack'=>isset($headphone_jack)?$headphone_jack:'',
				'noise_reduction'=>isset($noise_reduction)?$noise_reduction:'',
				'usb_port'=>isset($usb_port)?$usb_port:'',
				'compatible_for'=>isset($compatible_for)?$compatible_for:'',
				'scanner_type'=>isset($scanner_type)?$scanner_type:'',
				'resolution'=>isset($resolution)?$resolution:'',
				'f_stop'=>isset($f_stop)?$f_stop:'',
				'minimum_focusing_distance'=>isset($minimum_focusing_distance)?$minimum_focusing_distance:'',
				'aperture_withmaxfocal_length'=>isset($aperture_withmaxfocal_length)?$aperture_withmaxfocal_length:'',
				'picture_angle'=>isset($picture_angle)?$picture_angle:'',
				'weight'=>isset($weight)?$weight:'',
				'occasion'=>isset($occasion)?$occasion:'',
				'material'=>isset($material)?$material:'',
				'collar_type'=>isset($collar_type)?$collar_type:'',
				'gender'=>isset($gender)?$gender:'',
				'sleeve'=>isset($sleeve)?$sleeve:'',
				'look'=>isset($look)?$look:'',
				'style_code'=>isset($style_code)?$style_code:'',
				'inner_material'=>isset($inner_material)?$inner_material:'',
				'waterproof'=>isset($waterproof)?$waterproof:'',
				'create_at'=>date('Y-m-d H:i:s'),
				);
				//echo '<pre>';print_r($data1);
				//exit;
				$s_s_i_data= $this->category_model->save_categorypricesearchdata($data1);
				if(count($s_s_i_data)>0){
					$removesearch= $this->category_model->get_categoryprice_all_previous_search_fields();
					foreach ($removesearch as $list){
						$data=array('minimum_price'=>$post['mini_mum'],'maximum_price'=>$post['maxi_mum']);
						$this->category_model->category_wiseprice_update_deails($list['id'],$data);	
					}
				redirect('category/categorywiseprice_searchresult');
				}
			 }
			 
			 
			 
			  public function categorywiseprice_searchresult(){
				$data['itemwise']= $this->category_model->get_categorywiseprice_search_result_data($this->input->ip_address());
				//echo $this->db->last_query();exit;
				if(isset($data['itemwise']) && count($data['itemwise'])>0){
					foreach($data['itemwise'] as $lists){
					$reviewrating[]=$this->category_model->product_reviews_avg($lists['item_id']);
					$reviewcount[]=$this->category_model->product_reviews_count($lists['item_id']);
					}
				}
				
				if(isset($reviewrating) && count($reviewrating)>0){
							$data['avg_count']=$reviewrating;
						}else{
							$data['avg_count']=array();
						}
						if(isset($reviewcount) && count($reviewcount)>0){
							$data['rating_count']=$reviewcount;
						}else{
							$data['rating_count']=array();
						}
				$data['previousdata']= $this->category_model->get_categoryprice_all_previous_search_fields($this->input->ip_address());
				
				$data['category_details']= $this->category_model->category_details($data['previousdata'][0]['category_id']);
				$filtersitemid= $this->category_model->get_categorywiseprice_data_item_id($this->input->ip_address());
				$data['category_id']=$filtersitemid['category_id'];
				$data['minprice']=$filtersitemid['minamt'];
				$data['brand']=$filtersitemid['group'];
				$catid=$filtersitemid['category_id'];
				$brand=$filtersitemid['group'];
				$minprice=$filtersitemid['minamt'];
				//echo '<pre>';print_r($data['subitemwise']);exit;
				$data['brand_list']= $this->category_model->get_group_all_pricewise_list($catid,'brand',$brand,$minprice);
				
				$data['price_list']= $this->category_model->get_group_all_price_list($catid,$brand,$minprice);
				$data['avalibility_list']= array('Instock'=>1,'Out of stock'=>0);
				$offer_list= $this->category_model->get_price_all_offer_list($catid,$brand,$minprice);
				//echo $this->db->last_query();exit;
				$data['color_list']= $this->category_model->get_group_all_pricewise_list($catid,'colour',$brand,$minprice);
				$data['ram_list']= $this->category_model->get_group_all_pricewise_list($catid,'ram',$brand,$minprice);
				//echo $this->db->last_query();exit;
				$data['os_list']= $this->category_model->get_group_all_pricewise_list($catid,'os',$brand,$minprice);
				$data['sim_list']= $this->category_model->get_group_all_pricewise_list($catid,'sim_type',$brand,$minprice);
				$data['camera_list']= $this->category_model->get_group_all_pricewise_list($catid,'camera',$brand,$minprice);
				$data['internal_memeory_list']= $this->category_model->get_group_all_pricewise_list($catid,'internal_memeory',$brand,$minprice);
				$data['screen_size_list']= $this->category_model->get_group_all_pricewise_list($catid,'screen_size',$brand,$minprice);
				$data['Processor_list']= $this->category_model->get_group_all_pricewise_list($catid,'Processor',$brand,$minprice);
				$data['printer_type']= $this->category_model->get_group_all_pricewise_list($catid,'printer_type',$brand,$minprice);
				$data['type_list']= $this->category_model->get_group_all_pricewise_list($catid,'type',$brand,$minprice);
				$data['max_copies']= $this->category_model->get_group_all_pricewise_list($catid,'max_print_resolution',$brand,$minprice);
				$data['paper_size']= $this->category_model->get_group_all_pricewise_list($catid,'paper_size',$brand,$minprice);
				$data['headphone_jack']= $this->category_model->get_group_all_pricewise_list($catid,'headphone_jack',$brand,$minprice);
				$data['noise_reduction']= $this->category_model->get_group_all_pricewise_list($catid,'noise_reduction',$brand,$minprice);
				$data['usb_port']= $this->category_model->get_group_all_pricewise_list($catid,'usb_port',$brand,$minprice);
				$data['compatible_for']= $this->category_model->get_group_all_pricewise_list($catid,'compatible_for',$brand,$minprice);
				$data['scanner_type']= $this->category_model->get_group_all_pricewise_list($catid,'scanner_type',$brand,$minprice);
				$data['resolution']= $this->category_model->get_group_all_pricewise_list($catid,'resolution',$brand,$minprice);
				$data['f_stop']= $this->category_model->get_group_all_pricewise_list($catid,'f_stop',$brand,$minprice);
				$data['minimum_focusing_distance']= $this->category_model->get_group_all_pricewise_list($catid,'minimum_focusing_distance',$brand,$minprice);
				$data['aperture_withmaxfocal_length']= $this->category_model->get_group_all_pricewise_list($catid,'aperture_withmaxfocal_length',$brand,$minprice);
				$data['picture_angle']= $this->category_model->get_group_all_pricewise_list($catid,'picture_angle',$brand,$minprice);
				$data['size_list']= $this->category_model->get_group_all_pricewise_list($catid,'size',$brand,$minprice);
				$data['weight_list']= $this->category_model->get_group_all_pricewise_list($catid,'weight',$brand,$minprice);
				$data['occasion_list']= $this->category_model->get_group_all_pricewise_list($catid,'occasion',$brand,$minprice);
				$data['material_list']= $this->category_model->get_group_all_pricewise_list($catid,'material',$brand,$minprice);
				$data['collar_type']= $this->category_model->get_group_all_pricewise_list($catid,'collar_type',$brand,$minprice);
				$data['gender_list']= $this->category_model->get_group_all_pricewise_list($catid,'gender',$brand,$minprice);
				$data['sleeve_list']= $this->category_model->get_group_all_pricewise_list($catid,'sleeve',$brand,$minprice);
				$data['look_list']= $this->category_model->get_group_all_pricewise_list($catid,'look',$brand,$minprice);
				$data['style_code']= $this->category_model->get_group_all_pricewise_list($catid,'style_code',$brand,$minprice);
				$data['inner_material']= $this->category_model->get_group_all_pricewise_list($catid,'inner_material',$brand,$minprice);
				$data['waterproof']= $this->category_model->get_group_all_pricewise_list($catid,'waterproof',$brand,$minprice);
				 foreach ($data['price_list'] as $list) {
					$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d h:i:s A');
					if($list['offer_expairdate']>=$curr_date){
						$amounts[]=$list['item_cost'];
					}else{
						$amounts[]=$list['special_price'];
					}
				 }
					$minamt = min($amounts);
					$maxamt= max($amounts);
					//echo '<pre>';print_r( $amounts);exit;
					$data['minimum_price'] = array('item_cost'=>$minamt);
					$data['maximum_price'] = array('item_cost'=>$maxamt);
					//echo max($data['price_list']);
					foreach ($offer_list as $list) {
						$date = new DateTime("now");
						$curr_date = $date->format('Y-m-d h:i:s A');
						if($list['offer_expairdate']>=$curr_date){
							if($list['offer_percentage']!=''){
								$ids[]=$list['offer_percentage'];
							}
						}else{
							if($list['offers']!=''){
								$ids[]=$list['offers'];
							}
						}
						
					}
					if(isset($ids) && count($ids)>0){
						foreach (array_unique($ids) as $Li){
							$uniids[]=array('offers'=>$Li);
						}
						$data['offer_list']=$uniids;
					}
				
				$cartitemids= $this->category_model->get_all_cart_lists_ids();
				if(count($cartitemids)>0){
				foreach($cartitemids as $list){
					$cust_ids[]=$list['cust_id'];
					$cart_item_ids[]=$list['item_id'];
					$cart_ids[]=$list['id'];
					
				}
				$data['cust_ids']=$cust_ids;
				$data['cart_item_ids']=$cart_item_ids;
				$data['cart_ids']=$cart_ids;
				
			}else{
				$data['cust_ids']=array();
				$data['cart_item_ids']=array();
				$data['cart_ids']=array();
			}
			$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
			if(count($wishlist_ids)>0){
			foreach ($wishlist_ids as  $list){
				$customer_ids_list[]=$list['cust_id'];
				$whishlist_item_ids_list[]=$list['item_id'];
				$whishlist_ids_list[]=$list['id'];
			}
			$data['customer_ids_list']=$customer_ids_list;
			$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
			$data['whishlist_ids_list']=$whishlist_ids_list;
			}
			$this->load->view('customer/pricewiseresult',$data);
	 }
	 /*pricewise products list*/
	
}
?>