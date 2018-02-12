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
		
		 <a style="margin:3px" id="btn_chang<?php echo $kk;?>" onclick="addtabactive(<?php echo $kk;?>);addtabactives(<?php echo $kk;?>);" href="#gry<?php echo $catitem_data1->category_id;   ?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a>

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
					<?php if($subcategory->subcategory_id==226 || $subcategory->subcategory_id==227 || $subcategory->subcategory_id==228 || $subcategory->subcategory_id==229 || $subcategory->subcategory_id==230 || $subcategory->subcategory_id==231){ ?>
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
					<?php }else if($subcategory->subcategory_id==41 || $subcategory->subcategory_id==42 || $subcategory->subcategory_id==43 || $subcategory->subcategory_id==44 || $subcategory->subcategory_id==45 || $subcategory->subcategory_id==95 || $subcategory->subcategory_id==96 || $subcategory->subcategory_id==97 || $subcategory->subcategory_id==98 || $subcategory->subcategory_id==99 || $subcategory->subcategory_id==100 || $subcategory->subcategory_id==101 || $subcategory->subcategory_id==102){ ?>
					   <th>Ingredients</th>
					   <th>Key Features</th>
					   <th>Unit</th>
					   <th>Packaging Type</th>
					<?php }else if($subcategory->subcategory_id==132 || $subcategory->subcategory_id==142 || $subcategory->subcategory_id==144 || $subcategory->subcategory_id==220 || $subcategory->subcategory_id==221 || $subcategory->subcategory_id==222){ ?>
						<th>Color</th>
						<th>Type</th>
						<th>Waterproof</th>
						<th>Laptop Compartment</th>
						<th>Number Lock Mechanism</th>
						<th>Closure</th>
						<th>Wheels</th>
						<th>No of Copartments</th>
					   <th>No of Pockets</th>
					   <th>Inner Material</th>
					   <th>Outer Material</th>
					   <th>Product Dimension </th>
					   <th>Ideal For</th>
					<?php }else if($subcategory->subcategory_id==128 || $subcategory->subcategory_id==129 || $subcategory->subcategory_id==130 || $subcategory->subcategory_id==140 || $subcategory->subcategory_id==232 || $subcategory->subcategory_id==233){ ?>
						<th>Style Code</th>
						<th>Color</th>
						<th>Size</th>
						<th>Material</th>
						<th>Type</th>
						<th>Sole Material</th>
						<th>Fastening</th>
					   <th>Toe Shape</th>
					   <th>EAN/UPC</th>
					<?php } else if($subcategory->subcategory_id==123 || $subcategory->subcategory_id==125 || $subcategory->subcategory_id==126 || $subcategory->subcategory_id==127 || $subcategory->subcategory_id==136 || $subcategory->subcategory_id==137 || $subcategory->subcategory_id==138){ ?>
						<th>Size</th>
						<th>Color</th>
						<th>Occasion</th>
						<th>Material</th>
						<th>Wash Care</th>
						<th>Style Code</th>
						<th>Look</th>
					    <th>Collar Type</th>
					    <th>Sleeve</th>
					    <th>Fit</th>
					    <th>Pattern</th>
					    <th>Gender</th>
					<?php }else if($subcategory->subcategory_id==124){ ?>
						<th>Size</th>
						<th>Color</th>
						<th>Occasion</th>
						<th>Material</th>
						<th>Wash Care</th>
						<th>Style Code</th>
						<th>Set Contents</th>
					    <th>Gender</th>
					<?php }else if($subcategory->subcategory_id==135 || $subcategory->subcategory_id==139){ ?>
						<th>Size</th>
						<th>Color</th>
						<th>Occasion</th>
						<th>Material</th>
						<th>Wash Care</th>
						<th>Style Code</th>
						<th>Look</th>
					    <th>Collar Type</th>
					    <th>Sleeve</th>
					    <th>Fit</th>
					    <th>Type</th>
					    <th>Neck Type</th>
					    <th>Length</th>
					    <th>Pockets</th>
					    <th>Blouse Length</th>
					    <th>Saree Length</th>
					<?php }else if($subcategory->subcategory_id==111){ ?>
						<th>Model Series</th>
						<th>Installation</th>
						<th>Warranty card</th>
						<th>Type</th>
						<th>Functions</th>
						<th>Printer Type</th>
						<th>Interface</th>
					    <th>Printer Output</th>
					    <th>Model ID</th>
					    <th>Max Print Resolution</th>
					    <th>Max Print Speed</th>
					    <th>Scanner Type</th>
					    <th>Max Document Size</th>
					    <th>Optical Scanning Resolution</th>
					    <th>Maximum Copies From Standalone</th>
					    <th>Maximum Copy Size</th>
					    <th>ISO 29183, A4, Simplex</th>
					    <th>Noise Level</th>
					    <th>Paper Hold Input Capacity</th>
					    <th>Paper Hold OutPut Capacity</th>
					    <th>Paper Size</th>
					    <th>Print Margin</th>
					    <th>Standby</th>
					    <th>Operating Temperature Range</th>
					    <th>Power Requirement</th>
					    <th>Frequency</th>
					<?php }else  if($subcategory->subcategory_id==107){ ?>
						<th>Processor</th>
						<th>Series</th>
						<th>Part Number</th>
						<th>Operating System</th>
						<th>RAM</th>
						<th>HDD Capacity</th>
						<th>Screen Size</th>
						<th>Colour</th>
						<th>Model Name</th>
						<th>ProcessorBrand</th>
						<th>Variant</th>
						<th>Chipset</th>
						<th>Clock Speed</th>
						<th>Cache</th>
						<th>Screen Type</th>
						<th>Resolution</th>
						<th>Graphic Processor</th>
						<th>Memory Slots</th>
						<th>RPM</th>
						<th>Optical Drive</th>
						<th>Wireless WAN</th>
						<th>Ethernet</th>
						<th>VGA Port</th>
						<th>USB Port</th>
						<th>HDMI Port</th>
						<th>Multi Card Slot</th>
						<th>Web Camera</th>
						<th>Keyboard</th>
						<th>Speakers</th>
						<th>Mic In</th>
						<th>Power Supply</th>
						<th>Battery Backup</th>
						<th>Battery Cell</th>
						<th>Dimension</th>
						<th>Weight</th>
						<th>Adapter</th>
						<th>Office</th>
						<th>Fingerprint Point</th>
					  <?php }else  if($subcategory->subcategory_id==219){ ?>
						<th>Total Power Output RMS (W)</th>
						<th>Sound System</th>
						<th>Speaker driver</th>
						<th>Power</th>
						<th>Battery type</th>
						<th>USB Ports</th>
						<th>Headphone Jack</th>
						<th>Bluetooth</th>
						<th>Wired/Wireless</th>
						<th>Bluetooth range</th>
						<th>Compatible Devices</th>
						<th>Product weight</th>
					  <?php }else if($subcategory->subcategory_id==109){ ?>
						<th>Colour</th>
						<th>Minimum f/stop</th>
						<th>Picture Angle with Nikon DX Format</th>
						<th>Type</th>
						<th>Model Name</th>
						<th>Minimum Focusing Distance</th>
						<th>Aperture With Max Focal Length</th>
						<th>Aperture With Min Focal Length</th>
						<th>Maximum Focal Length</th>
						<th>Maximum Reproduction Ratio</th>
						<th>Lens Construction (Elements/Groups)</th>
						<th>Lens Hood</th>
						<th>Lens Case</th>
						<th>Lens Cap</th>
						<th>Filter Attachment Size</th>
						<th>Other Features</th>
						<th>Dimension</th>
						<th>Weight</th>
					  <?php }else if($subcategory->subcategory_id==237){ ?>
						<th>Size</th>
					  	<th>Color</th>
					  	<th>Writer Type</th>
					  	<th>Form Factor</th>
					  	<th>Model Name</th>
					  	<th>Model ID</th>
					  <?php }else if($subcategory->subcategory_id==238){ ?>
						<th>Size</th>
					  	<th>Color</th>
					  	<th>Connector 1</th>
					  	<th>Connector 2</th>
					  	<th>Model Name</th>
					  	<th>Model ID</th>
					  	<th>type</th> 
						<?php }else if($subcategory->subcategory_id==239){ ?>
						<th>Portable</th>
					  	<th>Maximum Brightness</th>
					  	<th>Projection Ratio 1</th>
					  	<th>Contrast Ratio</th>
					  	<th>Model Name</th>
					  	<th>Model ID</th>
					  	<th>Output Per Speaker</th>
					  	<th>Power Supply</th>
					  	<th>Power Consumption</th>
					  	<th>Minimum Operating Temperature</th>
					  	<th>Maximum Operting Temperature</th>
					  	<th>Remote Control </th>
					  	<th>Weight</th>
					  <?php }else if($subcategory->subcategory_id==244){ ?>
							<th>Color</th>
							<th>useage</th>
							<th>Type</th>
							<th>Noise Reduction</th>
							<th>Connectivity</th>
							<th>Headphone Jack</th>
							<th>Microphone</th>
							<th>Weight</th>
							<th>Other Features</th>
							<th>Compatible For</th>
					  <?php }else if($subcategory->subcategory_id==243){ ?>
							<th>Size</th>
							<th>Color</th>
							<th>Type</th>
							<th>Weight</th>
							<th>Model Name</th>
							<th>Model ID</th>
							<th>Series</th>
							<th>Voltage Range</th>
							<th>Maximum Turbo Speed</th>
							<th>Integrated Graphics</th>
					   <?php }else if($subcategory->subcategory_id==113){ ?>
							<th>Size</th>
							<th>Color</th>
							<th>Device Type</th>
							<th>Weight</th>
							<th>Model Name</th>
							<th>Model ID</th>
							<th>Capacity</th>
							<th>DATA Rate</th>
							<th>Technology</th>
					   <?php }else if($subcategory->subcategory_id==245){ ?>
							<th>Size</th>
							<th>Color</th>
							<th>Type</th>
							<th>Weight</th>
							<th>Model Name</th>
							<th>Model ID</th>
							<th>Motherboard Series</th>
							<th>External Drive Bays</th>
							<th>Internal Drive Bays</th>
							<th>Front USB Port</th>
							<th>Front USB / Mic Port</th>
					    <?php }else if($subcategory->subcategory_id==246){ ?>
							<th>Size</th>
							<th>Color</th>
							<th>Type</th>
							<th>Weight</th>
							<th>Model Name</th>
							<th>Model ID</th>
							<th>Input Voltage</th>
							<th>Output Voltage</th>
							<th>Input Frequency</th>
							<th>Output Frequency</th>
							<th>Output Power Wattage</th>
							<th>Capacity</th>
							<th>Dimensions</th>
					  <?php }else { ?>
					  	<th>Size</th>
					  	<th>Color</th>
					  	<th>Type</th>
					  	<th>Weight</th>
					  	<th>Model Name</th>
					  	<th>Model ID</th>
					  	<th>useage</th>
					  <?php } ?>
					
						<th>Offer Amount</th>
						<th>Combo offer item Name</th>
						<th>Offer expiry Date and Time</th>
						<th>Status</th>
						<th>Return Policy</th>
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
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','name',this.value)" name="name" value="<?php echo $item_data->name;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_code',this.value)" name="product_code" value="<?php echo $item_data->product_code;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_cost',this.value)" name="product_cost" id="product_cost<?php echo $subcategory->subcategory_id;?>" value="<?php echo $item_data->item_cost;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_special',this.value)" name="product_special" id="product_special<?php echo $subcategory->subcategory_id;?>" value="<?php echo $item_data->special_price;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','qty',this.value)" name="qty" value="<?php echo $item_data->item_quantity;?>"/></td>
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','brand',this.value)" name="brand" value="<?php echo $item_data->brand;?>"/></td>
							<?php if($item_data->subcategory_id==226 || $item_data->subcategory_id==227 || $item_data->subcategory_id==228 || $item_data->subcategory_id==229 || $item_data->subcategory_id==230 || $item_data->subcategory_id==231){ ?>
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
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','internal_memeory',this.value)" name="internal_memeory" value="<?php echo $item_data->internal_memeory;?>"/></td>
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
								
							<?php }else if($item_data->subcategory_id==41 || $item_data->subcategory_id==42 || $item_data->subcategory_id==43 || $item_data->subcategory_id==44 || $item_data->subcategory_id==45 || $item_data->subcategory_id==95 || $item_data->subcategory_id==96 || $item_data->subcategory_id==97 || $item_data->subcategory_id==98 || $item_data->subcategory_id==99 || $item_data->subcategory_id==100 || $item_data->subcategory_id==101 || $item_data->subcategory_id==102){ ?>

								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ingredients',this.value)" name="ingredients" value="<?php echo $item_data->ingredients;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','service_type',this.value)" name="service_type" value="<?php echo $item_data->service_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','unit',this.value)" name="unit" value="<?php echo $item_data->unit;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','packingtype',this.value)" name="packingtype" value="<?php echo $item_data->packingtype;?>"/></td>
								
							<?php }else if($item_data->subcategory_id==132 || $item_data->subcategory_id==142 || $item_data->subcategory_id==144 || $item_data->subcategory_id==220 || $item_data->subcategory_id==221 || $item_data->subcategory_id==222){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','waterproof',this.value)" name="waterproof" value="<?php echo $item_data->waterproof;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','laptop_compartment',this.value)" name="laptop_compartment" value="<?php echo $item_data->laptop_compartment;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','focus_lock',this.value)" name="focus_lock" value="<?php echo $item_data->focus_lock;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','closure',this.value)" name="closure" value="<?php echo $item_data->closure;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wheels',this.value)" name="wheels" value="<?php echo $item_data->wheels;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','no_of_copartments',this.value)" name="no_of_copartments" value="<?php echo $item_data->no_of_copartments;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','no_of_pockets',this.value)" name="no_of_pockets" value="<?php echo $item_data->no_of_pockets;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','inner_material',this.value)" name="inner_material" value="<?php echo $item_data->inner_material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sole_material',this.value)" name="sole_material" value="<?php echo $item_data->sole_material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','product_dimension',this.value)" name="product_dimension" value="<?php echo $item_data->product_dimension;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ideal_for',this.value)" name="ideal_for" value="<?php echo $item_data->ideal_for;?>"/></td>

							<?php }else if($item_data->subcategory_id==128 || $item_data->subcategory_id==129 || $item_data->subcategory_id==130 || $item_data->subcategory_id==140 || $item_data->subcategory_id==232 || $item_data->subcategory_id==233){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','style_code',this.value)" name="style_code" value="<?php echo $item_data->style_code;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','material',this.value)" name="material" value="<?php echo $item_data->material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sole_material',this.value)" name="sole_material" value="<?php echo $item_data->sole_material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','fastening',this.value)" name="fastening" value="<?php echo $item_data->fastening;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','toe_shape',this.value)" name="toe_shape" value="<?php echo $item_data->toe_shape;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ean_upc',this.value)" name="ean_upc" value="<?php echo $item_data->ean_upc;?>"/></td>
							<?php }else if($item_data->subcategory_id==123 || $item_data->subcategory_id==125 || $item_data->subcategory_id==126 || $item_data->subcategory_id==127 || $item_data->subcategory_id==136 || $item_data->subcategory_id==137 || $item_data->subcategory_id==138){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','occasion',this.value)" name="occasion" value="<?php echo $item_data->occasion;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','material',this.value)" name="material" value="<?php echo $item_data->material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wash_care',this.value)" name="wash_care" value="<?php echo $item_data->wash_care;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','style_code',this.value)" name="style_code" value="<?php echo $item_data->style_code;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','look',this.value)" name="look" value="<?php echo $item_data->look;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','collar_type',this.value)" name="collar_type" value="<?php echo $item_data->collar_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sleeve',this.value)" name="sleeve" value="<?php echo $item_data->sleeve;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','fit',this.value)" name="fit" value="<?php echo $item_data->fit;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','pattern',this.value)" name="pattern" value="<?php echo $item_data->pattern;?>"/></td>
								<td>
									<select id="status" onchange="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','gender',this.value)" >
									<?php if($item_data->gender == 'Male') {?>
									<option value="Male"selected>Male</option>
									<option value="Female">Female</option>
									<?php }else if($item_data->gender == 'Female'){  ?>
									<option value="Male">Male</option>
									<option value="Female" selected>Female</option>
									<?php } ?>						
									</select>
								</td>
							<?php }else if($item_data->subcategory_id==124){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','occasion',this.value)" name="occasion" value="<?php echo $item_data->occasion;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','material',this.value)" name="material" value="<?php echo $item_data->material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wash_care',this.value)" name="wash_care" value="<?php echo $item_data->wash_care;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','style_code',this.value)" name="style_code" value="<?php echo $item_data->style_code;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','set_contents',this.value)" name="set_contents" value="<?php echo $item_data->set_contents;?>"/></td>
								<td>
									<select id="status" onchange="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','gender',this.value)" >
									<?php if($item_data->gender == 'Male') {?>
									<option value="Male"selected>Male</option>
									<option value="Female">Female</option>
									<?php }else if($item_data->gender == 'Female'){  ?>
									<option value="Male">Male</option>
									<option value="Female" selected>Female</option>
									<?php } ?>						
									</select>
								</td>
							<?php } else if($item_data->subcategory_id==135 ||$item_data->subcategory_id==139){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','occasion',this.value)" name="occasion" value="<?php echo $item_data->occasion;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','material',this.value)" name="material" value="<?php echo $item_data->material;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wash_care',this.value)" name="wash_care" value="<?php echo $item_data->wash_care;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','style_code',this.value)" name="style_code" value="<?php echo $item_data->style_code;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','look',this.value)" name="look" value="<?php echo $item_data->look;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','collar_type',this.value)" name="collar_type" value="<?php echo $item_data->collar_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sleeve',this.value)" name="sleeve" value="<?php echo $item_data->sleeve;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','fit',this.value)" name="fit" value="<?php echo $item_data->fit;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','neck_type',this.value)" name="neck_type" value="<?php echo $item_data->neck_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','length',this.value)" name="length" value="<?php echo $item_data->length;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','pockets',this.value)" name="pockets" value="<?php echo $item_data->pockets;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','blouse_length',this.value)" name="blouse_length" value="<?php echo $item_data->blouse_length;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','saree_length',this.value)" name="saree_length" value="<?php echo $item_data->saree_length;?>"/></td>
								
							<?php }else if($item_data->subcategory_id==111){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_series',this.value)" name="model_series" value="<?php echo $item_data->model_series;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','installation',this.value)" name="installation" value="<?php echo $item_data->installation;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','warranty_card',this.value)" name="warranty_card" value="<?php echo $item_data->warranty_card;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','functions',this.value)" name="functions" value="<?php echo $item_data->functions;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','printer_type',this.value)" name="printer_type" value="<?php echo $item_data->printer_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','interface',this.value)" name="interface" value="<?php echo $item_data->interface;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','printer_output',this.value)" name="printer_output" value="<?php echo $item_data->printer_output;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','max_print_resolution',this.value)" name="max_print_resolution" value="<?php echo $item_data->max_print_resolution;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','print_speed',this.value)" name="print_speed" value="<?php echo $item_data->print_speed;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','scanner_type',this.value)" name="scanner_type" value="<?php echo $item_data->scanner_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','document_size',this.value)" name="document_size" value="<?php echo $item_data->document_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','scanning_resolution',this.value)" name="scanning_resolution" value="<?php echo $item_data->scanning_resolution;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','copies_from',this.value)" name="copies_from" value="<?php echo $item_data->copies_from;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','copy_size',this.value)" name="copy_size" value="<?php echo $item_data->copy_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','iso_29183',this.value)" name="iso_29183" value="<?php echo $item_data->iso_29183;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','noise_level',this.value)" name="noise_level" value="<?php echo $item_data->noise_level;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','paper_hold_input',this.value)" name="paper_hold_input" value="<?php echo $item_data->paper_hold_input;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','paper_hold_output',this.value)" name="paper_hold_output" value="<?php echo $item_data->paper_hold_output;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','paper_size',this.value)" name="paper_size" value="<?php echo $item_data->paper_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','print_margin',this.value)" name="print_margin" value="<?php echo $item_data->print_margin;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','standby',this.value)" name="standby" value="<?php echo $item_data->standby;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','operating_temperature_range',this.value)" name="operating_temperature_range" value="<?php echo $item_data->operating_temperature_range;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','power',this.value)" name="power" value="<?php echo $item_data->power;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','frequency',this.value)" name="frequency" value="<?php echo $item_data->frequency;?>"/></td>
								
							<?php }else if($item_data->subcategory_id==107){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','Processor',this.value)" name="Processor" value="<?php echo $item_data->Processor;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','series',this.value)" name="series" value="<?php echo $item_data->series;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','part_number',this.value)" name="part_number" value="<?php echo $item_data->part_number;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','os',this.value)" name="os" value="<?php echo $item_data->os;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ram',this.value)" name="ram" value="<?php echo $item_data->ram;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','hdd_capacity',this.value)" name="hdd_capacity" value="<?php echo $item_data->compatible_for;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','screen_size',this.value)" name="screen_size" value="<?php echo $item_data->screen_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','processorbrand',this.value)" name="processorbrand" value="<?php echo $item_data->processorbrand;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','variant',this.value)" name="variant" value="<?php echo $item_data->variant;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','chipset',this.value)" name="chipset" value="<?php echo $item_data->chipset;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','clock_speed',this.value)" name="clock_speed" value="<?php echo $item_data->clock_speed;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','cache',this.value)" name="cache" value="<?php echo $item_data->cache;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','screen_type',this.value)" name="screen_type" value="<?php echo $item_data->screen_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','resolution',this.value)" name="resolution" value="<?php echo $item_data->resolution;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','graphic_processor',this.value)" name="graphic_processor" value="<?php echo $item_data->graphic_processor;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','memory_slots',this.value)" name="memory_slots" value="<?php echo $item_data->memory_slots;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','rpm',this.value)" name="rpm" value="<?php echo $item_data->rpm;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','optical_drive',this.value)" name="optical_drive" value="<?php echo $item_data->optical_drive;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wan',this.value)" name="wan" value="<?php echo $item_data->wan;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','ethernet',this.value)" name="ethernet" value="<?php echo $item_data->ethernet;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','vgaport',this.value)" name="vgaport" value="<?php echo $item_data->vgaport;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','usb_port',this.value)" name="usb_port" value="<?php echo $item_data->usb_port;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','hdmi_port',this.value)" name="hdmi_port" value="<?php echo $item_data->hdmi_port;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','multi_card_slot',this.value)" name="multi_card_slot" value="<?php echo $item_data->multi_card_slot;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','web_camera',this.value)" name="web_camera" value="<?php echo $item_data->web_camera;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','keyboard',this.value)" name="keyboard" value="<?php echo $item_data->keyboard;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','speakers',this.value)" name="speakers" value="<?php echo $item_data->speakers;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','mic_in',this.value)" name="mic_in" value="<?php echo $item_data->mic_in;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','power_supply',this.value)" name="power_supply" value="<?php echo $item_data->power_supply;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','battery_backup',this.value)" name="battery_backup" value="<?php echo $item_data->battery_backup;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','battery_cell',this.value)" name="battery_cell" value="<?php echo $item_data->battery_cell;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','dimension',this.value)" name="dimension" value="<?php echo $item_data->dimension;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','adapter',this.value)" name="adapter" value="<?php echo $item_data->adapter;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','office',this.value)" name="office" value="<?php echo $item_data->office;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','fingerprint_point',this.value)" name="fingerprint_point" value="<?php echo $item_data->fingerprint_point;?>"/></td>
							<?php }else if($item_data->subcategory_id==219){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','total_power_output',this.value)" name="total_power_output" value="<?php echo $item_data->total_power_output;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','sound_system',this.value)" name="sound_system" value="<?php echo $item_data->sound_system;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','speaker_driver',this.value)" name="speaker_driver" value="<?php echo $item_data->speaker_driver;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','power',this.value)" name="power" value="<?php echo $item_data->power;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','battery_type',this.value)" name="battery_type" value="<?php echo $item_data->battery_type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','usb_port',this.value)" name="usb_port" value="<?php echo $item_data->usb_port;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','headphone_jack',this.value)" name="headphone_jack" value="<?php echo $item_data->headphone_jack;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','bluetooth',this.value)" name="bluetooth" value="<?php echo $item_data->bluetooth;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','wired_wireless',this.value)" name="wired_wireless" value="<?php echo $item_data->wired_wireless;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','bluetooth_range',this.value)" name="bluetooth_range" value="<?php echo $item_data->bluetooth_range;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','compatible_for',this.value)" name="compatible_for" value="<?php echo $item_data->compatible_for;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
							<?php }else if($item_data->subcategory_id==109){ ?>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','f_stop',this.value)" name="f_stop" value="<?php echo $item_data->f_stop;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','picture_angle',this.value)" name="picture_angle" value="<?php echo $item_data->picture_angle;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','minimum_focusing_distance',this.value)" name="minimum_focusing_distance" value="<?php echo $item_data->minimum_focusing_distance;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','aperture_withmaxfocal_length',this.value)" name="aperture_withmaxfocal_length" value="<?php echo $item_data->aperture_withmaxfocal_length;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','aperture_with_minfocal_length',this.value)" name="aperture_with_minfocal_length" value="<?php echo $item_data->aperture_with_minfocal_length;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','maximum_focal_length',this.value)" name="maximum_focal_length" value="<?php echo $item_data->maximum_focal_length;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','maximum_reproduction_ratio',this.value)" name="maximum_reproduction_ratio" value="<?php echo $item_data->maximum_reproduction_ratio;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','lens_construction',this.value)" name="lens_construction" value="<?php echo $item_data->lens_construction;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','lens_hood',this.value)" name="lens_hood" value="<?php echo $item_data->lens_hood;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','lens_case',this.value)" name="lens_case" value="<?php echo $item_data->lens_case;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','lens_cap',this.value)" name="lens_cap" value="<?php echo $item_data->lens_cap;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','filter_attachment_size',this.value)" name="filter_attachment_size" value="<?php echo $item_data->filter_attachment_size;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','other_camera_features',this.value)" name="other_camera_features" value="<?php echo $item_data->other_camera_features;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','dimension',this.value)" name="dimension" value="<?php echo $item_data->dimension;?>"/></td>
								<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
							<?php }else if($item_data->subcategory_id==237){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','factor',this.value)" name="factor" value="<?php echo $item_data->factor;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
							<?php }else if($item_data->subcategory_id==238){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','connector1',this.value)" name="connector1" value="<?php echo $item_data->connector1;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','connector2',this.value)" name="connector2" value="<?php echo $item_data->connector2;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
							<?php }else if($item_data->subcategory_id==239){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','portable',this.value)" name="portable" value="<?php echo $item_data->portable;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','maximumbrightness',this.value)" name="maximumbrightness" value="<?php echo $item_data->maximumbrightness;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','projectionratio',this.value)" name="projectionratio" value="<?php echo $item_data->projectionratio;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','contrastratio',this.value)" name="contrastratio" value="<?php echo $item_data->contrastratio;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','outputperspeaker',this.value)" name="outputperspeaker" value="<?php echo $item_data->outputperspeaker;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','powersupply',this.value)" name="powersupply" value="<?php echo $item_data->powersupply;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','powerconsumption',this.value)" name="powerconsumption" value="<?php echo $item_data->powerconsumption;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','minopertingtemperature',this.value)" name="minopertingtemperature" value="<?php echo $item_data->minopertingtemperature;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','maxopertingtemperature',this.value)" name="maxopertingtemperature" value="<?php echo $item_data->maxopertingtemperature;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','remotecontrol',this.value)" name="remotecontrol" value="<?php echo $item_data->remotecontrol;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
							<?php }else if($item_data->subcategory_id==244){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','useage',this.value)" name="useage" value="<?php echo $item_data->useage;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','noise_reduction',this.value)" name="noise_reduction" value="<?php echo $item_data->noise_reduction;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','connectivity',this.value)" name="connectivity" value="<?php echo $item_data->connectivity;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','headphone_jack',this.value)" name="headphone_jack" value="<?php echo $item_data->headphone_jack;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','microphone',this.value)" name="microphone" value="<?php echo $item_data->microphone;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','compatible_for',this.value)" name="compatible_for" value="<?php echo $item_data->compatible_for;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','other_camera_features',this.value)" name="other_camera_features" value="<?php echo $item_data->other_camera_features;?>"/></td>
							<?php }else if($item_data->subcategory_id==243){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','series',this.value)" name="series" value="<?php echo $item_data->series;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','voltagerange',this.value)" name="voltagerange" value="<?php echo $item_data->voltagerange;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','turbospeed',this.value)" name="turbospeed" value="<?php echo $item_data->turbospeed;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','graphics',this.value)" name="graphics" value="<?php echo $item_data->graphics;?>"/></td>
							<?php }else if($item_data->subcategory_id==113){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','capacity',this.value)" name="capacity" value="<?php echo $item_data->capacity;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','datarate',this.value)" name="datarate" value="<?php echo $item_data->datarate;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','technology',this.value)" name="technology" value="<?php echo $item_data->technology;?>"/></td>
							<?php }else if($item_data->subcategory_id==245){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','series',this.value)" name="series" value="<?php echo $item_data->series;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','externaldrivebays',this.value)" name="externaldrivebays" value="<?php echo $item_data->externaldrivebays;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','internaldrivebays',this.value)" name="internaldrivebays" value="<?php echo $item_data->internaldrivebays;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','usb_port',this.value)" name="usb_port" value="<?php echo $item_data->usb_port;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','micport',this.value)" name="micport" value="<?php echo $item_data->micport;?>"/></td>
							<?php }else if($item_data->subcategory_id==246){ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','inputvoltage',this.value)" name="inputvoltage" value="<?php echo $item_data->inputvoltage;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','outputvoltage',this.value)" name="outputvoltage" value="<?php echo $item_data->outputvoltage;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','inputfrequency',this.value)" name="inputfrequency" value="<?php echo $item_data->inputfrequency;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','operating_frequency',this.value)" name="operating_frequency" value="<?php echo $item_data->operating_frequency;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','power',this.value)" name="power" value="<?php echo $item_data->power;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','battery_capacity',this.value)" name="battery_capacity" value="<?php echo $item_data->battery_capacity;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','dimension',this.value)" name="dimension" value="<?php echo $item_data->dimension;?>"/></td>
							<?php }else{ ?>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','size',this.value)" name="size" value="<?php echo $item_data->size;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','colour',this.value)" name="colour" value="<?php echo $item_data->colour;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','type',this.value)" name="type" value="<?php echo $item_data->type;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','weight',this.value)" name="weight" value="<?php echo $item_data->weight;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_name',this.value)" name="model_name" value="<?php echo $item_data->model_name;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','model_id',this.value)" name="model_id" value="<?php echo $item_data->model_id;?>"/></td>
									<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','useage',this.value)" name="useage" value="<?php echo $item_data->useage;?>"/></td>
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
						<td><input type="text" onkeyup="saveeditchanges('<?php echo $subcategory->subcategory_id;?>','<?php echo $item_data->item_id;?>','return_policy',this.value)" name="return_policy" value="<?php echo $item_data->return_policy;?>"/></td>

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
       "columnDefs": [
			{ "targets": 0, "orderDataType": "dom-text", "type": "string" },
			{ "targets": 1, "orderDataType": "dom-text", "type": "string" },
			{ "targets": 2, "orderDataType": "dom-text", "type": "string" },
			{ "targets": 3, "orderDataType": "dom-text", "type": "string" },
			{ "targets": 4, "orderDataType": "dom-text", "type": "string" },
			{ "targets": 5, "orderDataType": "dom-text", "type": "string" },
			{ "targets": 6, "orderDataType": "dom-text", "type": "string" }
          
        ],
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