/**
 * @author yeshtml5@gmail.com
 * @since 수정일(2016.01.04)
 * @class core.js
 * @description
 * namespace 및 Class 가이드를 잡아주는 Core Class
 */
//##### namespace  / define
window.CORE = "core";
(function ($) {
	"use strict";
	var core = window[CORE] = window[CORE] || {};
	/**
	 * @function
	 * @name namespace
	 * @param { string } name  네임스페이스
	 * @param { object } obj 생성된 Class
	 */
	core.namespace = function (name, obj) {
		obj || (obj = {});
		if (typeof name !== 'string') {
			obj && (name = obj);
			return name;
		}
		var root = window
			, part, parts = name.split('.')
			, total = parts.length - 1
			, className = parts[total];
		for (var i = 0; i < total; i++) {
			part = parts[i];
			root = root[part] || (root[part] = {});
		}
		obj && (root[className] = obj);
		return root[className];
	};
	/**
	 * @function
	 * @name define
	 * @param { string } name  네임스페이스
	 * @param { object } opt 추가 옵션값들
	 */
	core.define = function (name, opt) {
		var Class = function (obj) {
			if (this.init) {
				this.init.apply(this, arguments);
				// Class 생성되면 init();  기본호출
			}
		};
		(Class.getAttribute = function (obj) {
			obj = obj || {};
			for (var prop in obj) {
				Class.prototype[prop] = obj[prop];
			}
			return Class;
		})(opt);
		//	Class.superclass = Parent.prototype;
		//	Class.prototype = new Parent();
		Class.prototype.constructor = Class;
		return core.namespace(name, Class);
	};
})($);
//##### Jquery Easing
(function () {
	/*
	 <option>linear</option>
	 <option>swing</option>
	 <option>jswing</option>
	 <option>easeInQuad</option>
	 <option>easeInCubic</option>
	 <option>easeInQuart</option>
	 <option>easeInQuint</option>
	 <option>easeInSine</option>
	 <option>easeInExpo</option>
	 <option>easeInCirc</option>
	 <option>easeInElastic</option>
	 <option>easeInBack</option>
	 <option>easeInBounce</option>
	 <option>easeOutQuad</option>
	 <option>easeOutCubic</option>
	 <option>easeOutQuart</option>
	 <option>easeOutQuint</option>
	 <option>easeOutSine</option>
	 <option>easeOutExpo</option>
	 <option>easeOutCirc</option>
	 <option>easeOutElastic</option>
	 <option>easeOutBack</option>
	 <option>easeOutBounce</option>
	 <option>easeInOutQuad</option>
	 <option>easeInOutCubic</option>
	 <option>easeInOutQuart</option>
	 <option>easeInOutQuint</option>
	 <option>easeInOutSine</option>
	 <option>easeInOutExpo</option>
	 <option>easeInOutCirc</option>
	 <option>easeInOutElastic</option>
	 <option>easeInOutBack</option>
	 <option>easeInOutBounce</option>
	 */
	jQuery.easing['jswing'] = jQuery.easing['swing'];
	jQuery.extend(jQuery.easing, {
		def: 'easeOutQuad'
		, swing: function (x, t, b, c, d) {
			//alert(jQuery.easing.default);
			return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
		}
		, easeInQuad: function (x, t, b, c, d) {
			return c * (t /= d) * t + b;
		}
		, easeOutQuad: function (x, t, b, c, d) {
			return -c * (t /= d) * (t - 2) + b;
		}
		, easeInOutQuad: function (x, t, b, c, d) {
			if ((t /= d / 2) < 1) return c / 2 * t * t + b;
			return -c / 2 * ((--t) * (t - 2) - 1) + b;
		}
		, easeInCubic: function (x, t, b, c, d) {
			return c * (t /= d) * t * t + b;
		}
		, easeOutCubic: function (x, t, b, c, d) {
			return c * ((t = t / d - 1) * t * t + 1) + b;
		}
		, easeInOutCubic: function (x, t, b, c, d) {
			if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
			return c / 2 * ((t -= 2) * t * t + 2) + b;
		}
		, easeInQuart: function (x, t, b, c, d) {
			return c * (t /= d) * t * t * t + b;
		}
		, easeOutQuart: function (x, t, b, c, d) {
			return -c * ((t = t / d - 1) * t * t * t - 1) + b;
		}
		, easeInOutQuart: function (x, t, b, c, d) {
			if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
			return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
		}
		, easeInQuint: function (x, t, b, c, d) {
			return c * (t /= d) * t * t * t * t + b;
		}
		, easeOutQuint: function (x, t, b, c, d) {
			return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
		}
		, easeInOutQuint: function (x, t, b, c, d) {
			if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
			return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
		}
		, easeInSine: function (x, t, b, c, d) {
			return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
		}
		, easeOutSine: function (x, t, b, c, d) {
			return c * Math.sin(t / d * (Math.PI / 2)) + b;
		}
		, easeInOutSine: function (x, t, b, c, d) {
			return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
		}
		, easeInExpo: function (x, t, b, c, d) {
			return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
		}
		, easeOutExpo: function (x, t, b, c, d) {
			return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
		}
		, easeInOutExpo: function (x, t, b, c, d) {
			if (t == 0) return b;
			if (t == d) return b + c;
			if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
			return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
		}
		, easeInCirc: function (x, t, b, c, d) {
			return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
		}
		, easeOutCirc: function (x, t, b, c, d) {
			return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
		}
		, easeInOutCirc: function (x, t, b, c, d) {
			if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
			return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
		}
		, easeInElastic: function (x, t, b, c, d) {
			var s = 1.70158;
			var p = 0;
			var a = c;
			if (t == 0) return b;
			if ((t /= d) == 1) return b + c;
			if (!p) p = d * .3;
			if (a < Math.abs(c)) {
				a = c;
				var s = p / 4;
			}
			else var s = p / (2 * Math.PI) * Math.asin(c / a);
			return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
		}
		, easeOutElastic: function (x, t, b, c, d) {
			var s = 1.70158;
			var p = 0;
			var a = c;
			if (t == 0) return b;
			if ((t /= d) == 1) return b + c;
			if (!p) p = d * .3;
			if (a < Math.abs(c)) {
				a = c;
				var s = p / 4;
			}
			else var s = p / (2 * Math.PI) * Math.asin(c / a);
			return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
		}
		, easeInOutElastic: function (x, t, b, c, d) {
			var s = 1.70158;
			var p = 0;
			var a = c;
			if (t == 0) return b;
			if ((t /= d / 2) == 2) return b + c;
			if (!p) p = d * (.3 * 1.5);
			if (a < Math.abs(c)) {
				a = c;
				var s = p / 4;
			}
			else var s = p / (2 * Math.PI) * Math.asin(c / a);
			if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
			return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
		}
		, easeInBack: function (x, t, b, c, d, s) {
			if (s == undefined) s = 1.70158;
			return c * (t /= d) * t * ((s + 1) * t - s) + b;
		}
		, easeOutBack: function (x, t, b, c, d, s) {
			if (s == undefined) s = 1.70158;
			return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
		}
		, easeInOutBack: function (x, t, b, c, d, s) {
			if (s == undefined) s = 1.70158;
			if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
			return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
		}
		, easeInBounce: function (x, t, b, c, d) {
			return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
		}
		, easeOutBounce: function (x, t, b, c, d) {
			if ((t /= d) < (1 / 2.75)) {
				return c * (7.5625 * t * t) + b;
			}
			else if (t < (2 / 2.75)) {
				return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b;
			}
			else if (t < (2.5 / 2.75)) {
				return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b;
			}
			else {
				return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b;
			}
		}
		, easeInOutBounce: function (x, t, b, c, d) {
			if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
			return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b;
		}
	});
})();
/****************************
 *  jQuery 기반 확장 함수
 ****************************/
