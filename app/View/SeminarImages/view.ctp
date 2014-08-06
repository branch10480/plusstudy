<div class="seminarImages view">
<h2><?php echo __('Seminar Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($seminarImage['SeminarImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seminarImage['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $seminarImage['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($seminarImage['SeminarImage']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ext'); ?></dt>
		<dd>
			<?php echo h($seminarImage['SeminarImage']['ext']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seminar Image'), array('action' => 'edit', $seminarImage['SeminarImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seminar Image'), array('action' => 'delete', $seminarImage['SeminarImage']['id']), array(), __('Are you sure you want to delete # %s?', $seminarImage['SeminarImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminar Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
