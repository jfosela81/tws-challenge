<?php
/**
 * The template for displaying the footer
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info">
			<p><?php echo __( 'Powered by WordPress', 'acmesports' ); ?></p>
			
			<span class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</span>
			
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
	
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
