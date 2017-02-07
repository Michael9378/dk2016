<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<div class="event_post parallax-back image-overlay col-lg-3 col-sm-4 col-xs-6" style="background-image:url(<?php the_post_thumbnail_url(); ?>);" data-parax="10" data-offset="0" data-invert="1">
	<div class="event-info">
		<h3><?php the_title(); ?></h3>
		<div class="date"><?php the_field('date'); ?></div>
	</div>
	<div class="event-details">
		<p><?php echo ( substr( get_the_excerpt(), 0, 250 ) ); ?>...</p>
		<a class="btn invert" href="<?php the_permalink(); ?>">Event Details</a>
	</div>
</div>
