<div class="licenses view">
<h2><?php echo __('License'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($license['License']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($license['License']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit License'), array('action' => 'edit', $license['License']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete License'), array('action' => 'delete', $license['License']['id']), array(), __('Are you sure you want to delete # %s?', $license['License']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Licenses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New License'), array('action' => 'add')); ?> </li>
	</ul>
</div>
