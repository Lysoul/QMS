<style> 

.searchbox{
    position:relative;
    min-width:50px;
    width:0%;
    height:50px;
    float:right;
    overflow:hidden;
    
    -webkit-transition: width 0.3s;
    -moz-transition: width 0.3s;
    -ms-transition: width 0.3s;
    -o-transition: width 0.3s;
    transition: width 0.3s;
}

.searchbox-input{
    top:0;
    right:0;
    border:0;
    outline:0;
    background:#dcddd8;
    width:100%;
    height:50px;
    margin:0;
    padding:0px 55px 0px 20px;
    font-size:20px;
    color:black;
}
.searchbox-input::-webkit-input-placeholder {
    color: #cccccc;
}
.searchbox-input:-moz-placeholder {
    color: #cccccc;
}
.searchbox-input::-moz-placeholder {
    color: #cccccc;
}
.searchbox-input:-ms-input-placeholder {
    color: #cccccc;
}

.searchbox-icon,
.searchbox-submit{
    width:50px;
    height:50px;
    display:block;
    position:absolute;
    top:0;
    font-family:verdana;
    font-size:22px;
    right:0;
    padding:0;
    margin:0;
    border:0;
    outline:0;
    line-height:50px;
    text-align:center;
    cursor:pointer;
    color:#FFFFFF;
    background:#B42E34;
}



.searchbox-open{
    width:100%;
}



</style>


<div class="container">
        <div style="padding-top:15px"> 
                <?php echo $this->Form->create('searchfordoc', array('class' => 'searchbox'));  ?>

                            <?php 

                                echo $this->Form->input('textsearch', array(
                                    'type' => 'text',
                                    'id' => 'mysearch',
                                    'div' => false,
                                    'label' => false,
                                    'placeholder' => 'Document name, document title, process, subprocess',
                                    'class' => 'searchbox-input',
                                    'onkeyup' => 'buttonUp()'
                                    //'append' => array('<i class="icon-search"></i>', array('wrap' => 'button', 'class' => 'btn')),
                                ));
                            ?>

                            <?php 
                                echo $this->Form->submit('<i class="fa fa-search" id="search"></i>', array(
                                        'div' => false,
                                        'class' => 'searchbox-submit',
                                        'value' => 'GO'
                                ));

                            ?>

                        <span class="searchbox-icon"><i class="fa fa-search" id="search"></i></span>
            

                <?php echo $this->Form->end(); ?>

        </div>


        <div style="padding-top:50px;padding-left:53px;">

   

        <h4 style="color:#8A8C8C;font-size:30px">Dcuments and Templates</h4>

        <div class="row"> 
          <div class="col s12" > 
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
                  if(isset($tabledata)){
                    foreach ($tabledata as $doc) { ?>

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



</div>









<script type="text/javascript">
  $(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;

            $(window).load(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  

            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        });
            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }


</script>