<div class="seminars index">
	<h2><?php echo __('Seminars'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('reservation_limit'); ?></th>
			<th><?php echo $this->Paginator->sort('place'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('teach_me_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gj'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('upper_limit'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($seminars as $seminar): ?>
	<tr>
		<td><?php echo h($seminar['Seminar']['id']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['name']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['reservation_limit']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['place']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($seminar['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $seminar['Account']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($seminar['TeachMe']['title'], array('controller' => 'teach_mes', 'action' => 'view', $seminar['TeachMe']['id'])); ?>
		</td>
		<td><?php echo h($seminar['Seminar']['gj']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['start']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['end']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['description']); ?>&nbsp;</td>
		<td><?php echo h($seminar['Seminar']['upper_limit']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $seminar['Seminar']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $seminar['Seminar']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $seminar['Seminar']['id']), array(), __('Are you sure you want to delete # %s?', $seminar['Seminar']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Seminar'), array('action' => 'add')); ?></li>
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
