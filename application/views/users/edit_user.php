
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
        <form  class="collaborator-info" action="">
            <fieldset>
              <h3 class="fs-subtitle">Edit Collaborators</h3>
              <div class="col-md-6">
                <input type="hidden" id="researcher_id" name="researcher_id" value=""/>
                <div class="form-group">
                  <label for="pdName">Name</label><br/>
                  <input type="text" name="name" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdEmail">Email address</label><br/>
                  <input type="email" name="email" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdD">Designation</label><br/>
                  <input type="text" name="designation" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdPhoneNumber">Telephone Number</label><br/>
                  <input type="text" name="phone" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdCoCi">Country of incorporation</label><br/>
                  <input type="text" name="countryincorporation" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pd">IDRC Affiliation (if any)</label><br/>
                  <input type="text" name="affliation" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdCoR">Country of Residence</label>
                  <br/>
                  <input type="text" name="residence" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdCoc">Country of Citizenship</label><br/>
                  <input type="text" name="citizenship" placeholder="" class="form-control"/>
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
                <div class="form-group">
                  <label for="pdIoRn">Institution or organization name</label><br/>
                  <input type="text" name="organization" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdOa">Office Address</label><br/>
                  <textarea name="address" placeholder="" rows="3" class="form-control ckeditor"></textarea>
                </div>
              </div>
              <div class="col-md-6">                                     
                <div class="form-group">
                  <label for="pdAoEaI">Areas of Expertise and Interest</label>
                  <br/>
                  <textarea type="text" name="expertise" placeholder="" class="form-control ckeditor" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="pdRPoRO">Relevant Publications or Research Outputs</label>
                  <br/>
                  <textarea type="text" name="publications" placeholder="" class="form-control ckeditor" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="pd">Website</label>
                  <br/>
                  <input type="text" name="website" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdCoI">Country of incorporation</label>
                  <br/>
                  <input type="text" name="countryincorporation" placeholder="" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="pdCoI">Role in Proposed Projec</label>
                  <br/>
                  <input type="text" name="role" placeholder="" class="form-control"/>
                </div>
              </div>
              <div class="col-md-12">
              
               <button type="submit" class="btn btn-default">Save Edit </button>  
               <a href="javascript:;" class="btn btn-default pull-right" > Back </a>                                        
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

  


  
</body>
</html>