<?php if(isset($_SESSION["userid"])){ ?>
<?php
	App::uses('Security', 'Utility'); 
 ?>
	<div class="container"> 
		<div class="bs-docs-main1">
			<h5>Role Management</h5>
			<br>


			<div style="font-size:18px;color:#b42e34;padding-left:20px">

				<?php 
                    $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzjk';
					foreach ($pullrole as $value) {
					    $id = Security::encrypt($value['Role']['id'] , $key);
                        echo $this->Html->link(('<b>- '.$value['Role']['name'].'</b>'), array('controller' => 'activity', 'action' => 'role_edit', '?' => array('id' =>  $id)),array('escape' => false)); 

						echo '<br>';

					}


				 ?>

				



			</div>



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