<div class="single single-location">
	<section class="content">
		<div class="container">
			<div class="row">
				<h1><?php the_title(); ?></h1>
				<h5>Terrain Type: </h5><span id="terrain"><?php the_field('type_of_riding'); ?></span>
				<h5>Difficulty: </h5><span id="difficulty"><?php the_field('difficulty'); ?></span>
				<h5>Description: </h5>
					<p><?php the_content(); ?></p>
			</div>
		</div>
	</section>
	<section class="gallery">
		<div class="container-fluid">
			<div class="row">
				<?php $gallery = get_field('spot_gallery'); 
					foreach( $gallery as $img ): 
						var_dump($img);
						$imgId = $img["ID"];
						$thumbnail = $img["sizes"]["thumbnail"];
						$imgUrl = $img["url"]; ?>
					<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<h2>Recommended Gear</h2>
			<?php the_field('recommended_equipment'); ?>
		</div>
	</section>
</div>