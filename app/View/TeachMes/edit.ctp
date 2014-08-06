<div class="teachMes form">
<?php echo $this->Form->create('TeachMe'); ?>
	<fieldset>
		<legend><?php echo __('Edit Teach Me'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('account_id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TeachMe.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TeachMe.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Teach Mes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('controller' => 'me_toos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Me Too'), array('controller' => 'me_toos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('controller' => 'seminars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar'), array('controller' => 'seminars', 'action' => 'add')); ?> </li>
	</ul>
</div>
