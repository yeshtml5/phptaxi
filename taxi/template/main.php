<?php
  /*
    Template Name: 메인페이지
  */
?>
<?php get_header();?>
<link type="text/css" rel="StyleSheet" href="<?php path();?>src/css/main.css" />
<script type="text/javascript" src="<?php path();?>src/js/main.js"></script>

<article class="page"><!--page-->
	<?php the_content();?>
	<section class="list">
		<?php $query = new WP_Query( array( 'category_name' => 'Portfolio,wordpress,news' ) ); ?>
		<?php if ( $query->have_posts() ) : ?>
			<!-- the loop -->
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php 
				$meta = get_post_meta( get_the_ID() );
				/*peralink*/
				$link = get_permalink( get_the_ID() );
				/*특성이미지*/
				$feature_img = (isset($meta["feature_img"][0]))? $meta["feature_img"][0] : "/src/images/sample/sample_img1.jpg";
				/*태그*/
				$tags='';
				$tagList = get_the_tags();
				if ($tagList) {
					foreach($tagList as $tag) {
						$tag='<span>'.'#'.$tag->name . '</span>';
						$tags.=$tag;
					}
				}
			?>
				<dl>
					<dd><a href="<?php echo $link;?>"><img src="<?php echo $feature_img; ?>" ></a></dd>
					<dt><p class="tit"><?php the_title(); ?></p><p class="date">2017.06.03</p><p class="url"><a href=<?php echo the_permalink(); ?>><?php echo the_permalink();?></a></p></dt>
					<dd class="tag"><?php echo $tags;?></dd>
				</dl>
			<?php endwhile; ?>
			<!-- end of the loop -->
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<dl>
			<dd class="mail"><?php include(__ROOT__."/inc/mail.inc"); ?></dd>
		</dl>
		<dl>
			<dd class="inc"><?php include_once(base()."inc/particle.php"); ?></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img1.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img2.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img3.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img4.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img5.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img1.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img2.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img3.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img4.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
		<dl>
			<dd><img src="/src/images/sample/sample_img5.jpg" ></dd>
			<dt><p class="tit">타이틀</p><p class="date">2017.06.03</p><p class="url"><a href="#">http://php.taxi</a></p></dt>
			<dd class="tag"><span>#html5,#mobile</span></dd>
		</dl>
	</section>
</article>

<?php get_footer();?>
