<?php get_header();?>
<?php /*wordpress 강제p태그 삭제*/ remove_filter( 'the_content', 'wpautop' ); ?>
<article class="page"><!--page-->
	<div class="content box"><!--content-->
		<?php if(have_posts()): while(have_posts()):the_post();?>
		<?php the_content();?>
		<?php endwhile; endif; ?>
	</div><!--//content-->
</article><!--//page-->
<?php get_footer();?>

