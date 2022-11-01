<?php
	$classes[] = 'post';
	$classes[] = 'thumbnail-style4 thumbnail-style5';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-thumbnail-x2' ); ?></a>
	</figure>
	<div class="thumbnail-style4-inner">
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', 'h6' ); ?>
	</div>
</div>
