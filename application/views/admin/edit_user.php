<div class="main-heading">
	<div class="container">
		<h1>Edit user</h1>
	</div>
</div>
<div class="container main-container">
	<!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="login-form">
			<h3>Enter user details</h3>
			<?php
			$form_attributes = array('class' => 'form-horizontal');
			echo form_open('admin/save_user_edits', $form_attributes);
			?>
			   <div class="error-messages">
				<?php echo validation_errors(); ?>
			   </div>
			   <?php if(isset($form['id'])): ?>
			       <input type="hidden" name="user_id" value="<?php echo $form['id'] ?>" />
			   <?php endif; ?>
				<div class="form-fields">
					<div class="form-group">
						<label  class="control-label">First name</label>
						<?php echo form_input(textInputBuilder("first_name", @$form["first_name"])); ?>
					</div>
					<div class="form-group">
						<label  class="control-label">Last name</label>
						<?php echo form_input(textInputBuilder("last_name", @$form["last_name"])); ?>
					</div>
					
					<?php
				  		$email_input = textInputBuilder("email", @$form["email"]);
				  		$email_input['readonly'] = true;
				    ?>
					<div class="form-group">
						<label  class="control-label">Email Address</label>
						<?php echo form_input($email_input); ?>
					</div>
					
					<div class="form-group">
						<label class="control-label">User role</label>
						<?php if(@$form['user_role_id']>0): ?>
							<select name="user_role_id">
								<?php foreach ($user_roles as $key => $value):?>
								  <?php if($key == $form['user_role_id']): ?>
								   		<option value="<?php echo $key; ?>" selected="$key"><?php echo $value; ?></option>
								  <?php else: ?>
								  		<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
								  <?php endif; ?>
								<?php endforeach; ?>
							</select>
						<?php else: ?>	
							<?php echo form_dropdown("user_role_id", $user_roles, "large"); ?>
						<?php endif; ?>
					</div>
					
					<div class="form-group">
						<div class="login-container">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">
									Update
								</button>
							</div>
							<div class="clr"></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>