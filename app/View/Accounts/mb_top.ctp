<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'imgopt',
		'mbLogin',
		), array('inline' => false));
	$this->Html->css(array(
		'mb_seminar_card.css',
		'mb_top.css',
		), null, array('inline' => false));
?>

<script>
	$(window).load(function() {
		ImgOpt.setImgId('.thumb img');
		ImgOpt.optimize();
	});
</script>


<article>
	<ul id="nav" class="tab topTab cf">
		<li class="active"><h2>参加者募集中の勉強会</h2></li>
		<li><h2>求められている勉強会</h2></li>
	</ul>


	<section class="panel show">
		<div class="tabArArea tabL"><?php echo $this->Html->image(MB_IMG_PATH . 'tab_on_ar.png', array("alt" => "タブar")); ?></div>

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
				$cardClass = 'middle';
			} else {
				// 夜
				$cardClass = 'late';
			}

			?>

			<a class="card<?php echo ' ' . $cardClass; ?>" href="<?php echo ROOT_URL . 'Seminars/details?id=' . $seminar['Seminar']['id']; ?>">
				<h3>デザイン・レイアウト勉強会</h3>

				<div class="cf">
					<?php if (!empty($seminar['Account']['img_ext'])) { ?>
						<figure class="thumb"><img src="<?php echo PROF_IMG_PATH . $seminar['Account']['id'] . '.' . $seminar['Account']['img_ext']; ?>" alt="<?php echo $seminar['Account']['last_name'] . ' ' . $seminar['Account']['first_name']; ?>" /></figure>
					<?php } else { ?>
						<figure class="thumb"><img src="<?php echo PROF_IMG_PATH; ?>no_image.gif" alt="<?php echo $seminar['Account']['last_name'] . ' ' . $seminar['Account']['first_name']; ?>" /></figure>
					<?php } ?>
					<div class="cardDetails">
						<dl class="opening cf">
							<dt>開催日時</dt>
							<dd><?php echo sprintf('%d', $openingMonth) . '/' . sprintf('%d', $openingDay) . ' ' . $openingM . ':' . $openingM . ' ~ ' . $closingH . ':' , $closingM ?></dd>
						</dl>
						<div class="cf">
							<dl class="patiNumPeo cf">
								<dt>参加人数</dt>
								<dd><?php echo count($seminar['Participant']); ?>/<?php echo $seminar['Seminar']['upper_limit']; ?></dd>
							</dl>
							<dl class="deadLine cf">
								<dt>募集締切</dt>
								<dd><?php echo sprintf('%d', $limitMonth) . '/' . sprintf('%d', $limitDay); ?></dd>
							</dl>
						</div>
					</div>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
	</section>



	<section class="panel">
		<div class="tabArArea tabR"><?php echo $this->Html->image(MB_IMG_PATH . 'tab_on_ar.png', array("alt" => "タブar")); ?></div>
		<?php if(count($teachmes) === 0): ?>
			<p><?php echo '今求められている勉強会はありません'; ?></p>
		<?php endif; ?>

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
				</div>
			</li>
		<?php endforeach; ?>
		</ul>
	</section>



</article>