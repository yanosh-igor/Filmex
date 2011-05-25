<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Firstname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['firstname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lastname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['lastname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Roles'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['roles']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Films', true), array('controller' => 'films', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Film', true), array('controller' => 'films', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Films');?></h3>
	<?php if (!empty($user['Film'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Film'] as $film):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $film['id'];?></td>
			<td><?php echo $film['title'];?></td>
			<td><?php echo $film['description'];?></td>
			<td><?php echo $film['content'];?></td>
			<td><?php echo $film['date'];?></td>
			<td><?php echo $film['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'films', 'action' => 'view', $film['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'films', 'action' => 'edit', $film['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'films', 'action' => 'delete', $film['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $film['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Film', true), array('controller' => 'films', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
