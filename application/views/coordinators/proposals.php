
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
                      <th data-filterable="false" >Advisor Assigned</th>
                      <th data-filterable="true" >Review Status</th>
                      <th data-filterable="true" >Award Status</th>
                      <th >Review</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count($completes); $i++): 
    		?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $completes[$i]["first_name"]." ".$completes[$i]["last_name"]; ?></td>
            <td><?php echo $completes[$i]["study_title"]; ?></td>
            <td><?php echo $completes[$i]["countries_covered"]; ?></td>
            <td><?php echo (isset($completes[$i]["advisor"]) ? $completes[$i]["advisor"] : "" ); ?></td>
            <td><?php echo $completes[$i]["organization"]; ?></td>
            <td><?php echo $completes[$i]["review_status"]; ?></td>
            <td><?php echo $completes[$i]["award_status"]; ?></td>
            <?php $proposal_id = $completes[$i]["proposal_id"]; ?>
            <?php $reviewer_id = $completes[$i]["reviewer_id"] ?>
            
            <!-- <td><a href="<?php echo site_url("coordinators/assign_advisor/$proposal_id") ?>" class="btn btn-info btn-sm"><?php echo ($reviewer_id > 0 ? "Re-assign" : "Assign") ?></a></td> -->
            <!-- <td><a href="<?php echo site_url("coordinators/preview/$proposal_id") ?>" class="btn btn-success btn-sm">Preview</a></td> -->
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
</div>
</div>

