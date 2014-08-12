<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		// 'richeditor',
		// 'BeatPicker',
		), array('inline' => false));
	$this->Html->css(array(
		'BeatPicker',
		), null, array('inline' => false));
?>


<h1>登録内容の確認</h1>
<p>以下の内容で登録します、よろしいですか？</p>

<dl>
	<dt>セミナーカバー画像</dt>
	<dd></dd>
	<dt>セミナー名称</dt>
	<dd><?php echo $smnName; ?></dd>
	<dt>開催場所</dt>
	<dd><?php echo $place; ?></dd>
	<dt>参加人数上限</dt>
	<dd>
		<?php echo +$upperLimit === 0 ? '制限なし' : $upperLimit . '人まで'; ?>
	</dd>
	<dt>開催日</dt>
	<dd><?php echo $startDate; ?></dd>
	<dt>開始時間</dt>
	<dd>
	<?php echo $startH . '時' . $startM . '分'; ?>
	</dd>
	<dt>終了時間</dt>
	<dd>
	<?php echo $endH . '時' . $endM . '分'; ?>
	</dd>
	<dt>予約締切日時</dt>
	<dd>
	<?php echo $rsvLimitDate; ?>
	<?php echo $rsvLimitH . '時' . $rsvLimitM . '分'; ?>
	</dd>
	<dt>セミナー詳細</dt>
	<dd>
		<?php echo $dsc; ?>
	</dd>
</dl>


<?php echo $this->Html->link(__('戻る'), array('action' => 'index')); ?>