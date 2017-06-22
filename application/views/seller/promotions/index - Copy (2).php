 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script src=" https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
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
	 <div><?php echo $this->session->flashdata('message');?></div>
      <div class="faq">
	  <?php //echo '<pre>';print_r($catitemdata1);exit;  ?>

	   <?php  foreach($catitemdata1 as $catitem_data1 )  {  ?> 
		
		 <a id="btn_chang<?php echo $catitem_data1->category_id;?>" onclick="addtabactive(<?php echo $catitem_data1->category_id;?>);addtabactives(<?php echo $catitem_data1->category_id;?>);" href="#gry<?php echo $catitem_data1->category_id;   ?>" class="btn btn-large btn-info" data-toggle="tab"><?php echo $catitem_data1->category_name;   ?></a>

	<?php } ?>
        <?php  foreach($catitemdata as $catitem_data )  {    ?>
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              <div class="tab-pane" id="gry<?php echo $catitem_data->category_id; ?>">
              <?php 
			foreach($catitem_data->docs as $subcategory){?>
			<?php $space =  $subcategory->subcategory_name; 
			
			$nospace = str_replace(' ','',$space);
			
			?>
              <div class="panel panel-default mar_t10">
                <div class="panel-heading" role="tab" id="headingOne<?php echo $nospace;  ?>">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" onclick="sibcategoryproductlist(<?php echo $subcategory->subcategory_id;  ?>);" href="#collapseOne<?php echo $nospace;  ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $nospace;  ?>"> <i class="more-less glyphicon glyphicon-plus"></i> <?php echo $subcategory->subcategory_name; ?> </a> </h4>
                </div>
                <div id="collapseOne<?php echo $nospace;  ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $nospace;  ?>">
		
	<form id="frm-example<?php echo $subcategory->subcategory_id;?>" name="frm-example<?php echo $subcategory->subcategory_id;?>" action="" method="POST">
		<table id="example<?php echo $subcategory->subcategory_id;  ?>" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all<?php echo $subcategory->subcategory_id;  ?>"/>
				</th><a class="btn btn-primary" data-toggle="modal" data-target="#offerspopup<?php echo $subcategory->subcategory_id;?>" onclick="assigntoconfirm<?php echo $subcategory->subcategory_id;?>();" type="button">Assign</a>
				<th>Name</th>
                <th>Position</th>
                <th>Office</th>
                
            </tr>
        </thead>
      
             <tbody>
					<?php $k=1; 
					foreach($subcategory->docs12 as $item_data){
					//echo '<pre>';print_r($item_data);exit;	
						
						?>
					<tr>
						<td><input value="<?php echo $item_data->item_id; ?>" type="checkbox" name="cat_id[]" ></td>
						<td><?php echo $item_data->item_name;?></td>
						<td><?php echo $item_data->item_code;?></td>
						<td><?php echo $item_data->item_description;?></td>

					</tr>
				  <?php $k++; } ?>
				  </tbody>
    </table>
	<div class="modal fade" id="offerspopup<?php echo $subcategory->subcategory_id;?>" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="title" class="modal-title">Confirmation</h4>	
        </div>
        <div class="modal-body">
		<div class="form-group">
		<label class="control-label">Assign To: </label>                      
		<select class="form-control" id="offertype" name="offertype">	

			<option value="0">Select Assign To</option>
			<option value="1">Select Assign To</option>
			<option value="2">Select Assign To</option>
			<option value="3">Select Assign To</option>
		</select>					
		</div>
		<div class="form-group">
		<label class="control-label">Assign To: </label>                      
		<input type="text" class="form-control"  name="offeramount" id="offeramount" >					
		</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
     </div>
  </div>
   </form>
	<script type="text/javascript">
	 function assigntoconfirm<?php echo $subcategory->subcategory_id;?>(){
	   $('#offerspopup<?php echo $subcategory->subcategory_id;?>').modal('show');
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
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
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
	 alert(data); 
      // Get row ID
      var rowId = data[0];
	

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);
	  alert(index);return false;

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
	  if(jQuery("#offertype").val()!=''){
      jQuery.ajax({
			url: "<?php echo base_url('/seller/promotions/storepromotions');?>",
			data:$data,
			type: "POST",
			format:"html",
					success:function(data){
					if(data.msg=1){
						
						return false;
							//window.location.reload();
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
	   <?php }?>
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
  function sibcategoryproductlist(id){
	  $("#containerhigh").empty();
	  jQuery.ajax({
				url: "<?php echo site_url('seller/promotions/storepromotions');?>",
				type: 'post',
				data: {
				cat_id: id,
				},
				dataType: 'html',
				success: function (data) {
					//alert(data);return false;
					$("#containerhigh").append(data);
				}
			});
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