<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		), array('inline' => false));
	$this->Html->css(array(
		'mb_teach_mes',
		), null, array('inline' => false));
?>


<?php echo $this->Form->create('TeachMe'); ?>

	<h2 class="pageH"><?php echo $this->Html->image(MB_IMG_PATH . 'needscreate_h.png', array("alt" => "教えて欲しいこと登録")); ?></h2>

	<fieldset>
		<?php echo $this->Form->text('title', array('type' => 'text', 'class' => 'text', 'placeholder' => '教えて欲しいこと*')); ?>
		<p class="errMsg"><?php echo $eTitle; ?></p>

		<?php echo $this->Form->textarea('content', array('placeholder' => '詳しい内容*')); ?>
		<p class="errMsg"><?php echo $eContent; ?></p>
	</fieldset>

<?php echo $this->Form->end(); ?>

<div class="btnArea"><a href="#" class="btnSubmit" id="submitBtn"><img src="<?php echo MB_IMG_PATH; ?>needscreateconfirm_btn.png" alt="登録確認へ" class="confirmBtn" ></a></div>
<div class="doCenter">
	<?php echo $this->Html->image(MB_IMG_PATH . 'backtop_btn.png', array("alt" => "トップへ戻る", "class" => "backtopBtn", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?>
</div>

<script>
$(function(){
	$('.btnSubmit').click(function(event){
		event.preventDefault();
		$('form').submit();
	});
});
</script>