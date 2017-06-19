<?php



$config = [



		'insurance_rules'		=>	[



														[



															'field'	=>	'insurance_name',



															'label'	=>	'Insurance Name',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'insurance_description',



															'label'	=>	'Insurance Description',



															'rules'	=>	'required',



														]



									],



		'cancer_rules'		=>	[



														[



															'field'	=>	'cancer_name',



															'label'	=>	'Cancer Name',



															'rules'	=>	'required'



														],



														[



															'field'	=>	'cancer_description',



															'label'	=>	'Cancer Description',



															'rules'	=>	'required',



														]



									],



		'ngo_rules'		=>	[



														[



															'field'	=>	'ngo_name',



															'label'	=>	'Ngo Name',



															'rules'	=>	'required'



														],



														[



															'field'	=>	'ngo_description',



															'label'	=>	'Ngo Description',



															'rules'	=>	'required',



														]



									],



		'amenities_rules'		=>	[



														[



															'field'	=>	'amenities_name',



															'label'	=>	'Amenities Name',



															'rules'	=>	'required'



														]



														



									],



		'accomodation_rules'		=>	[



														[



															'field'	=>	'accomodation_name',



															'label'	=>	'Accomodation Name',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'accomodation_address',



															'label'	=>	'Accomodation Address',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'accomodation_cost',



															'label'	=>	'Accomodation Cost',



															'rules'	=>	'required|numeric',



														]



									],



		'departments_rules'		=>	[



														[



															'field'	=>	'department_name',



															'label'	=>	'Department Name',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'department_description',



															'label'	=>	'Department Description',



															'rules'	=>	'required',



														]



									],



		'services_rules'		=>	[



														[



															'field'	=>	'service_name',



															'label'	=>	'Service Name',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'service_description',



															'label'	=>	'Service Description',



															'rules'	=>	'required',



														]



									],



		'specialization_rules'		=>	[



														[



															'field'	=>	'specialization_name',



															'label'	=>	'Specialization Name',



															'rules'	=>	'required'



														],



														[



															'field'	=>	'specialization_description',



															'label'	=>	'Specialization Description',



															'rules'	=>	'required',



														]



									],



		'admin_users_rules'		=>	[



														[



															'field'	=>	'admin_name',
															'label'	=>	'Admin Name',
															'rules'	=>	'required|alpha|min_length[3]|max_length[30]|is_unique[admin_users.admin_name]'
														],



														[



															'field'	=>	'admin_password',
															'label'	=>	'Admin Password',
															'rules'	=>	'required|trim',

														],

														[

															'field'	=>	'admin_email',
															'label'	=>	'Admin Email',

															'rules'	=>	'required|valid_email|is_unique[admin_users.admin_email]',

														]



									],


'updateadmin_users_rules'		=>	[



														[



															'field'	=>	'admin_name',
															'label'	=>	'Admin Name',
															'rules'	=>	'required|alpha|min_length[3]|max_length[30]'
														],



														[



															'field'	=>	'admin_password',
															'label'	=>	'Admin Password',
															'rules'	=>	'required|trim',

														],

														[

															'field'	=>	'admin_email',
															'label'	=>	'Admin Email',

															'rules'	=>	'required|valid_email',

														]



									],

		'hospital_rules'		=>	[



														[



															'field'	=>	'hospital_name',



															'label'	=>	'Hospital Name',



															'rules'	=>	'required'



														],



														[



															'field'	=>	'hospital_state',



															'label'	=>	'State',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'hospital_city',



															'label'	=>	'City',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'hospital_locality',



															'label'	=>	'Locality',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'hospital_phone',



															'label'	=>	'Phone No',



															'rules'	=>	'required',



														]



									],	
									
		'subcategory_rules'		=>	[



														[



															'field'	=>	'category_id',



															'label'	=>	'Category Name',



															'rules'	=>	'required'



														],



														[



															'field'	=>	'subcategory_name',



															'label'	=>	'Subcategory Name',



															'rules'	=>	'required',



														]



									],								
									
									
	'cih_rules'		=>	[



														[



															'field'	=>	'category_name',



															'label'	=>	'Category Name',



															'rules'	=>	'required'



														],



														[



															'field'	=>	'cih_fee',



															'label'	=>	'CIH Fee',



															'rules'	=>	'required|regex_match[/^[0-9_~\-!@#\$%\^&\*\(\)]+$/]',



														]



									],		
									
	'shipping_rules'		=>	[



														[



															'field'	=>	'product_weight',



															'label'	=>	'Product Weight',



															'rules'	=>	'required|regex_match[/^[0-9]*$/]'



														],



														[



															'field'	=>	'shipping_charges',



															'label'	=>	'Shipping Fee',



															'rules'	=>	'required|regex_match[/^[0-9]*$/]',



														]



									],														
		'closingfee_rules'		=>	[



														[



															'field'	=>	'product_price',



															'label'	=>	'Product Price',



															'rules'	=>	'required|regex_match[/^[0-9]*$/]'



														],



														[



															'field'	=>	'closing_fee',



															'label'	=>	'Closing Fee',



															'rules'	=>	'required|regex_match[/^[0-9]*$/]',



														]



									],							
	'servicefee_rules'		=>	[


														[



															'field'	=>	'service_fee',



															'label'	=>	'Service Fee',



															'rules'	=>	'required|regex_match[/^[0-9_~\-!@#\$%\^&\*\(\)]+$/]',



														]



									],
																																																																							
       'seller_rules'			=>	[

														[

															'field'	=>	'seller_name',
															'label'	=>	'Seller Name',
															'rules'	=> 'trim|required|max_length[30]|regex_match[/^[a-zA-Z ]*$/]',
														],

														[

															'field'	=>	'seller_email',
															'label'	=>	'Seller Email',
															'rules'	=>	'trim|required|valid_email|required|is_unique[sellers.seller_email]',

															'errors' => array(
      'is_unique'  => 'The name in %s is already being used by someone.',
    ),
														],

														[

															'field'	=>	'seller_password',
															'label'	=>	'Seller Password',
															'rules'	=>	'required|trim|min_length[3]',
														],

														[

															'field'	=>	'seller_mobile',
															'label'	=>	'Seller Mobile',
															'rules'	=>	'trim|required|regex_match[/^[789]\d{9}$/]',

														],

															[

															'field'	=>	'seller_address',
															'label'	=>	'Seller Address',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_shop',
															'label'	=>	'Shop Name',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_license',
															'label'	=>	'Seller License',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_servicetime',
															'label'	=>	'Service Time',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_bank',
															'label'	=>	'Bank Acc Number',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'type',
														    'label'	=>	'Shop Type',
															'rules'	=>	'required',



														],

														[

															'field'	=>	'status',
														    'label'	=>	'Status',
															'rules'	=>	'required',



														],



									],


'updateseller_rules'			=>	[

														[

															'field'	=>	'seller_name',
															'label'	=>	'Seller Name',
															'rules'	=> 'trim|required|max_length[30]|regex_match[/^[a-zA-Z ]*$/]',
														],

														[

															'field'	=>	'seller_email',
															'label'	=>	'Seller Email',
															'rules'	=>	'trim|required|valid_email|required',

														],

													
														[

															'field'	=>	'seller_mobile',
															'label'	=>	'Seller Mobile',
															'rules'	=>	'trim|required|regex_match[/^[789]\d{9}$/]',

														],

															[

															'field'	=>	'seller_address',
															'label'	=>	'Seller Address',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_shop',
															'label'	=>	'Shop Name',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_license',
															'label'	=>	'Seller License',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_servicetime',
															'label'	=>	'Service Time',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'seller_bank',
															'label'	=>	'Bank Acc Number',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'type',
														    'label'	=>	'Shop Type',
															'rules'	=>	'required',



														],

														[

															'field'	=>	'status',
														    'label'	=>	'Status',
															'rules'	=>	'required',



														],



									],
	 'deliveryboy_rules'			=>	[

														[

															'field'	=>	'deliveryboy_name',
															'label'	=>	'Deliveryboy Name',
															'rules'	=> 'trim|required|max_length[30]|regex_match[/^[a-zA-Z ]*$/]',
														],

														[

															'field'	=>	'deliveryboy_email',
															'label'	=>	'Deliveryboy Email',
															'rules'	=>	'trim|required|valid_email|required|is_unique[deliveryboy.deliveryboy_email]',

															'errors' => array(
      'is_unique'  => 'The name in %s is already being used by someone.',
    ),
														],

														[

															'field'	=>	'deliveryboy_password',
															'label'	=>	'Deliveryboy Password',
															'rules'	=>	'required|trim|min_length[3]',
														],

														[

															'field'	=>	'deliveryboy_mobile',
															'label'	=>	'Deliveryboy Mobile',
															'rules'	=>	'trim|required|regex_match[/^[789]\d{9}$/]',

														],

															[

															'field'	=>	'deliveryboy_address',
															'label'	=>	'Deliveryboy Address',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_bike',
															'label'	=>	'Deliveryboy Bike',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_bikeno',
															'label'	=>	'Bike Number',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_license',
														    'label'	=>	'Driving License',
															'rules'	=>	'required',



														],

														[

															'field'	=>	'deliveryboy_adhar',
															'label'	=>	'Adhar Number',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_bank',
														    'label'	=>	'Bank Acc Number', 
															'rules'	=>	'trim|required',



														],
														
													/*	[

															'field'	=>	'deliveryboy_photo',
														    'label'	=>	'Deliveryboy Photo', 
															'rules'	=>	'required',



														],*/
														[

															'field'	=>	'conditions',
															'label'	=>	'Terms & Conditions',
															'rules'	=>	'trim|required',

															'errors' => array(
      'required'  => 'Please Check this box if you want to proceed',
    ),
														],

									],

    'updatedeliveryboy_rules'		=>	[

														[

															'field'	=>	'deliveryboy_name',
															'label'	=>	'Deliveryboy Name',
															'rules'	=> 'trim|required|max_length[30]|regex_match[/^[a-zA-Z ]*$/]',
														],

														[

															'field'	=>	'deliveryboy_email',
															'label'	=>	'Deliveryboy Email',
															'rules'	=>	'trim|required|valid_email',

														],


														[

															'field'	=>	'deliveryboy_mobile',
															'label'	=>	'Deliveryboy Mobile',
															'rules'	=>	'trim|required|regex_match[/^[789]\d{9}$/]',

														],

															[

															'field'	=>	'deliveryboy_address',
															'label'	=>	'Deliveryboy Address',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_bike',
															'label'	=>	'Deliveryboy Bike',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_bikeno',
															'label'	=>	'Bike Number',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_license',
														    'label'	=>	'Driving License',
															'rules'	=>	'required',



														],

														[

															'field'	=>	'deliveryboy_adhar',
															'label'	=>	'Adhar Number',
															'rules'	=>	'trim|required',

														],

														[

															'field'	=>	'deliveryboy_bank',
														    'label'	=>	'Bank Acc Number', 
															'rules'	=>	'trim|required',



														],
														

									],
    'category_rules'			=>	[

														[

															'field'	=>	'category_name',
															'label'	=>	'Category Name',
															'rules'	=> 'trim|required|max_length[30]|regex_match[/^[a-zA-Z ]*$/]',
														],
									],					



		'admin_login'			=>	[



														[



															'field'	=>	'username',



															'label'	=>	'User Name',



															'rules'	=>	'required|alpha|trim',



														],



														[



															'field'	=>	'password',



															'label'	=>	'Password',



															'rules'	=>	'required',



														]



									],
									

'changepassword_rules'			=>	[


														[



															'field'	=>	'old_password',



															'label'	=>	'Current Password',



															'rules'	=>	'required',



														],



														[



															'field'	=>	'new_password',




															'label'	=>	'New Password',



															'rules'	=>	'required|trim|min_length[8]',



														],



														[



															'field'	=>	'repeat_password',



															'label'	=>	'Repeat Password',



															'rules'	=>	'trim|required|matches[new_password]',



														]



									],				

			];



			







			