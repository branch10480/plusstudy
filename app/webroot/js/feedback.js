// フィードバック処理
$(function () {
	// GJボタンがクリックされたら
	$('a#gj').click(function(e) {
		// aタグの動作を打ち消す
		e.preventDefault();

		// ajax通信
		$.post('/plusstudy/Seminars/gj', {
				seminar_id: $('input#seminar_id').val()
			}, function(res) {
				if(res.result == true) {
					// GJを加算
					//var cnt = parseInt($('#gjcnt').text()) + 1;
					//$('#gjcnt').text(cnt);
					// GJボタンを削除
					$('a#gj').fadeOut(500, function() {
						$('a#gj').remove();
						});
				} else {
					return;
				}
		}, "json");
	});

	// 解決ボタンがクリックされたら
	$('a#solution').click(function(e) {
		// aタグの動作を打ち消す
		e.preventDefault();

		// ajax通信
		$.post('/plusstudy/Seminars/resolve', {
				teach_me_id: $('input#teach_me_id').val()
			}, function(res) {
				if(res.result == true) {
					// 解決ボタンを削除
					$('a#solution').fadeOut(500, function() {
						$('a#solution').remove();
						});
				} else {
					return;
				}
		}, "json");
	});
});