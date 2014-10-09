<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		), array('inline' => false));
	$this->Html->css(array(
		'mb_teach_mes',
		), null, array('inline' => false));
?>

<h2 class="pageH"><?php echo $this->Html->image(MB_IMG_PATH . 'needscreatecomplete_h.png', array("alt" => "教えて欲しいこと登録完了")); ?></h2>

<article id="register">
	<h3 class="register_h">あなたの教えて欲しいことが<br>登録されました</h3>
</article>

<div class="doCenter">
	<?php echo $this->Html->image(MB_IMG_PATH . 'hrefneedsdetails_btn.png', array("alt" => "登録した教えて欲しいこと詳細へ", "class" => "hrefneedsdetailsBtn", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?>
	<?php echo $this->Html->image(MB_IMG_PATH . 'backtop_btn.png', array("alt" => "トップへ戻る", "class" => "backtopBtn", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?>
</div>