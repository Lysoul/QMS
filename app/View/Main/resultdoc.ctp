<script type="text/javascript"> 
    $(document).ready(function () { 

         $('#searchindocDdtype').change(function() { 
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


    });
</script>

<div class="container">

    <div class="row" align="center" style="padding-top:20px;padding-left:20px"> 

            <?php echo $this->Form->create('searchindoc');  ?>

            		<div class="input-field col s3"> 

  		 	  		  <?php 
					  	echo $this->Form->input('ddtype', array(
						    'options' => array("Search by Process", "Search by Role", "Search by Document"),
						    'label' => false,
						    'selected' => array(2),
						    'class' => 'browser-default',
						    'style' => 'color:#B42E34',
						    'name' => 'ddtype'

						));

					  ?>
            				
            		</div>

		
	                    <div class="input-field col s3" style="border-left: 1px solid #c3575c;">
	                        <h5 id="ddcheck">Document name is</h5>
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
    	<div class="col m12"> 
	      <table class="highlight">
	        <thead>
	          <tr style="color:#57575B">
	              <th data-field="id">Name</th>
	              <th data-field="title">Title</th>
	              <th data-field="date">Last Updated</th>
	              <th data-field="process">Process</th>
	              <th data-field="subprocess">Subprocess</th>
	              <th data-field="role">Role/Responsibility</th>
	              <th data-field="download">Download</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php 
	        	  if(isset($query)){
	        		foreach ($query as $doc) { ?>

                 <?php 
                    if( ($doc['activities']['template_url'] != null || $doc['activities']['template_url'] != '') || ($doc['activities']['template_file'] != null || $doc['activities']['template_file'] != '' ) ) {
                ?>

		          <tr>
		            <td class="cl-red"><?php echo $doc['activities']['template_name']; ?></td>
		            <td><?php echo $doc['activities']['template_title']; ?></td>
		            <td><?php 	

		            	if($doc['activities']['modified_date'] != NULL && $doc['activities']['modified_date'] != '') {
			            	$mydate = strtotime($doc['activities']['modified_date']);
							$mysqldate = date( 'd/m/Y', $mydate );
			            	echo $mysqldate; 
		            	}
		            ?></td>
		            <td>
		            	<?php 

	                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$doc['processes']['name'].'</span>', array(
	                            'controller' => 'Main',
	                            'action' => 'displayprocess',
	                            'process' => $doc['processes']['id']
	                        ),array('escape' => false));

		            	?>

		            </td>
                <td class="cl-red">
                        <?php 
                                echo $this->Html->link(' <span style="color:#b42e34">'.$doc['subprocesses']['name'].'</span>', array(
                                    'controller' => 'Main',
                                    'action' => 'displaysubprocess',
                                    'subprocess' => $doc['subprocesses']['id'],
                     
                                ),array('escape' => false)); 

                        ?>

                    </td>
		            <td class="cl-red"> 
		            	<?php 
                            if($doc['activities']['role_name1'] != '' || $doc['activities']['role_name1'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$doc['activities']['role_name1'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $doc['activities']['role_name1']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($doc['activities']['role_name2'] != '' || $doc['activities']['role_name2'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$doc['activities']['role_name2'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $doc['activities']['role_name2']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($doc['activities']['role_name3'] != '' || $doc['activities']['role_name3'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$doc['activities']['role_name3'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $doc['activities']['role_name3']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($doc['activities']['role_name4'] != '' || $doc['activities']['role_name4'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$doc['activities']['role_name4'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $doc['activities']['role_name4']
			                        ),array('escape' => false));

                					echo "<br>";
                            }
                            if($doc['activities']['role_name5'] != '' || $doc['activities']['role_name5'] != NULL) {
			                        echo $this->Html->link('<span style="color:#B53338;font-size:15px">'.$doc['activities']['role_name5'].'</span>', array(
			                            'controller' => 'Main',
			                            'action' => 'displayrole',
			                            'role' => $doc['activities']['role_name5']
			                        ),array('escape' => false));

                					echo "<br>";
                            }

		            	?>
		            </td>
		   
		            <td> 

                 <?php if($doc['activities']['template_check'] == 1){ ?>
                    <a href="<?php echo $doc['activities']['template_url']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>
                <?php }else { ?>
                    <a href="<?php echo $this->webroot.'uploadfile/'.$doc['activities']['template_file']; ?>" target="_blank"><img width="40" height="40" src="<?php echo $this->webroot; ?>img/ex-icon.png"/> </a>
                <?php } ?>




		            </td>

		            
		          </tr>
                
                <?php
                    }//end check URL

                ?>



	          	<?php

	        		}
	        	}//end if isset
	        	?> 


	        </tbody>
	      </table>
	   	
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