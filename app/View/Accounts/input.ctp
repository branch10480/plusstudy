<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'easyselectbox.min',
		), array('inline' => false));
	$this->Html->css(array(
		'control1'
		), null, array('inline' => false));
?>
<script>
	$(function(){
		$('.select').easySelectBox();
	});
</script>
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

	<div class="container_body2">
		<h1 class="mail_new_acc_title">※ は必須項目になります。</h1>


			<?php echo $this->Form->create('Account'); ?>
			<dl class="entry_dl cf">
				<dt>メールアドレス（非公開）</dt>
				<dd><?php echo $this->Form->text('mailaddress', array('readonly' => 'true', 'class' => 'ma')); ?></dd>
				<dt id="nameDt">氏名 ※</dt>
				<dd><span class="errorMsg"><?php echo $msgName; ?></span><div class="name cf"><div class="fl"><span class="lastName">(姓)</span><?php echo $this->Form->text('last_name', array( 'class' => 'text')); ?></div><div class="fl"><span class="firstName">(名)</span><?php echo $this->Form->text('first_name', array( 'class' => 'text')); ?></div><br /></div><span class="errorMsg"><? echo $msgNameKana; ?></span><div class="kana cf"><div class="fl"><span class="lastName">(セイ)</span><?php echo $this->Form->text('last_ruby', array( 'class' => 'text')); ?></div><div class="fl"><span class="firstName">(メイ)</span><?php echo $this->Form->text('first_ruby', array( 'class' => 'text')); ?><br /></div></div></dd>
				<dt>パスワード ※</dt>
				<dd><?php echo $this->Form->password('passwd', array( 'class' => 'text')); ?><span class="errorMsg2"><?php echo $msgPasswd; ?></span></dd>
				<dt>パスワード(確認) ※</dt>
				<dd><input type="password" id="confirm" class="text" name="confirm" /></dd>
				<dt>コース ※</dt>
				<dd><?php echo $this->Form->select('course', array(
					'2' => '2年制課程',
					'4' => '4年制課程',
				), array('empty' => '--- 選択してください ---', 'class' => 'select')); ?><span class="errorMsg2"><? echo $msgCourse; ?></span></dd>
				<dt>学年 ※</dt>
				<dd><?php echo $this->Form->select('grade', array(
					'1' => '1年',
					'2' => '2年',
					'3' => '3年',
					'4' => '4年',
				), array('empty' => '--- 選択してください ---', 'class' => 'select')); ?><span class="errorMsg2"><? echo $msgGrade; ?></span></dd>
				<dt>学科 ※</dt>
				<dd><?php echo $this->Form->select('subject', array(
					'1' => '高度情報処理学科',
					'2' => 'WEB開発学科',
					'3' => 'ゲーム企画学科',
					'4' => 'ゲーム制作学科',
					'5' => 'ゲームデザイン学科',
					'6' => 'CG映像アニメーション学科',
					'7' => 'CGグラフィックデザイン学科',
					'8' => 'ミュージック学科',
					'9' => '先端ロボット開発学科',
					'10' => 'カーデザイン学科',
					), array('empty' => '--- 選択してください ---', 'class' => 'select')); ?><span class="errorMsg2"><? echo $msgSubject; ?></span></dd>
				<dt>資格</dt>
				<dd><?php echo $this->Form->text('licenses', array( 'class' => 'text')); ?></dd>
				<dt>スキル</dt>
				<dd><?php echo $this->Form->text('skill', array( 'class' => 'text')); ?></dd>
				<dt>facebook</dt>
				<dd><?php echo $this->Form->text('facebook', array( 'class' => 'text')); ?></dd>
				<dt>twitter</dt>
				<dd><?php echo $this->Form->text('twitter', array( 'class' => 'text')); ?></dd>
				<dt>メールアドレス（公開用）</dt>
				<dd><?php echo $this->Form->text('pub_mailaddress', array( 'class' => 'text')); ?></dd>
				<dt class="last">自己PR（200字以内）</dt>
				<dd class="last"><?php echo $this->Form->textarea('description', array( 'class' => 'pr')); ?><br /><? echo $msgPR; ?></dd>
			</dl>
			<?php echo $this->Form->submit('', array( 'class' => 'btn')); ?>
	</div>
</div>





















