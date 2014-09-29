// control.js


function Select($el) {
    this.$el = $($el);
    this.$select = this.$el.find('.select-select');
    this.select = this.$select[0];
    this.$value = this.$el.find('.select-value');

    this.$select.on('change keydown', $.proxy(this, '_onChange')).change();
}

Select.prototype._onChange = function (e) {
    setTimeout($.proxy(this, 'update'), 0);
};

Select.prototype.update = function () {
    var value = this.select.options[this.select.selectedIndex].innerText;
    this.$value.text(value);
};


$(function () {
    $('.select').each(function () {
        new Select(this);
    });
});



// $(function () {
// 	$('select').fadeOut(200).each(function () {
// 		var options = $(this).children();
// 		var elmWrapList = document.createElement('div');
// 		var selected = document.createElement('div');
// 		var select = this;
// 		elmWrapList.className = 'wrapList';
// 		selected.className = 'customSelect';
// 		selected.innerHTML = options[0].innerHTML;
// 		selected.addEventListener('click', function () { $(select).show().select(); });
// 		console.log(selected);
// 		$(this).after(selected);
// 	});
// });