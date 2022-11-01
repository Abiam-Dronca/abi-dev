<?php
	$classes[] = 'post';
	$classes[] = 'thumbnail-style1';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery thb-post-thumbnail-gallery">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-thumbnail-x2' ); ?></a>
	</figure>
	<div class="thumbnail-style1-inner">
		<?php do_action( 'thb_categories' ); ?>
		<?php do_action( 'thb_displayTitle', 'h6' ); ?>
		<?php do_action( 'thb_post_bottom', false ); ?>
	</div>
</div>
