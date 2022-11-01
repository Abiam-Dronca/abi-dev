<?php
	$thb_title_size = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h6';
	$classes[]      = 'post';
	$classes[]      = 'thumbnail-style9';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-thumbnail-x2' ); ?></a>
	</figure>
	<div class="thumbnail-style9-inner">
	<?php do_action( 'thb_displayTitle', $thb_title_size ); ?>
	</div>
</div>
