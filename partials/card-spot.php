<?php
/**
 * Used in the map page to display a single spot.
 *
 * @package _tk
 */
?>

<?php
$index = 0;
$link = get_permalink();
$latLong = get_field('lat_long');
$difficulty = get_field('difficulty');
$terrain = get_field('type_of_riding'); ?>

<div class="card-box location" id="location-<?php the_ID(); ?>" data-distance="0">
	<!-- location info -->
	<a href="<?php echo $link; ?>">
		<h4 class="location-name"><?php the_title(); ?></h4>
	</a>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			
			<div class="location-latLong" style="display:none;">
				<p><strong>Location</strong> 
					<a href="http://maps.google.com/?q=<?php echo $latLong ?>" target="_blank">(<?php echo $latLong; ?>)</a></p>
			</div>

			<p class="location-distance" style="display:none;">
				<strong>Distance</strong> <span>N/A</span>
			</p>

			<p class="spot-difficulty" style="display:none;">
				<strong>Difficulty</strong> <span><?php echo $difficulty; ?></span>
			</p>

			<p class="spot-difficulty" style="display:none;">
				<strong>Terrain</strong> <span><?php echo $terrain; ?></span>
			</p>

		</div>
	</div>
</div>
