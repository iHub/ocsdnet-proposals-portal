<?php 
	$this->session->unset_userdata("origin");
	$this->session->set_userdata("origin", "coordinators");
?>
<div class="main-heading">
	<div class="container">
		<h1>Coordinators</h1>
	</div>
</div>
<div class="main-component">
<div class="container-fluid">
	      <!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-condensed">
            <thead>
                <tr>
                   <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Organization</th>
                    <th>Countries Covered</th>
                    <th>Study Title</th>
                    <th>Assigned Advisor</th>
                    <th>Preview Concept Note</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                $n=1;
				
                foreach($approved as $apprv): ?>
                <tr>
                   <td><?php echo $n; ?></td>
                    <td><?php echo $apprv->first_name; ?></td>
                    <td><?php echo $apprv->last_name; ?></td>
                     <td><?php echo $apprv->organization; ?></td>
                      <td><?php echo $apprv->countries_covered; ?></td>
                    <td><?php echo $apprv->study_title; ?></td>               
                     <td><?php echo $apprv->full_name; ?></td>
                  
                     <?php $proposal_id = $apprv->id; ?>
                     <td><a href="<?php echo site_url("coordinators/preview/$proposal_id") ?>" class="btn btn-success btn-sm">Preview</a></td>
                    <!-- <?php $id = $coordinators["id"]; ?>
                    <td><a href="<?php echo site_url("coordinators/edit_user/$id") ?>" class="btn btn-success btn-sm">Edit</a></td>
                    <td><a onclick="return  confirm_delete();" href="<?php echo site_url("coordinators/delete_coordinators/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
              -->   </tr>

                <?php 
                $n++;
                endforeach; ?>
            </tbody>
        </table>
        <!-- <a href="<?php echo site_url("coordinators/add_coordinators"); ?>" class="btn btn-primary">Add coordinator</a> -->    </div>
</div>
</div>
<script>
function confirm_delete()
{
    job=confirm("Are you sure you want to delete this user? All information linked to this user will be lost.");
    if(job!=true)
    {
        return false;
    }
}
</script>