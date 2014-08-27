
<div>
	<h2>TOP</h2>

</div>


<div>
	<?php echo $msg ?>

	<?php echo $this->Html->link(__('マイページ'), array('action' => 'profile')); ?>
	<?php echo $this->Html->link(__('ニーズ登録'), array('controller' => 'TeachMes', 'action' => 'index')); ?>	
</div>

<div>
	<?php echo $this->Form->create('Logout'); ?>
	<?php echo $this->Form->end(__('ログアウト')); ?>	
	<hr>
</div>

<div>
	<h2><?php echo __('今求められている勉強会'); ?></h2>
	<?php if(count($teachmes) === 0): ?> 
		<p><?php echo '今求められている勉強会はありません'; ?></p>
		<hr>
	<?php endif; ?>	

	<?php foreach($teachmes as $teachme): ?>
		
		<?php echo $this->Html->link($teachme['TeachMe']['title'], array(
			'controller' => 'TeachMes' ,
		 	'action' => 'details', 
		 	'?' => array('id' => $teachme['TeachMe']['id'])
		 	)); ?>
		<?php echo count($teachme['MeToo']) . '人' ?>
		<br>

	<?php endforeach; ?>
</div>

<br>

<div>
	<h2><?php echo __('参加者募集中の勉強会'); ?></h2>
	<?php if(count($seminars) === 0): ?> 
		<p><?php echo '現在予定されている勉強会はありません'; ?></p>
		<hr>
	<?php endif; ?>

	<?php foreach($seminars as $seminar): ?>
		
		<p><b><?php echo $seminar['Seminar']['name']; ?></b></p>

		<p><?php echo '　主催者：' . $seminar['Account']['last_name'] . $seminar['Account']['first_name']; ?></p>		
		
		<p><?php echo '開催日程：' . $seminar['Seminar']['start'] . ' 〜 ' . $seminar['Seminar']['end']; ?></p>

		<p><?php echo '申込締切：' . $seminar['Seminar']['reservation_limit']; ?></p>		

		<p><?php echo '参加人数：' . count($seminar['Participant']) . '/' . $seminar['Seminar']['upper_limit']; ?></p>

	<?php endforeach; ?>
</div>