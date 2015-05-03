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

<h2 id="sdelh" class=" plot header_img">
	<img src="<?php echo IMG_PATH . 'seminardeletecomplete_h.png'; ?>" width="306" height="109" alt="">
</h2>

<div id="sdel">
		<span id="sdelCAna">勉強会を中止しました。</span>
		<p id="sdelCNote">次回からはなるべく中止は避けるよう、お願いいたします。</p>
</div>

<div class="plot" id="susendBacktopBtn">
	<?php echo $this->Html->link($this->HTML->image('backtop_btn.png', array('width' => '138', 'height' => '54')), array('controller' => 'Accounts', 'action' => 'index'), array('escape' => false)); ?>
</div>