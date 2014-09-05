<div>
	<p><b>勉強会タイトル</b></p>
	<p><?php echo $question['Seminar']['name'] ?></p>
	<br>

	<p>Debug 投稿者の名前の色が変わる</p>
	<p>青：質問者、赤：勉強会作成者、緑：一般人</p>
	<br>

	<p><b><?php echo $question['Question']['title']; ?></p></b>
	<p style="color:blue"><?php echo $question['Account']['last_name'] . $question['Account']['first_name']; ?></p>
	<p><?php echo $question['Question']['timestamp']; ?></p>

	<p><?php echo $question['Question']['content']; ?></p>
	<hr>
</div>

<div>
	<?php foreach($comments as $comment): ?>
		<?php if($question['Question']['account_id'] === $comment['Comment']['account_id']): ?>
			<p style="color:blue"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>

		<?php elseif($question['Seminar']['account_id'] === $comment['Comment']['account_id']): ?>
			<p style="color:red"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>

		<?php else: ?>
			<p style="color:green"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>
		<?php endif; ?>

		<p><?php echo $comment['Comment']['timestamp']; ?></p>
		<p><?php echo $comment['Comment']['content']; ?></p>
	<?php endforeach; ?>
</div>
<br>

<?php echo $this->Form->create('Comment'); ?>
<div>
	<p><?php echo $this->Form->textarea('content'); ?></p>
	<p class="errMsg"><?php echo $eContent ?></p>
	<?php echo $this->Form->submit('コメントする', array(
		'name' => 'comment')); ?>
</div>
<?php echo $this->Form->end(); ?>
<hr>