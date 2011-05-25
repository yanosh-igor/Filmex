<h2>Log In</h2>
<?php echo $session->flash('auth'); ?>
<?=$form->create('User',array('action'=>'login'));?>
<?=$form->input('username');?>
<?=$form->input('password');?>
<?=$form->end('Login');?>