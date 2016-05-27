<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<section class="instagram">
	<div class="container-fluid">
		<div class="row">
			<?php for($i = 0; $i < 12; $i++): ?>
				<?php get_template_part( 'partials/content', 'instagram_post' ); ?>
			<?php endfor;?>
		</div>
	</div>
</section>
