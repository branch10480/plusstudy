<div class="participants index">
	<h2><?php echo __('Participants'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('seminar_id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($participants as $participant): ?>
	<tr>
		<td><?php echo h($participant['Participant']['seminar_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($participant['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $participant['Account']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $participant['Participant']['seminar_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $participant['Participant']['seminar_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $participant['Participant']['seminar_id']), array(), __('Are you sure you want to delete # %s?', $participant['Participant']['seminar_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Participant'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
