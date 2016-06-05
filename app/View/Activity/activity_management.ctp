  <?php if(isset($_SESSION["userid"])){ ?>




<?php App::uses('Security', 'Utility'); ?>

<?php echo $this->Session->flash(); ?>
<div class="container">
<?php echo $this->Form->create('search', array('class' => 'bs-docs-main1 form-horizontal')); ?>

                <h4>Add Activity</h4>
                <hr>
                  <?php 

                    echo $this->Html->link(
                        '<i class="fa fa-plus" aria-hidden="true" style="font-size:14px"></i> ADD',
                        '/activity/add',
                        array('class' => 'btn green accent-4','escape' => false,'style' => 'text-transform: capitalize')
                    );


                  ?>

                <br><br>
                <h4>List Activity</h4>
                <hr>



                <div style="padding-top:20px;padding-left:20px;line-height:40px" >      

                    <?php
                               foreach ($pullpm as $value) { 
                            echo $this->Html->link('<b style="font-size:18px">Process-'.$value['Process']['name'].' ('.$value['Process']['short_name'].')</b>', array(
                                'controller' => 'Activity',
                                'action' => 'listactivity',
                                'process' => $value['Process']['id'],
                                'subprocess' => 0,
                             ),array('escape' => false)); 

                                
                    ?>
              
                    <br>
                    
                     <?php foreach ($value['Subprocess'] as $value1) { ?>
                      <?php 
                          echo $this->Html->link('<span style="padding-left:30px;color:#b42e34;font-size:16px">-  '.$value1['name'].' &nbsp', array(
                            'controller' => 'Activity',
                            'action' => 'listactivity',
                            'process' => $value['Process']['id'],
                            'subprocess' => $value1['id'],

                         ),array('escape' => false)); 
                      ?>
                    <br>
                    <?php }//end subprocess pm ?>

                <?php }//end foreach ?> 


                <?php
                       foreach ($pullsi as $value) { 
                    echo $this->Html->link('<b style="font-size:18px">Process-'.$value['Process']['name'].' ('.$value['Process']['short_name'].')</b>', array(
                        'controller' => 'Activity',
                        'action' => 'listactivity',
                        'process' => $value['Process']['id'],
                        'subprocess' => 0,
                     ),array('escape' => false)); 

                                
                    ?>
              
                    <br>
                    
                     <?php foreach ($value['Subprocess'] as $value1) { ?>
                      <?php 
                          echo $this->Html->link('<span style="padding-left:30px;color:#b42e34;font-size:16px">-  '.$value1['name'].' &nbsp', array(
                            'controller' => 'Activity',
                            'action' => 'listactivity',
                            'process' => $value['Process']['id'],
                            'subprocess' => $value1['id'],

                         ),array('escape' => false)); 
                      ?>
                    <br>
                    <?php }//end subprocess pm ?>

                <?php }//end foreach ?> 

                </div>


<?php echo $this->Form->end(); ?>
</div>

<?php } //end check sessione

else{

  header('Location: '.$this->Html->url(array(
    "controller" => "Main",
    "action" => "index"
    )).'');
exit;


}


 ?>