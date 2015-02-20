//************************************************************************
//
// フォームをajax送信（ファイルアップロード対応）
//
//************************************************************************
function ajax_submit(form_, callbacks_) {
	// フォームの指定が無ければ即時返却
	if( $.trim( form_ ).length <= 0 ) return;

	// コールバックのデフォルト値を設定
	var defaults = {
	 'begin'   : function(){},
	 'success'  : function(){},
	 'error'   : function(){},
	 'complete'  : function(){}
	};
	// デフォルト値とマージ
	var callbacks = $.extend( defaults, callbacks_ );

	// 開始コールバックを起動
	callbacks['begin']();

	// フォームオブジェクトを取得
	var $form_obj  = $(form_);

	// フォームのデータを元にFormDataオブジェクトを作成
	var form_data  = new FormData( $form_obj[0] );

	// フォームのアクションを取得
	var action   = $form_obj.attr("action");

	// フォームのメソッドを取得
	var method   = $form_obj.attr("method");

	// 非同期通信
	$.ajax({
		url   : action,
		type  : method,
		processData : false,
		contentType : false,
		data  : form_data,
		enctype  : 'multipart/form-data',
		dataType : 'Json',
		success: function( result ){
			// 成功コールバックを起動
			callbacks['success'](result);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
		 // 失敗コールバックを起動
		 callbacks['error'](XMLHttpRequest, textStatus, errorThrown);
		},
		complete : function( result ){
		 // 完了コールバックを起動
		 callbacks['complete'](result);
		}
	});
}
$(function () {
	// 連打防止
	/*
	var resetTimer = null;
	$.cookie('searchFlag', 'true');
	$('a').not('rh').click(function(event) {
		if ($.cookie('searchFlag') === 'false') {
			event.preventDefault();
			alert('連打は禁止されています。');
			resetTimer = setTimeout($.cookie('searchFlag', 'true'), 300);
		} else {
			$.cookie('searchFlag', 'false');
		}
	});
	*/
});