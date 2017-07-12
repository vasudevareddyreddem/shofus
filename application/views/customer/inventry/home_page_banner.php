

<div class="content-wrapper">
    <div class="container">
		<form name="addbanner" id="addbanner" action="<?php echo base_url(); ?>" 
			method="post" enctype="multipart/form-data">
			<div class="form-group nopaddingRight col-md-6 san-lg">
                <label for="exampleInputFile">Banner</label>
                <input type="file" name="picture_one" id="picture_one">
			</div>                                         
            <div class="clearfix"></div>
			<div style="margin-top: 20px; margin-left: 15px;">
	            <button type="submit" class="btn btn-primary" >Submit</button>
	            <button type="submit" class="btn btn-danger" onclick="window.location='<?php echo base_url(); ?>inventory/dashboard';return false;">Cancel</button>
			</div>
        </form>
	</div>
</div>