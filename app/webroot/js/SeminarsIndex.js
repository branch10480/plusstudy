// SeminarsIndex.js

//*****************************************************************************
//
// main
//
//*****************************************************************************
$(function () {
	getSmnImgs();
	$.setModalWin('#selectImgsBtn', '#insertImg');

	document.getElementById('selectImgsBtn').addEventListener("click", function () {
		window.selectImgType = 0;
	});
	document.getElementById('insertImg').addEventListener("click", function () {
		window.selectImgType = 1;
	});

	//----- 画像アップロード -----
	$('#imgUpForm').submit(function(event) {
		event.preventDefault();
		var callbacks_ = {
				'begin'   : function(){},
				'success' : function(){
					alert('画像アップロード完了！');
					getSmnImgs();
				},
				'error'   : function(){},
				'complete': function(){},
		};
		ajax_submit($(this), callbacks_);
	});

});



//*****************************************************************************
//
// Declaration Area
//
//*****************************************************************************
function selectImg(event) {
	switch (window.selectImgType) {
		case 0:
			// カバー画像を選択
			var coverImgDispArea = document.getElementById('coverImg');
			var coverImg = document.createElement('img');
			coverImg.src = event.target.src;
			// coverImgDispArea.removeChild(coverImgDispArea.childNodes[0]);
			// console.log(coverImgDispArea.childNodes);
			// coverImgDispArea.appendChild(coverImg);
			$('#coverImg').html('').append(coverImg);
			$('#SeminarSeminarImgId').val(event.target.src);
			$.closeModalWin();
			break;

		case 1:
			// リッチエディタに画像挿入処理
			var newImg = document.createElement('img');
			newImg.src = event.target.src;
			document.getElementById('editArea').appendChild(newImg);
			$.closeModalWin();
			break;

		default:
			break;
	}
}

function getSmnImgs() {
	$.ajax({
		url: WEB_ROOT + 'SeminarImages/getSmnImgs/' + $('#accId').val(),
		type: 'POST',
		dataType: 'json',
	})
	.done(function(data) {
		console.log(data);

		// モーダルウィンドウ内出力データ整形
		var outStr = '';
		for (var i=0; i<data.length; i++) {
			outStr += '<li><img class="smnImg" onload="optim();" onclick="selectImg(event)" src="' + WEB_ROOT + 'img/seminar/' + data[i]['SeminarImage']['id'] + data[i]['SeminarImage']['ext'] + '" alt="' + data[i]['SeminarImage']['description'] + '" width="' + data[i]['SeminarImage']['width'] + '" height="' + data[i]['SeminarImage']['height'] + '" /></li>';
		}

		// 画像出力
		$('#myImgs').html(outStr);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

function optim() {
	ImgOpt.setImgId('.smnImg');
	ImgOpt.optimize();
}