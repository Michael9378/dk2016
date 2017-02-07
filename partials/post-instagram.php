<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>

<div class="parallax-back insta-card col-md-3 col-sm-4" data-invert="0" data-offset="0" data-parax="13" style="background-image: url(<?php echo $img_url; ?>);">
  <div class="content">
    <p><strong><?php echo $name; ?></strong></p>
    <p class="desc"><?php echo $caption; ?></p>
    <p class="text-center">
    	<a href="<?php echo $link; ?>" target="_blank">
    		<i class="fa fa-instagram"></i>
    	</a>
    </p>
  </div>
</div>
