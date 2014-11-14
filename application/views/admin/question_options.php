<div class="main-heading">
	<div class="container">
		<h1>Review question options</h1>
	</div>
</div>
<div class="main-component">
<div class="container">
	      <!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
        <?php $tab_id = $this -> session ->userdata("tab_id"); ?>
        <?php if($tab_id): ?>
        	 <p align="right"><a href="<?php echo site_url("admin/tab_questions/$tab_id") ?>" class="btn btn-primary btn-sm" >Tab questions</a></p>
        <?php endif; ?>
   

<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo "Question: ". (isset($question_data) ? $question_data["question"] : ""); ?> </th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    	<?php for($i=0; $i<count(@$options); $i++): ?>
        <tr>
            <td><?php //echo $i + 1; ?></td>
            <td><?php echo $options[$i]["option"] . " " . $options[$i]["description"] ; ?></td>
            <?php $id = $options[$i]["id"]; ?>
            <td><a href="<?php echo site_url("admin/edit_option/$id") ?>" class="btn btn-success btn-sm">Edit</a></td>
            <td><a href="<?php echo site_url("admin/delete_option/$id") ?>" class="btn btn-danger btn-sm">Delete</a></td>
            
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
<a href="<?php echo site_url("admin/add_options/$question_id"); ?>" class="btn btn-primary">Add options</a>