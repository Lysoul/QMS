<script type="text/javascript">
$(document).ready(function(){
    $("#pmslide").click(function(){
    	var htmlString = $(this).html();
    	if(htmlString == "+"){
    		$(this).text("-");

    	}else{
    		$(this).text("+");

    	}
        $("#pmshow").slideToggle('fast');
    });
    $('#pmslide').hover(function() {
        $(this).css('cursor','pointer');
    });

	$("#sislide").click(function(){
    	var htmlString = $(this).html();
    	if(htmlString == "+"){
    		$(this).text("-");

    	}else{
    		$(this).text("+");

    	}
        $("#sishow").slideToggle('fast');
    });
    $('#sislide').hover(function() {
        $(this).css('cursor','pointer');
    });


});

</script>

<div class="container"> 

  <?php foreach ($pullabout as $value) { ?>

 	<div align="center" style="padding-top:20px">
	  	<h3 style="font-size:40px"><?php echo $value['abouts']['header_name']; ?></h3>
	</div>

	<div style="padding-top:20px;padding-left:30px;">
		<h3 style="font-size:31px;color:#8a8c8c"><?php echo $value['abouts']['subheader_name1']; ?></h3>
		<p style="color:#57575b;font-size:17px;text-align:justify "><?php echo $value['abouts']['subheader_description1']; ?></p>


		<h3 style="font-size:31px;color:#8a8c8c"><?php echo $value['abouts']['subheader_name2']; ?></h3>

		<p style="color:#57575b;font-size:17px; ">*This paragraph shows on landing page</p>
		<div class="row">
			<div class="col m7">
				<p style="color:#57575b;font-size:17px;text-align:justify " ><?php echo $value['abouts']['subheader_description2']; ?></p>
			</div>
			<div class="col m5">
				 <img src="<?php echo $this->webroot; ?>img/iso_internationalstandard.jpg"/> 
			</div>

		</div>
    <?php } ?>

		<div style="line-height: 40px;"> 

        <?php foreach ($pullpm as $value) {  ?>
				<span style="padding-left:45px;font-size:18px;color:#b42e34">
				<span id="pmslide">+</span>
		     	<?php 
		            echo $this->Html->link(' <span style="color:#b42e34">Process-'.$value['Process']['name'].' ('.$value['Process']['short_name'].') </span>', array(
		                'controller' => 'Main',
		                'action' => 'displayprocess',
		                'process' => $value['Process']['id'],
		 
		             ),array('escape' => false)); 
		        ?>	
		        </span>

		        <br>

      <div id="pmshow" style="display:none;">
        <?php foreach ($value['Subprocess'] as $value) { ?>
          
          <?php 
              echo $this->Html->link(' <span style="padding-left:65px;color:#b42e34;font-size:16px">-  '.$value['name'].'  &nbsp </span> <span style="font-size:14px;color:#8A8C8C">'.$value['process_insub'].'</span>', array(
                'controller' => 'Main',
                'action' => 'displaysubprocess',
                'subprocess' => $value['id'],
 
             ),array('escape' => false)); 
          ?>
          <br>
        <?php }//end subprocess pm ?>
			</div>
       <?php  } //endprocess pm ?>

       <?php foreach ($pullsi as $value) {  ?>
				<span style="padding-left:45px;font-size:18px;color:#b42e34">
				<span id="sislide">+</span>
		     	<?php 
		            echo $this->Html->link('<span style="color:#b42e34">Process-'.$value['Process']['name'].' ('.$value['Process']['short_name'].')</span>', array(
		                'controller' => 'Main',
		                'action' => 'displayprocess',
		                'process' => $value['Process']['id'],
		 
		             ),array('escape' => false)); 
		        ?>
		    	</span>
				<br>
			 <div id="sishow" style="display:none;">
        <?php foreach ($value['Subprocess'] as $value) { ?>
        <?php 
              echo $this->Html->link(' <span style="padding-left:65px;color:#b42e34;font-size:16px">-  '.$value['name'].'  &nbsp </span> <span style="font-size:14px;color:#8A8C8C">'.$value['process_insub'].'</span>', array(
                'controller' => 'Main',
                'action' => 'displaysubprocess',
                'subprocess' => $value['id'],
 
             ),array('escape' => false)); 
          ?>

  				<br>
        <?php }//end subprocess si ?>

				
			</div>
      <?php  } //endprocess si ?>

			<br>
		   </div>


	<hr>
    <div class="row" align="center" style="padding-top:20px;"> 
            <h3> What are you looking for?</h3>
            <br>

    </div>


    <div class="row" align="center"> 
          <div class="col s4">  

            <?php 
                echo $this->Html->link('<b>Process & Subprocess </b>', array(
                    'controller' => 'Main',
                    'action' => 'process',
                 ),array('escape' => false,'class' => 'waves-effect waves-light btn','style' => 'background-color: #FFFFFF;color:#B42E34;text-transform: capitalize; font-size:20px')); 
            ?>
            
        </div>

          <div class="col s4"> 
            <?php 
                echo $this->Html->link('<b>Role & Responsibility </b>', array(
                    'controller' => 'Main',
                    'action' => 'role',
                 ),array('escape' => false,'class' => 'waves-effect waves-light btn','style' => 'background-color: #FFFFFF;color:#B42E34;text-transform: capitalize; font-size:20px')); 
            ?>
        </div>
          <div class="col s4"> 
            <?php 
                echo $this->Html->link('<b>Documents & Templates </b>', array(
                    'controller' => 'Main',
                    'action' => 'document',
                 ),array('escape' => false,'class' => 'waves-effect waves-light btn','style' => 'background-color: #FFFFFF;color:#B42E34;text-transform: capitalize; font-size:20px')); 
            ?>

          </div>
    </div>


	</div>




