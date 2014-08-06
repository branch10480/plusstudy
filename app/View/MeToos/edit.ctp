<div class="meToos form">
<?php echo $this->Form->create('MeToo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Me Too'); ?></legend>
	<?php
		echo $this->Form->input('teach_me_id');
		echo $this->Form->input('account_id');
		echo $this->Form->input('resolved');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MeToo.teach_me_id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('MeToo.teach_me_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
