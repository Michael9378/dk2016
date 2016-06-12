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

<section class="hero">
	<div class="parallax-back image-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/portrait/jarrodair.jpg);" data-parax="10" data-offset="-50">
		<div class="container">
			<div class="row vert-center">
				<div class="col-sm-6 col-sm-offset-6">
				<h1>Them jumps over there?</h1>
				<p>"All you gotta do is hold it wide open. I see it on the TV all the time!" - Trey Canard</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="quote black-back pad">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h2>"I'm going to do whatever I want. That can be my slogan."</h2>
			</div>
		</div>
	</div>
</section>

<section class="insta-cards">
	<div class="container-fluid">
		<div class="row" id="dk-insta">
		</div>
	</div>
</section>

<section class="quote light-back pad">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h2>Hol' up hol' up hol' up. We dem boiz</h2>
			</div>
		</div>
	</div>
</section>

<?php if( !isset( $riders ) ) {
	$args = array( 
		'post_type'				=> 'rider',
		'post_status' 		=> 'publish',
		'posts_per_page'	=> 12,
		'order'						=> 'ASC',
		'orderby'					=> 'date'
 	);
	$riders = new WP_Query( $args );
}
?>
<?php if( $riders->have_posts() ): ?>
<section class="riders">
	<div class="container-fluid">
		<div class="row">

			<?php while($riders->have_posts() ) : $riders->the_post(); ?>
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
			<?php endwhile; ?>

		</div>
	</div>
</section>
<?php endif; // end riders. ?>
<?php wp_reset_postdata(); ?>

	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
