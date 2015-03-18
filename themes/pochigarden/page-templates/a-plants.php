<?php
/**
	* Template Name: plants

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

<!--タブ-->
<ul class="nav nav-tabs" role="teblelist">
<li class="active"><a href="#tab1" role="tab" data-toggle="tab">野菜</a></li>
<li><a href="#tab2" data-toggle="tab">水生植物</a></li>
<li><a href="#tab3" data-toggle="tab">花</a></li>
<li><a href="#tab4" data-toggle="tab">果樹</a></li>
<li><a href="#tab5" data-toggle="tab">ハーブ</a></li>
<li><a href="#tab6" data-toggle="tab">観葉植物</a></li>
<li><a href="#tab7" data-toggle="tab">多肉植物</a></li>
<li><a href="#tab8" data-toggle="tab">リーフ</a></li>
</ul>
<!-- / タブ-->
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade in active" id="tab1">
	<?php //野菜一覧
	$taxonomy     = 'plants_group';
	$orderby      = 'name'; 
	$show_count   = 0;      // 表示するなら 1、しないなら 0
	$pad_counts   = 0;      // 子孫のカウントも合計するなら 1、しないなら 0
	$hierarchical = 1;      // 階層表示するなら 1、しないなら 0
	$title        = '';
	$args_v = array(
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'child_of'     => 57,
  ); ?>

  
<?php $children = get_terms('plants_group',$args_v); ?>
					
	 	<?php
		$term_id = esc_html($child->term_id);
        $term_idsp = "plants_group_".$term_id;  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID
			 foreach ( $children as $child ): 
		
?>
				<?php if ($child->parent == 0) { continue; } ?>
				<?php $catslug = $child->slug; 
							query_posts(array(
			'post_type' => 'plants',
			'plants_group' => $catslug ,
			'showposts'=>3,
			
			)	
		); 
				?>
						<div class="col-md-6 box">
							<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
							<span class="alias">
							<?php if(get_field('a_alias',$term_idsp)): ?>
							別名　<?php the_field('a_alias',$term_idsp);
							endif; ?></span></a></h4>
							<ul>
								<?php if(have_posts()): while(have_posts()): the_post(); ?>
									<p class="photo"> 
									<?php the_post_thumbnail('size250_160'); ?>	
									</p>
								<li><span><?php echo get_the_date(); ?></span>&nbsp;<a href="<?php the_permalink() ?>"><?php the_title();?></a></li>
								<?php endwhile; endif; ?>
							</ul>
							<span class="tape"></span>
						</div>				
<?php			
			endforeach;
		wp_reset_query();						
	?>       
</div>
<div class="tab-pane fade" id="tab2">
		<?php //水生植物一覧
	$args_a = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 153,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_a); ?>
						
		<?php foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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
	<?php //花一覧
	$args_f = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 61,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_f); ?>
						
		<?php foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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
	<?php //果実一覧
	$args_fr = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 129,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_fr); ?>
						
		<?php foreach ( $children as $child ): 
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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
	<?php //ハーブ一覧
	$args_h = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 78,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_h); ?>
						
		<?php foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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
	<?php //観葉植物一覧
	$args_s = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 205,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_s); ?>
						
		<?php foreach ( $children as $child ): 
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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
<div class="tab-pane fade" id="tab7">
	<?php //多肉植物一覧
	$args_d = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 262,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_d); ?>
						
		<?php foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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
<div class="tab-pane fade" id="tab8">
		<?php //リーフプランツ一覧
	$args_l = array(
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'child_of'     => 285,
	  ); ?>
	
	<?php $children = get_terms('plants_group',$args_l); ?>
						
		<?php foreach ( $children as $child ):
			$term_id = esc_html($child->term_id);
			$term_idsp = "plants_group_".$term_id  //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」?>
			<?php if ($child->parent == 0) { continue; } ?>

			<div class="col-md-6 box">
				<h4><a href="<?php echo get_term_link($child,'plants_group'); ?>"><?php echo esc_html($child->name); ?>
					<span class="alias">
					<?php if(get_field('a_alias',$term_idsp)): ?>
					別名　<?php the_field('a_alias',$term_idsp);
					endif; ?></span></a>
				</h4>
				
			<?php $catslug = $child->slug;
			$myquery = 'post_type=plants&plants_group=' . $catslug . '&showposts=3';
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





		</div><!-- #content -->

	

	</section><!-- #primary -->
<div class="col-md-3">
<?php dynamic_sidebar(sidebar2); ?>
</div>
<?php get_footer(); ?>