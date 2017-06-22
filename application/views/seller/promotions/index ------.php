<link rel="stylesheet" href="https://code.jquery.com/jquery-1.12.4.js">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>


<style>
table.dataTable.select tbody tr,
table.dataTable thead th:first-child {
  cursor: pointer;
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

	 
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <div class="tab-content">
              
	<hr><br>
<form id="frm-example" action="" method="POST">
<table id="example" class="display select" width="100%" cellspacing="0">
   <thead>
      <tr>
         <th><input name="select_all" value="1" type="checkbox"></th>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
        
      </tr>
   </thead>
   <tfoot>
      <tr>
         <th></th>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
        
      </tr>
   </tfoot>
   <tbody>
    <tr>
				<td><input type="checkbox" name="issue_id[]" value="1"></td>
				<td>Name</td>
                <td>Position</td>
                <td>Office</td>
			 </tr>
			 <tr>
				<td><input type="checkbox" name="issue_id[]" value="2"></td>
				<td>Name</td>
                <td>Position</td>
                <td>Office</td>
			 </tr><tr>
				<td><input type="checkbox" name="issue_id[]" value="3"></td>
				<td>Name</td>
                <td>Position</td>
                <td>Office</td>
			 </tr>
			 <tr>
				<td><input type="checkbox" name="issue_id[]" value="4"></td>
				<td>Name</td>
                <td>Position</td>
                <td>Office</td>
			 </tr>
   </tbody>
</table>
<p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

<p><button>Submit</button></p>

<b>Data submitted to the server:</b><br>
<pre id="example-console">
</pre>
</form>
              </div>
             
             
              
            </div>
        <!-- container --> 
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

$(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#example').DataTable({
      //'ajax': 'https://api.myjson.com/bins/1us28',
      columnDefs: [ {
         'targets': 0,
         'searchable':false,
         'orderable':false,
		 
        } ],
      'order': [1, 'asc'],
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
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
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
   $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example tbody input[type="checkbox"]:checked').trigger('click');
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
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'issue_id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY     
      
      // Output form data to a console     
      $('#example-console').text($(form).serialize());
      console.log("Form submission", $(form).serialize());
          var $data = $(form).serialize();
      // Remove added elements
     // $('input[name="id\[\]"]', form).remove();
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
	
      e.preventDefault();
   });
});
       
</script>
  </div> 
  </div>