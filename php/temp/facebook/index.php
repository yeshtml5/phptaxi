<!DOCTYPE HTML>
<!--
기본가이드페이지: https://developers.facebook.com/docs/javascript/quickstart
Url로 테스트가능페이지: https://developers.facebook.com/tools/explorer
그래프 API https://developers.facebook.com/docs/graph-api/overview

--------------------------------------------------------------
App Id: 1161224693900434
App secret Code : 8ed9af76927cb48e47f84a5a9a72bf21
@User Token
EAAQgILFiZAJIBAJgIcsNBlXmh13pKyA4DGZCQ1eBFov61JvIUGIneU1RS0N6c5ZAIGYsfxvmF0JZBb5PyPCze79yTUTqp0cWU2sUEhqp2r5XBBYZAsoIPUN5q1fUs5dqlDolTWxvaE5I2rZAz0iSFRyFpFLYwiE2n1OU5UKC0q1QZDZD
@App Token
1161224693900434|pFZvvEgaRO3LK8H9mFzfIsUBfdw

서울시 페이스북:https://www.facebook.com/seoul.kr/?fref=ts


https://developers.facebook.com/docs/graph-api/using-graph-api

search 함수로 장소를 서울로 해보면 어떨까?

id를 확인가능하면

https://graph.facebook.com/{id}721858751282365/picture?type=large
이런형태로

https://www.facebook.com/sharer/sharer.php?u=http://playseoulbrand.kr/intro/generator/%3FprodSerRegNo%3D412%26prodMdlRegNo%3D575&title=ISEOULYOU

--------------------------------------------------------------
-->
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>WEB STYLE GUIDE</title>
    <script type="text/javascript" src="/src/js/lib/jquery.js"></script><!-- jQuery -->
    <script type="text/javascript" src="/src/js/common/core.js"></script>
    <script type="text/javascript" src="/src/js/common/common.ui.js"></script>
    <!--[if lt IE 9]><script type="text/javascript" src="/src/js/lib/html5.js"></script><![endif]-->
    <style type="text/css" rel="stylesheet">
        /* COMMON STYLE  Start **************************************/
        body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,textarea,p,blockquote,th,td,input,select,textarea,button {margin:0;padding:0;}
        fieldset,img {border:0 none}
        dl,ul,ol,menu,li {list-style:none}
        blockquote, q {quotes: none}
        blockquote:before, blockquote:after,q:before, q:after {content:'';content:none;}
        input,select,textarea,button {vertical-align:middle;}
        input::-ms-clear {display:none;}
        button {border:0 none;background-color:transparent;cursor:pointer;}
        /* COMMON STYLE End **************************************/
		  button{padding:5px 10px;background:#ccc;border:1px solid #000;}
    </style>
	<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			console.log('ok');
		});
	})($);
	</script>
