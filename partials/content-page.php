<div class="entry-content">
	<div class="entry-content-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php the_content(); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->