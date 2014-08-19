// 画像処理ライブラリ

document.onready = (function () {

	var oldFunc = document.onready || function(){};
	return function () {
		getImgOpt();
		oldFunc();
	};

})();
function getImgOpt() {
	var ImgOpt = (function () {


		// imgId : 例）.className #idName


		// private member
		var _browserH = null;
		var _browserW = null;
		var _imgElms = null;
		var _imgId = '';


		// private method
		var init = function () {
			_browserH = document.body.clientHeight;
			_browserW = document.body.clientWidth;
			_imgElms = $(_imgId);
		};
		var optimize = function () {

			_imgElms.each(function () {

				var parent = $(this).parent();
				var imgH = (this.height === null || this.height === 0) ? +$(this).height() : this.height;
				var imgW = (this.width === null || this.width === 0) ? +$(this).width() : this.width;
				var pH = +parent.height();
				var pW = +parent.width();
				var newTop = 0;
				var newLeft = 0;
				var newW = 0;
				var newH = 0;

				parent.css({
					'overflow': 'hidden',
					'position': 'relative'
				});



				if (imgW === imgH) {

					/*** 画像が正方形の場合 ***/

					// 表示領域の縦横比を調べる
					if (pW === pH) {
						newW = pW;
						newH = pH;
					} else if (pW > pH) {
						newW = pW;
						newH = imgH * pW / imgW;
						newTop = -Math.floor((newH - pH) / 2);
					} else {
						newW = imgW * pH / imgH;
						newH = pH;
						newLeft = -Math.floor((newW - pW) / 2);
					}
					/*** 画像が長方形の場合 ***/
				} else if (imgW > imgH) {
					newW = imgW * pH / imgH;
					newH = pH;
					newLeft = -Math.floor((newW - pW) / 2);
				} else {
					newW = pW;
					newH = imgH * pW / imgW;
					newTop = -Math.floor((newH - pH) / 2);
				}



				$(this).css({
					'width': newW,
					'height': newH,
				});


				$(this).css({
					'position': 'absolute',
					'top': newTop,
					'left': newLeft
				});
			});
		};


		// public member, method
		return {
			setImgId: function ( newImgId ) {
				_imgId = newImgId;
				init();
			},
			optimize: function () {
				if (_browserH === null || _browserW === null || _imgElms === null || _imgId === '') {
					alert('初期化処理 : setImgId(IMG_ID)が実行されていません');
					return;
				}
				// optimize
				optimize();
			},
		};
	})();

	// グローバル領域に格納
	window.ImgOpt = ImgOpt;
}