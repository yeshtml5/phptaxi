<?php
/*
표현되는 우선순위
category.php -> archive.php -> index.php
meta데이타
*/
?>
<?php get_header();?>
<!--archive-->
<article class="archive">
	<div class="content search"><!-- 검색폼-->
		<?php get_search_form();?>
	</div>	
	<?php if(have_posts()):while(have_posts()):the_post();?>		
	<section>
		<div class="content box">
			<!--content-->
			<h1><?php the_title();?></h1>
			<?php /*특성이미지*/ if(isset($_post->ID) && has_post_thumbnail($_post->ID)):
				//the_post_thumbnail();
				echo '<p>';
				echo '<a href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) . '">';
				echo get_the_post_thumbnail( $_post->ID, 'thumbnail' );
				echo '</a>';
				echo '</p>';
			 else: ?>
				<p>
					<?php the_content();?>
				</p>
				<?php endif ?>
				<p class="meta">
					<?php echo get_post_meta($post->ID, 'hashTag', true); ?>
				</p>
		</div>
		<!--//content-->
	</section>
	<?php endwhile; endif; ?>
	<nav class="navi page">
		<?php 
			if(function_exists('wp_pagenavi'))
			{
				wp_pagenavi(); 
			}
		?>
	</nav>
</article>
<!--//archive-->
<?php get_footer();?>
