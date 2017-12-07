<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<style type="text/css" rel="stylesheet">
	#timerId , #timerId2 {
		width: 500px;
		height: 200px;
		font-size: 20px;
		font-weight: bolder;
		background: #0000FF;
		color: #FFFFFF;
	}
	 #timerId2 { background: #FF0000;}
	#control input {
		padding: 20px;
	}
</style>
<script type="text/javascript" src="/src/js/framework/event/event.timer.js"></script>
<script type='text/javascript'>
	(function($) {
		$(document).ready(function() {
			var opt2 = {
				"interval" : 100,
				"limit" : 100,
				"container" : $('#timerId'),
				"callback" : function(data) {							
					$('#timerId').text('Repeat : ' + data);
				}
			};
			timer = new evt.Timer(opt2);
			timer.start();
		 
			//timer.start();
		 
			var opt1 = {
				"interval" : 1000,
				"callback" : function(data) {
					$('#timerId2').text('Repeat_Fast : ' + data);
				}
			};
			timer2 = new evt.Timer(opt1);
			timer2.start();
			 
		});
	})($);
</script>
<section id="timerId">
	1
</section><!-- article End -->
<section id="timerId2">
	1
</section><!-- article End -->
<div id="control">
	<input type="button" value="Timer.pause" onclick="timer.pause();return false;" />
	<input type="button" value="Timer.resume" onclick="timer.resume();return false;" />
	<input type="button" value="Timer.reset" onclick="timer.reset();return false;" />
	<input type="button" value="Timer.start" onclick="timer.start();return false;" />
	<input type="button" value="Timer.stop" onclick="timer.stop();return false;" />

</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>