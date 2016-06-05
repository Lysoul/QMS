<?php if(isset($_SESSION["userid"])){ ?>
<div class="container"> 

	<div class="row" style="padding-top:80px" align="center">

		<div class="col s4">
		    <?php 
		     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461920099_Images.png"/><br><b style="font-size:18px">Manage Activity</b>'), array('controller' => 'activity', 'action' => 'activity_management'),array('escape' => false)); 
		    ?>	
		</div>
		<div class="col s4">
		    <?php 
		     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461920060_Checklist.png"/><br><b style="font-size:18px">Manage Content</b>'), array('controller' => 'activity', 'action' => 'content_management'),array('escape' => false)); 
		    ?>	
		</div>
		<div class="col s4">
	   		<?php 
		     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461919971_Key.png"/><br><b style="font-size:18px">Logout</b>'), array('controller' => 'activity', 'action' => 'logout'),array('escape' => false)); 
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