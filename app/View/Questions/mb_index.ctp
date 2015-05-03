<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'questions',
		), array('inline' => false));
	$this->Html->css(array(
		'mb_control3',
		'mb_seminars',
		), null, array('inline' => false));
?>

<div class="header_img">
	<h2><img src="<?php echo MB_IMG_PATH; ?>questions_h.png" alt="セミナーに対する質問" width="153" height="55"></h2>
</div>

<div class="questionWrapper">
	<div id="questionTitle">
		<h3><?php echo h($question['Seminar']['name']); ?></h3>

		<?php echo $this->Form->hidden('creator_id', array('value' => $question['Seminar']['account_id'], 'id' => 'creator_id')); ?>
		<?php echo $this->Form->hidden('comment_cnt', array('value' =>  count($comments) ,'id' => 'comment_cnt')); ?>

		<h4>Ｑ.<?php echo h($question['Question']['title']); ?></h4>
		<p class="commenterName" style="display: inline;"><?php echo h($question['Account']['last_name']) . h($question['Account']['first_name']); ?></p>

		<p class="timeStamp" style="display: inline;"><?php echo $question['Question']['timestamp']; ?></p>
		<p class="questionContent" style="display: block;"><?php echo h($question['Question']['content']); ?></p>
	</div><!-- #questionTitle -->

	<div id="comment">
		<?php foreach($comments as $comment): ?>

			<?php if($question['Seminar']['account_id'] === $comment['Comment']['account_id']): ?>
				<p class="masterName" style="display: inline;"><?php echo h($comment['Account']['last_name']) . h($comment['Account']['first_name']); ?></p>
			<?php else: ?>
				<p class="commenterName" style="display: inline;"><?php echo h($comment['Account']['last_name']) . h($comment['Account']['first_name']); ?></p>
			<?php endif; ?>

			<p class="timeStamp" style="display: inline;"><?php echo $comment['Comment']['timestamp']; ?></p>
			<p class="questionContent" style="display: block;"><?php echo h($comment['Comment']['content']); ?></p>

		<?php endforeach; ?>
	</div><!-- #comment -->
</div><!-- .whiteWrapper -->

<div id="commentForm">
	<?php echo $this->Form->create('Comment'); ?>
		<?php echo $this->Form->hidden('question_id', array('value' => $question['Question']['id'], 'id' => 'question_id')); ?>
		<?php echo $this->Form->textarea('content', array('id' => 'content', 'placeholder' => 'コメント書き込み欄*')); ?>
		<div id="commentBtn">
			<a href="#" id='add'><?php echo $this->Html->image('mb_img/comment_btn.png', array('width' => '299', 'height' => '46')) ?></a>
		</div>

	<?php echo $this->Form->end(); ?>
</div>