<div class="main-heading">
	<div class="container">
		<h1>Proposals</h1>
	</div>
</div>
<div class="main-component">
	<div class="container">
		<!-- navigation -->
		<?php include_once ("nav_bar.php"); ?>

		<div class="error-messages">
			<?php echo $this -> session -> flashdata('message'); ?>
		</div>
		<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
        	<?php
        	   $first_name_order = array(1=>"Asc", 2 => "Desc" );
        	 ?>
            <th>#</th>
            <?php foreach ($table_headers as $column => $data): ?>
               <?php 
                   $order = $data['order'];  
                   $label = $data["label"]; 
				   $icon  = (strcasecmp($order, "asc")==0 ?   '<i class="glyphicon glyphicon-cloud-download"></i>' : '<i class="glyphicon glyphicon-cloud-upload "></i>');
				   
               ?>
            	<th><a href="<?php echo site_url("coordinators/order_by/$column/$order/"); ?>"> <?php echo $label. " ". $icon ?></a></th>
            <?php endforeach; ?>
           
             <th>Assigned advisor</th>
            <th>Assign advisor</th>
            <th>Preview</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count($completes); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $completes[$i]["first_name"]; ?></td>
            <td><?php echo $completes[$i]["last_name"]; ?></td>
            <td><?php echo $completes[$i]["organization"]; ?></td>
            <td><?php echo $completes[$i]["countries_covered"]; ?></td>
            <td><?php echo $completes[$i]["study_title"]; ?></td>
            <td><?php echo (isset($completes[$i]["advisor"]) ? $completes[$i]["advisor"] : "" ); ?></td>
            <?php $proposal_id = $completes[$i]["proposal_id"]; ?>
            <?php $reviewer_id = $completes[$i]["reviewer_id"] ?>
            <td><a href="<?php echo site_url("coordinators/assign_advisor/$proposal_id") ?>" class="btn btn-info btn-sm"><?php echo ($reviewer_id > 0 ? "Re-assign" : "Assign") ?></a></td>
            <td><a href="<?php echo site_url("coordinators/preview/$proposal_id") ?>" class="btn btn-success btn-sm">Preview</a></td>
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>


