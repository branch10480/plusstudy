<header>
	<div id="headerContent" class="plot cf">
		<h1 id="logo"><?php echo $this->Html->image(IMG_PATH . 'logo.png', array("alt" => "plusStudy", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?></h1>

		<nav id="hNav">
			<ul class="cf">
				<li class="hNavst1"><?php echo $this->Html->link(__('ホーム'), array('controller' => 'Accounts', 'action' => 'index')); ?></li>
				<li class="hNavst1"><?php echo $this->Html->link(__('勉強会を作成'), array('controller' => 'Seminars', 'action' => 'index')); ?></li>
				<li class="hNavst1"><?php echo $this->Html->link(__('教えてほしいことを登録'), array('controller' => 'TeachMes', 'action' => 'index')); ?></li>
				<li class="hNavMyprof cf">
				<?php echo $this->Html->link($this->Html->image(IMG_PATH . $this->Session->check('Auth.profImg') ? $this->Session->read('Auth.profImg') : NO_IMG_URL, array("alt" => "マイプロフィール") . '<span id="name">' . $this->Session->read('Auth.last_name') == null ? '':$this->Session->read('Auth.last_name') . ' ' . $this->Session->read('Auth.first_name') == null ? '':$this->Session->read('Auth.first_name') . '</span>', array('controller' => 'Account', 'action' => 'profile', '?' => array('id' => $this->Session->read('Auth.id'))))); ?>
				<li class="hNavst2"><?php echo $this->Html->image(IMG_PATH . 'logout_btn.png', array("alt" => "ログアウト", 'url' => array('controller' => 'Accounts', 'action' => 'logout'))); ?></li>
			</ul>
		</nav>
	</div>
</header>


