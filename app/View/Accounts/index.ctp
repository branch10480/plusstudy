
<div>
<?php echo $this->Form->create('Account'); ?>

	<fieldset>
	<legend><?php echo __('Plus Study ログイン'); ?></legend>
	<p>メールアドレス</p>
	<p><?php echo $this->Form->mailaddress('mailaddress'); ?></p>
	<p>パスワード</p>
	<p><?php echo $this->Form->password('passwd'); ?></p>
	<p class="errMsg"><?php echo $msg ?></p>	
	</fieldset>


<?php echo $this->Form->end(__('ログイン')); ?>
</div>