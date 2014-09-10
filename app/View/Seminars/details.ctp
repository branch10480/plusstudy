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
	<?php if(count($seminar['Question']) === 0): ?>
		<p><?php echo 'この勉強会に対する質問はありません'; ?></p>
	<?php endif; ?>

	<?php foreach($seminar['Question'] as $question): ?>
		<p><?php echo $this->Html->link($question['title'], array(
			'controller' => 'Questions' ,
		 	'action' => 'index',
		 	'?' => array('id' => $question['id'])
		 	)); ?></p>
	<?php endforeach; ?>
</div>
<br>


<?php echo $this->Form->create('Button'); ?>
<div>
	<?php echo $this->Html->link(__('戻る'), array('controller' => 'Accounts', 'action' => 'index')); ?>

	<?php if($userType === 'NoJoin'): ?>
		<?php echo $this->Form->submit('この勉強会に参加する', array('name' => 'join')); ?>
	<?php elseif($userType === 'Manager'): ?>
		<?php echo $this->Form->submit('編集する', array('name' => 'edit')); ?>
	<?php elseif($userType === 'Join'): ?>
		<?php echo $this->Form->submit('参加を取り消す', array('name' => 'cancel')); ?>
	<?php endif; ?>
</div>
<?php echo $this->Form->end(); ?>
<hr>


<?php if($userType !== 'Manager'): ?>
	<?php echo $this->Form->create('Question'); ?>
	<div>
		<p><b>質問投稿フォーム</b></p>
		<p>質問タイトル</p>
		<p><?php echo $this->Form->text('title'); ?></p>
		<p class="errMsg"><?php echo $eTitle ?></p>
		<p>内容</p>
		<p><?php echo $this->Form->textarea('content'); ?></p>
		<p class="errMsg"><?php echo $eContent ?></p>
		<?php echo $this->Form->submit('質問を投稿する', array(
			'name' => 'question')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
	<hr>
<?php endif; ?>