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