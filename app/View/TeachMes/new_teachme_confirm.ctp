
<h1>登録内容の確認</h1>
<p>以下の内容で登録します、よろしいですか？</p>

<p>ニーズタイトル<p>
<p><?php echo $title ?></p>
<p>内容</p>
<p><?php echo $content ?></p>

<div>
<?php echo $this->Html->link(__('戻る'), array('action' => 'index')); ?>
<?php echo $this->Html->link(__('登録する'), array('action' => 'register')); ?>
</div>