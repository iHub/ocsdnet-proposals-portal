
<div class="container">

  <div class="content">

      

      <div class="row">

        <div class="col-md-12">

          <div class="portlet">
		<!-- navigation -->

		<div class="error-messages">
			<?php echo $this -> session -> flashdata('message'); ?>
		</div>
		 <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
                Proposals
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

              <div class="table-responsive">
				<table 
                class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                data-provide="datatable" 
                data-display-rows="10"
                data-info="true"
                data-search="true"
                data-length-change="true"
                data-paginate="true"
              >
    <thead>
        <tr>
        	<?php
        	   $first_name_order = array(1=>"Asc", 2 => "Desc" );
        	 ?>
            <th>#</th>
             <th data-filterable="true" data-sortable="true" data-direction="desc">Researcher Name</th>
                      <th data-direction="asc" data-filterable="true" data-sortable="true">Project Title</th>
                      <th data-filterable="true" data-sortable="true">Country</th>
                      <th data-filterable="false" >Advisors Assigned</th>
                      <th data-filterable="true" >Review Status</th>
                      <th data-filterable="true" >Award Status</th>
                      <th >Review</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count($completes); $i++): 
    		?>
        <tr>
            <?php $proposal_id = $completes[$i]["proposal_id"]; ?>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $completes[$i]["first_name"]." ".$completes[$i]["last_name"]; ?></td>
            <td><?php echo $completes[$i]["study_title"]; ?></td>
            <td><?php echo $completes[$i]["countries_covered"]; ?></td>
            <td><?php 
            foreach ($reviewers[$proposal_id] as $key2 => $value2) {
            	if (!empty($value2->first_name)) { 
					
                ?><a href="<?php echo site_url("coordinators/remove_advisor/$proposal_id/$value2->id") ?>" onclick="return confirm('Are you sure you want to delete this advisor?')"><i class="fa fa-times">&nbsp;<?php echo $value2->first_name." ".$value2->last_name ?></i></a>
           <br><?php  
				}
            	?>
           <?php } ?> 
           <a href="<?php echo site_url("coordinators/assign_advisor/$proposal_id") ?>"><i class="fa fa-plus-square"></i></a>
            			</td>
            <td>
            <?php 
            foreach ($reviewers[$proposal_id] as $key2 => $value2) {
            	if ($value2->status == 0) {
            		 
					echo $value2->last_name."-&nbsppending<br>";
				}elseif ($value2->status == 1) {
            		 
					echo $value2->last_name."-&nbspincomplete<br>";
				}elseif ($value2->status == 2) {
            		 
					echo $value2->last_name."-&nbspcomplete<br>";
				}else{
            		 
					echo $value2->last_name."-&nbsppending<br>";
				}
            	?>
           <?php } ?>
            </td>
            <td><?php echo $completes[$i]["award_status"]; ?></td>
            <!-- <td><?php echo $completes[$i]["organization"]; ?></td> -->
            <?php $reviewer_id = $completes[$i]["reviewer_id"] ?>
            
            <td><a href="<?php echo site_url("coordinators/preview/$proposal_id") ?>" class="btn btn-success btn-sm">Preview</a></td>
            <!-- <td><a href="<?php echo site_url("coordinators/assign_advisor/$proposal_id") ?>" class="btn btn-info btn-sm"><?php echo ($reviewer_id > 0 ? "Re-assign" : "Assign") ?></a></td> -->
            <!-- <td><a href="<?php echo site_url("coordinators/preview/$proposal_id") ?>" class="btn btn-success btn-sm">Preview</a></td> -->
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
</div>
</div>
<script>
	var el = document.getElementById('frm_assign_advisor');

	el.addEventListener('submit', function() {
		return confirm('Re-assigning this Concept Note will negate the review carried out by the current advisor. Are you sure you wish to re-assign the concept note?');
	}, false);
</script>
