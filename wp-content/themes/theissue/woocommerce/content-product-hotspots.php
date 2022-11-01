<?php
global $product;

$product = wc_get_product(get_the_id());

if ( $product->is_type( 'external' ) ) {
  $permalink = apply_filters( 'woocommerce_loop_product_link', $product->get_product_url(), $product );
} else {
  $permalink = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
}

$classes[] = 'product-hotspots';
?>

<div <?php wc_product_class($classes, $product); ?>>
	<figure class="product-image">
		<?php do_action( 'thb_product_badge'); ?>
		<a <?php if ( $product->is_type( 'external' ) ) { ?>target="_blank"<?php } ?> href="<?php echo esc_url( $permalink ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
			<?php the_post_thumbnail(); ?>
		</a>
	</figure>
	<div class="product-title">
		<h6><a <?php if ( $product->is_type( 'external' ) ) { ?>target="_blank"<?php } ?> href="<?php echo esc_url( $permalink ); ?>"><?php the_title(); ?></a></h6>
		<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
		<a <?php if ( $product->is_type( 'external' ) ) { ?>target="_blank"<?php } ?> href="<?php echo esc_url( $permalink ); ?>" class="hotspots-buynow"><?php esc_html_e( 'BUY NOW', 'theissue' ); ?></a>
	</div>
</div><!-- end product -->
