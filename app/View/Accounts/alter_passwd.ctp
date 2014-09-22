<?php echo $this->Form->create('Account'); ?>
<dl>
	<dt>古いパスワード</dt>
	<dd><input name="oldPasswd" type="password" value="<?php echo $oldPasswd; ?>"></dd>
	<dt>新しいパスワード</dt>
	<dd><input name="newPasswd" type="password"></dd>
	<dt>新しいパスワード（確認）</dt>
	<dd><input name="confirm" type="password"><br /><?php echo $msg; ?></dd></dl>
<?php echo $this->Form->end('パスワードの変更'); ?>