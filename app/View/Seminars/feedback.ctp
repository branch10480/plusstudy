<br>
<p>参加した勉強会のフィードバックにご協力お願いします</p>
<br>

<p>勉強会に参加してみて良かったですか？</p>
<p><?php echo $this->Form->button('良かった！', array('type' => 'button', 'id' => 'gj')); ?><p>

<br>
<p>あなたのニーズは解決しましたか？</p>
<p><?php echo $this->Form->button('解決した！', array('type' => 'button', 'id' => 'gj')); ?><p>

<br>
<?php echo $this->Html->link(__('TOPへ'), array('controller' => 'Accounts', 'action' => 'index')); ?>