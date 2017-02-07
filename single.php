<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _tk
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php $post_type = get_post_type();

		switch ($post_type) {
			case 'spot':
				get_template_part( 'partials/content', 'spot' );
				break;
			case 'rider':
				get_template_part( 'partials/content', 'rider' );
				break;
			case 'game':
				get_template_part( 'partials/content', 'game' );
				break;
			case 'event':
				get_template_part( 'partials/content', 'event' );
				break;
			default: 
				get_template_part( 'partials/content', 'single' );
		} ?>

		<?php // If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
			comments_template(); ?>

	<?php endwhile; ?>
<?php get_footer(); ?>