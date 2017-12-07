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
				$link = get_permalink( get_the_ID() );/*peralink*/
				$feature_img = (isset($meta["feature_img"][0]))? $meta["feature_img"][0] : '';/*특성이미지*/
				$date = (isset($meta["date"][0]))? $meta["date"][0] : '';/*프로젝트기간*/
				$url = (isset($meta["url"][0]))? $meta["url"][0] : '';/*url*/
				$tags='';/*태그*/
				$tagList = get_the_tags();
				if ($tagList) {
					foreach($tagList as $tag) {
						$tag='<span>'.'#'.$tag->name . '</span>';
						$tags.=$tag;
					}
				}
			?>
				<dl>
					<?php if(isset($feature_img)) : ?>
					<dd><a href="<?php echo $link;?>"><img src="<?php echo $feature_img; ?>" ></a></dd>
					<?php endif;?>
					<dt>
						<p class="tit"><?php the_title(); ?></p>
						<?php if($date!=''){ echo "<p class='date'>{$date}</p>";}?>
						<?php if($url!=''){ echo "<p class='url'><a href={$url} target='_blank'>{$url}</a></p>";}?>
					</dt>
					<?php if($tag!=''){ echo "<dd class='tag'>{$tags}</dd>";}?>
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
			<dt><p class="tit center">카카오 오픈채팅</p>
			<p class="url center"><a href="https://open.kakao.com/o/sAeKQrs" target="_blank"><img src="https://i1.daumcdn.net/image.hope/etc//cskakaocom/pc/thumb/thumb_kakaotalk.png" ></a></p></dt>
			<dd class="tag"><span>Html/Css/JavaScript/WordPress/</span></dd>
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
