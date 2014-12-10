<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'questions',
		), array('inline' => false));
	$this->Html->css(array(
		'control3',
		'seminars',
		), null, array('inline' => false));
?>

<div class="header_img">
	<h2><img src="<?php echo IMG_PATH; ?>questions_h.png" alt="セミナーに対する質問" width="306" height="109"></h2>
	<div id="backSeminarDetails">
		<?php echo $this->Html->image(IMG_PATH . 'seminarback_btn.png', array("alt" => "勉強会詳細へ戻る", 'url' => array('controller' => 'Seminars', 'action' => 'details', '?' => array('id' => $question['Seminar']['id'])))); ?>
	</div>
</div>

<div class="whiteWrapper">
	<div id="questionTitle">
		<h3><span><?php echo $question['Seminar']['name'] ?></span></h3>

		<?php echo $this->Form->hidden('creator_id', array('value' => $question['Seminar']['account_id'], 'id' => 'creator_id')); ?>
		<?php echo $this->Form->hidden('comment_cnt', array('value' =>  count($comments) ,'id' => 'comment_cnt')); ?>

		<h4>Ｑ.<?php echo $question['Question']['title']; ?></h4>
		<p class="commenterName" style="display: inline;"><?php echo $question['Account']['last_name'] . $question['Account']['first_name']; ?></p>

		<p class="timeStamp" style="display: inline;"><?php echo $question['Question']['timestamp']; ?></p>
		<p class="questionContent" style="display: block;"><?php echo $question['Question']['content']; ?></p>
	</div><!-- #questionTitle -->

	<div id="comment">
		<?php foreach($comments as $comment): ?>

			<?php if($question['Seminar']['account_id'] === $comment['Comment']['account_id']): ?>
				<p class="masterName" style="display: inline;"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>
			<?php else: ?>
				<p class="commenterName" style="display: inline;"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>
			<?php endif; ?>

			<p class="timeStamp" style="display: inline;"><?php echo $comment['Comment']['timestamp']; ?></p>
			<p class="questionContent" style="display: block;"><?php echo $comment['Comment']['content']; ?></p>

		<?php endforeach; ?>
	</div><!-- #comment -->
</div><!-- .whiteWrapper -->

<div id="commentForm">
	<?php echo $this->Form->create('Comment'); ?>
		<?php echo $this->Form->hidden('question_id', array('value' => $question['Question']['id'], 'id' => 'question_id')); ?>
		<?php echo $this->Form->textarea('content', array('id' => 'content', 'placeholder' => 'コメント書き込み欄*')); ?>
		<div id="commentBtn">
			<a href="#" id='add'><?php echo $this->Html->image('comment_btn.png', array('width' => '222', 'height' => '54')) ?></a>
		</div>

	<?php echo $this->Form->end(); ?>
</div>