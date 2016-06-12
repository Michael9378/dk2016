<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 *
 * Full screen image homepage with no deliniating backgrounds (static image or very slow fade slider)
 * Attach distinct images to pages and navigation to associate the image more so than the word
 * http://www.fanatic.com/windsurfing/ (instagram section and layout ques, but too noisy)
 * http://joandso.com/ (steal their menu)
 * Full screen pull out drawer for nav
 * Blog and pages will all have to have a featured image to display on other pages
 * Only show featured image, then on hover show excerpt title and link
 * http://demoblvd.com/themes/gnar/demo-1/
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header class="site-header" role="banner">
	<a href="<?php get_site_url (); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/icons/newlogo.png"></a>
</header><!-- #masthead -->

<nav class="site-navigation">
	<div id="open-nav">
		<a href="#"><i class="fa fa-bars"></i></a>
	</div>
	<div class="nav-drawer container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div id="close-nav">
					<a href="#"><i class="fa fa-times"></i></a>
				</div>
			</div>

			<?php 

			// object(WP_Post)[279]
		  // public 'ID' => int 26
		  // public 'post_author' => string '1' (length=1)
		  // public 'post_date' => string '2016-06-05 00:11:25' (length=19)
		  // public 'post_date_gmt' => string '2016-06-05 00:11:25' (length=19)
		  // public 'post_content' => string ' ' (length=1)
		  // public 'post_title' => string '' (length=0)
		  // public 'post_excerpt' => string '' (length=0)
		  // public 'post_status' => string 'publish' (length=7)
		  // public 'comment_status' => string 'closed' (length=6)
		  // public 'ping_status' => string 'closed' (length=6)
		  // public 'post_password' => string '' (length=0)
		  // public 'post_name' => string '26' (length=2)
		  // public 'to_ping' => string '' (length=0)
		  // public 'pinged' => string '' (length=0)
		  // public 'post_modified' => string '2016-06-05 00:11:25' (length=19)
		  // public 'post_modified_gmt' => string '2016-06-05 00:11:25' (length=19)
		  // public 'post_content_filtered' => string '' (length=0)
		  // public 'post_parent' => int 0
		  // public 'guid' => string 'http://localhost/dk2016/?p=26' (length=29)
		  // public 'menu_order' => int 1
		  // public 'post_type' => string 'nav_menu_item' (length=13)
		  // public 'post_mime_type' => string '' (length=0)
		  // public 'comment_count' => string '0' (length=1)
		  // public 'filter' => string 'raw' (length=3)
		  // public 'db_id' => int 26
		  // public 'menu_item_parent' => string '0' (length=1)
		  // public 'object_id' => string '7' (length=1)
		  // public 'object' => string 'page' (length=4)
		  // public 'type' => string 'post_type' (length=9)
		  // public 'type_label' => string 'Page' (length=4)
		  // public 'url' => string 'http://localhost/dk2016/index.php/page-1/' (length=41)
		  // public 'title' => string 'Page 1' (length=6)
		  // public 'target' => string '' (length=0)
		  // public 'attr_title' => string '' (length=0)
		  // public 'description' => string '' (length=0)
		  // public 'classes' => 
		  //   array (size=1)
		  //     0 => string '' (length=0)
		  // public 'xfn' => string '' (length=0)

			foreach(wp_get_nav_menu_items ( "Image Menu" ) as $item) : ?>
				<a href=" <?php echo $item->url; ?>">
					<div class="image-menu-item image-overlay col-lg-3 col-md-4 col-sm-6 col-xs-12" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $item->object_id ), 'large' )[0]; ?>);">
						<h3><?php echo $item->title; ?></h3>
					</div>
				</a>

			<?php endforeach;
			// menu is an array of all items in the Image Menu, regardless of location selection.
			// each menu item follows the same object as a post
			// echo $menu[2]->title;
			// echo $menu[2]->ID;
			?>


					<!-- The WordPress Menu goes here -->
					<?php 
					// wp_nav_menu(
					// 	array(
					// 		'theme_location' 	=> 'primary',
					// 		'depth'             => 2,
					// 		'container'         => 'div',
					// 		'container_class'   => 'collapse navbar-collapse',
					// 		'menu_class' 		=> 'nav navbar-nav',
					// 		'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
					// 		'menu_id'			=> 'main-menu',
					// 		'walker' 			=> new wp_bootstrap_navwalker()
					// 	)
					// ); 
					?>

</nav><!-- .site-navigation -->