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
	<div class="confirm_contents">
		<h2><?php echo htmlspecialchars($title); ?></h2>
		<p><?php echo htmlspecialchars($content); ?></p>
	</div>

	<div class="confirm_links">
		<a href=<?php echo ROOT_URL . "TeachMes"; ?>><img src="<?php echo IMG_PATH . 'cancel_btn.png'; ?>" width="138" height="54" alt="" class="confirm_cancel_img"></a>
		<a href=<?php echo ROOT_URL . "TeachMes/register";?>><img src="<?php echo IMG_PATH . 'needscreate_btn.png'; ?>" width="168" height="54" alt=""></a>
	</div>

</div>


