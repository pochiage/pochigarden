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

get_header(); ?>

	<section id="primary" class="col-md-9">
		<div id="content" role="main">
<h3>アーカイブ</h3>


	<?php if (have_posts()) : /* ループ開始 */

		while (have_posts()) : the_post(); ?>
		
			<div class="col-md-12 box">
			
			<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
			
			<p class="photo"> 
					<?php if(has_post_thumbnail()): ?>
					<?php the_post_thumbnail('size250_160'); ?>
					<?php endif; ?>
			</p>
			
			<ul>
				<li class='date'><span><?php echo get_the_date(); ?></span></li>
				<p><?php echo the_excerpt(); ?></p>
			</ul>
			<p class="more-link">
				<a href="<?php the_permalink(); ?>" title="｢<?php the_permalink(); ?>｣の続きを読む">続きを読む　&raquo;</a>
			</p>
			<span class="tape"></span>
			</div>

		<?php endwhile;
	else : ?>

		<div class="box-top"></div>
		<article class="box-middle post">

			<h3>Not Found</h3>

			<p>Sorry, but you are looking for something that isn't here.</p>

		</article>
		<div class="box-bottom"></div>

	<?php endif; ?>

<div class="col-md-12">
<?php		if (function_exists('wp_pagenavi')): /* ページャープラグイン wp_pagenavi用 */

		wp_pagenavi();

	else:

		if ( $wp_query->max_num_pages > 1 ) : /* 複数ページ用のナビゲーション */ ?>

			<nav class="navigation">

				<div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>

				<div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
			</nav>

		<?php endif;

	endif; ?>



		</div><!-- #content -->
	</section><!-- #primary -->
<div class="col-md-3">
<?php dynamic_sidebar(sidebar4); ?>
</div>
<?php get_footer(); ?>