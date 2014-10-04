<footer>
	<div id="pagetopArArea" class="plot cf">
		<a href="#"><img id="pagetopAr" src="<?php echo IMG_PATH . 'scrollupar.png'; ?>" alt="ページトップへ"></a>
	</div>

	<div id="footerContent">
		<div class="plot">
			<nav class="cf">
				<img id="flogo" src="<?php echo IMG_PATH . 'f_logo.png'; ?>" alt="">

				<ul id="fNav" class="cf">
					<li><?php echo $this->Html->link(__('トップ'), array('controller' => 'Accounts', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('勉強会を作成'), array('controller' => 'Seminars', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('教えてほしいことを登録'), array('controller' => 'TeachMes', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('マイプロフィール'), array('controller' => 'Accounts', 'action' => 'profile','?' => array('id' => $this->Session->read('Auth.id')))); ?></li>
				</ul>
			</nav>

			<h6 id="copyright" class="plot"><img src="<?php echo IMG_PATH . 'copyright.png'; ?>" alt="&copy; plusStudy All right reserved"></h6>
		</div>
	</div>
</footer>