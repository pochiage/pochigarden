<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary">
		<div id="content" class="col-md-9" role="main">
<?php
$s = $_GET['s'];
$water = $_GET['water'];
$exposure = $_GET['exposure'];
$low = $_GET['low'];
$high = $_GET['high'];

 
if($water){
    $metaquerysp[] = array(
            'key'=>'water',
            'value'=> $water,
           // 'compare'=>'=',
            );
}
if($exposure){
    $metaquerysp[] = array(
            'key'=>'exposure',
            'value'=> $exposure,
            'compare'=>'=',
            );
}
if($low || $high){$metaquerysp[] = array(
            'key'=>'Germination_s',
            'value'=>array( $low, $high ),
            'compare'=>'BETWEEN',
            'type'=>'NUMERIC',
            );
}
$metaquerysp['relation'] = 'AND';
 
?> 
<?php
 
$args = array(
    //'tax_query' => $taxquerysp,
    'meta_query' => $metaquerysp,
    's' => $s,
   // 'posts_per_page' => 12,
    'paged' => $paged,
    );
query_posts($args); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?>
					<?php if($water){ ?>水やり：<?php echo $water; ?><br><?php } ?>
					<?php if($exposure){ ?>日当たり：<?php echo $exposure; ?><br><?php } ?>
					<?php if($low == -99 && $high == 99){}else{ ?>発芽適温：<?php if($low == -99){ ?>下限なし<?php }else{ echo number_format($low).'℃'; } ?> ～ <?php if($high == 99){ ?>上限なし<?php }
						else{ echo number_format($high).'℃';} ?><br>
					<br>
					<?php } ?>
					<?php if($G_low == -99 && $G_high == 99){}else{ ?>生育適温：<?php if($G_low == -99){ ?>下限なし<?php }else{ echo number_format($G_low).'℃'; } ?> ～ <?php if($G_high == 99){ ?>上限なし<?php }
						else{ echo number_format($G_high).'℃';} ?><br>
					<br>
					<?php } ?>
					</h1>
			</header>

			<?php twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
							<div id="content" role="main">
	

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
		</div><!-- #content -->
			<?php endwhile; ?>

			<?php // twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>
		<?php
wp_pagenavi(); //ページ送り
wp_reset_query();
 ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<div class="col-md-3">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>