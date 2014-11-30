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
    </head>
    <body>
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
                        <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>public/new/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!--<li><a href="javascript:;">Item 1</a></li>
                            <li><a href="javascript:;">Item 2</a></li>
                            <li><a href="javascript:;">Item 3</a></li>
                            <li><a href="javascript:;">Item 4</a></li>
                            <li><a href="javascript:;">Item 5</a></li>
                            <li><a href="javascript:;">Item 6</a></li>-->
                            <li>
                                <a href="<?php echo base_url()?>index.php/auth/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="">
                <div class="col-md-12">
                   <h2><?php echo $user['first_name'] ?>! Your proposal has been submitted.Thank you</h2>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <p class="text-muted">
                    ocsdnet
                </p>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>public/new/js/jquery-2.0.0.min.js"></script>
        <script src="<?php echo base_url(); ?>public/new/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/new/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>public/new/js/custom/osdnet_validator.js"></script>
        <script src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>

    </body>
</html>