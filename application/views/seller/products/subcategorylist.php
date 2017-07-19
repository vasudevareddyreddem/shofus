<option value="">Select Subcategory </option>
<?php 
//echo '<pre>';print_r($subcategory_details);exit;
foreach($subcategory_details as $list){   ?>
<option value="<?php echo $list['subcategory_id']; ?>"><?php echo $list['subcategory_name']; ?></option>

<?php } ?> 