<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	
	 <thead>  
            <tr>  
                
                <th>Name</th> 
                <th>Password</th>   
               <th>Actions</th>  
            </tr>  
        </thead> 
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
	
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Dvds', true), array('controller' => 'dvds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dvd', true), array('controller' => 'dvds', 'action' => 'add')); ?> </li>
	</ul>
</div>