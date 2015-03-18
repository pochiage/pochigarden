<?php
/**Template Name: WIKI_2用
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
                <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>科名</th>
                        <td><?php

							//記事IDとタクソノミーを指定してタームを取得
							$f_terms = wp_get_object_terms($post->ID, 'family_name');
							
							//タームを出力
							if(!empty($f_terms)){
							  if(!is_wp_error( $f_terms )){
							    foreach($f_terms as $term){
							      echo '<p>'.$term->name.'</p>'; 
							    }
							  }
							}
							
							?>
                                                 
                        </td>
                    </tr>
                    <tr>
                        <th>属名</th>
                        <td>
                            <?php if(post_custom('generic_name',$term_deta)):
                            	 echo nl2br(esc_html(post_custom('generic_name',$term_deta)));
                            endif;?>     
                        </td>
                    </tr>
                    <tr>
                        <th>学名</th>
                        <td>
                            <?php if(post_custom('scientific_name',$term_deta)):
                            	 echo nl2br(esc_html(post_custom('scientific_name',$term_deta)));
                            endif;?>     	                      
                        </td>
                    </tr>
                    <tr>
                        <th>和名</th>
                        <td>
                            <?php if(post_custom('Japanese_name',$term_deta)):
                            	 echo nl2br(esc_html(post_custom('Japanese_name',$term_deta)));
                            endif;?>     	                        
                        </td>
                    </tr>
                    <tr>
                        <th>別名</th>
                        <td>
                            <?php if(post_custom('Alias',$term_deta)):
                            	 echo nl2br(esc_html(post_custom('Alias',$term_deta)));
                            endif;?>     	                        
                        </td>
                    </tr>
                </table>
            </div>
        </div>
<div class="row">
	<div class="col-md-6">
    <table class="table">
        <tr>
            <th>水やり</th>
            <td>
			<?php if(post_custom('water',$term_deta)):
	              echo nl2br(esc_html(post_custom('water',$term_deta)));
	              endif;?>  
            </td>
        </tr>
        <tr>
            <th>日当たり</th>
            <td>
			<?php if(post_custom('exposure',$term_deta)):
	              echo nl2br(esc_html(post_custom('exposure',$term_deta)));
	              endif;?>  	           
	       </td>
        </tr>
        <tr>
            <th>形態</th>
            <td>
			<?php if(post_custom('form',$term_deta)):
	              echo nl2br(esc_html(post_custom('form',$term_deta)));
	              endif;?>  	            
            </td>
        </tr>
        <tr>
            <th>難易度</th>
            <td>
			<?php if(post_custom('difficulty',$term_deta)):
	              echo nl2br(esc_html(post_custom('difficulty',$term_deta)));
	              endif;?>  	            
            </td>
        </tr>
        <tr>
            <th>発芽適温</th>
            <td>
	            <?php if(post_custom('Germination_s',$term_deta)): ?>
	            約
	             <?php echo nl2br(esc_html(post_custom('Germination_s',$term_deta))); ?>
	              ℃
	             <?php endif;?>  	
	        </td>
        </tr>
        <tr>
            <th>生育適温</th>
              <td>
	            <?php if(post_custom('Growth_s',$term_deta)): ?>
	            約
	            <?php echo nl2br(esc_html(post_custom('Growth_s',$term_deta))); ?>
	              ℃
	            <?php endif;?>  	
	        </td>
	    </tr>        
    </table>
	</div>
	<div class="col-md-6">
    <table class="table col-md-6">
        <tr>
            <th>原産地</th>
            <td>
			<?php if(post_custom('origin',$term_deta)):
	              echo nl2br(esc_html(post_custom('origin',$term_deta)));
	              endif;?>  	            
            </td>
        </tr>

        <tr>
            <th>耐寒性</th>
            <td>
			<?php if(post_custom('Cold_resistance',$term_deta)):
	              echo nl2br(esc_html(post_custom('Cold_resistance',$term_deta)));
	              endif;?>  	            
            </td>
        </tr>
        <tr>
            <th>耐暑性</th>
            <td>
			<?php if(post_custom('Heat_tolerance',$term_deta)):
	              echo nl2br(esc_html(post_custom('Heat_tolerance',$term_deta)));
	              endif;?>  	            
            </td>
        </tr>
    </table>
	</div>
</div>

<div class="col-md-12">
	
				<?php if(post_custom('basic',$term_deta)): ?>
	<h4>概要 <span>-Summary-</span></h4>
	            <?php echo nl2br(esc_html(post_custom('basic',$term_deta)));
	              endif;?>  	
</div>

<?php if(post_custom('Schedule',$term_deta)): ?>
	<div class="col-md-12">
		<h4>スケジュール <span>-Schedule-</span></h4>		
		<?php echo apply_filters('the_content',(esc_html(post_custom('Schedule',$term_deta)))); ?>
	</div>
<?php endif;?>  

<h4>育て方 <span>-method of raising-</span></h4>
<div class="row">

    <div class="col-md-2">水やり詳細</div>
    <div class="col-md-10">
        				<?php if(post_custom('water_d',$term_deta)):
	              echo nl2br(esc_html(post_custom('water_d',$term_deta)));
	              endif;?> 
    </div>
</div>
<div class="row">
    <div class="col-md-2">肥料</div>
    <div class="col-md-10">
        				<?php if(post_custom('fertilizer',$term_deta)):
	              echo nl2br(esc_html(post_custom('fertilizer',$term_deta)));
	              endif;?>  
    </div>
</div>
<div class="row">
    <div class="col-md-2">病気と害虫</div>
    <div class="col-md-10">
        				<?php if(post_custom('pest',$term_deta)):
	              echo nl2br(esc_html(post_custom('pest',$term_deta)));
	              endif;?>  
    </div>
</div>
<div class="row">
    <div class="col-md-2">用土</div>
    <div class="col-md-10">
        				<?php if(post_custom('soil',$term_deta)):
	              echo nl2br(esc_html(post_custom('soil',$term_deta)));
	              endif;?>  
    </div>
</div>
<div class="row">
    <div class="col-md-2">植付、植替</div>
    <div class="col-md-10">
        				<?php if(post_custom('Planting',$term_deta)):
	              echo nl2br(esc_html(post_custom('Planting',$term_deta)));
	              endif;?>  
    </div>
</div>
<div class="row">
    <div class="col-md-2">増やし方</div>
    <div class="col-md-10">
        				<?php if(post_custom('Breeding',$term_deta)):
	              echo nl2br(esc_html(post_custom('Breeding',$term_deta)));
	              endif;?>  
    </div>
</div>
<div class="row">
    <div class="col-md-2">その他</div>
    <div class="col-md-10">
        				<?php if(post_custom('other',$term_deta)):
	              echo nl2br(esc_html(post_custom('other',$term_deta)));
	              endif;?>  
    </div>
</div>

<div class="col-md-12">
<h4 class="memo">memo</h4>
<?php the_content(); ?>
</div>


						<?php if(post_custom('start',$post->ID)): ?>
						<h3><?php echo get_the_title(); ?>の購入＆入手履歴</h3> 
						<?php echo apply_filters('the_content',(post_custom('start',$post->ID))); ?>

						<?php endif; ?>
<div>
	<?php
	if(get_the_terms($post->ID,'plants_group')):
	
	 $terms = get_the_terms($post->ID, 'plants_group');
	 $term_id = array();
 	foreach( $terms as $term ){
	array_push( $term_id, $term->term_id );
          break ;
     }	
     $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
     query_posts( array(
	 		'post__not_in' => array($post->ID), //現在表示している記事を検索結果に表示しない
	 		'paged'=>$paged,
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
		 <?php endif; ?>
	<?php endif; ?>
	
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

</div>
<?php wp_reset_query(); ?>

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