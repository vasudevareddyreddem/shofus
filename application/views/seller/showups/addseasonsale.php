<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.css">

<script src="<?php echo base_url();?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/datatable/base/jquery-ui.css">
<script src="<?php echo base_url();?>assets/vendor/datatable/jquery-ui.js"></script>
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
	.ui-datepicker-calendar{
		padding:10px !important;
		width:300px;
		background:#fff;
	}
	tr{
		padding:10px !important;
	
	}td{
		padding:10px !important;
	
	}
	.ui-icon  {
		padding-right:20px !important;
		cursor: pointer;
		margin:10px 0px;
	}
</style>
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
			<h1>Add Offers</h1>
			<small>Season sale</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="<?php echo base_url('seller/dashboard');?>"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Season sale</li>
			</ol>
		</div>
	</section>
  <section class="content ">
  <div class="faq_main">		
  
  <div style="display:none;" class="alert dark alert-warning alert-dismissible" id="errormessage">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>							
					 </button></div>
			<?php if($this->session->flashdata('success')): ?>
			<div class="alert dark alert-success alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button><?php echo $this->session->flashdata('success');?></div>	
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>
			<div class="alert dark alert-warning alert-dismissible" id="infoMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button><?php echo $this->session->flashdata('error');?></div>	
			<?php endif; ?>
   <?php if(!empty($catitemdata))  { ?>
    <div class="container" style="width:100%">
	
      <!--<h1 class="head_title">My Listings</h1>-->
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>
	 <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq">
	   <?php  $i=1;foreach($catitemdata1 as $catitem_data1 )  {  ?> 		
		 <a id="btn_chang<?php echo $i;?>" onclick="addtabactive(<?php echo $i;?>);addtabactives(<?php echo $i;?>);" href="#gry<?php echo $i;   ?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a>

	<?php $i++;} ?>
	<a href="<?php echo base_url('seller/showups/seasonsale');?> " class="pull-right btn btn-sm btn-primary">Back</a>
        <?php  $kk=1;foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              <div class="tab-pane" id="gry<?php echo $kk; ?>">
              <?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			
			$nospace = str_replace(array(' ',';','/','_', '<','@','+','-','$',':','.','^','|','?','!','#','~', ',', '>', '&', '{', '}','(', ')', '*'), array('_'), $space);
			
			?>
              <div style="padding:10px;" class="panel panel-default mar_t10">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" onclick="sibcategoryproductlist(<?php echo $subcategory->subcategory_id;  ?>);" href="#collapseOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapseOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
		
	<form  id="frm-example<?php echo $subcategory->subcategory_id;?>" name="frm-example<?php echo $subcategory->subcategory_id;?>" action="" method="POST">
		<table id="example<?php echo $subcategory->subcategory_id;  ?>" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all<?php echo $subcategory->subcategory_id;  ?>">&nbsp;<span class="btn btn-primary">Selectall</span>
				</th>
				<div style="padding:15px 0px"><a class="btn btn-primary" data-toggle="modal" data-target="#offerspopup<?php echo $subcategory->subcategory_id;?>"   type="button">Submit</a></div>
				<th>Item Name</th>
                <th>Item Code</th>
                <th>Item Cost</th>
                <th>Affer Amount</th>
                <th>Offer Type</th>
                <th>Offer expiry Date and Time</th>                
            </tr>
        </thead>
      
             <tbody>
					<?php $k=1; 
					foreach($subcategory->docs12 as $item_data){
					//echo '<pre>';print_r($item_data);exit;	
						
						?>
					<tr>
						<td><input value="<?php echo $item_data->item_id; ?>" type="checkbox" id="cat_id[]" name="cat_id[]" ></td>
						<td><?php echo $item_data->item_name;?></td>
						<td><?php echo $item_data->item_code;?></td>
						<td><?php echo $item_data->item_cost;?></td>
						<td><?php echo $item_data->offer_amount;?></td>
						<td>
					<?php if($item_data->offer_type=='1' ){echo "Listing Discount";}
        elseif($item_data->offer_type=='2'){ ?><?php echo "Cart Discount"; ?> <?php } 
        elseif($item_data->offer_type=='3'){ ?><?php echo "Flat Price Offer";  ?> <?php }
        elseif($item_data->offer_type=='4'){ ?><?php echo "Combo Disoucnt";  ?> <?php }
        else{
          echo "NULL";
        } ?>
						</td>
						<td><?php echo $item_data->offer_expairdate;?>,&nbsp;<?php echo $item_data->offer_time;?></td>

					</tr>
				  <?php $k++; } ?>
				  </tbody>
    </table>
	
	<div class="modal fade" id="offerspopup<?php echo $subcategory->subcategory_id;?>" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header" style="background-color: #00354d;color:#fff;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="title" class="modal-title">Confirmation</h4>	
        </div>
        <div class="modal-body">
		
		<div class="form-group">
		<label class="control-label">Enter your  offer value: </label>                      
		<input type="text" class="form-control"  name="offeramount" id="offeramount<?php echo $subcategory->subcategory_id;?>">					
		</div><span style="color:red" id="offeramounterror<?php echo $subcategory->subcategory_id;?>"></span>
		<div class="modal-footer" style="border:none;">
		<div class="form-group">
		<label class="control-label pull-left">Offer Expiry Date:  
		<?php 
		$date = date('Y-m-d h:i:s');
		$date1 = strtotime($date);
		$date = strtotime("+7 day", $date1);
		echo date('Y-m-d h:i:s', $date);
		 ?>		</label>
		</div>
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
     </div>
 
 
    </div>
   </div>
     </form>
	<script type="text/javascript">
	function IsMobile<?php echo $subcategory->subcategory_id;?>(reasontype) {
        var regex = /^[0-9]+$/;
        return regex.test(reasontype);
	}
	$('#offertypeerror<?php echo $subcategory->subcategory_id;?>').html('');
	$('#producttypeerror<?php echo $subcategory->subcategory_id;?>').html('');
	$(function() {
		$("#datepicker<?php echo $subcategory->subcategory_id;?>" ).datepicker({
			      changeMonth: true,
					changeYear: true,
					minDate: -0,
			autoclose: true
			});
		});
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

	$(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#example<?php echo $subcategory->subcategory_id;  ?>').DataTable({
      'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
      
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
	

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#example<?php echo $subcategory->subcategory_id;  ?>').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
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
  $('#frm-example<?php echo $subcategory->subcategory_id;  ?>').on('submit', function(e){
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
      $('#example<?php echo $subcategory->subcategory_id;  ?>-console').text($(form).serialize()); 
      console.log("Form submission", $(form).serialize()); 
      var $data = $(form).serialize();
	  
	  
		 var offerAmt=document.getElementById('offeramount<?php echo $subcategory->subcategory_id;?>').value;
			 if(offerAmt==''){
				jQuery('#offeramounterror<?php echo $subcategory->subcategory_id;?>').html('Plase eneter offer Percentages');
				return false; 
			 }else{
					if (!IsMobile<?php echo $subcategory->subcategory_id;?>(offerAmt)) {
					$("#offeramounterror<?php echo $subcategory->subcategory_id;?>").html("Please Enter Correct Offer Percentages");
					return false;
					} 
			 }
			 if(offerAmt >100){
				$("#offeramounterror<?php echo $subcategory->subcategory_id;?>").html("Please Enter lessthan or equal 100 Percentages");
				return false; 
			 }
  
	
	jQuery("#offeramounterror<?php echo $subcategory->subcategory_id;?>").html('');
	  
	
	  if(jQuery("#offertype<?php echo $subcategory->subcategory_id;?>").val()!=''){
      jQuery.ajax({
			url: "<?php echo base_url('/seller/promotions/seansonsalesoffer');?>",
			data:$data,
			type: "POST",
			format:"html",
					success:function(data){
				
						location.reload();
						if(data.msg==1){
							$('#successmessage').show();
							$("#successmessage").append("Offer successfully Added!");
							
						}if(data.msg==2){
							$('#errormessage').show();
							$("#errormessage").append("while adding it should come like 3 of 100 , 4 of 100...once limit completes, limit for top offers for this week has completed. add for next week.limit of top offers for this week has completed");
						
						}if(data.msg==3){
							$('#errormessage').show();
							$("#errormessage").append("Item already added");
						}
				
					}
        });
	  }
      e.preventDefault();
   });
});
</script>
                </div>
              </div>
			<?php }?>
              </div>
             
             
              
            </div>
        <!-- container --> 
	   <?php $kk++;}?>
      </div>
    </div>
   <?php } else {?>
   
   <div class="container">
	
      <h1 class="head_title">Welcome to the Cart In Hour</h1>
   
   </div>
   
   <?php } ?>
  </div>
   
     

  <!--body end here --> 
  
  <script language="JavaScript" type="text/javascript">

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
</script>
</section>
  </div> 
  </div>