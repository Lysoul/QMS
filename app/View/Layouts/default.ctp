<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Quality Management Portal');
//$cakeVersion = 'Copyright © 2016 Copyright Quality Management System.';
$cakeVersion = '';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<?php
		echo $this->Html->script('jquery-1.12.1.min');
		//echo $javascript->link("jquery-1.12.1.min");

	 ?>


	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <!-- Compiled and minified CSS -->
    <?php echo $this->Html->css('materialize.min'); ?>
    <?php echo $this->Html->css('font-awesome.min'); ?>
    <?php echo $this->Html->css('custom'); ?>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>






</head>
<body >
	<div id="container" style="margin-bottom: 0px;">
		
	
			<div class="container">
			  <nav class="" style="background-color: #B42E34;">
			    <div class="nav-wrapper">
			      	
			    	<?php if($this->Session->check('userid')){?>
				      	<?php echo $this->Html->link(
						    '&nbsp &nbsp &nbsp <i class="fa fa-bars" style="color:#64191C;"></i> &nbsp &nbsp QMS (Back-Office)',
						    '/activity',
						    array('escape' => false,'class' => 'brand-logo')
						); ?>

			    	<?php }else { ?>
				      	<?php echo $this->Html->link(
						    '&nbsp &nbsp &nbsp <i class="fa fa-bars" style="color:#64191C;"></i> &nbsp &nbsp QMS',
						    '/',
						    array('escape' => false,'class' => 'brand-logo')
						); ?>
					<?php } ?>
					
			      <ul id="nav-mobile" class="right hide-on-med-and-down">

			      		  <?php if($this->Session->check('userid')) {?>
								 
								  <li>

								    <?php 

								     echo $this->Html->link(('<i class="fa fa-wrench"></i> Manage Activity'), array('controller' => 'activity', 'action' => 'activity_management'),array('escape' => false)); 

								    ?>

								  </li>

  								  <li>

								    <?php 

								     echo $this->Html->link(('<i class="fa fa-cogs" aria-hidden="true"></i> Manage Content'), array('controller' => 'activity', 'action' => 'content_management'),array('escape' => false)); 

								    ?>

								  </li>




						   <?php } ?>






						   	<?php if(!$this->Session->check('userid')) {?>




								  <?php  if($_SESSION["page"] == 3) { ?>

  								  <li class="active">

								    <?php 

								     echo $this->Html->link(('Processes & Subprocess'), array('controller' => 'main', 'action' => 'process'),array('escape' => false)); 

								    ?>

								  </li>
								  <?php }else { ?>
								  	  <li>

									    <?php 

									     echo $this->Html->link(('Processes & Subprocess'), array('controller' => 'main', 'action' => 'process'),array('escape' => false)); 

									    ?>

									  </li>

								   <?php } ?>	


								  <?php  if($_SESSION["page"] == 2) { ?>
	  								  <li class="active">

									    <?php 

									     echo $this->Html->link(('Role & Responsibility'), array('controller' => 'main', 'action' => 'role'),array('escape' => false)); 

									    ?>

									  </li>
								  <?php }else { ?>

		  							  <li>

									    <?php 

									     echo $this->Html->link(('Role & Responsibility'), array('controller' => 'main', 'action' => 'role'),array('escape' => false)); 

									    ?>

									  </li>

								  <?php } ?>

  								  <?php  if($_SESSION["page"] == 4) { ?>
	  								  <li class="active">

									    <?php 

									     echo $this->Html->link(('Documents & Templates'), array('controller' => 'main', 'action' => 'document'),array('escape' => false)); 

									    ?>

									  </li>
								  <?php }else { ?>

		  							  <li>

									    <?php 

									     echo $this->Html->link(('Documents & Templates'), array('controller' => 'main', 'action' => 'document'),array('escape' => false)); 

									    ?>

									  </li>

								  <?php } ?>

  								  <?php  if($_SESSION["page"] == 5) { ?>

  								  <li class="active">

								    <?php 

								     echo $this->Html->link(('About QMS'), array('controller' => 'main', 'action' => 'about'),array('escape' => false)); 

								    ?>

								  </li>
								  <?php }else { ?>
								  	  <li>

									    <?php 

									     echo $this->Html->link(('About QMS'), array('controller' => 'main', 'action' => 'about'),array('escape' => false)); 

									    ?>

									  </li>

								   <?php } ?>



							<?php } ?>

						  		<!-- <img src="<?php echo $this->webroot; ?>img/white-line.png"/> -->
							


							<?php if($this->Session->check('userid')){?>
							 <li>
							 	<?php
 									echo $this->Html->link(('<i class="fa fa-sign-out" aria-hidden="true"></i> Logout'), array('controller' => 'activity', 'action' => 'logout'),array('escape' => false)); 

							 	?> 
							 </li>
							 	
							<?php } ?>
							
			
			      </ul>
			    </div>
			  </nav>
			</div>
	


		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>


		</div>

		<br><br><br>




</body>

<?php 

//echo $this->Html->script('jquery'); 
echo $this->Html->script('materialize.min'); 

?>



</html>
