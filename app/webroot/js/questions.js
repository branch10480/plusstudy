// 追加コメント表示処理
function showComment(res) {
	// 投稿者名(開催者と同じなら色を変える)
	var p;
	if(res.comment.account_id === $('input#creator_id').val()) {
		p = $('<p class="masterName" style="display:inline">').text(res.account.last_name+res.account.first_name);
	} else {
		p = $('<p class="commenterName" style="display:inline">').text(res.account.last_name+res.account.first_name);
	}
	p.fadeIn(800);
	$('div#comment').append(p);

	// タイムスタンプ
	p = $('<p class="timeStamp" style="display:inline">').text(res.comment.timestamp);
	p.fadeIn(800);
	$('div#comment').append(p);

	// 内容
	p = $('<p class="questionContent">').text(res.comment.content);
	p.fadeIn(800);
	$('div#comment').append(p);
}

// コメントが追加されていないか確認し、データを取得する
function getComment() {
	// ajax通信
	$.post(WEB_ROOT + 'Comments/get', {
			cnt: $('input#comment_cnt').val(),
			question_id: $('input#question_id').val()
		}, function(res) {
			// 追加されたコメントは無し
			if(res.result === false)
				return;

			// カウンタを増やす
			var newCnt = $('input#comment_cnt').val();
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
	$('a#add').click(function(e) {
		// aタグの動作を打ち消す
		e.preventDefault();

		// 入力フォームに何も入力されていなかったらエラー
		if($('textarea#content').val() === '') {
			return;
		}
		$('p.errMsg').text('');

		// ajax通信
		$.post(WEB_ROOT + 'Comments/add', {
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