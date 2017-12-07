<?php 

include "twitteroauth/twitteroauth.php";

$consumer_key = "U5D2MWe6autzVOWWApUCU7tRk";
$consumer_secret = "t8SlJ1cSjgXem00ACbhULgHN8ogGBaUrd1Z0keuHp3OMZsEcbM";
$access_token = "114379771-vjoLd8y5RtW4WHdESbTvzzisuuKAjr4AmjpX1mpc";
$access_token_secret = "YR1EAUyQbbvwGisLUXBF8JFkv4Sq5ncn3IJ8f9L60icia";

//$query="%22아이서울유%22";//다중검색 https://dev.twitter.com/rest/public/search 참고페이지
$query="%23서울+%23여행";//다중검색
/**/
$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$query.'&result_type=recent&count=20');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Twitter API SEARCH</title>
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
		
		body{padding:100px;}
		li{ width:500px; margin:0 auto;}
		li .img-wrap{overflow:hidden;}
		li .img-wrap img {width:100%;height:auto;vertical-align:top;}
		.list {clear:both;border-bottom:1px solid #111;margin-bottom:5px;}
		/* .list:nth-child(odd){background:#e1e1e1;} */
		dl dt{display:inline-block;width:15%; vertical-align:top;background:#c1c1c1;}
		dl dd{display:inline-block;width:80%; vertical-align:top;}
		li p.txt{padding:10px; margin:10px;}
 </style>
</head>
<body>
<ul>
<?php foreach ($tweets->statuses as $key => $tweet) { ?>
	<li class="list">
		<?php
			echo "<pre>";
			//print_r($tweet);
			echo "</pre>";
		?>
			<div>
				<a href="https://twitter.com/intent/user?screen_name=<?=$tweet->user->screen_name; ?>"><img src="<?= $tweet->user->profile_image_url; ?>" /><span><?= $tweet->user->screen_name; ?></span></a>
			</div>
			<? if( isset($tweet->entities->media[0]->media_url)){ ?>
					<a href="https://twitter.com/statuses/<?=$tweet->id;?>"><span class="img-wrap"><img src="<?= $tweet->entities->media[0]->media_url; ?>" /></span></a>
			<? }?>
			
			<p class="txt">
				<?=$tweet->text; ?>
			</p>
			<!-- <a href="<?=$tweet->entities->urls[0]->url; ?>"><?=$tweet->entities->urls[0]->url; ?></a> 추가링크 -->
	</div>
<?php } ?>
</ul>
<!--
<?php echo json_encode($tweets); ?>
-->
</body>
</html>