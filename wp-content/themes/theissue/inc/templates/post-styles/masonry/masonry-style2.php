<?php
	add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' );

	$classes[] = 'post';
	$classes[] = 'masonry-style2';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
		<?php do_action( 'thb_post_icon' ); ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-masonry-x2' ); ?></a>
	</figure>
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', 'h4' ); ?>
	<div class="post-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<?php do_action( 'thb_post_bottom', true ); ?>
</div>
