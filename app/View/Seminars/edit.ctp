<div class="seminars form">
<?php echo $this->Form->create('Seminar'); ?>
	<fieldset>
		<legend><?php echo __('Edit Seminar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('reservation_limit');
		echo $this->Form->input('place');
		echo $this->Form->input('account_id');
		echo $this->Form->input('teach_me_id');
		echo $this->Form->input('gj');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('description');
		echo $this->Form->input('upper_limit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Seminar.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Seminar.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teach Mes'), array('controller' => 'teach_mes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teach Me'), array('controller' => 'teach_mes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participants'), array('controller' => 'participants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participant'), array('controller' => 'participants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
