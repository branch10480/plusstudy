<div class="meToos view">
<h2><?php echo __('Me Too'); ?></h2>
	<dl>
		<dt><?php echo __('Teach Me Id'); ?></dt>
		<dd>
			<?php echo h($meToo['MeToo']['teach_me_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($meToo['Account']['id'], array('controller' => 'accounts', 'action' => 'view', $meToo['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resolved'); ?></dt>
		<dd>
			<?php echo h($meToo['MeToo']['resolved']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Me Too'), array('action' => 'edit', $meToo['MeToo']['teach_me_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Me Too'), array('action' => 'delete', $meToo['MeToo']['teach_me_id']), array(), __('Are you sure you want to delete # %s?', $meToo['MeToo']['teach_me_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Me Too'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
