
<?php error_reporting(E_ALL); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>OCSDNET</title>
        <link rel="icon" href="images/favicon.png">
        <link href="<?php echo base_url(); ?>public/new/css/demo_style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>public/new/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>public/new/css/smart_wizard.css" rel="stylesheet" type="text/css">

        <link href="<?php echo base_url(); ?>public/new/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/sticky-footer.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/new/css/form.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>public/new/css/custom.css" rel="stylesheet" type="text/css">
       </head><body>
  <header class="navbar navbar-inverse navbar-static-top wet-asphalt" role="banner">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="<?php echo base_url();?>public/new/images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="javascript:;">Item 1</a></li>
                    <li><a href="javascript:;">Item 2</a></li>
                     <li><a href="javascript:;">Item 3</a></li>
                    <li><a href="javascript:;">Item 4</a></li>
                    <li><a href="javascript:;">Item 5</a></li>
                    <li><a href="javascript:;">Item 6</a></li>-->
                    <li><a href="<?php echo base_url()?>index.php/auth/logout">Logout</a></li>
                </ul>
            </div>
          </div>
        </div>
    </header>
<div class="container">
    <div class="">
        <div class="col-md-12">
        <form  class="collaborator-info" action="<?php echo base_url();?>index.php/user/editpost">
          <fieldset>
                                          <h2 class="fs-title">Edit user</h2>
                                          <h3 class="fs-subtitle"></h3>
                                          <div class="col-md-6">
                                            <input type="hidden" id="researcher_id" name="researcher_id" value="<?php if ($present) {echo $user['researcher_id'];}?>"/>
                                            <input type="hidden" name="user_id" value="<?php if ($present) {echo $user['id'];}?>"/>
                                            <input type="hidden" name="user_role_id" value="<?php if ($present) {echo $user['user_role_id'];}?>"/>
                                            <div class="form-group">
                                              <label for="pdName">Name</label><br/>
                                              <input type="text" name="name" value="<?php if ($present) {echo $user['first_name'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdEmail">Email address</label><br/>
                                              <input type="email" name="email" value="<?php if ($present) {echo $user['email'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdPhoneNumber">Telephone Number</label><br/>
                                              <input type="text" name="phone" value="<?php if ($present) {echo $user['telephone'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                              <?php if($user['user_role_id']< 6){ ?>
                                            <div class="form-group">
                                              <label for="pdD">Designation</label><br/>
                                              <input type="text" name="designation" value="<?php if ($present) {echo $user['designation'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdPhoneNumber">Organization</label><br/>
                                              <input type="text" name="organization" value="<?php if ($present) {echo $user['organization'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="pdCoCi">Country of incorporation</label><br/>
                                              <input type="text" name="countryincorporation" value="<?php if ($present) {echo $user['country_of_incorporation'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pd">IDRC Affiliation (if any)</label><br/>
                                              <input type="text" name="affliation" value="<?php if ($present) {echo $user['idrc_affiliation'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoR">Country of Residence</label>
                                              <br/>
                                              <input type="text" name="residence" value="<?php if ($present) {echo $user['country_of_residence'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdCoc">Country of Citizenship</label><br/>
                                              <input type="text" name="citizenship" value="<?php if ($present) {echo $user['country_of_citizenship'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdGender">Gender</label>
                                              <br/>
                                              <label class="radio-inline">
                                                <input type="radio" name="gender" id="pdMale" value="male">
                                                Male </label>
                                              <label class="radio-inline">
                                                <input type="radio" name="gender" id="pdFemale" value="female">
                                                Female </label>
                                              <br/>
                                            </div>
                                            <?php } ?>
                                            
                                            <div class="form-group">
                                              <label for="pdOa">Office Address</label><br/>
                                              <textarea name="address" placeholder="" rows="3" class="form-control ckeditor"><?php if ($present) { echo $user['office_address'];}?></textarea>
                                            </div>
                                          </div>
                                          <div class="col-md-6">  
                                              <?php if($user['user_role_id']< 6){ ?>                                   
                                            <div class="form-group">
                                              <label for="pdAoEaI">Areas of Expertise and Interest</label>
                                              <br/>
                                              <textarea type="text" name="expertise" placeholder="" class="form-control ckeditor" rows="3"><?php if ($present) { echo $user['expertise'];}?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pdRPoRO">Relevant Publications or Research Outputs</label>
                                              <br/>
                                              <textarea type="text" name="publications" placeholder="" class="form-control ckeditor" rows="3"><?php if ($present) { echo $user['publications'];}?></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label for="pd">Website</label>
                                              <br/>
                                              <input type="text" name="website" value="<?php if ($present) { echo $user['website'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <?php } ?>
                                             <?php if($user['user_role_id']< 6){ ?>
                                            <div class="form-group">
                                              <label for="pdCoI">Country of incorporation</label>
                                              <br/>
                                              <input type="text" name="countryincorporation" value="<?php if ($present) { echo $user['country_of_incorporation'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            
                                            <?php } ?>
                                            <?php if($user['user_role_id']==5){ ?>
                                            <div class="form-group">
                                              <label for="pdCoI">Role in Proposed Project</label>
                                              <br/>
                                              <textarea  class="form-control ckeditor" name="role"><?php if ($present) { echo $user['role_in_project'];}?></textarea>
                                             
                                            </div>
                                            <?php } ?>
                                              <?php if($user['user_role_id']==7){ ?>
                                            <div class="form-group">
                                              <label for="pdCoI">Role in Proposed Project</label>
                                              <br/>
                                              <textarea  class="form-control ckeditor" name="role"><?php if ($present) { echo $user['role_in_project'];}?></textarea>
                                             
                                            </div>
                                            <?php } ?>
                                        
                                          <?php if($user['user_role_id'] > 5){ ?>
                                             <div class="form-group">
                                              <label for="piMA">Mailing Address</label><br/>
                                              <p class="lable-description">Including office or departmental name</p><br/>
                                              <textarea name="mailaddress" class="form-control ckeditor" rows="3"> <?php if ($present) { echo $user['mailing_address'];}?></textarea>
                                            </div>  
                                          <div class="form-group">
                                              <label for="piFoN">Finance Officer’s name</label><br/>
                                              <p class="lable-description" >Name for the main point of contact for financials</p><br/>
                                              <input type="text" name="financename" placeholder=""value="<?php if ($present) { echo $user['finance_name'];}?>" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piFoPN">Finance Officer phone number</label><br/>
                                              <p class="lable-description" >Phone number for the main point of contact for financials</p><br/>
                                              <input type="text" name="financephone" value="<?php if ($present) { echo $user['finance_phone'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="piFoE">Finance Officer Email</label><br/>
                                              <p class="lable-description" >Email address for the main point of contact for financials</p><br/>
                                              <input type="text" name="financeemail" value="<?php if ($present) { echo $user['finance_email'];}?>" placeholder="" class="form-control"/>
                                            </div>
                                           <?php } ?>
                                             </div>
                                          <div class="col-md-12">
                                               <?php if($user['user_role_id']< 6){ ?>
                                          <p>
                                            Qualifications and Experience
                                          </p>
                                          <p>
                                            Please upload an up-to-date curriculum vitae (CV). Your CV should include a chronological list of your work experience, qualifications,
                                            credentials, funded research projects (including those supported by the IDRC), language skills (spoken and written) and relevant publications.
                                          </p>
                                           <a href="<?php echo base_url(); ?>public/templates/CVTemplate.docx" class="btn btn-default " download>Download CV Template</a><br/><br/>
                                                                      <input type="file" name="qualification" /><br/>
                                            <?php } ?>
                                          
                                           <button type="submit" class="btn btn-default">Save and Add New</button> 
                                           <a href="<?php echo base_url();?>index.php/preview" class="btn btn-default pull-right" > Back </a>                                             
                                          </div>
                                          
                                        </fieldset>
          </form>
        </div>
    </div>
</div>
<div class="footer">
      <div class="container">
        <p class="text-muted">ocsdnet</p>
      </div>
</div>


  <script src="<?php echo base_url(); ?>public/new/js/jquery-2.0.0.min.js"></script>
  <script src="<?php echo base_url(); ?>public/new/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>public/new/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
  <script src="<?php echo base_url(); ?>public/new/js/custom/osdnet_validator.js"></script>
  <script src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>

  


  
</body>
</html>