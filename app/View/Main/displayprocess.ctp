<script type="text/javascript"> 
    $(document).ready(function () { 

         $('#ddtype').change(function() { 
            //alert(this.value);
          
            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'processchange'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {ddcheck: this.value,pccheck: document.getElementById("process").value, ddrole: document.getElementById("ddrole").value},
                  success: function(data, textStatus) {
                    $("#chsub").html(data.toString());
                  }
            });
			
		

         });


         $('#ddrole').change(function() { 

            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'processchange'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {ddcheck: document.getElementById("ddtype").value,pccheck: document.getElementById("process").value, ddrole: this.value},
                  success: function(data, textStatus) {
                    $("#chsub").html(data.toString());
                  }
            });
          
  
			
		

         });

    });
</script>


<?php 

	$role_value = array();
	$newrole = array();

	foreach ($tabledata as $data) {

	    if($data['activities']['role_name1'] != NULL){
	        array_push($role_value,$data['activities']['role_name1']);
	    }
	    if($data['activities']['role_name2'] != NULL){
	        array_push($role_value,$data['activities']['role_name2']);
	    }

	    if($data['activities']['role_name3'] != NULL){
	        array_push($role_value,$data['activities']['role_name3']);
	    }

	    if($data['activities']['role_name4'] != NULL){
	        array_push($role_value,$data['activities']['role_name4']);
	    }

	    if($data['activities']['role_name5'] != NULL){
	        array_push($role_value,$data['activities']['role_name5']);
	    }


	}

	$role_value = array_unique($role_value);
	asort($role_value);

	foreach ($role_value as $key => $value ) {
	    array_push($newrole, array($value => $value) );
	}

	$newrole = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($newrole))); //worked


?>



