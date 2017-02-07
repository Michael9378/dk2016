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
		<div class="parallax-back image-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/portrait/jarrodair.jpg);" data-parax="10" data-offset="-50" data-invert="0">
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

	<section class="quote light-back pad">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h2>"I'm going to do whatever I want. That can be my slogan."</h2>
				</div>
			</div>
		</div>
	</section>

	<!-- call to instagram api -->
	<?php
		$ig_accessToken = '1660834993.22a1aca.70bdc6ed8d6548ed9355b542755f12c4';
		$ig_count = 12;
		$ig_userId = 1660834993;

		$url = "https://api.instagram.com/v1/users/".$ig_userId."/media/recent/?access_token=".$ig_accessToken."&count=".$ig_count;
		// specify which url to use
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL, $url);
		// Execute
		$result = curl_exec($ch);
		// Closing
		curl_close($ch);
		$data = json_decode($result, true)['data'];
	?>
	<section class="insta-cards">
		<div class="container-fluid">
			<div class="row">
				<?php // set the url, name, caption, and link for each insta-post
				foreach($data as $ig){
					$img_url 	= $ig['images']['standard_resolution']['url'];
					$name 		= $ig['user']['full_name'];
					$caption 	= $ig['caption']['text'];
					$link			= $ig['link'];
					require 'partials/post-instagram.php';
				} ?>
			</div>
		</div>
	</section>


	<?php if( !isset( $events ) ) {
		$args = array( 
			'post_type'				=> 'event',
			'post_status' 		=> 'publish',
			'posts_per_page'	=> 6,
			'meta_key'				=> 'date',
			'orderby'					=> 'meta_value_num',
			'order'						=> 'ASC'
	 	);
		$events = new WP_Query( $args );
	}
	?>
	<?php if( $events->have_posts() ): ?>
		<section class="events dark-back">
			<div class="parallax-back image-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/portrait/jarrodglamis.jpg);" data-parax="10" data-offset="0" data-invert="0" >
			
				<div class="container-fluid">
					<h2>Upcoming Events</h2>
					<div class="row">

						<?php while($events->have_posts() ) : $events->the_post(); ?>
							<?php get_template_part('partials/post', 'event'); ?>
						<?php endwhile; ?>

					</div><!-- /row -->
				</div><!-- /container-fluid -->
			</div>
		</section>
	<?php endif; // end events. ?>
	<?php wp_reset_postdata(); ?>

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
			'posts_per_page'	=> 8,
			'order'						=> 'DESC',
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
					<?php get_template_part('partials/post', 'rider'); ?>
				<?php endwhile; ?>
				<!-- add a 'see all' place holder -->

			</div>
		</div>
	</section>
	<?php endif; // end riders. ?>
	<?php wp_reset_postdata(); ?>

	<section class="quote light-back pad">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h2>Where da white women at?</h2>
				</div>
			</div>
		</div>
	</section>

	<?php if( !isset( $spots ) ) {
		$args = array( 
			'post_type'				=> 'spot',
			'post_status' 		=> 'publish',
			'posts_per_page'	=> 6,
			'order'						=> 'DESC',
			'orderby'					=> 'date'
	 	);
		$spots = new WP_Query( $args );
	}
	?>
	<?php if( $spots->have_posts() ): ?>
	<section class="spots">
		<div class="container-fluid">
			<div class="row">

				<?php while($spots->have_posts() ) : $spots->the_post(); ?>
					<?php get_template_part('partials/post', 'spot'); ?>
				<?php endwhile; ?>

			</div>
		</div>
	</section>
	<?php endif; // end spots. ?>
	<?php wp_reset_postdata(); ?>

	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
