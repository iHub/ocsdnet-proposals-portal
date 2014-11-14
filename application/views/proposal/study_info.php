<script src='<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js'></script>

<script type='text/JavaScript'>
	jQuery('document').ready(function(){
		
		$("textarea").addClass("ckeditor");
		
});
</script>


<div class="main-heading">
	<div class="container">
		<h2>Proposed Research Study Information</h2>
	</div>
</div>
<div class="main-component">
	<div class="container">
		<!-- navigation -->
		<?php
		include_once ("nav_bar.php");
		?>
		<?php $form_attributes = array('class' => 'form-horizontal');
			echo form_open_multipart('submit_proposal/save_study_info', $form_attributes);
			
		?>
		
		<div class="error-messages">
				<?php echo validation_errors(); ?>
		</div>
		<div class="clonefields">
			<div id="clonedInput1" class="clonedInput">
				<?php if(isset($form['id'])):?>
				<input name="proposal_id" type="hidden" value="<?php echo $form['id']; ?> " />
				<?php endif; ?>
				
				<?php
					$skills_array = textAreaBuilder("skills_summary", @$form["skills_summary"]);
					$skills_array['class'] = $skills_array['class'] . ' text_limit';
					$skills_array['data-wordlimit'] = 500;
				?>

				<div class="col-md-12">
					<div class="form-fields">
						<div class="form-group">
							<label class="control-label">Summary of Skills and Expertise *</label>
							<span class="help-block">Provide a brief narrative of the principal researcher's skills and relevant expertise that would be beneficial in conducting the proposed study. Summarily list details of relevant previous activities, especially those that have required techniques similar to those proposed in this study. List the additional expertise brought in by the research collaborator(s) or, explain how the collaborator(s) complements the principal researcher’s skill (if applicable)</span>
							<?php echo form_textarea($skills_array); ?>
							<span class="help-block limit-label">Word limit: 500</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix visible-xs-block"></div>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label">Study title *</label>
				</div>
				<div class="col-md-7">
					<?php echo form_input(textInputBuilder("study_title", @$form["study_title"])); ?>
				</div>

				<div class="col-md-5"></div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label">Countries covered *</label>
				</div>
				<div class="col-md-7">
					<?php echo form_input(textInputBuilder("countries_covered", @$form["countries_covered"])); ?>
					<span class="help-block">If your project covers more than one country, separate the country names with a comma</span>
				</div>

				<div class="col-md-5"></div>
			</div>
		</div>
        
        <?php 
			   $abstract_array = textAreaBuilder("abstract", @$form["abstract"]);
			   $abstract_array['class'] = $abstract_array['class'] . ' text_limit';
			   $abstract_array['data-wordlimit'] = 750;
		?>
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Abstract of the Research Proposal *</label>
					<span class="help-block">Describe the problem that you propose to study and the research questions that you want to answer, in the context of the topics and research themes outline in the Call. Summarize succinctly and clearly the development challenge being tackled, the overall context, rationale and significance of the proposed study within the overall context of the selected theme.</span>
					<?php echo form_textarea($abstract_array); ?>
					<span class="help-block limit-label">Word limit: 750</span>
				</div>
			</div>
		</div>
		
		 <?php
			$design_array = textAreaBuilder("design_and_methodologies", @$form["design_and_methodologies"]);
			$design_array['class'] = $design_array['class'] . ' text_limit';
			$design_array['data-wordlimit'] = 750;
		 ?>
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Outline the Design and Methodologies *</label>
					<span class="help-block">Describe briefly the research design and the methodologies for the project. In what ways are the design and methodologies supportive of the ideals of OCSDNet?</span>
					<?php echo form_textarea($design_array); ?>
					<span class="help-block limit-label">Word limit: 750</span>
				</div>
			</div>
		</div>
		
		<?php
			$outcomes_array = textAreaBuilder("outcomes_and_relevance", @$form["outcomes_and_relevance"]);
			$outcomes_array['class'] = $outcomes_array['class'] . ' text_limit';
			$outcomes_array['data-wordlimit'] = 500;
		?>
		 
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Expected Development‐related Outcomes and Relevance *</label>
					<span class="help-block">Describe the expected outcomes from the project and its usefulness for the proposed study as well as the overall context of OCSDNet, include policy relevance where appropriate.</span>
					<?php echo form_textarea($outcomes_array); ?>
					<span class="help-block limit-label">Word limit: 500</span>
				</div>
			</div>
		</div>
		
		<?php
			$me_array = textAreaBuilder("monitoring_and_evaluation", @$form["monitoring_and_evaluation"]);
			$me_array['class'] = $me_array['class'] . ' text_limit';
			$me_array['data-wordlimit'] = 500;
		?>
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label class="control-label">Monitoring and Evaluation *</label>
					<span class="help-block">Outline briefly the monitoring and evaluation plan being considered. How would meaningful success and impact be evaluated?</span>
					<?php echo form_textarea($me_array); ?>
					<span class="help-block limit-label">Word limit: 500</span>
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label">Quote the total budget of the proposed study (in Canadian Dollars) *</label>
				</div>
				<div class="col-md-6">
					<?php echo form_input(textInputBuilder("total_budget_cost", @$form["total_budget_cost"])); ?>
				</div>

				<div class="col-md-6"></div>
			</div>
		</div>
		
		
		
		<div class="col-md-12">
			<div class="form-fields">
				<div class="form-group">
					<label  class="control-label">Attach separately a letter of endorsement from your organization (in PDF format, with your organization's letterhead and an authorized signature) *</label>
					<?php echo form_upload("endorsment_letter");?>
					<?php if(isset($form['endorsment_letter'])): ?>
		              <input type="hidden" name="old_endorsment" value="<?php echo $form['endorsment_letter']; ?>" />
		              <label><strong>Endorsement attached</strong></label>
		            <?php endif; ?>
		            <p><?php echo $this -> session -> flashdata('endorsement_upload_error') ?></p>  
				</div>
			</div>
		</div>
		
		
		<div class="col-md-12">
		
			<div class="form-fields">
				<div class="form-group">
					<label  class="control-label">Attach separately the budget using the provided OCSDNet<a target="_blank" href="http://ocsdnet.org/downloads/OCSDNetBudgetTemplate.xlsx"> budget template</a>  for the project. *</label>
					<?php echo form_upload("budget");?>
							<?php if(isset($form['budget'])): ?>
		  						<input type="hidden" name="old_budget" value="<?php echo $form['budget']; ?>" />
		  						<label><strong>Budget attached</strong></label>
						    <?php endif; ?>
						    <p><?php echo $this -> session -> flashdata('budget_upload_error') ?></p>   
					 		
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
</div>

<div class="clearfix visible-xs-block"></div>

