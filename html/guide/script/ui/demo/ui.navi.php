<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<script type="text/javascript" src="/src/js/framework/ui/ui.navi.js"></script>

<style type="text/css" rel="stylesheet">

	 .ui-navi  { position:relative; width:550px; color: #000; font-size:16px; height:100px;  border:3px solid #000; margin:200px 0 200px 100px;}
	 .ui-navi > dl { float:left; width:100px;  background:#E2E4E6; margin-left:10px; text-align: center; }
	 .ui-navi > dl.on { background:#FF0000;  }
	 .ui-navi > dl dt a { display:block; padding:10px; }
	 .ui-navi > dl > dd { position: absolute; left:0; top:50px; border:1px solid #006EA6; display:none; }
	 .ui-navi > dl.on > dd { display:block; }
	 .ui-navi > dl > dd > dl { float:left; display:block;  }
	 .ui-navi > dl > dd > dl.on dt a { color:#0000C3; background:#FF0000;  }
	  
	 #navi li.d1 {  float: left; margin-right:20px; font-size: 16px; position: relative; }
	 #navi li.d1 div.d1 { width:120px; height:30px; border:1px solid #ff0000; background: #0000C3; font-size: 16px; }
	 #navi li.d1 ul.d2 { clear:both; position: absolute; left:0px; top:30px; width:100%;}
	 #navi li.d1 ul.d2 li.d2 { width:120px; height:30px; border:1px solid #E39B79; background: #FF6666; float: left;  }
</style>		
<script type='text/javascript'>
	(function($) {
		$(document).ready(function() {
			var _navi = new ui.Navi({				
				wrap : $('.ui-navi'),
				depth1 : $(">dl>dt>a"),
				depth2 : $("dd>dl>dt>a")
			});
			
			 $('.ui-navi').on('select-menu',function(event,data){
			// 	event.preventDefault();
				console.log(data);
			 });
		});
	})($);
</script>
<article id="contents">
	<div id="navi" class="ui-navi" data-active1="2" data-active2="5">
		<dl>
			<dt><a href="#">navi 1</a></dt>
			<dd>
				<dl><dt><a href="#">1sub 1</a></dt></dl>
				<dl><dt><a href="#">1sub 2</a></dt></dl>
				<dl><dt><a href="#">1sub 3</a></dt></dl>
				<dl><dt><a href="#">1sub 4</a></dt></dl>
				<dl><dt><a href="#">1sub 5</a></dt></dl>
				<dl><dt><a href="#">1sub 6</a></dt></dl>
			</dd>
		</dl><!-- depth1 -->
		<dl>
			<dt><a href="#">navi 2</a></dt>
			<dd>
				<dl><dt><a href="#">2sub 1</a></dt></dl>
				<dl><dt><a href="#">2sub 2</a></dt></dl>
				<dl><dt><a href="#">2sub 3</a></dt></dl>
				<dl><dt><a href="#">2sub 4</a></dt></dl>
				<dl><dt><a href="#">2sub 5</a></dt></dl>
				<dl><dt><a href="#">2sub 6</a></dt></dl>
			</dd>
		</dl><!-- depth1 -->
		<dl>
			<dt><a href="#">navi 3</a></dt>
			<dd>
				<dl><dt><a href="#">3sub 1</a></dt></dl>
				<dl><dt><a href="#">3sub 2</a></dt></dl>
				<dl><dt><a href="#">3sub 3</a></dt></dl>
				<dl><dt><a href="#">3sub 4</a></dt></dl>
				<dl><dt><a href="#">3sub 5</a></dt></dl>
				<dl><dt><a href="#">3sub 6</a></dt></dl>
			</dd>
		</dl><!-- depth1 -->
		<dl>
			<dt><a href="#">navi 4</a></dt>
			<dd>
				<dl><dt><a href="#">4sub 1</a></dt></dl>
				<dl><dt><a href="#">4sub 2</a></dt></dl>
				<dl><dt><a href="#">4sub 3</a></dt></dl>
				<dl><dt><a href="#">4sub 4</a></dt></dl>
				<dl><dt><a href="#">4sub 5</a></dt></dl>
				<dl><dt><a href="#">4sub 6</a></dt></dl>
			</dd>
		</dl><!-- depth1 -->
		<dl>
			<dt><a href="#">navi 5</a></dt>
			<dd>
				<dl><dt><a href="#">5sub 1</a></dt></dl>
				<dl><dt><a href="#">5sub 2</a></dt></dl>
				<dl><dt><a href="#">5sub 3</a></dt></dl>
				<dl><dt><a href="#">5sub 4</a></dt></dl>
				<dl><dt><a href="#">5sub 5</a></dt></dl>
				<dl><dt><a href="#">5sub 6</a></dt></dl>
			</dd>
		</dl><!-- depth1 -->
	</div>
</article><!-- article End -->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>