<?php
#-----------------------------------------------------------------#
#------------------- PROFINE : CUSTOM STYLES ---------------------#
#-----------------------------------------------------------------#

//Get required theme custom values
$image_dirpath    = get_template_directory_uri() . '/images/'; 

$header_image     = get_header_image();
$header_image     = !empty($header_image) ? $header_image : get_template_directory_uri().'/images/header.jpg';

$header_textcolor = get_header_textcolor();
$header_textcolor = !empty($header_textcolor) ? $header_textcolor : '#ffffff';

$color_scheme     = esc_attr(get_theme_mod( 'color_scheme', '#E67E22'));
?>
<!-- Profine Customizer Options// -->
<style type="text/css">

::selection{
	background: <?php echo $color_scheme; ?>;
	color: #fff;
	text-shadow: none;
}
::-moz-selection {
	background: <?php echo $color_scheme; ?>;
	color: #fff;
	text-shadow: none;
}

/*Global css*/
a,a:active,a:focus,a:hover,#respond form .form-submit input[type="submit"],a.comment-reply-link{color:<?php echo $color_scheme; ?>;}
.services .icon i,
.projects a.project-title:hover,
.services .service-item:hover > h5 a,
.projects .project-item:hover > article figure figcaption p a{
	color:<?php echo $color_scheme; ?>;
}

<?php if(!empty($header_image)){ ?>
	#header .header-banner, #header .global-banner{background-image:url('<?php echo esc_url( $header_image ); ?>')}
<?php } ?>

#header .header-topbar,
.section-title::after{
	background-color:<?php echo $color_scheme; ?>;
}

button,
html input[type="button"],
input[type="reset"],
input[type="submit"],
a.comment-reply-link,
#content .post-read-more a,
a.comment-edit-link,
.main-navigation .mobmenu-toggle {
	border:1px solid <?php echo $color_scheme; ?>;
	color:<?php echo $color_scheme; ?>;
}

.page-inner-wrap{border-left:5px solid <?php echo $color_scheme; ?>;}
.btn{border-color:<?php echo $color_scheme; ?>}
.btn:hover,
button:hover,
#content .post-read-more a:hover,
a.comment-reply-link:hover,
a.comment-edit-link:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
.services .service-item:hover > a .ficon,
input[type="submit"]:hover{background-color:<?php echo $color_scheme; ?>;color:#fff !important;}

/*color scheme*/
.main-navigation li:hover > a,
.main-navigation .current_page_item > a,
.main-navigation .current_page_ancestor > a,
.main-navigation .current-menu-item > a,
.main-navigation .current-menu-ancestor > a,
#logo #site-title a,
#follow-icons li a,
h1.entry-title span, 
.services .ficon,
#content .sticky-post, 
#footer a:hover{
	color:<?php echo $color_scheme; ?>;
}
#follow-icons li a:hover,{background-color:<?php echo $color_scheme; ?>;color:#fff;border:1px solid <?php echo $color_scheme; ?>;}

/*Search From Submit*/
#searchform input[type="submit"], 
#searchform input[type="submit"]:hover{
	color:<?php echo $color_scheme; ?>!important;
}

#header .header-contact a,
#header .header-contact a i,
#header .header-icons a{
	color:#<?php echo $header_textcolor; ?>;
}
</style>
<!-- \\Profine Customizer Options -->