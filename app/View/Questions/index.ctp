<div>
	<p><b>勉強会タイトル</b></p>
	<p><?php echo $question['Seminar']['name'] ?></p>
	<?php echo $this->Form->hidden('creator_id', array('value' => $question['Seminar']['account_id'], 'id' => 'creator_id')); ?>
	<?php echo $this->Form->hidden('comment_cnt', array('value' =>  count($comments) ,'id' => 'comment_cnt')); ?>
	<br>

	<p>Debug 投稿者の名前の色が変わる</p>
	<p>赤：勉強会作成者　青：それ以外</p>
	<br>

	<p><b><?php echo $question['Question']['title']; ?></p></b>
	<p style="color:blue"><?php echo $question['Account']['last_name'] . $question['Account']['first_name']; ?></p>
	<p><?php echo $question['Question']['timestamp']; ?></p>

	<p><?php echo $question['Question']['content']; ?></p>
	<hr>
</div>

<div class="comment">
	<?php foreach($comments as $comment): ?>

		<?php if($question['Seminar']['account_id'] === $comment['Comment']['account_id']): ?>
			<p style="color:red"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>

		<?php else: ?>
			<p style="color:blue"><?php echo $comment['Account']['last_name'] . $comment['Account']['first_name']; ?></p>
		<?php endif; ?>

		<p><?php echo $comment['Comment']['timestamp']; ?></p>
		<p><?php echo $comment['Comment']['content']; ?></p>
	<?php endforeach; ?>
</div>
<br>

<?php echo $this->Form->create('Comment'); ?>
<div>
	<?php echo $this->Form->hidden('question_id', array('value' => $question['Question']['id'], 'id' => 'question_id')); ?>

	<?php echo $this->Form->textarea('content', array('id' => 'content')); ?>
	<p class="errMsg"></p>
	<?php echo $this->Form->button('コメントする', array('type' => 'button', 'id' => 'add')); ?>
</div>
<?php echo $this->Form->end(); ?>
<hr>

<p><?php echo $this->Html->link('勉強会の詳細へ戻る', array(
	'controller' => 'Seminars' ,
 	'action' => 'details',
 	'?' => array('id' => $question['Seminar']['id'])
 	)); ?></p>
<br>


<script>
// 追加コメント表示処理
function showComment(res) {
	// 投稿者名(開催者と同じなら色を変える)
	var p;
	if(res.comment.account_id === $('input#creator_id').val()) {
		p = $('<p>').text(res.account.last_name+res.account.first_name).css('color', 'red');
	} else {
		p = $('<p>').text(res.account.last_name+res.account.first_name).css('color', 'blue');
	}
	p.fadeIn(800);
	$('div.comment').append(p);

	// タイムスタンプ
	p = $('<p>').text(res.comment.timestamp);
	p.fadeIn(800);
	$('div.comment').append(p);

	// 内容
	p = $('<p>').text(res.comment.content);
	p.fadeIn(800);
	$('div.comment').append(p);
}

// コメントが追加されていないか確認し、データを取得する
var newCnt = $('input#comment_cnt').val();
function getComment() {
	// ajax通信
	$.post('/plusstudy/Comments/get', {
			cnt: $('input#comment_cnt').val(),
			question_id: $('input#question_id').val()
		}, function(res) {
			// 追加されたコメントは無し
			if(res.result === false)
				return;

			// カウンタを増やす
			newCnt ++;
			$('input#comment_cnt').val(newCnt);

			// 新しいコメントを表示
			showComment(res);
	}, "json");
}

// 一定時間ごとにコメントの更新を呼ぶ
function updateComment() {
	getComment();
    setTimeout(function() {
         updateComment();
    }, 5000);
}
updateComment();

// コメント送信処理
$(function () {
	// コメントボタンがクリックされたら
	$('button#add').click(function(e) {
		// 入力フォームに何も入力されていなかったらエラー
		if($('textarea#content').val() === '') {
			$('p.errMsg').text('何か入力してくだしあ');
			return;
		}
		$('p.errMsg').text('');

		// ajax通信
		$.post('/plusstudy/Comments/add', {
				content: $('textarea#content').val(),
				question_id: $('input#question_id').val()
			}, function(res) {
				// 入力フォームをクリア
				$('textarea#content').val('');
				// 追加したコメントを取得しにいく
				getComment();
		}, "json");
	});
});

</script>