<div>
	<p><b>ニーズタイトル</b><p>
	<p><?php echo $teachme['TeachMe']['title'] ?></p>
	<p><b>作成者</b><p>
	<p><?php echo $this->Html->link($teachme['Account']['last_name'] . $teachme['Account']['first_name'], array('controller' => 'Accounts', 'action' => 'profile', '?' => array('id' => $teachme['Account']['id']))); ?></p>
	<p><b>内容</b></p>
	<p><?php echo $teachme['TeachMe']['content'] ?></p>
</div>

<?php echo $this->Form->create('MeToo'); ?>
<div>
	<br>
	<p><b>教えて欲しい！している人数</b></p>
	<p><?php echo count($teachme['MeToo']) . '人' ?></p>

	<?php if($alreadyMetoo === false): ?>
		<?php echo $this->Form->submit('教えて欲しい！', array(
    		'name' => 'metoo')); ?>
    <?php else : ?>
		<?php echo $this->Form->submit('教えて欲しい！を取り消す', array(
    		'name' => 'cancel')); ?>
    <?php endif; ?>
</div>
<?php echo $this->Form->end(); ?>

<div>
	<br>
	<?php echo $this->Html->link(__('このニーズに応える勉強会を作成'), array('controller' => 'Seminars', 'action' => 'index')); ?>
</div>