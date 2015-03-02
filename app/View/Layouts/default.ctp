<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo SITE_NAME; ?>
	</title>
	<script src="<?php echo ROOT_URL.'Configs/'; ?>"></script>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			// 'cake.generic',
			'normalize',
			'common',
			));
		echo $this->Html->script(array(
			'jquery-1.11.1.min.js',
			'jquery.cookie.js',
			'sprintf.js',
			'common',
			'modalWin.js',
			'imgopt.js',
			'scripts.js',
			));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="wrap">
		<?php echo $this->element('header'); ?>

		<div id="container">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<?php echo $this->element('footer'); ?>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
