<?php get_header();?>
<!--Contents-->
<h1>테마</h1>
<p>테마만들기</p>
<hr>
<?php
if(have_posts()):
while(have_posts()):
the_post()/*포스트가져오기*/;
?>
	<h1>아이디: <?php the_ID(); ?></h1>
	<p>제목: <a href=<?php the_permalink();?> class="" target="_self"><?php the_title();?></a></p>
	<p><?php the_content();?></p>
<?php
endwhile;
endif;
?>
<!--//Contents-->
<?php get_sidebar();?>
<?php get_footer();?>