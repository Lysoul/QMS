  <?php if(isset($_SESSION["userid"])){ ?>
  <?php App::uses('Security', 'Utility'); ?>
  <div class="container">

  	<?php if($activities != '' && $activities != NULL){ ?>
  	<div class="bs-docs-main1 form-horizontal">

  	              <table class="table table-hover">
                    <thead style="font-size:25px"> 
                        <td>No.</td>
                        <td>Activity Name</td>
                        <td>Edit</td>
                    </thead>
                    
                    <?php   
                    $i = 1;

                    foreach ($activities as $activity) { 

                    ?>
                      <tbody> 
                        <td><?php echo $i; ?></td>
                        <td><?php echo  $activity['activities']['name']; ?></td>
                        <td>

                          <?php 

                            $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzsf';
                            $id = Security::encrypt($activity['activities']['id'] , $key);

                            echo $this->Html->link(('Edit'), array('controller' => 'activity', 'action' => 'edit', '?' => array('id' => $id )),array('escape' => false,'class' => 'btn yellow darken-3')); 


                          ?>

                        </td>
                      </tbody>
                      <?php $i++; } ?>

              </table> 

   </div>
   <?php }//end if ?>
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