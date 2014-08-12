<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'richeditor',
		), array('inline' => false));
	// $this->Html->css(array(
	// 	'pieChart',
	// 	'glide',
	// 	), null, array('inline' => false));
?>

<!-- 新規会員登録 -->
<?php $this->Form->create('Seminar', array('action' => '')); ?>
<div class="modal">
	<div id="myImgs"></div>
	<?php echo $this->Form->file('imgFile'); ?>
</div>
<dl>
	<dt>セミナーカバー画像</dt>
	<dd><a href="#">セミナーカバー画像を選ぶ</a></dd>
	<dt>セミナー名称</dt>
	<dd><?php echo $this->Form->text('Seminar.name'); ?></dd>
	<dt>開催場所</dt>
	<dd><?php echo $this->Form->text('Seminar.place'); ?></dd>
	<dt>参加人数上限</dt>
	<dd><?php echo $this->Form->text('Seminar.upper_limit'); ?></dd>
	<dt>開催日</dt>
	<dd><?php echo $this->Form->date('Seminar.date'); ?></dd>
	<dt>開始時間</dt>
	<dd>
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
	<dt>終了時間</dt>
	<dd>
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
	<dt>予約締切日時</dt>
	<dd>
	<?php echo $this->Form->date('Seminar.reservation_limit_d'); ?>
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
		<div id="editArea" contentEditable="true" style="border: 1px solid #ddd; height: 100px;"></div>
		<?php
			echo $this->Form->button('HTMLの取得', array(
					'id' => 'getHtmlBtn',
				));
			?><br />
		<?php echo $this->Form->textarea('Seminar.description'); ?>
	</dd>
</dl>
<?php echo $this->Form->end('確認画面へ'); ?>
