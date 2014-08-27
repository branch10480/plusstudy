// SeminarsIndex.js

//*****************************************************************************
//
// main
//
//*****************************************************************************
$(function () {

	//----- セミナー画像一覧取得 -----
	getSmnImgs();

	//----- モーダルウィンドウ設定処理 -----
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

		// 画像が選択されているかチェック
		if ($('#imgFile').val() === '') {
			alert('画像が選択されていません');
			return;
		}

		var callbacks_ = {
				'begin'   : function(){},
				'success' : function(data){
					if (data[0] ==='true') {
						alert('画像アップロード完了！');
						getSmnImgs();
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
	$('#smnImgReset').click((function(){
		var coverImg = $('#coverImg');
		var smnImgId = $('#SeminarSeminarImgId');
		return function(event){
			event.preventDefault();
			coverImg.html('');
			smnImgId.val('');
		};
	})());


	//----- ページング処理登録 -----
	window.disp = (function(){

		//--- メンバ ---
		var page = 1;
		var dispNo = 2;					// 1ページに表示する数
		var data = null;
		var maxPage = 1;
		var myImgs = null;
		var pagingInfo = null;
		var storage = null;

		//--- 処理 ---
		return function ( dataArr, preOrNxt ) {

			if (arguments[0] !== null) data = dataArr;
			// 前のページ、もしくは次のページに移る場合の処理
			if (arguments[1]) {
				if (preOrNxt === 'pre') {
					// 前ページに進む処理
					if (page-1 < 1)
						page = maxPage;
					else
						page--;
				} else if (preOrNxt === 'nxt') {
					// 次ページに進む処理
					if (page+1 > maxPage)
						page = 1;
					else
						page++;
				}
			}
			maxPage = Math.floor((data.length - 1)/dispNo) + 1;

			// 要素をキャッシュ
			if (myImgs === null) myImgs = $('#myImgs');
			if (pagingInfo === null) pagingInfo = $('#pagingNav .info');
			if (storage === null) storage = $('#storage');

			var dispCnt = 0;
			var dataNo = 0;					// 表示する配列の添え字

			// モーダルウィンドウ内出力データ整形
			var outStr = '';
			for (dataNo = (page-1)*dispNo; dataNo<data.length; dataNo++) {
				dispCnt++;
				if (dispCnt > dispNo) break;
				outStr += '<li><a class="delBtn" onclick="delSmnImg(event)" href="#">×</a><img class="smnImg" onload="optim();" onclick="selectImg(event)" src="' + WEB_ROOT + 'img/seminar/' + data[dataNo]['SeminarImage']['id'] + data[dataNo]['SeminarImage']['ext'] + '" alt="' + data[dataNo]['SeminarImage']['description'] + '" width="' + data[dataNo]['SeminarImage']['width'] + '" height="' + data[dataNo]['SeminarImage']['height'] + '" /><input type="hidden" value="' + data[dataNo]['SeminarImage']['id'] + data[dataNo]['SeminarImage']['ext'] + '" /></li>';
			}

			// 画像出力
			myImgs.html(outStr);

			// ページング情報部更新
			pagingInfo.html(page + ' / ' + maxPage);

			// 使用容量更新
			var mydatasize = 0;
			for (var i=0; i<data.length; i++) {
				mydatasize = mydatasize + +data[i]['SeminarImage']['size'];
			}
			storage.html(sprintf('%.3f', mydatasize/(1024*1024)) + 'MB / 50MB');

		};
	})();
	$('#pagingNav li .pre').click(function(event) {
		event.preventDefault();
		disp(null, 'pre');
	});
	$('#pagingNav li .nxt').click(function(event) {
		event.preventDefault();
		disp(null, 'nxt');
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

function delSmnImg(event) {
	// alert($(event.target).parent().find('input').val());
	if (!window.confirm('この写真を削除します。よろしいですか？')) return;

	//----- 削除処理 -----
	$.ajax({
		url: WEB_ROOT + 'SeminarImages/delSmnImgs/' + $(event.target).parent().find('input').val(),
		type: 'POST',
		dataType: 'json',
	})
	.done(function(data) {
		console.log(data);

		// 画像データの再取得&表示
		getSmnImgs();

	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

}