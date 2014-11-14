<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>OCSD Net - Open and Collaborative Science</title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url(); ?>public/css/normalize.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>public/fonts/stylesheet.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>public/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>public/css/template.css" rel="stylesheet" type="text/css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/form.js"></script>
</head>

<body>
<header>
	<div class="container clearfix">
    
    	<div class="logo">
        <a href="http://ocsdnet.org/">
        	<img src="<?php echo base_url(); ?>public/images/logo.png" alt="" />
        </a>
        </div>
        
        <div class="top-right">
        	<div class="share-links clearfix">
                <label>Follow Us</label>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/OCSDNet" class="share-icon share-fb"></a></li>
                    <li><a target="_blank" href="https://twitter.com/OCSDNet" class="share-icon share-tw"></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/groups/Open-Collaborative-Science-in-Development-6727668" class="share-icon share-ln"></a></li>
                    <li><a target="_blank" href="https://plus.google.com/communities/110353447686859096400" class="share-icon share-gp"></a></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</header>
<div>
	<?php echo $body; ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	
</div>
 
<div class="copyright">
    <div class="container">
    <p> Text is available under the <a href="http://creativecommons.org/licenses/by/4.0/legalcode" target="_blank">Creative Commons Attribution-ShareAlike License;</a> additional terms may apply.</p>
    </div>
</div>
<!--js for Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54622583-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>

