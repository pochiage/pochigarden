<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<div class="mainentry">
			<div class="subtext">
				<div class="col-md-12">
				<?php if ( is_single() ) : ?>
				<?php echo get_the_date(); ?>
				<h1 class="entry-title"><?php the_title(); ?></h1><br>
				<?php else : ?>
				<?php echo get_the_date(); ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<?php endif; // is_single() ?>				
				</div>
				<div class="col-md-6">
				<p><?php //植物分類
					$parents = getRootTaxonomies( get_the_terms( $post->ID,"plants_group"), "0" );
					foreach($parents as $pv){
						echo '<i class="fa fa-tree info"></i>　植物分類：<a href="/plants/plants_group/'.$pv->slug.'">'.$pv->name.'</a> > ';
						foreach($pv->children as $ck=>$cv){
							echo '<a
							href="/plants/plants_group/'.$cv->slug.'">'.$cv->name.'</a>　';
						}
					}
					
				?>	
				</p>	
				<p>
					<?php 
						$terms = get_the_terms( $post->ID,'plantsprocess');//植物の過程
						if($terms):
							$term_p =array_pop($terms);
					?>
					<i class="fa fa-sort-amount-desc info"></i>　過程：<a href="<?php echo get_term_link($term_p,'plantsprocess'); ?>"><?php echo $term_p -> name; ?> </a>
					<?php endif; ?>
					
					<?php 
						$terms = get_the_terms( $post->ID,'bioprocess');//ビオトープの過程
						if($terms):
							$term_p =array_pop($terms);
					?>
					<i class="fa fa-sort-amount-desc info"></i>　過程：<a href="<?php echo get_term_link($term_p,'bioprocess'); ?>"><?php echo $term_p -> name; ?> </a>
					<?php endif; ?>
	
				</p>
				<p>
				<?php 
					$terms = get_the_terms( $post->ID,'cultivation');//栽培方法
					if($terms):
						$term_p =array_shift($terms);
				?>
				<i class="fa fa-pie-chart info"></i>　栽培方法：<a href="<?php echo get_term_link($term_p); ?>"><?php echo $term_p -> name; ?></a>
				<?php endif; ?>
				</p>
				</div>
				<div class="col-md-6">
				<p><?php //動物分類
					$parents = getRootTaxonomies( get_the_terms( $post->ID,"a_biggroup"), "0" );
					foreach($parents as $pv){
						echo '<i class="fa fa-bug info"></i>　動物分類：<a href="/a_biggroup/'.$pv->slug.'">'.$pv->name.'</a> > ';
						foreach((array)$pv->children as $ak=>$av){
							echo '<a
							href="/a_biggroup/'.$av->slug.'">'.$av->name.'</a>　';
						}
					}
					
				?>	
				</p>	
				<p>
				<?php 
					$terms = get_the_terms( $post->ID,'places');//場所
					if($terms):
						$term_p =array_shift($terms);
				?>
				<i class="fa fa-globe info"></i>　場所：<a href="<?php echo get_term_link($term_p); ?>"><?php echo $term_p -> name; ?> </a>
				<?php endif; ?>
				</p>
				<p>
				<?php 
					$terms = get_the_terms( $post->ID,'exposure');//日当たり
					if($terms):
						$term_p =array_shift($terms);
				?>
				<i class="fa fa-sun-o info"></i>　日当たり：<a href="<?php echo get_term_link($term_p); ?>"><?php echo $term_p -> name; ?> </a>
				<?php endif; ?>
				</p>
				<p>
					<?php 
						$terms = get_the_terms( $post->ID,'p_breed');//品種
						if($terms):
							$term_p =array_shift($terms);
					?>
					<i class="fa fa-tags"></i>　品種名：<a href="<?php echo get_term_link($term_p); ?>"><?php echo $term_p -> name; ?> </a>
					<?php endif; ?>
					<?php 
						$terms = get_the_terms( $post->ID,'a_breed');//品種動物
						if($terms):
							$term_p =array_shift($terms);
					?>
					<i class="fa fa-tags info"></i>　品種名：<a href="<?php echo get_term_link($term_p); ?>"><?php echo $term_p -> name; ?> </a>
					<?php endif; ?>
	
				</p>
				</div>
			</div>

			<?php if ( ! post_password_required() && ! is_attachment() ) :
				the_post_thumbnail('size600_350');
			endif; ?>
			</div>


			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
