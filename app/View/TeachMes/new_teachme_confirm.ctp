<?php
	// このページ限定のCSS,JS
	// $this->Html->script(array(
	// 	), array('inline' => false));
	$this->Html->css(array(
		'teach_mes',
		), null, array('inline' => false));
?>


<div class=" plot header_img">
	<img src="<?php echo IMG_PATH . 'needscreateconfirm_h.png'; ?>" width="306" height="109" alt="">
</div>

<div class="plot">
	<div class="teach_mes_contents confirm_contents">
		<h2><?php echo $title ?></h2>
		<p><?php echo $content ?></p>
	</div>

	<div class="teach_mes_contents confirm_links">
		<a href="/plusstudy/TeachMes"><img src="<?php echo IMG_PATH . 'cancel_btn.png'; ?>" width="138" height="54" alt="" class="confirm_cancel_img"></a>
		<a href="/plusstudy/TeachMes/register"><img src="<?php echo IMG_PATH . 'needscreate_btn.png'; ?>" width="168" height="54" alt=""></a>
	</div>	
	
</div>


