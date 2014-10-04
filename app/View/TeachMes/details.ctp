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
	});
</script>


<section>
	<h2><img src="<?php echo IMG_PATH; ?>needsdetails_h.png" alt="教えて欲しいこと詳細" width="306" height="109"><span class="hidden">教えて欲しいこと詳細</span></h2>
	<section>
		<h3><?php echo $teachme['TeachMe']['title'] ?></h3>
		<p><?php echo $teachme['TeachMe']['content'] ?></p>
		<p class="metooNum"><?php echo count($teachme['MeToo']) . '人 の方がこの内容を教えて欲しいと言っています。' ?></p>
	</section>
	<div class="btnArea cf">
		<a href="<?php echo ROOT_URL . 'Seminars/index/'; ?>"><img src="<?php echo IMG_PATH; ?>needscreateseminar_btn.png" alt="この内容に合った勉強会を作成する" width="306" height="59"></a>
		<a href="#" class="btnSubmit"><img src="<?php echo IMG_PATH; ?>needsdetailsmetoo_btn.png" alt="私も教えて欲しい！" width="222" height="59"></a>
	</div>

	<?php echo $this->Form->create('MeToo', array('class' => 'hidden')); ?>

		<?php if($alreadyMetoo === false): ?>
			<?php echo $this->Form->submit('教えて欲しい！', array('name' => 'metoo', 'id' => "clickBtn")); ?>
			<?php else : ?>
			<?php echo $this->Form->submit('教えて欲しい！を取り消す', array(
				'name' => 'cancel', 'id' => "clickBtn")); ?>
		<?php endif; ?>
	<?php echo $this->Form->end(); ?>
</section>