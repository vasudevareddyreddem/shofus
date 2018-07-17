<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_Controller.php');

class Home extends Front_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('customer_model');
		$this->load->model('home_model');
		$this->load->model('category_model');
		$this->load->library('cart');
        $this->load->library('session');
		 if($this->session->userdata('location_area')=='')  {
		}
	}
public function index()

 {		
	if($this->session->userdata('seller_id')!=''){
		redirect('seller/dashboard');
	}
	  if($this->session->userdata('userdetails'))
		{
		$customerdetails=$this->session->userdata('userdetails');
		if($customerdetails['role_id']==5){
			redirect('inventory/dashboard');
		}else if($customerdetails['role_id']==2){
			redirect('admin/dashboard');
		}else if($customerdetails['role_id']==6){
			redirect('deliveryboy/dashboard');
		}
	 }	 
	 $post=$this->input->post();
		$data['homepage_banner'] = $this->home_model->get_home_pag_banner();
		$data['topoffers'] = $this->home_model->get_top_offers();
		$data['trending_products'] = $this->home_model->get_trending_products();
		$data['offer_for_you'] = $this->home_model->get_offer_for_you();
		$data['deals_of_the_day'] = $this->home_model->get_deals_of_the_day();
		$data['season_sales'] = $this->home_model->get_season_offers();
		$data['category_wise_products'] = $this->home_model->get_category_wise_products_list();
	 	$data['recentlyviewd']= $this->home_model->recently_viewed_producrs();
		$position_two= $this->home_model->get_homepage_position_two_banner(2);
		$data['position_two']=array_chunk($position_two, 3);
		$position_three= $this->home_model->get_homepage_position_three_banner(3);
		$data['position_three']=array_chunk($position_three, 4);
		$position_four= $this->home_model->get_homepage_position_four_banner(4);
		$data['position_four']=array_chunk($position_four, 3);
		$wishlist_ids= $this->category_model->get_all_wish_lists_ids();
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
	if(count($wishlist_ids)>0){
	foreach ($wishlist_ids as  $list){
		$customer_ids_list[]=$list['cust_id'];
		$whishlist_item_ids_list[]=$list['item_id'];
		$whishlist_ids_list[]=$list['id'];
	}//echo '<pre>';print_r($data);exit;
	$data['customer_ids_list']=$customer_ids_list;
	$data['whishlist_item_ids_list']=$whishlist_item_ids_list;
	$data['whishlist_ids_list']=$whishlist_ids_list;
	}
	$data['sidecaregory_list']= $this->home_model->get_sidebar_category_list();
//echo '<pre>';print_r($data);exit;
	$this->template->write_view('content', 'home/index',$data);
	$this->template->render();
}
public function search_functionality(){
	
	$post=$this->input->post();
	$data1 = $this->home_model->get_search_functionality_products($post['searchvalue']);
	$data2 = $this->home_model->get_search_functionality_sub_category($post['searchvalue']);
	$searchdata=array_merge($data1,$data2);
	//echo "<pre>";print_r($searchdata);exit;
	$i=1;foreach($searchdata as $searhitems){
		if($i<=10){
			if($searhitems['yes']==0){
				$result[]=$searhitems['subcategory_name']. ' subcategory';
			}else {
			$result[]=$searhitems['item_name'];

			}
		}
	$i++;} 
if(isset($result) && count($result)>0){
$datails=$result;
}else{
$datails=array('0'=>'No data Found');
}
echo json_encode($datails);	
}
public function seraching()
	{
		$post=$this->input->post();
		if($post['serachvalues']==''){
			redirect('');
		}
		print_r($post);
		$haystack = $post['serachvalues'];
		$remove   = " ";
		$remve1   = "sub";
		if( strpos( $haystack, $remve1 ) !== false ) {
			$str= preg_replace('/\W\w+\s*(\W*)$/', '$1', $haystack);
		}else{
			$str= $haystack;
		}
		
		//echo $str;exit;
if(isset($str) && $str=='Mobiles' || $str=='Grocery & Staples' || $str=='Meat' || $str=='Imported & Gourmet' || $str=='Household' || $str=='Personal Care' || $str=='Branded Foods' || $str=='Beverages' || $str=='Bread Dairy & Eggs' || $str=='Fruits & Vegetables'){
			$catid=$this->home_model->get_prodcut_id1($str);
			//print_r($catid);exit;
			if($catid['category_id']!=''){
			redirect('category/subcategoryview/'.base64_encode($catid['category_id']));
			}else{
				redirect();
			}
		}else{
			
			$item_id=$this->home_model->get_prodcut_id($str);
			if($item_id['item_id']!=''){
			redirect('category/productview/'.base64_encode($item_id['item_id']));
			}else{
				redirect();
			}
		}
}

public function location()
{

$session=array('location_name'=>$this->input->post('location_name'));

$this->session->set_userdata($session);

 echo "1";
}

public function namechanges (){
	$result = $this->home_model->get_all_namechanges_list_products();
	foreach ($result as $li){
		if($li['colour']!='' && $li['internal_memeory']!='' && $li['ram']!=''){
			$name=$li['name'].' '.ucfirst(strtolower($li['colour'])).' ('.$li['internal_memeory'].' ROM)'.' ('.$li['ram'].' RAM )';
		}else if($li['colour']!='' && $li['internal_memeory']!=''){
			$name=$li['name'].' '.ucfirst(strtolower($li['colour'])).' ('.$li['internal_memeory'].' ROM)';
		}else if($li['colour']!=''){
			$name=$li['name'].' '.ucfirst(strtolower($li['colour']));
		}
	$this->home_model->update_names($li['item_id'],$name);	
	}
}
public function percentagecal(){
	$result = $this->home_model->get_all_percentage_list_products();
	foreach ($result as $products_list){
	$item_price= $products_list['special_price'];
		$prices= ($products_list['item_cost']-$products_list['special_price']);
		$percentage= (($prices) /$products_list['item_cost'])*100;
		$orginal_price=$products_list['item_cost'];
	$this->home_model->update_discount($products_list['item_id'],number_format($prices, 2),number_format($percentage, 2));	
	}
}

}