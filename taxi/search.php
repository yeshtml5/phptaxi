<?php get_header();?>
<p>현재 페이지는 search.php로 표현중.</p>
<p><?php printf(__('Search Results for %s'),get_search_query());?></p>
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
<?php get_footer();?>