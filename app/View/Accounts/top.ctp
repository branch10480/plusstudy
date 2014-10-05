<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'imgopt',
		), array('inline' => false));
	$this->Html->css(array(
		'seminar_card.css',
		'top.css',
		), null, array('inline' => false));
?>

<script>
	$(window).load(function() {
		ImgOpt.setImgId('.thumb img');
		ImgOpt.optimize();
	});
</script>

<section>
	<h2><img src="<?php echo IMG_PATH; ?>needs_h.png" alt="今求められている勉強会" width="306" height="109"><span class="hidden">今求められている勉強会</span></h2>
	<?php if(count($teachmes) === 0): ?>
		<p><?php echo '今求められている勉強会はありません'; ?></p>
	<?php endif; ?>

	<div class="wrapper">
		<ul id="needsArea" class="cf">
		<?php foreach($teachmes as $teachme): ?>
			<li>
				<div class="needsWrapper" class="cf">
					<div class="left">
						<?php echo $this->Html->link($teachme['TeachMe']['title'], array(
							'controller' => 'TeachMes' ,
							'action' => 'details',
							'?' => array('id' => $teachme['TeachMe']['id'])
							)); ?>
					</div>
					<div class="middle">
						<?php echo count($teachme['MeToo']) . '人' ?>
					</div>
					<div class="right">
						<a href="#"><img src="<?php echo IMG_PATH ?>metoo.png" alt="私も教えて欲しい" width="140" height="32"></a>
					</div>
				</div>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
</section>





<section>

	<h2><img src="<?php echo IMG_PATH; ?>seminarllist_h.png" alt="参加者募集中の勉強会" width="306" height="109"><span class="hidden">参加者募集中の勉強会</span></h2>

	<div class="wrapper">
		<div class="seminarsArea cf">
			<?php if(count($seminars) === 0): ?>
				<p><?php echo '現在予定されている勉強会はありません'; ?></p>
			<?php endif; ?>

			<?php foreach($seminars as $seminar): ?>


			<?php

			// ----- 日付分割処理 -----
			list($openingDate, $openingTime) = split(' ', $seminar['Seminar']['start']);
			list($closingDate, $closingTime) = split(' ', $seminar['Seminar']['end']);

			list($openingYear, $openingMonth, $openingDay) = split('-', $openingDate);
			list($openingH, $openingM, $openingS) = split(':', $openingTime);
			list($closingH, $closingM, $closingS) = split(':', $closingTime);

			list($limitDate, $limitTime) = split(' ', $seminar['Seminar']['reservation_limit']);
			list($limitDate, $limitMonth, $limitDay) = split('-', $limitDate);

			//----- カード種類の判断 -----
			$cardClass = '';
			if (4 <= $openingH && $openingH < 12) {
				// 朝
				$cardClass = 'early';
			} else if (12 <= $openingH && $openingH < 18) {
				// 昼
				$cardClass = 'mid';
			} else {
				// 夜
				$cardClass = 'late';
			}

			?>

			<div class="card<?php echo ' ' . $cardClass; ?>">
				<div class="top">
					<ul class="cf">
					<?php if (!empty($seminar['Account']['img_ext'])) { ?>
						<li class="thumb"><img src="<?php echo PROF_IMG_PATH . $seminar['Account']['id'] . '.' . $seminar['Account']['img_ext']; ?>" alt="<?php echo $seminar['Account']['last_name'] . ' ' . $seminar['Account']['first_name']; ?>" width="<?php echo $seminar['Account']['img_w']; ?>" height="<?php echo $seminar['Account']['img_h']; ?>" /></li>
					<?php } else { ?>
						<li class="thumb"><img src="<?php echo PROF_IMG_PATH; ?>no_image.gif" alt="<?php echo $seminar['Account']['last_name'] . ' ' . $seminar['Account']['first_name']; ?>" width="200" height="200" /></li>
					<?php } ?>
						<li>
							<dl>
								<dt>主催者</dt>
								<dd class="hostname"><?php echo $seminar['Account']['last_name'] . ' ' . $seminar['Account']['first_name']; ?></dd>
								<dt>開催日時</dt>
								<dd><?php echo sprintf('%d', $openingMonth) . ' / ' . sprintf('%d', $openingDay) . ' ' . $openingM . ':' . $openingM . ' ~ ' . $closingH . ':' , $closingM ?></dd>
							</dl>
						</li>
					</ul>
				</div>
				<div class="middle">
					<h3><?php echo $seminar['Seminar']['name']; ?></h3>
				</div>
				<div class="bottom">
					<ul class="cf">
						<li>
							<h4>参加人数</h4>
							<p><?php echo count($seminar['Participant']); ?></p>
						</li>
						<li>
							<h4>募集人数</h4>
							<p><?php echo $seminar['Seminar']['upper_limit']; ?></p>
						</li>
						<li>
							<h4>募集締切</h4>
							<p class="limitDate"><?php echo sprintf('%d', $limitMonth) . ' / ' . sprintf('%d', $limitDay); ?></p>
						</li>
					</ul>
					<div class="btnArea"><a href="<?php echo ROOT_URL . 'Seminars/details?id=' . $seminar['Seminar']['id']; ?>"><img src="<?php echo IMG_PATH; ?>seminar_description_btn.png" width="120" height="59" alt="詳細へ"></a></div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

</section>