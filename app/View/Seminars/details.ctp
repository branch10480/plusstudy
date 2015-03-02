<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'imgopt',
		'SeminarsDetails',
		), array('inline' => false));
	$this->Html->css(array(
		'seminars',
		'control2',
		), null, array('inline' => false));
?>

<script>
	$(window).load(function () {
		ImgOpt.setImgId('.optim');
		ImgOpt.optimize();
	});
</script>


<!-- <h2><img src="<?php echo IMG_PATH; ?>seminar_h.png" alt="勉強会作成確認" width="306" height="109"><span class="hidden">勉強会詳細</span></h2> -->
<section id="newSmnConfirm">
	<div class="wrapper">
		<?php
			if (!empty($seminar['Seminar']['seminar_image_id'])) {
		?>
			<div id="coverArea">
						<?php echo '<img src="' . SMN_IMG_PATH . $seminar['Seminar']['seminar_image_id'] . $seminar['SeminarImage']['ext'] . '" alt="">'; ?>
			</div>
		<?php } ?>
		<h3><?php echo $seminar['Seminar']['name'] ?></h3>
		<div class="cf">
			<article>
			<h4>詳細</h4>
				<?php echo $seminar['Seminar']['description'] ?>
			</article>
			<aside>
			<h4>開催情報</h4>
			<div>
				<dl>
					<dt>開催日時</dt>
					<dd><?php
						list($startDate, $startTime) = explode(' ', $seminar['Seminar']['start']);
						list($date, $month, $day) = explode('-', $startDate);
						list($startH, $startM) = explode(':', $startTime);
						$endTime = explode(' ', $seminar['Seminar']['end'])[1];
						list($endH, $endM) = explode(':', $endTime);
						echo $date . '年' . $month . '月' . $day . '日<br />' . sprintf('%02d', $startH) . ':' . sprintf('%02d', $startM) . '〜' . sprintf('%02d', $endH) . ':' . sprintf('%02d', $endM);
					?></dd>
					<dt>開催場所</dt>
					<dd><?php echo $seminar['Seminar']['place'] ?></dd>
					</dd>
					<dt>募集人数</dt>
					<dd>
						<?php echo +$seminar['Seminar']['upper_limit'] === 0 ? '制限なし' : $seminar['Seminar']['upper_limit'] . '人まで'; ?>
					</dd>
					<dt>予約締切日時</dt>
					<dd>
					<?php
						list($limitDate, $limitTime) = explode(' ', $seminar['Seminar']['reservation_limit']);
						list($limitDate, $limitMonth, $limitDay) = explode('-', $limitDate);
						list($limitH, $limitM) = explode(':', $limitTime);
						echo $limitDate . '年' . $limitMonth . '月' . $limitDay . '日<br />' . sprintf('%02d', $limitH) . ':' . sprintf('%02d', $limitM);
					?>
					</dd>
					<dt>主催者</dt>
					<dd>
						<p><?php echo htmlspecialchars($seminar['Account']['last_name']) . ' ' . htmlspecialchars($seminar['Account']['first_name']); ?></p>
						<div class="profImg">
						<?php
							if (!empty($seminar['Account']['img_ext'])) {
								echo $this->HTML->image('profile/' . $seminar['Account']['id'] . '.' . $seminar['Account']['img_ext'], array('class' => 'optim'));
							} else {
								echo $this->HTML->image(PROF_IMG_PATH . 'no_image.gif', array('class' => 'optim'));
							}
						?>
						</div>
					</dd>
				</dl>
				<!-- 参加ボタン or 参加取り消しボタン or 編集ボタン -->
				<?php echo $this->Form->create('Button'); ?>
				<?php

				switch ($userType) {
					case 'NoJoin':
						echo $this->Html->link($this->HTML->image('participates_btn.png', array('width' => '222', 'height' => '54')), array('action' => 'register'), array('escape' => false, 'class' => 'btnSubmitJoinCancelEdit'));
						echo $this->Form->input('join', array('type' => 'hidden', 'value' => 'join'));
						break;

					case 'Join':
						echo $this->Html->link($this->HTML->image('pcansel_btn.png', array('width' => '222', 'height' => '54')), array('action' => 'register'), array('escape' => false, 'class' => 'btnSubmitJoinCancelEdit'));
						echo $this->Form->input('cancel', array('type' => 'hidden', 'value' => 'cancel'));
						break;

					case 'Manager':
						echo '<a href="' . ROOT_URL . 'Seminars/edit/' . $smnID . '">' . $this->HTML->image('thisseminarediting_btn.png', array('width' => '222', 'height' => '54')) . '</a>';
						break;

					default:
						exit('エラー');
						break;
				}

				?>
				<?php echo $this->Form->end(); ?>
			</div>
			</aside>
		</div>
	</div>
</section>


<h2><img src="<?php echo IMG_PATH; ?>seminarq_h.png" alt="セミナーに対する質問" width="306" height="109"><span class="hidden">セミナーに対する質問</span></h2>
<div id="seminarQArea">
<section id="seminarQ">
	<div class="wrapper">
		<?php if(count($seminar['Question']) === 0): ?>
			<p class="qnone"><?php echo 'この勉強会に対する質問はありません'; ?></p>
		<?php endif; ?>
		<ul>
		<?php foreach($seminar['Question'] as $question): ?>
			<li><p>Q.<?php echo $this->Html->link($question['title'], array(
				'controller' => 'Questions' ,
			 	'action' => 'index',
			 	'?' => array('id' => $question['id'])
			 	)); ?></p><span><?php echo str_replace('-', '/', $question['timestamp']); ?></span></li>
		<?php endforeach; ?>
		</ul>
	</div>
</section>


<?php if($userType !== 'Manager'): ?>
	<?php echo $this->Form->create('Question'); ?>
	<ul>
		<li><?php echo $this->Form->text('title', array('class' => 'text')); ?></li>
		<?php echo '<li class="errMsg" id="eQTitle">' . $eTitle . '</li>'; ?>
		<li><?php echo $this->Form->textarea('content'); ?></li>
		<?php echo '<li class="errMsg" id="eQContent">' . $eContent . '</li>' ?>
	</ul>
	<div class="btnArea">
	<a id="qSubmitBtn" href="#"><img src="<?php echo IMG_PATH . 'seminarqcontribution_btn.png' ?>" alt="質問を投稿する" width="222" height="54"></a>
		<?php // echo $this->Form->submit('質問を投稿する', array('name' => 'question')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
<?php endif; ?>
</div>