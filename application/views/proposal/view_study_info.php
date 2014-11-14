<div class="main-heading">
	<div class="container">
		<h1>Proposed Research Study Information</h1>
	</div>
</div>

<div class="main-component">
<div class="container">
	      <!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>Research Title</th>
            <th class="center"></th>
            <th class="center"></th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count($study_data); $i++): ?>
    	<?php if(strcasecmp($study_data[$i]["status"], "complete") !=0): ?>
    	   <tr>   	
            <td><?php echo $i+1; ?></td>
            <td><?php echo $study_data[$i]['study_title'];  ?></td>
             <?php $id = $study_data[$i]["id"]; ?>
            <td><a href="<?php echo site_url("submit_proposal/edit_study_info/$id") ?>" class="btn btn-primary btn-sm">Edit</a></td>
            <td><a href="<?php echo site_url("submit_proposal/delete_study/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
        <?php endif; ?>
    	<?php endfor; ?>
    </tbody>
</table>
<?php if(!$has_proposal): ?>
<a href="<?php echo site_url("submit_proposal/load_study_info") ?>" class="btn btn-primary">Add Concept Note</a>
<?php endif; ?>
</div>
</div>