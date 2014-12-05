<div class="container">

  <div class="content">

      

      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
                Proposals Assigned
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

               <h4><?php echo $reviewer_status; ?></h4> 
              <div class="table-responsive">
          

   <table 
                class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                data-provide="datatable" 
                data-display-rows="10"
                data-info="true"
                data-search="true"
                data-length-change="true"
                data-paginate="true"
              >
    <?php if (count($proposals)>0) {
			
		?>
    <thead>
        <tr>
        	<th class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
            </th>
            <th data-filterable="true" data-sortable="true">#</th>
             <th data-filterable="true" data-sortable="true" data-direction="desc">Researcher Name</th>
            <th data-filterable="true" data-sortable="true" data-direction="desc">Project title</th>
             <th data-filterable="true" data-sortable="true">Status</th>
            <th data-filterable="false" data-sortable="false">Review</th>
            <th data-filterable="false" data-sortable="false">Pdf</th>
            
        </tr>
    </thead>
    <tbody>
    	<?php 
    	
    	for($i=0; $i<count($proposals); $i++): ?>
        <tr>
        	<td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
            </td>
            <td><?php echo $i + 1; ?></td>
            
            <td><?php echo $proposals[$i]["researcher"]['first_name']." ".$proposals[$i]["researcher"]['last_name']; ?></td>
            <td><?php echo $proposals[$i]["study_title"]; ?></td>
            <?php $id = $proposals[$i]["id"]; ?>
            <?php $proposal_id = $proposals[$i]["id"]; ?>
             <?php $status = strcasecmp($proposals[$i]["review_status"], "complete")==0; ?>
            <td>&nbsp;<?php echo ( $status ? "Completed" : "Pending"); ?></td>
            <?php if($status): ?>
            <td><a href="<?php echo site_url("advisors/review/$id") ?>" class="btn btn-success btn-sm">View review</a></td>
            <?php else: ?>
            <td><a href="<?php echo site_url("advisors/review/$id") ?>" class="btn btn-warning btn-sm">Edit review</a></td>
            <?php endif; ?>
            <td><a href="<?php echo site_url("advisors/print_preview_proposal/$id") ?>" class="btn btn-primary btn-sm">Download</a></td>
                       
        </tr>
    	
    	<?php endfor;
		
		}else{ ?>
			
			<tr><td>Once you are assigned proposals for review, they will appear here</td></tr>
		<?php } ?>
    </tbody>
</table>
              </div> <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        

        </div> <!-- /.col -->

      </div> <!-- /.row -->

</div>
</div>
  <script src="<?php echo base_url(); ?>public/review/js/jquery-2.0.0.min.js"></script>
  <script src="<?php echo base_url(); ?>public/review/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url(); ?>public/review/js/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
  <script src="./js/libs/excanvas.compiled.js"></script>
  <![endif]-->
  
  <!-- Plugin JS -->
  <script src="<?php echo base_url(); ?>public/review/js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>public/review/js/plugins/datatables/DT_bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>public/review/js/plugins/tableCheckable/jquery.tableCheckable.js"></script>
  <!--<script src="./js/plugins/icheck/jquery.icheck.min.js"></script>-->

  <!-- App JS -->
  <script src="<?php echo base_url(); ?>public/review/js/target-admin.js"></script>
  