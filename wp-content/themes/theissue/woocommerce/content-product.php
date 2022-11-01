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

// Get
$shop_product_listing_layout_get = filter_input( INPUT_GET, 'shop_product_listing_layout', FILTER_SANITIZE_STRING );
$shop_product_listing_get        = filter_input( INPUT_GET, 'shop_product_listing', FILTER_SANITIZE_STRING );
$products_per_row_get            = filter_input( INPUT_GET, 'products_per_row', FILTER_SANITIZE_STRING );

// Settings.
$shop_product_listing_layout = isset( $shop_product_listing_layout_get ) ? $shop_product_listing_layout_get : ot_get_option( 'shop_product_listing_layout', 'style1' );
$shop_product_listing        = isset( $shop_product_listing_get ) ? $shop_product_listing_get : ot_get_option( 'shop_product_listing', 'style1' );
$shop_product_hover          = ot_get_option( 'shop_product_hover', 'on' );
$columns                     = isset( $products_per_row_get ) ? $products_per_row_get : ot_get_option( 'products_per_row', 'large-3' );

if ( in_array( $shop_product_listing_layout, array( 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8' ) ) && is_shop() ) {
	$columns = thb_get_product_size( $shop_product_listing_layout, $woocommerce_loop['loop'] );
}

$columns = get_query_var( 'thb_columns' ) ? get_query_var( 'thb_columns' ) : $columns;

$classes[] = 'small-6';
$classes[] = $columns;
$classes[] = 'columns';
$classes[] = 'thb-listing-' . $shop_product_listing;

$product_url = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

?>
<?php
	$featured         = wp_get_attachment_url( get_post_thumbnail_id(), 'shop_catalog' );
	$attachment_ids   = $product->get_gallery_image_ids();
	$thumbnail_second = false;
if ( $attachment_ids ) {
	$loop = 0;
	foreach ( $attachment_ids as $attachment_id ) {
		$image_link = wp_get_attachment_url( $attachment_id );
		if ( ! $image_link ) {
			continue; }
		$loop++;
		$thumbnail_second = $attachment_id;
		if ( $image_link !== $featured ) {
			if ( $loop == 1 ) {
				break; }
		}
	}
}
	$style = $class = $thumbnail_class = '';
if ( $thumbnail_second ) {
	$thumbnail_class = 'thb_hover';
}
?>
<li <?php wc_product_class( $classes, $product ); ?>>
	<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );


	?>
	<figure class="product_thumbnail <?php echo esc_attr( $thumbnail_class ); ?>">
		<?php do_action( 'thb_product_badge' ); ?>
		<?php
		if ( $shop_product_listing === 'style1' ) {
			thb_wishlist_button(); }
		?>
		<a href="<?php echo esc_url( $product_url ); ?>" title="<?php the_title_attribute(); ?>">
			<?php if ( $shop_product_hover === 'on' ) { ?>
			<span class="product_thumbnail_hover"><?php echo wp_get_attachment_image( $thumbnail_second, 'shop_catalog' ); ?></span>
			<?php } ?>
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
</li>
