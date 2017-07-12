<div class="content-wrapper" >
   	<section class="content-header">
      <h1>Sellers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Seller Names</a></li>
      </ol>
    </section>
    <section class="content">
      	<div class="row">
        	<div class="col-xs-12">        
	      		<div class="box">
	            	<div class="box-header">
	              	<h3 class="box-title">Home Banners</h3>
	            	</div>            
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
		              		<?php if( $banners['status']=='' || $banners['status']=='0' ){echo "Red";} else{echo "Blue";}?>" data-toggle="modal" data-target="#myModal" onclick="deactive('<?php echo base64_encode(htmlentities($banners['id'])).'__'.base64_encode(htmlentities($banners['seller_id'])).'__'.base64_encode(htmlentities($banners['status']));?>');" href="javascript:void(0)" style="text-decoration:none;" id="view" ><?php if(htmlentities($banners['status'])==0){ echo "Deactive";}else{ echo "Active";} ?></a>
						</td>
		                </tr>                
		                  <?php } ?>        
		                </tbody>                
		              </table>  
	            	</div>            
	          	</div>
        	</div>
        </div>
    </section>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#addbanner').bootstrapValidator({       
        fields: {
           
			home_banner: {
				validators: {
					 notEmpty: {
						message: 'Banner is required'
					},  
					regexp: {
					regexp: /\.(jpe?g|png)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG files are allowed'
					}
				}
			},
        }
    });
});

function deactive(id){
$(".popid").attr("href","<?php echo base_url('inventory/banner_active'); ?>"+"?id="+id);
}
</script>