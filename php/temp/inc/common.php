<?php
/********************************************************************
*	function php
*
********************************************************************/
define("__ROOT__",$_SERVER['DOCUMENT_ROOT']);
define("__PATH__",__ROOT__."/php/");
define("__URL__","{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");/*도메인으로 표시되는URL*/
ini_set("display_errors", 0);

	function navi(){
		include_once __PATH__."/inc/inc.navi.php" ;
	}
	function head(){
		include_once __PATH__."/inc/inc.header.php" ;
	} 
	function footer(){
		 include_once __PATH__."/inc/inc.footer.php" ;
	}
?>