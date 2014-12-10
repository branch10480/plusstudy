// フィードバック処理
$(function () {
	// GJボタンがクリックされたら
	$('button#gj').click(function(e) {
		// ajax通信
		$.post('/plusstudy/Seminars/gj', {
				seminar_id: $('input#seminar_id').val()
			}, function(res) {
				if(res.result == true) {
					// GJを加算
					var cnt = parseInt($('#gjcnt').text()) + 1;
					$('#gjcnt').text(cnt);
					// GJボタンを削除
					$('button#gj').remove();
				} else {
					return;
				}
		}, "json");
	});

	// 解決ボタンがクリックされたら
	$('button#resolve').click(function(e) {
		// ajax通信
		$.post('/plusstudy/Seminars/resolve', {
				teach_me_id: $('input#teach_me_id').val()
			}, function(res) {
				if(res.result == true) {
					// 解決ボタンを削除
					$('button#resolve').remove();
				} else {
					return;
				}
		}, "json");
	});
});