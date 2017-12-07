<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<script type="text/javascript" src="/src/js/framework/ui/ui.slider.js"></script>
<style type="text/css" rel="stylesheet">
	 .ui-slider { position: relative; display: block; text-align: center; width:90%; height:900px; margin:0 auto; border:1px solid #ff0000; }
     .ui-slider:after { content: ''; clear:both; }
     .ui-slider .ui-slider-view { position: relative;  width:100%; height:400px; overflow: hidden; }
	 .ui-slider .ui-slider-view li { position: absolute; width:100%; }
     .ui-slider .ui-slider-view li.on { z-index: 2; }
     .ui-slider .ui-slider-view li img { width:100%; height:auto; min-height: 400px; vertical-align: top;}

     .ui-slider .ui-slider-arrow { position: absolute; left:0; top:210px; width:100%; z-index: 10;}
     .ui-slider .ui-slider-arrow a { background: #FFF; padding: 20px; transition: background-color 500ms ;  }
     .ui-slider .ui-slider-arrow a:hover { background-color: #A7B526;}
     .ui-slider .ui-slider-arrow .ui-slider-prev { float: left;}
     .ui-slider .ui-slider-arrow .ui-slider-next { float: right;}

     .ui-slider .ui-slider-pager { width:100%; text-align: center; margin-top:30px; }
     .ui-slider .ui-slider-pager li { display: inline-block; clear:both; }
     .ui-slider .ui-slider-pager li a {  padding:4px;  color: #d9d9d9; border:0px solid #ff0000;}
     .ui-slider .ui-slider-pager li a:hover {  color:#000000;}
     .ui-slider .ui-slider-pager li.on a { color:#000000;}
</style>
<script type='text/javascript'>
	(function(){
		$(document).ready(function(){
			var _slider=new ui.Slider({
                wrap : $('.ui-slider'),
                view : $('.ui-slider-view li'),
				prev : $('.ui-slider-prev'),
				next : $('.ui-slider-next'),
                pager : $('.ui-slider-pager'),
				callback : function(data){
                    console.log('실행');
					console.log(data);
				}
			});
		});
	})();
</script>
<article id="contents">
	<div class="ui-slider">
		<ul class="ui-slider-view"> <!-- li 갯수 체크하여 Pager생성 -->
            <li><img src="/src/images/common/gallery/img1.jpg "></li>
            <li><img src="/src/images/common/gallery/img2.jpg "></li>
            <li><img src="/src/images/common/gallery/img3.jpg "></li>
            <li><img src="/src/images/common/gallery/img4.jpg "></li>
            <li><img src="/src/images/common/gallery/img5.jpg "></li>
            <li><img src="/src/images/common/gallery/img6.jpg "></li>
            <li><img src="/src/images/common/gallery/img7.jpg "></li>
		</ul>
        <div class="ui-slider-pager">
            <!-- 동적생성
            <ul>
                <li class="on"><a href="#">●</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
            </ul>
            -->
        </div>
		<div class="ui-slider-arrow">
			<div><a class="ui-slider-prev" href="#">이전</a></div>
			<div><a class="ui-slider-next" href="#">다음</a></div>
		</div>
	</div>
</article><!-- article End -->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>