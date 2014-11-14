<div class="main-heading">
	<div class="container">
		<h1>Proposals</h1>
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
            <th>Research title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	
    	<?php for($i=0; $i<count($proposals); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $proposals[$i]["study_title"]; ?></td>
            <?php $id = $proposals[$i]["id"]; ?>
            <td><a href="<?php echo site_url("submit_proposal/preview/$id") ?>" class="btn btn-success">Preview</a> </td>
           
        </tr>
    	
    	<?php endfor; ?>
    </tbody>
</table>
</div>
</div>