<?php echo $this->Form->create('Account'); ?>
<dl>
	<dt>登録用メールアドレス（非公開）</dt>
	<dd><?php echo $this->Form->text('mailaddress'); ?></dd>
	<dt>氏名</dt>
	<dd>姓 <?php echo $this->Form->text('last_name'); ?> 名<?php echo $this->Form->text('first_name'); ?><br /><?php echo $msgName; ?></dd>
	<dt>氏名（カナ）</dt>
	<dd>セイ <?php echo $this->Form->text('last_ruby'); ?> メイ<?php echo $this->Form->text('first_ruby'); ?><br /><? echo $msgNameKana; ?></dd>
	<dt>コース</dt>
	<dd><?php echo $this->Form->select('course', array(
		'2' => '2年制課程',
		'4' => '4年制課程',
	), array('empty' => '--- 選択してください ---')); ?><br /><? echo $msgCourse; ?></dd>
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
<?php echo $this->Form->end('変更を保存'); ?>