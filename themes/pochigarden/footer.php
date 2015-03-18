<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
<!-- #colophon -->
</div><!-- #page -->
</div>




<footer id="footer">
	<div id="footer_inner">
		<hr class="line">
		<?php if(!is_front_page()): ?>
			<div class="row site site-a">
					<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
						<?php dynamic_sidebar( 'footer-left' ); ?>
					<?php endif; ?>
		
					<?php if ( is_active_sidebar( 'footer-center' ) ) : ?>
						<?php dynamic_sidebar( 'footer-center' ); ?>
					<?php endif; ?>
		
					<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
						<?php dynamic_sidebar( 'footer-right' ); ?>
					<?php endif; ?>
				
			</div>
		<?php endif; ?>
		<div id="bottom">	
			<p>Copyright &copy; <?php bloginfo('name'); ?>,ALL rights reserved.</p>
		</div>
	</div>
</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
<?php wp_footer(); ?>

<script>

/* jQuey UI Accodion */

jQuery(function($){

	$(".accordion").accordion({
 		header: ".header",
<?php if(is_tax('item') ): ?>
		active : 1,
<?php endif; ?>
 		autoHeight: false
	});

});

</script>

</body>
</html>