// SeminarsIndex.js

//*****************************************************************************
//
// main
//
//*****************************************************************************

//----- 画像反映時のブラウザ無効化処理 -----
alterProfImgName = (function() {

	var no = 1;

	return function (data) {

		console.log(data);

		// プロフィール画像の変更を画面に反映
		$('#profileImg').attr('src', PROF_IMG_PATH + $('#accountId').val() + '.' + data[2] + '?' + no++);
	}
})();


$(function () {

	//----- 画像アップロード -----
	$('#profile_img').change(function(event) {
		$('#ImgUpForm').submit();
	});
	$('#ImgUpForm').submit(function(event) {
		event.preventDefault();

		// 画像が選択されているかチェック
		if ($('#profile_img').val() === '') {
			alert('画像が選択されていません');
			return;
		}

		var callbacks_ = {
				'begin'   : function(){},
				'success' : function(data){
					if (data[0] ==='true') {
						alert('画像アップロード完了！');

						// アップロードを画面に反映
						alterProfImgName(data);


					} else {
						alert(data[1]);
					}
				},
				'error'   : function(){},
				'complete': function(){},
		};
		ajax_submit($(this), callbacks_);
	});

	//----- セミナー画像リセットボタン -----
	$('#delProfImg').click((function(){
		var profileImg = $('#profileImg');
		return function(event){
			event.preventDefault();
			if (!window.confirm('この写真を削除します。よろしいですか？')) return;
			profileImg.attr('src', NO_IMG_URL);
			$.ajax({
				url: WEB_ROOT + 'Accounts/deleteProfImg/',
				type: 'HTTP',
				dataType: 'json',
				// data: {param1: 'value1'},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		};
	})());

});



//*****************************************************************************
//
// Declaration Area
//
//*****************************************************************************
// function selectImg(event) {
// 	switch (window.selectImgType) {
// 		case 0:
// 			// カバー画像を選択
// 			var coverImgDispArea = document.getElementById('coverImg');
// 			var coverImg = document.createElement('img');
// 			coverImg.src = event.target.src;
// 			// coverImgDispArea.removeChild(coverImgDispArea.childNodes[0]);
// 			// console.log(coverImgDispArea.childNodes);
// 			// coverImgDispArea.appendChild(coverImg);
// 			$('#coverImg').html('').append(coverImg);
// 			$('#SeminarSeminarImgId').val(event.target.src);
// 			$.closeModalWin();
// 			break;

// 		case 1:
// 			// リッチエディタに画像挿入処理
// 			var newImg = document.createElement('img');
// 			newImg.src = event.target.src;
// 			document.getElementById('editArea').appendChild(newImg);
// 			$.closeModalWin();
// 			break;

// 		default:
// 			break;
// 	}
// }

// function getProfImg() {
// 	$.ajax({
// 		url: WEB_ROOT + 'SeminarImages/getSmnImgs/' + $('#accId').val(),
// 		type: 'POST',
// 		dataType: 'json',
// 	})
// 	.done(function(data) {
// 		console.log(data);

// 		// 出力
// 		disp( data );

// 	})
// 	.fail(function() {
// 		console.log("error");
// 	})
// 	.always(function() {
// 		console.log("complete");
// 	});
// }

// // function optim() {
// // 	ImgOpt.setImgId('.smnImg');
// // 	ImgOpt.optimize();
// // }