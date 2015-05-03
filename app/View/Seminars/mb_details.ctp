<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'imgopt',
		'SeminarsDetails',
		), array('inline' => false));
	$this->Html->css(array(
		'mb_seminars',
		'mb_control2',

		), null, array('inline' => false));
?>

<script>
	$(window).load(function () {
		ImgOpt.setImgId('.optim');
		ImgOpt.optimize();
	});
</script>

<section id="newSmnConfirm">
	<div class="wrapper">
		<?php
			if (!empty($seminar['Seminar']['seminar_image_id'])) {
		?>
			<div id="coverArea">
						<?php echo '<img src="' . SMN_IMG_PATH . $seminar['Seminar']['seminar_image_id'] . $seminar['SeminarImage']['ext'] . '" alt="">'; ?>
			</div>
		<?php } ?>
		<div id="prof">
			<div class="profImg">
			<?php
				if (!empty($seminar['Account']['img_ext'])) {
					echo $this->HTML->image('profile/' . $seminar['Account']['id'] . '.' . $seminar['Account']['img_ext'], array('class' => 'optim'));
				} else {
					echo $this->HTML->image(PROF_IMG_PATH . 'no_image.gif', array('class' => 'optim'));
				}
			?>
			</div>
			<p><?php echo 'with ' . h($seminar['Account']['last_name']) . ' ' . h($seminar['Account']['first_name']) ?></p>
		</div>
		<h3><?php echo h($seminar['Seminar']['name']); ?></h3>
		<div class="cf">
			<article>
				<?php echo $seminar['Seminar']['description'] ?>
			</article>
		</div>
	</div>
	<div id="date">
		<h4>開催日時</h4>
		<p><?php
			list($startDate, $startTime) = explode(' ', $seminar['Seminar']['start']);
			list($date, $month, $day) = explode('-', $startDate);
			list($startH, $startM) = explode(':', $startTime);
			$endTime = explode(' ', $seminar['Seminar']['end'])[1];
			list($endH, $endM) = explode(':', $endTime);
			echo $date . '年' . $month . '月' . $day . '日 ' . sprintf('%02d', $startH) . ':' . sprintf('%02d', $startM) . '〜' . sprintf('%02d', $endH) . ':' . sprintf('%02d', $endM);
		?></p>
	</div>
	<div class="wrapper">
		<aside>
		<h4><img src="<?php echo MB_IMG_PATH; ?>seminar_details_head.png" alt="詳細" width="60" height="24"></h4>
		<div>
			<dl>
				<div>
					<dt>開催場所<span>＞</span></dt>
					<dd><?php echo h($seminar['Seminar']['place']); ?></dd>
					</dd>
				</div>
				<div>
					<dt>募集人数<span>＞</span></dt>
					<dd>
						<?php echo +$seminar['Seminar']['upper_limit'] === 0 ? '制限なし' : $seminar['Seminar']['upper_limit'] . '人まで'; ?>
					</dd>
				</div>
				<div>
					<dt>予約締切<span>＞</span></dt>
					<dd>
					<?php
						list($limitDate, $limitTime) = explode(' ', $seminar['Seminar']['reservation_limit']);
						list($limitDate, $limitMonth, $limitDay) = explode('-', $limitDate);
						list($limitH, $limitM) = explode(':', $limitTime);
						echo $limitDate . '年' . $limitMonth . '月' . $limitDay . '日 ' . sprintf('%02d', $limitH) . '時' . sprintf('%02d', $limitM) . '分';
					?>
					</dd>
				</div>
			</dl>
			<!-- 参加ボタン or 参加取り消しボタン or 編集ボタン -->
			<div class="partbutton">
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
						break;

					default:
						exit('エラー');
						break;
				}

				?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
		</aside>
	</div>
</section>

<section id="seminarQ">
	<h2><img src="<?php echo IMG_PATH; ?>seminarq_h.png" alt="セミナーに対する質問" width="153" height="54"><span class="hidden">セミナーに対する質問</span></h2>
	<div class="wrapper">
		<?php if(count($seminar['Question']) === 0): ?>
			<p class="noq"><?php echo 'この勉強会に対する質問はありません'; ?></p>
		<?php endif; ?>
		<ul>
		<?php foreach($seminar['Question'] as $question): ?>
			<li>
				<?php echo $this->Html->link('', array(
				'controller' => 'Questions' ,
			 	'action' => 'index',
			 	'?' => array('id' => $question['id'])
			 	)); ?>
				<h3><?php echo h($question['title']); ?></h3>
				<p><?php echo str_replace('-', '/', $question['timestamp']); ?></p>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
</section>

<div id="questionForm">
	<?php if($userType !== 'Manager'): ?>
		<?php echo $this->Form->create('Question'); ?>
		<ul>
			<li><?php echo $this->Form->text('title', array('class' => 'text')); ?></li>
			<?php echo '<li class="errMsg" id="eQTitle">' . $eTitle . '</li>'; ?>
			<li><?php echo $this->Form->textarea('content'); ?></li>
			<?php echo '<li class="errMsg" id="eQContent">' . $eContent . '</li>' ?>
		</ul>
		<div class="btnArea">
		<a id="qSubmitBtn" href="#"><img src="<?php echo MB_IMG_PATH . 'seminar_q_contbtn.png' ?>" alt="質問を投稿する" width="299" height="46"></a>
			<?php // echo $this->Form->submit('質問を投稿する', array('name' => 'question')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	<?php endif; ?>
</div>