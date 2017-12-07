(function ($,core) {
    "use strict";
    var _opts, _vars, _self;
    core.define("ui.Navi", {
        config: {
            speed: 800,
            easing: "easeInOutQuint"
        },
        init: function (obj) {
            _self = this;
            this.opts = this.opts || {};
            this.opts = _opts = $.extend(null, this.config, obj);

            _opts['wrap'] = _opts['wrap'] || $('.ui-navi-wrap');
            _opts['depth1'] = _opts['wrap'].find(_opts['depth1'].selector) || $('.ui-navi-depth1');
            _opts['depth2'] = _opts['wrap'].find(_opts['depth2'].selector) || $('.ui-navi-depth2');
            _opts['active1'] = Number(_opts['wrap'].attr('data-active1')) - 1 || -1;
            _opts['active2'] = Number(_opts['wrap'].attr('data-active2')) - 1 || -1;
            this._bind();
            this.setActive();
        },
        _bind: function () {
            var _b = $('body');
            var _isOver = false;
            var _isTime = 1000;
            _b.on('click focusin mouseenter', _opts['depth1'].selector, function (event) {// depth1 dl 메뉴 event
                event.preventDefault();
                _isOver = true;
                var _dl = $(this).closest('dl'), _idx = _dl.index(), _evt;
                // trigger Event
                _opts['wrap'].triggerHandler(_evt = $.Event('select-menu'), {
                    data: _opts
                });
                if (_evt.isDefaultPrevented()) {
                    return;
                }
                _dl.addClass('on').siblings('dl').removeClass('on').find('dl').removeClass('on');
                _opts['wrap'].attr('data-index-depth1', _idx);
                _opts['wrap'].attr('data-index-depth2', "-1");
            });
            _b.on('click focusin mouseenter', _opts['depth2'].selector, function (event) {// depth2 dl 메뉴 event
                event.preventDefault();
                var _dl = $(this).closest('dl'), _idx = _dl.index(), _evt;
                // trigger Event
                _opts['wrap'].triggerHandler(_evt = $.Event('select-menu'), {
                    data: _opts
                });
                if (_evt.isDefaultPrevented()) {
                    return;
                }
                _dl.addClass('on').siblings('dl').removeClass('on').find('dl').removeClass('on');
                _opts['wrap'].attr('data-index-depth2', _idx);
            });
            _b.on('mouseleave', _opts['wrap'].selector, function (event) {// wrap 영역 벗어날 경우 초기화
                event.preventDefault();
                var _func = function () {
                    var _dl = $(this).parents('dl');
                    _opts['wrap'].find('dl').removeClass('on');
                    if (_opts['active1'] != -1 && _opts['active2'] != -1) {
                        _self.setActive();
                    }
                    _isOver = false;
                    _sto = null;
                };
                var _sto = setTimeout(_func, _isTime);
            });
        },
        /*--------------------------------------------------------------------------------------------------------------------------
         * 	 input type="hidden" 형태로  depth1 , depth2 활성화 시키는 function
         -------------------------------------------------------------------------------------------------------------------------*/
        setActive: function () {
            var _v1 = _opts['active1'], _v2 = _opts['active2'];
            // depth1 active
            _opts['depth1'].eq(_v1).trigger('mouseenter');
            //depth2 active
            _opts['depth1'].eq(_v1).closest('dl').find('>dd>dl').eq(_v2).find('a').trigger('mouseenter').focus();
        },
        end: function () {
        }
    });
})(jQuery, window[CORE]);