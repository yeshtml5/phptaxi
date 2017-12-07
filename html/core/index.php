<?php include($_SERVER['DOCUMENT_ROOT']."/inc/common.inc"); ?>
<!DOCTYPE HTML>
<html>
	<head>
	       <?php import(); ?>
	</head>
<body>
<style type="text/css" rel="stylesheet">
/* COMMON STYLE  Start **************************************/
.shadow { box-shadow: 0 2px 5px 0 rgba(0,0,0,.26); }
h2 { display:inline-block; margin:10px 0; padding:5px; color:#005887; font-size:12px; border:1px solid #9c9c9c; border-left: 5px solid #ffb648;  }
button { padding:5px; background: #FF5722; color:#FFF; }
input { padding:5px;  }
.template .wrapper { background: #f5f5f5; margin:10px auto; padding:5px; border-radius: 5px; border-top: 3px solid #e1e1e1; }
/* COMMON STYLE End **************************************/
#myCookie span { margin:0 10px;}
#swapElement span { color:#FFFFFF;  }
#swapElement li { width:210px; margin:10px; padding:10px; background: #0073af; text-align: center; }
#swapElement li a { padding:5px; color:#FFF; background: #08385d; margin:0 10px; }

#siblingsClass li { display: inline-block; width:60px; margin:0; padding:10px; text-align: center; background: #005887;   }
#siblingsClass li.on {  background: #e3a240;  }
#siblingsClass li a {  color:#FFFFFF; font-size:14px; }

#siblingsClass_expand dl { display: inline-block; width:60px; margin:0; padding:10px; text-align: center; background: #0d9aff; }
#siblingsClass_expand dl dd { display:none; }
#siblingsClass_expand dl.select { background: #904daf; }
#siblingsClass_expand dl.select dd { display:block; }

#myForm li { margin:10px;}
#myForm li span { margin:0 5px;}
#myRange input { width:150px; color:#000; }
</style>
<script>
(function($){
    var _core=function(){
        //브라우져확인
        $('#myBrowser span').text( $.getBrowser() );
        //OS확인
        $('#myOS span').text( $.getOs() );
        //랜덤값구하기
        $('#myRandom span').text( $.random(0,100) );
        // 쿠키만들기/확인/삭제
        $('#makeCookie').bind('click',function(event){
            event.preventDefault();
            $.setCookie('myCookie','myValue',1);
            alert('cookie생성');
        });
        $('#getCookie').bind('click',function(event){
            event.preventDefault();
            var _result=$.getCookie('myCookie');
            alert(_result);
        });
        $('#delCookie').bind('click',function(event){
            event.preventDefault();
            var _result=$.deleteCookie('myCookie');
            alert('쿠키삭제');
        });
        // toggleOn
        $('#siblingsClass').siblingsClass();
        $('#siblingsClass_expand').siblingsClass({ _class:'select' ,siblings:'dl' ,btn:'button'});

        //Element 순서 swap
        $('#swapElement a.downBtn').bind('click',function(event){
            event.preventDefault();
            var _li =$(this).parents('li');
            $(this).moveBefore(_li);

        });
        $('#swapElement a.upBtn').bind('click',function(event){
            event.preventDefault();
            var _li =$(this).parents('li');
            $(this).moveAfter(_li);
        });

        //Form 요소
        $('#onlyNumber').onlyNumber();
        $('#notKorean').notKor();
        // CheckBox Checked/unChecked
        $('#myChecked').bind('click',function(event){
            event.preventDefault();
            $('#myCheckbox').setCheck();
        });
        $('#myUnChecked').bind('click',function(event){
            event.preventDefault();
            $('#myCheckbox').setUncheck();
        });
        $('#getChecked').bind('click',function(event){
            event.preventDefault();
            alert("checkBox 체크여부: " + $('#myCheckbox').isCheck());
        });

        //html5 Range
        $('#myRange input').bind('mousemove',function(event){
            $('#myRangeInput').val( $(this).val());
           console.log( );
        });

        //addComma
        $('#setComma').bind('click',function(event){
            event.preventDefault();
            $('#myComma').addComma();
        });
        $('#setLimitBtn').bind('click', function (event) {
            event.preventDefault();
            var _val= $.limit(100,20,66);
            alert(_val);
        });

        //숫자만추출
        $('#setParseBtn').bind('click',function(event){
            event.preventDefault();
            var _val= $('#myParse').val();
            var _return = $.parse(_val);
            alert(_return);
        });
        //Shuffle
        $('#myShuffle').bind('click',function(event){
            event.preventDefault();
            var _val=$('#myShuffleInput').val();
            _val = $.shuffle(_val);
            $('#myShuffleInput').val(_val);
        });
        //최소최대
        $('#myMinBtn').bind('click',function(event){
            event.preventDefault();
            var _val=$('#myMinMax').val();
            alert( $.min( JSON.parse(_val) ) );
        });
        $('#myMaxBtn').bind('click',function(event){
            event.preventDefault();
            var _val=$('#myMinMax').val();
            alert( $.max( JSON.parse(_val) ) );
        });
        $('#winPopupBtn').bind('click',function(event){
           event.preventDefault();
           $.winPopup('http://www.naver.com',{width:500,height:100});
        });
        $('#ellipsiBbtn').bind('click',function(event){
           event.preventDefault();
           var _val = $('#myEllipsis').val();
           $('#myEllipsis').val($.ellipsis(_val,3,"...")  );
        });
    };
    $(document).ready(_core);
})($);
</script>
<!--contents-->
<article>
    <div class="panel wrapper">
        <h2>브라우져 확인</h2>
        <div id="myBrowser" class="wrapper"><span>-</span></div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //브라우져확인
            $('#myBrowser span').text( $.getBrowser() );
        </pre>
        <h2>OS 확인</h2>
        <div id="myOS" class="wrapper"><span>-</span></div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //OS확인
            $('#myOS span').text( $.getOs() );
        </pre>
        <h2>Random 값 구하기 0 ~ 100</h2>
        <div id="myRandom" class="wrapper"><span>-</span></div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //랜덤값구하기
            $('#myRandom span').text( $.random(0,100) );
        </pre>
        <h2>쿠키 만들기/수정/삭제</h2>
        <div id="myCookie" class="wrapper pdb_30">
            <span><button id="makeCookie" class="shadow">쿠키만들기</button></span>
            <span><button id="getCookie" class="shadow">쿠키확인</button></span>
            <span><button id="delCookie" class="shadow">쿠키삭제</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            // 쿠키만들기/확인/삭제
            $('#makeCookie').bind('click',function(event){
                event.preventDefault();
                $.setCookie('myCookie','myValue',1);
                alert('cookie생성');
            });
            $('#getCookie').bind('click',function(event){
                event.preventDefault();
                var _result=$.getCookie('myCookie');
                alert(_result);
            });
            $('#delCookie').bind('click',function(event){
                event.preventDefault();
                var _result=$.deleteCookie('myCookie');
                alert('쿠키삭제');
            });
        </pre>
        <h2>브라우져Query String 가져오기</h2>
        <pre class="brush:js;gutter:false;">
             /**
                 * URL의 QueryString 확인
                 * http://www.yeshtml5.com?active1=5&active2=3&someVar=code&;
                 * $.getQueryString()["active1"]=1;
                 * $.getQueryString()["active2"]=3;
                 * $.getQueryString()["someVar"]=code;
                 * @returns {Array}
                 */
                getQueryString: function () {
                    var match,
                        pl = /\+/g,  // Regex for replacing addition symbol with a space
                        search = /([^&=]+)=?([^&]*)/g,
                        decode = function (s) {
                            return decodeURIComponent(s.replace(pl, " "));
                        },
                        query = top.window.location.search.substring(1);
                    var _result = {};
                    while (match = search.exec(query)) {
                        _result[decode(match[1])] = decode(match[2]);
                    }
                    return _result;
                },
        </pre>
        <h2>아이템순서 UP / DOWN바꾸기</h2>
        <ul id="swapElement" class="wrapper">
            <li style="background: #cbd117;"><span>No.1</span><a href="#" class="downBtn shadow"><span>[ prev ]</span><a href="#" class="upBtn shadow"><span>[ next ]</span></a></a></li>
            <li style="background: #0073af;"><span>No.2</span><a href="#" class="downBtn shadow"><span>[ prev ]</span><a href="#" class="upBtn shadow"><span>[ next ]</span></a></a></li>
            <li style="background: #404d40;"><span>No.3</span><a href="#" class="downBtn shadow"><span>[ prev ]</span><a href="#" class="upBtn shadow"><span>[ next ]</span></a></a></li>
            <li style="background: #904daf;"><span>No.4</span><a href="#" class="downBtn shadow"><span>[ prev ]</span><a href="#" class="upBtn shadow"><span>[ next ]</span></a></a></li>
            <li style="background: #ffb648;"><span>No.5</span><a href="#" class="downBtn shadow"><span>[ prev ]</span><a href="#" class="upBtn shadow"><span>[ next ]</span></a></a></li>
            <li style="background: #33da93;"><span>No.6</span><a href="#" class="downBtn shadow"><span>[ prev ]</span><a href="#" class="upBtn shadow"><span>[ next ]</span></a></a></li>
        </ul>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //Element 순서 swap
            $('#swapElement a.downBtn').bind('click',function(event){
                event.preventDefault();
                var _li =$(this).parents('li');
                $(this).moveBefore(_li);

            });
            $('#swapElement a.upBtn').bind('click',function(event){
                event.preventDefault();
                var _li =$(this).parents('li');
                $(this).moveAfter(_li);
            });
        </pre>
        <h2>toggleOn ( ul > li ) </h2>
        <ul id="siblingsClass" class="wrapper">
            <li class="on"><a href="#"><span>Anchor 1</span></a></li>
            <li><a href="#"><span>Anchor 2</span></a></li>
            <li><a href="#"><span>Anchor 3</span></a></li>
            <li><a href="#"><span>Anchor 4</span></a></li>
            <li><a href="#"><span>Anchor 4</span></a></li>
        </ul>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
           // toggleOn
            $('#siblingsClass').siblingsClass();
        </pre>
        <h2>toggleOn ( dl > dt,dd ) </h2>
        <div id="siblingsClass_expand" class="wrapper">
            <dl>
                <dt><button>탭영역 1</button></dt>
                <dd><div>상세내용1</div></dd>
            </dl>
            <dl>
                <dt><button>탭영역 2</button></dt>
                <dd><div>상세내용2</div></dd>
            </dl>
            <dl>
                <dt><button>탭영역 3</button></dt>
                <dd><div>상세내용3</div></dd>
            </dl>
            <dl>
                <dt><button>탭영역 4</button></dt>
                <dd><div>상세내용4</div></dd>
            </dl>
            <dl>
                <dt><button>탭영역 5</button></dt>
                <dd><div>상세내용5</div></dd>
            </dl>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            // toggleOn
            $('#siblingsClass_expand').siblingsClass({_class:'select' ,siblings:'dl' ,btn:'button'});
        </pre>
        <h2>Form 요소</h2>
        <ul id="myForm" class="wrapper">
            <li><label>숫자만 입력 : &nbsp;&nbsp;<input id="onlyNumber" type="input"  ></label></li>
            <li><label>한글입력 안되게 : &nbsp;&nbsp;<input id="notKorean" type="input"  ></label></li>
            <li>
                <span><button id="myChecked" class="shadow">Checked</button></span>
                <span><button id="myUnChecked" class="shadow">UnChecked</button></span>
                <span><button id="getChecked" class="shadow">check확인</button></span>
                <span><input id="myCheckbox" type="checkbox"></span>
            </li>
        </ul>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //Form 요소
            $('#onlyNumber').onlyNumber();
            $('#notKorean').notKor();
            // CheckBox Checked/unChecked
            $('#myChecked').bind('click',function(event){
                event.preventDefault();
                $('#myCheckbox').setCheck();
            });
            $('#myUnChecked').bind('click',function(event){
                event.preventDefault();
                $('#myCheckbox').setUncheck();
            });
            $('#getChecked').bind('click',function(event){
                event.preventDefault();
                alert("checkBox 체크여부: " + $('#myCheckbox').isCheck());
            });
        </pre>
        <h2>Range</h2>
        <div id="myRange" class="wrapper">
            <input type="range" min="0" max="10">
            <span><label>value : &nbsp;&nbsp;<input id="myRangeInput" type="input" value="" ></label></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //html5 Range
            $('#myRange input').bind('mousemove',function(event){
                $('#myRangeInput').val( $(this).val());
               console.log( );
            });
        </pre>
        <h2>addComma</h2>
        <div id="myAddComma" class="wrapper">
            <span><label>3자리수마다 , 찍기: &nbsp;&nbsp;<input id="myComma" type="input" value="123456789" ></label></span>
            <span><button id="setComma" class="shadow">콤마적용</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //addComma
            $('#setComma').bind('click',function(event){
                event.preventDefault();
                $('#myComma').addComma();
            });
        </pre>
        <h2>하한값, 상한값 정의</h2>
        <div class="wrapper">
            <span>하한/상한값:</span>
            <span><button id="setLimitBtn" class="shadow">(min,max) Limit</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            $('#setLimitBtn').bind('click', function (event) {
                event.preventDefault();
                var _val= $.limit(100,20,66);
                alert(_val);
            });
        </pre>
        <h2>숫자만추출</h2>
        <div class="wrapper">
            <span><label>숫자만추출: &nbsp;&nbsp;<input id="myParse" type="input" value="get1234" ></label></span>
            <span><button id="setParseBtn" class="shadow">parseBtn</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            //숫자만추출
            $('#setParseBtn').bind('click',function(event){
                event.preventDefault();
                var _val= $('#myParse').val();
                var _return = $.parse(_val);
                alert(_return);
            });
        </pre>
        <h2>Array Shuffle</h2>
        <div class="wrapper">
            <span><label>배열섞기: &nbsp;&nbsp;<input id="myShuffleInput" type="input" value="[0,1,2,3,4,5,6,7,8,9]" ></label></span>
            <span><button id="myShuffle" class="shadow">Shuffle</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            $('#myShuffle').bind('click',function(event){
                event.preventDefault();
                var _val=$('#myShuffleInput').val();
                _val = $.shuffle(_val);
                $('#myShuffleInput').val(_val);
            });
        </pre>
        <h2>min /  max</h2>
        <div class="wrapper">
            <span><label>최소값: &nbsp;&nbsp;<input id="myMinMax" type="input" value="[0,1,2,3,4,5,6,7,8,9]" ></label></span>
            <span><button id="myMinBtn" class="shadow">minBtn</button></span>
            <span><button id="myMaxBtn" class="shadow">maxBtn</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
           $('#myMinBtn').bind('click',function(event){
                event.preventDefault();
                var _val=$('#myMinMax').val();
                alert( $.min( JSON.parse(_val) ) );
            });
            $('#myMaxBtn').bind('click',function(event){
                event.preventDefault();
                var _val=$('#myMinMax').val();
                alert( $.max( JSON.parse(_val) ) );
            });
        </pre>
        <h2>window Popup</h2>
        <div class="wrapper">
            <span><button id="winPopupBtn" class="shadow">window.open 팝업실행</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
           $('#winPopupBtn').bind('click',function(event){
               event.preventDefault();
               $.winPopup('http://www.naver.com',{width:500,height:100});
            });
        </pre>
        <h2>Ellipsis</h2>
        <div class="wrapper">
            <span><label>Ellipsis 3자리수: &nbsp;&nbsp;<input id="myEllipsis" type="input" value="가나다라마바사아자차" ></label></span>
            <span><button id="ellipsiBbtn" class="shadow">말줌임표..</button></span>
        </div>
        <!-- syntaxhighlight-->
        <pre class="brush:js;gutter:false;">
            </div>
</article>
<!--//contents-->
<?php footer();?>
