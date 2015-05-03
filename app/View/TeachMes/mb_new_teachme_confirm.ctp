<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		), array('inline' => false));
	$this->Html->css(array(
		'mb_teach_mes',
		), null, array('inline' => false));
?>


<h2 class="pageH"><?php echo $this->Html->image(MB_IMG_PATH . 'needscreateconfirm_h.png', array("alt" => "教えて欲しいこと登録確認")); ?></h2>

<article>
	<h3 class="needsH"><?php echo h($title); ?></h3>
	<hr>
	<p class="needsD"><?php echo h($content); ?></p>
</article>

<div class="cf btnArea">
	<?php echo $this->Html->image(MB_IMG_PATH . 'backentry_btn.png', array("alt" => "入力へ戻る", "class" => "needsHalfBtn", 'url' => array('action' => 'index'))); ?>
	<?php echo $this->Html->image(MB_IMG_PATH . 'needscreate_btn.png', array("alt" => "この内容で登録", "class" => "needsHalfBtn", 'url' => array('action' => 'register'))); ?>
</div>

