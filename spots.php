<?php
/**
 * The Template for displaying all single posts.
 *
 * Template Name: Spots Map
 *
 * @package _tk
 */

/*
	TODO:
		Hook up custom query
		Style card-spots
		Add google maps js stuff
		Hook up location finder in main.js
*/

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php // custom query for spots goes here ?>
			<?php get_template_part( 'partials/card', 'spot' ); ?>
		<?php // end custom query ?>

		<?php // If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
			comments_template(); ?>

	<?php endwhile; ?>
<?php get_footer(); ?>