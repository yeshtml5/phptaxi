<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/header.php"); ?>
<?php
/*
참고자료: http://www.nomadism.co.kr/19
	http://php.ne.kr

Site key : 6LcItyEUAAAAAKqwzQhUhJf9r-uS5PBAiMLSf0FS
Secret key : 6LcItyEUAAAAAIXjEELDLJIEG3u8AACJ_MknBhTm

*/
?>
<style type="text/css">
#anc {display:inline-block; margin:10px; padding:20px; color:#FFF; background:#111; }
</style><!--style end -->
<?php
	$hl="ko";
	//	$hl="en";
?>

<script type="text/javascript">
	var onloadCallback = function() {
		grecaptcha.render('html_element', {
		'sitekey':'6LcItyEUAAAAAKqwzQhUhJf9r-uS5PBAiMLSf0FS',
		'theme':'light'
		});
	};
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=<?php echo $hl;?>"async defer></script>

<div id="html_element"></div>
<!-- <div class="g-recaptcha" data-sitekey="6LcItyEUAAAAAKqwzQhUhJf9r-uS5PBAiMLSf0FS"></div> -->


<a id="anc" href="#">CHECK</a>
<!--content-wrap-->
<div class="main content-wrap card">
    <div class="content">
        <p>키발급: https://www.google.com/recaptcha/intro/index.html</p>
        <p>언어코드: https://developers.google.com/recaptcha/docs/language</p>
    </div>
	<div>
	
	</div>
</div>
<script>
(function($){
	$(document).ready(function(){
		$('#anc').bind('click',function(event){
			if(typeof(grecaptcha) !='undefined'){
				if(grecaptcha.getResponse()==""){
					alert('reCAPTCHA Error');
					return false;
				};
			};
		});
	});
})($);
</script>	
<!--//content-wrap-->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/footer.php"); ?>