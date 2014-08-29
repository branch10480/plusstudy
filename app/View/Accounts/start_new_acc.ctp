<h1>新規アカウント登録開始</h1>
<?php echo $this->Form->create('Accounts'); ?>
<dl>
	<dt>メールアドレス</dt>
	<dd><?php echo $this->Form->input('Accounts.mailaddress', array('type' => 'email')); ?></dd>
	<dd><?php echo $msg ?></dd>
</dl>
<?php echo $this->Form->end('メール送信'); ?>