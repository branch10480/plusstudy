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
勉強会の参加申し込みを受け付けました。
勉強会内容の詳細は下記の通りです。


---------------------------
勉強会名：　<?php echo $sem_name; ?>
主催者　：　<?php echo $host; ?>
時間　　：　<?php echo $date; ?>
場所　　：　<?php echo $place; ?>
---------------------------




<?php echo SIGNATURE; ?>