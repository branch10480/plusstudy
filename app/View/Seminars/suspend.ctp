<?php
	// このページ限定のCSS,JS
	// $this->Html->script(array(
	// 	'imgopt',
	// 	), array('inline' => false));
	$this->Html->css(array(
		'seminars',
		), null, array('inline' => false));
?>

<script>
	$(window).load(function () {
		ImgOpt.setImgId('.optim');
		ImgOpt.optimize();
	});
</script>

<section>
	<h2>勉強会の中止処理が完了しました。</h2>
	<p>次回からはなるべく中止は避けるよう、お願いいたします。</p>
</section>

<div class="btnArea cf" id="newSmnConfirmbtnArea">
	<?php echo $this->Html->link($this->HTML->image('backtop_btn.png', array('width' => '138', 'height' => '54')), array('controller' => 'Accounts', 'action' => 'index'), array('escape' => false)); ?>
</div>