
<dl>
	<dt>登録用メールアドレス（非公開）</dt>
	<dd><?php echo $acc['mailaddress']; ?></dd>
	<dt>氏名</dt>
	<dd><?php echo $acc['last_name']; ?> <?php echo $acc['first_name']; ?></dd>
	<dt>氏名（カナ）</dt>
	<dd><?php echo $acc['last_ruby']; ?> <?php echo $acc['first_ruby']; ?></dd>
	<dt>コース</dt>
	<dd><?php echo +$acc['course'] === 2 ? '2年制課程' : '4年制課程'; ?></dd>
	<dt>パスワード</dt>
	<dd><?php for ($i=0; $i<mb_strlen($acc['passwd']); $i++) { echo '*'; } ?></dd>
	<dt>学年</dt>
	<dd><?php echo $acc['grade']; ?> 年</dd>
	<dt>学科</dt>
	<dd><?php echo $acc['subject']; ?> 学科</dd>
	<dt>資格</dt>
	<dd><?php echo $acc['licenses']; ?></dd>
	<dt>スキル</dt>
	<dd><?php echo $acc['skill']; ?></dd>
	<dt>facebook</dt>
	<dd><?php echo $acc['facebook']; ?></dd>
	<dt>twitter</dt>
	<dd><?php echo $acc['twitter']; ?></dd>
	<dt>メールアドレス（公開用）</dt>
	<dd><?php echo $acc['pub_mailaddress']; ?></dd>
	<dt>自己PR（200字以内）</dt>
	<dd><?php echo $acc['description']; ?></dd>
</dl>
<a href="<?php echo ROOT_URL . 'Accounts/input/'; ?>">戻る</a>
<a href="<?php echo ROOT_URL . 'Accounts/inputComp/'; ?>">登録する</a>
