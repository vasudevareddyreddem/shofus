<div class="content-wrapper" style="padding-top:80px;">
	 <div class="col-md-8 col-md-offset-2" >
              <!-- DIRECT CHAT -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Message Chat</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
				
				
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
				  <?php //echo '<pre>';print_r($seller_notification_details);exit; ?>
				  <?php foreach ($seller_notification_details as $notification){ ?>
					<?php if($notification['message_type']=='REPLY'){ ?>
				  <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo isset($notification['seller_name'])?$notification['seller_name']:''; ?> </span>
                        <span class="direct-chat-timestamp pull-right"><?php echo date('M j h:i A',strtotime(htmlentities($notification['created_at'])));?></span>
                      </div>
                      <!-- /.direct-chat-info -->
					  <?php if($notification['profile_pic']!=''){ ?>
					       <img class="direct-chat-img" src="<?php echo base_url('uploads/profile/'.$notification['profile_pic']); ?>" alt="<?php echo $notification['profile_pic']; ?>"><!-- /.direct-chat-img -->
					  <?php }else{ ?>
					   <img class="direct-chat-img" src="<?php echo base_url('uploads/profile/'); ?>/default.jpg" alt="Logo"><!-- /.direct-chat-img -->

					  <?php } ?>
                      <div class="direct-chat-text">
                        <?php echo $notification['seller_message']; ?>
                      </div>
                    </div>
					<?php } ?>
					<?php if($notification['message_type']=='REPLIED'){ ?>

					<div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?php echo isset($notification['cust_firstname'])?$notification['cust_firstname']:''; ?>&nbsp;<?php echo isset($notification['cust_lastname'])?$notification['cust_lastname']:''; ?></span>
                        <span class="direct-chat-timestamp pull-left"><?php echo date('M j h:i A',strtotime(htmlentities($notification['created_at'])));?></span>
                      </div>
                      <!-- /.direct-chat-info -->
						<?php if($notification['cust_propic']!=''){ ?>
					   <img class="direct-chat-img" src="<?php echo base_url('uploads/profile/'.$notification['cust_propic']); ?>" alt="<?php echo $notification['cust_propic']; ?>"><!-- /.direct-chat-img -->
						<?php }else{ ?>
					   <img class="direct-chat-img" src="<?php echo base_url('uploads/profile/'); ?>/default.jpg" alt="Logo"><!-- /.direct-chat-img -->
						<?php } ?>  
						<div class="direct-chat-text">
                        <?php echo $notification['seller_message']; ?>
                      </div>
                    </div>
					<?php } ?>
                  <?php } ?>

				  
				  
                  </div>
            

                 
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form name="sendmsg" id="sendmsg" action="<?php echo base_url('inventory/adminnotificationreply'); ?>" method="post">
                    <div class="form-group" style="padding:0">
					<div class="col-md-10" style="padding:0">
                      <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                          <input type="hidden" name="seller_id" id="seller_id"  value="<?php echo $notification['seller_id']; ?>">
					</div>
					<div class="col-md-2" style="padding:0">
						  <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">Send</button>
                          </span>
                    </div>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
			  <br>

            </div>
			<div class="clearfix"><br>
<br>
<br></div>

</div>
<script type="text/javascript">

$(document).ready(function() {
    $('#sendmsg').bootstrapValidator({
       
        fields: {
            message: {
              validators: {
					notEmpty: {
						message: 'Message is required'
					}
                   
                }
            }
        }
    });
});
</script>
