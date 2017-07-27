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
		$hashSequence = $post['key'].'|'.$post['txnid'].'|'.$post['amount'].'|'.$post['productinfo'].'|'.$post['firstname'].'|'.$post['email'].'||||||||||';
		$hashVarsSeq = explode('|', $hashSequence);
 $hash_string='';
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= $hash_var;
      $hash_string .= '|';
    }

    $hash_string .= $post['salt'];
	$hash = strtolower(hash('sha512', $hash_string));
	
	
	
	
	$ch = curl_init();                    // initiate curl
$url = "https://test.payu.in/merchant/postservice.php?form=1"; // where you want to post data
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
curl_setopt($ch, CURLOPT_POSTFIELDS, "key='Ibibo'&command=verify_payment&hash=ajh84ba8abvav"); // define what you want to post
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
$output = curl_exec ($ch); // execute
 
curl_close ($ch); // close curl handle
 
var_dump($output); // show output
	//echo '<pre>';print_r($post);exit;
//echo '<pre>';print_r($post);exit;
exit;

redirect($post['url'] . '/_payment');	
	
	}
	
}

/* EOF */