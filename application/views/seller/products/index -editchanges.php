<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
 <link href="<?php echo base_url(); ?>assets/seller/css/timePicker.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/seller/js/jquery-timepicker.js"></script>
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>

<div class="content-wrapper mar_t_con" >
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>  
			<h1>Offers</h1>
			<small>My Offers</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">My Offers</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="faq_main">
  	
   <?php if(!empty($catitemdata))  { ?>
    <div class="container" style="width:100%">
	
      <!--<h1 class="head_title">My Listings</h1>-->
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
      <div class="faq">
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
 <?php if($this->session->flashdata('success')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button><?php echo $this->session->flashdata('success');?></div>	
					<?php endif; ?>
	   <?php  $kk=1;foreach($catitemdata1 as $catitem_data1 )  {  ?> 
		
		 <a id="btn_chang<?php echo $kk;?>" onclick="addtabactive(<?php echo $kk;?>);addtabactives(<?php echo $kk;?>);" href="#gry<?php echo $catitem_data1->category_id;   ?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a>

	<?php $kk++;} ?>
        <?php  $j=1;foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              <div class="tab-pane" id="gry<?php echo $j; ?>">
              <?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			 
			//$nospace = str_replace(' ','_',$space);
			$nospace = str_replace(array(' ',';','/','_', '<','@','+','-','$',':','.','^','|','?','!','#','~', ',', '>', '&', '{', '}','(', ')', '*'), array('_'), $space);
			
			//$base =base64_encode($nospace);

			//$replay = base64_decode($nospace);
			
			?>
              <div style="padding:10px;" class="panel panel-default mar_t10">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion"  href="#collapOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
		
	<form  id="frm-example<?php echo $subcategory->subcategory_id;?>" name="frm-example<?php echo $subcategory->subcategory_id;?>" action="" method="POST">
		<div class="table-responsive">
		<table id="example<?php echo $subcategory->subcategory_id;?>" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
               <th>Item Name</th>
                <th>Product Code</th>
                <th>Item price</th>
                <th>Special price</th>
                <th>Quantity</th>
				<th>Brand</th>
					<?php if($subcategory->subcategory_id==40){ ?>
						<th>Processor</th>
						<th>Screen Size</th>
						<th>Internal Memory</th>
						<th>camera</th>
						<th>Sim Type</th>
						<th>OS</th>
						<th>Colour</th>
						<th>RAM</th>
						<th>Model Name</th>
						<th>Model ID</th>
						<th>Internal Memory</th>
						<th>Expandable Memory</th>
						<th>Primary Camera</th>
						<th>Primary Camera Features</th>
						<th>Secondary Camera</th>
						<th>Secondary Camera Features </th>
						<th>Video Recording </th>
						<th>HD Recording</th>
						<th>Flash</th>
						<th>Other Camera Features</th>
						<th>Battery Capacity</th>
						<th>Talk Time</th>
						<th>Standby Time</th>
						<th>Operating Frequency</th>
						<th>Preinstalled Browser</th>
						<th>Wifi</th>
						<th>GPS</th>
						<th>USB Connectivity</th>
						<th>Bluetooth</th>
						<th>NFC</th>
						<th>Edge</th>
						<th>Edge Features</th>
						<th>Music Player</th>
						<th>Video Player</th>
						<th>Audio Jack</th>
						<th>GPU</th>
						<th>Sim Size</th>
						<th>Sim Type</th>
						<th>Call Memory</th>
						<th>SMS Memory</th>
						<th>Phone Book Memory</th>
						<th>Sensors</th>
						<th>Java</th>
						<th>In Sales Package</th>
						<th>Display & resolution</th>
						<th>Display Type</th>
					<?php } ?>
					<?php if($subcategory->subcategory_id==41 || $subcategory->subcategory_id==42 || $subcategory->subcategory_id==43 || $subcategory->subcategory_id==44 || $subcategory->subcategory_id==45 || $subcategory->subcategory_id==46 || $subcategory->subcategory_id==47 || $subcategory->subcategory_id==48 || $subcategory->subcategory_id==49){ ?>
					   <th>Ingredients</th>
					   <th>Key Features</th>
					   <th>Unit</th>
					   <th>Packaging Type</th>
					   <th>Disclaimer</th>
					<?php } ?>
                <th>Offer Amount</th>
                <th>Combo offer item Name</th>
                <th>Offer expiry Date and Time</th>
				<th>Status</th>
				<?php if($status_details['status']==1){ ?>
                 <th>Action</th>
				<?php } ?>				 
            </tr>
        </thead>
      
             <tbody>
					<?php $k=1; 
					foreach($subcategory->docs12 as $item_data){
					//echo '<pre>';print_r($item_data);exit;	
						
						?>
					<tr>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_name',this.value)" name="product_name" value="<?php echo $item_data->item_name;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_code',this.value)" name="product_code" value="<?php echo $item_data->product_code;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_cost',this.value)" name="product_cost" id="product_cost<?php echo $subcategory->subcategory_id;?>" value="<?php echo $item_data->item_cost;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_special',this.value)" name="product_special" id="product_special<?php echo $subcategory->subcategory_id;?>" value="<?php echo $item_data->special_price;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','qty',this.value)" name="qty" value="<?php echo $item_data->item_quantity;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','brand',this.value)" name="brand" value="<?php echo $item_data->brand;?>"/></td>
							<?php if($item_data->subcategory_id==40){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','Processor',this.value)" name="Processor" value="<?php echo $item_data->Processor;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','screen_size',this.value)" name="screen_size" value="<?php echo $item_data->screen_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','internal_memeory',this.value)" name="internal_memeory" value="<?php echo $item_data->internal_memeory;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','camera',this.value)" name="camera" value="<?php echo $item_data->camera;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sim_type',this.value)" name="sim_type" value="<?php echo $item_data->sim_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','os',this.value)" name="os" value="<?php echo $item_data->os;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ram',this.value)" name="ram" value="<?php echo $item_data->ram;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','internal_memory',this.value)" name="internal_memory" value="<?php echo $item_data->internal_memory;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','expand_memory',this.value)" name="expand_memory" value="<?php echo $item_data->expand_memory;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','primary_camera',this.value)" name="primary_camera" value="<?php echo $item_data->primary_camera;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','primary_camera_feature',this.value)" name="primary_camera_feature" value="<?php echo $item_data->primary_camera_feature;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','secondary_camera',this.value)" name="secondary_camera" value="<?php echo $item_data->secondary_camera;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','secondary_camera_feature',this.value)" name="secondary_camera_feature" value="<?php echo $item_data->secondary_camera_feature;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','video_recording',this.value)" name="video_recording" value="<?php echo $item_data->video_recording;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','hd_recording',this.value)" name="hd_recording" value="<?php echo $item_data->hd_recording;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','flash',this.value)" name="flash" value="<?php echo $item_data->flash;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','other_camera_features',this.value)" name="other_camera_features" value="<?php echo $item_data->other_camera_features;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','battery_capacity',this.value)" name="battery_capacity" value="<?php echo $item_data->battery_capacity;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','talk_time',this.value)" name="talk_time" value="<?php echo $item_data->talk_time;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','standby_time',this.value)" name="standby_time" value="<?php echo $item_data->standby_time;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','operating_frequency',this.value)" name="operating_frequency" value="<?php echo $item_data->operating_frequency;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','preinstalled_browser',this.value)" name="preinstalled_browser" value="<?php echo $item_data->preinstalled_browser;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wifi',this.value)" name="wifi" value="<?php echo $item_data->wifi;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','gps',this.value)" name="gps" value="<?php echo $item_data->gps;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','usb_connectivity',this.value)" name="usb_connectivity" value="<?php echo $item_data->usb_connectivity;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','bluetooth',this.value)" name="bluetooth" value="<?php echo $item_data->bluetooth;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','nfc',this.value)" name="nfc" value="<?php echo $item_data->nfc;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','edge',this.value)" name="edge" value="<?php echo $item_data->edge;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','edge_features',this.value)" name="edge_features" value="<?php echo $item_data->edge_features;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','music_player',this.value)" name="music_player" value="<?php echo $item_data->music_player;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','video_player',this.value)" name="video_player" value="<?php echo $item_data->video_player;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','audio_jack',this.value)" name="audio_jack" value="<?php echo $item_data->audio_jack;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','gpu',this.value)" name="gpu" value="<?php echo $item_data->gpu;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sim_size',this.value)" name="sim_size" value="<?php echo $item_data->sim_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sim_supported',this.value)" name="sim_supported" value="<?php echo $item_data->sim_supported;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','call_memory',this.value)" name="call_memory" value="<?php echo $item_data->call_memory;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sms_memory',this.value)" name="sms_memory" value="<?php echo $item_data->sms_memory;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','phone_book_memory',this.value)" name="phone_book_memory" value="<?php echo $item_data->phone_book_memory;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sensors',this.value)" name="sensors" value="<?php echo $item_data->sensors;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','java',this.value)" name="java" value="<?php echo $item_data->java;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','insales_package',this.value)" name="insales_package" value="<?php echo $item_data->insales_package;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','dislay_resolution',this.value)" name="dislay_resolution" value="<?php echo $item_data->dislay_resolution;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','display_type',this.value)" name="display_type" value="<?php echo $item_data->display_type;?>"/></td>
								
							<?php } ?>
							<?php if($item_data->subcategory_id==41 || $item_data->subcategory_id==42 || $item_data->subcategory_id==43 || $item_data->subcategory_id==44 || $item_data->subcategory_id==45 || $item_data->subcategory_id==46 || $item_data->subcategory_id==47 || $item_data->subcategory_id==48 || $item_data->subcategory_id==49){ ?>

								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ingredients',this.value)" name="ingredients" value="<?php echo $item_data->ingredients;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','service_type',this.value)" name="service_type" value="<?php echo $item_data->service_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','unit',this.value)" name="unit" value="<?php echo $item_data->unit;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','packingtype',this.value)" name="packingtype" value="<?php echo $item_data->packingtype;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','disclaimer',this.value)" name="disclaimer" value="<?php echo $item_data->disclaimer;?>"/></td>
								
							<?php } ?>
						<td><?php echo $item_data->offer_amount;?></td>
						<td><?php if($item_data->offer_combo_item_id !=4 && $item_data->offer_combo_item_id !='' && $item_data->offer_combo_item_id!=0){ echo $item_data->offer_combo_item_name; }else{ echo ""; }?></td>
						<td><?php echo $item_data->offer_expairdate;?></td>
						<td>
						<select id="status" onchange="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','status',this.value)" >
						<?php if($item_data->item_status == 1) {?>
						<option value="1"selected>Available</option>
						<option value="0">Unavailable</option>
						<?php }else if($item_data->item_status == 0){  ?>
						<option value="1">Available</option>
						<option value="0" selected>Unavailable</option>
															
						<?php } ?>						
						</select>
						</td>
						<?php if($status_details['status']==1){ ?>
						<td>
						<a href="<?php echo site_url('seller/products/edit/'.base64_encode($item_data->item_id).'/'.base64_encode($item_data->category_id)); ?>">Edit</a> | &nbsp;
						<a href="<?php echo site_url('seller/products/item_status/'.base64_encode($item_data->item_id).'/'.base64_encode($item_data->item_status)); ?>"><?php if($item_data->item_status==0){ echo 'Deactive'; }else{ echo "Active"; } ?></a>
						</td>
						<?php } ?>
                     
					</tr>
				  <?php $k++; } ?>
				  </tbody>
    </table>
	</div>
	
	<div class="modal fade" id="offerspopup<?php echo $subcategory->subcategory_id;?>" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header" style="background-color: #00354d;color:#fff;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="title" class="modal-title">Confirmation</h4>	
        </div>
        <div class="modal-body">
		<div class="form-group">
		<label class="control-label">Select your offer type: </label>                      
		<select class="form-control" id="offertype<?php echo $subcategory->subcategory_id;?>" onchange="fetoffertype<?php echo $subcategory->subcategory_id;  ?>(this.value);" name="offertype">	

			<option value="">Select</option>
			<option value="1">Listing Discount</option>
			<option value="2">Cart Discount</option>
			<option value="3">Flat Price Offer</option>
			<option value="4">Combo Discount</option>
		</select>
		<span style="color:red" id="offertypeerror<?php echo $subcategory->subcategory_id;?>"></span>
		
		</div>
		<div id="ComboDisoucnt<?php echo $subcategory->subcategory_id;?>" style="display:none;">
		<div class="form-group">
		<label class="control-label">Select your Products: </label>                      
		<select class="form-control" onchange="selectcombooffer<?php echo $subcategory->subcategory_id; ?>(this.value);"   id="combo<?php echo $subcategory->subcategory_id;?>" name="combo">
				<option value="">Select product</option>
				<?php foreach($seller_prducts as $cat_data){ ?>
				<option value="<?php echo $cat_data['item_id']; ?>"><?php echo $cat_data['item_name']; ?></option>                  
				<?php }?>
		</select>
		<span style="color:red" id="producttypeerror<?php echo $subcategory->subcategory_id;?>"></span>		
		</div>
		</div>
		<div id="offervalue<?php echo $subcategory->subcategory_id;?>" style="display:none;">
		<div class="form-group">
		<label class="control-label">Enter your  offer value: </label>                      
		<input type="text" class="form-control"  name="offeramount" id="offeramount<?php echo $subcategory->subcategory_id;?>">					
		</div><span style="color:red" id="offeramounterror<?php echo $subcategory->subcategory_id;?>"></span>
		</div>
		<div class="row" style="padding:5px 12px;">
		    <div class="form-group">
                <label for="dtp_input1" class=" control-label">Select your Offer Expiry  Date</label>
                <div class="input-group date form_datetime " data-date="" data-date-format="dd-mm-yyyy HH:ii P" data-link-field="dtp_input1">
                    <input class="form-control" size="16" name="expairdate" id="datepicker<?php echo $subcategory->subcategory_id;?>" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
				<span style="color:red" id="offertdate<?php echo $subcategory->subcategory_id;?>"></span>	
				</div>
		

		</div>	
	
		
        <div class="modal-footer" style="border:none;">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
     </div>
 
 
    </div>
   </div>
     </form>
	<script type="text/javascript">
	function checkall(id){
		
		var check=document.getElementById("example-select-all"+id).checked;
		if(check=='true'){
			$('#submit_prog'+id).show();
		}
	}
	$('#submit_prog<?php echo $subcategory->subcategory_id;?>').hide();
	function IsMobile<?php echo $subcategory->subcategory_id;?>(reasontype) {
        var regex = /^[0-9]+$/;
        return regex.test(reasontype);
	}
	function fetoffertype<?php echo $subcategory->subcategory_id;?>(id){
		$('#offertypeerror<?php echo $subcategory->subcategory_id;?>').html('');
		$('#producttypeerror<?php echo $subcategory->subcategory_id;?>').html('');
		var offertype=id;
		if(offertype==4){
			$('#offervalue<?php echo $subcategory->subcategory_id;?>').hide();
			$('#ComboDisoucnt<?php echo $subcategory->subcategory_id;?>').show();
		}else{
			$('#offervalue<?php echo $subcategory->subcategory_id;?>').show();
			$('#ComboDisoucnt<?php echo $subcategory->subcategory_id;?>').hide();
		}
	}
	function selectcombooffer<?php echo $subcategory->subcategory_id;?>(id){
		if(id==''){
		$('#producttypeerror<?php echo $subcategory->subcategory_id;?>').show();	
		}else{
		$('#producttypeerror<?php echo $subcategory->subcategory_id;?>').hide();		
		}
	}

	$(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#example<?php echo $subcategory->subcategory_id;?>').DataTable({
       'columnDefs': [{
		 'targets': [0, 1, 2, 3, 4, 5,6 ,7 ,8 ,9, 10, 11, 12, 13, 14, 15],
         'searchable':true,
          'orderable':true,
		 'className': 'dt-body-center',
		 //'type': 'html-input',
      
      }],
      'order': [1, 'DESC'],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });

   // Handle click on checkbox
   $('#example<?php echo $subcategory->subcategory_id;?> tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');
 
      // Get row data
      var data = table.row($row).data();
      // Get row ID
      var rowId = data[0];
		var index = $.inArray(rowId, rows_selected);

      if(this.checked && index === -1){
         rows_selected.push(rowId);

      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      updateDataTableSelectAllCtrl(table);

      e.stopPropagation();
   });

   $('#example<?php echo $subcategory->subcategory_id;  ?>').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('tbody input[type="checkbox"]:not(:checked)', table.table().container()).trigger('click');
      } else {
         $('tbody input[type="checkbox"]:checked', table.table().container()).trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });
    
   // Handle form submission event 
  $('#frm-example<?php echo $subcategory->subcategory_id;?>').on('submit', function(e){
      var form = this;

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'cat_id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY     
      
      // Output form data to a console     
      console.log("Form submission", $(form).serialize()); 
      var $data = $(form).serialize();
	  var offertpes=document.getElementById('offertype<?php echo $subcategory->subcategory_id;?>').value;
	  
	  if(offertpes==''){
		jQuery('#offertypeerror<?php echo $subcategory->subcategory_id;?>').html('Please select an Offer Type');
		return false;
	  } if(offertpes==4){
		 var product=document.getElementById('combo<?php echo $subcategory->subcategory_id;?>').value;
		if(product==''){
			jQuery('#producttypeerror<?php echo $subcategory->subcategory_id;?>').html('Please select a Product');
			return false;   
		  }
		  jQuery('#producttypeerror<?php echo $subcategory->subcategory_id;?>').html('');
		}else{
			 var offerAmt=document.getElementById('offeramount<?php echo $subcategory->subcategory_id;?>').value;
				 if(offerAmt==''){
					jQuery('#offeramounterror<?php echo $subcategory->subcategory_id;?>').html('Please eneter offer Percentages');
					return false; 
				 }else{
						if (!IsMobile<?php echo $subcategory->subcategory_id;?>(offerAmt)) {
						$("#offeramounterror<?php echo $subcategory->subcategory_id;?>").html("Please Enter Correct Offer Percentages");
						return false;
						} 
				 }
				 if(offerAmt >100){
					$("#offeramounterror<?php echo $subcategory->subcategory_id;?>").html("Please Enter less than or equal to 100 Percentages");
					return false; 
				 }
	  
		  }
		  jQuery("#offeramounterror<?php echo $subcategory->subcategory_id;?>").html('');
	  var date=document.getElementById('datepicker<?php echo $subcategory->subcategory_id;?>').value;
	  
		if(date==''){
		jQuery('#offertdate<?php echo $subcategory->subcategory_id;?>').html('Please select an expiry Date');
		return false;
	  }
	  jQuery('#offertdate<?php echo $subcategory->subcategory_id;?>').html('');
	  if(jQuery("#offertype<?php echo $subcategory->subcategory_id;?>").val()!=''){
      jQuery.ajax({
			url: "<?php echo base_url('/seller/promotions/storepromotions');?>",
			data:$data,
			type: "POST",
			format:"html",
					success:function(data){
					if(data.msg=1){
							location.reload();
						}
					}
        });
	  }
      e.preventDefault();
   });
});
$(document).ready(function() {
    
        var submit = $("#submit_prog<?php echo $subcategory->subcategory_id;?>").hide(),
            cbs = $('input[name="select_all"]').click(function() {
                submit.toggle( cbs.is(":checked") );
            });
            cid = $('input[name="cat_id[]"]').click(function() {
                submit.toggle( cid.is(":checked") );
            });
    
    });
