<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'richeditor',
		'BeatPicker',
		'easyselectbox.min',
		'SeminarsIndex',
		), array('inline' => false));
	$this->Html->css(array(
		'BeatPicker',
		'control2',
		'seminars',
		), null, array('inline' => false));
?>
<script>
	$(function(){
		$('.select select').easySelectBox();

		$('.btnSubmit').click(function(event) {
			event.preventDefault();
			$('#SeminarIndexForm').submit();
		});
	});
</script>

<!-- 新規勉強会登録 -->
<input type="hidden" id="accId" value="<?php echo $accId; ?>" />
<div class="modal">
	<form method="post" action="<?php echo ROOT_URL . 'SeminarImages/uploadImg/'; ?>" name="imgUpForm" id="imgUpForm">
		<h3>現在の使用容量</h3>
		<p id="storage">0MB / 50MB</p>
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
<h2><img src="<?php echo IMG_PATH; ?>seminarcreate_h.png" alt="勉強会作成" width="306" height="109"><span class="hidden">勉強会作成</span></h2>
<section>
	<div class="wrapper">
		<?php echo $this->Form->create('Seminar'); ?>
		<?php echo $this->Form->hidden('Seminar.seminar_img_id'); ?>
		<dl>
			<dt>セミナーカバー画像</dt>
			<dd>
				<div class="btnArea cf">
					<a href="#" id="selectImgsBtn"><img src="<?php echo IMG_PATH; ?>seminarcoverimgselect_btn.png" alt="セミナーカバー画像を選ぶ" width="222" height="54"></a>
					<a href="#" id="smnImgReset"><img src="<?php echo IMG_PATH; ?>seminarcoverimgreset_btn.png" alt="画像をリセット" width="138" height="54"></a>
				</div>
			</dd>
			<dd id="coverImg" class="newSmnInputCover"><?php if ($smnImgId !== '') echo $smnImgId = '' ? '' : '<img src="'.$smnImgId.'" alt="" />'; ?></dd>
			<dt>セミナー名称</dt>
			<dd><?php echo $this->Form->text('Seminar.name', array('class' => 'text')); ?></dd>
			<dd class="errMsg"><?php echo $eSmnName; ?></dd>
			<dt>開催場所</dt>
			<dd><?php echo $this->Form->text('Seminar.place', array('class' => 'text')); ?></dd>
			<dd class="errMsg"><?php echo $ePlace; ?></dd>
			<dt>参加人数上限</dt>
			<dd>
				<?php echo $this->Form->text('Seminar.upper_limit', array(
					'default' => 0,
					'class' => 'text',
				)); ?>
			</dd>
			<dd class="errMsg">
				<?php echo $eUpperLimit; ?>
			</dd>
			<dt>開催日</dt>
			<dd><?php echo $this->Form->text('Seminar.date', array('data-beatpicker' => 'true', 'class' => 'date')); ?></dd>
			<dd class="errMsg"><?php echo $eStartDate; ?></dd>
			<dt>開始時間</dt>
			<dd>
			<?php echo $this->Form->input('Seminar.startH', array(
					'type' => 'select',
					'options' => $hArray,
					'label' => '',
					'class' => 'select',
			)); ?>時
			<?php echo $this->Form->input('Seminar.startM', array(
					'type' => 'select',
					'options' => $minArray,
					'label' => '',
					'class' => 'select',
			)); ?>分
			</dd>
			<dt>終了時間</dt>
			<dd>
			<?php echo $this->Form->input('Seminar.endH', array(
					'type' => 'select',
					'options' => $hArray,
					'label' => '',
					'class' => 'select',
			)); ?>時
			<?php echo $this->Form->input('Seminar.endM', array(
					'type' => 'select',
					'options' => $minArray,
					'label' => '',
					'class' => 'select',
			)); ?>分
			</dd>
			<dt>予約締切日時</dt>
			<dd>
			<?php echo $this->Form->text('Seminar.reservation_limit_d', array('data-beatpicker' => 'true', 'class' => 'date')); ?>
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
				<!-- リッチエディタ -->
				<div class="richeditor">
					<ul class="cf">
						<li onclick="(function(event){ event.preventDefault(); })(event)" class="buiBtn"><a href="#" id="bold">B</a></li>
						<li onclick="(function(event){ event.preventDefault(); })(event)" class="buiBtn"><a href="#" id="underline">U</a></li>
						<li onclick="(function(event){ event.preventDefault(); })(event)" class="buiBtn"><a href="#" id="italic">I</a><?php echo $this->Form->button('I', array(
								'id' => 'italic',
								'type' => 'button',
							)); ?></li>
						<li class="labelLi"><label>フォントサイズ</label></li>
						<li class='selectFontSize'>
							<?php echo $this->Form->input('fontsize', array(
								'type' => 'select',
								'label' => false,
								'options' => $fontsizeArray,
								'class' => 'select',
							)); ?>
						</li>
						<li class="labelLi"><label>フォント色</label></li>
						<li>
							<?php echo $this->Form->input('fontColor', array(
								'type' => 'select',
								'label' => false,
								'options' => $fontColor,
								'class' => 'select',
							)); ?>
						</li>
						<li class="insertImg"><a href="#" id="insertImg">画像を挿入</a></li>
					</ul>
					<div id="editArea" contenteditable="true"><?php echo $dsc; ?></div>
				</div>
				<?php echo $this->Form->hidden('Seminar.description'); ?>
			</dd>
		</dl>
		<?php echo $this->Form->end(); ?>
	</div>
</section>
<div class="btnArea"><a href="#" class="btnSubmit" id="submitBtn"><img src="<?php echo IMG_PATH; ?>next_btn.png" alt="" width="222" height="50"></a></div>
