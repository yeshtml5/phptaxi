<?php get_header();?>
<article class="page"><!--page-->
	<div class="content box"><!--content-->
		<?php if(have_posts()): while(have_posts()):the_post();?>
		<h1><?php the_title();?></h1>
		<p><?php the_content();?></p>
		<?php endwhile; endif; ?>
	</div><!--//content-->
</article><!--//page-->
<?php get_footer();?>