</div>


<div class="footer"> 
    
  <br>
  <div class="container" >
      <div style="position: fixed;bottom: -20px;width:75%"> 
          
            <div class="row" align="center"> 

                <div class="col s6 fTab" style="border-right: 1px solid #ABABAB;background-color: #8A8C8C;height: 50px;">  
                  <h5 style="font-size:20px;color:#FFF;line-height:30px">All Processes ^ </h5>
          </div>

                <div class="col s6 jTab" style="border-left: 1px solid #656565;background-color: #8A8C8C;height: 50px;">  
                  <h5 style="font-size:20px;color:#FFF;line-height:30px">All Roles ^ </h5>
          </div>

        </div>

      </div>

      <div style="position: fixed;bottom: -50px;width:75%"> 
          
            <div class="row" align="center"> 
                <div class="col s6 fTab1" style="background-color: #B42E34;min-height: 450px; display:none;"> 
                  <div class="intab1"> 
                    <h5 style="font-size:20px;color:#FFF;line-height:30px">All Processes v </h5>
                    <hr>
                  </div>
            <div style="line-height: 40px;text-align:justify;padding-left:80px"> 
                
            <?php foreach ($pullpm as $value) {  ?>
                
                 <span style="font-size:18px;color:#FFFFFF" id="pms">+</span>
                   <?php 
                        echo $this->Html->link('<span style="font-size:18px;color:#FFFFFF"> '.$value['Process']['name'].' ('.$value['Process']['short_name'].') process</span>', array(
                            'controller' => 'Main',
                            'action' => 'displayprocess',
                            'process' => $value['Process']['id'],
             
                         ),array('escape' => false)); 
                    ?>
              

                <br>
                <div id="pmsh" style="display:none;">
                  <?php foreach ($value['Subprocess'] as $value) { 

                                echo $this->Html->link('<span style="padding-left:30px;color:#FFFFFF;font-size:16px">- '.$value['name'].' &nbsp</span> ', array(
                                    'controller' => 'Main',
                                    'action' => 'displaysubprocess',
                                    'subprocess' => $value['id'],
                     
                                ),array('escape' => false)); 

                                echo "<br>";


                      }//end sub pm
                  ?>

                </div>    
                <?php  } //endprocess pm ?>
              

                <?php foreach ($pullsi as $value) {  ?>
                 <span style="font-size:18px;color:#FFFFFF;" id="sis">+</span>
                   <?php 
                        echo $this->Html->link('<span style="font-size:18px;color:#FFFFFF;"> '.$value['Process']['name'].' ('.$value['Process']['short_name'].') process</span>', array(
                            'controller' => 'Main',
                            'action' => 'displayprocess',
                            'process' => $value['Process']['id'],
             
                         ),array('escape' => false)); 
                    ?>
                <br>

                <div id="sish" style="display:none;">
                  <?php foreach ($value['Subprocess'] as $value) { 

                                echo $this->Html->link('<span style="padding-left:30px;color:#FFFFFF;font-size:16px">- '.$value['name'].' &nbsp</span> ', array(
                                    'controller' => 'Main',
                                    'action' => 'displaysubprocess',
                                    'subprocess' => $value['id'],
                     
                                ),array('escape' => false)); 

                                echo "<br>";


                      }//end sub si
                  ?>
                </div>
                <br>
                 <?php  } //endprocess si ?>

              </div>

          </div>

                <div class="col s6 jTab1" style="background-color: #B42E34;height: 450px;overflow: scroll; display:none;float:right">  
                  <div class="intab2">
                    <h5 style="font-size:20px;color:#FFF;line-height:30px">All Roles v </h5>
                    <hr>  
                  </div>

                  <div style="padding-left:65px;line-height: 40px;text-align:justify"> 
                  <?php 

                    foreach ($queryrole as $value) {


                            echo $this->Html->link('<span style="font-size:16px;color:#FFFFFF">- '.$value['roles']['name'].'</span>', array(
                                'controller' => 'Main',
                                'action' => 'displayrole',
                                'role' => $value['roles']['name'],
                 
                             ),array('escape' => false)); 

                 

                       
                        echo "<br>";
                    }
                    echo "<br>";
                   ?>
                </div>

          </div>
          <div style="clear:both"> </div>

        </div>

      </div>


    </div>

