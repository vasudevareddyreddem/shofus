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
		if($this->session->userdata('userdetails'))
		{
			$this->load->model('customer_model'); 
			$customerdetails=$this->session->userdata('userdetails');
			// Authorize.net lib
			$this->load->library('authorize_net');
			$post=$this->input->post();
			$billingaddress=$this->session->userdata('billingaddress');
			//echo '<pre>';print_r($post);exit;
			$expairdate=$post['expiry-month'].'/'.$post['expiry-year'];
			$totalamount=20;
			$auth_net = array(
				'x_card_num'			=> $post['card-number'], // Visa
				'x_exp_date'			=> $expairdate,
				'x_card_code'			=> $post['cvv'],
				'x_description'			=> 'A test transaction',
				'x_amount'				=> $totalamount,
				'x_first_name'			=> $post['card-holder-name'],
				'x_last_name'			=> '',
				'x_address'				=> $billingaddress['address1'],
				'x_city'				=> '',
				'x_state'				=> '',
				'x_zip'					=> '',
				'x_country'				=> 'US',
				'x_phone'				=> $billingaddress['mobile'],
				'x_email'				=> $customerdetails['cust_email'],
				'x_customer_ip'			=> $this->input->ip_address(),
				);
			$this->authorize_net->setData($auth_net);

			// Try to AUTH_CAPTURE
			if( $this->authorize_net->authorizeAndCapture() )
			{
				$data['msg']= '<h2>Success!</h2>';
				$data['Transaction_ID']= $this->authorize_net->getTransactionId();
				$data['Approval_Code']=$this->authorize_net->getApprovalCode();
				$ordersucess=array(
						'customer_id'=>$customerdetails['customer_id'],
						'transaction_id'=>$this->authorize_net->getTransactionId(),
						'total_price'=>$totalamount,
						'payment_mode'=>'creadit/debit',
						'order_status'=>1,
						'created_at'=>date('Y-m-d H:i:s'),
					);
					
				//echo '<pre>';print_r($ordersucess);
				$saveorder= $this->customer_model->save_order_success($ordersucess);
				//echo '<pre>';print_r($saveorder);exit;
				$cart_items= $this->customer_model->get_cart_products($customerdetails['customer_id']);
				foreach($cart_items as $items){
					$orderitems=array(
						'order_id'=>$saveorder,
						'item_id'=>$items['item_id'],
						'seller_id'=>$items['seller_id'],
						'customer_id'=>$items['cust_id'],
						'qty'=>$items['qty'],
						'item_price'=>$items['item_price'],
						'total_price'=>$items['total_price'],
						'delivery_amount'=>$items['delivery_amount'],
						'commission_price'=>$items['commission_price'],
						'customer_email'=>$customerdetails['cust_email'],
						'customer_phone'=>$billingaddress['mobile'],
						'customer_address'=>$billingaddress['address1'],
						'order_status'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
					);
					//echo '<pre>';print_r($adddata);exit;
					$save= $this->customer_model->save_order_items_list($orderitems);
				}
				
				$this->session->set_flashdata('paymentsucess','Payment successfully completed!');
				redirect('customer/ordersuccess/'.base64_encode($saveorder));
			}
			else
			{
			
				$data['msg']= '<h2>Fail!</h2>';
				$data['error_msg']= $this->authorize_net->getError();
				$this->session->set_flashdata('paymenterror',$this->authorize_net->getError());
				redirect('customer/orderpayment');
			}
		
		}else{
		 $this->session->set_flashdata('loginerror','Please login to continue');
		 redirect('customer');
	  }
	}
	
}

/* EOF */