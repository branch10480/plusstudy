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
 * @package       app.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
お客様が参加予定の勉強会が中止になりました。

■■■　中止になった勉強会　■■■
勉強会名：　<?php echo $sem_name."\r\n"; ?>
主催者　：　<?php echo $host."\r\n"; ?>
時間　　：　<?php echo $date."\r\n"; ?>
場所　　：　<?php echo $place; ?>

※ 以下、主催者からのメッセージです。

==============================

<?php echo $suspend_dsc."\r\n"; ?>

==============================

<?php echo SIGNATURE; ?>