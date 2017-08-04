<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Example usage of Authorize.net's
 * Advanced Integration Method (AIM)
 */
class Payment extends CI_Controller
{
	// Example auth & capture of a credit card
	public function index()
	{
		// Authorize.net lib
		$this->load->library('authorize_net');

		$auth_net = array(
			'x_card_num'			=> '4111111111111111', // Visa
			'x_exp_date'			=> '12/14',
			'x_card_code'			=> '123',
			'x_description'			=> 'A test transaction',
			'x_amount'				=> '20',
			'x_first_name'			=> 'John',
			'x_last_name'			=> 'Doe',
			'x_address'				=> '123 Green St.',
			'x_city'				=> 'Lexington',
			'x_state'				=> 'KY',
			'x_zip'					=> '40502',
			'x_country'				=> 'US',
			'x_phone'				=> '555-123-4567',
			'x_email'				=> 'test@example.com',
			'x_customer_ip'			=> $this->input->ip_address(),
			);
		$this->authorize_net->setData($auth_net);

		// Try to AUTH_CAPTURE
		if( $this->authorize_net->authorizeAndCapture() )
		{
			echo '<h2>Success!</h2>';
			echo '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p>';
			echo '<p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>';
		}
		else
		{
			echo '<h2>Fail!</h2>';
			// Get error
			echo '<p>' . $this->authorize_net->getError() . '</p>';
			// Show debug data
			$this->authorize_net->debug();
		}
	}
	public function debit_credit_post()
	{
			$post=$this->input->post();
			//$hashSequence = $post['key'].'|'.$post['txnid'].'|'.$post['amount'].'|'.$post['productinfo'].'|'.$post['firstname'].'|'.$post['email'].'||||||||||';
			$hashSequence = $post['key'].'|verify_payment|200|eCwWELxi';
			//$hashSequence =  $post['key'].'|'.$post['txnid'].'|'.$post['amount'].'|'.'|'.'offer_key'.'|2|';
			//$hashVarsSeq = explode('|', $hashSequence);
			echo '<pre>';print_r($hashSequence);
			//$hash_string .= 'eCwWELxi';
			$hashvalue = hash('sha512',$hashSequence);

			
			   //"key" => $post['key'].'|'."txnid" => $post['txnid'].'|'."amount" => $post['amount'].'|'."productinfo" => $post['productinfo'].'|'."firstname" => $post['firstname'].'|'."email" => $post['email'].'|'."surl" => "India".'|'."furl" => "India".'|'."hash" => $hashvalue
			


			                   // initiate curl
			$url = "https://test.payu.in/merchant/postservice.php?form=1"; // where you want to post data
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
			//curl_setopt($ch, CURLOPT_POSTFIELDS,  "key=".$post['key']."txnid=".$post['txnid']."amount=".$post['amount']."productinfo=".$post['productinfo']."firstname=".$post['firstname']."email=".$post['email']."surl=India".''."furl=India"."hash=".$hashvalue); // define what you want to post
			//curl_setopt($ch, CURLOPT_POSTFIELDS,  "key=".$post['key']."command=".$post['txnid']."txnid=".$post['txnid']."amount=".$post['amount']."productinfo=".$post['productinfo']."firstname=".$post['firstname']."email=".$post['email']."surl=India".''."furl=India"."hash=".$hashvalue); // define what you want to post
			curl_setopt($ch, CURLOPT_POSTFIELDS,  "key=gtKFFx&command=verify_payment&txnid=".$post['txnid']."&amount=".$post['amount']."&hash=".$hashvalue); // define what you want to post
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
			$output = curl_exec ($ch); // execute
			curl_close ($ch); // close curl handle
			echo '<pre>';print_r($output);exit;
			
	}
	
}

/* EOF */