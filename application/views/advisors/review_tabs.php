
<div class="main-heading">
	<div class="container">
		<h1>Review Proposal</h1>
	</div>
</div>
<p>&nbsp;<br/></p>
<div class="main-container wide-container">
	<!-- navigation -->
<?php include_once("nav_bar.php"); ?>
        
  
<style> <?php echo (isset($css) ? $css : ""); ?> </style>

<div class="row-fluid">
    <div class="col-md-12">
        <a href="<?php echo site_url('advisors'); ?>" class="btn btn-success"> <i class="glyphicon glyphicon-chevron-left"></i> View all Proposals</a>
    </div>
</div>

<div class="row-fluid">
<div class="col-md-5">
    <div class="fixedcol" >
        
        <div class="container-fluid">
            <h3>Proposal Review Form</h3>

            <div class="tab1"><?php include_once("tabs/tab1.php"); ?></div>
            <div class="tab2"><?php include_once("tabs/tab2.php"); ?></div>
            <div class="tab3"><?php include_once("tabs/tab3.php"); ?></div>
            <div class="tab4"><?php include_once("tabs/tab4.php"); ?></div>
            <div class="tab5"><?php include_once("tabs/tab5.php"); ?></div>

            <?php $p = $review_data['proposal'];  ?>
        </div>
    </div>
</div>

<div class="col-md-7">
    <div class="review-box">
    <h3 align="center"><?php echo (isset($p["study_title"]) ? $p["study_title"] : "" ); ?></h3>  

    <h4>Primary Researcher Information</h4>
    <?php if (isset($review_data['researcher'])) : ?>
    <table class="table table-striped table-bordered table-condensed">
        <tbody>

        <?php $res =$review_data['researcher']; ?>

        <tr>
            <th>Office address</th> <td><?php echo $res["office_address"] ?></td>
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
            <th>Gender</th> <td><?php echo $res["gender"] ?></td>
        </tr>
        
        <tr>
            <th>Website</th> <td><?php echo $res["website"] ?></td>
        </tr>
        
        <tr>
            <th>Organization Name</th> <td><?php echo $res["organization"] ?></td>
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
    <?php if (isset($review_data['collaborators'])) : ?>

    <h4>Research Team Information</h4>

    <?php  $collaborators =$review_data["collaborators"]; ?>

     <?php for($i=0; $i<count($collaborators); $i++): ?>
            <?php $res =  $collaborators[$i]; ?>
     <h5>Collaborator <?php echo $i+1; ?></h5>
    <table class="table table-striped table-bordered table-condensed">
        <tbody>

        <tr>
            <th>Office address</th> <td><?php echo $res["office_address"] ?></td>
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
            <th>Gender</th> <td><?php echo $res["gender"] ?></td>
        </tr>
        
        <tr>
            <th>Website</th> <td><?php echo $res["website"] ?></td>
        </tr>
        
        <tr>
            <th>Organization Name</th> <td><?php echo $res["organization"] ?></td>
        </tr>
        
        <tr>
            <th>Role in project</th> <td><?php echo $res["role_in_project"] ?></td>
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

    <?php endfor; ?>
    <?php endif; ?>

    <div class="clr clearfix"></div>

    <!-- Study info -->
    <?php if (isset($review_data['proposal'])) : ?>		
    <h4>Proposed Research Study Information</h4>
    <table class="table table-striped table-bordered table-condensed">
        <tbody>

        <?php $proposal = $review_data['proposal']; ?>
         <tr>
            <th width="25%" class="header">Study title</th> <td><?php echo $proposal["study_title"] ?></td>
         </tr>
         <tr>
            <th>Countries covererd</th> <td><?php echo $proposal["countries_covered"] ?></td>
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
</div>
</div>

