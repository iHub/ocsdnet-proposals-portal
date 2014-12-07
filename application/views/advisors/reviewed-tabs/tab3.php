<?php
$review_tab = $tab_data["review_tab"];
$questions = $tab_data["questions"];
$question_options = $tab_data["question_options"];
include ("review_nav_bar.php");
?>
<h5><?php echo $review_tab["description"] ?></h5>

<div class="error-messages"> <?php echo (isset($error_msg) ? $error_msg : ""); ?> </div>
			
<?php
	$form_attributes = array('class' => 'form-horizontal');
	echo form_open('advisors/save_tab/1', $form_attributes);
?>
		   
	<div class="form-fields">
		 			
			<div  class="form-group">
	   <?php foreach($questions as $question_id=>$question_data): ?>
				  <label class="panel-heading">Q: <?php echo $questions[$question_id]["question"] ?> </label>
				  <?php foreach ($reviewss as $key => $reviews) {?>
				  <?php $type_id = $questions[$question_id]["type_id"]; ?>
				  <?php $options = $question_options[$question_id]; ?>
				  <div class="panel panel-default">
                        
				  <div class="panel-heading">
                    <h3 class="panel-title">Reviewer: <?php echo $reviews['advisor_details']['last_name']." ".$reviews['advisor_details']['first_name']; ?></h3>
                  </div> 
                  <div class="panel-body">
				  	<?php for($i=0; $i<count($options); $i++): ?>
				  		<?php 
				  		    $opt_id = $options[$i]["id"];
				  		    $opt = $options[$i]["option"];
							$desc = $options[$i]["description"];
							$option_label = $opt . " " . $desc;
				  		    $checked = (isset($reviews[$opt_id]) ? "checked" : ""); 
				  		?>
				  		           
				  <?php if($type_id == 1): 
				  		if($checked == "checked"):?>
				  	<div class="radio">
				      <label> 	
					     <input type="radio" name="r<?php echo $question_id; ?>"  value="<?php  echo $opt_id; ?>" <?php echo $checked ?>  >
					      <?php echo $option_label; ?>
					  </label>
				      </div>
				     <?php
				     endif;
				      else:
						  if($checked == "checked"): ?>
				  	
		          <div class="checkbox">
				      <label> 	
					     <input type="checkbox" name="c<?php echo $opt_id; ?>"  value="<?php  echo $opt_id; ?>" <?php echo $checked; ?> >
					     <?php echo $option_label; ?>
					  </label>
				 </div>
				 <?php 
				 endif;
				 endif; ?>
				 
			    <?php endfor; ?>
			    <br>
			    		<b>Comment:</b>
			    		<hr />
                        <?php if (!empty($reviews['comment'][$question_id])) {
                                  	echo $reviews['comment'][$question_id]; 
                                  }
                                  	?>
				  
			</div>
			</div>
	<?php } endforeach; ?>
			</div>
	
</div>
<div class="form-group">
    <div class="col-md-12">
    </div>
</div>
</form>
    <div class="col-md-12">
    	<a href="<?php echo site_url('advisors/review_proposal_tab/4'); ?>"><button class="btn btn-primary">Next</button></a>
        
		</div>
<br />
<br /><br /><br />
	
 
