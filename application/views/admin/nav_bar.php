<!-- navigation -->
<ul class="nav nav-tabs" role="tablist">
	<li <?php echo($active_menu == 1 ? "class='active'" : ""); ?>> <a href="<?php echo site_url('admin'); ?>">Users</a></li>
	<li <?php echo($active_menu == 2 ? "class='active'" : ""); ?> ><a href="<?php echo site_url('admin/review_tabs'); ?>">Review tabs</a></li>
	<li><a href="<?php echo site_url('coordinators'); ?>">Coordinators</a></li>
	<li><a href="<?php echo site_url("auth/logout"); ?>">Logout</a></li>
</ul>
<!-- end navigation -->