<div class="content-wrapper pad_t100">
    <!-- Content Header (Page header) -->
      <div class="container">
         <!-- Main content -->
      <div class="row">
	  <?php //echo '<pre>';print_r($category_list);exit; ?>
      <div class="box data_box_wid">
            <div class="box-header" style="border-bottom:1px solid #ddd;">
              <h3 class="box-title">Category List</h3>
              <a class="pull-right btn btn-sm btn-primary" href="<?php echo base_url('inventory/bannerpreview'); ?>" class="box-title">Preview</a>
            </div>
			
            <!-- /.box-header -->
            <div class="box-body">
				
             <?php if($this->session->flashdata('active')): ?>
						<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button><?php echo $this->session->flashdata('active');?></div>
						<?php endif; ?>
						<?php if($this->session->flashdata('deactive')): ?>
						<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button><?php echo $this->session->flashdata('deactive');?></div>
						<?php endif; ?>
						<?php if($this->session->flashdata('errormsg')): ?>
						<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button><?php echo $this->session->flashdata('errormsg');?></div>	
						<?php endif; ?>          
	              		<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>Seller ID</th> 
		                  <th>Seller Name</th>                 
		                  <th>Banner</th>
		                  <th>Action</th>              
		                </tr>
		                </thead>
		                <tbody>
		                <?php foreach($home_banner as $banners) {?> 
		                <tr>                  
		                  	<td><?php echo $banners['seller_id']; ?></td>
		                  	<td><?php echo $banners['seller_name']; ?></td>
		              		<td><img src="<?php echo base_url();?>uploads/banners/<?php  echo $banners['file_name']; ?>" width="80" height="50" /></td>
		              		<td><a  style="color: 
		              		<?php if( $banners['status']=='' || $banners['status']=='0' ){echo "Red";} else{echo "Blue";}?>" data-toggle="modal" data-target="#myModal" onclick="deactive('<?php echo base64_encode(htmlentities($banners['id'])).'__'.base64_encode(htmlentities($banners['seller_id'])).'__'.base64_encode(htmlentities($banners['status']));?>');" href="javascript:void(0)" style="text-decoration:none;" id="view" ><?php if(htmlentities($banners['status'])==0){ echo "Deactive";}else{ echo "Active";} ?></a> &nbsp;| &nbsp;

		              			<a href="javascript:void(0)" class="glyphicon glyphicon-trash"  data-toggle="modal" data-target="#myModal1" onclick="deletebanner('<?php echo base64_encode(htmlentities($banners['id'])).'__'.base64_encode(htmlentities($banners['seller_id'])).'__'.base64_encode(htmlentities($banners['status']));?>');"></a>
						</td>
		                </tr>                
		                  <?php } ?>        
		                </tbody>                
		              </table>
            </div>
            <!-- /.box-body -->
          </div>

</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">        
			Are you sure ? 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
       <a  href="/=value" class="btn btn-primary popid" style="text-decoration:none;float:right;">Save changes</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">        
			Are you sure delete? 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
       <a  href="/=value" class="btn btn-primary delid" style="text-decoration:none;float:right;">Save changes</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">


function deactive(id){
$(".popid").attr("href","<?php echo base_url('inventory/banner_active'); ?>"+"?id="+id);
}

function deletebanner(id){
$(".delid").attr("href","<?php echo base_url('inventory/banner_delete'); ?>"+"?id="+id);
}
</script>