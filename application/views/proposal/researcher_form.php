<script src='<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js'></script>

<script type='text/JavaScript'>
	jQuery('document').ready(function(){
		
		$("textarea").addClass("ckeditor");
		
});
 
</script>



<div class="main-heading">
	<div class="container">
		<h1>Primary researcher Information</h1>
	</div>
</div>
<div class="main-component">
<div class="container">
		<!-- navigation -->
        <?php include_once("nav_bar.php"); ?>
               
<?php
$form_attributes = array('class' => 'form-horizontal');
echo form_open('submit_proposal/save_researchers', $form_attributes);
?>
<div class="error-messages">
   <?php echo validation_errors(); ?>
</div>
<!-- First name & Last name -->
<div class="clonefields">
	<div id="clonedInput1" class="clonedInput">
		<div class="col-md-6">
			<div class="form-fields">
				<div class="form-group">
					<label  class="control-label">First Name *</label>
					<?php echo form_input(textInputBuilder("first_name", @$form["first_name"])); ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-fields">
				<div class="form-group">
					<label  class="control-label">Last Name *</label>
					<?php echo form_input(textInputBuilder("last_name", @$form["last_name"])); ?>
				</div>
			</div>
		</div>
		
		<!-- Gender & designation -->
		<div class="col-md-6">
			<div class="form-fields">
				<div class="form-group">
					<label  class="control-label">Gender *</label>
					<?php if(isset($form["gender"])): ?>
						<select  name ="gender">
						 <?php foreach ($gender_array as $key => $value): ?>
						 <?php if(strcasecmp($form['gender'], $value)==0): ?>
						     <option value="<?php echo $key; ?>" selected="$key"><?php echo $value; ?></option>
						     <?php else: ?>
						     	<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
						     <?php endif; ?>
						 <?php endforeach; ?>
						</select>
					<?php else: ?>
					     <?php echo form_dropdown("gender", $gender_array, "large"); ?>
					<?php endif; ?>	
	
				</div>
			</div>
		</div>
		
		<!-- Designation -->
		<div class="col-md-6">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Designation</label>
					<?php echo form_input(textInputBuilder("designation", @$form["designation"])); ?>
				</div>
			</div>
		</div>
		
		<!-- Telephone & Website -->
		<div class="col-md-6">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Telephone *</label>
					<?php echo form_input(textInputBuilder("telephone", @$form["telephone"])); ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-fields">
				<?php
				  $email_input_array = textInputBuilder("email", @$form["email"]);
				  $email_input_array['readonly'] = true;
				?>
				<div class="form-group">
					<label class="control-label">Email Address *</label>
					<?php echo form_input($email_input_array); ?>
				</div>
			</div>
		</div>
		
		<!-- Website -->
		<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
					<label class="control-label">Website</label>
					</div>
					<div class="col-md-6">
					<?php echo form_input(textInputBuilder("website", @$form["website"])); ?>
					</div>
					
					<div class="col-md-6"></div>
				</div>
		</div>
		
		<!-- Area of expertise -->
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Area of Expertise and Interest *</label>
					<?php echo form_textarea(textAreaBuilder("expertise", @$form["expertise"])); ?>
					<span class="help-block">(List max. 5 in order of preference. If your project covers more than one area of expertise and interest, separate each entry with a comma)</span>
				</div>
			</div>
		</div>
		
		<!-- Publications -->
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">List up to 5 relevant publications or research outputs*</label>
					<?php echo form_textarea(textAreaBuilder("publications", @$form["publications"])); ?>
					<span class="help-block">(e.g. -‐ videos, policy brief, software, tools, dataset etc. Please include links to the publications where applicable)</span>
				</div>
			</div>
		</div>
		
		
					
		
		
		<!-- Research Institution -->
		<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
					<label  class="control-label">Research Institution/ Organization Name *</label>
					</div>
					<div class="col-md-6">
					<?php echo form_input(textInputBuilder("organization", @$form["organization"])); ?>
					</div>
					
					<div class="col-md-6"></div>
				</div>
		</div>
		
		<!-- Country of Incorporation -->
		<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
					<label  class="control-label">Country of Incorporation *</label>
					</div>
					<div class="col-md-6">
						
					<?php if(isset($form["country_of_incorporation"])): ?>
						<select name="country_of_incorporation">
						 <?php foreach ($countries as $key => $value): ?>
						 <?php if(strcasecmp($form['country_of_incorporation'], $value)==0): ?>
						        <option value="<?php echo $key; ?>" selected="$key"><?php echo $value; ?></option>
						     <?php else: ?>
						     	<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
						     <?php endif; ?>
						 <?php endforeach; ?>
						</select>
					<?php else: ?>
					     <?php echo form_dropdown("country_of_incorporation", $countries, "large"); ?>
					<?php endif; ?>	
					
					</div>
					<div class="col-md-6"></div>
				</div>
		</div>
		
		<!-- Office address -->
		<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
					<label class="control-label">Office Address *</label>
					<?php echo form_textarea(textAreaBuilder("office_address", @$form["office_address"])); ?>
				</div>
			</div>
		</div>
		
		<!-- Country of residence -->
		<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
					<label  class="control-label">Country of residence *</label>
					</div>
					<div class="col-md-6">
					<?php if(isset($form["country_of_residence"])): ?>
						<select name="country_of_residence">
						 <?php foreach ($countries as $key => $value): ?>
						 <?php if(strcasecmp($form['country_of_residence'], $value)==0): ?>
						        <option value="<?php echo $key; ?>" selected="$key"><?php echo $value; ?></option>
						     <?php else: ?>
						     	<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
						     <?php endif; ?>
						 <?php endforeach; ?>
						</select>
					<?php else: ?>
					     <?php echo form_dropdown("country_of_residence", $countries, "large"); ?>
					<?php endif; ?>
						
					</div>
					
					<div class="col-md-6"></div>
				</div>
		</div>
		
		<!-- Country of citizenship -->
		<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
					<label class="control-label">Country of citizenship *</label>
					</div>
					<div class="col-md-6">
					<?php if(isset($form["country_of_citizenship"])): ?>
						<select name="country_of_citizenship">
						 <?php foreach ($countries as $key => $value): ?>
						 <?php if(strcasecmp($form['country_of_citizenship'], $value)==0): ?>
						     <option value="<?php echo $key; ?>" selected="$key"><?php echo $value; ?></option>
						     <?php else: ?>
						     	<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
						     <?php endif; ?>
						 <?php endforeach; ?>
						</select>
					<?php else: ?>
					     <?php echo form_dropdown("country_of_citizenship", $countries, "large"); ?>
					<?php endif; ?>
					</div>
					
					<div class="col-md-6"></div>
				</div>
		</div>
				
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Role in project</label>
					<?php echo form_textarea(textAreaBuilder("role_in_project", @$form["role_in_project"])); ?>
					<span class="help-block">(e.g.– Principal researcher, research collaborator, research assistant, external advisor)</span>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Previous affiliation with IDRC? </label>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default btn-danger <?php echo ( strcasecmp(@$form["idrc_affiliation"], '') == 0 ? "active" : "");  ?>">
							<input type="radio" class="aft-toggle" value="0"  name="toggle-affiliation" <?php echo ( strcasecmp(@$form["idrc_affiliation"], '') == 0 ? "checked" : "");  ?>/>
							No
						</label>
						
						<label class="btn btn-success btn-default <?php echo ( strcasecmp(@$form["idrc_affiliation"], '') == 0 ? "" : "active");  ?>">
							<input type="radio" class="aft-toggle" value="1"  name="toggle-affiliation"  <?php echo ( strcasecmp(@$form["idrc_affiliation"], '') == 0 ? "" : "checked");  ?>/>
							Yes						</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12" id="aft">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">If yes, provide details of previous affiliation with IDRC. Project/event name, year and researcher(s) role should be mentioned here.</label>
					<?php echo form_textarea(textAreaBuilder("idrc_affiliation", @$form["idrc_affiliation"])); ?>
				</div>
			</div>
		</div>
		
		
		
	</div>
   
</div>

<div class="clearfix visible-xs-block"></div>

<div class="container-fluid">
	<div class="text-center">
		
		<button type="submit" class="btn btn-primary btn-lg">
			Save &amp; Continue
		</button>
	</div>
</div>

</form>
</div>
<p></p>
<p></p>
</div>

