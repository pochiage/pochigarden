<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php if(is_search()){ ?>検索｜ぽちのベランダガーデニングとビオトープ<?php } ?><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Arvo:400italic|Noto+Serif:400italic|Old+Standard+TT:400italic|Fjalla+One' rel='stylesheet' type='text/css'>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	

<?php 
wp_head(); ?>		

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55156333-1', 'auto');
  ga('send', 'pageview');

jQuery('#myTab a').click(function (e) {
  e.preventDefault()
  jQuery(this).tab('show')
})
</script>

</head>

<body <?php body_class(); ?>>
<!-- <?php if(!is_front_page()): ?> -->
<!--
<?php else: ?>
<div>
<?php endif; ?>
-->      

<div id="top_wrap">  
	<div id="top_wrap_inner">
	<div class="container" >         
		<div class="row">
			<div class="col-md-8 site_title_info">
				<h1 class="site-title col-md-12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img  src="<?php echo get_template_directory_uri(); ?>/images/mainVisual141110v2.png" width="930"></a></h1>
				<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
			</div>
			<div class="col-md-4">
				<ul class="row">
					<li class="col-md-6">
					</li>
					<li class="twitter col-md-3">
						<a href="https://twitter.com/pochigarden" target="_blank"><img  src="<?php echo get_template_directory_uri(); ?>/images/27bt_twitter.png" width="50"></a>
					</li>
					<li class="rss col-md-3">
						<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img  src="<?php echo get_template_directory_uri(); ?>/images/27bt_rss.png" width="50"></a>
					</li>
				</ul>
			</div>
		</div>
		
	<div class="navbar fixedmenu">	
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu','container' => false ) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	</div>
	</div>
</div>
<?php if(!is_front_page()): ?>
<div id="page" class="hfeed site">
	<div id="main" class="wrapper" >
<?php else: ?>
<div>
	<div>
<?php endif; ?>