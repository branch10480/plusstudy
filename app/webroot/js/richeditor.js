// richeditor.js

// -------------------------------------------------------------------------------//


//innerText をサポートしない Web ブラウザと共通で使用するための
//setText 関数を定義
function setAlter_innerText(element) {
	if (element.innerText) {
		element.setText
			= function (text) { element.innerText = text; };
	} else {
		element.setText
			= function (text) { element.textContent = text; };
	}
	return element;
}


//getElementById の短縮
var $id = function (id) { return document.getElementById(id); };


//文字が選択されているか判断
function checkSelectionText() {
	var selectionFlag = (document.getSelection().toString().length > 0);
	if (!selectionFlag) {
		alert("文字が選択されていません。\n文字を選択してください。");
	}
	return selectionFlag;
}


// -------------------------------------------------------------------------------//


/**
* Main Func
*/


//コンテンツのロードが完了したら
window.onload = function () {


	// インラインフレーム内の要素を取得、保持
	var ifElm = $id('editIF');
	ifDoc = ifElm.contentDocument;
	console.log(ifDoc);

	var editArea = ifDoc.body;
	var ritchTextHtmlArea = $id("SeminarDescription");


	ifDoc.body.innerHTML = ritchTextHtmlArea.value;


	//innerText を設定するためのメソッドを追加
	setAlter_innerText(editArea);
	setAlter_innerText(ritchTextHtmlArea);


	var tcnt = 0;
	//フォントサイズを指定するドロップダウンリストのイベントハンドラ
	$('.selectFontSize .esb-item')
		.click(function () {
			ifDoc.execCommand('fontSize', false, $(this).html());
			ifDoc.body.focus();
		});
	//フォントサイズを指定するドロップダウンリストのイベントハンドラ
	$('.selectFontColor .esb-item')
		.click(function () {
			setTimeout(function(){
			ifDoc.execCommand('ForeColor', false, $('#SeminarFontColor').val());
				}, 200);
			ifDoc.body.focus();
		});


	// //リンクを生成するボタンのイベントハンドラ
	// $id("mkLinkButton")
	// 	.addEventListener("click", function () {
	// 		if (checkSelectionText()) {
	// 			var url = $id("urlText").value;
	// 			document.execCommand("createLink", false, url);
	// 		}
	// 	});

	// //画像を挿入するボタンのイベントハンドラ
	// $id("isertImageButton")
	// 	.addEventListener("click", function () {
	// 		if (checkSelectionText()) {
	// 			var url = $id("imageUrlText").value;
	// 			document.execCommand("insertImage", false, url);
	// 		}
	// 	});

	//[太字] ボタン
	$id("bold")
		.addEventListener("click", function (event) {
			event.preventDefault();
			ifDoc.execCommand("bold", false);
			ifDoc.body.focus();
		});

	//[下線] ボタン
	$id("underline")
		.addEventListener("click", function (event) {
			event.preventDefault();
			ifDoc.execCommand("underline", false);
			ifDoc.body.focus();
		});

	//[イタリック] ボタン
	$id("italic")
		.addEventListener("click", function (event) {
			event.preventDefault();
			ifDoc.execCommand("italic", false);
			ifDoc.body.focus();
		});

	document.getElementById('submitBtn').addEventListener("click", function () {
		event.preventDefault();
		ritchTextHtmlArea.value = editArea.innerHTML;
		selectedForm = $('#SeminarIndexForm') || false;
		if (selectedForm)
			selectedForm.submit();
		else
			$('form').submit();
	});
}