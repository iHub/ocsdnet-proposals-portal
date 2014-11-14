<div class="main-heading">
	<div class="container">
		<h2>Review tabs</h2>
	</div>
</div>
<div class="main-component">
	<div class="container">
		<!-- navigation -->
		<?php include_once ("nav_bar.php"); ?>
		
		<h6><?php echo "Question: ". (isset($question_data) ? $question_data["question"] : ""); ?></h6>
		
		<?php $form_attributes = array('class' => 'form-horizontal');
			echo form_open_multipart('admin/save_options', $form_attributes);
			
		?>
		
		<div class="error-messages">
				<?php echo validation_errors(); ?>
				<?php //$message = $this -> session -> flashdata('tab_message'); ?>
				<?php //echo ($message ? $message : ""); ?>
		</div>
		
		<?php if(isset($form['id'])): ?>
		   <input type="hidden" name="id" value="<?php echo $form['id'] ?>" />
		<?php endif; ?>
		
		<?php if(isset($form['question_id'])): ?>
		   <input type="hidden" name="question_id" value="<?php echo $form['question_id'] ?>" />
		<?php endif; ?>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label">Question option</label>
				</div>
				<div class="col-md-6">
					<?php echo form_input(textInputBuilder("option", @$form["option"])); ?>
				</div>

				<div class="col-md-6"></div>
			</div>
		</div>
		
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Option description</label>
					<?php echo form_textarea(textAreaBuilder("description", @$form["description"])); ?>
				</div>
			</div>
		</div>
		
		<div class="clearfix visible-xs-block"></div>

		<div class="container-fluid">
			<div class="text-center">

				<button type="submit" class="btn btn-primary btn-lg">
				Save question option
				</button>
			</div>
		</div>
		
		</form>
	</div>
</div>

