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
		<?php echo $this->Form->create('Seminar'); ?>
		<?php echo $this->Form->hidden('id'); ?>
		<?php echo $this->Form->text('name', array('class' => 'text', 'readonly' => 'readonly')) . 'の勉強会中止について'; ?>
		<?php echo $this->Form->textarea('suspend_dsc', array('type' => 'text', 'class' => 'index_textarea', 'placeholder' => '* 勉強会中止の理由をお書きください（参加者に送信されます。）')); ?>
		<p class="errMsg"><?php echo $msg; ?></p>
		<?php echo $this->Form->end(); ?>

	<?php echo $this->Html->link('戻る', array('action' => 'details', '?' => array('id' => $smnId))); ?>
		<a href="#" class="btnSubmit"><img src="<?php echo IMG_PATH . 'needscreateconfirm_btn.png'; ?>" width="138" height="54" alt="" class="index_submit_img"></a>
	</div>



</div>



