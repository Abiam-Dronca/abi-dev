<?php
	$thb_excerpt_length = get_query_var( 'thb_excerpt_length' ) ? get_query_var( 'thb_excerpt_length' ) : 'thb_supershort_excerpt_length';
	$thb_excerpt        = get_query_var( 'thb_excerpt' ) ? get_query_var( 'thb_excerpt' ) : false;
	$thb_title_size     = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h5';
	$thb_image_size     = get_query_var( 'thb_image_size' ) ? get_query_var( 'thb_image_size' ) : 'theissue-squaresmall-x2';
	$classes[]          = 'post';
	$classes[]          = 'style1';

	add_filter( 'excerpt_length', $thb_excerpt_length );
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
		<?php do_action( 'thb_post_icon' ); ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thb_image_size ); ?></a>
	</figure>
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', $thb_title_size ); ?>
	<?php if ( $thb_excerpt ) { ?>
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>
	<?php } ?>
	<?php do_action( 'thb_post_bottom', true ); ?>
</div>
