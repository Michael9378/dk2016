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


	

	<section class="events">
		<div class="container">
			<div class="row">
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
<section class="authors">
	<div class="container">
		<div class="row">

			<?php while($riders->have_posts() ) : $riders->the_post(); ?>
			<div class="rider_post col-sm-6">
				<div class="feat_image col-xs-4" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
				</div>
				<div class="bio col-xs-8">
					<h4><?php the_title(); ?></h4>
					<p><?php echo ( substr( get_the_excerpt(), 0, 150 ) ); ?>...</p>
					<a class="btn" href="<?php the_permalink(); ?>">Full Profile</a>
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
