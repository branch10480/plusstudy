<div class="accounts form">
<?php echo $this->Form->create('Account'); ?>
	<fieldset>
		<legend><?php echo __('Edit Account'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('mailaddress');
		echo $this->Form->input('passwd');
		echo $this->Form->input('last_name');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_ruby');
		echo $this->Form->input('first_ruby');
		echo $this->Form->input('course');
		echo $this->Form->input('grade');
		echo $this->Form->input('subject');
		echo $this->Form->input('isteacher');
		echo $this->Form->input('img_ext');
		echo $this->Form->input('description');
		echo $this->Form->input('licenses');
		echo $this->Form->input('skill');
		echo $this->Form->input('last_login');
		echo $this->Form->input('facebook');
		echo $this->Form->input('twitter');
		echo $this->Form->input('pub_mailaddress');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Account.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Account.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Me Toos'), array('controller' => 'me_toos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Me Too'), array('controller' => 'me_toos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participants'), array('controller' => 'participants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participant'), array('controller' => 'participants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminar Images'), array('controller' => 'seminar_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar Image'), array('controller' => 'seminar_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seminars'), array('controller' => 'seminars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seminar'), array('controller' => 'seminars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teach Mes'), array('controller' => 'teach_mes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teach Me'), array('controller' => 'teach_mes', 'action' => 'add')); ?> </li>
	</ul>
</div>
