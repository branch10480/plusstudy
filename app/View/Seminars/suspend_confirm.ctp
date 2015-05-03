<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		), array('inline' => false));
	$this->Html->css(array(
		// 'control3',
		'seminars',
		), null, array('inline' => false));
?>

<h2 id="sdelh" class=" plot header_img">
	<img src="<?php echo IMG_PATH . 'seminardeleteparticipation_h.png'; ?>" width="306" height="109" alt="">
</h2>

<div id="sdel">
	<div class="plot">
		<div class="teach_mes_contents">
			<p>下記の勉強会を中止して、参加者にメッセージを送信します。よろしいですか？</p>
			<h3><?php echo $data['Seminar']['name'] . ' について'; ?></h3>
			<p><?php echo $data['Seminar']['suspend_dsc']; ?></p>

		<?php echo $this->Html->link('戻る', array('action' => 'suspendInput')); ?>
		<?php echo $this->Html->link($this->Html->image('needscreateconfirm_btn.png', array('width' => 138, 'height' => 54)), array('action' => 'suspend'), array('escape' => false)); ?>
	</div>
</div>



</div>