(function ($) {
	var _extend = function () {
		/*---------------------------------------------------------------------------------
		 * window기반 사용자함수모음.
		 * $.random(0,100)  사용가능 , util.random(0,100) 사용가능
		 ---------------------------------------------------------------------------------*/
		window["util"] = $.extend({
			/**
			 * 접속하는 브라우져확인
			 * $.getBrowser();
			 * @returns {string}
			 */
			getBrowser: function () {
				var _ver = -1;
				var ua, re;
				if (navigator.appName == 'Microsoft Internet Explorer') {
					ua = navigator.userAgent;
					re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
					if (re.exec(ua) != null) {
						_ver = parseFloat(RegExp.$1);
					}
				}
				else if (navigator.appName == 'Netscape') {
					ua = navigator.userAgent;
					re = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
					if (re.exec(ua) != null) {
						_ver = parseFloat(RegExp.$1);
					}
				}
				if (_ver > -1) { // IE Version is ver
					_ver = "ie" + _ver;
				}
				else {
					ua = navigator.userAgent;
					if (ua.indexOf("Firefox") > -1) {
						_ver = "firefox";
					}
					else if (ua.indexOf("Opera") > -1) {
						_ver = "opera";
					}
					else if (ua.indexOf("Chrome") > -1) {
						_ver = "chrome";
					}
					else if (ua.indexOf("Safari") > -1) {
						_ver = "safari";
					}
				}
				return _ver;
			}
			, /**
			 * 접속하는 OS 확인, android / ios / windows 일경우 브라우져버젼체크
			 * $.getOs();
			 * @returns {string}
			 */
			getOs: function () {
				var userAgent = navigator.userAgent || navigator.vendor || window.opera;
				if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
					return 'ios';
				}
				else if (userAgent.match(/Android/i)) {
					return 'android';
				}
				else {
					return $.getBrowser();
				}
			}
			, /**
			 * Mobile / Pc 체크 
			 * $.isMobile();
			 * @returns {Boolean}
			 */
			isMobile: function () {
				return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?true:false;
			}
			, /**
			 * URL의 QueryString 확인
			 * http://www.yeshtml5.com?active1=5&active2=3&someVar=code&;
			 * $.getQueryString["active1"]=1;
			 * $.getQueryString["active2"]=3;
			 * $.getQueryString["someVar"]=code;
			 * @returns {Array}
			 */
			getQueryString: function () {
				var match, pl = /\+/g, // Regex for replacing addition symbol with a space
					search = /([^&=]+)=?([^&]*)/g
					, decode = function (s) {
						return decodeURIComponent(s.replace(pl, " "));
					}
					, query = top.window.location.search.substring(1);
				var _result = {};
				while (match = search.exec(query)) {
					_result[decode(match[1])] = decode(match[2]);
				}
				return _result;
			}
			, /**
			 * 시작, 끝 으로 난수발생
			 * $(window).random(0,100);
			 * @param (시작,끝)  param(끝) 이렇게 할경우 $.random(0,끝) 과 같은 결과이다.
			 * @returns {number}
			 */
			random: function (from, to) {
				if (to === undefined) {
					return Math.floor(Math.random() * (from - 1));
				}
				else {
					return Math.floor(Math.random() * (to - from + 1) + from);
				}
			}
			, /**
			 * cookie 가져옴. ( key=value) 형태로 연결됨
			 * $.getCookie(myKey);
			 * @param (key)
			 * @returns {string}
			 */
			getCookie: function (key) {
				var results = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
				if (results) {
					return (unescape(results[2]));
				}
				else {
					return undefined;
				}
			}
			, /**
			 * cookie 만듬. ( key=value) 형태로 연결됨
			 * $.setCookie(myKey,myValue,1);
			 * @param (키,값,날짜)
			 */
			setCookie: function (key, value, days) {
				var date, expires;
				if (days) {
					date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					expires = "; expires=" + date.toGMTString();
				}
				else {
					expires = "";
				}
				document.cookie = key + "=" + value + expires + "; path=/";
			}
			, /**
			 * cookie 삭제.
			 * $.deleteCookie(myKey);
			 * @param (키)
			 */
			deleteCookie: function (key) {
				var expireDate = new Date();
				//어제 날짜를 쿠키 소멸 날짜로 설정한다.
				expireDate.setDate(expireDate.getDate() - 1);
				document.cookie = key + "= " + "; expires=" + expireDate.toGMTString() + "; path=/";
			}
			, /**
			 * 앞뒤 빈문자열을 제거
			 * $.trim(" abcdef ");  //abcdef
			 */
			trim: function (value) {
				return value ? value.replace(/^\s+|\s+$/g, "") : value;
			}
			, /**
			 * 상하한값을 반환. value가 min보다 작을 경우 min을, max보다 클 경우 max를 반환
			 * var _val=$('#element').val( $.limit(value,min,max) );
			 */
			limit: function (value, min, max) {
				if (value < min) {
					return min;
				}
				else if (value > max) {
					return max;
				}
				return value;
			}
			, /**
			 * 값에서 숫자만 추출
			 * var _val=$.parse( $(this).val() );
			 */
			parse: function (value) {
				value = (value || '').replace(/[^-0-9\.]/gi, '');
				return value | 0;
			}
			, /**
			 * 배열 요소의 순서를 섞어주는 함수
			 * JSON(JavaScript Object Notation) 문자열을 개체로 변환합니다.
			 * $.shuffle([1, 3, 4, 6, 7, 8]); // [6, 3, 8, 4, 1, 7]
			 */
			shuffle: function (obj) {
				var array = JSON.parse("[" + obj + "]");
				for (var i = array.length - 1; i > 0; i--) {
					var j = Math.floor(Math.random() * (i + 1));
					var temp = array[i];
					array[i] = array[j];
					array[j] = temp;
				}
				return array;
			}
			, /**
			 * 주어진 배열에서 가장 큰 요소를 반환
			 *
			 * @param {Array} array 배열
			 * @return {number} 최대값
			 * $.max([2, 1, 3, 5, 2, 8]); // 8
			 */
			max: function (array) {
				return Math.max.apply(Math, array);
			}
			, /**
			 * 주어진 배열에서 가장 작은 요소를 반환
			 *
			 * @param {Array} array 배열
			 * @return {number} 최소값
			 * $.min([2, 1, 3, 5, 2, 8]); // 1
			 */
			min: function (array) {
				return Math.min.apply(Math, array);
			}
			, /**
			 * 주어진 문자열을 지정된 길이만큼 자른 후, 꼬리글을 덧붙여 반환
			 *
			 * @param {string} value 문자열
			 * @param {number} length 잘라낼 길이
			 * @param {string} [truncation = '...'] 꼬리글
			 * @return {string} 결과 문자열
			 *
			 * @example
			 * $.ellipsis("가나다라", 3, "..."); // "가나다..."
			 */
			ellipsis: function (value, length, truncation) {
				var str = value;
				truncation || (truncation = '');
				if (str.length > length) {
					return str.substring(0, length) + truncation;
				}
				return str;
			}
			, /**
			 * 주어진 값을 배열로 변환
			 *
			 * @param {*} value 배열로 변환하고자 하는 값
			 * @return {Array}
			 * $.toArray('abcd"); // ["a", "b", "c", "d"]
			 */
			toArray: function (value) {
				try {
					return arraySlice.apply(value, arraySlice.call(arguments, 1));
				}
				catch (e) {}
				var ret = [];
				try {
					for (var i = 0, len = value.length; i < len; i++) {
						ret.push(value[i]);
					}
				}
				catch (e) {}
				return ret;
			}
			, /**
			 * 팝업을 띄우는 함수. (vinyl.openPopup으로도 사용가능)
			 * @param {string} url 주소
			 * @param {number=} width 너비. 또는 옵션
			 * @param {number=} height 높이.
			 * @param {opts=} 팝업 창 모양 제어 옵션.(커스텀옵션: name(팝업이름), align(=center, 부모창의 가운데에 띄울것인가),
			 * @example
			 * $.winPopup('http://google.com', 500, 400, {name: 'notice', align: null, scrollbars: 'no'});
			 *  OR
			 * $.winPopup('http://google.com', {width:500,height:400,name: 'notice', align: null, scrollbars: 'no'});   사용가능
			 */
			winPopup: function (url, width, height, opts) {
				if (arguments.length === 2 && typeof (width) === "object") {
					opts = width;
					width = opts.width || 800;
					height = opts.width || 600;
					console.log('실행');
				}
				opts = $.extend({
					name: 'newWinPopup'
					, width: width || 800
					, height: height || 600
					, resizable: 'no'
					, scrollbars: 'no'
					, status: 'no'
					, menubar: 'no'
					, left: 0
					, top: 0
				}, opts);
				var target = opts.name
					, options = ''
					, temp = [];
				delete opts.name;
				delete opts.target;
				$.each(opts, function (key, val) {
					temp.push(key + '=' + val);
				});
				options += temp.join(',');
				var _newPopWin = window.open(url, target, options);
				_newPopWin.focus();
				if (!_newPopWin || _newPopWin.outerWidth === 0 || _newPopWin.outerHeight === 0) {
					alert("팝업 차단 기능이 설정되어 있습니다\n\n차단 기능을 해제(팝업허용) 한 후 다시 이용해 주세요.");
					return false;
				}
			}
			, /* END */
			end: function () {}
		});
		/*---------------------------------------------------------------------------------
		 *@ jQuery 기반 확장함수.
		 ---------------------------------------------------------------------------------*/
		$.fn.extend({
			/**
			 * element 를 특정타겟 혹은 자기자신보다 siblings (형제노드) 에서 앞으로 위치이동
			 * $('#ele').moveBefore(); , $('#ele').moveBefore( $(this).parents('li') , $('ul li:first') );
			 * @param (비교대상자, 대상타겟)
			 */
			moveBefore: function (_this, target) {
				var _this = (_this === undefined) ? $(this) : _this;
				(target === undefined) ? _this.insertBefore(_this.prev()): _this.insertBefore(target);
			}
			, /**
			 * element 를 특정타겟 혹은 자기자신보다 siblings (형제노드) 에서 뒤로 위치이동
			 * $('#ele').moveAfter(); , $('#ele').moveAfter( $(this).parents('li'), $('ul li:last') );
			 * @param (비교대상자, 대상타겟)
			 */
			moveAfter: function (_this, target) {
				var _this = (_this === undefined) ? $(this) : _this;
				(target === undefined) ? _this.insertAfter(_this.next()): _this.insertAfter(target);
			}
			, /**
			 * form 요소중 checkbox Checked
			 * $('#체크박스').setCheck();
			 */
			setCheck: function () {
				return this.each(function () {
					this.checked = true;
				});
			}
			, /**
			 * form 요소중 checkbox checked 해제
			 * $('#체크박스').setUncheck();
			 */
			setUncheck: function () {
				return this.each(function () {
					this.checked = false;
				});
			}
			, /**
			 * form 요소중 checkbox checked 해제
			 * $('#체크박스').uncheck();
			 */
			isCheck: function () {
				//Jquery기반체크  return ($(this).is(":checked")) ? true : false;
				return (this[0].checked) ? true : false;
			}
			, /**
			 * keyboard Event KeyUp 일때 숫자만 가능하게함.
			 * $('#인풋박스').onlyNumber();
			 */
			onlyNumber: function () {
				this.bind('keyup', function (event) {
					this.value = this.value.replace(/[^0-9\.]/g, '');
				});
			}
			, /**
			 * keyboard Event KeyUp 일때 영문 및 숫자만 가능하게함 (한글입력막음)
			 * $('#인풋박스').notKor();
			 */
			notKor: function (obj) {
				this.bind('keyup', function (event) {
					//좌우 방향키, 백스페이스, 딜리트, 탭키에 대한 예외
					if (event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) return;
					//obj.value = obj.value.replace(/[\a-zㄱ-ㅎㅏ-ㅣ가-힣]/g, '');
					this.value = this.value.replace(/[\ㄱ-ㅎㅏ-ㅣ가-힣]/g, '');
				});
			}
			, /**
			 * element를 특정 target으로 append 시킴
			 * $('#element').moveTo( $('#target') );
			 */
			moveTo: function (selector) {
				return this.each(function () {
					var cl = $(this).clone();
					$(cl).appendTo(selector);
					$(this).remove();
				});
			}
			, /**
			 * element를 3자리마다 ,를 삽입
			 * $('input').addComma();
			 */
			addComma: function () {
				$(this).val($(this).val().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
			}
			, /**
			 * target 이하 anchor 및 button click을 확인하여 siblings에 onClass 토글처리
			 * $('#element').siblingsClass({ _class:'on', siblings:'li' , btn:'a' });  tag element로 적을것
			 */
			siblingsClass: function (opts) {
				opts = $.extend({}, opts);
				var _this = $(this);
				var _class = opts._class || 'on'; //수정필요
				//var _class =  'on';
				var _siblings = opts.siblings || 'li';
				var _btn = _this.find(opts.btn || 'a');
				if (_btn != null && _btn.length > 0) {
					_btn.bind('click', function (event) {
						event.preventDefault();
						var _li = $(this).parents(_siblings);
						var _is = _li.hasClass(_class);
						if (!_is) {
							_li.addClass(_class).siblings().removeClass(_class);
						}
						else {
							_li.removeClass(_class).siblings().removeClass(_class);
						}
					});
				}
			}
			, /* END */
			end: function () {}
		});
	};
	/**
	 * jquery.js 를 head 가장위로 올리고, 이후 core 실행.
	 */
	(typeof ($) === "function") ? $(document).ready(_extend): console.log(" ### jquery.js 를 가장 위로 올려주세요!!");
})($);