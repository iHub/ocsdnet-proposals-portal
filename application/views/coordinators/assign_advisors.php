<div class="main-heading">
	<div class="container">
		<h1>Assign advisor</h1>
	</div>
</div>
<div class="container main-container">
	<!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
        <div class="error-messages"><?php echo (isset($assignment_msg) ? $assignment_msg : ""); ?></div>
	<div class="col-md-2"></div>
	<div class="col-md-8">
			<h4>Study title: <?php echo $study_data["study_title"]; ?></h4>
			
			<?php if(isset($study_data['reviewer'])): ?>
			
			<?php $reviewer = $study_data['reviewer']; ?>
			
			<h5><?php echo "Assign an advisor"; ?></h5>
			<?php endif; ?>
			
			
			<?php
			$form_attributes = array('class' => 'form-horizontal', "id" => "frm_assign_advisor");
			echo form_open('coordinators/save_assignment', $form_attributes);
			?>
			   <input type="hidden" name="proposal_id" value="<?php echo $proposal_id ?>" />
				<div class="form-fields">
					
					<div class="form-group">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label"><?php echo (isset($study_data['reviewer']) ? "Assign advisor" : "Assign advisor") ?> </label>
						&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_dropdown("advisor", $advisors, "large"); ?>
					</div>
					
					<div class="form-group">
						<div class="login-container">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">
									Assign advisor
								</button>
							</div>
							<div class="clr"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	<div class="col-md-2"></div>
</div>


<?php if(isset($study_data['reviewer'])): ?>
<script>
	var el = document.getElementById('frm_assign_advisor');

	el.addEventListener('submit', function() {
		return confirm('Re-assigning this Concept Note will negate the review carried out by the current advisor. Are you sure you wish to re-assign the concept note?');
	}, false);
</script>
<?php endif; ?>
