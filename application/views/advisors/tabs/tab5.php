<?php
include ("nav_bar.php");
?>

<div class="error-messages">
	<?php echo(isset($error_msg) ? $error_msg : ""); ?>
	<?php echo $this->session->flashdata("incomplete_review"); ?>
</div>

<?php
$form_attributes = array('class' => 'form-horizontal');
echo form_open('advisors/save_tab/5', $form_attributes);
?>
<div class="form-fields">

	<div class="form-group">
		<div class="col-md-12">
			<label class="control-label">Any additional feedback to give to the applicant?</label>
			<span class="help-block">(Note any especially strong elements; areas that should be improved to strengthen the application)</span>
			<?php echo form_textarea(textAreaBuilder("reviewer_comments", @$comments["reviewer_comments"])); ?>
		</div>
	</div>
	<div >
<br>
		<span  class="label label-danger">Once you submit, you will NOT be able to edit your review any further</span>
	</div>
<br>
	
</div>
<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">
				Submit Review
			</button>
		</div>
	</div>
</form>

