<?php
	$vars  = $wp_query->query_vars;
	$thb_i = array_key_exists( 'thb_i', $vars ) ? $vars['thb_i'] : false;

	$classes[] = 'post';
	$classes[] = 'thumbnail-style2';
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'theissue-thumbnail' ); ?>
		<?php if ( $thb_i ) { ?>
		<span class="thumb_count"><?php echo esc_html( $thb_i ); ?></span>
		<?php } ?>
	</a>
	</figure>
	<div class="thumbnail-style2-inner">
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', 'h5' ); ?>
	</div>
</div>
