<header>
	<div id="headerContent" class="plot cf">
		<h1 id="logo"><?php echo $this->Html->image(IMG_PATH . 'logo.png', array("alt" => "plusStudy", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?></h1>

		<nav id="hNav">
			<ul class="cf">
				<li class="hNavst1"><?php echo $this->Html->image(IMG_PATH . 'top_btn.png', array("alt" => "トップ", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?></li>
				<li class="hNavst1"><?php echo $this->Html->image(IMG_PATH . 'createseminar_btn.png', array("alt" => "勉強会を作成", 'url' => array('controller' => 'Seminars', 'action' => 'index'))); ?></li>
				<li class="hNavst1"><?php echo $this->Html->image(IMG_PATH . 'create_needs_btn.png', array("alt" => "教えて欲しいことを登録", 'url' => array('controller' => 'TeachMes', 'action' => 'index'))); ?></li>
				<li class="hNavMyprof"><?php echo $this->Html->image(IMG_PATH . 'profile/2.jpg', array("alt" => "マイプロフィール", 'url' => array('controller' => 'Accounts', 'action' => 'profile','?' => array('id' => $this->Session->read('Auth.id'))))); ?></li>
				<li class="hNavst2"><?php echo $this->Html->image(IMG_PATH . 'logout_btn.png', array("alt" => "ログアウト", 'url' => array('controller' => 'Accounts', 'action' => 'logout'))); ?></li>
			</ul>
		</nav>
	</div>
</header>


