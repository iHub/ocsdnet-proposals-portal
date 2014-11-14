<div class="main-heading">
	<div class="container">
		<h1>Review tab questions</h1>
	</div>
</div>
<div class="main-component">
<div class="container">
	      <!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
 <p align="right"><a href="<?php echo site_url("admin/review_tabs") ?>" class="btn btn-primary btn-sm" >Review tabs</a></p>    
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo (isset($tab_data) ? "Tab: ". $tab_data["tab"] : "Review tab"); ?> </th>
            <th>Options</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count(@$questions); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $questions[$i]["question"]; ?></td>
            <?php $id = $questions[$i]["id"]; ?>
            <td><a href="<?php echo site_url("admin/question_options/$id") ?>" class="btn btn-primary btn-sm" >Options</a></td>
            <td><a href="<?php echo site_url("admin/edit_question/$id") ?>" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="<?php echo site_url("admin/delete_question/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
            
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
<a href="<?php echo site_url("admin/add_question/$tab_id"); ?>" class="btn btn-primary">Add question</a>