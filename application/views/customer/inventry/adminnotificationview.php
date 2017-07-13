<div class="content-wrapper" style="padding-top:80px;">
	 <div class="col-md-8 col-md-offset-2">
              <!-- DIRECT CHAT -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Notification Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
				
				
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
				  <?php foreach ($seller_notification_details as $notification){ ?>
					<?php if($notification['message_type']=='REPLY'){ ?>
				  <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">bayapu</span>
                        <span class="direct-chat-timestamp pull-right"><?php echo date('M j h:i A',strtotime(htmlentities($notification['created_at'])));?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="https://lh3.googleusercontent.com/-kMEBuGZ4uhQ/AAAAAAAAAAI/AAAAAAAAAAA/AI6yGXxn6Hg1jK9kYf_HvY91K3CaSNTDVA/s32-c-mo/photo.jpg" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php echo $notification['seller_message']; ?>
                      </div>
                    </div>
					<?php } ?>
					<?php if($notification['message_type']=='REPLIED'){ ?>

					<div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">vasu deva</span>
                        <span class="direct-chat-timestamp pull-left"><?php echo date('M j h:i A',strtotime(htmlentities($notification['created_at'])));?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="https://lh5.googleusercontent.com/-5ZIgyZg9UwQ/AAAAAAAAAAI/AAAAAAAACe4/Lo7IJZ56_EY/s32-c-k-no/photo.jpg" alt="message user image"><!-- /.direct-chat-img -->
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
                    <div class="input-group">
                      <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                          <input type="hidden" name="seller_id" id="seller_id"  value="<?php echo $notification['seller_id']; ?>">
						  <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">Send</button>
                          </span>
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
