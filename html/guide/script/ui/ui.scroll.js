(function ($, core) {
    "use strict";
    core.define("ui.Scroll", {
        config: {
            speed: 0
        },
        init: function (obj) {
            var _self = this, _opts;

            this.opts = this.opts || {};
            this.opts = _opts = $.extend(null, this.config, obj);
            /*
             *  ui.Scroll Option 값들 정의
             */
            _opts['isDown'] = false;
            _opts['type'] = _opts['type'] || 'left';
            _opts['ratio'] = _opts['ratio'] || 0;
            _opts['snap'] = _opts['snap'] || 1;
            _opts['divide'] = _opts['divide'] || 0;
            _opts['container-postion'] = parseInt(_opts['container'].css(_opts['type']));
            _opts['cursor'] = (_opts['cursor'] == undefined) ? _opts['container'].find('.ui-scroll-cursor') : _opts['container'].find(_opts['cursor'].selector);
            _opts['track'] = (_opts['track'] == undefined) ? _opts['container'].find('.ui-scroll-track') : _opts['container'].find(_opts['track'].selector);
            _opts['track-size'] = (_opts['type'] == 'left') ? _opts['track'].width() : _opts['track'].height();
            _opts['cursor-size'] = (_opts['type'] == 'left') ? _opts['cursor'].width() : _opts['cursor'].height();
            _opts['min-value'] = parseInt(_opts['track'].css(_opts['type']));
            _opts['max-value'] = _opts['min-value'] + _opts['track-size'] - _opts['cursor-size'];
            _opts['track-limit'] = _opts['track-size'] - _opts['cursor-size'];
            _opts['wheelMount'] = _opts['wheelMount'] || 30;

            // event Binding
            this._bind();
            /*
             *	track 의 n 등분하여 click , touchend 일경우 분할영역으로 Snap 자석처럼 붙는 기능실행
             * 	mouseWheel 의 전체 track의 넓이(높이) 의 n 등분으로 값을 변경
             */
            if (_opts['divide'] !== 0) {
                this.snapToDivide(_opts['divide']);
                _opts['wheelMount'] = Math.ceil(_opts['track-limit'] / _opts['divide']);
            }
        },
        _bind: function () {
            var _self = this, _opts = this.opts, _cnt = $('#contents');
            var _touch = _opts['isTouch'] = ('ontouchstart' in document.documentElement);
            var _evtStart = _touch ? 'touchstart' : 'mousedown';
            var _evtMove = _touch ? 'touchmove' : 'mousemove';
            var _evtEnd = _touch ? 'touchend' : 'click';

            _cnt.on(_evtStart + ' ' + _evtMove + ' ' + _evtEnd + ' ' + 'mouseleave', _opts['cursor'].selector, function (event) {
                event.preventDefault ? event.preventDefault() : event.returnValue = false;
                var _evt = (_touch) ? event.originalEvent.touches[0] : event;
                if (event.type === (_evtEnd || 'mouseleave' )) {
                    _opts['isDown'] = false;
                } else if (event.type === _evtStart) {
                    _opts['isDown'] = true;
                } else if (event.type === _evtMove) {
                    (_opts['isDown']) ? _self._moving(_evt) : null;
                }
            });
            //	scroll mouseWheel event setting
            _cnt.on('mousewheel', _opts['container'].selector, function (event, delta, deltaX, deltaY) {
                _opts['wheelMount'] = (_opts['snap'] >= _opts['wheelMount']) ? _opts['snap'] : _opts['wheelMount'];
                var _mount = parseInt(_opts['cursor'].css(_opts['type'])) + _opts['wheelMount'] * -delta;
                _self.moveTo(_mount);
                return false;
            });
            // track event setting
            _cnt.on(_evtStart, _opts['track'].selector, function (event) {
                event.preventDefault ? event.preventDefault() : event.returnValue = false;
                var _evt = (_opts['isTouch']) ? event.originalEvent.touches[0] : event;
                _self._moving(_evt);
                //	snap to divide 기능이 적용될 경우 실행
                if (_opts['divide'] !== 0) {
                    _opts['ratio'] = Math.round(_opts['ratio'] * _opts['divide']) / _opts['divide'];
                    _self.setRatio(_opts['ratio']);
                }
            });
            //	컨텐츠영역에서 클릭영역을 eventEnd 일경우 false 반환
            _cnt.on(_evtEnd, function () {
                event.preventDefault ? event.preventDefault() : event.returnValue = false;
                _opts['isDown'] = false;
            });
        },
        /*------------------------------------------------------------------------------------
         * 	@function	: Event 의 pageX, PageY 값을 부모  _opts['container'] 의 기준으로 위치값 계산
         *
         ------------------------------------------------------------------------------------*/
        _moving: function (event) {
            var _opts = this.opts;
            var _mount = (((_opts['type'] == 'left') ? event.pageX : event.pageY) - parseInt(_opts['cursor-size'])) - parseInt(_opts['container-postion']) + parseInt(_opts['cursor-size'] / 2);
            this.moveTo(_mount);
        },
        /*------------------------------------------------------------------------------------
         * 	@function	: 특정위치값으로 이동
         *
         ------------------------------------------------------------------------------------*/
        moveTo: function (mount) {
            var _self = this;
            var _opts = this.opts;
            var _css = {};
            var _min = _opts['min-value'];
            var _max = _opts['max-value'];
            mount = Math.floor(mount / _opts['snap']) * _opts['snap'];
            mount = (mount <= _opts['min-value']) ? _opts['min-value'] : mount;
            mount = (mount >= _opts['max-value']) ? _opts['max-value'] : mount;
            _opts['ratio'] = (mount - _opts['min-value']) / _opts['track-limit'];
            _opts['mount'] = _css[_opts['type']] = mount;
            _opts['cursor'].css(_opts['type'], mount);
            //_opts['cursor'].stop().animate(_css, _opts['speed']);
            (_opts.callback != undefined) ? _opts.callback.call(this, _opts) : false;
        },
        /*------------------------------------------------------------------------------------
         * 	@function	: 0 ~ 1 까지 비율로 Cursor 를 해당 위치로 이동
         *
         ------------------------------------------------------------------------------------*/
        setRatio: function (ratio) {
            var _mount = ratio * this.opts['track-limit'] + this.opts['min-value'];
            this.moveTo(_mount);
        },
        /*------------------------------------------------------------------------------------
         * 	@function	: 전체넓이에서 n등분하며 snap물리는 기능
         *
         ------------------------------------------------------------------------------------*/
        snapToDivide: function (total) {
            var _self = this;
            var _opts = this.opts;
            var _touch = _opts['isTouch'] = ('ontouchstart' in document.documentElement);
            var _evtStart = _touch ? 'touchstart' : 'mousedown';
            var _evtEnd = _touch ? 'touchend' : 'click';
            this.setRatio(0);
            _opts['divide'] = total;
            _opts['cursor'].unbind(_evtEnd + ' ' + 'mouseleave').bind(_evtEnd + ' ' + 'mouseleave', function (event) {
                if (_opts['isDown']) {
                    _opts['ratio'] = Math.round(_opts['ratio'] * total) / total;
                    _self.setRatio(_opts['ratio']);
                }
                _opts['isDown'] = false;
            });
        },
        endFunc: function () {
            //---
        }
    });
})(jQuery, window[CORE]);