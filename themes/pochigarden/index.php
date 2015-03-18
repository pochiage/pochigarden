<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="col-md-8">
<!-- index.php	 -->	
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
			?>

				<?php get_template_part( 'content', get_post_format() );  ?>

				<div class="ads">
					<span>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- 285px -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:285px;height:285px"
					     data-ad-client="ca-pub-2231992030256137"
					     data-ad-slot="2151681401"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- 285px -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:285px;height:285px"
					     data-ad-client="ca-pub-2231992030256137"
					     data-ad-slot="2151681401"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					</span>
				</div>
				

			<?php endwhile; // end of the loop. ?>

			<div class="col-md-12">
				<?php	if (function_exists('wp_pagenavi')): /* ページャープラグイン wp_pagenavi用 */

					wp_pagenavi();
						
				else:
			
					if ( $wp_query->max_num_pages > 1 ) : /* 複数ページ用のナビゲーション */ ?>
			
						<nav class="navigation">
			
							<div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
			
							<div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
						</nav>
			
					<?php endif;
			
				endif; ?>
			
			</div>
		</div><!-- #content -->


	</div><!-- #primary -->



<div class="col-md-3 col-md-offset-1">
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>