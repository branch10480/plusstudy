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

<div class="comment">
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
	<?php echo $this->Form->hidden('question_id', array('value' => $question['Question']['id'], 'id' => 'question_id')); ?>

	<?php echo $this->Form->textarea('content', array('id' => 'content')); ?>
	<p class="errMsg"><?php echo $eContent ?></p>
	<?php echo $this->Form->button('コメントする', array('type' => 'button', 'id' => 'add')); ?>
</div>
<?php echo $this->Form->end(); ?>
<hr>

<p><?php echo $this->Html->link('勉強会の詳細へ戻る', array(
	'controller' => 'Seminars' ,
 	'action' => 'details',
 	'?' => array('id' => $question['Seminar']['id'])
 	)); ?></p>
<br>

<script>
$(function() {
	$('button#add').click(function(e) {
		$.post('/plusstudy/Comments/add', {
				content: $('textarea#content').val(),
				question_id: $('input#question_id').val()
			}, function(res) {
				alert("テスト");
				//var p = $('<p>').text(res.comment.content);
				//$('div.comment').append(p);
				//$('textarea#content').empty();
		}, "json");
	});
});
</script>