<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		), array('inline' => false));
	$this->Html->css(array(
		// 'control3',
		'teach_mes',
		), null, array('inline' => false));
?>

<div class=" plot header_img">
	<img src="<?php echo IMG_PATH . 'needscreate_h.png'; ?>" width="306" height="109" alt="">
</div>

<div class="plot">
	<div class="teach_mes_contents">
		<p>以下の内容で参加者にはメッセージを送ります。<br>よろしいですか？</p>
		<h3><?php echo $data['Seminar']['name'] . ' について'; ?></h3>
		<p><?php echo $data['Seminar']['suspend_dsc']; ?></p>

	<?php echo $this->Html->link('戻る', array('action' => 'suspendInput')); ?>
	<?php echo $this->Html->link($this->Html->image('needscreateconfirm_btn.png', array('width' => 138, 'height' => 54)), array('action' => 'suspend'), array('escape' => false)); ?>
	</div>



</div>



