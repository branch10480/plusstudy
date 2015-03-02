<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'easyselectbox.min',
		'acc_edit.js',
		), array('inline' => false));
	$this->Html->css(array(
		'control1',
		'new_acc',
		'acc_edit',
		'btnSubmit',
		), null, array('inline' => false));
?>
<script>
	$(function(){
		$('.select').easySelectBox();
	});
</script>
<div id="profile_edit_h">
	<div class="title">
		<?php echo $this->Html->Image('profileedit_h.png', array('width' => '306', 'height' => '109')); ?>
	</div>
</div>
<?php echo $this->Form->create('Account'); ?>
<div class="plot" id="profile_edit">

	<div class="container_body2">
		<h1 class="mail_new_acc_title">※ は必須項目になります。</h1>
			<dl class="entry_dl cf">
				<dt>メールアドレス（非公開）</dt>
				<dd><?php echo $this->Form->text('mailaddress', array('readonly' => 'true', 'class' => 'ma')); ?></dd>
				<dt id="nameDt">氏名 ※</dt>
				<dd><span class="errorMsg"><?php echo $msgName; ?></span><div class="name cf"><div class="fl"><span class="lastName">(姓)</span><?php echo $this->Form->text('last_name', array( 'class' => 'text')); ?></div><div class="fl"><span class="firstName">(名)</span><?php echo $this->Form->text('first_name', array( 'class' => 'text')); ?></div><br /></div><span class="errorMsg"><? echo $msgNameKana; ?></span><div class="kana cf"><div class="fl"><span class="lastName">(セイ)</span><?php echo $this->Form->text('last_ruby', array( 'class' => 'text')); ?></div><div class="fl"><span class="firstName">(メイ)</span><?php echo $this->Form->text('first_ruby', array( 'class' => 'text')); ?><br /></div></div></dd>
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
				<dd><?php echo $this->Form->text('subject', array( 'class' => 'text')); ?><span class="errorMsg2"><? echo $msgSubject; ?></span></dd>
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
	</div>
</div>
<div id="profile_edit_btnArea" class="btnSubmit">
	<?php echo $this->Html->link($this->Html->image('pfcansel_btn.png', array('width' => '222', 'height' => '59')), array('action' => 'profile', '?' => array('id' => $this->Session->read('Auth.id'))), array('escape' => false)); ?><?php echo $this->Html->link($this->Html->image('pfeditfinish_btn.png', array('width' => '222', 'height' => '59')), array('action' => 'edit'), array('escape' => false, 'class' => 'submitBtn')); ?>
	<?php echo $this->Form->submit('', array( 'class' => 'btn')); ?>
</div>
<?php echo $this->Form->end(); ?>





















