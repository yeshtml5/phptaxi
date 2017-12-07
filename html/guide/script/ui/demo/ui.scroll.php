<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<style type="text/css" rel="stylesheet">
	#contents { height:500px !important; }
	.scroll-wrap { position: relative;  }
	#scrollCnt {  position: absolute; border:3px solid #006EA6; top: 50px; left: 30px; width:80px; height:400px;}
	#track { position: absolute;  left: 0px; top:0px;  width:50px; height:400px; background: #0000FF; }
	#cursor { position: absolute;  left: 0px; top:100px;  width:50px; height:100px; background: #FF0000; }
	
	#scrollCnt1 {  position: absolute; border: 3px solid #180A1F; top: 50px; left: 150px; width:300px; height:80px; display: block; }
	#track1 { position: absolute;  left: 10px; top:30px;  width:250px; height:30px; background: #0000FF; }
	#cursor1 { position: absolute;  left: 10px; top:30px;  width:50px; height:30px; background: #FF0000; }
	
	#scrollCnt2 {  position: absolute; border: 5px solid #180A1F; top: 250px; left: 150px; width:270px; height:100px; display: block;  }
	#track2 { position: absolute;  left: 10px; top:30px;  width:250px; height:50px; background: #0000FF; }
	#cursor2 { position: absolute;  left: 10px; top:30px;  width:100px; height:50px; background: #FF0000; }
</style>
<script type="text/javascript" src="/src/js/framework/ui/ui.scroll.js"></script>
<script type='text/javascript'>
	(function($) {				
		$(document).ready(function() {
			/*
			 *	IE7, IE8 부분에 article , section  같은 마크업이 google.js 쓰더라도 잘 안먹음. 
			 * 
			 */
			//------------ 세로 scroll

			 var _scroll = new ui.Scroll({
				container : $('#scrollCnt'),
				cursor : $('#cursor'),
				track : $('.ui-scroll-track'),
				type : "top",
				divide: 1,
				sample:'trax',
				callback : function(obj) {
					$('#text').text(obj.ratio);
					if(_scroll){
						_scroll.opts['aaa']='bbbb';
						console.log(obj);
					}
					
				}
			});
			//------------ 가로 scroll
			var _scroll1 = new ui.Scroll({
				container : $('#scrollCnt1'),
				cursor : $('.ui-scroll-cursor'),
				track : $('.ui-scroll-track'),
				type : "left",			
				divide: 3,
				callback : function(obj) {
					$('#text').text(obj.ratio);
						console.log(obj)
				}
			});
			
			 //------------ 가로 scroll
			 var _scroll2 = new ui.Scroll({
				container : $('#scrollCnt2'),
				type : "left",
				callback : function(obj) {
					$('#text').text(obj.ratio);
						console.log(obj)
				}
			});
			_scroll1.setRatio(0.5);
			//_scroll2.snapToDivide(3);
		});
	})($);
	
	$('body').on('click', '[rel=ajax]', function(e){
		e.preventDefault();
		$.ajax(this.href).done(function(html) {
			$(this.target).html(html);
		});
	});
</script>
<a href="/list.do?p=1" rel="ajax" target="#list" >목록</a>
<div id="list"></div>

<div id="contents"><!-- article 같은 태그보다는 ie7, ie8 을 위해 div 로 사용-->
	<div class="scroll-wrap">
		<div id="text" style="font-size: 17px;">0</div>
		<div id="scrollCnt">
			<div id="track" class="ui-scroll-track">
				&nbsp;
			</div>
			<div id="cursor" class="ui-scroll-cursor">
				&nbsp;
			</div>
		</div><!-- scrollCnt End -->
	</div>
	<div class="scroll-wrap">
		<div id="scrollCnt1">
			<div id="track1" class="ui-scroll-track">
				&nbsp;
			</div>
			<div id="cursor1" class="ui-scroll-cursor">
				&nbsp;
			</div>
		</div><!-- scrollCnt End1 -->
	</div>
	<div class="scroll-wrap">
		<div id="scrollCnt2">
			<div id="track2" class="ui-scroll-track">
				&nbsp;
			</div>
			<div id="cursor2" class="ui-scroll-cursor">
				&nbsp;
			</div>
		</div><!-- scrollCnt End1 -->
	</div>				
</div><!-- article End -->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?> 