
<header>
	<div id="headerContent" class="cf">
		<h1 id="logo"><?php echo $this->Html->image(MB_IMG_PATH . 'logo.png', array("alt" => "plusStudy")); ?></h1>


		<?php echo $this->Html->image(MB_IMG_PATH . 'menu_btn.png', array("alt" => "メニュー", 'id' => "menu")); ?>
		<?php echo $this->Html->image(MB_IMG_PATH . 'menu_btn_on.png', array("alt" => "メニュー", 'id' => "menu_on")); ?>

	</div>
</header>

<div class="menu">
	<?php echo $this->Html->image(MB_IMG_PATH . 'menu_top.png', array("alt" => "トップ", 'url' => array('controller' => 'Accounts', 'action' => 'index'))); ?>
	<?php echo $this->Html->image(MB_IMG_PATH . 'menu_needs.png', array("alt" => "教えて欲しいことを登録", 'url' => array('controller' => 'TeachMes', 'action' => 'index'))); ?>
	<?php echo $this->Html->image(MB_IMG_PATH . 'menu_myprofile.png', array("alt" => "マイプロフィール", 'url' => array('controller' => 'Accounts', 'action' => 'profile','?' => array('id' => $this->Session->read('Auth.id'))))); ?>
	<?php echo $this->Html->image(MB_IMG_PATH . 'menu_logout.png', array("alt" => "ログアウト", 'url' => array('controller' => 'Accounts', 'action' => 'logout'))); ?>
</div>

<script>
	$(function () {
		$('#menu').click(function(event){
			event.preventDefault();
			$('.menu').css('display', 'block');
			$('#menu').css('display', 'none');
			$('#menu_on').css('display', 'block');
		});

		$('#menu_on').click(function(event){
			event.preventDefault();
			$('.menu').css('display', 'none');
			$('#menu').css('display', 'block');
			$('#menu_on').css('display', 'none');
		});
	});
</script>