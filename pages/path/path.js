/*************************************************************************************************
 * @CreateDate : 2017.10.16
 *
 *************************************************************************************************/
(function($) {
    "use strict";
    var _this, _opts;
    var _path = {
        init: function(opt) {
            this.opts = this.opts || {};
            _opts = this.opts = $.extend(null, this.config);
            _this = this;
            this._bind();
        },
        _bind: function() {
            var _nav = $('nav');
            var _li = _nav.find('li');
            _li.each(function(){
                if( $(this).find('ul').length!=0 ){
                    $(this).addClass('node');
                }
            });
            var _anc = _nav.find('a');
            _anc.bind('click', function(event) {
                $(this).parent('li').toggleClass('on');
                var _ul = $(this).siblings('ul').length;
                if(_ul==0){
                    $(this).toggleClass('on');
                }else{
                    event.preventDefault();
                }
            });
        }
    };
    $(document).ready(function() {
        _path.init();
    });
})($);
