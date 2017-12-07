<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<style type="text/css">
	input { width:100px; height:40px; }
</style>
<article id="contents">
	<div id="result">&nbsp;</div>
	<input id="ajaxBtn"type="button" onclick="ajaxExe();return false;" value="ajax load"/>
</article><!-- article End -->
<script type="text/javascript">
function ajaxExe(){
	var _result=$("#result");
	var _url="/resource/js/framework/ajax/demo/info.html";
	$.ajax({
		type:"POST",
		dataType:"json",
		url:_url,
		success:function(data){		
			//---------------------
			var _txt="";
			for(var i in data.visual){
				console.log(i+" : "+data.visual[i].title+" : "+data.visual[i].src );
				_txt+=i+" : "+data.visual[i].title+" : "+data.visual[i].src+"<br>";
			};
			_result.append(_txt);
			//----------------------
		},error:function(event){
			console.log(event.responseText);
		}
	});
	//---
};
(function($){
	$(document).ready(function(){
	});
})($);
</script>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>