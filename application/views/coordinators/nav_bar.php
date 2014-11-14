<?php 
$user_data = $this -> session -> userdata("user_data");
$role_id = $user_data['user_role_id'];
?>


<!-- navigation -->
<div class="container-fluid">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li <?php echo($active_menu == 1 ? "class='active'" : ""); ?> >
                    <a href="<?php echo site_url('coordinators'); ?>"> <i class="glyphicon glyphicon-list-alt"></i> Concept notes</a>
                </li>
                <li <?php echo($active_menu == 2 ? "class='active'" : ""); ?>>
                    <a href="<?php echo site_url('coordinators/panel'); ?>"> <i class="glyphicon glyphicon-user"></i> Coordinators</a>
                </li>
                <li <?php echo($active_menu == 3 ? "class='active'" : ""); ?> >
                    <a href="<?php echo site_url('coordinators/advisors'); ?>"> <i class="glyphicon glyphicon-user"></i> Advisors</a>
                </li>
                <li <?php echo($active_menu == 4 ? "class='active'" : ""); ?> >
                    <a href="<?php echo site_url('coordinators/incompletes'); ?>"> <i class="glyphicon glyphicon-list-alt"></i> Incomplete concept notes</a>
                </li>
                      
                <li <?php echo($active_menu == 5 ? "class='active'" : ""); ?> >
                    <a href="<?php echo site_url('coordinators/reviewed'); ?>"> <i class="glyphicon glyphicon-gift"></i> Reviewed concept notes</a>
                </li>
                 <li <?php echo($active_menu == 6 ? "class='active'" : ""); ?> >
                    <a href="<?php echo site_url('coordinators/shortlisted'); ?>"> <i class="glyphicon glyphicon-ok-circle "></i> Shortlisted</a>
                </li>

                <?php if($role_id==4): ?>
                    <li><a href="<?php echo site_url("admin"); ?>">Admin</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo site_url("auth/logout");  ?>"><i class="glyphicon glyphicon-lock"></i> Logout </a> 
                </li>
            </ul>
        </div>

    </nav>
</div>
<!-- end navigation -->
