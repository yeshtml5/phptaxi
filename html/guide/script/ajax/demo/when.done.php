<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<style type="text/css">
	input {
		width: 100px;
		height: 40px;
	}
	#popup {
		position: relative;
		width: 400px;
		height: 300px;
		background: #0000C3;
		display: none;
	}
</style>
<article id="contents">
	<div id="popup">
		&nbsp;
	</div>
	<a id="ajaxBtn" href="/src/js/framework/ajax/demo/info.html" rel="ajax">AJAX LOAD</a>

</article><!-- article End -->
<script type="text/javascript">
	function ajaxExe() {
		var _result = $("#result");
		var _url = "/src/js/framework/ajax/demo/info.html";
		var _url1 = "/src/js/framework/ajax/demo/info1.html";
		$.when($.ajax({
			url : _url,
			contentType : "application/x-www-form-urlencoded; charset=UTF-8",
			dataType : 'json'
		}), $.ajax({
			url : _url1,
			contentType : "application/x-www-form-urlencoded; charset=UTF-8",
			dataType : "json"
		})).done(function(data1, data2) {
			console.log('--ok');
			var _opts = $.extend({}, data1[0], data2[0]);
		}).fail(function(data1, data2) {
			console.log('--fail');
			console.log(data2);
		});

	};
	var modal = {
		open : function() {
			var def = $.Deferred();
			$('#popup').show();
			def.resolve();
			return def;
		},
		close : function() {
			var def = $.Deferred();
			$('#popup').hide();
			def.resolve({
				type : 'aaa'
			});
			return def;
		}
	};

	// 라이브러리 개밮ㄹ해서 외부인원 한테 제공하느느 입ㅈ장이면
	// framework.js

	(function($) {
		$(document).ready(function() {

			$('#ajaxBtn').on('click', function(event) {
				if ($(this).attr('rel') == "ajax") {
					event.preventDefault();
					ajaxExe();
					modal.open().done(function() {
						alert('모달창에서 클릭');
					});
				}
				//$('#popup').show();

			});

			$('#popup').bind('click', function(event) {
				modal.close().done(function(o) {
					alert(o.type);
				});

			});
		});
	})($); 
</script>
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>