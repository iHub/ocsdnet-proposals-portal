<div class="main-heading">
	<div class="container">
		<h1>Reset password</h1>
	</div>
</div>
<div class="container main-container">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="login-form">
			<?php $form_attributes = array('class' => 'form-horizontal');
			echo form_open('auth/email_exists', $form_attributes);
			echo $this -> session -> flashdata('message');
			
			?>
			
			<div class="error-messages">
				<?php echo validation_errors(); ?>
			</div>
			
			<div class="form-fields">
				<div class="form-group" align="center">
					<label  class="control-label"  >Email address</label>
					<?php echo form_input(textInputBuilder("email_reset", @$email_reset)); ?>
				</div>
				<div class="form-group">
					<div class="login-container">
						<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn-lg btn-block">
							Reset password
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

