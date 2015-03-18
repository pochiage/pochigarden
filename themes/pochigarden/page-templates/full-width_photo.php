<?php
/**
 * Template Name: photo用, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">
		
		
		<?php get_header(); ?>

		<?php
		$args = array(
			'post_type' => array( 'plants', 'biotope' ) ,
			'showposts' =>24,
			'orderby' => rand,
			'taxonomy' => 'plants_group', 
			);
		?>		
		 <?php
		  query_posts($args);

/*取得した記事分ループする*/
if(have_posts()):while(have_posts()):the_post();
/*取得した記事情報のリンク、タイトルを設定*/ ?>
<div class="boxphoto"><a href="<?php echo get_permalink($args[$key]->post_parent); ?>" rev="attachment"><?php get_the_title($args[$key]->post_parent); ?>
<p><?php echo get_the_date('Y年n月j日(D)'); ?></p>
<!-- <span>タクソノミー入れたい</span> -->
<!--view -->
<div class="view">
<?php
  the_post_thumbnail('size175_160'); ?>
<div class="mask">
<h4>詳細記事へ</h4>
<p class="comment"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
</div>
<!--/mask -->
</div>
<!--/view -->
<!--
<h3><a href="<?php the_permalink();?>"><?php the_title();?></a>
</h3>
--></a>
</div>

<?php endwhile;endif;

/*取得したランダム記事情報を後続処理に引き継がないようにリセット*/
wp_reset_query();
?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>