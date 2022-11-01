<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$shop_product_listing = isset( $shop_product_listing_get ) ? $shop_product_listing_get : ot_get_option( 'shop_product_listing', 'style1' );

$classes[] = 'thb-listing-' . $shop_product_listing;

$product_url = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

?>
<div <?php wc_product_class( $classes, $product ); ?>>
	<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );


	?>
	<figure class="product_thumbnail">
		<?php do_action( 'thb_product_badge' ); ?>
		<?php
		if ( $shop_product_listing === 'style1' ) {
			thb_wishlist_button(); }
		?>
		<a href="<?php echo esc_url( $product_url ); ?>" title="<?php the_title_attribute(); ?>">
			<?php echo woocommerce_get_product_thumbnail(); ?>
		</a>
	</figure>
	<h3>
		<a href="<?php echo esc_url( $product_url ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		<?php
		if ( $shop_product_listing === 'style2' ) {
			thb_wishlist_button(); }
		?>
	</h3>
	<div class="product_after_title">
		<div class="product_after_shop_loop_price">
			<?php do_action( 'woocommerce_after_shop_loop_item_title_loop_price' ); ?>
		</div>

		<div class="product_after_shop_loop_buttons">
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
	</div>
</div>
