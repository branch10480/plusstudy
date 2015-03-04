<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		), array('inline' => false));
	$this->Html->css(array(
		'contorol3',
		'teach_mes',
		), null, array('inline' => false));
?>

<div class=" plot header_img">
	<img src="<?php echo IMG_PATH . 'needscreate_h.png'; ?>" width="306" height="109" alt="">
</div>

<div class="plot">
	<div class="teach_mes_contents">
		<?php echo $this->Form->create('TeachMe'); ?>

		<?php echo $this->Form->text('title', array('type' => 'text', 'class' => 'index_title', 'placeholder' => '教えて欲しいこと*')); ?>
		<p class="errMsg index_err"><?php echo $eTitle; ?></p>

		<?php echo $this->Form->textarea('content', array('type' => 'text', 'class' => 'index_textarea', 'placeholder' => '詳しい内容*')); ?>
		<p class="errMsg index_err"><?php echo $eContent; ?></p>
		<?php echo $this->Form->end(__('')); ?>

		<a href="#" class="btnSubmit"><img src="<?php echo IMG_PATH . 'needscreateconfirm_btn.png'; ?>" width="138" height="54" alt="" class="index_submit_img"></a>
	</div>



</div>



