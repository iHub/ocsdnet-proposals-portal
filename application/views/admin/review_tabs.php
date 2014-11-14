<div class="main-heading">
	<div class="container">
		<h1>Review tabs</h1>
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
            <th>Review tab</th>
            <th>Questions</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count(@$review_tabs); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $review_tabs[$i]["tab"]; ?></td>
            <?php $id = $review_tabs[$i]["id"]; ?>
            <td><a href="<?php echo site_url("admin/tab_questions/$id") ?>" class="btn btn-primary btn-sm" >Questions</a></td>
            <td><a href="<?php echo site_url("admin/edit_tab/$id") ?>" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="<?php echo site_url("admin/delete_tab/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
            
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
<a href="<?php echo site_url("admin/add_tab"); ?>" class="btn btn-primary">Add tab</a>