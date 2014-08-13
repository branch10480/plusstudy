<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		// 'richeditor',
		// 'BeatPicker',
		), array('inline' => false));
	$this->Html->css(array(
		'BeatPicker',
		), null, array('inline' => false));
?>


<p>登録完了！</p>


<?php echo $this->Html->link(__('登録画面へ'), array('action' => 'index')); ?>