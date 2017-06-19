
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		animationEnabled: true,
		theme: "theme2",
		//exportEnabled: true,
		title:{
			text: "Monthly Performance"
		},
		data: [
		{
			type: "column", //change type to bar, line, area, pie, etc
			dataPoints: [
			
				<?php foreach($dailywise as $daily_wise) {   ?>
				{ label: "<?php echo $daily_wise ->created_at; ?>", y: <?php echo $daily_wise ->orders; ?> },
				
			<?php } ?>
			
			]
		}
		]
	});

	chart.render();
}
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/seller/js/canvasjs.min.js"></script>

<div class="col-md-9">
          <div class="bdy_ser"> 
		  
            <!--<ul class="add_lsit">
              <li><a href="#"><img src="images/sto_1.png" /></a> </li>
              <li class="add_sto"><a href="#"><img src="images/sto_2.png" /></a> </li>
              <li><a href="#"><img src="images/sto_3.png" /></a> </li>
            </ul>--> 
			<?php if(!empty($dailywise)) {?>
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
			<?php } else {?>
			
			  <div class="container">
	
      <h1 class="head_title">No Orders Found on this Month</h1>
   
   </div>
			
			<?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
   
