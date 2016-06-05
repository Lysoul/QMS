<?php if(isset($_SESSION["userid"])){ ?>

	<style> 
		label{
			font-size: 18px;
			color: #56565a;
		}
	</style>
	<div class="container"> 
		<div class="bs-docs-main1">
			<h5>Role Overview Page</h5>
			<br>
			<?php 
	            foreach ($pullroleovv as $value) {
	                $head = $value['Roleoverview']['header'];
	                $des = $value['Roleoverview']['description'];
           		 }
			?>
			<?php echo $this->Form->create('roleovv', array('class' => 'form-horizontal')); ?>


		        <?php echo $this->Form->input('header', array(
		            'label' => '<b>Header Name</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'header',
                	'value' =>  $head,
        	    	'required'=> true
		        )); ?>

	        	<?php echo $this->Form->input('description', array(
		            'label' => '<b>Description </b> <span class="str_red">*</span>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'description',
                	'value' =>  $des,
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