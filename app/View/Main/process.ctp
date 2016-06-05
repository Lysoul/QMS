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
<!-- 	<div style="float:right;padding-top:20px;padding-right:30px">
     <?php 
            echo $this->Html->link('Search <i class="fa fa-search" id="search"></i>', array(
                'controller' => 'Main',
                'action' => 'searchprocess',
 
             ),array('escape' => false,'id' => 'pbtn','class' => 'waves-effect waves-light btn','style' => 'background-color: #b42e34;text-transform: capitalize; font-size:20px')); 
        ?>
     </div> -->	

  




        <div style="padding-top:15px"> 
	            <?php echo $this->Form->create('searchforprocess', array('class' => 'searchbox'));  ?>

	                        <?php 

	                            echo $this->Form->input('textsearch', array(
	                                'type' => 'text',
	                                'id' => 'mysearch',
	                                'div' => false,
	                                'label' => false,
	                                'placeholder' => 'Process name, subprocess or activity',
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

			<?php 
	            foreach ($pullprocessovv as $value) {
	                $head = $value['Processoverview']['header'];
	                $des = $value['Processoverview']['description'];
           		 }
			?>

	
			<h4 style="color:#8A8C8C;font-size:30px"><?php echo $head; ?></h4>
			<p style="color:#56565A;font-size:18px;padding-top:25px"><?php echo $des; ?></p>


			<p style="color:#56565A;font-size:18px"></p>

			<div style="padding-left:95px;line-height: 40px;"> 
				

				
				 <b style="font-size:18px" id="pmslide">+</b>

			     <?php
                   foreach ($pullpm as $value) { 
		            echo $this->Html->link('<b style="font-size:18px">Process-'.$value['Process']['name'].' ('.$value['Process']['short_name'].')</b>', array(
		                'controller' => 'Main',
		                'action' => 'displayprocess',
		                'process' => $value['Process']['id'],
		 
		             ),array('escape' => false)); 

                    
		        ?>
	
				<br>
				<div id="pmshow" style="display:none;">
                     <?php foreach ($value['Subprocess'] as $value) { ?>
                      <?php 
                          echo $this->Html->link('<span style="padding-left:30px;color:#b42e34;font-size:16px">-  '.$value['name'].' &nbsp </span> <span style="font-size:14px;color:#8A8C8C">  '.$value['process_insub'].'</span>', array(
                            'controller' => 'Main',
                            'action' => 'displaysubprocess',
                            'subprocess' => $value['id'],

                         ),array('escape' => false)); 
                      ?>
                    <br>
                    <?php }//end subprocess pm ?>


                </div>	
                <?php }//end foreach ?>	



			     <?php foreach ($pullsi as $value) {  ?>
				 <b style="font-size:18px" id="sislide">+</b>
			     <?php 
		            echo $this->Html->link('<b style="font-size:18px">Process-'.$value['Process']['name'].' ('.$value['Process']['short_name'].')</b>', array(
		                'controller' => 'Main',
		                'action' => 'displayprocess',
		                'process' => $value['Process']['id'],
		 
		             ),array('escape' => false)); 
		        ?>
				<br>

				<div id="sishow" style="display:none;">
                    <?php foreach ($value['Subprocess'] as $value) { ?>
                    
                      <?php 
                          echo $this->Html->link('<span style="padding-left:30px;color:#b42e34;font-size:16px">-  '.$value['name'].' &nbsp </span> <span style="font-size:14px;color:#8A8C8C">  '.$value['process_insub'].'</span>', array(
                            'controller' => 'Main',
                            'action' => 'displaysubprocess',
                            'subprocess' => $value['id'],

                         ),array('escape' => false)); 
                      ?>
                    
                    <br>
                    <?php }//end sub si ?>
				</div>
                <?php  } //endprocess si ?>


				<br>
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