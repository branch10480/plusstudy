// SeminarsDetails.js

$(function () {

	$('.btnSubmitJoinCancelEdit').click(function(event) {
		event.preventDefault();
		$('#ButtonDetailsForm').submit();
	});

	//--- 質問フォーム タイトル ---
	var qTitle = $('#QuestionTitle');
	qTitle.val('質問タイトル*').css('color', '#ccc');
	qTitle.focus(function(event) {
		if ($(this).val() === '質問タイトル*') $(this).css('color', '#656565').val('');
	});
	qTitle.blur(function(event) {
		if ($(this).val() === '') $(this).css('color', '#ccc').val('質問タイトル*')
	});

	//--- 質問フォーム 内容 ---
	var qContent = $('#QuestionContent');
	qContent.val('質問内容*').css('color', '#ccc');
	qContent.focus(function(event) {
		if ($(this).val() === '質問内容*') $(this).css('color', '#656565').val('');
	});
	qContent.blur(function(event) {
		if ($(this).val() === '') $(this).css('color', '#ccc').val('質問内容*')
	});

	//--- 『質問を投稿する』ボタン押下時 ---
	$('#qSubmitBtn').click(function(event) {
		event.preventDefault();

		// バリデーションチェック
		if (!qValidate(qTitle, qContent)) return;

		// 成功時
		$('#QuestionDetailsForm').submit();
	});

});



/**
 *
 * Question Validations
 *
 */
function qValidate(title, content) {

	var result = true;
	var eQTitle = '';
	var eQContent = '';

	// バリデーションチェック
	if (title.val() === '質問タイトル*') {
		eQTitle = '何も入力されていません';
		result = false;
	} else {
		eQTitle = ''
	}
	if (content.val() === '質問内容*') {
		eQContent = '何も入力されていません';
		result = false;
	} else {
		eQContent = '';
	}

	// エラー文表示処理
	$('#eQTitle').html(eQTitle);
	$('#eQContent').html(eQContent);

	return result;
}