<?php
	// このページ限定のCSS,JS
	$this->Html->script('profile', array('inline' => false));
	// $this->Html->css('pieChart', null, array('inline' => false));
?>
<input id="accountId" type="hidden" value="<?php echo $this->Session->read('Auth.id'); ?>" />
<div>
	<h2><?php echo __('マイページ'); ?></h2>

	<?php if($this->Session->read('Auth.id') == $this->params['url']['id']): ?>
	<?php echo $this->Html->link('プロフィールを編集する', array('controller' => 'Accounts', 'action' => 'edit')); ?>
	<?php endif; ?>

	<br>
	<p><b>プロフィール画像</b></p>
	<form action="<?php echo ROOT_URL . 'Accounts/uploadProfImg/'; ?>" method="post" id="ImgUpForm">
	<p>
	<img id="profileImg" src="<?php echo $account['Account']['img_ext'] === null ? NO_IMG_URL : PROF_IMG_PATH . $account['Account']['id'] . '.' . $account['Account']['img_ext'] ; ?>" alt="<?php echo $account['Account']['last_name'] . $account['Account']['first_name']; ?>" />

	<?php if($this->Session->read('Auth.id') == $this->params['url']['id']): ?>
	<input id="profile_img" enctype="multipart/form-data" name="up_img" type="file"><input id="delProfImg" type="button" value="画像を削除">
	<?php endif; ?>

	</p>
	</form>
	<br>

	<p><b>名前</b></p>
	<p><?php echo $account['Account']['last_ruby'] . ' ' .
				  $account['Account']['first_ruby']; ?></p>
	<p><?php echo $account['Account']['last_name'] . ' ' .
				  $account['Account']['first_name']; ?></p>
	<br>

	<p><b>自己紹介</b></p>
	<p><?php echo $account['Account']['description']; ?></p>
	<br>

	<p><b>コース</b></p>
	<p><?php echo $account['Account']['course'] . '年制課程'; ?></p>
	<br>

	<p><b>学年</b></p>
	<p><?php echo $account['Account']['grade'] . '年生'; ?></p>
	<br>

	<p><b>学科</b></p>
	<p><?php echo $account['Account']['subject']; ?></p>
	<br>

	<p><b>資格</b></p>
	<p><?php echo $account['Account']['licenses']; ?></p>
	<br>

	<p><b>スキル</b></p>
	<p><?php echo $account['Account']['skill']; ?></p>
	<br>

	<p><b>Facebook</b></p>
	<p><?php echo $account['Account']['facebook']; ?></p>
	<br>

	<p><b>twitter</b></p>
	<p><?php echo $account['Account']['twitter']; ?></p>
	<br>

	<p><b>公開メールアドレス</b></p>
	<p><?php echo $account['Account']['pub_mailaddress']; ?></p>
	<br>
</div>


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