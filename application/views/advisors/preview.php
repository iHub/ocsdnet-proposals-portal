<div class="main-heading">
	<div class="container">
		<h1>Proposals</h1>
	</div>
</div>

<div class="main-component">
	<div class="container">
		<!-- navigation -->
		<?php include_once ("nav_bar.php"); ?>

<!-- <?php $reviewer_id = $preview_data['proposal']['reviewer_id']; ?>
<div align="right"><a href="<?php echo site_url("advisors/assign_advisor/$proposal_id") ?>" class="btn btn-info btn-sm"><?php echo ($reviewer_id > 0 ? "Re-assign" : "Assign") ?></a></div>	 -->

<div class="error-messages">
  <?php echo validation_errors(); ?>
</div>
<?php $user_email = ""; ?>
<?php if (isset($preview_data['researcher'])) : ?>		
<h3>Primary Researcher Information</h3>
<table class="table table-striped table-bordered table-condensed">
    <tbody>
    
    <?php $res = $preview_data['researcher']; ?>
     <tr>
    	<th width="25%" class="header">Names</th> <td><?php echo $res["first_name"] ." " . $res["last_name"];  ?></td>
     </tr>
     <tr>
    	<th>Email Address</th> <td><?php echo $res["email"] ?></td>
    	<?php (isset($res["email"]) ?  $user_email = $res["email"] : "" ); ?>
    		
    
    </tr>
    
    <tr>
    	<th>Telephone</th> <td><?php echo $res["telephone"] ?></td>
    </tr>
    <tr>
    	<th>Office address</th> <td><?php echo $res["office_address"] ?></td>
    </tr>
    <tr>
    	<th>Designation</th> <td><?php echo $res["designation"] ?></td>
    </tr>
    <tr>
    	<th>Country of residence</th> <td><?php echo $res["country_of_residence"] ?></td>
    </tr>
    <tr>
    	<th>Country of incorporation</th> <td><?php echo $res["country_of_incorporation"] ?></td>
    </tr>
    <tr>
    	<th>Country of citizenship</th> <td><?php echo $res["country_of_citizenship"] ?></td>
    </tr>
    
     <tr>
    	<th>IDRC affiliation</th> <td><?php echo $res["idrc_affiliation"] ?></td>
    </tr>
    
    <tr>
    	<th colspan="2">Area of Expertise and Interest</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $res["expertise"] ?></td>
    </tr>
    
    <tr>
    	<th colspan="2">Publications or Research Outputs</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $res["publications"] ?> </td>
    </tr>
    	
    </tbody>
</table>
<?php endif; ?>

<div class="clr clearfix"></div>
<!-- Collaborators -->
<?php if (isset($preview_data['collaborators'])) : ?>	
<h3>Research Team Information</h3>
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role in project</th>
            <th>Designation</th>
        </tr>
    </thead>
    <tbody>
    	<?php  $collaborators = $preview_data["collaborators"]; ?>
    	
    	<?php for($i=0; $i<count($collaborators); $i++): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $collaborators[$i]["first_name"]; ?></td>
            <td><?php echo $collaborators[$i]["last_name"]; ?></td>
            <td><?php echo $collaborators[$i]["email"]; ?></td>
            <td><?php echo $collaborators[$i]["role_in_project"]; ?></td>
            <td><?php echo $collaborators[$i]["designation"]; ?></td>
        </tr>
    	<?php endfor; ?>
    </tbody>
</table>
<?php endif; ?>

<div class="clr clearfix"></div>
<!-- Study info -->
<?php if (isset($preview_data['proposal'])) : ?>		
<h3>Proposed Research Study Information</h3>
<table class="table table-striped table-bordered table-condensed">
    <tbody>
    
    <?php $proposal = $preview_data['proposal']; ?>
     <tr>
    	<th width="25%" class="header">Study title</th> <td><?php echo $proposal["study_title"] ?></td>
     </tr>
     <tr>
    	<th>Countries covered</th> <td><?php echo $proposal["countries_covered"] ?></td>
    </tr>
    
    <tr>
    	<th>Total budget cost(CAD)</th> <td><?php echo $proposal["total_budget_cost"] ?></td>
    </tr>
    <tr>
    	<th>Budget(CAD)</th> <td><a target="_blank" href="<?php echo $proposal["budget"] ?>">View</a></td>
    </tr>
    <tr>
    	<th>Letter of Endorsment</th> <td><a target="_blank" href="<?php echo $proposal["endorsment_letter"] ?>"> View</a> </td>
    </tr>
    
    
    <tr>
    	<th colspan="2">Skills summary</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $proposal["skills_summary"] ?></td>
    </tr>
    
    <tr>
    	<th colspan="2">Abstract</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $proposal["abstract"] ?> </td>
    </tr>
    
    <tr>
    	<th colspan="2">Design and methodologies</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $proposal["design_and_methodologies"] ?> </td>
    </tr>
    
    <tr>
    	<th colspan="2">Outcomes and relevance</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $proposal["outcomes_and_relevance"] ?> </td>
    </tr>
    
    <tr>
    	<th colspan="2">Monitoring and evaluation</th>
    </tr>
    <tr>
    	<td colspan="2"><?php echo $proposal["monitoring_and_evaluation"] ?> </td>
    </tr>
    
    	
    </tbody>
</table>
<?php endif ;?>



</div>
</div>
