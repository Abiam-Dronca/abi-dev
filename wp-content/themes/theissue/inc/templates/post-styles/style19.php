<?php

	$thb_title_size     = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h1';
	$thb_image_size     = get_query_var( 'thb_image_size' ) ? get_query_var( 'thb_image_size' ) : 'theissue-full-x2';
	$thb_excerpt_length = get_query_var( 'thb_excerpt_length' ) ? get_query_var( 'thb_excerpt_length' ) : 'thb_long_excerpt_length';
	add_filter( 'excerpt_length', $thb_excerpt_length );
	$classes[] = 'post';
	$classes[] = 'style19';
	$classes[] = 'center-contents';

?>
<div <?php post_class( $classes ); ?>>
	<?php do_action( 'thb_categories' ); ?>
	<?php do_action( 'thb_displayTitle', $thb_title_size ); ?>
	<figure class="post-gallery">
	<?php do_action( 'thb_post_icon' ); ?>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thb_image_size ); ?></a>
	</figure>
	<div class="post-excerpt">
		<?php the_excerpt(); ?>
		<div>
		<a href="<?php the_permalink(); ?>" class="thb-read-more"><?php esc_html_e( 'Read More', 'theissue' ); ?></a></div>
	</div>
	<?php do_action( 'thb_post_bottom', true ); ?>
	<?php get_template_part( 'inc/templates/post-detail-bits/shopthelook-small' ); ?>
</div>
