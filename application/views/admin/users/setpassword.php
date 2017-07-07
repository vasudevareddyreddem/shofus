<div class="row setup-content ">
	<div class="col-xs-12 ">
		<div class="col-md-4 col-md-offset-4 mar_t50 ">
			<div class="well">
				 <form id="setpassword" name="setpassword" action="<?php echo base_url('admin/user/updatepassword'); ?>" method="post" >
					<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" id="password" name="password" class="form-control"/>
					</div>
					<div class="form-group">
					<label class="control-label">Confirm Password</label>
					<input type="password" id="confirmpassword"  name="confirmpassword" class="form-control"  />
					</div>
					<button type="submit" id="resubmit" class="btn btn-primary btn-info" value="Next"> Set Password</button>
				</form>
			</div>
		</div>
	</div>
</div>