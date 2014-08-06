<div class="teachMes view">
<h2><?php echo __('Teach Me'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($teachMe['TeachMe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teachMe['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $teachMe['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($teachMe['TeachMe']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($teachMe['TeachMe']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Teach Me'), array('action' => 'edit', $teachMe['TeachMe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Teach Me'), array('action' => 'delete', $teachMe['TeachMe']['id']), array(), __('Are you sure you want to delete # %s?', $teachMe['TeachMe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teach Mes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teach Me'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('controller' => 'me_toos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Me Too'), array('controller' => 'me_toos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('controller' => 'seminars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar'), array('controller' => 'seminars', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Me Toos'); ?></h3>
	<?php if (!empty($teachMe['MeToo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Teach Me Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Resolved'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($teachMe['MeToo'] as $meToo): ?>
		<tr>
			<td><?php echo $meToo['teach_me_id']; ?></td>
			<td><?php echo $meToo['account_id']; ?></td>
			<td><?php echo $meToo['resolved']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'me_toos', 'action' => 'view', $meToo['teach_me_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'me_toos', 'action' => 'edit', $meToo['teach_me_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'me_toos', 'action' => 'delete', $meToo['teach_me_id']), array(), __('Are you sure you want to delete # %s?', $meToo['teach_me_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Me Too'), array('controller' => 'me_toos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Seminars'); ?></h3>
	<?php if (!empty($teachMe['Seminar'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Reservation Limit'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Teach Me Id'); ?></th>
		<th><?php echo __('Gj'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Upper Limit'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($teachMe['Seminar'] as $seminar): ?>
		<tr>
			<td><?php echo $seminar['id']; ?></td>
			<td><?php echo $seminar['name']; ?></td>
			<td><?php echo $seminar['reservation_limit']; ?></td>
			<td><?php echo $seminar['place']; ?></td>
			<td><?php echo $seminar['account_id']; ?></td>
			<td><?php echo $seminar['teach_me_id']; ?></td>
			<td><?php echo $seminar['gj']; ?></td>
			<td><?php echo $seminar['start']; ?></td>
			<td><?php echo $seminar['end']; ?></td>
			<td><?php echo $seminar['description']; ?></td>
			<td><?php echo $seminar['upper_limit']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seminars', 'action' => 'view', $seminar['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seminars', 'action' => 'edit', $seminar['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seminars', 'action' => 'delete', $seminar['id']), array(), __('Are you sure you want to delete # %s?', $seminar['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Seminar'), array('controller' => 'seminars', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
