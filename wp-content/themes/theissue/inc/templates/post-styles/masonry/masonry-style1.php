<?php
	add_filter( 'excerpt_length', 'thb_short_excerpt_length' );
	$classes[] = 'post';
	$classes[] = 'masonry-style1';
	$classes[] = 'center-contents';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
		<?php do_action( 'thb_post_icon' ); ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-rectangle-x2' ); ?></a>
	</figure>
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', 'h5' ); ?>
	<div class="post-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<?php do_action( 'thb_post_bottom', true ); ?>
</div>
