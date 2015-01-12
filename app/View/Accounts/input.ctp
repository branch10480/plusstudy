<div class="plot">
	<div class="container_title">
		<div class="title">
			<img class="new_acc_header" src="<?php echo IMG_PATH . 'accountregist_h.png'; ?>" alt="アカウント登録">	
		</div>
	</div>
	<div class="pankuzu cf">
		<ul class="pankuzu_ul">
			<li><img class="navi_1" src="<?php echo IMG_PATH . 'accountregiststep1.png'; ?>" alt="アドレス入力"></li>
			<li><img class="navi_2" src="<?php echo IMG_PATH . 'accountregiststep2.png'; ?>" alt="確認メール送信完了"></li>
			<li><img class="navi_3" src="<?php echo IMG_PATH . 'accountregiststep3_on.png'; ?>" alt="登録情報入力"></li>
			<li><img class="navi_4" src="<?php echo IMG_PATH . 'accountregiststep4.png'; ?>" alt="確認"></li>
			<li><img class="navi_5" src="<?php echo IMG_PATH . 'accountregiststep5.png'; ?>" alt="完了"></li>
		</ul>
	</div>

	<div class="container_body">
		<h1 class="mail_new_acc_title">※は必須項目になります。</h1>


			<?php echo $this->Form->create('Account'); ?>
			<dl class="entry_dl cf">
				<dt>登録用メールアドレス（非公開）</dt>
				<dd><?php echo $this->Form->text('mailaddress', array('readonly' => 'true')); ?></dd>
				<dt>氏名</dt>
				<dd>姓 <?php echo $this->Form->text('last_name'); ?> 名<?php echo $this->Form->text('first_name'); ?><br /><?php echo $msgName; ?></dd>
				<dt>氏名（カナ）</dt>
				<dd>セイ <?php echo $this->Form->text('last_ruby'); ?> メイ<?php echo $this->Form->text('first_ruby'); ?><br /><? echo $msgNameKana; ?></dd>
				<dt>コース</dt>
				<dd><?php echo $this->Form->select('course', array(
					'2' => '2年制課程',
					'4' => '4年制課程',
				), array('empty' => '--- 選択してください ---')); ?><br /><? echo $msgCourse; ?></dd>
				<dt>パスワード</dt>
				<dd><?php echo $this->Form->password('passwd'); ?></dd>
				<dd><input type="password" id="confirm" name="confirm" />←確認<br /><?php echo $msgPasswd; ?></dd>
				<dt>学年</dt>
				<dd><?php echo $this->Form->text('grade'); ?><br /><? echo $msgGrade; ?></dd>
				<dt>学科</dt>
				<dd><?php echo $this->Form->text('subject'); ?> 学科<br /><? echo $msgSubject; ?></dd>
				<dt>資格</dt>
				<dd><?php echo $this->Form->text('licenses'); ?></dd>
				<dt>スキル</dt>
				<dd><?php echo $this->Form->text('skill'); ?></dd>
				<dt>facebook</dt>
				<dd><?php echo $this->Form->text('facebook'); ?></dd>
				<dt>twitter</dt>
				<dd><?php echo $this->Form->text('twitter'); ?></dd>
				<dt>メールアドレス（公開用）</dt>
				<dd><?php echo $this->Form->text('pub_mailaddress'); ?></dd>
				<dt>自己PR（200字以内）</dt>
				<dd><?php echo $this->Form->textarea('description'); ?><br /><? echo $msgPR; ?></dd>
			</dl>
			<?php echo $this->Form->end('確認へ'); ?>

		<div class="longin_mail_btn">
			<a href="Acconts/index" ><img class="img_back_login" src="<?php echo IMG_PATH . 'backlogin_btn.png'; ?>" alt="ログイン画面に戻る"></a>
		</div>
	</div>
</div>





















