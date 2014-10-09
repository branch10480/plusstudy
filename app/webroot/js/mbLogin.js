$(function(){

	$(".tab li").click(function(){
		var index = $(this).parent("ul").children("li").index(this);
		$(this).siblings("li").removeClass("active");
		$(this).addClass("active");
		$(this).parent("ul").nextAll(".panel").hide();
		$(this).parent("ul").nextAll(".panel").eq(index).show();
	});

	// var handler = $('ul#nav li a');
	// var url = document.URL;
	// var urlId = url.substr(url.lastIndexOf('#'));
	// var urlIdJudgment = urlId.lastIndexOf('#');
	// $('ul#nav').each(function(){
	// 	$('#tab-box > div:first').show();
	// 		var imgSrc = $('ul#nav li:first img').attr('src');
	// 		var imgDot = imgSrc.lastIndexOf('.');
	// 		var onSrc = imgSrc.substr(0, imgDot) + '_o' + imgSrc.substr(imgDot, 4);
	// 		$('ul#nav li:first img').attr('src',onSrc).addClass('tab-on');
	// });
	// // クリック時の動作
	// handler.click(function() {
	// 	// クリックしたタブ画像をオンの状態に
	// 	var imgSrc = $(this).children('img').attr('src').replace(/_o/g, "");
	// 	var imgDot = imgSrc.lastIndexOf('.');
	// 	var onSrc = imgSrc.substr(0, imgDot) + '_o' + imgSrc.substr(imgDot, 4);
	// 	$(this).children('img').attr('src',onSrc);
	// 	// タブ画像の切り替え
	// 	var imgOff = $('ul#nav li img.tab-on').attr('src').replace(/_o/g, "");
	// 	$('ul#nav li img.tab-on').attr('src',imgOff);
	// 	$('ul#nav li img').removeClass('tab-on');
	// 	$(this).children('img').addClass('tab-on');
	// 	// コンテンツの切り替え
	// 	var clickAttr = $(this).attr('href');
	// 	var showAttr = '#' + $('#tab-box > div:visible').attr('id');
	// 	if(clickAttr !== showAttr) {
	// 		$('#tab-box > div:visible').hide();
	// 		var showDiv = '#tab-box div' + clickAttr;
	// 		$(showDiv).show();
	// 		return false;
	// 	}
	// 	else {
	// 		// 何度もクリックした場合もタブ画像をオンの状態に
	// 		var imgSrc = $(this).children('img').attr('src').replace(/_o/g, "");
	// 		var imgDot = imgSrc.lastIndexOf('.');
	// 		var onSrc = imgSrc.substr(0, imgDot) + '_o' + imgSrc.substr(imgDot, 4);
	// 		$(this).children('img').attr('src',onSrc);
	// 		return false;
	// 	}
	// });

});

