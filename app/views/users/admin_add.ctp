<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Register'); ?></legend>
 		<?php echo $session->flash('auth');?>
 
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type' => 'password'));
		
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
