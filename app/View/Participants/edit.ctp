<div class="participants form">
<?php echo $this->Form->create('Participant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Participant'); ?></legend>
	<?php
		echo $this->Form->input('seminar_id');
		echo $this->Form->input('account_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Participant.seminar_id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Participant.seminar_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Participants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
