<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/section', 'home_slider' ); ?>
		<!-- full page slider that fades between an image representation of the sections below -->

		<?php get_template_part( 'partials/section', 'quote' ); ?>
		<!-- contained section with quote will pull dynamically from ACF everytime it is called -->

		<?php get_template_part( 'partials/section', 'instagram' ); ?>
		<!-- Full page section that pulls the most recent instagram posts from dirtking.com -->

		<?php get_template_part( 'partials/section', 'authors' ); ?>
		<!-- contained section that shows top 3-9 authors with a view all as the last post
		authors will have image, name, title, bio, and links to social medias, -->

		<?php get_template_part( 'partials/section', 'categories' ); ?>
		<!-- full page section of images for each category of riding
		Each category page encapsulates all posts/videos/gallersi of that category -->

		<?php get_template_part( 'partials/section', 'events' ); ?>
		<!-- full page section of images for each category of riding
		Each category page encapsulates all posts/videos/gallersi of that category -->

	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
