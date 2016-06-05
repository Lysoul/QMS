<?php

if(isset($query)){
	
//Prepair related item & below table
$process_value = array();
$subprocess_value = array();
$role_value = array();


	foreach ($query as  $activity) { 
    
	    if($activity['processes']['name'] != NULL){
	        array_push($process_value,$activity['processes']['name']);
	    }

	    if($activity['subprocesses']['name'] != NULL){
	       array_push($subprocess_value,$activity['subprocesses']['name']);
	    }


	    if($activity['activities']['role_name1'] != NULL){
	        array_push($role_value,$activity['activities']['role_name1']);
	    }
	    if($activity['activities']['role_name2'] != NULL){
	        array_push($role_value,$activity['activities']['role_name2']);
	    }

	    if($activity['activities']['role_name3'] != NULL){
	        array_push($role_value,$activity['activities']['role_name3']);
	    }


	    if($activity['activities']['role_name4'] != NULL){
	        array_push($role_value,$activity['activities']['role_name4']);
	    }

	    if($activity['activities']['role_name5'] != NULL){
	        array_push($role_value,$activity['activities']['role_name5']);
	    }

	} //end foreach

	$process_value = array_unique($process_value);
	$subprocess_value = array_unique($subprocess_value);
	$role_value = array_unique($role_value);



}else{
	

}



 ?>

<script type="text/javascript"> 
    $(document).ready(function () { 

         $('#searchinroleDdtype').change(function() { 
            //0,1,2
            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'resultchange'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {ddcheck: this.value},
                  success: function(data, textStatus) {
                    $("#ddcheck").html(data.toString());
                  }
            });
         });
         
      $("#slide1").click(function(){
    	  var htmlString = $(this).html();
	    	if(htmlString == "+"){
	    		$(this).text("-");

	    	}else{
	    		$(this).text("+");

	    	}
	        $("#show1").slideToggle('fast');

	    });

      $("#slide2").click(function(){
        var htmlString = $(this).html();
        if(htmlString == "+"){
          $(this).text("-");

        }else{
          $(this).text("+");

        }
          $("#show2").slideToggle('fast');

      });


	    $('#slide1').hover(function() {
	        $(this).css('cursor','pointer');
	    });

      $('#slide2').hover(function() {
          $(this).css('cursor','pointer');
      });

    });
</script>

