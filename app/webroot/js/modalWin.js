// modalWin.js

jQuery.setModalWin = (function () {
	return function ( idOrClass ) {

		var args = arguments;
		var devWidth = window.innerWidth;
		var devHeight = window.innerHeight;
		var modalWin = $('.modal');
		var conArea = $('.modal .wrapper');
		var bgArea = $('.modal .bg');
		var topMargin = 60;
		var fadeInTime = 300;
		var fadeOutTime = 50;


		var init = function () {
			modalWin.css({
				'position': 'fixed',
				'top': 0,
				'left': 0,
				'background': 'rgba(20, 50, 54, 0.8)',
				'width': devWidth,
				'height': devHeight,
				'z-index': 100,
			}).hide();
			conArea.css({
					// 'top': topMargin + 'px',
					'padding-top': topMargin + 'px',
					'left': (devWidth - conArea.width()) / 2 + 'px',
				});
		};


		/*-- Windowのリサイズ時の位置調整 --*/
		$(window).load(function() {
			$(window).resize(function(event) {
				devWidth = window.innerWidth;
				devHeight = window.innerHeight;
				conArea.css({
					// 'top': topMargin + 'px',
					'left': (devWidth - conArea.width()) / 2 + 'px',
				});
				modalWin.css({
					'width': devWidth,
					'height': devHeight,
				});
				bgArea.css({
					'width': devWidth,
					'height': devHeight,
				});
			});
		});


		// ---------------------------------------------------------

		init();

		for (var i=0; i<args.length; i++) {
			$(args[i]).click(function(event) {
				event.preventDefault();
				modalWin.fadeTo(fadeInTime, 1);
			});
		}

		$('.modalWinCloseBtn').click(function(event) {
			event.preventDefault();
			modalWin.fadeOut(fadeOutTime);
		});
	}
})();
jQuery.closeModalWin = (function () {
	return function ( modalId ) {
		var Id = modalId || '.modal';
		$(Id).fadeOut(300);
	}
})();