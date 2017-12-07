(function ($) {
    /*CONFIG*/

    /*한번에 불러올 갯수 max 33정도 */
    var _count = 30;
    /*권한 토큰*/
    var _token = "1651707531.c9015f8.a35230e6a33c403c8d5bc560d8025f33";
    var _myTag = "pusan";
    var _id = "yeshtml5";
    var _target = $('div.insta-wrap ul');
    var _access_param = {
        access_token: _token
    };

    function show_instagram(tag) {
        var _hashtag = tag || _myTag;
        var _url = 'https://api.instagram.com/v1/tags/' + _hashtag + '/media/recent?callback=?&count=' + _count + '&max_tag_id=0&ID=' + _id;
        $.getJSON(_url, _access_param, onLoadCompleted);
    };
    function onLoadCompleted(data) {
        var _d = data;
        if (_d.meta.code == 200) {
            var _p = this.url.split("&");
            var _info = _d.data;
            for (var i in _info) {
                console.log(_info[i]);
                /*저해상도*/
                //var _src = _info[i]["images"]["low_resolution"].url;
                /*썸네일*/
                //var _src = _info[i]["images"]["thumbnail"].url;
                /*큰해상도*/
                var _src = _info[i]["images"]["standard_resolution"].url;
                var _link = _info[i].link;
                var _ele = '<li><a href="' + _link + '"><img src="' + _src + '" ></a></li>';
                $('div.insta-wrap ul').append(_ele);
            }
            console.log(_p);
            //console.log('#load complete');
        } else {
            console.log('Load Complete But Error!');
        }
        console.log(data);
    };
    $(document).ready(function () {
        show_instagram();
        $('#insta_btn').bind('click', function (event) {
            event.preventDefault();
            var _tag = $('#insta_tag').val();
            $('div.insta-wrap ul').children().remove();
            show_instagram(_tag);
        });
        $('#insta_tag').bind('keydown', function (event) {
          
            if (event.which == 13) {/* 13 == enter key@ascii */
                var _tag = $('#insta_tag').val();
                $('div.insta-wrap ul').children().remove();
                show_instagram(_tag);
            }


        });
        $('.insta-wrap ul').masonry({
            // set itemSelector so .grid-sizer is not used in layout
            fitWidth: true,
            itemSelector: 'li'
//                // use element for option
//                columnWidth: '.grid-sizer',

        });
    });
})($);