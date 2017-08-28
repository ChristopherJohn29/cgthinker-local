<?php
/**
* The template for displaying the footer.
* Contains footer content and the closing of the
*/

$profine_copyright = get_theme_mod( 'profine_copyright');
?>
<!-- #Footer Section Starts -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<?php get_sidebar( 'footer' ); ?>	
		</div>
	</div>

	<div class="footer-siteinfo">
		<div class="container">
			<div class="row">
				<?php if(!empty($profine_copyright)){ ?>
					<div class="col-md-6 col-sm-6 col-xs-12 copyright_txt"><?php echo wp_kses_post( $profine_copyright ); ?></div>
				<?php } ?>
				<div class="col-md-6 col-sm-6 col-xs-12 copyright_txt text-right"><?php _e('Profine by','profine'); ?><a href="<?php echo esc_url( __( 'https://desirepress.com', 'profine' ) ); ?>" target="_blank">&nbsp;&nbsp;<?php _e('DesirePress','profine'); ?></a></div>
			</div>
		</div>
	</div>
</footer>
<!-- #Footer Section Ends -->
<?php wp_footer(); ?>
</body>
</html>