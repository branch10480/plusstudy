<div>
	<p><b>勉強会タイトル</b></p>
	<p><?php echo $seminar['Seminar']['name'] ?></p>

	<p><b>作成者</b></p>
	<p><?php echo $seminar['Account']['last_name'] . $seminar['Account']['first_name'] ?></p>

	<p><b>開催場所</b></p>
	<p><?php echo $seminar['Seminar']['place'] ?></p>

	<p><b>参加人数</b></p>
	<p><?php echo count($seminar['Participant']) . '/' . $seminar['Seminar']['upper_limit'];?></p>

	<p><b>開催日付</b></p>
	<p><?php echo $seminar['Seminar']['start'] . '〜' . $seminar['Seminar']['end']; ?></p>

	<p><b>予約締切日時</b></p>
	<p><?php echo $seminar['Seminar']['reservation_limit'] ?></p>

	<p><b>詳細</b></p>
	<p><?php echo $seminar['Seminar']['description'] ?></p>
</div>

<br>

<div>
	<p><b>勉強会に対する質問</b></p>
	<?php foreach($seminar['Question'] as $question): ?>
		<p><?php echo $this->Html->link($question['title'], array(
			'controller' => 'Questions' ,
		 	'action' => 'index',
		 	'?' => array('id' => $question['id'])
		 	)); ?></p>
	<?php endforeach; ?>
</div>


<br>
<?php echo $this->Html->link(__('戻る'), array('controller' => 'Accounts', 'action' => 'index')); ?>
<?php echo $this->Html->link(__('参加する'), array('action' => 'join')); ?>
<hr>


<?php echo $this->Form->create('Question'); ?>
<div>
	<p><b>質問投稿フォーム</b></p>
	<p>質問タイトル</p>
	<p><?php echo $this->Form->text('title'); ?></p>
	<p>内容</p>
	<p><?php echo $this->Form->textarea('content'); ?></p>
</div>
<?php echo $this->Form->end(); ?>