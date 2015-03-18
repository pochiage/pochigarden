<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();
 ?>

 	<section id="primary" class="col-md-9">
<!-- taxonomy  -->
		<div id="content" role="main">

		<?php 
			if(! is_page()){
				if(have_posts()): 
				//カテゴリ・タグ・カスタムタクソノミー オブジェクトを取得
				 $term = get_current_term(); 
				?>
			  <h3 class="post_title"><?php echo esc_html($term->name); ?></h3>  
			  <?php while (have_posts()) : the_post(); ?>
			
				    <div class="col-md-12 box">
							
							<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
							
							<p class="photo"> 
									<?php if(has_post_thumbnail()): ?>
									<?php the_post_thumbnail('size250_160'); ?>
									<?php endif; ?>
							</p>
							
							<ul>
								<li class="text-center"><?php echo get_the_date(); ?></li>
								<p><?php echo the_excerpt(); ?></p>
							</ul>
							<p class="more-link">
								<a href="<?php the_permalink(); ?>" title="｢<?php the_permalink(); ?>｣の続きを読む">続きを読む　&raquo;</a>
							</p>
							<span class="tape"></span>
					</div>
			
				<?php endwhile;
			
			endif; 
			 }?>
		</div><!-- #content -->

<?php 	if (function_exists('wp_pagenavi')): /* ページャープラグイン wp_pagenavi用 */

		wp_pagenavi();

	else:

		if ( $wp_query->max_num_pages > 1 ) : /* 複数ページ用のナビゲーション */ ?>

			<nav class="navigation">

				<div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>

				<div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
			</nav>

		<?php endif;

	endif; ?>

	</section><!-- #primary -->


<div class="col-md-3">
<?php dynamic_sidebar(sidebar2); ?>
</div>

<?php get_footer(); ?>