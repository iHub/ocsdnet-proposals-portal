<div class="main-heading">
	<div class="container">
		<h1>System admin</h1>
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th class="center">Edit</th>
            <th class="center">Delete</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count($users); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $users[$i]["first_name"]; ?></td>
            <td><?php echo $users[$i]["last_name"]; ?></td>
            <td><?php echo $users[$i]["email"]; ?></td>
            <?php $id = $users[$i]["id"]; ?>
            <td><a href="<?php echo site_url("admin/edit_user/$id") ?>" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="<?php echo site_url("admin/delete_user/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
<a href="<?php echo site_url("admin/add_user"); ?>" class="btn btn-primary">Add user</a>