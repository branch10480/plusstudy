// modalWin.js

jQuery.setModalWin = (function () {
	return function ( idOrClass ) {
		var args = arguments;
		var devWidth = window.innerWidth;
		var devHeight = window.innerHeight;
		var modalWin = $('.modal');
		var init = function () {
			modalWin.css({
				'position': 'fixed',
				'top': 0,
				'left': 0,
				'background': '#ddd',
				'width': devWidth,
				'height': devHeight,
				'z-index': 100,
			}).hide();
		}

		// setting
		var fadeInTime = 300;
		var fadeOutTime = 200;

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