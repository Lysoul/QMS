<div class="container">

     <div style="padding-top:50px;padding-left:30px;">

     	<?php 
     		$process = (isset($this->request->named['pc'])) ? $this->request->named['pc'] : ''; 
     		if($process != '' && $process != NULL) {
     	?>
     		<h4 style="color:#8A8C8C;font-size:30px"><?php echo $process; ?> Process</h4>

     	<?php } ?>

     	<br>

        <?php 
            $head = (isset($this->request->named['head'])) ? $this->request->named['head'] : ''; 
            if($head != '' && $head != NULL) {
        ?>
     	<h5><?php echo $head; ?></h5>

        <?php } ?>

        <?php 
        $des = (isset($this->request->named['des'])) ? $this->request->named['des'] : ''; 
        foreach ($query as $value) {
            if($des == "1"){
                echo '<p>'.$value['Process']['img_des1'].'</p>';
            }else if($des == "2"){
                echo '<p>'.$value['Process']['img_des2'].'</p>';
            }else if($des == "3"){
                echo '<p>'.$value['Process']['img_des3'].'</p>';
            }else{
                echo '<p>'.$value['Process']['img_des4'].'</p>';
            }
          
        } 


        ?>

        <?php $url = (isset($this->request->named['url'])) ? $this->request->named['url'] : '';  ?>
     	
        <img src="<?php echo $this->webroot.'uploads/'.$url; ?>" class="responsive-img"/>

     </div>	


</div>