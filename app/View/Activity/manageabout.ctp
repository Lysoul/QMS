<?php if(isset($_SESSION["userid"])){ ?>

	<style> 
		label{
			font-size: 18px;
			color: #56565a;
		}



	</style>
	<div class="container"> 
		<div class="bs-docs-main1">
			<h5>About Page</h5>
			<br>
			<?php 
	            foreach ($pullabout as $value) {
	                $head = $value['abouts']['header_name'];
	                $subhead1 = $value['abouts']['subheader_name1'];
	                $subhead2 = $value['abouts']['subheader_name2'];
	                $des1 = $value['abouts']['subheader_description1'];
	                $des2 = $value['abouts']['subheader_description2'];

           		 }
			?>
			<?php echo $this->Form->create('Manageabout', array('class' => 'form-horizontal')); ?>

		        <?php echo $this->Form->input('header_name', array(
		            'label' => '<b>Header Name</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'header_name',
                	'value' =>  $head,
        	    	'required'=> true
		        )); ?>



		        <?php echo $this->Form->input('subhead1_name', array(
		            'label' => '<b>Sub-header1 Name</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'subhead1_name',
                	'value' =>  $subhead1,
        	    	'required'=> true
		        )); ?>

	        	<?php echo $this->Form->input('subhead1_des', array(
		            'label' => '<b>Description1 </b> <span class="str_red">*</span>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'subhead1_des',
                	'value' =>  $des1,
        	    	'required'=> true
		        )); ?>
		       


		        <?php echo $this->Form->input('subhead2_name', array(
		            'label' => '<b>Sub-header2 Name </b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'subhead2_name',
                	'value' =>  $subhead2,
    	    		'required'=> true
		        )); ?>


		        <?php echo $this->Form->input('subhead2_des', array(
		            'label' => '<b>Description2 </b> <span class="str_red">*</span>',
		            'type' => 'textarea',
		            'name' => 'subhead2_des',
		            'class' => 'materialize-textarea',
                	'value' =>  $des2,
        	    	'required'=> true
		        )); ?>

		        <br>
		       
		        <div class="form-actions">

		            <?php 
		            
		            echo $this->Form->submit('Save', array(
		                'div' => false,
		                'class' => 'btn light-blue darken-2 ',
		            ));
		            

		             ?>

		            <!-- <button class="btn btn-primary" id="onsave">Save</button> -->
		            <button class="btn red accent-4" onclick="javascript:window.history.back()">Cancel</button>
		        </div>
		<?php echo $this->Form->end(); ?>








		</div>
	</div>

<?php } 

else{

  header('Location: '.$this->Html->url(array(
    "controller" => "Main",
    "action" => "index"
    )).'');
exit;


}


?>