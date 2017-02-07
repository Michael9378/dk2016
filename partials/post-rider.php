<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<div class="rider_post parallax-back image-overlay col-lg-3 col-sm-4 col-xs-6" style="background-image:url(<?php the_post_thumbnail_url(); ?>);" data-parax="10" data-offset="0" data-invert="1">
	<div class="rider-info">
		<h3><?php the_title(); ?></h3>
		<div class="badges">
			<?php 
				if( get_field('instagram_id') ) { echo '<i class="fa fa-instagram"></i>'; }
				if( get_field('youtube') ) { echo '<i class="fa fa-youtube"></i>'; }
				if( get_field('facebook') ) { echo '<i class="fa fa-facebook"></i>'; }
				if( get_field('snapchat') ) { echo '<i class="fa fa-snapchat-ghost"></i>'; }
				if( get_field('vine') ) { echo '<i class="fa fa-vine"></i>'; }
				if( get_field('twitter') ) { echo '<i class="fa fa-twitter"></i>'; }
			?>
		</div>
	</div>
	<div class="rider-bio">
		<p><?php echo ( substr( get_the_excerpt(), 0, 250 ) ); ?>...</p>
		<a class="btn invert" href="<?php the_permalink(); ?>">Full Profile</a>
	</div>
</div>
