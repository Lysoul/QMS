<script type="text/javascript"> 
    $(document).ready(function () { 

      $('#ddrole').change(function() { 
            //alert(this.value);
          
            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'subprocesschange'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {ddrole: this.value, subprocess: document.getElementById("subprocess").value},
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

	 <div style="padding-top:50px;padding-left:30px;">
	 	<?php 
		foreach ($subprocess as $sprocess) {
			echo '<h4 style="color:#8A8C8C;font-size:30px">Subprocess-'.$sprocess['Subprocess']['name'].' </h4>';
			echo '<p style="color:#57575b;font-size:17px;padding-top:10px">'.$sprocess['Subprocess']['intro_description'].'</p>';
			foreach (explode("<sp>",$sprocess['Subprocess']['main_description']) as $detail) {
				echo '<span style="color:#8A8C8C;font-size:16px">'.$detail.'</span>';
				echo "<br>";
			}

		} 
		echo "<br>";
		?>

		<hr>
		<h5>Subprocess Activities and Templates</h5>

		<div class="row">
			<div class="input-field col s7"> 

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
		              <th data-field="number">Activity&nbspNo.</th>
		              <th data-field="activityname">Activity</th>
		              <th data-field="role">Roles/Responsibility</th>
		              <th data-field="template">Template</th>
		          </tr>
		        </thead>

		        <tbody id="chsub">


		        	<?php foreach ($tabledata as $data) { ?>
		          <tr>

		    
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
		      <input type="hidden" id="subprocess" name="subprocess" value="<?php echo $ispc; ?>">
		  </div>



	 	</div>






	 </div>




</div>