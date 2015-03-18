<?php
/**
* Template Name: biotope
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
		<div id="content"  role="main">



			
			<!--タブ-->
<ul class="nav nav-tabs">
<li class="active"><a href="#tab1" data-toggle="tab">ALL</a></li>
<li><a href="#tab2" data-toggle="tab">哺乳類</a></li>
<li><a href="#tab3" data-toggle="tab">両生類</a></li>
<li><a href="#tab4" data-toggle="tab">昆虫</a></li>
<li><a href="#tab5" data-toggle="tab">魚</a></li>
<li><a href="#tab6" data-toggle="tab">エビ・貝類</a></li>
<!-- <li><a href="#tab7" data-toggle="tab">水生植物</a></li> -->
</ul>
<!-- / タブ-->
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade in active" id="tab1">
	<?php //ALL一覧
	$taxonomy     = 'a_biggroup';
	$orderby      = 'name'; 
	$show_count   = 0;      // 表示するなら 1、しないなら 0
	$pad_counts   = 0;      // 子孫のカウントも合計するなら 1、しないなら 0
	$hierarchical = 1;      // 階層表示するなら 1、しないなら 0
	$title        = '';
	/* $exclude      = array(57,61,78,129,153,205); //ハーブ、果実、水生植物、野菜、観葉植物,花 */
	$args = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	/*   'exclude'     => $exclude, */
	);
	?>
	
	<?php $children = get_terms('a_biggroup',$args);
		foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
	        $term_idsp = "a_biggroup_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>
	
			<div class="col-md-6 box">
			<h4><a href="<?php echo get_term_link($child,'a_biggroup'); ?>"><?php echo esc_html($child->name); ?>
			<span class="alias">
			<?php if(get_field('a_alias',$term_idsp)): ?>
			<?php the_field('a_alias',$term_idsp);
			endif; ?></span>
			</a></h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=biotope&a_biggroup=' . $catslug . '&showposts=3';
			?>
			<ul>
			<?php query_posts($myquery); ?>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<p class="photo"> 
				<?php the_post_thumbnail('size250_160'); ?>	
				</p>
			<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
			</ul>
			<span class="tape"></span>
			</div>
	<?php
	endforeach;						
	?>
    
</div>
<div class="tab-pane fade" id="tab2">
<?php //哺乳類一覧
$args_m = array(
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'child_of'     => 147,
  ); ?>

<?php $children = get_terms('a_biggroup',$args_m); 	
		foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
	        $term_idsp = "a_biggroup_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>
	
			<div class="col-md-6 box">
			<h4><a href="<?php echo get_term_link($child,'a_biggroup'); ?>"><?php echo esc_html($child->name); ?>
			<span class="alias">
			<?php if(get_field('a_alias',$term_idsp)): ?>
			<?php the_field('a_alias',$term_idsp);
			endif; ?></span>
			</a></h4>
			
		<?php $catslug = $child->slug;
		$myquery = 'post_type=biotope&a_biggroup=' . $catslug . '&showposts=3';
		?>
		<ul>
		<?php query_posts($myquery); ?>
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<p class="photo"> 
			<?php the_post_thumbnail('size250_160'); ?>	
			</p>
		<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
		<?php endwhile; endif; ?>
		</ul>
		<span class="tape"></span>
		</div>
<?php
endforeach;						
?>   
</div>
<div class="tab-pane fade" id="tab3">
	<?php //両生類一覧
	$args_f = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 200,
	  ); ?>
	
	<?php $children = get_terms('a_biggroup',$args_f); 
		foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
	        $term_idsp = "a_biggroup_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>
	
			<div class="col-md-6 box">
			<h4><a href="<?php echo get_term_link($child,'a_biggroup'); ?>"><?php echo esc_html($child->name); ?>
			<span class="alias">
			<?php if(get_field('a_alias',$term_idsp)): ?>
			<?php the_field('a_alias',$term_idsp);
			endif; ?></span>
			</a></h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=biotope&a_biggroup=' . $catslug . '&showposts=3';
			?>
			<ul>
			<?php query_posts($myquery); ?>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<p class="photo"> 
				<?php the_post_thumbnail('size250_160'); ?>	
				</p>
			<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
			</ul>
			<span class="tape"></span>
			</div>
	<?php
	endforeach;						
	?>
</div>
<div class="tab-pane fade" id="tab4">
	<?php //昆虫一覧
	$args_fr = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 110,
	  ); ?>
	
	<?php $children = get_terms('a_biggroup',$args_fr); 
		foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
	        $term_idsp = "a_biggroup_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>
	
			<div class="col-md-6 box">
			<h4><a href="<?php echo get_term_link($child,'a_biggroup'); ?>"><?php echo esc_html($child->name); ?>
			<span class="alias">
			<?php if(get_field('a_alias',$term_idsp)): ?>
			<?php the_field('a_alias',$term_idsp);
			endif; ?></span>
			</a></h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=biotope&a_biggroup=' . $catslug . '&showposts=3';
			?>
			<ul>
			<?php query_posts($myquery); ?>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<p class="photo"> 
				<?php the_post_thumbnail('size250_160'); ?>	
				</p>
			<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
			</ul>
			<span class="tape"></span>
			</div>
	<?php
	endforeach;						
	?>
</div>
<div class="tab-pane fade" id="tab5">
	<?php //魚一覧
	$args_h = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 139,
	  ); ?>
	
	<?php $children = get_terms('a_biggroup',$args_h);
		foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
	        $term_idsp = "a_biggroup_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>
	
			<div class="col-md-6 box">
			<h4><a href="<?php echo get_term_link($child,'a_biggroup'); ?>"><?php echo esc_html($child->name); ?>
			<span class="alias">
			<?php if(get_field('a_alias',$term_idsp)): ?>
			<?php the_field('a_alias',$term_idsp);
			endif; ?></span>
			</a></h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=biotope&a_biggroup=' . $catslug . '&showposts=3';
			?>
			<ul>
			<?php query_posts($myquery); ?>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<p class="photo"> 
				<?php the_post_thumbnail('size250_160'); ?>	
				</p>
			<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
			</ul>
			<span class="tape"></span>
			</div>
	<?php
	endforeach;						
	?>
</div>
<div class="tab-pane fade" id="tab6">
	<?php //エビ・貝一覧
	$args_d = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 216,
	  ); ?>
	
	<?php $children = get_terms('a_biggroup',$args_d);
		foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
	        $term_idsp = "a_biggroup_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>
	
			<div class="col-md-6 box">
			<h4><a href="<?php echo get_term_link($child,'a_biggroup'); ?>"><?php echo esc_html($child->name); ?>
			<span class="alias">
			<?php if(get_field('a_alias',$term_idsp)): ?>
			<?php the_field('a_alias',$term_idsp);
			endif; ?></span>
			</a></h4>				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=biotope&a_biggroup=' . $catslug . '&showposts=3';
			?>
			<ul>
			<?php query_posts($myquery); ?>
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<p class="photo"> 
				<?php the_post_thumbnail('size250_160'); ?>	
				</p>
			<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; ?>
			</ul>
			<span class="tape"></span>
			</div>
	<?php
	endforeach;						
	?>
</div>

</div>
			


		</div><!-- #content -->
	</section><!-- #primary -->
<div class="col-md-3">
<?php dynamic_sidebar(sidebar3); ?>
</div>
<?php get_footer(); ?>