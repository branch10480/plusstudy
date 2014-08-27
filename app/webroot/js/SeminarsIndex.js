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


	//----- ページング処理登録 -----
	window.disp = (function( dataArr ){

		if (!!dataArr) return;

		//--- メンバ ---
		var page = 1;
		var data = dataArr;

		//--- 処理 ---
		return function () {
			// 処理
			var dispCnt = 0;
			var dataNo = (page-1)*10;					// 表示する配列の添え字

			// モーダルウィンドウ内出力データ整形
			var outStr = '';
			for (var i=startNo; i<data.length; dataNo++) {
				if (dispCnt > 10) break;
				outStr += '<li><img class="smnImg" onload="optim();" onclick="selectImg(event)" src="' + WEB_ROOT + 'img/seminar/' + data[dataNo]['SeminarImage']['id'] + data[dataNo]['SeminarImage']['ext'] + '" alt="' + data[dataNo]['SeminarImage']['description'] + '" width="' + data[dataNo]['SeminarImage']['width'] + '" height="' + data[dataNo]['SeminarImage']['height'] + '" /></li>';

				dispCnt++;
			}

			// 画像出力
			$('#myImgs').html(outStr);
		};
	})();

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

		// 出力
		disp( data );

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