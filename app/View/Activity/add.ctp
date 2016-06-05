  <?php 

  //if($this->Session->check('userid')) {
  if(isset($_SESSION["userid"])){
    ?>


<?php echo $this->Html->css('bootstrap-combined.min'); ?>
<?php echo $this->Html->css('custom'); ?>
<script type="text/javascript"> 
    $(document).ready(function () { 

        $('select#AddProcessName').on('change', function() {
            var process_name = $(this).val();
             // send ajax
            $.ajax({
              url: "<?php echo Router::url(array('controller'=>'activity','action'=>'ajax_reflection'));?>",
              method: 'POST',
              dataType: 'HTML',
              data: {id: process_name},
              success: function(data, textStatus) {
                $("select#AddSubprocessName").html(data.toString());
              }



            });

        });

        $('select#AddTemplateType').on('change', function() {
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


         $('#AddAddForm').validate({
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
<?php echo $this->Form->create('Add', array('class' => 'bs-docs-main2','enctype'=>'multipart/form-data')); ?>
<?php echo $this->Session->flash(); ?>
    <fieldset>
        <legend>Add activity</legend>
        <?php echo $this->Form->input('activity_name', array(
            'label' => '<b>Activity Name </b><span class="str_red">*</span>',
            'type' => 'text',
            'class' => 'span9',
            'name' => 'activity_name',
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
                //'onchange' => 'javascript:alert(this.id);',

                
			));

        ?>

      <?php 
            echo $this->Form->input('subprocess_name', array(
                'label' => '<b>Subprocess </b><span class="str_red">*</span>',
                'options' => array(''),
                'empty' => '-- Select process before  --',
                'class' => 'span9',
                'name' => 'subprocess_name',
                
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
        		'label' => '<b>Role1 </b><span class="str_red">*</span>',
			    'options' => $role_name,
			    'empty' => '-- Select One --',
			    'class' => 'span9',
                'name' => 'role1_name',
			));

        ?>
        <?php 
        	echo $this->Form->input('role2_name', array(
        		'label' => '<b>Role2 <b/>',
			    'options' => $role_name,
			    'empty' => '-- Select One --',
			    'class' => 'span9'
			));

        ?>
        <?php 
        	echo $this->Form->input('role3_name', array(
        		'label' => '<b>Role3 <b/>',
			    'options' => $role_name,
			    'empty' => '-- Select One --',
			    'class' => 'span9'
			));

        ?>
        <?php 
        	echo $this->Form->input('role4_name', array(
        		'label' => '<b>Role4 <b/>',
			    'options' => $role_name,
			    'empty' => '-- Select One --',
			    'class' => 'span9'
			));

        ?>
        <?php 
        	echo $this->Form->input('role5_name', array(
        		'label' => '<b>Role5 <b/>',
			    'options' => $role_name,
			    'empty' => '-- Select One --',
			    'class' => 'span9'
			));

        ?>
        <?php echo $this->Form->input('template_name', array(
            'label' => '<b>Template Name </b>',
            'type' => 'text',
            'class' => 'span9'
        )); ?>


        <?php 
            echo $this->Form->input('template_type', array(
                'label' => '<b>Template Type <b/>',
                'options' => array('1'=> 'URL','2'=> 'File'),
                'class' => 'span9'
            ));

        ?>
        <div id="turl" style="display:block"> 
            <?php   echo $this->Form->input('template_url', array(
                'label' => '<b>Template URL </b>',
                'type' => 'textarea',
                'class' => 'span9',
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
            'max' => '999'
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
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>




<?php echo $this->Html->script('jquery.validate'); ?>
<?php echo $this->Html->script('additional-methods'); ?>


<?php } //end check sessione

else{

  header('Location: '.$this->Html->url(array(
    "controller" => "Main",
    "action" => "index"
    )).'');
exit;


}


 ?>