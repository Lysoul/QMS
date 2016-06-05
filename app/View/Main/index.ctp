<script type="text/javascript"> 
    $(document).ready(function () { 

         $('input[type=radio][name="data[search][radiochoose]" ]').change(function() { 
             // send ajax
            $.ajax({
                  url: "<?php echo Router::url(array('controller'=>'main','action'=>'switch_check'));?>",
                  method: 'POST',
                  dataType: 'HTML',
                  data: {headcheck: $('input[name="data[search][radiochoose]" ]:checked').val() },
                  success: function(data, textStatus) {
                    $("#head").html(data.toString());
                  }
            });
         });


         $('#pctog').on("click",function(){
            //$("#pctog").css({"height": "200px","position": "static"});
         });

    });
</script>
<style> 
body {
    overflow-y:hidden;
}

</style>



<div class="container">

    <div class="MainImage"> 
        <div align="center" style="padding-top:80px;">
              <?php foreach ($pullabout as $value) { ?>

              <?php 


              $part = explode(".", $value['abouts']['subheader_description2']); 

              ?>
             <h3 style="padding-bottom:25px"><?php echo $value['abouts']['subheader_name2']; ?></h3>
             <p class="HeadTextDes" style="line-height:25px"><?php echo $value['abouts']['subheader_description2']; ?>..<?php 
                  echo $this->Html->link('<span style="color:#B42E34">Learn more</span>', array(
                      'controller' => 'Main',
                      'action' => 'about'
                  ),array('escape' => false));
              ?>
            </p>


            <?php } ?>

            




        </div>

       

    </div>

  


 

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

  <?php if(!$this->Session->check('userid')){?>

    <div class="fixed-action-btn" style="bottom: 5px; right: 50px;">
      <?php 

      echo $this->Html->link(('<i class="fa fa-user" aria-hidden="true" style="font-size:18px"></i>'), array('controller' => 'activity', 'action' => 'login'),array('escape' => false,'class' => 'btn-floating waves-effect waves-light','style' => 'background-color:#bdbdbd'));  

      ?>
    </div>
<?php } ?>




<script type="text/javascript">

jQuery(function($){


    $('.fTab').on('click', function(){
      $('.fTab1').css("display","block");
    });


    $('.jTab').on('click', function(){
      $('.jTab1').css("display","block");
    });




    $('.intab1').on('click', function(){
      $('.fTab1').css("display","none");
    });

    $('.intab2').on('click', function(){
      $('.jTab1').css("display","none");
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