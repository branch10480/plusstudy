<div id="content" class="plot">
	<p>モバイル</p>
	<?php echo $this->Form->create('Account'); ?>

		<img class="logo" src="<?php echo IMG_PATH . 'login_logo.png'; ?>" alt="plusStudy">

		<fieldset>
			<p class="mail">メールアドレス</p>
			<?php echo $this->Form->mailaddress('mailaddress', array('class' => 'mailTextbox')); ?>
			<p class="pass">パスワード</p>
			<?php echo $this->Form->password('passwd', array('class' => 'passTextbox')); ?>
			<p class="errMsg"><?php echo $msg ?></p>
		</fieldset>

		<div class="cf">
			<?php echo $this->Form->button('', array('type' => 'submit', 'class' => 'loginBtn')); ?>
			<?php echo $this->Html->image(IMG_PATH . 'createaccount_btn.png', array('class' => 'createAccountBtn', 'alt' => '新規アカウント登録', 'url' => array('controller' => 'Accounts', 'action' => 'startNewAcc'))); ?>
		</div>
	<?php echo $this->Form->end(); ?>

	<a href="#" id="noLogin"><img class="ar" src="<?php echo IMG_PATH . 'ar.png'; ?>" alt="▶">ログインできない方はこちら</a>
</div>

