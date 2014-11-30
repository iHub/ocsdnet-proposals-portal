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
				    <h2>Parallel Funding Source</h2>
					<form role="form" action="<?php echo base_url(); ?>index.php/budget/editbudget"  id="optionTemplate" class="funding-info form-group" >
						<input type="hidden" name="budget_id" value="<?php  if ($present) { echo $budget['id'];} ?>" />
						<div class="form-group">
							<label for="donor">Donor</label>
							<input type="text" name="donor" value="<?php  if ($present) { echo $budget['donor'];} ?>" class="form-control" id="donor" placeholder="">
						</div>
						<div class="form-group">
							<label for="amount">Amount</label>
							<input type="text" name="amount" value="<?php  if ($present) { echo $budget['amount'];} ?>" class="form-control" id="amount" placeholder="">
						</div>
						<div class="form-group">
							<label for="currency">Currency</label>
							<input type="text"  name="currency" value="<?php  if ($present) { echo $budget['currency'];} ?>" class="form-control" id="currency" placeholder="">
						</div>
						<div class="form-group">
							<label for="timeFrame">Timeframe</label>
							<input type="text" value="<?php if ($present) { echo $budget['timeframe'];} ?>" name="timeframe" class="form-control" id="timeFrame" placeholder="">
						</div>
						<button type="submit" class="btn btn-default">
							Save edit
						</button>
						 <a href="<?php echo base_url();?>index.php/preview" class="btn btn-default pull-right" > Back </a>   
					</form>
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