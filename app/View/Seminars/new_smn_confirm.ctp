<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'richeditor',
		'BeatPicker',
		), array('inline' => false));
	$this->Html->css(array(
		'BeatPicker',
		), null, array('inline' => false));
?>

<?php echo $this->Html->link(__('戻る'), array('action' => 'index')); ?>
