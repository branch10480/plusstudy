<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		'feedback',
		), array('inline' => false));
	$this->Html->css(array(
		'control1',
		'seminars',
		), null, array('inline' => false));
?>

<div class="header_img">
	<h2><img src="<?php echo IMG_PATH; ?>feedback_h.png" alt="勉強会フィードバック" width="306" height="109"></h2>
</div>

<?php echo $this->Form->hidden('seminar_id', array('value' => $seminar['Seminar']['id'], 'id' => 'seminar_id')); ?>
<?php echo $this->Form->hidden('teach_me_id', array('value' => $seminar['TeachMe']['id'], 'id' => 'teach_me_id')); ?>

<div class="feedbackWrapper">
	<div class="inner">
		<div id="feedbackTitle">
			<h3><?php echo $seminar['Seminar']['name'] ?></h3>
		</div>
		<div id="feedbackGood">
			<div class="feedbackTextWrapper">
				<h4>参加した勉強会は良かったですか？</h4>
			</div>
			<!--<p id='gjcnt'><?php //echo $seminar['Seminar']['gj']; ?></p>-->
			<div id="goodBtn">
				<a href="#" id='gj'><?php echo $this->Html->image('good_btn.png', array('width' => '138', 'height' => '40')) ?></a>
			</div>
		</div>

		<div id="feedbackSolution">
			<?php //他の勉強会によってニーズが解決している場合もあるので、
			      //対象のニーズが存在するかどうかのチェックも必要
			      if($seminar['Seminar']['teach_me_id'] !== null && isset($seminar['TeachMe']['id'])): ?>
			<div class="feedbackTextWrapper">
				<h4><?php echo 'あなたの教えて欲しいこと「' . $seminar['TeachMe']['title'] . '」は解決しましたか？'; ?></h4>
			</div>
			<div id="solutionBtn">
				<a href="#" id='solution'><?php echo $this->Html->image('solution_btn.png', array('width' => '138', 'height' => '40')) ?></a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<div id="feedbackEnd">
	<?php echo $this->Form->create('Feedback'); ?>
	<?php echo $this->Form->end(__('')); ?>
	<a href="#" class="btnSubmit"><img src="<?php echo IMG_PATH . 'feedbackend_btn.png'; ?>" width="222" height="54" alt="フィードバック終了"></a>
</div>
