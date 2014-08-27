<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'richeditor',
		'BeatPicker',
		'SeminarsIndex',
		), array('inline' => false));
	$this->Html->css(array(
		'BeatPicker',
		'testSmn',
		), null, array('inline' => false));
?>

<!-- 新規勉強会登録 -->
<input type="hidden" id="accId" value="<?php echo $accId; ?>" />
<div class="modal">
	<form method="post" action="<?php echo ROOT_URL . 'SeminarImages/uploadImg/'; ?>" name="imgUpForm" id="imgUpForm">
		<ul id="myImgs">
			<li><img onclick="selectImg(event)" src="http://amd.c.yimg.jp/im_siggf_VHByhUvs8k8G4G3_o44w---x150-y101-q90/amd/20140812-00000032-xinhua-000-0-thumb.jpg"></li>
			<li><img onclick="selectImg(event)" src="http://msp.c.yimg.jp/yjimage?q=jf2irBgXyLFexHr1.eni1O.zPtXJQbcZaBker.FoyvieXvV8VlskGcdtIzFF0S8BovijwZ0is_YmJS5lkL6GsoJ_8E9D2ENxODejamdWnyQ8e4nP93JK6yWAobqFOrst5Kg-&sig=12tnbdk68&x=102&y=102"></li>
			<li><img onclick="selectImg(event)" src="http://msp.c.yimg.jp/yjimage?q=EjNy.XcXyLEmAWZ4Kh7F1aPbFGVhy4mH7pOLh90Gbin0M9Ga82N1tirLBbpfKewvSfQgbv3mD04sj3eBqbvX7LXsd_5kJ_DmGN4d869rY4eFyra.zO4H4GuZeKAfZRL0a0M-&sig=12t3gqrm1&x=102&y=102"></li>
		</ul>
		<ul id="pagingNav">
			<li><a class="pre" href="">&laquo; 前へ</a></li>
			<li class="info">1/1</li>
			<li><a class="nxt" href="">次へ &raquo;</a></li>
		</ul>
		<?php echo $this->Form->file('imgFile', array(
			'enctype' => 'multipart/form-data',
			'name' => 'up_img',
			)); ?>
		<?php echo $this->Form->text('imgDsc', array('name' => 'dsc')); ?>
		<?php echo $this->Form->submit('画像をアップロードする'); ?>
		<a class="modalWinCloseBtn" href="#">キャンセル</a>
	</form>
</div>
<?php echo $this->Form->create('Seminar'); ?>
<?php echo $this->Form->hidden('Seminar.seminar_img_id'); ?>
<dl>
	<dt>セミナーカバー画像</dt>
	<dd><a href="#" id="selectImgsBtn">セミナーカバー画像を選ぶ</a></dd>
	<dd id="coverImg"><?php echo $smnImgId = '' ? '' : '<img src="'.$smnImgId.'" alt="" />'; ?></dd>
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
					'id' => 'bold',
					'type' => 'button',
				));
			echo $this->Form->button('U', array(
					'id' => 'underline',
					'type' => 'button',
				));
			echo $this->Form->button('I', array(
					'id' => 'italic',
					'type' => 'button',
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
<?php echo $this->Form->submit('確認画面へ', array('id' => 'submitBtn')); ?>
<?php echo $this->Form->end(); ?>
