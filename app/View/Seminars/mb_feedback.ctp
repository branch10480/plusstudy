<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		'feedback',
		), array('inline' => false));
	$this->Html->css(array(
		'control1',
		'mb_seminars',
		), null, array('inline' => false));
?>

<div class="header_img">
	<h2><img src="<?php echo MB_IMG_PATH; ?>feedback_h.png" alt="勉強会フィードバック" width="153" height="55"></h2>
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
				<a href="#" id='gj'><?php echo $this->Html->image('mb_img/good_btn.png', array('width' => '103', 'height' => '30')) ?></a>
			</div>
		</div>

		<div id="feedbackSolution">
			<?php //他の勉強会によってニーズが解決している場合もあるので、
			      //対象のニーズが存在するかどうかのチェックも必要
			      //if($seminar['Seminar']['teach_me_id'] !== NULL): ?>
			<div class="feedbackTextWrapper">
				<h4><?php echo 'あなたの教えて欲しいこと「' . $seminar['TeachMe']['title'] . '」は解決しましたか？'; ?></h4>
			</div>
			<div id="solutionBtn">
				<a href="#" id='solution'><?php echo $this->Html->image('mb_img/solution_btn.png', array('width' => '103', 'height' => '30')) ?></a>
			</div>
		</div>
	</div>
</div>

<div id="feedbackEnd">
	<?php echo $this->Form->create('Feedback'); ?>
	<?php echo $this->Form->end(__('')); ?>
	<a href="#" class="btnSubmit"><img src="<?php echo MB_IMG_PATH . 'feedbackend_btn.png'; ?>" width="299" height="46" alt="フィードバック終了"></a>
</div>