<?php
	// このページ限定のCSS,JS
	// $this->Html->script(array(
	// 	'AnchorSubmit',
	// 	), array('inline' => false));
	$this->Html->css(array(
		'mb_teach_mes',
		), null, array('inline' => false));
?>

<script>
	$(function () {
		$('.btnSubmit').click(function(event) {
			event.preventDefault();
			$('#clickBtn').click();
		});

		$('#num_hover').mouseover(function() {
        	$('.metoo_name').css('display', 'block');
     	})
		$('#num_hover').mouseout(function() {
        	$('.metoo_name').css('display', 'none');
     	})
	});
</script>

<div class="header_img">
	<img src="<?php echo MB_IMG_PATH; ?>needs_detail_h.png" alt="教えて欲しいこと詳細" width="153" height="55">
</div>
<div class="plot">
	<div class="detail_contents_top">
		<h3><?php echo htmlspecialchars($teachme['TeachMe']['title']); ?></h3>
		<p><?php echo nl2br(htmlspecialchars($teachme['TeachMe']['content'])); ?></p>
	</div>
	<div class="detail_contents_bottom cf">
		<div class="metoo_num">
			<p>教えて欲しい人数 <span><?php echo count($metoos);?></span> 人
			</p>
		</div>
		<div class="metoo_btn">
			<?php if($alreadyMetoo === false): ?>
				<a href="#" class="btnSubmit"><img src="<?php echo MB_IMG_PATH; ?>teachme.png" alt="私も教えて欲しい！" width="118" height="13"></a>
			<?php else: ?>
				<a href="#" class="btnSubmit"><img src="<?php echo MB_IMG_PATH; ?>teachmecancel.png" alt="教えて欲しいを取り消す" width="124.5" height="13"></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="doCenter">
	<?php echo $this->Html->image(MB_IMG_PATH . 'backtop_btn.png', array("alt" => "トップへ戻る", "class" => "backtopBtn", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?>
</div>

	<?php echo $this->Form->create('MeToo', array('class' => 'hidden')); ?>

		<?php if($alreadyMetoo === false): ?>
			<?php echo $this->Form->submit('教えて欲しい！', array('name' => 'metoo', 'id' => "clickBtn")); ?>
			<?php else : ?>
			<?php echo $this->Form->submit('教えて欲しい！を取り消す', array('name' => 'cancel', 'id' => "clickBtn")); ?>
		<?php endif; ?>
	<?php echo $this->Form->end(); ?>

