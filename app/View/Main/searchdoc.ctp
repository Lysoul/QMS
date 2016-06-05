<div class="container">

    <div class="MainImage"> 
        <div align="center" style="padding-top:80px;">
             <h3 style="padding-bottom:25px">Aware QMS </h3>
             <p class="HeadTextDes" >These following software processes are based on ISO/IEC 29110 VSE standard.</p>
             <p class="HeadTextDes" >The main flow is slightly different from CMM-based of ProAware section. </p>
             <p class="HeadTextDes" >The sections contain Standard templates and Guidelines..<a href="#" style="color:#B42E34">Learn more</a> </p>
        </div>

    </div>



    <div class="row" align="center" style="padding-top:20px"> 
        <h3>What are you looking for?</h3>
         <br>
    </div>


    <div class="row" align="center"> 
          <div class="col s4">  
            <?php 
                echo $this->Html->link('<b>Process & Subprocess </b>', array(
                    'controller' => 'Main',
                    'action' => 'searchprocess',
                 ),array('escape' => false,'class' => 'waves-effect waves-light btn','style' => 'background-color: #FFFFFF;color:#B42E34;text-transform: capitalize; font-size:20px')); 
            ?>
        </div>
          <div class="col s4"> 

            <?php 
                echo $this->Html->link('<b>Role & Responsibility </b>', array(
                    'controller' => 'Main',
                    'action' => 'searchrole',
                 ),array('escape' => false,'class' => 'waves-effect waves-light btn','style' => 'background-color: #FFFFFF;color:#B42E34;text-transform: capitalize; font-size:20px')); 
            ?>

          </div>
          <div class="col s4"> <a class="waves-effect waves-light btn" style="background-color: #b42e34;color:#B42E34;text-transform: capitalize; font-size:20px"><b style="color:#FFFFFF">Documents & Templates</b></a> </div>
    </div>

            <div class="row" align="center"> 
            <?php echo $this->Form->create('searchfordoc', array('class' => 'col s12'));  ?>
             

                    <div class="input-field col s3" align="right">
                        <h5 id="head">Document name is </h5>
                    </div>

                    <div class="input-field col s7">
                        <?php 

                            echo $this->Form->input('textsearch', array(
                                'type' => 'text',
                                'id' => 'mysearch',
                                'div' => false,
                                'label' => false,
                                'placeholder' => 'Document, Tempate, Guildeline Name',
                                'class' => 'span7'
                                //'append' => array('<i class="icon-search"></i>', array('wrap' => 'button', 'class' => 'btn')),
                            ));
                        ?>
                    </div>
                    <div class="input-field col s2">
                        <?php 
                            echo $this->Form->submit('Search  <i class="fa fa-search" id="search"></i>', array(
                                    'div' => false,
                                    'class' => 'btn btn-large',
                                    'style' => 'background-color: #b42e34;text-transform: capitalize; font-size:17px'
                            ));

                        ?>

                    </div>



            <?php echo $this->Form->end(); ?>

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
                

                
                 <span style="font-size:18px;color:#FFFFFF" id="pms">+</span>
                   <?php 
                        echo $this->Html->link('<span style="font-size:18px;color:#FFFFFF"> Project Management (PM) process</span>', array(
                            'controller' => 'Main',
                            'action' => 'displayprocess',
                            'process' => 'Project Management',
             
                         ),array('escape' => false)); 
                    ?>
              

                <br>
                <div id="pmsh" style="display:none;">
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Project Planning &nbsp </span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Project Closure &nbsp </span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Project Plan Execution &nbsp </span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Project Assessment and ControlApplication </span>
                </div>    

              
                 <span style="font-size:18px;color:#FFFFFF;" id="sis">+</span>
                   <?php 
                        echo $this->Html->link('<span style="font-size:18px;color:#FFFFFF;"> Software Implementation (SI) process</span>', array(
                            'controller' => 'Main',
                            'action' => 'displayprocess',
                            'process' => 'Software Implementation',
             
                         ),array('escape' => false)); 
                    ?>
                <br>

                <div id="sish" style="display:none;">
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Implementation Initiation &nbsp</span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Requirements Analysis &nbsp</span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Architectural and detailed design &nbsp</span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Software Construction &nbsp</span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Integartion and tests &nbsp</span> 
                  <br>
                  <span style="padding-left:30px;color:#FFFFFF;font-size:16px">- Product Delivery &nbsp</span>
                </div>
                <br>
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