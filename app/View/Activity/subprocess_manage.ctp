<?php if(isset($_SESSION["userid"])){ ?>
<?php
	App::uses('Security', 'Utility'); 
 ?>
	<div class="container"> 
		<div class="bs-docs-main1">
			<h5>Subprocess Management</h5>
			<br>


			<div style="font-size:18px;color:#b42e34;padding-left:20px">
				<b>Project Management (PM) Subprocess</b>
			</div>

			<div id="pmshow" >
					<?php 
                        $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzpb';
						foreach ($pullsubpm as $value) {
                            $id = Security::encrypt($value['Subprocess']['id'] , $key);
                            echo $this->Html->link(('<span style="padding-left:65px;color:#b42e34;font-size:16px">- '.$value['Subprocess']['name'].'</span>'), array('controller' => 'activity', 'action' => 'sub_edit', '?' => array('id' =>  $id)),array('escape' => false)); 
							echo "<br>";
						}

					 ?>
			</div>
			

			<br>
			<div style="font-size:18px;color:#b42e34;padding-left:20px">
				<b>Software Implementation (SI) Subprocess</b>
			</div>
			
			<div id="sishow" >
					<?php 
						foreach ($pullsubsi as $value) {
                            $id = Security::encrypt($value['Subprocess']['id'] , $key);
                            echo $this->Html->link(('<span style="padding-left:65px;color:#b42e34;font-size:16px">- '.$value['Subprocess']['name'].'</span>'), array('controller' => 'activity', 'action' => 'sub_edit', '?' => array('id' => $id )),array('escape' => false)); 
							echo "<br>";
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