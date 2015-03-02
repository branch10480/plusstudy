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
	});
</script>

<!-- 新規勉強会登録 -->
<input type="hidden" id="accId" value="<?php echo $accId; ?>" />
<div class="modal">
	<div class="bg modalWinCloseBtn"></div>
	<div class="wrapper">
		<form method="post" action="<?php echo ROOT_URL . 'SeminarImages/uploadImg/'; ?>" name="imgUpForm" id="imgUpForm">
			<h3>現在の使用容量</h3>
			<a class="modalWinCloseBtn" href="#"><?php echo $this->Html->image('batsu.svg', array('width' => '25', 'height' => '25')) ?></a>
			<p id="storage">0MB / 50MB</p>
			<ul id="myImgs" class="cf">
				<li><img onclick="selectImg(event)" src="http://amd.c.yimg.jp/im_siggf_VHByhUvs8k8G4G3_o44w---x150-y101-q90/amd/20140812-00000032-xinhua-000-0-thumb.jpg"></li>
				<li><img onclick="selectImg(event)" src="http://msp.c.yimg.jp/yjimage?q=jf2irBgXyLFexHr1.eni1O.zPtXJQbcZaBker.FoyvieXvV8VlskGcdtIzFF0S8BovijwZ0is_YmJS5lkL6GsoJ_8E9D2ENxODejamdWnyQ8e4nP93JK6yWAobqFOrst5Kg-&sig=12tnbdk68&x=102&y=102"></li>
				<li><img onclick="selectImg(event)" src="http://msp.c.yimg.jp/yjimage?q=EjNy.XcXyLEmAWZ4Kh7F1aPbFGVhy4mH7pOLh90Gbin0M9Ga82N1tirLBbpfKewvSfQgbv3mD04sj3eBqbvX7LXsd_5kJ_DmGN4d869rY4eFyra.zO4H4GuZeKAfZRL0a0M-&sig=12t3gqrm1&x=102&y=102"></li>
			</ul>
			<ul id="pagingNav" class="cf">
				<li><a class="pre" href="">&laquo; 前へ</a></li>
				<li class="info">1/1</li>
				<li><a class="nxt" href="">次へ &raquo;</a></li>
			</ul>
			<dl id="fileselect_btns">
				<dt><?php echo $this->Html->image("fileselect_btn.png", array('width' => '140', 'height' => '34', 'id' => 'fileselect_imgbtn', 'onclick' => 'drive_fileselect_btn()')); ?><span>選択されていません</span></dt>
				<dd>
					<?php echo $this->Form->file('imgFile', array(
						'enctype' => 'multipart/form-data',
						'name' => 'up_img',
						'onchange' => 'update_imginfo(event)',
					)); ?>
				</dd>
			</dl>
			<dl id="upload_btns">
				<dt><?php echo $this->Html->image("upload.png", array('width' => '180', 'height' => '44', 'id' => 'upload_imgbtn', 'onclick' => 'drive_uploadbtn()')); ?></dt>
				<dd>
					<?php echo $this->Form->submit('画像をアップロードする'); ?>
				</dd>
			</dl>
		</form>
	</div>
</div>
<h2><img src="<?php echo IMG_PATH; ?>seminarcreate_h.png" alt="勉強会作成" width="306" height="109"><span class="hidden">勉強会作成</span></h2>
<section>
	<div class="wrapper">
		<?php echo $this->Form->create('Seminar'); ?>
		<?php echo $this->Form->hidden('teach_me_id', array('value' => ($teachme == null) ? null : $teachme['TeachMe']['id']));  ?>
		<?php echo $this->Form->hidden('Seminar.seminar_img_id'); ?>
		<dl>
			<dt>セミナーカバー画像</dt>
			<dd>
				<div class="btnArea cf">
					<a href="#" id="selectImgsBtn"><img src="<?php echo IMG_PATH; ?>seminarcoverimgselect_btn.png" alt="セミナーカバー画像を選ぶ" width="168" height="44"></a>
					<a href="#" id="smnImgReset"><img src="<?php echo IMG_PATH; ?>seminarcoverimgreset_btn.png" alt="画像をリセット" width="138" height="44"></a>
				</div>
			</dd>
			<dd id="coverImg" class="newSmnInputCover"><?php if ($smnImgId !== '') echo $smnImgId = '' ? '' : '<img src="'.$smnImgId.'" alt="" />'; ?></dd>
			<dt>タグ付けされている教えて欲しいこと</dt>
			<dd><?php echo ($teachme == null) ? 'なし' : $teachme['TeachMe']['title']; ?></dd>
			<dd><?php echo ($teachme == null) ? '' : $teachme['TeachMe']['content']; ?></dd><br />
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
			<dt>予約締め切り日時</dt>
			<dd class="cf">
			<ul id="rsvLimit" class="cf">
				<li>
					<?php echo $this->Form->text('Seminar.reservation_limit_d', array('data-beatpicker' => 'true', 'class' => 'date')); ?>
				</li>
				<li>
					<?php echo $this->Form->input('Seminar.reservation_limit_h', array(
					'type' => 'select',
					'options' => $hArray,
					'label' => '',
					)); ?>
				</li>
				<li class="colon"><p>:</p></li>
				<li>
					<?php echo $this->Form->input('Seminar.reservation_limit_m', array(
					'type' => 'select',
					'options' => $minArray,
					'label' => '',
			)); ?>
				</li>
			</ul>
			</dd>
			<dt class="cf timeTitle">
				<div>開始時間</div>
				<div>終了時間</div>
			</dt>
			<dd>
				<ul id="startToEnd" class="cf">
					<li>
						<?php echo $this->Form->input('Seminar.startH', array(
							'type' => 'select',
							'options' => $hArray,
							'label' => '',
							'class' => 'select',
						)); ?>
					</li>
					<li class="colon"><p>:</p></li>
					<li>
						<?php echo $this->Form->input('Seminar.startM', array(
							'type' => 'select',
							'options' => $minArray,
							'label' => '',
							'class' => 'select',
						)); ?>
					</li>
					<li class="tilde"><p>〜</p></li>
					<li>
						<?php echo $this->Form->input('Seminar.endH', array(
							'type' => 'select',
							'options' => $hArray,
							'label' => '',
							'class' => 'select',
						)); ?>
					</li>
					<li class="colon"><p>:</p></li>
					<li>
						<?php echo $this->Form->input('Seminar.endM', array(
							'type' => 'select',
							'options' => $minArray,
							'label' => '',
							'class' => 'select',
						)); ?>
					</li>
				</ul>
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
						<li class='selectFontColor'>
							<?php echo $this->Form->input('fontColor', array(
								'type' => 'select',
								'label' => false,
								'options' => $fontColor,
								'class' => 'select',
							)); ?>
						</li>
						<li class="insertImg"><a href="#" id="insertImg">画像を挿入</a></li>
					</ul>
					<div id="editArea"><iframe id="editIF" src="<?php echo ROOT_URL . 'Pages/display/editor/'; ?>" frameborder="0" width="640" height="315"></iframe></div>
				</div>
				<?php echo $this->Form->hidden('Seminar.description', array('value' => $dsc)); ?>

			</dd>
		</dl>
		<?php echo $this->Form->end(); ?>
	</div>
</section>
<div class="btnArea"><a href="#" class="btnSubmit" id="submitBtn"><img src="<?php echo IMG_PATH; ?>next_round_btn.png" alt="" width="222" height="54"></a></div>
