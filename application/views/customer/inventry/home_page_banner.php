

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

            <!-- /.box-header -->
            <div class="box-body">
            <?php if($this->session->flashdata('sucesmsg')): ?>
					<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button><?php echo $this->session->flashdata('sucesmsg');?></div>
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
              		<td><a onclick="deactive('<?php echo base64_encode(htmlentities($banners['seller_id'])).'__'.base64_encode(htmlentities($banners['status']));?>');" href="javascript:void(0)" style="text-decoration:none;" id="view" data-toggle="modal"  data-target="#exampleFormModal"><?php if(htmlentities($banners['status'])==0){ echo "Deactivate";}else{ echo "Activate";} ?></a>
				</td>
                </tr>
                  <?php } ?>        
                </tbody>                
              </table>  
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </section>
<div tabindex="-1" role="dialog" aria-labelledby="exampleFormModalLabel" id="exampleFormModal" class="modal fade" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-content" style="margin:27px;">
			<div class="modal-header">
			  <button aria-label="Close" data-dismiss="modal" class="close" type="button">
				<span aria-hidden="true">×</span>
			  </button>
			  <h4 id="exampleFormModalLabel" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="/=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
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
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
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