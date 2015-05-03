<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		), array('inline' => false));
	$this->Html->css(array(
		'mb_seminars',
		), null, array('inline' => false));
?>

<div id="PartSmnConfirm">
	<h2><img src="<?php echo MB_IMG_PATH; ?>seminar_part_h.png" alt="勉強会参加確認" width="153" height="55"></h2>
	<div class="wrapper">
		<div class="inner">
			<p class="msg">この勉強会に参加しますか？</p>
			<h3><?php echo h($seminar['Seminar']['name']); ?></h3>

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
				<dd><?php echo h($seminar['Seminar']['place']); ?></dd>

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
			<?php echo $this->Form->create('Button'); ?>
			<!--<div>
				<?php echo $this->Html->link('戻る', array(
					'controller' => 'Seminars' ,
				 	'action' => 'details',
				 	'?' => array('id' => $seminar['Seminar']['id'])
				 	)); ?>
				<?php echo $this->Form->submit('参加する', array('name' => 'join')); ?>
			</div>-->
			<?php echo $this->Form->end(__('')); ?>
			<div class="btnarea">
				<a href="#" class="btnSubmit"><img src="<?php echo MB_IMG_PATH . 'seminar_part_btn.png'; ?>" width="220" height="47" alt="参加する"></a>
			</div>
		</div><!-- .inner -->
	</div><!-- .wrapper -->
</div><!-- #PartSmnConfirm -->