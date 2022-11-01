<?php
	$thb_i           = get_query_var( 'thb_i' ) ? get_query_var( 'thb_i' ) : false;
	$thb_extra_class = get_query_var( 'thb_extra_class' ) ? get_query_var( 'thb_extra_class' ) : false;
	$thb_title_size  = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h6';

	$classes[] = 'post';
	$classes[] = 'thumbnail-style8';
	$classes[] = $thb_extra_class;
?>
<div <?php post_class( $classes ); ?>>
	<?php if ( $thb_i ) { ?>
		<span class="thumb_large_count"><?php echo esc_html( $thb_i ); ?></span>
	<?php } ?>
	<div class="thumbnail-style8-inner">
		<?php do_action( 'thb_categories' ); ?>
		<?php do_action( 'thb_displayTitle', $thb_title_size ); ?>
	</div>
</div>
