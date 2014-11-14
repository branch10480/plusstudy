<?php
	// このページ限定のCSS,JS
	$this->Html->script('profile', array('inline' => false));
	// $this->Html->css('pieChart', null, array('inline' => false));
?>
<input id="accountId" type="hidden" value="<?php echo $this->Session->read('Auth.id'); ?>" />

<section class="cf">
	<h2><?php echo $this->Html->image('profile_h.png', array('width' => '306', 'height' => '109')); ?></h2>
	<div class="left">
		<form action="<?php echo ROOT_URL . 'Accounts/uploadProfImg/'; ?>" method="post" id="ImgUpForm">
			<img id="profileImg" src="<?php echo $account['Account']['img_ext'] === null ? NO_IMG_URL : PROF_IMG_PATH . $account['Account']['id'] . '.' . $account['Account']['img_ext'] ; ?>" alt="<?php echo $account['Account']['last_name'] . $account['Account']['first_name']; ?>" />

			<?php if($this->Session->read('Auth.id') == $this->params['url']['id']): ?>
			<input id="profile_img" enctype="multipart/form-data" name="up_img" type="file"><input id="delProfImg" type="button" value="画像を削除">
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
	</div>
	<div class="right">
		<?php echo $this->Html->link('プロフィールを編集する', array('controller' => 'Accounts', 'action' => 'edit'), array('id' => 'editBtn')); ?>
		<?php if (!empty($account['Account']['facebook'])) { ?>
			<a href="<?php echo $account['Account']['facebook']; ?>"><?php echo $this->Html->image('facebook.png', array('width' => '54', 'height' => '54')); ?></a>
		<?php } ?>
		<?php if (!empty($account['Account']['twitter'])) { ?>
			<a href="<?php echo $account['Account']['twitter']; ?>"><?php echo $this->Html->image('twitter.png', array('width' => '54', 'height' => '54')); ?></a>
		<?php } ?>
	</div>
</section>



























<div>


<div>
	<b><?php echo __('主催している勉強会'); ?></b>
	<?php if(count($myseminars) === 0): ?>
		<p><?php echo '現在主催している勉強会はありません'; ?></p>
		<br>
	<?php endif; ?>

	<?php foreach($myseminars as $myseminar): ?>

		<p><?php echo $this->Html->link($myseminar['Seminar']['name'], array(
			'controller' => 'Seminars' ,
		 	'action' => 'details',
		 	'?' => array('id' => $myseminar['Seminar']['id'])
		 	)); ?></p>

		<p><?php echo '　主催者：' . $myseminar['Account']['last_name'] . $myseminar['Account']['first_name']; ?></p>

		<p><?php echo '開催日程：' . $myseminar['Seminar']['start'] . ' 〜 ' . $myseminar['Seminar']['end']; ?></p>

		<p><?php echo '申込締切：' . $myseminar['Seminar']['reservation_limit']; ?></p>

		<p><?php echo '参加人数：' . count($myseminar['Participant']) . '/' . $myseminar['Seminar']['upper_limit']; ?></p>

	<?php endforeach; ?>
</div>

<br>

<div>
	<b><?php echo __('参加予定の勉強会'); ?></b>
	<?php if(count($partseminars) === 0): ?>
		<p><?php echo '参加予定の勉強会はありません'; ?></p>
		<hr>
	<?php endif; ?>

	<?php foreach($partseminars as $partseminar): ?>

		<p><?php echo $this->Html->link($partseminar['Seminar']['name'], array(
			'controller' => 'Seminars' ,
		 	'action' => 'details',
		 	'?' => array('id' => $partseminar['Seminar']['id'])
		 	)); ?></p>

		<p><?php echo '　主催者：' . $partseminar['Account']['last_name'] . $partseminar['Account']['first_name']; ?></p>

		<p><?php echo '開催日程：' . $partseminar['Seminar']['start'] . ' 〜 ' . $partseminar['Seminar']['end']; ?></p>

		<p><?php echo '申込締切：' . $partseminar['Seminar']['reservation_limit']; ?></p>

		<p><?php echo '参加人数：' . count($partseminar['Participant']) . '/' . $partseminar['Seminar']['upper_limit']; ?></p>

	<?php endforeach; ?>
</div>