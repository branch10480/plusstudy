<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'feedback',
		), array('inline' => false));
	$this->Html->css(array(
		'control1',
		'seminars',
		), null, array('inline' => false));
?>

<br>
<p>参加した勉強会のフィードバックにご協力お願いします</p>
<br>

<?php echo $this->Form->hidden('seminar_id', array('value' => $seminar['Seminar']['id'], 'id' => 'seminar_id')); ?>
<?php echo $this->Form->hidden('teach_me_id', array('value' => $seminar['TeachMe']['id'], 'id' => 'teach_me_id')); ?>

<p>この勉強会に参加してみて良かったですか？</p>
<p><?php echo '勉強会名：' . $seminar['Seminar']['name']; ?>
<p id='gjcnt'><?php echo $seminar['Seminar']['gj']; ?>
<p><?php echo $this->Form->button('良かった！', array('type' => 'button', 'id' => 'gj')); ?><p>

<?php if($seminar['Seminar']['teach_me_id'] !== NULL): ?>
<br>
<p>あなたのニーズは解決しましたか？</p>
<p><?php echo 'ニーズ名：' . $seminar['TeachMe']['title']; ?>
<p><?php echo $this->Form->button('解決した！', array('type' => 'button', 'id' => 'resolve')); ?><p>
<?php endif; ?>

<br>
<?php echo $this->Html->link(__('TOPへ'), array('controller' => 'Accounts', 'action' => 'index')); ?>
