<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('getmsgfrom')){
 function getmsgfrom($pd){
	  //return  $pd; 
		$CI =& get_instance();
		$CI->load->database();
		$query1="select *  from food where food_id IN ($pd)";
		$res1=$CI->db->query($query1);
		$data=$res1->result();
		//print_r($data); exit;
		return $data; 
}
}
?>