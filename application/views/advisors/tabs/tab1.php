<?php
$review_tab = $tab_data["review_tab"];
$questions = $tab_data["questions"];
$question_options = $tab_data["question_options"];
include ("nav_bar.php");
?>
<h5><?php echo $review_tab["description"] ?></h5>

<div class="error-messages"> <?php echo (isset($error_msg) ? $error_msg : ""); ?> </div>
			
<?php
	$form_attributes = array('class' => 'form-horizontal');
	echo form_open('advisors/save_tab/1', $form_attributes);
?>
		   
	<div class="form-fields">
		 			
	   <?php foreach($questions as $question_id=>$question_data): ?>
			<div  class="form-group">
				  <label><?php echo $questions[$question_id]["question"] ?> </label>
				  <?php $type_id = $questions[$question_id]["type_id"]; ?>
				  <span class="help-block"><?php echo ($type_id == 2 ? "Select all that apply" : ""); ?></span>
				  
				  <?php $options = $question_options[$question_id]; ?>
				  
				  	<?php for($i=0; $i<count($options); $i++): ?>
				  		
				  		<?php 
				  		    $opt_id = $options[$i]["id"];
				  		    $opt = $options[$i]["option"];
							$desc = $options[$i]["description"];
							$option_label = $opt . " " . $desc;
				  		    $checked = (isset($reviews[$opt_id]) ? "checked" : ""); 
				  		?>
				  <?php if($type_id == 1): ?>
				  	<div class="radio">
				      <label> 	
					     <input type="radio" name="r<?php echo $question_id; ?>"  value="<?php  echo $opt_id; ?>" <?php echo $checked ?>  >
					     <?php echo $option_label; ?>
					  </label>
				      </div>
				     <?php else: ?>
				  	
		          <div class="checkbox">
				      <label> 	
					     <input type="checkbox" name="c<?php echo $opt_id; ?>"  value="<?php  echo $opt_id; ?>" <?php echo $checked ?>>
					     <?php echo $option_label; ?>
					  </label>
				 </div>
				 <?php endif; ?>
				 
			    <?php endfor; ?>
			    		<br />
                        <textarea id="comment[<?php echo $question_id ?>]" name="comment[<?php echo $question_id ?>]" class="form-control add"
                                  ng-model="formData.description" name="description" required
                                  rows="3"><?php if (!empty($reviews['comment'][$question_id])) {
                                  	echo $reviews['comment'][$question_id]; 
                                  }
                                  	?></textarea>
				  
			</div>
	<?php endforeach; ?>
	
</div>
<div class="form-group">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Save &amp; continue</button>
    </div>
</div>
</form>

	
 
