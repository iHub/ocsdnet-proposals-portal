 <?php 
// print_r($review_data);
// 
?>

<!-- 
<div class="main-heading">
	<div class="container">
		<h1>Review Proposal</h1>
	</div>
</div> -->
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
<div class="col-md-6">
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

<div class="col-md-6">
    <div class="review-box">
    <h3 align="center"><?php echo (isset($p["study_title"]) ? $p["study_title"] : "" ); ?></h3>  

    <h4>General Project Information</h4>
    <?php if (isset($review_data['proposal'])) : ?>
   <?php $proposal = $review_data['proposal']; ?>

    <table class="table table-striped table-bordered table-condensed">
    	<tbody>
            <tr>
                <th>Duration of the project</th><td><p><?php echo $proposal['duration']; ?></p></td>
            </tr>
            <tr>
                <th>Countries included in this project</th> <td><p><?php echo $proposal["countries_covered"]; ?></p></td>
            </tr>
            <tr>
                <th>Region(s) included in this project</th> <td><p><?php echo $proposal["regions"]; ?></p></td>
            </tr>
            <tr>
                <th>Research Themes *</th> <td><p><?php echo $proposal["research_themes"]; ?></p></td>
            </tr>
            
            <tr>
                <th>Justification of Research Themes</th><p><?php echo $proposal["justification_of_research_themes"]; ?></p></td>
            </tr>
            
            <tr>
                <th>Total Budget Cost (CAD)</th> <td><p><?php echo $proposal["total_budget_cost"]; ?></p></td>
            </tr>  
    		
    	</tbody>
    </table>

    <?php endif; ?>

    <div class="clr clearfix"></div>

    <!-- Collaborators -->
    <?php if (isset($review_data['collaborators'])) : ?>
	<h4>Proposing Institution</h4>

    <h4>Research Team Information</h4>
    	<table class="table table-striped table-bordered table-condensed">
        <tbody>

        <?php $res =$review_data['researcher']; ?>
		<tr>
            <th colspan="2">Name</th> <td><p><?php echo $res["first_name"]." ".$res["last_name"]; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Email</th> <td><p><?php echo $res["email"]; ?></p></td>
        </tr>
        <tr>
            <th>Phone Number</th> <td><p><?php echo $res["telephone"]; ?></p></td>
        </tr>
        <tr>
            <th  colspan="2">Designation</th> <td><p><?php echo $res['designation']; ?></p></td>
        </tr>
        
        <tr>
            <th  colspan="2">Country of Citizenship</th> <td><p><?php echo $res['country_of_citizenship']; ?></p></td>
        </tr>
        
        <tr>
            <th  colspan="2">Office Address</th><td><p><?php echo $res['office_address']; ?></p></td>
        </tr>
        
        <tr>
            <th  colspan="2">IDRC Affiliation (if any)</th> <td><p><?php echo $res['idrc_affiliation']; ?></p></td>
        </tr>

        <tr>
            <th colspan="2">Country of Citizenship</th><td><p><?php echo $res['country_of_citizenship']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2"> Website</th><td><p><?php echo $res['website']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Country of incorporation</th><td><p><?php echo $res['country_of_incorporation']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Country of Residence</th><td><p><?php echo $res['country_of_residence']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Gender</th><td><p><?php echo $res['gender']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Areas of Expertise and Interest</th><td><p><?php echo $res['expertise']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Relevant Publications or Research Outputs</th><td><p><?php echo $res['publications']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Qualifications and Experience</th><td><p><?php echo $res['expertise']; ?></p></td>
        </tr>
        <!-- <tr>
            <td colspan="2"><p></p> </td>
        </tr> -->
        </tbody>
    </table>
	
	
	
	
	
    <?php  $collaborators =$review_data["collaborators"]; ?>

     <?php for($i=0; $i<count($collaborators); $i++): ?>
            <?php $res =  $collaborators[$i]; ?>
     <h5>Collaborator <?php echo $i+1; ?></h5>
    <table class="table table-striped table-bordered table-condensed">
        <tbody>
		<tr>
            <th colspan="2">Name</th> <td><p><?php echo $res["first_name"]." ".$res["last_name"]; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Email</th> <td><p><?php echo $res["email"]; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Phone Number</th> <td><p><?php echo $res["telephone"]; ?></p></td>
        </tr>
        <tr>
            <th  colspan="2">Designation</th> <td><p><?php echo $res['designation']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Institution or organization Name</th> <td><?php echo $res["organization"] ?></td>
        </tr>
        
        <tr>
            <th>Country of citizenship</th> <td><?php echo $res["country_of_citizenship"] ?></td>
        </tr>
        <tr>
            <th>Office address</th> <td><?php echo $res["office_address"] ?></td>
        </tr>
        <tr>
            <th  colspan="2">IDRC Affiliation (if any)</th> <td><p><?php echo 'idrc affiliation'; ?></p></td>
        </tr>

        <tr>
            <th colspan="2">Country of Citizenship</th><td><p><?php echo $res['country_of_citizenship']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2"> Website</th><td><p><?php echo $res['website']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Country of incorporation</th><td><p><?php echo $res['country_of_incorporation']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Country of Residence</th><td><p><?php echo $res['country_of_residence']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Gender</th><td><p><?php echo $res['gender']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Areas of Expertise and Interest</th><td><p><?php echo $res['expertise']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Relevant Publications or Research Outputs</th><td><p><?php echo $res['publications']; ?></p></td>
        </tr>
        <tr>
            <th colspan="2">Qualifications and Experience</th><td><p><?php echo $res['expertise']; ?></p></td>
        </tr>
        </tbody>
    </table>

    <?php endfor; ?>
    <?php endif; ?>

    <div class="clr clearfix"></div>

    <!-- Study info -->
</div>
</div>
</div>
</div>

