<?php if(isset($_SESSION["userid"])){ ?>

	<style> 
		label{
			font-size: 18px;
			color: #56565a;
		}
	</style>
	<div class="container"> 
		<div class="bs-docs-main1">

			<?php 
				foreach ($editsub as $value) {	
			?>
			<h5>Subprocess <?php echo $value['Subprocess']['name']; ?></h5>
			<br>
			<?php echo $this->Form->create('editsub', array('class' => 'form-horizontal')); ?>


		        <?php echo $this->Form->input('subname', array(
		            'label' => '<b>Subprocess Name</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'subname',
                	'value' =>  $value['Subprocess']['name'],
        	    	'required'=> true
		        )); ?>

		        <?php echo $this->Form->input('subsname', array(
		            'label' => '<b>Subprocess ShortName</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'subsname',
                	'value' =>  $value['Subprocess']['short_name'],
        	    	'required'=> true
		        )); ?>

    	        <?php echo $this->Form->input('subnumber', array(
		            'label' => '<b>Subprocess Label</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'subnumber',
                	'value' =>  $value['Subprocess']['process_insub'],
                	'required'=> true
		        )); ?>

	        	<?php echo $this->Form->input('introdes', array(
		            'label' => '<b>Intro Description </b> <span class="str_red">*</span>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'introdes',
                	'value' =>  $value['Subprocess']['intro_description'],
                	'required'=> true
		        )); ?>

	        	<?php echo $this->Form->input('maindes', array(
		            'label' => '<b>Main Description </b> <span class="str_red">*</span>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'maindes',
                	'value' =>  $value['Subprocess']['main_description'],
                	'required'=> true
		        )); ?>

		       

		        <?php } ?>
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