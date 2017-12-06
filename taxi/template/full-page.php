<?php
/*
    Template Name: FULL-WIDTH-PAGE
  */
?>
<?php get_header();?>
<?php if (have_posts()): while (have_posts()):the_post();?>
<!--######################################################-->
<article class="page full-width"><!--page-->
	<section class="card">
		<p><?php the_content();?></p>
	</section>
</article>
<!--######################################################-->
<?php endwhile; endif; ?>
<?php get_footer();?>
