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
			echo form_open_multipart('admin/save_tab', $form_attributes);
			
		?>
		
		<div class="error-messages">
				<?php echo validation_errors(); ?>
				<?php $message = $this -> session -> flashdata('tab_message'); ?>
				<?php echo ($message ? $message : ""); ?>
		</div>
		
		<?php if(isset($form['id'])): ?>
		   <input type="hidden" name="tab_id" value="<?php echo $form['id'] ?>" />
		<?php endif; ?>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label">Review tab</label>
				</div>
				<div class="col-md-8">
					<?php echo form_input(textInputBuilder("tab", @$form["tab"])); ?>
				</div>

				<div class="col-md-4"></div>
			</div>
		</div>
		
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Review tab description</label>
					<?php echo form_textarea(textAreaBuilder("description", @$form["description"])); ?>
				</div>
			</div>
		</div>
		
		<div class="clearfix visible-xs-block"></div>

		<div class="container-fluid">
			<div class="text-center">

				<button type="submit" class="btn btn-primary btn-lg">
				Save tab
				</button>
			</div>
		</div>
		
		</form>
	</div>
</div>

