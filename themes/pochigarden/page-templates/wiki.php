<?php
/**Template Name: WIKI用
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>


	<div id="primary" class="site-content wiki_s">
		<div id="content" role="main">
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>

		<div class="row">
			<div class="col-md-4">
			<div class="row">
				<?php the_post_thumbnail('thumbnail'); ?>
			</div>
			
			<p>分類：<?php esc_html(the_field('Classification',$post->ID)); ?></p>
				<p>発芽適温：<?php esc_html(the_field('Germination_s',$post->ID)); ?>℃～<?php esc_html(the_field('Germination_e',$post->ID)); ?>℃</p>
				<p>生育適温：<?php esc_html(the_field('Growth_s',$post->ID)); ?>℃～<?php esc_html(the_field('Growth_e',$post->ID)); ?>℃</p>			
			</div>
			<div class="col-md-8">
			<h4>概要 <span>-wiki-</span></h4>
			<?php esc_html(the_field('wiki',$post->ID)); ?>
				
			</div>
		</div>
		<div>
		<h4>栽培スケジュール <span>-Cultivation Schedule-</span></h4>
		<?php esc_html(the_field('Schedule',$post->ID)); ?>
		</div>
		<div class="row">
			<div class="col-md-12">
			<h4>栽培方法 <span>-Cultivation method-</span></h4>
				<div class="row">
					<div class="col-md-2">
						１．準備
					</div>
					<div class="col-md-10">
						<p><?php echo nl2br(esc_html(the_field('Preparation',$post->ID))); ?></p>
						<?php if(get_field('Preparation_m',$post->ID)): ?>
						<p class="memo">memo</p>
						<p><?php echo nl2br(esc_html(the_field('Preparation_m',$post->ID))); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						２．種まき
					</div>
					<div class="col-md-10">
						<p><?php echo nl2br(esc_html(the_field('Planting',$post->ID))); ?></p>
						<?php if(get_field('Planting_m',$post->ID)): ?>
						<p class="memo">memo</p>
						<p><?php echo nl2br(esc_html(the_field('Planting_m',$post->ID))); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						３．植付け
					</div>
					<div class="col-md-10">
						<p><?php echo nl2br(esc_html(the_field('Planting_2',$post->ID))); ?></p>
						<?php if(get_field('Planting_2_m',$post->ID)): ?>
						<p class="memo">memo</p>
						<p><?php echo nl2br(esc_html(the_field('Planting_2_m',$post->ID))); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						４．世話
					</div>
					<div class="col-md-10">
						<p><?php echo nl2br(esc_html(the_field('care',$post->ID))); ?></p>
						<?php if(get_field('care_m',$post->ID)): ?>
						<p class="memo">memo</p>
						<p><?php echo nl2br(esc_html(the_field('care_m',$post->ID))); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						５．収穫
					</div>
					<div class="col-md-10">
						<p><?php echo nl2br(esc_html(the_field('harvest',$post->ID))); ?>
						<?php if(get_field('harvest_m',$post->ID)): ?>
						<p class="memo">memo</p>
						<p><?php echo nl2br(esc_html(the_field('harvest_m',$post->ID))); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>



	<?php
	if(get_the_terms($post->ID,'plants_group')):
	 $terms = get_the_terms($post->ID, 'plants_group');
	 $term_id = array();
 	foreach( $terms as $term ){
	array_push( $term_id, $term->term_id );
          break ;
     }	
     query_posts( array(
	 		'post__not_in' => array($post->ID), //現在表示している記事を検索結果に表示しない
	'tax_query' => array( 
		array(
			'taxonomy'=>'plants_group',
			'post__not_in' => array($post->ID),
			'posts_per_page' => 6,
			'terms'=> $term_id,	
			'include_children'=>false,
			'field'=>'term_id',
			'operator'=>'IN'
			),
		'relation' => 'AND'
		)
	)
	)
?>
<?php if(have_posts()): ?>

						<?php if(get_field('start',$post->ID)): ?>
						<h3><?php echo esc_attr($term->name); ?>の購入＆入手履歴</h3> 
						<p><?php echo nl2br(esc_html(the_field('start',$post->ID))); ?></p>
						<?php endif; ?>
<div>
  <h3><?php echo esc_attr($term->name); ?>の栽培記録</h3>  
<?php while (have_posts()) : the_post(); ?>
    <div class="col-md-12 box250">
			
			<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
			
			<p class="photo"> 
					<?php if(has_post_thumbnail()): ?>
					<?php the_post_thumbnail('size230_160'); ?>
					<?php endif; ?>
			</p>
			
			<ul>
				<li class="date"><span><?php echo get_the_date(); ?></span>&nbsp;</li>
				<p><?php echo the_excerpt(); ?></p>
			</ul>
			<p class="more-link">
				<a href="<?php the_permalink(); ?>" title="｢<?php the_permalink(); ?>｣の続きを読む">続きを読む　&raquo;</a>
			</p>
			<span class="tape"></span>
			</div>

<?php endwhile; ?>
     
</div>
<?php endif; ?>
<?php endif; ?>
<?php wp_reset_query() ?>

		
				
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
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
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>