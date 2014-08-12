<div>
<h2><?php echo __('マイページ'); ?></h2>
	<hr>
	<p><b>プロフィール画像</b></p>
	<p><?php echo $account['Account']['img_ext']; ?></p>
	<hr>

	<p><b>名前</b></p>
	<p><?php echo $account['Account']['first_ruby'] . ' ' .
				  $account['Account']['last_ruby']; ?></p>
	<p><?php echo $account['Account']['first_name'] . ' ' .
				  $account['Account']['last_name']; ?></p>
	<hr>

	<p><b>自己紹介</b></p>
	<p><?php echo $account['Account']['description']; ?></p>
	<hr>

	<p><b>コース</b></p>
	<p><?php echo $account['Account']['course'] . '年制課程'; ?></p>
	<hr>

	<p><b>学年</b></p>
	<p><?php echo $account['Account']['grade']; ?></p>
	<hr>

	<p><b>学科</b></p>
	<p><?php echo $account['Account']['subject']; ?></p>
	<hr>

	<p><b>資格</b></p>
	<p><?php echo h($account['Account']['licenses']); ?></p>
	<hr>

	<p><b>スキル</b></p>
	<p><?php echo h($account['Account']['skill']); ?></p>	
	<hr>

	<p><b>Facebook</b></p>
	<p><?php echo h($account['Account']['facebook']); ?></p>
	<hr>

	<p><b>twitter</b></p>
	<p><?php echo h($account['Account']['twitter']); ?></p>
	<hr>

	<p><b>公開メールアドレス</b></p>
	<p><?php echo h($account['Account']['pub_mailaddress']); ?></p>
	<hr>
</div>

<!-- 以下は元々の記述
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account'), array('action' => 'delete', $account['Account']['id']), array(), __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($account['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Timestamp'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['question_id']; ?></td>
			<td><?php echo $comment['content']; ?></td>
			<td><?php echo $comment['account_id']; ?></td>
			<td><?php echo $comment['timestamp']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Me Toos'); ?></h3>
	<?php if (!empty($account['MeToo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Teach Me Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Resolved'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['MeToo'] as $meToo): ?>
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
	<h3><?php echo __('Related Participants'); ?></h3>
	<?php if (!empty($account['Participant'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Seminar Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['Participant'] as $participant): ?>
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
	<?php if (!empty($account['Question'])): ?>
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
	<?php foreach ($account['Question'] as $question): ?>
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
<div class="related">
	<h3><?php echo __('Related Seminar Images'); ?></h3>
	<?php if (!empty($account['SeminarImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Ext'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['SeminarImage'] as $seminarImage): ?>
		<tr>
			<td><?php echo $seminarImage['id']; ?></td>
			<td><?php echo $seminarImage['account_id']; ?></td>
			<td><?php echo $seminarImage['description']; ?></td>
			<td><?php echo $seminarImage['ext']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seminar_images', 'action' => 'view', $seminarImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seminar_images', 'action' => 'edit', $seminarImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seminar_images', 'action' => 'delete', $seminarImage['id']), array(), __('Are you sure you want to delete # %s?', $seminarImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Seminar Image'), array('controller' => 'seminar_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Seminars'); ?></h3>
	<?php if (!empty($account['Seminar'])): ?>
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
	<?php foreach ($account['Seminar'] as $seminar): ?>
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
<div class="related">
	<h3><?php echo __('Related Teach Mes'); ?></h3>
	<?php if (!empty($account['TeachMe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($account['TeachMe'] as $teachMe): ?>
		<tr>
			<td><?php echo $teachMe['id']; ?></td>
			<td><?php echo $teachMe['account_id']; ?></td>
			<td><?php echo $teachMe['title']; ?></td>
			<td><?php echo $teachMe['content']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teach_mes', 'action' => 'view', $teachMe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teach_mes', 'action' => 'edit', $teachMe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teach_mes', 'action' => 'delete', $teachMe['id']), array(), __('Are you sure you want to delete # %s?', $teachMe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Teach Me'), array('controller' => 'teach_mes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

-->
