  <?php 

  //if($this->Session->check('userid')) {
    if(isset($_SESSION["userid"])){

    ?>
<?php App::uses('Security', 'Utility'); ?>

<?php if($display === "Y") { ?>




<?php //print_r($activities); ?>
<?php echo $this->Html->css('bootstrap-combined.min'); ?>
<?php echo $this->Html->css('custom'); ?>

<script type="text/javascript"> 
    $( window ).load(function() {
          var template_type = $('select#EditTemplateType').val();
            if(template_type == '1'){
               $('#turl').css('display','block');
               $('#tfile').css('display','none');
            }else if(template_type == '2'){
               $('#tfile').css('display','block');
               $('#turl').css('display','none');
            }else{
                $('#turl').css('display','none');
                $('#tfile').css('display','none');
            }
    });
        

    $(document).ready(function () { 

        $('select#EditProcessName').on('change', function() {
            var process_name = $(this).val();
             // send ajax
            $.ajax({
              url: "<?php echo Router::url(array('controller'=>'activity','action'=>'ajax_reflection'));?>",
              method: 'POST',
              dataType: 'HTML',
              data: {id: process_name},
              success: function(data, textStatus) {
                $("select#EditSubprocessName").html(data.toString());
              }



            });

        });

        $('select#EditTemplateType').on('change', function() {
            var template_type = $(this).val();
            if(template_type == '1'){
               $('#turl').css('display','block');
               $('#tfile').css('display','none');
            }else if(template_type == '2'){
               $('#tfile').css('display','block');
               $('#turl').css('display','none');
            }else{
                $('#turl').css('display','none');
                $('#tfile').css('display','none');
            }

        });




         $('#EditEditForm').validate({
        rules: {
            activity_name: {
                required: true
            },
            process_name: {
                required: true
            },
           subprocess_name: {
                required: true
            },
            role1_name: {
                required: true
            },



        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
        });



    }); 
</script>
<div class="container">
<?php echo $this->Form->create('Edit', array('class' => 'bs-docs-main2','enctype'=>'multipart/form-data')); ?>
<?php echo $this->Session->flash(); ?>
    <fieldset>
        <legend>Edit activity</legend>
        <?php 
            foreach ($activities as $activity) {
                $name = $activity['activities']['name'];
                $pcID = $activity['processes']['id'];
                $spcID = $activity['activities']['subprocess_id'];
                $role1 = $activity['activities']['role_name1'];
                $role2 = $activity['activities']['role_name2'];
                $role3 = $activity['activities']['role_name3'];
                $role4 = $activity['activities']['role_name4'];
                $role5 = $activity['activities']['role_name5'];
                $template_name = $activity['activities']['template_name'];
                $template_check = $activity['activities']['template_check'];
                $activity_sequence = $activity['activities']['sub_sort'];
                $template_url = $activity['activities']['template_url'];

            }

            echo $this->Form->input('activity_name', array(
                'label' => '<b>Activity Name </b><span class="str_red">*</span>',
                'type' => 'text',
                'class' => 'span9',
                'name' => 'activity_name',
                'value' =>  $name
            )); ?>

        <?php 


            $process_name = array();
            foreach ($processes as $process) {
               list(list($a),list($b)) = array(array($process['Process']['id']), array($process['Process']['name']) );
               array_push($process_name, array($a=>$b));
            }

            $process_name = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($process_name)), $a);
            echo $this->Form->input('process_name', array(
                'label' => '<b>Process </b><span class="str_red">*</span>',
                'options' => $process_name,
                'empty' => '-- Select One --',
                'class' => 'span9',
                'name' => 'process_name',
                'selected' => $pcID,

                
            ));
 


        ?>

      <?php 


            $sprocess_name = array();
            foreach ($subprocesses as $subprocess) {
               list(list($g),list($d)) = array(array($subprocess['Subprocess']['id']), array($subprocess['Subprocess']['name']) );
               array_push($sprocess_name, array($g=>$d));
            }

            $sprocess_name = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($sprocess_name)), $g);



            echo $this->Form->input('subprocess_name', array(
                'label' => '<b>Subprocess <b/><span class="str_red">*</span>',
                'options' => $sprocess_name,
                'empty' => '-- Select process before  --',
                'class' => 'span9',
                'name' => 'subprocess_name',
                'selected' => $spcID,
                
            ));

        ?>

        <?php 
            $role_name = array();
            foreach ($roles as $role) {
               list(list($c),list($d)) = array(array($role['Role']['name']), array($role['Role']['name']) );
               array_push($role_name, array($c=>$d));
            }

            $role_name = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($role_name)), $c);





            echo $this->Form->input('role1_name', array(
                'label' => '<b>Role1 <b/><span class="str_red">*</span>',
                'options' => $role_name, 
                'empty' => '-- Select One --',
                'class' => 'span9',
                'name' => 'role1_name',
                'selected' => $role1
            ));

        ?>
        <?php 
            echo $this->Form->input('role2_name', array(
                'label' => '<b>Role2 </b>',
                'options' => $role_name, 
                'empty' => '-- Select One --',
                'class' => 'span9',
                'selected' => $role2
            ));

        ?>
        <?php 
            echo $this->Form->input('role3_name', array(
                'label' => '<b>Role3 </b>',
                'options' => $role_name,
                'empty' => '-- Select One --',
                'class' => 'span9',
                'selected' => $role3
            ));

        ?>
        <?php 
            echo $this->Form->input('role4_name', array(
                'label' => '<b>Role4 <b/>',
                'options' => $role_name,
                'empty' => '-- Select One --',
                'class' => 'span9',
                'selected' => $role4
            ));

        ?>
        <?php 
            echo $this->Form->input('role5_name', array(
                'label' => '<b>Role5 </b>',
                'options' => $role_name,
                'empty' => '-- Select One --',
                'class' => 'span9',
                'selected' => $role5
            ));

        ?>
        <?php echo $this->Form->input('template_name', array(
            'label' => '<b>Template Name </b>',
            'type' => 'text',
            'class' => 'span9',
            'value' => $template_name
        )); ?>


        <?php 
            echo $this->Form->input('template_type', array(
                'label' => '<b>Template Type <b/>',
                'options' => array('1'=> 'URL','2'=> 'File'),
                'class' => 'span9',
                'selected' => $template_check
            ));

        ?>


        <div id="turl" style="display:none"> 
            <?php   echo $this->Form->input('template_url', array(
                'label' => '<b>Template URL </b>',
                'type' => 'textarea',
                'class' => 'span9',
                'value' => $template_url
            ));  ?>
        </div>

        <div id="tfile" style="display:none"> 
            <?php   echo $this->Form->input('template_file', array(
                'label' => '<b>Template File </b>',
                'type' => 'file',
            ));  ?>
        </div>

        <?php echo $this->Form->input('activity_sequence', array(
            'label' => '<b>Activity Sequence </b>',
            'type' => 'number',
            'class' => 'span9',
            'name' => 'activity_sequence',
            'min' => '1',
            'max' => '999',
            'value' => $activity_sequence
        )); ?>

       
        <div class="form-actions">

            <?php 
            
            echo $this->Form->submit('Save', array(
                'div' => false,
                'class' => 'btn btn-primary',
            ));
            

             ?>

            <!-- <button class="btn btn-primary" id="onsave">Save</button> -->
            <button class="btn" onclick="javascript:window.history.back()">Cancel</button>

          <?php 
            $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzsf';
            $id = Security::encrypt($id , $key);

           echo $this->Form->input(
                'Delete',
                 array('type' => 'button', 'escape' => false,'div' => false,'label' => false,'class' => 'btn btn-danger',
                       'formaction' => Router::url(
                            array('controller' => 'activity','action' => 'delete', '?' => array('id' => $id ))
                         )
                    )
            );
          ?>
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>

<?php echo $this->Html->script('jquery.validate'); ?>
<?php echo $this->Html->script('additional-methods'); ?>

<?php }//end check ?>


<?php } //end check sessione

else{

  header('Location: '.$this->Html->url(array(
    "controller" => "Main",
    "action" => "index"
    )).'');
exit;


}


 ?>