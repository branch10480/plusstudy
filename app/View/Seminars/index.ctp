<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'richeditor',
		'BeatPicker',
		), array('inline' => false));
	$this->Html->css(array(
		'BeatPicker',
		), null, array('inline' => false));
?>

<!-- 新規会員登録 -->
<?php echo $this->Form->create('Seminar'); ?>
<div class="modal">
	<div id="myImgs"></div>
	<?php echo $this->Form->file('imgFile'); ?>
</div>
<dl>
	<dt>セミナーカバー画像</dt>
	<dd><a href="#">セミナーカバー画像を選ぶ</a></dd>
	<dt>セミナー名称</dt>
	<dd><?php echo $this->Form->text('Seminar.name'); ?></dd>
	<dd class="errMsg"><?php echo $eSmnName; ?></dd>
	<dt>開催場所</dt>
	<dd><?php echo $this->Form->text('Seminar.place'); ?></dd>
	<dd class="errMsg"><?php echo $ePlace; ?></dd>
	<dt>参加人数上限</dt>
	<dd>
		<?php echo $this->Form->text('Seminar.upper_limit', array(
			'default' => 0,
		)); ?>
	</dd>
	<dd class="errMsg">
		<?php echo $eUpperLimit; ?>
	</dd>
	<dt>開催日</dt>
	<dd><?php echo $this->Form->text('Seminar.date', array('data-beatpicker' => 'true')); ?></dd>
	<dd class="errMsg"><?php echo $eStartDate; ?></dd>
	<dt>開始時間</dt>
	<dd>
	<?php echo $this->Form->input('Seminar.startH', array(
			'type' => 'select',
			'options' => $hArray,
			'label' => '',
	)); ?>時
	<?php echo $this->Form->input('Seminar.startM', array(
			'type' => 'select',
			'options' => $minArray,
			'label' => '',
	)); ?>分
	</dd>
	<dt>終了時間</dt>
	<dd>
	<?php echo $this->Form->input('Seminar.endH', array(
			'type' => 'select',
			'options' => $hArray,
			'label' => '',
	)); ?>時
	<?php echo $this->Form->input('Seminar.endM', array(
			'type' => 'select',
			'options' => $minArray,
			'label' => '',
	)); ?>分
	</dd>
	<dt>予約締切日時</dt>
	<dd>
	<?php echo $this->Form->text('Seminar.reservation_limit_d', array('data-beatpicker' => 'true')); ?>
	<?php echo $this->Form->input('Seminar.reservation_limit_h', array(
			'type' => 'select',
			'options' => $hArray,
			'label' => '',
	)); ?>時
	<?php echo $this->Form->input('Seminar.reservation_limit_m', array(
			'type' => 'select',
			'options' => $minArray,
			'label' => '',
	)); ?>分
	</dd>
	<dd class="errMsg"><?php echo $eRsvLimitDate; ?></dd>
	<dt>セミナー詳細</dt>
	<dd>
		<?php
			echo $this->Form->button('B', array(
					'id' => 'bold'
				));
			echo $this->Form->button('U', array(
					'id' => 'underline'
				));
			echo $this->Form->button('I', array(
					'id' => 'italic'
				));
			echo $this->Form->input('fontsize', array(
					'type' => 'select',
					'label' => 'フォントサイズ',
					'options' => $fontsizeArray,
				));
			echo $this->Form->input('fontColor', array(
					'type' => 'select',
					'label' => 'フォント色',
					'options' => $fontColor,
				));
		?>
		<?php echo $this->Form->button('画像を挿入', array('id' => 'insertImg', 'type' => 'button')); ?>
		<div id="editArea" contentEditable="true" style="border: 1px solid #ddd; height: 100px;"><?php echo $dsc; ?></div>
		<?php echo $this->Form->hidden('Seminar.description'); ?>
	</dd>
</dl>
<?php echo $this->Form->end('確認画面へ'); ?>
