<div class="main-heading">
	<div class="container">
		<h1>Review proposals</h1>
	</div>
</div>
<div class="container main-container">
	<!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
        
     
    <h4><?php echo $reviewer_status; ?></h4>    
    <table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>Study title</th>
             <th>Status</th>
            <th>Review</th>
            <th>Pdf</th>
            
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count($proposals); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
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
            <td><a href="<?php echo site_url("advisors/print_preview_proposal/$id") ?>" class="btn btn-primary btn-sm">Download</a></td>
                       
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
</div>