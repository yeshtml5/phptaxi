<!--시작-->
<article style="padding:50px;">
<section class="center w80 mgb50">
	<ul>
		<li><p>사용자 마이페이지개념 /wp-admin/ 사용하지않음</p></li>
		<li><p>short_code 제공</p></li>
		<li></li>
	</ul>
</section>
<section style="width:80%;margin:0 auto;padding:50px;" class="desc">
<?php
	echo do_shortcode('[twofactor_user_settings]');
?>
</section>
<section>
	<?php
	echo do_shortcode('[twofactor_user_qrcode]'); 
	 ?>
</section>
</article>
<!--끝-->
