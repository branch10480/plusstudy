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
	var editArea = $id("editArea");
	var ritchTextHtmlArea = $id("SeminarDescription");

	//innerText を設定するためのメソッドを追加
	setAlter_innerText(editArea);
	setAlter_innerText(ritchTextHtmlArea);


	//フォントサイズを指定するドロップダウンリストのイベントハンドラ
	$id("SeminarFontsize")
		.addEventListener("change", function () {
			if (checkSelectionText()) {
				document.execCommand('fontSize', false, this.value);
			}
		});

	//フォントカラーを指定するドロップダウンリストのイベントハンドラ
	$id("SeminarFontColor")
		.addEventListener("change", function () {
			if (checkSelectionText()) {
				document.execCommand('ForeColor', false, this.value);
			}
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
			if (checkSelectionText()) {
				document.execCommand("bold", false);
			}
		});

	//[下線] ボタン
	$id("underline")
		.addEventListener("click", function (event) {
			event.preventDefault();
			if (checkSelectionText()) {
				document.execCommand("underline", false);
			}
		});

	//[イタリック] ボタン
	$id("italic")
		.addEventListener("click", function (event) {
			event.preventDefault();
			if (checkSelectionText()) {
				document.execCommand("italic", false);
			}
		});

	document.getElementById('submitBtn').addEventListener("click", function () {
		ritchTextHtmlArea.value = editArea.innerHTML;
	});
}