</script>
                </div>
              </div>
			<?php }?>
              </div>
             
             
              
            </div>
        <!-- container --> 
	   <?php $j++;}?>
      </div>
    </div>
   <?php } else {?>
   
   <div class="container">
	
     <a href="<?php echo base_url('/seller/products/create');?>"> <h1 class="head_title">You have no Products. Please add products</h1></a>
   
   </div>
   
   <?php } ?>
  </div>
   
     

  <!--body end here --> 
  
  <script language="JavaScript" type="text/javascript">
  $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		startDate: '-0m',
		forceParse: 0,
        showMeridian: 1
    });
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}

 function addtabactives(val)
{
	$("#btn_chang"+val).removeClass("btn-info");
	$("#btn_chang"+val).addClass("btn-primary");
	var cnt;
    var count =<?php echo $cnt;?>;
	//var cnt='';
	for(cnt = 1; cnt <= count; cnt++){
		if(cnt!=val){
			$("#btn_chang"+cnt).removeClass("btn-primary");
			$("#btn_chang"+cnt).addClass("btn-info");
		}             
	}
			

}
function addtabactive(id)
{
	$("#gry"+id).addClass("active");
	var cnt;
    var nt =<?php echo $cnt;?>;
	//var cnt='';
	for(cnt = 1; cnt <= nt; cnt++){
		if(cnt!=id){
			$("#gry"+cnt).removeClass("active");
		}             
	}
			

}

function checkDelete(id)
{
  
return confirm('Are you sure want to delete "'+id +'" product?');
}
  function saveeditchanges(subcatid,item_id,name,val){
	  var cost='';
	  var specialcost='';
	  var cost=$('#product_cost'+subcatid).val();
	  var specialcost=$('#product_special'+subcatid).val();
	  if(specialcost==''|| specialcost==0){
		alert('special price is required');return false;  
	  }if(cost=='' || cost==0){
		  alert('item price is required');return false;  
	  }
	  if(Number(cost) > Number(specialcost)){
		  jQuery.ajax({
			url: "<?php echo base_url('/seller/products/ajaxeditchanges');?>",
			data: {
				form_key : window.FORM_KEY,
				item_id: item_id,
				valuename: name,
				value: val,
				},
			type: "POST",
			format:"json",
					success:function(data){
					var parsedData = JSON.parse(data);
					if(Number(cost) > Number(specialcost)){
					$('#product_cost'+subcatid).val(parsedData.cost);
					$('#product_special'+subcatid).val(parsedData.special_cost);
					}
					}
        });
		  
	  }else{
		   alert('special price must be less than price');return false;
		}
  }
</script>
</section>
  </div> 
  </div>