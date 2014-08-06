<div class="seminarImages form">
<?php echo $this->Form->create('SeminarImage'); ?>
	<fieldset>
		<legend><?php echo __('Add Seminar Image'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Seminar Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
