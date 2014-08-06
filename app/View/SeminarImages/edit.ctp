<div class="seminarImages form">
<?php echo $this->Form->create('SeminarImage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Seminar Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('account_id');
		echo $this->Form->input('description');
		echo $this->Form->input('ext');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SeminarImage.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SeminarImage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Seminar Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
