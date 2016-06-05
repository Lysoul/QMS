<?php if(isset($_SESSION["userid"])){ ?>
	<style> 
	body{
		overflow: hidden;
	}

	</style>
	<div class="container" > 
		<div class="row" style="padding-top:40px" align="center"> 
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461920099_Images.png"/><br><b style="font-size:18px">About Page</b>'), array('controller' => 'activity', 'action' => 'manageabout'),array('escape' => false)); 
			    ?>	
			</div>
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461921642_Mind-Map-Paper.png"/><br><b style="font-size:18px">Process Overview Page</b>'), array('controller' => 'activity', 'action' => 'processovv'),array('escape' => false)); 
			    ?>	
			</div>
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461921667_Boss-3.png"/><br><b style="font-size:18px">Role Overview Page</b>'), array('controller' => 'activity', 'action' => 'roleovv'),array('escape' => false)); 
			    ?>	
			</div>

		</div>

		<div class="row" style="padding-top:20px" align="center"> 
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461921792_Settings-5.png"/><br><b style="font-size:18px">Project Management (PM)</b>'), array('controller' => 'activity', 'action' => 'pm_manage'),array('escape' => false)); 
			    ?>	
			</div>
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461921792_Settings-5.png"/><br><b style="font-size:18px">Software Implementation (SI)</b>'), array('controller' => 'activity', 'action' => 'si_manage'),array('escape' => false)); 
			    ?>	
			</div>
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461921792_Settings-5.png"/><br><b style="font-size:18px">Subprocess Management</b>'), array('controller' => 'activity', 'action' => 'subprocess_manage'),array('escape' => false)); 
			    ?>	
			</div>

		</div>

		<div class="row" style="padding-top:20px" align="center"> 
			<div class="col s4">
	    		<?php 
			     echo $this->Html->link(('<img src="'.$this->webroot.'img/1461921792_Settings-5.png"/><br><b style="font-size:18px">Role Management</b>'), array('controller' => 'activity', 'action' => 'role_manage'),array('escape' => false)); 
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