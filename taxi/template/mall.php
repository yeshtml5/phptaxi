<?php
/*
    Template Name: 쇼핑몰페이지
  */
?>
<?php get_header();?>
<?php
/*wordpress function*/
$parent_title = get_the_title($post->post_parent);
$parent_link = get_permalink($post->post_parent);
$current_title = get_the_title($post->ID);
$current_link = get_permalink($post->ID);
?>
<?php /*wordpress 강제p태그 삭제*/ remove_filter( 'the_content', 'wpautop' ); ?>
<?php if(have_posts()): while(have_posts()):the_post();?>
<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.2.js"></script><!--아임포트-->
<!--######################################################-->
<article><!--page-->
	<?php include_once($_SERVER['DOCUMENT_ROOT'].__PATH__."/inc/inc.location.php");/*location*/?>	
	<p><?php the_content();?></p>
	<script type="text/javascript">
		var IMP = window.IMP; // 생략가능
		IMP.init('imp53440130'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용
		$(document).ready(function(){
			$('#buy').bind('click',function(event){
				console.log('실행');		
				IMP.request_pay({
					pg : 'inicis', // version 1.1.0부터 지원.
					pay_method : 'card',
					merchant_uid : 'merchant_' + new Date().getTime(),
					name : '주문명:결제테스트',
					amount : 14000,
					buyer_email : 'iamport@siot.do',
					buyer_name : '구매자이름',
					buyer_tel : '010-1234-5678',
					buyer_addr : '서울특별시 강남구 삼성동',
					buyer_postcode : '123-456',
					m_redirect_url : 'https://www.yourdomain.com/payments/complete'
				}, function(rsp) {
					if ( rsp.success ) {
						var msg = '결제가 완료되었습니다.';
						msg += '고유ID : ' + rsp.imp_uid;
						msg += '상점 거래ID : ' + rsp.merchant_uid;
						msg += '결제 금액 : ' + rsp.paid_amount;
						msg += '카드 승인번호 : ' + rsp.apply_num;
					} else {
						var msg = '결제에 실패하였습니다.';
						msg += '에러내용 : ' + rsp.error_msg;
					}
					alert(msg);
				});		
			});
		});
	</script>
	<section>
		<a id="buy" href="#">결제테스트</a>
	</section>
	<section>
		<?php echo do_shortcode('[catlist name="wordpress"]');?>
	</section>
</article><!--//page-->

<!--######################################################-->
<?php endwhile; endif; ?>
<?php get_footer();?>