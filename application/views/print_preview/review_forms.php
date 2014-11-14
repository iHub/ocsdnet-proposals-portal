
<div class="main-heading">
	<div class="container">
		<h1>Review Forms</h1>
	</div>
</div>

<div class="main-container wide-container">

<?php 

for($k=0; $k<count($tabs); $k++): 
$tab_data = $tabs[$k];
$review_tab = $tab_data["review_tab"];
$questions = $tab_data["questions"];
$question_options = $tab_data["question_options"];
?>
<h5>"Tab: "<?php echo $review_tab["tab"] ?></h5>
<h6><?php echo $review_tab["description"] ?></h6>
		   
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
				  
			</div>
	<?php endforeach; ?>
	
</div>
</div>
<?php endfor; ?>
