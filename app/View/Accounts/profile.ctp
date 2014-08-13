<div>
	<h2><?php echo __('マイページ'); ?></h2>

	<hr>
	<p><b>プロフィール画像</b></p>
	<p><?php echo $account['Account']['img_ext']; ?></p>
	<hr>

	<p><b>名前</b></p>
	<p><?php echo $account['Account']['last_ruby'] . ' ' .
				  $account['Account']['first_ruby']; ?></p>
	<p><?php echo $account['Account']['last_name'] . ' ' .
				  $account['Account']['first_name']; ?></p>
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
	<h2><?php echo __('主催している勉強会'); ?></h2>
	<?php if(count($myseminars) === 0): ?> 
		<p><?php echo '現在主催している勉強会はありません'; ?></p>
		<hr>
	<?php endif; ?>

	<?php foreach($myseminars as $myseminar): ?>
		
		<p><b><?php echo $myseminar['Seminar']['name']; ?></b></p>

		<p><?php echo '　主催者：' . $myseminar['Account']['last_name'] . $myseminar['Account']['first_name']; ?></p>		
		
		<p><?php echo '開催日程：' . $myseminar['Seminar']['start'] . ' 〜 ' . $myseminar['Seminar']['end']; ?></p>
		
		<p><?php echo '申込締切：' . $myseminar['Seminar']['reservation_limit']; ?></p>

		<p><?php echo '参加人数：' . count($myseminar['Participant']) . '/' . $myseminar['Seminar']['upper_limit']; ?></p>
		<hr>

	<?php endforeach; ?>
</div>


<div>
	<h2><?php echo __('参加予定の勉強会'); ?></h2>
	<?php if(count($partseminars) === 0): ?> 
		<p><?php echo '参加予定の勉強会はありません'; ?></p>
		<hr>
	<?php endif; ?>	

	<?php foreach($partseminars as $partseminar): ?>
	
		<p><b><?php echo $partseminar['Seminar']['name']; ?></b></p>
	
		<p><?php echo '　主催者：' . $partseminar['Account']['last_name'] . $partseminar['Account']['first_name']; ?></p>
	
		<p><?php echo '開催日程：' . $partseminar['Seminar']['start'] . ' 〜 ' . $partseminar['Seminar']['end']; ?></p>

		<p><?php echo '申込締切：' . $partseminar['Seminar']['reservation_limit']; ?></p>

		<p><?php echo '参加人数：' . count($partseminar['Participant']) . '/' . $partseminar['Seminar']['upper_limit']; ?></p>
		<hr>

	<?php endforeach; ?>
</div>