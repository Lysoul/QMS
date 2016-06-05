
		<?php
		 	 $spshow = array();
			 foreach ($query as $inspc) {
			 	array_push($spshow, array($inspc['subprocesses']['id'] => $inspc['subprocesses']['name']) );
			 }

			 $spshow = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($spshow))); //worked

		?>

<div id="ajaxsection1">
  	 <select class="browser-default" style="color:#B42E34" name="ddsub" id="ddsub">
	    <option value="" selected>Show all of your responded subprocesse</option>
    	<?php foreach ($spshow as $key => $value) { ?>
	    	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
	   	<?php } ?>
	  </select>
</div>


<?php echo '-----'; ?>



	<?php $myarray = array(); ?>
 <?php foreach ($cquery as $value) { ?>
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

            <?php 
                if($value['activities']['template_url'] != null || $value['activities']['template_url'] != ''){
            ?>
                <a href="<?php echo $value['activities']['template_url']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>

            <?php
                }//end check URL

            ?>

    	</td>
    
  </tr>
<?php } ?>