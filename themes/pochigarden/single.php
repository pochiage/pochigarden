<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="col-md-8">
<!-- single.php	 -->	
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
			?>

				<?php get_template_part( 'content', get_post_format() );  ?>
				
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->
				
				
				<?php
				$get_the_date =get_the_date();	
				yarpp_related(array(
				'post_type' => array('post', 'plants','biotope','othergardens'),
				'show_pass_post' => false, // show password-protected posts
				'past_only' => false, // show only posts which were published before the reference post
				// 任意のテンプレートを利用する場合指定
				//'template' => 'yarpp-template-xxxxxx.php', // either the name of a file in your active theme or the boolean false to use the builtin template
				
				));
?>


<?php // ここから関連記事の表示
			// 投稿月・日の取得
$d_id = date('d',get_post_time());
$m_id = date('m',get_post_time());
$y_id = date('Y',get_post_time());

			
			// WordPressオブジェクトの作成
			$args = array(
		'post_type' => array('plants','biotope','othergardens'),
		'post__not_in' =>  array($post -> ID),
		'orderby' => 'DESC',
		'posts_per_page' => -1,
		'monthnum' => $m_id,
		'day' => $d_id,
		'date_query' =>array(
			array(
				'before' =>'1 year ago',
			),
		)
			);
			$my_query = new WP_Query($args); ?>
			
			<div class="related-posts">
				<h3 id="related">過去の同日記事</h3>
				<?php
				if( $my_query -> have_posts() ): // サブループ ?>
					<ul id="related-posts">
					<?php
					while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
						<li class="row">
							<p class="col-md-3">
								<a href = "<?php the_permalink() ?>" title = "「<?php the_title(); ?>」の続きを読む">
									<?php
									if ( has_post_thumbnail() ):
										the_post_thumbnail('size230_230');
									else:
									?>
									<img src = "<?php echo get_template_directory_uri(); ?>/images/noimage.gif" width = "100" height="100" alt="" />
									<?php
									endif;
									?>
								</a>
							</p>
							<div class="col-md-9">
								<p class="date"><?php echo get_the_date(); ?></p>
								<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
								<p><?php the_excerpt(); ?></p>
							</div>
						</li>

					<?php
					endwhile; // サブループの繰り返し処理終了
					?>
					</ul>
				<?php 
				else:
				?>
					<p>関連する記事はありませんでした ...</p>
				<?php
				endif; // サブループ終了
				wp_reset_postdata();
				?>
			</div><!-- /related-posts -->
			




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


<div class="col-md-4">
	<?php if(get_post_type() =='plants'){
			dynamic_sidebar(sidebar2); 
			}
			elseif(get_post_type() =='biotope'){
			dynamic_sidebar(sidebar3); 
			}
			elseif(get_post_type() =='othergardens'){
			dynamic_sidebar(sidebar4); 
			}
			else{
				get_sidebar();
			}			
 ?>
</div>

<?php get_footer(); ?>