</head>
<body>
<!--facebook api-->
<script>
	//config
	var _appId='1161224693900434';
	var _redirectUrl='http://php.ne.kr/php/facebook/index.php';
	var docReady = $.Deferred();
	var facebookReady = $.Deferred();
	$(document).ready(docReady.resolve);
	window.fbAsyncInit = function() {
		FB.init({
			appId      : _appId,
			xfbml      : true,
			version    : 'v2.7'
		});
		facebookReady.resolve();
	};
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
	  /* 디버그모드 js.src = "//connect.facebook.net/en_US/sdk/debug.js"; */
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
//-------------------------------------
		function makeFacebookPhotoURL( id, accessToken ) {/*facebook 사진*/
			return 'https://graph.facebook.com/' + id + '/picture?access_token=' + accessToken;
		}
		function makeCreatedTime(id,accessToken){
			return 'https://graph.facebook.com/' + id + '/picture?access_token=' + accessToken;
		}
		function login( callback ) {
			FB.login(function(response) {
				if (response.authResponse) {
					//console.log('Welcome!  Fetching your information.... ');
					if (callback) {
						callback(response);
					}
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			},{scope: 'user_photos'} );
		}
		function getAlbums( callback ) {
			FB.api(
					'/me/albums',
					{fields: 'id,cover_photo'},
					function(albumResponse) {
						//console.log( ' got albums ' );
						if (callback) {
							callback(albumResponse);
						}
					}
				);
		}
		function getPhotosForAlbumId( albumId, callback ) {
			FB.api(
					'/'+albumId+'/photos',
					{fields: 'id'},
					function(albumPhotosResponse) {
						//console.log( ' got photos for album ' + albumId );
						if (callback) {
							callback( albumId, albumPhotosResponse );
						}
					}
				);
		}
		function getLikesForPhotoId( photoId, callback ) {
			FB.api(
					'/'+albumId+'/photos/'+photoId+'/likes',
					{},
					function(photoLikesResponse) {
						if (callback) {
							callback( photoId, photoLikesResponse );
						}
					}
				);
		}
		function getPhotos(callback) {
			var allPhotos = [];
			var accessToken = '';
			login(function(loginResponse) {
				accessToken = loginResponse.authResponse.accessToken || '';
				console.log('## token :  '+accessToken);
				window.FACEBOOK_TOKEN = accessToken;
				getAlbums(function(albumResponse) {
						var i, album, deferreds = {}, listOfDeferreds = [];
						for (i = 0; i < albumResponse.data.length; i++) {
							album = albumResponse.data[i];
							deferreds[album.id] = $.Deferred();
							listOfDeferreds.push( deferreds[album.id] );
							getPhotosForAlbumId( album.id, function( albumId, albumPhotosResponse ) {
									var i, facebookPhoto;
									for (i = 0; i < albumPhotosResponse.data.length; i++) {
										facebookPhoto = albumPhotosResponse.data[i];
										allPhotos.push({
											'id'	:	facebookPhoto.id,
											'added'	:	facebookPhoto.created_time,
											'url'	:	makeFacebookPhotoURL( facebookPhoto.id, accessToken )
										});
									}
									deferreds[albumId].resolve();
								});
						}
						$.when.apply($, listOfDeferreds ).then( function() {
							if (callback) {
								callback( allPhotos );
							}
						}, function( error ) {
							if (callback) {
								callback( allPhotos, error );
							}
						});
					});
			});
		}
//---------------------------------------
	/*jqeury 및 facebook init complete*/
	$.when(docReady, facebookReady).then(function() {
		if (typeof getPhotos !== 'undefined') {
			getPhotos( function( photos ) {
				/*최종결과*/
				//console.log( photos );
			});
		}
	});
</script>
<!--//facebook api-->

<!--header-->
<div class="header content-wrap">
	<div class="fb-like" data-share="true"  data-width="450" data-show-faces="true"></div>
	<script type="text/javascript">
		// Only works after `FB.init` is called
		function myFacebookLogin() {
			//	FB.login(function(){}, {scope: 'publish_actions'});
			FB.login(function(){
				FB.api(
						"/search",
					{
						"type": "page",//특정 위도경도로 할경우 type:place&center=37.76,-122.427&distance=1000
						"q": "서울"
					},
					function (response) {
						if (response && !response.error) {/* handle the result */
							var _info=response.data;
							var paging=response.pasing;
							var _ele='<ul>';
							$.each(_info,function(i,ary){
								/*속성추가*/
								//console.log(ary);
								var _id=ary.id;
								ary["photo"]='https://graph.facebook.com/'+_id+'/picture?type=large';
								ary["link"]='https://graph.facebook.com/' + _id + '/feed?access_token=' + window.FACEBOOK_TOKEN;
							//	ary["link"]='https://graph.facebook.com/' + _id + '/picture?access_token=' + window.FACEBOOK_TOKEN;
								

								_ele+='<li><a href="'+_info[i]["link"]+'"><img src="'+_info[i]["photo"]+'"/><p>'+_info[i]["name"]+'</p></a></li>'
							});
							_ele+='</ul>';
							$('.main-cont').append(_ele);
						}
						console.log(_info);
					}
				);
				/*
				FB.api('/search?q=seoul&type=place&center=37.76,-122.427&distance=1000',function(response) {
					//console.log(response);
				if (!response || response.error) {
					//alert('Couldnt Publish Data');
				} else {
					//alert("Message successfully posted to your wall");
					}
				});
				*/
			}, {scope: 'publish_actions'});
		}
	</script>
	<button onclick="myFacebookLogin()">정보가져오기</button>
</div>
<!--//header-->
<!--main-content-->
<div class="main-cont" style="margin-top:200px;">
	<div class="content">
			 
    </div>
</div>
<!--//main-content-->
</body>
</html>