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
                    <th>Email</th>
                    <th class="center">Edit</th>
                    <th class="center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($coordinators); $i++): ?>
                <tr>
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo $coordinators[$i]["first_name"]; ?></td>
                    <td><?php echo $coordinators[$i]["last_name"]; ?></td>
                    <td><?php echo $coordinators[$i]["email"]; ?></td>
                    <?php $id = $coordinators[$i]["id"]; ?>
                    <td><a href="<?php echo site_url("coordinators/edit_user/$id") ?>" class="btn btn-success btn-sm">Edit</a></td>
                    <td><a onclick="return  confirm_delete();" href="<?php echo site_url("coordinators/delete_coordinators/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>

                <?php endfor; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url("coordinators/add_coordinators"); ?>" class="btn btn-primary">Add coordinator</a>
    </div>
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