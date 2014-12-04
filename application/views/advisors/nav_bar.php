<!-- navigation -->
<div class="container-fluid">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li <?php echo ($active_menu==1 ? "class='active'" : ""); ?> ><a href="<?php echo site_url('advisors'); ?>"> <i class="glyphicon glyphicon-list-alt"></i> Review Concept Notes</a></li>
                <li <?php echo ($active_menu==2 ? "class='active'" : ""); ?>><a href="<?php echo site_url('advisors/panel'); ?>"> 
                    <i class="glyphicon glyphicon-user"></i> My Advisor Profile</a>
                </li>
                
                 <li <?php echo ($active_menu==3 ? "class='active'" : ""); ?>><a href="<?php echo site_url('advisors/print_preview_forms'); ?>"> 
                    <i class="glyphicon glyphicon-file"></i> Download review form</a>
                </li>
                 <li <?php echo($active_menu == 4 ? "class='active'" : ""); ?> >
                    <a href="<?php echo site_url('advisors/shortlisted'); ?>"> <i class="glyphicon glyphicon-ok-circle "></i> Shortlisted</a>
                </li>
            </ul>
            <!-- 
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo site_url("auth/logout");  ?>"> <i class="glyphicon glyphicon-lock"></i> Logout </a> </li>
            </ul> -->
        </div>

    </nav>
</div>
<!-- end navigation -->