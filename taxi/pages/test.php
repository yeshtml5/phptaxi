<?php
$to = "lacuca@naver.com, yesflash@vinylc.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>

<?php
  /*
    Template Name: 메인페이지
  */
?>
<?php get_header();?>
<?php
/*wordpress function*/
$parent_title = get_the_title($post->post_parent);
$parent_link = get_permalink($post->post_parent);
$current_title = get_the_title($post->ID);
$current_link = get_permalink($post->ID);
?>
<?php /*wordpress 강제p태그 삭제*/ remove_filter( 'the_content', 'wpautop' ); ?>
<?php if(have_posts()): while(have_posts()):the_post();?>
<link type="text/css" rel="StyleSheet" href="<?php echo __PATH__;?>src/css/main.css" />
<script type="text/javascript" src="<?php echo __PATH__;?>src/js/main.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?&key=AIzaSyDHs28NXxzuukiMWuZEY1KyIrLiWmWUwAs"></script>
<article class="page"><!--page-->
	<p><?php the_content();?></p>
	<ul class="col-4 col">
	    <li>
	   		<div class="skyblue widget">
				<p class="tit">2016.05.24</p>
				<div class="cont"></div>
			</div>
        </li>
        <li>
           <div class="green widget">
	           	<p class="tit">2016.05.24</p>
				<div class="cont"><!-- http://aqvatarius.com/themes/atlant/html/ui-widgets.html  --></div>
           </div>
        </li>
        <li>
           <div class="orange widget">
	           	<p class="tit">Mailto:yeshtml5@gmail.com</p>
				<div class="cont"><a href="mailto:yeshtml5@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>Mailto:yeshtml5@gmail.com</a></div>
           </div>
        </li>
        <li>
			<div class="kakao_chat widget"><!--오픈채팅 -->
				<p class="tit">카/카/오/톡/오/픈/채/팅</p>
				<div class="cont">	
					<a target="_self" href="https://open.kakao.com/o/sAeKQrs">
						<div class="logo"><img src="https://open.kakao.com/img/v1/pc/logo_talk.png"></div>
					</a>
				</div>
           </div>
        </li>
	</ul>
	<ul class="col-31 col">
        <li class="col-lg">
            <div class="map widget">
			<!-- GoogoleMap Asynchronously Loading the API ********************************************* -->
			<!-- 위도와 경도는 https://maps.google.com 의 지도에서, 오른쪽 클릭 → 이곳이 궁금한가요? 선택하면 알아낼 수 있다. -->
			<script type="text/javascript">
			  function initialize() {
				var mapLocation = new google.maps.LatLng('37.399802', '126.933791'); // 지도에서 가운데로 위치할 위도와 경도
				var markLocation = new google.maps.LatLng('37.399802', '126.933791'); // 마커가 위치할 위도와 경도
				var mapOptions = {
				  center: mapLocation, // 지도에서 가운데로 위치할 위도와 경도(변수)
				  zoom: 15, // 지도 zoom단계
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);// id: map-canvas, body에 있는 div태그의 id와 같아야 함
				var marker;
				marker = new google.maps.Marker({
						position: markLocation, // 마커가 위치할 위도와 경도(변수)
						map: map,
						//info: '말풍선 안에 들어갈 내용',
						title: '말풍선타이틀이 들어감~' // 마커에 마우스 포인트를 갖다댔을 때 뜨는 타이틀
				});
				var content = "php.ne.kr"; // 말풍선 안에 들어갈 내용
				// 마커를 클릭했을 때의 이벤트
				var infowindow = new google.maps.InfoWindow({ content: content});
				google.maps.event.addListener(marker, "click", function() {
					infowindow.open(map,marker);
				});
			  }
			  google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			<div id="map-canvas" style="width: 100%; height: 350px"></div>
            </div><!--지도-->
        </li>
        <li class="col-sm">
			<div class="mail widget"><!--메일-->
				<?php
				if(isset($_POST['submit'])){/*submit되어 Reload될때*/ 
					$userName = $_POST['userName'];
					$mail = $_POST['mail'];
					$phone = $_POST['phone'];
					$message = '';
					/*
					if(!isset($to)){
						$to  = 'yesflash@vinylc.com' . ', '; // note the comma
					}
					*/
					// subject
					$subject = '[PHP.TAXI] 문의메일입니다.';
					// message
					$message .='<p><em>보낸사람:</em> '.$userName.'</p>
								<p><em>메일주소:</em> '.$mail.'</p>
								<p><em>전화번호:</em> '.$phone.'</p>
								<p><em>컨텐츠내용:</em></p>
								<p><hr>'.$_POST['message'].'</p>';
					// To send HTML mail, the Content-type header must be set
					$to	= 'lacuca@nate.com';
					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'From:'.$userName.'<'.$mail.'>' . "\r\n";
					$result = mail($to, $subject, $message, $headers);
					if($result){
						echo '<script>alert("전송완료되었습니다");</script>';
					//	header('Location: http://playseoulbrand.kr/intro/generator/');
					}else{		
					}
				}else{
				}
				?>
				<form id="mailForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
					<table>
						<colgroup><col width="30%"><col width="*"></colgroup>
						<tr>
							<th><i class="fa fa-user" aria-hidden="true"></i><span>Name</span></th>
							<td><input name="userName" type="text" /></td>
						</tr>
						<tr>
							<th><i class="fa fa-mobile" aria-hidden="true"></i><span>Phone</span></th>
							<td><input name="phone" type="tel" /></td>
						</tr>
						<tr>
							<th><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Mail</span></th>
							<td><input name="mail" type="email" /></td>
						</tr>
						<tr>
							<th><i class="fa fa-commenting-o" aria-hidden="true"></i><span>Text</span></th>
							<td><textarea name="message"></textarea></td>
						</tr>
					</table>
					<p><input name="submit" type="submit" value="메일보내기"><input name="cancel" type="cancel" value="취소"></p>
				</form>
			</div>
		</li>
	</ul>
	<ul class="product col-3 col">
	    <li><div class="widget"><figure><img src="https://s.w.org/about/images/logos/wordpress-logo-stacked-rgb.png"><figcaption>워드프레스기반 웹사이트 + 솔루션</figcaption></figure><p>Google Analytics Solutions offer free and enterprise analytics tools to measure website, app, digital and offline data to gain customer insights.</p></div></li>
	    <li><div class="widget"><figure><img src="http://poiemaweb.com/img/html5.png"><figcaption>HTML5 + CSS3 기반의 반응형웹페이지</figcaption></figure><p>Google Analytics Solutions offer free and enterprise analytics tools to measure website, app, digital and offline data to gain customer insights.</p></div></li>
	    <li><div class="widget"><figure><img src="https://web-assets.domo.com/blog/wp-content/uploads/2014/08/connector-google-analytics-logo.png"><figcaption>Google Analytics</figcaption></figure><p>Google Analytics Solutions offer free and enterprise analytics tools to measure website, app, digital and offline data to gain customer insights.</p></div></li>
	</ul>
	<ul class="col-2 col"><!--최근포트폴리오-->
		<li><div class="widget"><?php echo do_shortcode( '[kboard_latestview id=1]' ); ?></div></li>
		<li><div class="widget"></div></li>
	</ul>
	<?php /*

60244348449-lpbdai7phf9p0n6cfnnbqk2pd6r52k5r.apps.googleusercontent.com

	 
	*/?>
</article>
<?php endwhile; endif; ?>
<?php get_footer();?>