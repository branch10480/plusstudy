<div class="seminars view">
<h2><?php echo __('Seminar'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservation Limit'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['reservation_limit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seminar['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $seminar['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teach Me'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seminar['TeachMe']['title'], array('controller' => 'teach_mes', 'action' => 'view', $seminar['TeachMe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gj'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['gj']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upper Limit'); ?></dt>
		<dd>
			<?php echo h($seminar['Seminar']['upper_limit']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seminar'), array('action' => 'edit', $seminar['Seminar']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seminar'), array('action' => 'delete', $seminar['Seminar']['id']), array(), __('Are you sure you want to delete # %s?', $seminar['Seminar']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Participants'); ?></h3>
	<?php if (!empty($seminar['Participant'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Seminar Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seminar['Participant'] as $participant): ?>
		<tr>
			<td><?php echo $participant['seminar_id']; ?></td>
			<td><?php echo $participant['account_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'participants', 'action' => 'view', $participant['seminar_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'participants', 'action' => 'edit', $participant['seminar_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'participants', 'action' => 'delete', $participant['seminar_id']), array(), __('Are you sure you want to delete # %s?', $participant['seminar_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Participant'), array('controller' => 'participants', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($seminar['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Seminar Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Timestamp'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seminar['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['seminar_id']; ?></td>
			<td><?php echo $question['title']; ?></td>
			<td><?php echo $question['content']; ?></td>
			<td><?php echo $question['timestamp']; ?></td>
			<td><?php echo $question['account_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), array(), __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
