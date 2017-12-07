(function($,core) {
	var _opts, _vars, _self;
	core.define("ui.Accordion", {
		config : {
			speed : 600,
			easing : "easeInOutQuint"
		},
		init : function(obj) {
			_self = this;
			this.opts = this.opts || {};
			this.opts = _opts = $.extend(null, this.config, obj);
			_opts['container'] = (_opts['container'] == undefined) ? $('.ui-accordion') : _opts['container'];
			_opts['item'] = (_opts['item'] == undefined) ? '.ui-item' : _opts['item'];
			_opts['max'] = (_opts['item'] == undefined) ? 400 : parseInt(_opts['max']);
			_opts['min'] = (_opts['item'] == undefined) ? 100 : parseInt(_opts['min']);
			this.item = _opts['container'].find(_opts['item']);
			this._bind();
		},
		_bind : function() {
			var _self = this;
			var _opts = this.opts;
			var _container = _opts['container'];
			_container.on('click mouseenter', _opts['item'], function(event) {
				event.preventDefault();
				var _idx = $(this).index();
				if (event.type == 'click') {
					_self.display(_idx);
					(_opts.callback != undefined) ? _opts.callback.call(this, _opts) : false;
				}
			});
		},
		display : function(select) {
			this.item.each(function(idx) {
				var _this = $(this);
				var _val = (idx == select) ? _opts['max'] : _opts['min'];
				_this.stop().animate({
					'width' : _val
				}, _opts['speed'], _opts['easing'], function() {
					// 화면트랜지션이 끝날때
				});
			});
		}
	});
})(jQuery, window[CORE]);
