<?php
/**
 * The Header for our theme
 *
 * @subpackage Profine
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

	<?php
	// header follow icons 
	$fbicon             = get_theme_mod('fbicon');
	$twicon             = get_theme_mod('twicon');
	$gpicon             = get_theme_mod('gpicon');
	$dribicon           = get_theme_mod('dribicon');
	$linkdicon          = get_theme_mod('linkdicon');
	$piniticon          = get_theme_mod('piniticon');
	$flickricon         = get_theme_mod('flickricon');
	$instaicon          = get_theme_mod('instaicon');
	$yticon             = get_theme_mod('yticon');
	
	// header custom logo 
	$custom_logo_id     = get_theme_mod( 'custom_logo' );
	$custom_logo_src    = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      
	// header contact info 
	$contact_email      = get_theme_mod('contact_email');
	$contact_phone      = get_theme_mod('contact_phone');
	
	// header image/banner content
	$default_btitle     = sprintf( __( 'Dedication, Passion, Success!', 'profine' ));
	$default_bdescp     = sprintf( __( 'Introducing "Profine". A fully responsive multipages attractive business theme, designed & developed by DesirePress.', 'profine' ));
	$default_btnurl     = sprintf( __( '#', 'profine' ));
	$banner_display     = get_theme_mod('banner_display', 'on');
	$banner_title       = get_theme_mod('banner_title', $default_btitle);
	$banner_description = get_theme_mod('banner_description', $default_bdescp);
	$banner_more_url    = get_theme_mod('banner_more_url', $default_btnurl);
	?>
	<!-- #Header Section Starts -->
	<header id="header">
	
		<!-- .header-wrapper -->
		<div class="header-wrapper">
		
			<!-- .header-topbar -->
			<div class="header-topbar">
				<div class="container">
					<div class="row">
						<div class="header-contact col-md-6 col-sm-6 col-xs-12">
							<?php if(!empty($contact_email)){ ?><span class="cemail"><a href="mailto:<?php echo esc_attr($contact_email); ?>"><i class="fa fa-pencil"></i><?php echo esc_attr($contact_email); ?></a></span><?php } ?>				
							<?php if(!empty($contact_phone)){ ?><span class="cphone"><a href="tel:<?php echo esc_attr($contact_phone); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($contact_phone); ?></a></span><?php } ?>		
						</div>
						<!-- .header-icons -->
						<div class="header-icons col-md-6 col-sm-6 col-xs-12">
							<?php if(isset($fbicon) && $fbicon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($fbicon); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
							<?php if(isset($twicon) && $twicon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($twicon); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
							<?php if(isset($gpicon) && $gpicon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($gpicon); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
							<?php if(isset($dribicon) && $dribicon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($dribicon); ?>"><i class="fa fa-dribbble"></i></a></li><?php } ?>
							<?php if(isset($linkdicon) && $linkdicon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($linkdicon); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
							<?php if(isset($piniticon) && $piniticon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($piniticon); ?>"><i class="fa fa-pinterest"></i></a></li><?php } ?>
							<?php if(isset($flickricon) && $flickricon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($flickricon); ?>"><i class="fa fa-flickr"></i></a></li><?php } ?>
							<?php if(isset($instaicon) && $instaicon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($instaicon); ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
							<?php if(isset($yticon) && $yticon !=""){ ?><li><a class="icon-item" target="_blank" href="<?php echo esc_url($yticon); ?>"><i class="fa fa-youtube"></i></a></li><?php } ?>			
						</div>
					</div>
				</div>
			</div>
		
			<div class="header-nav">
				<div class="container">
					<div class="row">
						<!-- #logo -->
						<div id="logo" class="col-md-4 col-sm-4 col-xs-9">
							<div id="site-title">
								<?php
									if($custom_logo_src[0]){ 
										?><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" ><img class="logo custom-logo" src="<?php echo esc_url($custom_logo_src[0]); ?>" alt="<?php bloginfo('name'); ?>" /></a><?php 
									} 
									else{ 
									?>
									<!-- #site-description -->
									<div id="site-title" class="site-title">
										<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" ><?php bloginfo('name'); ?></a> 
										<div id="site-description" class="site-description"><?php bloginfo( 'description' ); ?></div>
									</div>
									<?php 
									} 
								?>
							</div>
						</div>
						<!-- #logo -->
						
						<!-- #main-navigation-->
						<?php 
							if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'Header' ) ) {
								wp_nav_menu(array( 'container_class' => 'main-navigation col-md-8 col-sm-8 col-xs-3', 'container_id' => 'main-navigation', 'menu_id' => 'main-nav','menu_class' => 'menu clearfix','theme_location' => 'Header' )); 
							} else {
							?>
							<nav id="main-navigation" class="main-navigation col-md-8 col-sm-8 col-xs-3">
								<ul id="main-nav" class="menu clearfix">
									<?php wp_list_pages('title_li=&depth=0'); ?>
								</ul>
							</nav>
							<?php 
							}
						?>
						<!-- #main-navigation -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .header-wrapper -->
			
		</div><!-- .header-wrapper -->
		
		<!-- .header-banner for "template-home-page.php" -->
		<?php if(is_page_template( 'page-templates/template-home-page.php' ) && $banner_display == 'on'){ ?>
			<div class="header-banner">
				<div class="section-overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="hero-content text-center">
								<?php if(!empty($banner_title)){ ?><h1><?php echo esc_attr($banner_title); ?></h1><?php } ?>
								<?php if(!empty($banner_description)){ ?><div class="intro"><?php echo esc_attr($banner_description); ?></div><?php } ?>
								<?php if(!empty($banner_more_url)){ ?><a href="<?php echo esc_url($banner_more_url); ?>" class="btn"><?php _e('Learn more','profine'); ?></a><?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</header>
	<!-- #Header Section Ends -->