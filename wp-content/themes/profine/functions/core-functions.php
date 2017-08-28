<?php
#-----------------------------------------------------------------#
#----------- PROFINE : CORE FUNCTIONS AND DEFINITIONS ------------#
#-----------------------------------------------------------------#

#-----------------------------------------------------------------#
# EXCERPT RELATED 
#-----------------------------------------------------------------#

//custom excerpt ending
function profine_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="post-read-more clearfix"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'profine' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'profine_excerpt_more' );


#-----------------------------------------------------------------#
# DISPLAY AN OPTIONAL POST THUMBNAIL
#-----------------------------------------------------------------#

function profine_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) :
	?>
	<div class="post-thumbnail">
	<?php
		the_post_thumbnail('full');
	?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	<?php
		the_post_thumbnail('full');
	?>
	</a>

	<?php endif; // End is_singular()
}

#-----------------------------------------------------------------#
# THEME CHECK FIX
#-----------------------------------------------------------------#
if ( ! isset( $content_width ) ) $content_width = 1170;
