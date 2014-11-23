
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

            <div class="tab1"><?php include_once("tabs/tab1p.php"); ?></div>
            <div class="tab2"><?php include_once("tabs/tab2p.php"); ?></div>
            <div class="tab3"><?php include_once("tabs/tab3p.php"); ?></div>
            <div class="tab4"><?php include_once("tabs/tab4p.php"); ?></div>
            <div class="tab5"><?php include_once("tabs/tab5p.php"); ?></div>

            <?php $p = $review_data['proposal'];  ?>
        </div>
    </div>
</div>

<div class="col-md-7">
    <div class="review-box">
    <h3 align="center"><?php echo (isset($p["study_title"]) ? $p["study_title"] : "" ); ?></h3>  

    <h4>Primary Researcher Proposal</h4>
    <?php if (isset($review_data['researcher'])) : ?>
    <table class="table table-striped table-bordered table-condensed">
        <tbody>

        <?php $res =$review_data['researcher']; ?>
		<h5>General Project Information</h5>
        <tr>
            <th>Duration of the project</th><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
        </tr>
        <tr>
            <th>Countries included in this project</th> <td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
        </tr>
        <tr>
            <th>Region(s) included in this project</th> <td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
        </tr>
        <tr>
            <th>Research Themes *</th> <td><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
        </tr>
        
        <tr>
            <th>Justification of Research Themes</th><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p></td>
        </tr>
        
        <tr>
            <th>Total Budget Cost (CAD)</th> <td><p></p></td>
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
		<h6>Primary Researcher Information</h6>
        <tr>
            <th>Name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Phone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Designation</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Institution or organization name</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Country of Citizenship</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Office Address</th><p></p></td>
        </tr>
        
        <tr>
            <th>IDRC Affiliation (if any)</th> <td><p></p></td>
        </tr>

        <tr>
            <th colspan="2">Country of Citizenship</th>
        </tr>
        <tr>
            <td colspan="2"><p></p></td>
        </tr>

        <tr>
            <th colspan="2"> Website</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Country of incorporation</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Country of Residence</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Gender</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Areas of Expertise and Interest</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Relevant Publications or Research Outputs</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Qualifications and Experience</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <h6>Research Team and Institutional Information</h6>
        <tr>
            <th>Name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Phone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Designation</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Institution or organization name</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Country of Citizenship</th> <td><p></p></td>
        </tr>
        
        <tr>
            <th>Office Address</th><p></p></td>
        </tr>
        
        <tr>
            <th>IDRC Affiliation (if any)</th> <td><p></p></td>
        </tr>

        <tr>
            <th colspan="2">Country of Citizenship</th>
        </tr>
        <tr>
            <td colspan="2"><p></p></td>
        </tr>

        <tr>
            <th colspan="2"> Website</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Country of incorporation</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Country of Residence</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Gender</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Areas of Expertise and Interest</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Relevant Publications or Research Outputs</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <th colspan="2">Qualifications and Experience</th>
        </tr>
        <tr>
            <td colspan="2"><p></p> </td>
        </tr>
        <tr>
            <td colspan="2"><p>Role in Proposed Project</p> </td>
        </tr>
        <tr>
            <th colspan="2"></th>
        </tr>
        <h6>Proposing Institution</h6>
        <tr>
            <th>Institution/ Organization name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Telephone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Mailing Address</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Finance Officer’s name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Finance Officer phone number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Finance Officer Email</th> <td><p></p></td>
        </tr>
        <h6>Participating Institutions</h6>
        <tr>
            <th>Institution name</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Telephone Number</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Email</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Mailing Address</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Role in the project</th> <td><p></p></td>
        </tr>
        <h5>Proposed Study Information</h5>
        <tr>
            <th>Research Project Abstract </th> <td><p></p></td>
        </tr>
        <tr>
            <th>Research Problem, Significance and Justification</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Research Questions and Objectives</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Research Design and Methods</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Analysis and Synthesis </th> <td><p></p></td>
        </tr>
        <tr>
            <th>Outcomes and Outputs</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Knowledge Translation and Dissemination</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Network Connections and Interactions</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Bibliography</th> <td><p></p></td>
        </tr>
        <h5>Research Administration</h5>
        <tr>
            <th>Project Timeline</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Research Ethics</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Internal Project Communication and Management</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Challenges and Risks</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Monitoring and Evaluation Plan</th> <td><p></p></td>
        </tr>
        <h5>Budgets</h5>
        <h6>Budget and Timetable</h6>
        <tr>
            <th>Parallel funds</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Donor</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Amount</th> <td><p></p></td>
        </tr>
        <tr>
            <th>Time frame</th> <td><p></p></td>
        </tr>
        
        <tr>
            <td colspan="2"><p></p> </td>
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

