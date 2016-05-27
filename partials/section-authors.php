<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<section class="authors">
	<div class="container">
		<div class="row">
			<?php for($i = 0; $i < 5; $i++): ?>
				<?php get_template_part( 'partials/content', 'author_single' ); ?>
			<?php endfor;?>
			<div class="col-sm-4">
				View all authors.
			</div>
		</div>
	</div>
</section>
