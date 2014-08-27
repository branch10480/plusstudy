<div>

<?php echo $this->Form->create('TeachMe'); ?>

	<fieldset>
	<legend><?php echo __('ニーズ登録'); ?></legend>

	<p>ニーズタイトル</p>
	<p><?php echo $this->Form->text('title'); ?></p>
	<p class="errMsg"><?php echo $eTitle; ?></p>
	
	<p>内容</p>
	<p><?php echo $this->Form->textarea('content'); ?></p>	
	<p class="errMsg"><?php echo $eContent; ?></p>
	
	</fieldset>

<?php echo $this->Form->end(__('確認画面へ')); ?>

</div>
