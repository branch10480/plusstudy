<?php
	// このページ限定のCSS,JS
	// $this->Html->script(array(
	// 	'AnchorSubmit',
	// 	), array('inline' => false));
	$this->Html->css(array(
		'teach_mes',
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
	<img src="<?php echo IMG_PATH; ?>needsdetails_h.png" alt="教えて欲しいこと詳細" width="306" height="109">
</div>
<div class="plot">
	<div class="detail_contents_top">
		<h3><?php echo htmlspecialchars($teachme['TeachMe']['title']); ?></h3>
		<p><?php echo nl2br(htmlspecialchars($teachme['TeachMe']['content'])); ?></p>
	</div>
	<div class="detail_contents_bottom cf">
		<div class="metoo_num">
			<p>教えて欲しい人数
				<u id="num_hover">
				<span><?php echo count($metoos);?>
					<span class="metoo_name">
						<?php foreach($metoos as $metoo): ?>
							<span id="name"><?php echo htmlspecialchars($metoo['Account']['last_name']) . htmlspecialchars($metoo['Account']['first_name']); ?></span>
						<?php endforeach; ?>
					</span>
				</span> 人
				</u>
			</p>
		</div>
		<div class="metoo_btn">
			<a href="#" class="btnSubmit"><img src="<?php echo IMG_PATH; ?>teachme.png" alt="私も教えて欲しい！" width="143.5" height="18"></a>
		</div>
	</div>
	<div class="detail_links">
		<a href="<?php echo ROOT_URL ; ?>"><img src="<?php echo IMG_PATH . 'backtop_btn.png'; ?>" width="138" height="54" alt="トップに戻る"></a>
		<a href="<?php echo ROOT_URL . 'Seminars?needs=' . $teachme['TeachMe']['id']; ?>"><img src="<?php echo IMG_PATH; ?>needscreateseminar_btn.png" alt="この内容に合った勉強会を作成する" width="306" height="54"></a>
	</div>
</div>

	<?php echo $this->Form->create('MeToo', array('class' => 'hidden')); ?>

		<?php if($alreadyMetoo === false): ?>
			<?php echo $this->Form->submit('教えて欲しい！', array('name' => 'metoo', 'id' => "clickBtn")); ?>
			<?php else : ?>
			<?php echo $this->Form->submit('教えて欲しい！を取り消す', array('name' => 'cancel', 'id' => "clickBtn")); ?>
		<?php endif; ?>
	<?php echo $this->Form->end(); ?>

