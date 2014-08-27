<h1>ニーズ詳細</h1>

<div>
	<p><b>ニーズタイトル</b><p>
	<p><?php echo $teachme['TeachMe']['title'] ?></p>
	<p><b>作成者</b><p>
	<p><?php echo $teachme['Account']['last_name'] . $teachme['Account']['first_name'] ?></p>
	<p><b>内容</b></p>
	<p><?php echo $teachme['TeachMe']['content'] ?></p>
</div>

<?php echo $this->Form->create('MeToo'); ?>
<div>
	<br>
	<p><b>私も！している人数</b></p>
	<p><?php echo count($teachme['MeToo']) + 1 . '人' ?></p>

	<?php if($teachme['TeachMe']['account_id'] !== $this->Session->read('Auth.id')) : ?>

		<?php if($alreadyMetoo === false): ?>
			<?php echo $this->Form->submit('私も教えて欲しい！', array(
	    		'name' => 'metoo')); ?>
	    <?php else : ?>
			<?php echo $this->Form->submit('私も！を取り消す', array(
	    		'name' => 'cancel')); ?>
	    <?php endif; ?>

	<?php else : ?>

		<?php if(count($teachme['MeToo']) === 0) : ?>
			<?php echo $this->Form->submit('このニーズを削除する', array(
	    		'name' => 'delete')); ?>
	    <?php else : ?>
			<?php echo '他に同意している人がいるので削除できません' ?>
	    <?php endif; ?>

	<?php endif; ?>
</div>
<?php echo $this->Form->end(); ?>

<div>
	<br>
	<?php echo $this->Html->link(__('このニーズに応える勉強会を作成'), array('controller' => 'Seminars', 'action' => 'index')); ?>
</div>