<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		), array('inline' => false));
	$this->Html->css(array(
		// 'control3',
		'seminars',
		), null, array('inline' => false));
?>

<h2 id="sdelh" class=" plot header_img">
	<img src="<?php echo IMG_PATH . 'seminardeleteparticipation_h.png'; ?>" width="306" height="109" alt="">
</h2>

<div id="sdel">
		<div class="plot">
		<p class="msg">下記の勉強会を中止して、参加者にメッセージを送信します。よろしいですか？</p>
		<h3><?php echo $seminar['Seminar']['name'] ?></h3>

		<dl>
			<dt>開催日時</dt>
			<dd><?php
					list($startDate, $startTime) = explode(' ', $seminar['Seminar']['start']);
					list($date, $month, $day) = explode('-', $startDate);
					list($startH, $startM) = explode(':', $startTime);
					$endTime = explode(' ', $seminar['Seminar']['end'])[1];
					list($endH, $endM) = explode(':', $endTime);
					echo $date . '年' . $month . '月' . $day . '日 ' . sprintf('%02d', $startH) . ':' . sprintf('%02d', $startM) . '〜' . sprintf('%02d', $endH) . ':' . sprintf('%02d', $endM);
				?>
			</dd>

			<dt>開催場所</dt>
			<dd><?php echo $seminar['Seminar']['place'] ?></dd>

			<dt>参加人数 / 募集人数</dt>
			<dd><?php echo count($seminar['Participant']) . '人 / ' . $seminar['Seminar']['upper_limit'] . '人';?></dd>

			<dt>予約締め切り日時</dt>
			<dd>
				<?php
					list($limitDate, $limitTime) = explode(' ', $seminar['Seminar']['reservation_limit']);
					list($limitDate, $limitMonth, $limitDay) = explode('-', $limitDate);
					list($limitH, $limitM) = explode(':', $limitTime);
					echo $limitDate . '年' . $limitMonth . '月' . $limitDay . '日 ' . sprintf('%02d', $limitH) . ':' . sprintf('%02d', $limitM);
				?>
			</dd>
		</dl>

		<div class="teach_mes_contents">
			<span class="stopreason">中止の理由(参加者へ送信されます。)</span>
			<p><?php echo $data['Seminar']['suspend_dsc']; ?></p>

		<div id="btnArea">
			<?php echo $this->Html->link('戻る', array('action' => 'suspendInput')); ?>
			<?php echo $this->Html->link($this->Html->image('seminardelete_btn.png', array('width' => 222, 'height' => 54)), array('action' => 'suspend'), array('escape' => false)); ?>
		</div>
	</div>
</div>



</div>



