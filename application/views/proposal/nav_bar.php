<!-- navigation -->
        <ul class="nav nav-tabs" role="tablist">
          <li <?php echo ($active_menu==1 ? "class='active'" : ""); ?> ><a href="<?php echo site_url("submit_proposal"); ?>">Primary Researcher Information</a></li>
          <li <?php echo ($active_menu==2 ? "class='active'" : ""); ?>><a href="<?php echo site_url("submit_proposal/view_collaborators"); ?>">Research Team Information</a></li>
          <li <?php echo ($active_menu==3 ? "class='active'" : ""); ?> ><a href="<?php echo site_url("submit_proposal/view_study_info"); ?>">Proposed Research Study Information</a></li>
          <li <?php echo ($active_menu==4 ? "class='active'" : ""); ?> ><a href="<?php echo site_url("submit_proposal/get_proposals"); ?>">Preview your Concept Note</a></li>
          <li><a href="<?php echo site_url("auth/logout");  ?>">Logout</a></li>
        </ul>
        <!-- end navigation -->