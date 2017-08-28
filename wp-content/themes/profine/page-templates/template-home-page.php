<?php
/**
 * Template Name: Home Page Template
 *
 
 * @subpackage Profine
 * @since Profine 1.0
 */
get_header(); 

$image_dirpath =  get_template_directory_uri() . '/images/'; 

// Theme Customizer "Home Template Options > Home Services" options
$default_services_title  = sprintf( __( 'Our Pouplar Services', 'profine' ));
$services_display        = get_theme_mod('services_display','on');
$home_service_title      = get_theme_mod('home_service_title',$default_services_title);

// Theme Customizer "Home Template Options > Home Parallax" options
$parallax_display        = get_theme_mod('parallax_display','on');

// Theme Customizer "Home Template Options > Home Projects" options
$default_projects_title  = sprintf( __( 'Our Recent Development', 'profine' ));
$projects_display        = get_theme_mod('projects_display','on');
$home_project_title      = get_theme_mod('home_project_title',$default_projects_title);
$home_project_btnurl     = get_theme_mod('home_project_btnurl','#');
?>

	<?php if(!empty($services_display) && $services_display == 'on'){ ?>
		<div id="services" class="services section-padding text-center">
			<div class="container">
			
				<?php if(!empty($home_service_title)){ ?>
					<div class="row">
						<div class="col-lg-12">
							<h3 class="section-title"><?php echo esc_attr($home_service_title); ?></h3>
						</div>
					</div>
				<?php } ?>
				
				<div class="row services-wrapper">
					<?php
						$service_pages = array();
						
						for ( $service_count = 1; $service_count <= 4; $service_count++ ) {
							$mod = get_theme_mod( 'service-page-' . $service_count );
							if ( 'page-none-selected' != $mod ) {
								$service_pages[] = $mod;
							}
						}
						
						$service_args = array(
							'post_type' => 'page',
							'post__in' => $service_pages,
							'orderby' => 'post__in'
						);
						
						$service_query = new WP_Query( $service_args );
						
						if ( $service_query->have_posts() ) :
						
							$service_count = 1;
							while ( $service_query->have_posts() ) : $service_query->the_post();
							?>
							<div class="col-md-4 service-item">
								<?php if ( has_post_thumbnail() ) { // check if the page has a featured image assigned to it. ?>
									<a href="<?php the_permalink(); ?>" class="service-image">
										<?php
											the_post_thumbnail('thumbnail');
										?>
									</a>
								<?php } ?>
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<div class="service-text"><?php the_excerpt(); ?></div>
							</div>
							<?php
							$service_count++;
							endwhile;
							wp_reset_postdata();
							
						else :
							if ( current_user_can( 'customize' ) ) { ?>
								<div class="message">
									<p><?php _e( 'There are no services available to display.', 'profine' ); ?></p>
									<p><?php printf(
										__( 'These services can be set in the <a href="%s">customizer</a>.', 'profine' ),
										admin_url( 'customize.php?autofocus[section]=profine_home_services_section' )
									); ?>
									</p>
								</div>
							<?php 
							}
						endif;
					?>
				</div><!-- .row.services-wrapper ends -->
			</div><!-- .contianer -->
		</div><!-- .services -->
	<?php } ?>	
	
	<!-- .swag-section starts -->
	<?php 
	if(!empty($parallax_display) && $parallax_display == 'on')
	{ 
		$parallax_page = array();
	
		$mod = get_theme_mod( 'parallax-page');
		if ( 'page-none-selected' != $mod ) {
			$parallax_page[] = $mod;
		}
		
		$parallax_args = array(
			'post_type' => 'page',
			'post__in' => $parallax_page,
			'orderby' => 'post__in'
		);
		
		$parallax_query = new WP_Query( $parallax_args );
		
		if ( $parallax_query->have_posts() ) :
		while ( $parallax_query->have_posts() ) : $parallax_query->the_post();
		
		if ( has_post_thumbnail() ) { 
			$backgroundImg    = get_the_post_thumbnail_url( $post->ID,'full');
			$backgroundImgurl = !empty($backgroundImg) ? 'background-image:url('.$backgroundImg.')' : '';
		} 
		?>
		<div class="swag-section text-center" style="<?php echo $backgroundImgurl; ?>">
			<div class="section-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h2><?php the_title(); ?></h2>
						<div class="swag-text"><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink(); ?>" class="btn"><?php _e('Know more','profine'); ?></a>
					</div>
				</div>
			</div>
		</div><!-- .swag-section ends -->
		<?php
		endwhile;
		wp_reset_postdata();
		
	else :
		if ( current_user_can( 'customize' ) ) { ?>
			<div class="message text-center">
				<p><?php _e( 'There are no parallax section available to display.', 'profine' ); ?></p>
				<p><?php printf(
					__( 'This parallax section can be set in the <a href="%s">customizer</a>.', 'profine' ),
					admin_url( 'customize.php?autofocus[section]=profine_home_parallax_section' )
				); ?>
				</p>
			</div>
		<?php 
		}
	endif;
	} 
	?>	
	<!-- .swag-section ends -->
	
	 <?php if(!empty($projects_display) && $projects_display == 'on'){ ?>
		<div id="projects" class="projects section-padding text-center">
			<div class="container">
			
				<?php if(!empty($home_project_title)){ ?>
					<div class="row">
						<div class="col-lg-12">
							<h3 class="section-title"><?php echo esc_attr($home_project_title); ?></h3>
						</div>
					</div>
				<?php } ?>
				
				<div class="row">
					<?php
					$project_pages = array();
					
					for ( $project_count = 1; $project_count <= 4; $project_count++ ) {
						$mod = get_theme_mod( 'project-page-' . $project_count );
						if ( 'page-none-selected' != $mod ) {
							$project_pages[] = $mod;
						}
					}
					
					$project_args = array(
						'post_type' => 'page',
						'post__in' => $project_pages,
						'orderby' => 'post__in'
					);
					
					$project_query = new WP_Query( $project_args );
					
					if ( $project_query->have_posts() ) :
					
						$project_count = 1;
						while ( $project_query->have_posts() ) : $project_query->the_post();
						?>
						<div class="col-md-4 project-item">
							<article>
								<figure>
									<?php if ( has_post_thumbnail() ) { // check if the page has a featured image assigned to it. ?>
										<a href="<?php the_permalink(); ?>" class="project-image">
											<?php
												the_post_thumbnail('profine_home_project_thumbnail');
											?>
										</a>
									<?php } ?>
									<figcaption><p><a href="<?php the_permalink(); ?>" class="project-title"><?php the_title(); ?><i class="fa fa-angle-right"></i></a></p></figcaption>
								</figure>
							</article>
						</div>
						<?php
						$project_count++;
						endwhile;
						wp_reset_postdata();
						
					else :
						if ( current_user_can( 'customize' ) ) { ?>
							<div class="message">
								<p><?php _e( 'There are no projects available to display.', 'profine' ); ?></p>
								<p><?php printf(
									__( 'These projects can be set in the <a href="%s">customizer</a>.', 'profine' ),
									admin_url( 'customize.php?autofocus[section]=profine_home_projects_section' )
								); ?>
								</p>
							</div>
						<?php 
						}
					endif;
				?>
				</div><!-- .row -->
				
				<?php if(!empty($home_project_btnurl)){ ?>
					<div class="row"><a href="<?php echo esc_url($home_project_btnurl); ?>" class="btn"><?php _e('Load More','profine'); ?></a></div>
				<?php } ?>
				
			</div><!-- .contianer -->
		</div><!-- .projects section ends -->
	<?php } ?>
	
<?php get_footer(); ?>