<div class="main-heading">
	<div class="container">
		<h1>User Login</h1>
	</div>
</div>
<div class="container main-container">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="login-form">
			<h3>User Login</h3>
			<?php $form_attributes = array('class' => 'form-horizontal');
			echo form_open('auth/login', $form_attributes);
			echo $this -> session -> flashdata('message');
			
			?>
			
			<div class="error-messages">
				<?php echo validation_errors(); ?>
			</div>
			<div class="form-fields">
				<div class="form-group">
					<label  class="control-label">Email Address</label>
					<?php echo form_input(textInputBuilder("email", @$form["email"])); ?>
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<?php echo form_password(textInputBuilder("password", @$form["password"])); ?>
				</div>
				<div class="form-group">
					<div class="login-container">				
						<button type="submit" class="btn btn-primary btn-lg btn-block">
							Login
						</button>
						
						<div class="clr"></div>
						
						<div class="col-md-7" align="left">		
							<br/>Not a member? <a href="<?php echo site_url("register") ?>">Register</a>
						</div>
						<div class="col-md-5" align="right">
						<br/><a href="<?php echo site_url("auth/password_reset")?>">Forgot password</a>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>