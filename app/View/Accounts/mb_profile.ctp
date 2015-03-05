<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'profile',
		), array('inline' => false));
	$this->Html->css(array(
		'mb_profile',
		'mb_seminar_card',
		), null, array('inline' => false));
?>
<input id="accountId" type="hidden" value="<?php echo $this->Session->read('Auth.id'); ?>" />





<section class="first">
	<h2><?php echo $this->Html->image(MB_IMG_PATH . 'profile_h.png', array('width' => '153', 'height' => '55')); ?></h2>
	<div class="wrapper cf">
		<div class="left">
			<div class="profimg">
				<img id="profileImg" src="<?php echo $account['Account']['img_ext'] === null ? NO_IMG_URL : PROF_IMG_PATH . $account['Account']['id'] . '.' . $account['Account']['img_ext'] ; ?>" alt="<?php echo $account['Account']['last_name'] . $account['Account']['first_name']; ?>" />
			</div>
		</div>
		<div class="right">
			<h3>
				<ruby>
					<?php echo htmlspecialchars($account['Account']['last_name']); ?><rt><?php echo $account['Account']['last_ruby']; ?></rt>
					 <?php echo htmlspecialchars($account['Account']['first_name']); ?><rt><?php echo $account['Account']['first_ruby']; ?></rt>
				</ruby>
			</h3>
		</div>
		<div class="social cf">
			<?php if (!empty($account['Account']['facebook'])) { ?>
				<a href="<?php echo $account['Account']['facebook']; ?>"><?php echo $this->Html->image(MB_IMG_PATH . 'facebook.png', array('width' => '25', 'height' => '25')); ?></a>
			<?php } ?>
			<?php if (!empty($account['Account']['twitter'])) { ?>
				<a href="<?php echo $account['Account']['twitter']; ?>"><?php echo $this->Html->image(MB_IMG_PATH . 'twitter.png', array('width' => '25', 'height' => '25')); ?></a>
			<?php } ?>
		</div>
	</div>
	<div id="profileDetailsArea">
		<table id="profileDetails">
			<tr class="cf">
				<th>学科</th>
				<td><?php echo $account['Account']['subject']; ?></td>
			</tr>
			<tr class="cf">
				<th>学年</th>
				<td><?php echo $account['Account']['grade'] . '年生'; ?></td>
			</tr>
			<tr class="cf">
				<th>メール</th>
				<td><?php echo htmlspecialchars($account['Account']['pub_mailaddress']); ?></td>
			</tr>
			<tr class="cf">
				<th>スキル</th>
				<td><?php echo htmlspecialchars($account['Account']['skill']); ?></td>
			</tr>
			<tr class="cf">
				<th>資格</th>
				<td><?php echo htmlspecialchars($account['Account']['licenses']); ?></td>
			</tr>
			<tr class="cf">
				<th>PR文</th>
				<td><?php echo htmlspecialchars($account['Account']['description']); ?></td>
			</tr>
		</table>
	</div>
</section>





<section class="second">
	<h2><?php echo $this->Html->image('sponsorship_h.png', array('width' => '153', 'height' => '55')); ?></h2>
	<div class="wrapper">
		<div class="seminarsArea cf">
			<?php if(count($myseminars) === 0): ?>
				<p class="none"><?php echo '現在主催している勉強会はありません'; ?></p>
			<?php endif; ?>

			<?php foreach($myseminars as $seminar): ?>


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
				<h3><?php echo $seminar['Seminar']['name']; ?></h3>

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
	</div>
</section>





<section class="third">
	<h2><?php echo $this->Html->image('participateseminar_h.png', array('width' => '153', 'height' => '55')); ?></h2>
	<div class="wrapper">
		<div class="seminarsArea cf">
			<?php if(count($partseminars) === 0): ?>
			<p class="none"><?php echo '参加予定の勉強会はありません'; ?></p>
			<?php endif; ?>

			<?php foreach($partseminars as $seminar): ?>


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
				<h3><?php echo $seminar['Seminar']['name']; ?></h3>

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
	</div>
</section>