<?php
include ("review_nav_bar.php");
?>

<div class="error-messages">
	<?php echo(isset($error_msg) ? $error_msg : ""); ?>
	<?php echo $this->session->flashdata("incomplete_review"); ?>
</div>

<?php
$form_attributes = array('class' => 'form-horizontal');
echo form_open('coordinators/save_coordinators_comment/5', $form_attributes);
?>
<div class="form-fields">

	<div class="form-group">
		<div class="col-md-12">
			<label class="control-label">Any additional feedback to give to the applicant?</label>
			<span class="help-block">(Note any especially strong elements; areas that should be improved to strengthen the application)</span>
			
			<!-- comments hapa -->
			<?php foreach ($reviewss as $key => $reviews) {?>
			<div class="panel panel-default">
                        
				  <div class="panel-heading">
                    <h3 class="panel-title">Reviewer: <?php echo $reviews['advisor_details']['last_name']." ".$reviews['advisor_details']['first_name']; ?></h3>
                  </div> 
                  <div class="panel-body">
			<?php 
			if (!empty($reviews['advisor_details']['comment'])) {
			echo $reviews['advisor_details']['comment'];
				
			 }else{
				echo "No additional comment";
			}
			?>
				</div>
			</div>
			<?php }
			$proposal_id = $this -> session -> userdata("proposal_id");
			$user_data = $this->session->userdata("user_data");
			if($user_data['user_role_id'] == 1){ ?>
				<br><label>Please add your comment below</label>
				<textarea id="c_comment" name="c_comment" class="form-control add"
                                  ng-model="formData.description" name="description" required
                                  rows="3"><?php if (!empty($comments["reviewer_comments"])) {
                                  		echo $comments["reviewer_comments"]; 
                                  }
                                  	?></textarea>
				<div class="form-group">
                 &nbsp;&nbsp;&nbsp;<label class="radio-inline">
                 <input type="radio" name="funded" id="fully_funded" value="2"> Fully funded
                </label>
                <label class="radio-inline">
                  <input type="radio" name="funded" id="partially_funded" value="1"> Partially funded
                </label>
                <label class="radio-inline">
                  <input type="radio" name="funded" id="not_funded" value="3"> Not funded
                </label>
            </div>
<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">
				Submit Review
			</button>
		</div>
	</div>
</form>
			<?php } ?>
			
			<!-- Coordinator's chance -->
		</div>
	</div>
	<div >
<br>
	</div>
<br>
	
</div>