<div class="container">
<!-- 	<div style="float:right;padding-top:20px;padding-right:30px">
     	<?php 
            echo $this->Html->link('Search <i class="fa fa-search" id="search"></i>', array(
                'controller' => 'Main',
                'action' => 'searchprocess',
 
             ),array('escape' => false,'id' => 'pbtn','class' => 'waves-effect waves-light btn','style' => 'background-color: #b42e34;text-transform: capitalize; font-size:20px')); 
        ?>
     </div> -->


     <div style="padding-top:50px;padding-left:30px;">



		<?php 
		foreach ($query as $process) {
			echo '<h4 style="color:#8A8C8C;font-size:30px">Process-'.$process['Process']['name'].' </h4>';
			echo '<p style="color:#57575b;font-size:17px;padding-top:10px">'.$process['Process']['description'].'</p>';

			for ($i=0; $i < count($process['Subprocess']) ; $i++) { 

                echo $this->Html->link('<span style="color:#b42e34;font-size:18px">Subprocess-'.$process['Subprocess'][$i]['name'].'</span>', array(
                    'controller' => 'Main',
                    'action' => 'displaysubprocess',
                    'subprocess' => $process['Subprocess'][$i]['id'],
                ),array('escape' => false));

				echo "<br>";
				echo '<p style="color:#8A8C8C">'.$process['Subprocess'][$i]['intro_description'].'</p>';
				
				foreach (explode("<sp>",$process['Subprocess'][$i]['main_description']) as $detail) {
					echo '<span style="color:#8A8C8C">'.$detail.'</span>';
					echo "<br>";
				}

			echo "<br>";
			}


		}


		?>

		<span style="color:#b42e34;font-size:18px">Process Diagram</span> 
		<br><br>

			<div class="img">

				<?php 
					foreach ($query as $value) {
						
						if($value['Process']['img_name1'] != NULL && $value['Process']['img_name1'] != ""){
			                echo $this->Html->link(' <img src="'.$this->webroot.'uploads/'.$value['Process']['img_name1'].'" width="300" height="200" alt="'.$value['Process']['name'].'" >', array(
			                    'controller' => 'Main',
			                    'action' => 'displayimage',
			                    'pc' => $value['Process']['name'],
			                    'url' => $value['Process']['img_name1'],
			                    'head' => $value['Process']['img_head1'],
			                    'des' => 1,
			                    'id' => $value['Process']['id'],

			                ),array('escape' => false));

						}else{
							echo '<div class="img"><img src="'.$this->webroot.'img/gray.JPG" width="300" height="200"></div>';
						}

						
						echo '<div class="desc">'.$value['Process']['img_head1'].'</div>';

	                }

				?>
			  
			</div>
			<div class="img">

				<?php 
					foreach ($query as $value) {
						
						if($value['Process']['img_name2'] != NULL && $value['Process']['img_name2'] != ""){
			                echo $this->Html->link(' <img src="'.$this->webroot.'uploads/'.$value['Process']['img_name2'].'" width="300" height="200" alt="'.$value['Process']['name'].'">', array(
			                    'controller' => 'Main',
			                    'action' => 'displayimage',
			                    'pc' => $value['Process']['name'],
			                    'url' => $value['Process']['img_name2'],
			                    'head' => $value['Process']['img_head2'],
			                    'des' => 2,
			                    'id' => $value['Process']['id'],
			                ),array('escape' => false));

						}else{
							echo '<div class="img"><img src="'.$this->webroot.'img/gray.JPG" width="300" height="200"></div>';
						}


						echo '<div class="desc">'.$value['Process']['img_head2'].'</div>';

	                }

				?>

			</div>
			<div class="img">

				<?php 
					foreach ($query as $value) {
						
						if($value['Process']['img_name3'] != NULL && $value['Process']['img_name3'] != ""){
			                echo $this->Html->link(' <img src="'.$this->webroot.'uploads/'.$value['Process']['img_name3'].'" width="300" height="200" alt="'.$value['Process']['name'].'">', array(
			                    'controller' => 'Main',
			                    'action' => 'displayimage',
			                    'pc' => $value['Process']['name'],
			                    'url' => $value['Process']['img_name3'],
			                    'head' => $value['Process']['img_head3'],
			                    'des' => 3,
			                    'id' => $value['Process']['id'],
			                ),array('escape' => false));

						}else{
							echo '<div class="img"><img src="'.$this->webroot.'img/gray.JPG" width="300" height="200"></div>';
						}


						echo '<div class="desc">'.$value['Process']['img_head3'].'</div>';


	                }

				?>
			  
			</div>
			<div class="img">

				<?php 
					foreach ($query as $value) {
						
						if($value['Process']['img_name4'] != NULL && $value['Process']['img_name4'] != ""){
			                echo $this->Html->link(' <img src="'.$this->webroot.'uploads/'.$value['Process']['img_name4'].'" width="300" height="200" alt="'.$value['Process']['name'].'">', array(
			                    'controller' => 'Main',
			                    'action' => 'displayimage',
			                    'pc' => $value['Process']['name'],
			                    'url' => $value['Process']['img_name4'],
			                    'head' => $value['Process']['img_head4'],
			                    'des' => 4,
			                    'id' => $value['Process']['id'],
			                ),array('escape' => false));

						}else{
							echo '<div class="img"><img src="'.$this->webroot.'img/gray.JPG" width="300" height="200"></div>';
						}



						echo '<div class="desc">'.$value['Process']['img_head4'].'</div>';
	                }

				?>

			</div>


		<div style="clear: left;"> </div>

		<hr>
		<h5>Process Activities and Templates</h5>

		<?php
		$subshow = array();
		 foreach ($sub as $insub) {
		 	array_push($subshow, array($insub['subprocesses']['name'] => $insub['subprocesses']['name']) );
		 }

		 $subshow = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($subshow))); //worked
		?>
		<div class="row">
			<div class="input-field col s4"> 

				  <select class="browser-default" style="color:#B42E34" name="ddtype" id="ddtype">
				    <option value="" selected>Show all Subprocesses</option>
			    	<?php foreach ($subshow as $key => $value) { ?>
				    	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
				   	<?php } ?>
				  </select>
		 	</div>
			<div class="input-field col s3"> 

		  	 <select class="browser-default" style="color:#B42E34" name="ddrole" id="ddrole">
			    <option value="" selected>Show all Roles</option>
		    	<?php foreach ($newrole as $key => $value) { ?>
			    	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			   	<?php } ?>
			  </select>


		 
		 	</div>
		 	<div class="input-field col s5"> 
		 		&nbsp
		 	</div>

	


	 	</div>

	 	<div class="row"> 
		  <div class="col s12" > 
	  	    <table class="highlight " >
		        <thead >
		          <tr >
		              <th data-field="subname">Subprocess</th>
		              <th data-field="number">Activity&nbspNo.</th>
		              <th data-field="activityname">Activity</th>
		              <th data-field="role">Roles/Responsibility</th>
		              <th data-field="template">Template</th>
		          </tr>
		        </thead>

		        <tbody id="chsub">

		        	<?php $myarray = array(); ?>
		        	<?php foreach ($tabledata as $data) { ?>
		          <tr>

		        
		            <td>
		            	<?php 
		            		if(!in_array($data['subprocesses']['name'], $myarray)){
		            			array_push($myarray,$data['subprocesses']['name']);
				              	echo $this->Html->link(' <span style="color:#b42e34">'.$data['subprocesses']['name'].'</span>', array(
					                'controller' => 'Main',
					                'action' => 'displaysubprocess',
					                'subprocess' => $data['subprocesses']['id'],
					 
					            ),array('escape' => false)); 
        

		            		}
		            	?>
		            </td>
		            <td ><?php 

		            $onetonine = array(1,2,3,4,5,6,7,8,9);

		            if(in_array($data['activities']['sub_sort'],$onetonine)){
		            	echo "0".$data['activities']['sub_sort']; 

		            }else{
		            	echo $data['activities']['sub_sort']; 
		            	
		            }
		             


		            ?></td>
		            <td><?php echo $data['activities']['name']; ?></td>
		            <td class="cl-red">
		            	<?php 
                            if($data['activities']['role_name1'] != '' || $data['activities']['role_name1'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$data['activities']['role_name1'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $data['activities']['role_name1']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($data['activities']['role_name2'] != '' || $data['activities']['role_name2'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$data['activities']['role_name2'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $data['activities']['role_name2']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($data['activities']['role_name3'] != '' || $data['activities']['role_name3'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$data['activities']['role_name3'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $data['activities']['role_name3']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($data['activities']['role_name4'] != '' || $data['activities']['role_name4'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$data['activities']['role_name4'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $data['activities']['role_name4']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($data['activities']['role_name5'] != '' || $data['activities']['role_name5'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$data['activities']['role_name5'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $data['activities']['role_name5']
			                        ),array('escape' => false));

                					echo "<br>";
                            }

		            	?>

		            </td>

		            <td>

		             <?php if($data['activities']['template_check'] == 1){ ?>

	                        <?php if($data['activities']['template_url'] != null || $data['activities']['template_url'] != ''){ ?>
	                            <a href="<?php echo $data['activities']['template_url']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>

	                        <?php }//end check URL ?>

	                  <?php }else { ?>
	                        <?php if($data['activities']['template_file'] != null || $data['activities']['template_file'] != ''){ ?>
	                            <a href="<?php echo $this->webroot.'uploadfile/'.$data['activities']['template_file']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>

	                        <?php }//end check URL ?>


	                  <?php } ?>
		            </td>
		            
		          </tr>

		          <?php } //end foreach ?>

	
		        </tbody>
		      </table>
		      <input type="hidden" id="process" name="process" value="<?php echo $ipc; ?>">

		  </div>



	 	</div>

	</div>

</div>

