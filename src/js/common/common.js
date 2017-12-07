/*************************************************************************************************
 * pc 전용JS
 *
 *************************************************************************************************/
(function($) {
    var _this, _d1, _d2;
    var _common = {
        init: function() {
            this.setup();
            this.bind();
        },
        setup: function() {
            //menu
            _this = this;
            _d1 = parseInt($('article').attr('data-menu1')) - 1;
            _d2 = parseInt($('article').attr('data-menu2')) - 1;
            //make lnb
            var _ele1 = $('nav').find('>ul>li').eq(_d1).addClass('on').find('>a');
            var _ele2 = $('nav').find('>ul>li').eq(_d1).find('ul.sub li').eq(_d2).find('>a');
            var _sub = $('nav').find('>ul>li').eq(_d1).find('ul.sub');
            _sub.find('li').eq(_d2).addClass('on');
            $('.lnb nav').append(_sub);
            //set title
            $('nav p.title > span').text(_ele1.text());
            //make location
            $('.location a.menu1').attr('href', _ele1.attr('href')).text(_ele1.text());
            $('.location a.menu2').attr('href', _ele2.attr('href')).text(_ele2.text());
            //getName
            if ($('.main').length > 0) {
                _this.story();
                _this.motion();
            }
            // check submain
            if (_ele1.text() === _ele2.text()) {
                $('.location a.menu1').remove();
            }
        },
        bind: function() {
            $('.close').bind('click', function(event) {
                var _layer = $(this).parents('.layer');
                _layer.fadeOut();
            });
            $(window).bind('scroll', function(event) {
                var _top = parseInt($(this).scrollTop());
                var _doc = parseInt($(document).height());
                var _height = _doc - parseInt($(window).height());
                var _idx = '';
                if (0 <= _top && _top < _height / 3) {
                    _idx = 0;
                } else if (_height / 3 < _top && _top <= _height * 2 / 3) {
                    _idx = 1;
                } else if (_height * 2 / 3 < _top && _top <= _height) {
                    _idx = 2;
                }
                $('aside.motion li').removeClass('on').eq(_idx).addClass('on');
            });

        },
        motion: function() {
            var _idx = 0;
            var _total = 2;
            var _li = $('#main_visual').find('li');
            _li.eq(0).show().siblings('li').hide();
            var _itv = setInterval(function() {
                _idx = _idx + 1;
                _idx = _idx % _total;
                var _t = _li.eq(_idx);
                _t.insertBefore($('#main_visual').find('li').eq(0));
                _t.fadeIn('slow').siblings('li').hide();
            }, 5000);
        },
        story: function() {
            var _init = function() {
                _select = 0;
                _scene(_select);
                _result = $.random(0, 2);
                $('#story section span.get_name').text($('#getName').val());
            };
            var _scene = function(idx) {
                _section.removeClass('on').eq(_select).addClass('on');
                var _list = _section.eq(_select).find('.group > p');
                _list.each(function(select) {
                    $(this).hide().stop().delay(select * 500 + 300).fadeIn();
                });
                //# 붓/마이크/바나나 선택
                if (idx == 3) {
                    var _p = $('.s4 .group .case >p').eq(_result);
                    _p.show().siblings('p').hide();
                } else if (idx == 4) {
                    var _p = $('.s5 .group .case >p').eq(_result);
                    _p.show().siblings('p').hide();
                } else if (idx == _total) {
                    $('#story').fadeOut();
                }
            };
            var _select = 0;
            var _section = $('#story section');
            var _nextBtn = $('#nextBtn');
            var _total = _section.length;
            var _result;
            //해당포커스 깜박임표시
            $('#getName').focus();
            //"지금시작해볼까요 클릭시 텍스트 노출"
            $('#startBtn').bind('click', function(event) {
                var _str = $('#getName').val();
                if (_str == "" || _str == " ") {
                    alert('우리아이의 이름을 입력해주세요.');
                    $('#getName').focus();
                    return false;
                }
                _init();
                $('#story').fadeIn();
            });
            //DIM클릭시 닫히게
            $('#story').bind('click', function(event) {
                var _t = event.target.nodeName.toLowerCase();
                if (_t === "aside") {
                    $(this).hide();
                }
            });

            _nextBtn.bind('click', function(event) {
                _select = _select + 1;
                _scene(_select);
            });
            //-----
            _init();
        },
        end: null
    }
    $(document).ready(function() {
        _common.init();
    });
})($);
