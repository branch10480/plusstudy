
<div>
<?php echo $this->Form->create('Account'); ?>

	<fieldset>
	<legend><?php echo __('Plus Study ログイン'); ?></legend>
	<p>メールアドレス</p>
	<p><?php echo $this->Form->mailaddress('mailaddress'); ?></p>
	<p>パスワード</p>
	<p><?php echo $this->Form->password('passwd'); ?></p>
	<p style="color: red;"><?php echo $msg ?></p>	
	</fieldset>


<?php echo $this->Form->end(__('ログイン')); ?>
</div>

<!-- 以下は元々の記述
<div class="accounts index">
	<h2><?php echo __('Accounts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('mailaddress'); ?></th>
			<th><?php echo $this->Paginator->sort('passwd'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_ruby'); ?></th>
			<th><?php echo $this->Paginator->sort('first_ruby'); ?></th>
			<th><?php echo $this->Paginator->sort('course'); ?></th>
			<th><?php echo $this->Paginator->sort('grade'); ?></th>
			<th><?php echo $this->Paginator->sort('subject'); ?></th>
			<th><?php echo $this->Paginator->sort('isteacher'); ?></th>
			<th><?php echo $this->Paginator->sort('img_ext'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('licenses'); ?></th>
			<th><?php echo $this->Paginator->sort('skill'); ?></th>
			<th><?php echo $this->Paginator->sort('last_login'); ?></th>
			<th><?php echo $this->Paginator->sort('facebook'); ?></th>
			<th><?php echo $this->Paginator->sort('twitter'); ?></th>
			<th><?php echo $this->Paginator->sort('pub_mailaddress'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($accounts as $account): ?>
	<tr>
		<td><?php echo h($account['Account']['id']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['mailaddress']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['passwd']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['last_ruby']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['first_ruby']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['course']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['grade']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['subject']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['isteacher']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['img_ext']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['description']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['licenses']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['skill']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['last_login']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['facebook']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['twitter']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['pub_mailaddress']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $account['Account']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $account['Account']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $account['Account']['id']), array(), __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?>
		</td>
	</tr>--
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
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('controller' => 'me_toos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Me Too'), array('controller' => 'me_toos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participants'), array('controller' => 'participants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participant'), array('controller' => 'participants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminar Images'), array('controller' => 'seminar_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar Image'), array('controller' => 'seminar_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('controller' => 'seminars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar'), array('controller' => 'seminars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teach Mes'), array('controller' => 'teach_mes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teach Me'), array('controller' => 'teach_mes', 'action' => 'add')); ?> </li>
	</ul>
</div>

-->