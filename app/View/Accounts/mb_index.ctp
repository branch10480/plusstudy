<div id="content" class="plot">
	<?php echo $this->Form->create('Account'); ?>

		<img class="logo" src="<?php echo IMG_PATH . 'mb_img/login_logo.png'; ?>" alt="plusStudy">
		<!-- <fieldset> -->
		<?php echo $this->Form->mailaddress('mailaddress', array('class' => 'mailTextbox','placeholder' =>'メールアドレス')); ?>
		<?php echo $this->Form->password('passwd', array('class' => 'passTextbox','placeholder' =>'パスワード')); ?>
		<p class="errMsg"><?php echo $msg ?></p>
		<!-- </fieldset> -->

		<?php echo $this->Form->button('', array('type' => 'submit', 'class' => 'loginBtn')); ?>
	<?php echo $this->Form->end(); ?>

	<a href="#" id="noLogin">ログインできない方はこちら</a>
</div>

