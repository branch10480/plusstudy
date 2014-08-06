<div class="meToos index">
	<h2><?php echo __('Me Toos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('teach_me_id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('resolved'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($meToos as $meToo): ?>
	<tr>
		<td><?php echo h($meToo['MeToo']['teach_me_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($meToo['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $meToo['Account']['id'])); ?>
		</td>
		<td><?php echo h($meToo['MeToo']['resolved']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $meToo['MeToo']['teach_me_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meToo['MeToo']['teach_me_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $meToo['MeToo']['teach_me_id']), array(), __('Are you sure you want to delete # %s?', $meToo['MeToo']['teach_me_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Me Too'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
