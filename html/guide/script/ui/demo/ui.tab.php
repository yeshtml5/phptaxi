<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<style type="text/css" rel="stylesheet">
/* ----------------------------------------------------------------------------	ui-tab --------------------- */
	#contents .tab-wrap { margin:20px; width:80%;  border:0px solid #FF0000; }
	
	.ui-tab { overflow: hidden; position: relative; width:100%; height: 300px; margin-bottom: 10px; padding: 0px 1px;}
	.ui-tab dl { float: left; color: #4C4C4C; font-size: 12px; }
	.ui-tab dl dt a { line-height: 38px; height:38px; background: #F2F2F2; display: block; overflow: hidden; margin-right: -1px; text-align: center; color: #333333; border: 1px solid #d9d9d9; border-bottom: 1px solid #B5B5B5;  }
	.ui-tab dl dt a:hover { background: #FFFFFF;  }
	.ui-tab dl dt a:visited, .ui-tab li a:link , .ui-tab li a:active { text-decoration: none; }
	.ui-tab dl.on dt a { position: relative; z-index: 2; height: 39px; line-height: 39px; font-weight: bold; border:1px solid #B5B5B5; border-bottom: 0px; background: #FFFFFF; }
	.ui-tab dl dd { display:none; width:100%; height:200px; background:#E2E4E6; position:absolute; left:0; }
	.ui-tab dl.on dd { display:block; }
	.ui-tab.type2 dl { width:50%; }
	.ui-tab.type3 dl { width:33.33%; }
	.ui-tab.type4 dl { width:25%; }
	.ui-tab.type5 dl { width:20%; }
</style>
<script type="text/javascript" src="/src/js/common/common.bind.js"></script>
<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$('.ui-tab').bind('tabChange',function(event,data){
			//	event.preventDefault();
				console.log(data.select);
			});			
		});
	})($);
</script>

<article id="contents">
	<div class="tab-wrap">
		<div class="ui-tab type5">
			<dl class="on">
				<dt><a href="#">tab 1</a></dt>
				<dd><a href="#">컨텐츠내용111</a><br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
	 		<dl>
				<dt><a href="#">tab 2</a></dt>
				<dd>컨텐츠내용222<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">tab 3</a></dt>
				<dd>컨텐츠내용333<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">tab 4</a></dt>
				<dd>컨텐츠내용444<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">tab 5</a></dt>
				<dd>컨텐츠내용555<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
		</div><!--tab end-->
		
		<div class="ui-tab type2">
			<dl class="on">
				<dt><a href="#">tab 1</a></dt>
				<dd><a href="#">컨텐츠내용111</a><br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
	 		<dl>
				<dt><a href="#">tab 2</a></dt>
				<dd>컨텐츠내용222<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
		</div><!--tab end-->
		
		<div class="ui-tab type4">
			<dl class="on">
				<dt><a href="#">tab 1</a></dt>
				<dd><a href="#">컨텐츠내용111</a><br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
	 		<dl>
				<dt><a href="#">tab 2</a></dt>
				<dd>컨텐츠내용222<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">tab 3</a></dt>
				<dd>컨텐츠내용333<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">tab 4</a></dt>
				<dd>컨텐츠내용444<br>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
		</div><!--tab end-->
	</div>
</article><!-- article End -->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>