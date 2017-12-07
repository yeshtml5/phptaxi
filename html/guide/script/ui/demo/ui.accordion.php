<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<style type="text/css" rel="stylesheet">
	.accordion-wrap { width:90%; padding:10px;  }
	.ui-accordion { position:relative; width:100%; height:100px;   }
	.ui-accordion dl {  float: left; width:20%;}
	.ui-accordion dl dt { position: relative; background:#707070;  }
	.ui-accordion dl.on dt { background: #630030; }
	.ui-accordion dl dt a { display:block; height:40px; }
	.ui-accordion dl dt a:after { position: absolute; width:1px; height:100%; right:0; border-right: 1px solid #ff0000;  content:''; }
	.ui-accordion dl.last dt a:after { border:0; width:0; }
	.ui-accordion dl dd { display:none; }
</style>		
<script type='text/javascript'>
	(function($){
		$(document).ready(function(){
		
		});
	})($);
</script>
<article id="contents">
	<div class="accordion-wrap">
		<div class="ui-accordion" data-max="300" data-min="100">
			<dl class="on">
				<dt><a href="#">accordion 1</a></dt>
				<dd>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
	 		<dl>
				<dt><a href="#">accordion 2</a></dt>
				<dd>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">accordion 3</a></dt>
				<dd>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl>
				<dt><a href="#">accordion 4</a></dt>
				<dd>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
			<dl class="last">
				<dt><a href="#">accordion 5</a></dt>
				<dd>컨텐츠내용<br>컨텐츠내용<br>컨텐츠내용<br></dd>
			</dl>
		</div><!--accordion end-->
	</div>	 
</article><!-- article End -->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?> 