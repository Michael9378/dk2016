<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<div class="col-sm-6 event_post">
	<div class="content">
		<h3><?php the_title(); ?></h3>
		<div class="date"><?php the_field('date'); ?></div>
		<p><?php echo ( substr( get_the_excerpt(), 0, 250 ) ); ?>...</p>
		<a class="btn invert" href="<?php the_permalink(); ?>">Event Details</a>
	</div>
</div>
