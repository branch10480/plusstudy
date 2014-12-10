<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'profile',
		), array('inline' => false));
	$this->Html->css(array(
		'profile',
		'seminar_card',
		), null, array('inline' => false));
?>
<input id="accountId" type="hidden" value="<?php echo $this->Session->read('Auth.id'); ?>" />





<section class="first">
	<h2><?php echo $this->Html->image('profile_h.png', array('width' => '306', 'height' => '109')); ?></h2>
	<div class="wrapper cf">
		<div class="left">
			<form action="<?php echo ROOT_URL . 'Accounts/uploadProfImg/'; ?>" method="post" id="ImgUpForm">
				<img id="profileImg" src="<?php echo $account['Account']['img_ext'] === null ? NO_IMG_URL : PROF_IMG_PATH . $account['Account']['id'] . '.' . $account['Account']['img_ext'] ; ?>" alt="<?php echo $account['Account']['last_name'] . $account['Account']['first_name']; ?>" />

				<?php if($this->Session->read('Auth.id') == $this->params['url']['id']): ?>
					<div class="menu">
						<ul>
							<li><a href="#" id="profImgSelc">画像を変更する</a></li>
							<li><a href="#" id="delProfImg">画像を削除</a></li>
						</ul>
					</div>
					<div class="hidden">
						<input id="profile_img" enctype="multipart/form-data" name="up_img" type="file">
					</div>
				<?php endif; ?>
			</form>
		</div>
		<div class="center">
			<h3>
				<ruby>
					<?php echo $account['Account']['last_name']; ?><rt><?php echo $account['Account']['last_ruby']; ?></rt>
					 <?php echo $account['Account']['first_name']; ?><rt><?php echo $account['Account']['first_ruby']; ?></rt>
				</ruby>
			</h3>
			<ul>
				<li>学科 : <?php echo $account['Account']['subject']; ?></li>
				<li>学年 : <?php echo $account['Account']['grade'] . '年生'; ?></li>
				<li>メールアドレス : <?php echo $account['Account']['pub_mailaddress']; ?></li>
			</ul>
		</div>
		<div class="right">
			<?php if($this->Session->read('Auth.id') == $this->params['url']['id']): ?>
				<?php echo $this->Html->link($this->Html->image('profileedit_btn.png', array('width' => '168', 'height' => '48')), array('controller' => 'Accounts', 'action' => 'edit'), array('id' => 'editBtn', 'escape' => false)); ?>
			<?php endif; ?>

			<div class="social cf">
				<?php if (!empty($account['Account']['facebook'])) { ?>
					<a href="<?php echo $account['Account']['facebook']; ?>"><?php echo $this->Html->image('facebook.png', array('width' => '54', 'height' => '54')); ?></a>
				<?php } ?>
				<?php if (!empty($account['Account']['twitter'])) { ?>
					<a href="<?php echo $account['Account']['twitter']; ?>"><?php echo $this->Html->image('twitter.png', array('width' => '54', 'height' => '54')); ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<table>
		<tr>
			<th>スキル</th>
			<td><?php echo $account['Account']['skill']; ?></td>
		</tr>
		<tr>
			<th>資格</th>
			<td><?php echo $account['Account']['licenses']; ?></td>
		</tr>
		<tr>
			<th>PR文</th>
			<td><?php echo $account['Account']['description']; ?></td>
		</tr>
	</table>
</section>





<section class="second">
	<h2><?php echo $this->Html->image('sponsorship_h.png', array('width' => '306', 'height' => '109')); ?></h2>
	<div class="wrapper">
		<div class="seminarsArea cf">
			<?php if(count($myseminars) === 0): ?>
				<p><?php echo '現在主催している勉強会はありません'; ?></p>
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
								<dd><?php echo sprintf('%d', $openingMonth) . ' / ' . sprintf('%d', $openingDay) . ' ' . $openingH . ':' . $openingM . ' ~ ' . $closingH . ':' , $closingM ?></dd>
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





<section class="third">
	<h2><?php echo $this->Html->image('participateseminar_h.png', array('width' => '306', 'height' => '109')); ?></h2>
	<div class="wrapper">
		<div class="seminarsArea cf">
			<?php if(count($partseminars) === 0): ?>
			<p><?php echo '参加予定の勉強会はありません'; ?></p>
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
								<dd><?php echo sprintf('%d', $openingMonth) . ' / ' . sprintf('%d', $openingDay) . ' ' . $openingH . ':' . $openingM . ' ~ ' . $closingH . ':' , $closingM ?></dd>
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