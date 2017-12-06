/*************************
common.js
*************************/
(function ($) {
	/*setup*/
	var _setup = function () {
		var _idx = setInterval(function () {}, 100);
	};
	var _bind = function () {
		/*contact*/
		$('aside.contact-wrap nav a').bind('click', function (event) {
			$(this).parents('aside').toggleClass('on');
			/*
			var _aside=$(this).parents('aside');
			var _top=parseInt(_aside.css('top'));
			_top=(_top<0)?0:-200;
			_aside.animate({'top':_top+'px'},650,'easeOutExpo');
			*/
		});
		/*scroll Event시 document의 높이를 계산하여 %만큼 모션효과*/
		$(window).bind('scroll', function (event) {
			var _top = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
			$('#progressBar').css('width', _top + "%");
		});
		$('#navi>li>a').bind('click', function (event) {
			var _select = $(this).parents('li').index();
			_li.each(function (idx) {
				var _sec = $(this).find('>section');
				if (idx == _select) {
					_sec.slideDown('fast');
				}
				else {
					_sec.slideUp('fast');
				}
			});
		});
		/*모바일*/
		$('nav.mobile a.menu').bind('click', function (event) {
			var _nav = $(this).next('ul.navi');
			var _isVisible = _nav.is(':visible');
			if (!_isVisible) {
				_nav.show();
			}
			else {
				_nav.hide();
			}
		});
		/*
		$('#navi>li>a').bind('mouseenter mouseleave',function(event){
			if(event.type==="mouseenter"){
				$(this).show();
			}else if(event.type==='mouseleave'){
				$(this).hide();
			}
		});
		*/
	};
	$(document).ready(function () {
		//	_symbol();
		//	_setup();
		_bind();
	});
})($);
/*************************************************************************************************
 * @Class : ui.Tab
 * @Demo : /pages/00.guide/layout.html
 *************************************************************************************************/
(function ($, core) {
	"use strict";
	var _opts, _self;
	core.define("ui.Tab", {
		config: {
			//speed: 600,
			//easing: "easeInOutQuint"
		}
		, init: function (obj) {
			_self = this;
			this.opts = this.opts || {};
			_opts = this.opts = _opts = $.extend(null, this.config, obj);
			var _data = {};
			_opts['wrap'] = _opts['wrap'] || $('.ui-tab');
			_opts['view'] = _opts['view'] || $('.ui-tab dd');
			_opts['anchor'] = _opts['anchor'] || $('.ui-tab dt a');
			//--------- setting
			_data["class"] = "ui.Tab";
			_data["key"] = _opts["key"];
			_data["total"] = _opts["view"].length;
			_data["select"] = 0;
			//---------
			this._bind(_data);
		}
		, _bind: function (data) {
			var _data = data;
			var _w = _opts['wrap'];
			_w.on('click', _opts['anchor'].selector, function (event) {
				event.preventDefault();
				var _dl = $(this).parents('dl');
				_data.select = _dl.index();
				_dl.addClass('on').siblings('dl').removeClass('on');
				(_opts.callback != undefined) ? _opts.callback.call(this, _data): false;
			});
		}
		, end: function () {}
	});
})(jQuery, window[CORE]);