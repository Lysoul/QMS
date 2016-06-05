<script type="text/javascript"> 
    $(document).ready(function () { 

         $('#ddpc').change(function() { 
            //alert(this.value);
          
            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'rolechange'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {ddpc: this.value,role: document.getElementById("role").value},
                  success: function(data, textStatus) {
                 	
                    var divs = data.split('-----');
				    $("#ddsub").html(divs[0].toString());
				    $("#chsub").html(divs[1].toString());
                  }
            });
			
		

         });

        $('#ddsub').change(function() { 
            //alert(this.value);
          
            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'rolechange2'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {ddpc: document.getElementById("ddpc").value,role: document.getElementById("role").value,subselect: this.value},
                  success: function(data, textStatus) {
                    $("#chsub").html(data.toString());
                  }
            });
			
		

         });


    });
</script>

<div class="container">
<!-- 	<div style="float:right;padding-top:20px;padding-right:30px">
     	<?php 
            echo $this->Html->link('Search <i class="fa fa-search" id="search"></i>', array(
                'controller' => 'Main',
                'action' => 'searchrole',
 
             ),array('escape' => false,'id' => 'pbtn','class' => 'waves-effect waves-light btn','style' => 'background-color: #b42e34;text-transform: capitalize; font-size:20px')); 
        ?>
     </div> -->

     <?php 

     $role = (isset($this->request->named['role'])) ? $this->request->named['role'] : '';

      ?>
     <div style="padding-top:50px;padding-left:30px;">
		<h4 style="color:#8A8C8C;font-size:30px">I'm a <?php echo $role; ?></h4>


		<?php 
			foreach ($roledes as $value) {
				echo '<p style="color:#56565A;font-size:16px;padding-top:5px">'.$value['roles']['intro_description'].'</p>';
				echo '<p style="color:#56565A;font-size:16px;padding-top:5px">'.$value['roles']['main_description'].'</p>';

			}


		?> 



		


		<?php 
			$pcdisplay = array();
			$idsub = array(); //for special subprocess
			$stringk = "";
			$count = 0;
			foreach ($query as $value) {
				foreach (explode("<sp>", $value['subprocesses']['main_description']) as $detail) {
					$stringk.=$detail."<br>";
				}


				array_push($pcdisplay, array($value['subprocesses']['name'] => ($value['subprocesses']['intro_description']."<br>".$stringk) ) );

				array_push($idsub,  array($value['subprocesses']['id'] => $value['subprocesses']['name'])); //for special subprocess
				$stringk = "";
			}

			$pcdisplay = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($pcdisplay))); 
			$pcdisplay = array_unique($pcdisplay);
			ksort($pcdisplay);

			
			 //for special subprocess
			 $idsub = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($idsub))); 
			 asort($idsub);
			 $idsubtemp = array();
			 $k = 0;
			 foreach ($idsub as $key => $value) {
			 	array_push($idsubtemp,  array($k => $key) );
			 	$k++;
			 }
			
			 $idsubtemp = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($idsubtemp))); 


			if($pcdisplay != NULL && $pcdisplay != ''){
				echo '<h4 style="color:#B42E34;font-size:25px">Subprocess you have to invoved</h4>';

			}



			$i = 0; //for special subprocess
			foreach ($pcdisplay as $key => $value) {
                echo $this->Html->link('<span style="color:#b42e34;font-size:16px">'.$key.'</span>', array(
                    'controller' => 'Main',
                    'action' => 'displaysubprocess',
                    'subprocess' => $idsubtemp[$i], //for special subprocess
                ),array('escape' => false));
				echo "<br>";
				echo '<p style="color:#8A8C8C">'.$value.'</p>';
                $i = $i+1; //for special subprocess

			}



		 ?>
		 

		 <?php if($query != NULL && $query != ''){ ?>
		 <hr>
		 <h4 style="color:#B42E34;font-size:25px">Your Activities and Templates</h4>

 		<?php
		 	 $pshow = array();
			 foreach ($pcquery as $inpc) {
			 	array_push($pshow, array($inpc['processes']['id'] => $inpc['processes']['name']) );
			 }

			 $pshow = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($pshow))); //worked

		?>
 		<div class="row">
			<div class="input-field col s5"> 

				  <select class="browser-default" style="color:#B42E34" name="ddpc" id="ddpc">
				    <option value="" selected>Show all of your responded processes</option>
			    	<?php foreach ($pshow as $key => $value) { ?>
				    	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
				   	<?php } ?>
				  </select>
		 	</div>
			<div class="input-field col s5"> 

		  	 <select class="browser-default" style="color:#B42E34" name="ddsub" id="ddsub">
			    <option value="" selected>Show all of your responded subprocesse</option>
		    	<?php foreach ($newrole as $key => $value) { ?>
			    	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			   	<?php } ?>
			  </select>


		 
		 	</div>
		 	<div class="input-field col s2"> 
		 		&nbsp
		 	</div>

	 	</div>


	 	<div class="row"> 
		  <div class="col s12" > 
	  	    <table class="highlight " >
		        <thead >
		          <tr >
		          	  <th data-field="proname">Process</th>
		              <th data-field="subname">Subprocess</th>
		              <th data-field="number">Activity&nbspNo.</th>
		              <th data-field="activityname">Activity</th>
		              <th data-field="role">Collaborative&nbspRoles</th>
		              <th data-field="template">Template</th>
		          </tr>
		        </thead>

		        <tbody id="chsub">
		        	<?php $myarray = array(); ?>
	        	 <?php foreach ($query as $value) { ?>
		          <tr>
		          	
		        		<td> 
		        		<?php 
		            		if(!in_array($value['processes']['name'], $myarray)){
		            			array_push($myarray,$value['processes']['name']);

							      echo $this->Html->link(' <span style="color:#b42e34">'.$value['processes']['name'].'</span>', array(
							        'controller' => 'Main',
							        'action' => 'displayprocess',
							        'process' => $value['processes']['id'],

							     ),array('escape' => false)); 
        

		            		}
		            	?>
		        		</td>
		        		<td>


		        			<?php 
					             echo $this->Html->link(' <span style="color:#b42e34">'.$value['subprocesses']['name'].'</span>', array(
					                'controller' => 'Main',
					                'action' => 'displaysubprocess',
					                'subprocess' => $value['subprocesses']['id'],
					             ),array('escape' => false));  

		        			?>
		        		</td>
		        		<td>
		        			<?php 

					            $onetonine = array(1,2,3,4,5,6,7,8,9);

					            if(in_array($value['activities']['sub_sort'],$onetonine)){
					            	echo "0".$value['activities']['sub_sort']; 

					            }else{
					            	echo $value['activities']['sub_sort']; 
					            	
					            } 
		        			?>
		        		</td>
		        		<td><?php echo $value['activities']['name']; ?></td>
		        		<td class="cl-red">
		            	<?php 
                            if($value['activities']['role_name1'] != '' || $value['activities']['role_name1'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$value['activities']['role_name1'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $value['activities']['role_name1']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($value['activities']['role_name2'] != '' || $value['activities']['role_name2'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$value['activities']['role_name2'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $value['activities']['role_name2']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($value['activities']['role_name3'] != '' || $value['activities']['role_name3'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$value['activities']['role_name3'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $value['activities']['role_name3']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($value['activities']['role_name4'] != '' || $value['activities']['role_name4'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$value['activities']['role_name4'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $value['activities']['role_name4']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($value['activities']['role_name5'] != '' || $value['activities']['role_name5'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$value['activities']['role_name5'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $value['activities']['role_name5']
			                        ),array('escape' => false));

                					echo "<br>";
                            }

		            	?>
		                </td>

        	            <td>

	       

		             <?php if($value['activities']['template_check'] == 1){ ?>

	                        <?php if($value['activities']['template_url'] != null || $value['activities']['template_url'] != ''){ ?>
	                            <a href="<?php echo $value['activities']['template_url']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>
	                        <?php }//end check URL ?>

	                  <?php }else { ?>
	                        
	                        <?php if($value['activities']['template_file'] != null || $value['activities']['template_file'] != ''){ ?>
	                            <a href="<?php echo $this->webroot.'uploadfile/'.$value['activities']['template_file']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>

	                        <?php }//end check URL ?>

	                  <?php } ?>



		            	</td>
		            
		          </tr>
				<?php } ?>

	
		        </tbody>
		      </table>
		      <input type="hidden" id="role" name="role" value="<?php echo $role; ?>">
		  </div>



	 	</div>
	 	<?php } ?>

	 </div>

</div>