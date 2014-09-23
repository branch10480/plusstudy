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


<p>更新完了！</p>


<?php echo $this->Html->link(__('勉強会詳細へ'), array('action' => 'details', '?' => array('id' => $smnId))); ?>