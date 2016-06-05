<?php

$cakeDescription = __d('cake_dev', 'Quality Management Portal');
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



	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php 
		  echo $this->Html->script('jquery-1.12.1.min');
		  //echo $javascript->link("jquery-1.12.1.min");

	 ?>
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <?php echo $this->Html->css('font-awesome.min'); ?>
    <?php echo $this->Html->css('custom'); ?>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
</head>
<body>
		
		<div class="container">
				
		  <nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo">Logo</a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		        <li><a href="sass.html">Sass</a></li>
		        <li><a href="badges.html">Components</a></li>
		        <li><a href="collapsible.html">JavaScript</a></li>
		      </ul>
		    </div>
		  </nav>
		</div>
		


		<div>

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>







</body>
<?php 

//echo $this->Html->script('jquery'); 


?>
 <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

</html>
