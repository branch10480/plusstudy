
<div>
<h2>TOP</h2>
<p><?php echo $msg ?></p>
</div>

<div>
<?php echo $this->Html->link(__('マイページ'), array('action' => 'profile')); ?>
</div>

<div>
<?php echo $this->Form->create('Logout'); ?>
<?php echo $this->Form->end(__('ログアウト')); ?>	
</div>