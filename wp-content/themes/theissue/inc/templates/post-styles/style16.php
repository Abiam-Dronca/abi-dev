<?php
	add_filter( 'excerpt_length', 'thb_short_excerpt_length' );
	$classes[] = 'post';
	$classes[] = 'style16';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
	<?php do_action( 'thb_post_icon' ); ?>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-squaresmall-x2' ); ?></a>
	</figure>
	<div class="post-inner-content">
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', 'h2' ); ?>
	<?php do_action( 'thb_post_bottom', true ); ?>
	</div>
</div>
