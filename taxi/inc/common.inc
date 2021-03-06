<?php
/********************************************************************
*	config 설정
********************************************************************/
error_reporting(E_ALL);
ini_set("display_errors", 1);/* 0:에러출력안함 , 1:에러출력*/
/********************************************************************
*	common.inc
********************************************************************/
define("__ROOT__",$_SERVER['DOCUMENT_ROOT']);
define("__PATH__","/wordpress/wp-content/themes/taxi/");/*워드프레스테마설치ROOT*/
define("__URL__","{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");/*도메인으로 표시되는URL*/
define("__BASE__",__ROOT__.__PATH__);/*PHP include BASE*/

function path(){
	echo __PATH__;
}
function base(){
	return __ROOT__.__PATH__;
}
function import(){
	include_once __PATH__."import.inc" ;
}
function navi(){
	include_once __PATH__."navi.inc" ;
}
function head(){
	include_once __PATH__."header.inc" ;
}
function footer(){
	 include_once __PATH__."footer.inc" ;
}
//console 출력
function console($str,$mode="log"){
	$str = str_replace('"', '\\"', $str);
	if($mode=="log"){
		echo "<script>console.log('%c$str','font-size:14px;color:#111;');</script>";
	}else if($mode=="warn"){
		echo "<script>console.warn('%c$str','font-size:14px;color:#111;');</script>";
	}else if($mode=="error"){
		echo "<script>console.error('%c$str','font-size:14px;color:#111;');</script>";
	}
}
// 모바일접속환경인지체크
function isMobile() {
	$mAgent = array("iPhone","iPod","Android","Blackberry","Opera Mini", "Windows ce", "Nokia", "sony" );
	$chkMobile = false;
	for($i=0; $i<sizeof($mAgent); $i++){
	    if(stripos($_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
	        $chkMobile = true;
	        break;
	    }
	}
	return $chkMobile;
}

/*********************************************************************/
//DB접속
function db_connect(){
	$db = mysqli_connect("localhost", "phptaxi", "thsdhksgnl!1", "phptaxi");
	if($db){
		console('ok');
	}else{
		console("db fail","error");
	}
}
?>
