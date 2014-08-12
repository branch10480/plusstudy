<div>
	<h2><?php echo __('マイページ'); ?></h2>

	<hr>
	<p><b>プロフィール画像</b></p>
	<p><?php echo $account['Account']['img_ext']; ?></p>
	<hr>

	<p><b>名前</b></p>
	<p><?php echo $account['Account']['first_ruby'] . ' ' .
				  $account['Account']['last_ruby']; ?></p>
	<p><?php echo $account['Account']['first_name'] . ' ' .
				  $account['Account']['last_name']; ?></p>
	<hr>

	<p><b>自己紹介</b></p>
	<p><?php echo $account['Account']['description']; ?></p>
	<hr>

	<p><b>コース</b></p>
	<p><?php echo $account['Account']['course'] . '年制課程'; ?></p>
	<hr>

	<p><b>学年</b></p>
	<p><?php echo $account['Account']['grade'] . '年生'; ?></p>
	<hr>

	<p><b>学科</b></p>
	<p><?php echo $account['Account']['subject']; ?></p>
	<hr>

	<p><b>資格</b></p>
	<p><?php echo $account['Account']['licenses']; ?></p>
	<hr>

	<p><b>スキル</b></p>
	<p><?php echo $account['Account']['skill']; ?></p>
	<hr>

	<p><b>Facebook</b></p>
	<p><?php echo $account['Account']['facebook']; ?></p>
	<hr>

	<p><b>twitter</b></p>
	<p><?php echo $account['Account']['twitter']; ?></p>
	<hr>

	<p><b>公開メールアドレス</b></p>
	<p><?php echo $account['Account']['pub_mailaddress']; ?></p>
	<hr>
</div>

<div>
	<h2><?php echo __('自分が主催している勉強会'); ?></h2>
	<?php foreach($myseminars as $myseminar): ?>
		<p><?php echo $myseminar['Seminar']['name']; ?></p>
		<p><?php echo '参加人数：' . count($myseminar['Participant']) . '/' . $myseminar['Seminar']['upper_limit']; ?></p>
	<?php endforeach; ?>
</div>