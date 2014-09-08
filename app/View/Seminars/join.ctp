<div>
	<p><b>この勉強会に参加しますか？</b></p>
	<p><?php echo $seminar['Seminar']['name'] ?></p>
	<br>

	<p><b>開催場所</b></p>
	<p><?php echo $seminar['Seminar']['place'] ?></p>

	<p><b>参加人数</b></p>
	<p><?php echo count($seminar['Participant']) . '/' . $seminar['Seminar']['upper_limit'];?></p>

	<p><b>開催日付</b></p>
	<p><?php echo $seminar['Seminar']['start'] . '〜' . $seminar['Seminar']['end']; ?></p>

	<p><b>予約締切日時</b></p>
	<p><?php echo $seminar['Seminar']['reservation_limit'] ?></p>
</div>
<br>


<?php echo $this->Form->create('Button'); ?>
<div>
	<?php echo $this->Html->link('戻る', array(
		'controller' => 'Seminars' ,
	 	'action' => 'details',
	 	'?' => array('id' => $seminar['Seminar']['id'])
	 	)); ?>
	<?php echo $this->Form->submit('参加する', array('name' => 'join')); ?>
</div>
<?php echo $this->Form->end(); ?>
<hr>