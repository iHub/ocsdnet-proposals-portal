<div class="main-heading">
	<div class="container">
		<h1>Add coordinator</h1>
	</div>
</div>
<div class="container main-container">
<!-- navigation -->
<?php
	include_once ("nav_bar.php");
 ?>
	<div class="col-md-4"></div>
	<div class="col-md-4">
			<?php $form_attributes = array('class' => 'form-horizontal', "id" => "frm_add_user");
			echo form_open('coordinators/add_sys_user', $form_attributes);
			?>
			   <div class="error-messages">
				<?php echo validation_errors(); ?>
			   </div>
				<div class="form-fields">
					<div class="form-group">
						<label  class="control-label">Email Address</label>
						<?php echo form_input(textInputBuilder("email", @$form["email"])); ?>
					</div>
					<input type="hidden" name="user_role_id" value="1" />
					
					<div class="form-group">
						
								<button type="submit" class="btn btn-primary" >
									Add coordinator
								</button>
								
								<a class="btn btn-success" href="<?php echo site_url("coordinators/panel") ?>">
									Cancel
								</a>
								
					</div>
				</div>
			</form>	
	</div>
	<div class="col-md-4"></div>
</div>

<script>
	var el = document.getElementById('frm_add_user');

	el.addEventListener('submit', function() {
		return confirm('A confirmation e-mail will be sent to the newly added coordinator');
	}, false);
</script>
