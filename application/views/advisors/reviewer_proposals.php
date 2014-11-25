<div class="main-heading">
	<div class="container">
		<h1>Review proposals</h1>
	</div>
</div>
<div class="container main-container">
	<!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
        
     
    
              <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
                Proposals
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           
    <h4><?php echo $reviewer_status; ?></h4> 

              <div class="table-responsive">
   
    <table
    class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                data-provide="datatable" 
                data-display-rows="10"
                data-info="true"
                data-search="true"
                data-length-change="true"
                data-paginate="true">
    <?php if (count($proposals)>0) {
			
		?>
    <thead>
        <tr>
        	<th class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
            </th>
            <th data-filterable="true" data-sortable="true">#</th>
             <th data-filterable="true" data-sortable="true" data-direction="desc">Researcher Name</th>
            <th data-filterable="true" data-sortable="true" data-direction="desc">Project title</th>
             <th data-filterable="true" data-sortable="true">Status</th>
            <th data-filterable="true" data-sortable="true">Review</th>
            <th data-filterable="true" data-sortable="true">Progress</th>
            <th data-filterable="false" data-sortable="false">Pdf</th>
            
        </tr>
    </thead>
    <tbody>
    	<?php 
    	
    	for($i=0; $i<count($proposals); $i++): ?>
        <tr>
        	<td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
            </td>
            <td><?php echo $i + 1; ?></td>
            
            <td><?php echo $proposals[$i]["researcher"]['first_name']." ".$proposals[$i]["researcher"]['last_name']; ?></td>
            <td><?php echo $proposals[$i]["study_title"]; ?></td>
            <?php $id = $proposals[$i]["id"]; ?>
            <?php $proposal_id = $proposals[$i]["id"]; ?>
             <?php $status = strcasecmp($proposals[$i]["review_status"], "complete")==0; ?>
            <td><?php echo ( $status ? "Completed" : "Pending"); ?></td>
            <?php if($status): ?>
            <td> <button> Submitted </button> </td>
            <?php else: ?>
            <td><a href="<?php echo site_url("advisors/review/$id") ?>" class="btn btn-success btn-sm">Edit review</a></td>
            <?php endif; ?>
            <td></td>
            <td><a href="<?php echo site_url("advisors/print_preview_proposal/$id") ?>" class="btn btn-primary btn-sm">Download</a></td>
                       
        </tr>
    	
    	<?php endfor;
		
		}else{ ?>
			
			<tr><td>Once you are assigned proposals for review, they will appear here</td></tr>
		<?php } ?>
    </tbody>
</table>
</div>
</div>
</div>