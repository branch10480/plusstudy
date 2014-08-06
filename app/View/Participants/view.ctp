<div class="participants view">
<h2><?php echo __('Participant'); ?></h2>
	<dl>
		<dt><?php echo __('Seminar Id'); ?></dt>
		<dd>
			<?php echo h($participant['Participant']['seminar_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($participant['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $participant['Account']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Participant'), array('action' => 'edit', $participant['Participant']['seminar_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Participant'), array('action' => 'delete', $participant['Participant']['seminar_id']), array(), __('Are you sure you want to delete # %s?', $participant['Participant']['seminar_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Participants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participant'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