<div class="container">

    <div class="row" align="center" style="padding-top:20px;padding-left:20px"> 

            <?php echo $this->Form->create('searchinrole');  ?>

            		<div class="input-field col s3"> 

  		 	  		  <?php 
					  	echo $this->Form->input('ddtype', array(
						    'options' => array("Search by Process", "Search by Role", "Search by Document"),
						    'label' => false,
						    'selected' => array(1),
						    'class' => 'browser-default',
						    'style' => 'color:#B42E34',
						    'name' => 'ddtype'

						));

					  ?>
            				
            		</div>

		
	                    <div class="input-field col s3" style="border-left: 1px solid #c3575c;">
	                        <h5 id="ddcheck">I'm a</h5>
	                    </div>

	                    <div class="input-field col s4">
	                        <?php 

	                            echo $this->Form->input('textsearch', array(
	                                'type' => 'text',
	                                'id' => 'mysearch',
	                                'div' => false,
	                                'label' => false,
	                                'placeholder' => 'Process name, subprocess or activity',
	                                'class' => 'span7',
	                                'value' => $this->request->named['txt']
	                                //'append' => array('<i class="icon-search"></i>', array('wrap' => 'button', 'class' => 'btn')),
	                            ));
	                        ?>
	                    </div>
	                    <div class="input-field col s1">
	                        <?php 
	                            echo $this->Form->submit('Search  <i class="fa fa-search" id="search"></i>', array(
	                                    'div' => false,
	                                    'class' => 'btn',
	                                    'style' => 'background-color: #b42e34;text-transform: capitalize; font-size:18px'
	                            ));

	                        ?>

	                    </div>
	            
       

            <?php echo $this->Form->end(); ?>
    </div>

    


    <div class="row" style="padding-left:20px;padding-right:20px"> 
    	<h4 style="color:#8A8C8C;padding-left:10px;font-size:30px">Search Results</h4>
    	<div class="col m6"> 

          <div class="card" style="min-height:350px">
            <div class="card-content white-text">
              <h5 class="card-title" style="color:#8A8C8C">Click the roles to see  a responsibilty</h5>
               <?php 
               	if(isset($queryrole)){
	                  foreach ($queryrole as $role) {
	                       echo $this->Html->link('<p class="resulttext" style="color:#B53338;font-size:16px">'.$role['roles']['name'].'</p>', array(
	                            'controller' => 'Main',
	                            'action' => 'displayrole',
	                            'role' => $role['roles']['name']
	                        ),array('escape' => false));

	                       echo "<p style='color:#A1A3A3;font-size:14px'>".$role['roles']['intro_description']."</p>";
	          			   echo "<p style='color:#A1A3A3;font-size:14px'>".$role['roles']['main_description']."</p>";
                     echo "<br>";
	                  }	

               	}else{
               		//echo '<p class="resulttext" style="color:#B53338"> Not Found Role !!!</p>';

               	}


               ?>


            </div>
          </div>

    	</div>
    	<div class="col m6"> 
          <div class="card" style="min-height:350px">
            <div class="card-content white-text">
              <h5 class="card-title" style="color:#8A8C8C">Process you might have to involve</h5>
               
              
               <?php 
                if(isset($process_value) && isset($subprocess_value)) {

                   foreach ($pullpm as $value) { 
	                   if(in_array($value['Process']['name'], $process_value)){
                      echo "<br>";
	                    	echo '<span class="resulttext" style="color:#B53338" id="slide1">+</span>';
	                        echo $this->Html->link('<span class="resulttext" style="color:#B53338"> '.$value['Process']['name'].' ('.$value['Process']['short_name'].') process</span>', array(
	                            'controller' => 'Main',
	                            'action' => 'displayprocess',
	                            'process' => $value['Process']['id']
	                        ),array('escape' => false));

	                    }//end if 

                      ?>
                        <div id="show1" style="display:none">
                            <?php  

                            foreach ($value['Subprocess'] as $value) {  

                                echo $this->Html->link('<span class="resulttext" style="color:#B53338;padding-left:30px">- '.$value['name'].' &nbsp</span>', array(
                                    'controller' => 'Main',
                                    'action' => 'displaysubprocess',
                                    'subprocess' => $value['id'],
                     
                                ),array('escape' => false)); 
                                echo "<br>";
                            }//end subprocess pm

                            ?>
          
                       </div>


             <?php  }//end foreach ?>

                <?php 
                    foreach ($pullsi as $value) { 
	                    if(in_array($value['Process']['name'], $process_value)){
                        echo "<br>";
	                    	echo '<span class="resulttext" style="color:#B53338" id="slide2">+</span>';
	                        echo $this->Html->link('<span class="resulttext" style="color:#B53338"> '.$value['Process']['name'].' ('.$value['Process']['short_name'].') process</span>', array(
	                            'controller' => 'Main',
	                            'action' => 'displayprocess',
	                            'process' => $value['Process']['id']
	                        ),array('escape' => false));

	                    } 

                      ?>

                        <div id="show2" style="display:none">
                            <?php  

                            foreach ($value['Subprocess'] as $value) {  

                                echo $this->Html->link('<span class="resulttext" style="color:#B53338;padding-left:30px">- '.$value['name'].' &nbsp</span>', array(
                                    'controller' => 'Main',
                                    'action' => 'displaysubprocess',
                                    'subprocess' => $value['id'],
                     
                                ),array('escape' => false)); 
                                echo "<br>";
                            }//end subprocess pm

                            ?>
                       </div>

                      <?php }//end foreach ?>



               <?php 


                    }else{
                      //echo '<p class="resulttext" style="color:#B53338">Not found !!!</p>';


                    }

               ?>


            </div>
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

                    foreach ($queryrolef as $value) {


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