<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<section <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-0ffset-1">
				<header>
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
				<?php get_template_part( 'partials/content', 'page' ); ?>
			</div><!-- .col-10 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section>