</div>





<script type="text/javascript">

jQuery(function($){


    $('.fTab').on('click', function(){
       if ($( this ).css( "transform" ) == 'none' ){
           $('.fTab1').css("display","block");
      } 

    });


    $('.jTab').on('click', function(){
       if ($( this ).css( "transform" ) == 'none' ){
           $('.jTab1').css("display","block");

      } 

    });




    $('.intab1').on('click', function(){
       if ($( this ).css( "transform" ) == 'none' ){
           $('.fTab1').css("display","none");
      } 

    });

    $('.intab2').on('click', function(){
       if ($( this ).css( "transform" ) == 'none' ){
           $('.jTab1').css("display","none");
      } 

    });





    $('.fTab').hover(function() {
        $(this).css('cursor','pointer');
    });

    $('.intab1').hover(function() {
        $(this).css('cursor','pointer');
    });


    $('.jTab').hover(function() {
        $(this).css('cursor','pointer');
    });

    $('.intab2').hover(function() {
        $(this).css('cursor','pointer');
    });

 

})

</script>


<script type="text/javascript">
  $(document).ready(function(){

    
      $("#pms").click(function(){
        var htmlString = $(this).html();
        if(htmlString == "+"){
          $(this).text("-");

        }else{
          $(this).text("+");

        }
          $("#pmsh").slideToggle('fast');
      });
      $('#pms').hover(function() {
          $(this).css('cursor','pointer');
      });

    $("#sis").click(function(){
        var htmlString = $(this).html();
        if(htmlString == "+"){
          $(this).text("-");

        }else{
          $(this).text("+");

        }
          $("#sish").slideToggle('fast');
      });
      $('#sis').hover(function() {
          $(this).css('cursor','pointer');
      });


  });

  </script>