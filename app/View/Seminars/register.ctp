<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		// 'richeditor',
		// 'BeatPicker',
		), array('inline' => false));
	$this->Html->css(array(
		'seminars',
		), null, array('inline' => false));
?>

<h2><img src="<?php echo IMG_PATH; ?>seminarcreatecomplete_h.png" alt="勉強会作成完了" width="306" height="109"><span class="hidden">勉強会作成完了</span></h2>
<section id="newSmnRegister">
	<div class="wrapper">
		<p>勉強会が作成されました。</p>
	</div>
</section>
<div class="newSmnRegisterBtnArea cf">
	<?php echo $this->Html->link($this->HTML->image('backtop_btn.png', array('width' => '138', 'height' => '54')), array('controller' => 'Accounts', 'action' => 'index'), array('escape' => false)); ?>
	<?php echo $this->Html->link($this->HTML->image('hrefseminar_btn.png', array('width' => '306', 'height' => '54')), array('controler' => 'Accounts', 'action' => 'register'), array('escape' => false)); ?>
</div>