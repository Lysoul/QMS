<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<style> 
body {
    background-color: #F1F1F1;
}
</style>

<?php echo $this->Form->create('Login', array('class' => 'form-horizontal')); ?>
<div class="logo"></div>
<div class="login-block">
 <h1>Login</h1>

<?php 

echo $this->Form->input('username', array(
    'type' => 'text',
    'id' => 'username',
    'placeholder' => 'Username',
    'label' => false,
    'div' => false
)); 

echo $this->Form->input('password', array(
    'type' => 'password',
    'id' => 'password',
    'placeholder' => 'Password',
    'label' => false,
    'div' => false
)); 


echo $this->Form->submit('Submit', array(
    'div' => false
));

echo $this->Form->end(); 


?>