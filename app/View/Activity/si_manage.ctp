<?php if(isset($_SESSION["userid"])){ ?>

	<style> 
		label{
			font-size: 18px;
			color: #56565a;
		}
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
		    $("#imgslide1").click(function(){
		    	var htmlString = $(this).html();
		    	if(htmlString == "+ "){
		    		$(this).text("- ");

		    	}else{
		    		$(this).text("+ ");

		    	}
		        $("#imgshow1").slideToggle('fast');
		    });
		    $('#imgslide1').hover(function() {
		        $(this).css('cursor','pointer');
		    });
		    $("#imgslide2").click(function(){
		    	var htmlString = $(this).html();
		    	if(htmlString == "+ "){
		    		$(this).text("- ");

		    	}else{
		    		$(this).text("+ ");

		    	}
		        $("#imgshow2").slideToggle('fast');
		    });
		    $('#imgslide2').hover(function() {
		        $(this).css('cursor','pointer');
		    });

		    $("#imgslide3").click(function(){
		    	var htmlString = $(this).html();
		    	if(htmlString == "+ "){
		    		$(this).text("- ");

		    	}else{
		    		$(this).text("+ ");

		    	}
		        $("#imgshow3").slideToggle('fast');
		    });
		    $('#imgslide3').hover(function() {
		        $(this).css('cursor','pointer');
		    });

		    $("#imgslide4").click(function(){
		    	var htmlString = $(this).html();
		    	if(htmlString == "+ "){
		    		$(this).text("- ");

		    	}else{
		    		$(this).text("+ ");

		    	}
		        $("#imgshow4").slideToggle('fast');
		    });
		    $('#imgslide4').hover(function() {
		        $(this).css('cursor','pointer');
		    });

		});

	</script>

	<div class="container"> 
		<div class="bs-docs-main1">
			<h5>Software Implementation</h5>
			<br>
			<?php 
	            foreach ($pullsi as $value) {
	                $head = $value['Process']['name'];
	                 $sname = $value['Process']['short_name'];
	                $des = $value['Process']['description'];
	                $img_name1 = $value['Process']['img_name1'];
	                $img_name2 = $value['Process']['img_name2'];
	                $img_name3 = $value['Process']['img_name3'];
	                $img_name4 = $value['Process']['img_name4'];
	                $img_head1 = $value['Process']['img_head1'];
	                $img_head2 = $value['Process']['img_head2'];
	                $img_head3 = $value['Process']['img_head3'];
	                $img_head4 = $value['Process']['img_head4'];
	                $img_des1 = $value['Process']['img_des1'];
	                $img_des2 = $value['Process']['img_des2'];
	                $img_des3 = $value['Process']['img_des3'];
	                $img_des4 = $value['Process']['img_des4'];

           		 }
			?>
			<?php echo $this->Form->create('simanage', array('class' => 'form-horizontal','enctype'=>'multipart/form-data')); ?>


		        <?php echo $this->Form->input('header', array(
		            'label' => '<b>Header Name</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'header',
                	'value' =>  $head,
                	'required'=> true
		        )); ?>

                <?php echo $this->Form->input('shortname', array(
		            'label' => '<b>Short Name</b> <span class="str_red">*</span>',
		            'type' => 'text',
		            'name' => 'shortname',
                	'value' =>  $sname,
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
		       
		 

		     <div style="font-size:18px;color:#b42e34">
		     	<b id="imgslide1">+ </b><b>Expand Option Image 1</b>
			</div>


	         <div id="imgshow1" style="display:none;padding-left:50px">
	         	<br>
		        <?php echo $this->Form->input('imgheadername1', array(
		            'label' => '<b style="color:#5D5D5D">Image Name</b> ',
		            'type' => 'text',
		            'name' => 'imgheadername1',
                	'value' => $img_head1,
		        )); ?>

            	<?php echo $this->Form->input('imgdes1', array(
		            'label' => '<b style="color:#5D5D5D">Image Description </b>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'imgdes1',
                	'value' =>  $img_des1
		        )); ?>

		         <div class="file-field input-field">
			       <div class="btn  grey darken-1">
			        <span>Image File</span>
	             	<?php echo $this->Form->input('imgfile1', array(
			            'type' => 'file',
	                    'label' => false,
        				'div' => false
			        )); ?>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" value="<?php echo $img_name1; ?>">
			      </div>
			    </div>

		        
		    </div>
		    <br><br>


	         <div style="font-size:18px;color:#b42e34">
		     	<b id="imgslide2">+ </b><b>Expand Option Image 2</b>
			</div>
		     <div id="imgshow2" style="display:none;padding-left:50px">
		     	<br>
		        <?php echo $this->Form->input('imgheadername2', array(
		            'label' => '<b style="color:#5D5D5D">Image Name</b> ',
		            'type' => 'text',
		            'name' => 'imgheadername2',
                	'value' =>  $img_head2,
		        )); ?>

            	<?php echo $this->Form->input('imgdes2', array(
		            'label' => '<b style="color:#5D5D5D">Image Description 2</b>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'imgdes2',
                	'value' =>  $img_des2,
		        )); ?>
	         	<div class="file-field input-field">
			       <div class="btn grey darken-1">
			        <span>Image File</span>
		        	<?php echo $this->Form->input('imgfile2', array(
			            'type' => 'file',
	                    'label' => false,
	    				'div' => false
			        )); ?>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" value="<?php echo $img_name2; ?>">
			      </div>
			    </div>
			</div>
		        <br><br>






	         <div style="font-size:18px;color:#b42e34">
		     	<b id="imgslide3">+ </b><b>Expand Option Image 3</b>
			</div>
		     <div id="imgshow3" style="display:none;padding-left:50px">
		     	<br>
		        <?php echo $this->Form->input('imgheadername3', array(
		            'label' => '<b style="color:#5D5D5D">Image Name</b> ',
		            'type' => 'text',
		            'name' => 'imgheadername3',
                	'value' =>  $img_head3,
		        )); ?>
            	<?php echo $this->Form->input('imgdes3', array(
		            'label' => '<b style="color:#5D5D5D">Image Description </b>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'imgdes3',
                	'value' =>  $img_des3,
		        )); ?>

	         	<div class="file-field input-field">
			       <div class="btn grey darken-1">
			        <span>Image File</span>
		        	<?php echo $this->Form->input('imgfile3', array(
			            'type' => 'file',
	                    'label' => false,
	    				'div' => false
			        )); ?>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" value="<?php echo $img_name3; ?>">
			      </div>
			    </div>
			</div>
		          <br><br>



         	<div style="font-size:18px;color:#b42e34">
		     	<b id="imgslide4">+ </b><b>Expand Option Image 4</b>
			</div>
		     <div id="imgshow4" style="display:none;padding-left:50px">
		     	<br>
	        	<?php echo $this->Form->input('imgheadername4', array(
		            'label' => '<b style="color:#5D5D5D">Image Name</b> ',
		            'type' => 'text',
		            'name' => 'imgheadername4',
                	'value' =>  $img_head4,
		        )); ?>
            	<?php echo $this->Form->input('imgdes4', array(
		            'label' => '<b style="color:#5D5D5D">Image Description </b>',
		            'type' => 'textarea',
		            'class' => 'materialize-textarea',
		            'name' => 'imgdes4',
                	'value' =>  $img_des4,
		        )); ?>
	         	<div class="file-field input-field">
			       <div class="btn grey darken-1">
			        <span>Image File</span>
		        	<?php echo $this->Form->input('imgfile4', array(
			            'type' => 'file',
	                    'label' => false,
	    				'div' => false
			        )); ?>
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text" value="<?php echo $img_name4; ?>">
			      </div>
			    </div>
			</div>
		        <br>
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