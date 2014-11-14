<div class="main-heading">
	<div class="container">
		<h2>Review tabs</h2>
	</div>
</div>
<div class="main-component">
	<div class="container">
		<!-- navigation -->
		<?php
		include_once ("nav_bar.php");
		?>
		<?php $form_attributes = array('class' => 'form-horizontal');
			echo form_open_multipart('admin/save_questions', $form_attributes);
			
		?>
		
		<div class="error-messages">
				<?php echo validation_errors(); ?>
				<?php //$message = $this -> session -> flashdata('tab_message'); ?>
				<?php //echo ($message ? $message : ""); ?>
		</div>
		
		<?php if(isset($form['id'])): ?>
		   <input type="hidden" name="id" value="<?php echo $form['id'] ?>" />
		<?php endif; ?>
		
		<?php if(isset($form['tab_id'])): ?>
		   <input type="hidden" name="tab_id" value="<?php echo $form['tab_id'] ?>" />
		<?php endif; ?>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label">Question type</label>
				</div>
				<div class="col-md-8">
					<?php if(@$form['type_id']>0): ?>
							<select name="type_id">
								<?php foreach ($question_types as $key => $value):?>
								  <?php if($key == $form['type_id']): ?>
								   		<option value="<?php echo $key; ?>" selected="$key"><?php echo $value; ?></option>
								  <?php else: ?>
								  		<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
								  <?php endif; ?>
								<?php endforeach; ?>
							</select>
						<?php else: ?>	
							<?php echo form_dropdown("type_id", $question_types, "large"); ?>
						<?php endif; ?>
					
					
				</div>

				<div class="col-md-4"></div>
			</div>
		</div>
		
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Question</label>
					<?php echo form_textarea(textAreaBuilder("question", @$form["question"])); ?>
				</div>
			</div>
		</div>
		
		<div class="clearfix visible-xs-block"></div>

		<div class="container-fluid">
			<div class="text-center">

				<button type="submit" class="btn btn-primary btn-lg">
				Save question
				</button>
			</div>
		</div>
		
		</form>
	</div>
</div>

