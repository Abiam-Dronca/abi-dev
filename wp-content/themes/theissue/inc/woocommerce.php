<?php
if ( ! thb_wc_supported() ) {
	return;
}
/* Add WooCommerce assets to Edit Post Screen */
function set_wc_screen_ids( $screen ) {
	$screen[] = 'post';
	$screen[] = 'page';
	return $screen;
}
add_filter( 'woocommerce_screen_ids', 'set_wc_screen_ids' );

/* Header Cart */
function thb_quick_cart() {
	if ( 'off' === ot_get_option( 'header_cart', 'on' ) ) {
		return; }
	$full_menu_hover_style = ot_get_option( 'full_menu_hover_style', 'thb-standard' );

	?>
	<div class="thb-cart-holder">
	<ul class="thb-full-menu <?php echo esc_attr( $full_menu_hover_style ); ?>">
		<li class="menu-item-has-children">
		<a><?php get_template_part( 'assets/img/svg/cart.svg' ); ?> <span class="float_count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span></a>
				<?php if ( ! is_cart() && ! is_checkout() ) { ?>
					<div class="sub-menu">
						<?php
						if ( class_exists( 'WC_Widget_Cart' ) ) {
							the_widget(
								'WC_Widget_Cart',
								array(
									'title' => false,
								)
							);
						}
						?>
					</div>
				<?php } ?>
		</li>
	</ul>
	</div>
	<?php
}
add_action( 'thb_quick_cart', 'thb_quick_cart', 3 );

/* Related Posts Count */
function thb_change_number_related_products( $args ) {
	set_query_var( 'thb_columns', 'large-3' );

	$args['posts_per_page'] = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'thb_change_number_related_products', 9999 );

/* Product Masonry Sizes */
function thb_get_product_size( $style = 'style2', $i = 0 ) {
	$size = '';
	if ( $style == 'style2' ) {
		$i = in_array( $i, array( '3', '4', '5', '6', '10', '11', '12', '13', '17', '18', '19', '20', '24', '25', '26', '27', '31', '32', '33', '34' ) ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'large-3';
				break;
			case 2:
				$size = 'large-4';
				break;
		}
	} elseif ( $style == 'style3' ) {
		$i = in_array( $i, array( '4', '5', '6', '7', '8', '13', '14', '15', '16', '17', '22', '23', '24', '25', '26', '31', '32', '33', '34', '35' ) ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'thb-5';
				break;
			case 2:
				$size = 'large-3';
				break;
		}
	} elseif ( $style == 'style4' ) {
		$i = in_array( $i, array( '5', '6', '7', '8', '9', '10', '16', '17', '18', '19', '20', '21', '27', '28', '29', '30', '31', '32' ) ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'large-2';
				break;
			case 2:
				$size = 'thb-5';
				break;
		}
	} elseif ( $style == 'style5' ) {
		$i = in_array( $i, array( '4', '5', '6', '11', '12', '13', '18', '19', '20', '25', '26', '27', '32', '33', '34', '39', '40', '41' ) ) ? 1 : 2;
		switch ( $i ) {
			case 2:
				$size = 'large-3';
				break;
			case 1:
				$size = 'large-4';
				break;
		}
	} elseif ( $style == 'style6' ) {
		$i = in_array( $i, array( '5', '6', '7', '8', '14', '15', '16', '17', '23', '24', '25', '26', '32', '33', '34', '35' ) ) ? 1 : 2;
		switch ( $i ) {
			case 2:
				$size = 'thb-5';
				break;
			case 1:
				$size = 'large-3';
				break;
		}
	} elseif ( $style == 'style7' ) {
		$i = in_array( $i, array( '5', '6', '7', '8', '9', '10', '16', '17', '18', '19', '20', '26', '27', '28', '29', '30', '31' ) ) ? 1 : 2;
		switch ( $i ) {
			case 2:
				$size = 'large-2';
				break;
			case 1:
				$size = 'thb-5';
				break;
		}
	} elseif ( $style == 'style8' ) {
		$i = in_array( $i, array( '8', '9', '10', '19', '20', '21', '30', '31', '32' ) ) ? 1 : 2;
		switch ( $i ) {
			case 1:
				$size = 'large-4';
				break;
			case 2:
				$size = 'large-3';
				break;
		}
	}
	return $size;
}
/* Breadcrumbs */
function thb_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' <i>/</i> ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'thb_change_breadcrumb_delimiter' );

/* Pagination */
function thb_woocommerce_pagination_args( $defaults ) {
	$defaults['prev_text'] = thb_load_template_part( 'assets/img/svg/prev_arrow.svg' );
	$defaults['next_text'] = thb_load_template_part( 'assets/img/svg/next_arrow.svg' );

	return $defaults;
}
add_filter( 'woocommerce_pagination_args', 'thb_woocommerce_pagination_args' );

/* Shop Filters */
function thb_shop_filters() {
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		?>
		<!-- Start Shop Filters -->
			<div id="side-filters" class="side-panel">
			<header>
				<a href="#" class="thb-mobile-close" title="<?php esc_attr_e( 'Close', 'theissue' ); ?>"><div><span></span><span></span></div></a>
			</header>
			<div class="side-panel-content custom_scroll side-panel-inner">
				<?php
				if ( is_active_sidebar( 'thb-shop-filters' ) ) {
					dynamic_sidebar( 'thb-shop-filters' ); }
				?>
			</div>
		</div>
		<!-- End Shop Filters -->
		<?php
	}
}
add_action( 'thb_shop_filters', 'thb_shop_filters' );

/* Side Cart */
function thb_side_cart() {
	if ( ! is_cart() && ! is_checkout() ) {
		?>
			<nav id="side-cart" class="side-panel">
				<header>
				<h6><?php esc_html_e( 'Shopping Bag', 'theissue' ); ?></h6>
				<a href="#" class="thb-mobile-close" title="<?php esc_attr_e( 'Close', 'theissue' ); ?>"><div><span></span><span></span></div></a>
			</header>
			<div class="side-panel-content">
				<?php
				if ( class_exists( 'WC_Widget_Cart' ) ) {
					the_widget( 'WC_Widget_Cart' ); }
				?>
				</div>
			</nav>
		<?php
	}
}
add_action( 'thb_side_cart', 'thb_side_cart', 3 );

/* Out of Stock Check */
function thb_out_of_stock() {
	global $post;
	$id     = $post->ID;
	$status = get_post_meta( $id, '_stock_status', true );

	if ( $status == 'outofstock' ) {
		return true;
	} else {
		return false;
	}
}

/* Product Badges */
function thb_product_badge() {
	global $post, $product;
	if ( thb_out_of_stock() ) {
		echo '<span class="badge out-of-stock">' . esc_html__( 'Out of Stock', 'theissue' ) . '</span>';
	} elseif ( $product->is_on_sale() ) {
		if ( ot_get_option( 'shop_sale_badge', 'text' ) == 'discount' ) {
			if ( $product->product_type == 'variable' ) {
				$available_variations = $product->get_available_variations();
				$maximumper           = 0;
				for ( $i = 0; $i < count( $available_variations ); ++$i ) {
					$variation_id      = $available_variations[ $i ]['variation_id'];
					$variable_product1 = new WC_Product_Variation( $variation_id );
					$regular_price     = $variable_product1->regular_price;
					$sales_price       = $variable_product1->sale_price;
					$percentage        = $sales_price ? round( ( ( $regular_price - $sales_price ) / $regular_price ) * 100 ) : 0;
					if ( $percentage > $maximumper ) {
						$maximumper = $percentage;
					}
				}
				echo apply_filters( 'woocommerce_sale_flash', '<span class="badge onsale perc">&darr; ' . $maximumper . '%</span>', $post, $product );
			} elseif ( $product->product_type == 'simple' ) {
				$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
				echo apply_filters( 'woocommerce_sale_flash', '<span class="badge onsale perc">&darr; ' . $percentage . '%</span>', $post, $product );
			} elseif ( $product->product_type == 'external' ) {
				$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
				echo apply_filters( 'woocommerce_sale_flash', '<span class="badge onsale perc">&darr; ' . $percentage . '%</span>', $post, $product );
			}
		} else {
			echo apply_filters( 'woocommerce_sale_flash', '<span class="badge onsale">' . esc_html__( 'Sale', 'theissue' ) . '</span>', $post, $product );
		}
	} else {
		$postdate      = get_the_time( 'Y-m-d' );          // Post date
		$postdatestamp = strtotime( $postdate );           // Timestamped post date
		$newness       = ot_get_option( 'shop_newness', 7 );
		if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
			echo '<span class="badge new">' . esc_html__( 'Just Arrived', 'theissue' ) . '</span>';
		}
	}
}
add_action( 'thb_product_badge', 'thb_product_badge', 3 );

/* WOOCOMMERCE CART LINK */
function thb_woocomerce_ajax_cart_update( $fragments ) {
	ob_start();
	?>
		<span class="float_count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['.float_count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'thb_woocomerce_ajax_cart_update' );

/* WishList Button*/
function thb_wishlist_button() {
	if ( class_exists( 'YITH_WCWL' ) ) {
		global $product;
		$url               = YITH_WCWL()->get_wishlist_url();
		$product_type      = $product->get_type();
		$default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;

		if ( ! empty( $default_wishlists ) ) {
			$default_wishlist = $default_wishlists[0]['ID'];
		} else {
			$default_wishlist = false;
		}

		$exists = YITH_WCWL()->is_product_in_wishlist( $product->get_id(), $default_wishlist );

		$classes = get_option( 'yith_wcwl_use_button' ) == 'yes' ? 'add_to_wishlist single_add_to_wishlist button alt' : 'add_to_wishlist';
		?>
		<div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo esc_attr( $product->get_id() ); ?>">
		<div class="yith-wcwl-add-button" style="display: <?php echo esc_attr( $exists ? 'none' : 'block' ); ?>">
				<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id() ) ); ?>"
					data-product-id="<?php echo esc_attr( $product->get_id() ); ?>"
					data-product-type="<?php echo esc_attr( $product_type ); ?>"
					class="<?php echo esc_attr( $classes ); ?>">
					<span class="text"><?php echo esc_html__( 'Add To Wishlist', 'theissue' ); ?></span><?php get_template_part( 'assets/img/svg/wishlist.svg' ); ?>
				</a>
		</div>
			<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
				<a href="<?php echo esc_url( esc_url( $url ) ); ?>">
					<span class="text"><?php echo esc_html__( 'Added to Wishlist', 'theissue' ); ?></span><?php get_template_part( 'assets/img/svg/wishlist.svg' ); ?>
				</a>
			</div>
			<div class="yith-wcwl-wishlistexistsbrowse" style="display: <?php echo esc_attr( $exists ? 'block' : 'none' ); ?>">
				<a href="<?php echo esc_url( $url ); ?>">
					<span class="text"><?php echo esc_html__( 'View Wishlist', 'theissue' ); ?></span><?php get_template_part( 'assets/img/svg/wishlist.svg' ); ?>
				</a>
			</div>
		</div>
		<?php
	}

}
/* Wishlist */
add_action( 'woocommerce_single_product_summary', 'thb_wishlist_button', 38 );

/* Product Category Grid Sizes */
function thb_get_product_cat_grid_size( $style, $i ) {
	if ( $style == 'style1' ) {
		switch ( $i ) {
			case 1:
			case 11:
			case 21:
				$article_size = 'medium-8';
				break;
			case 3:
			case 13:
			case 23:
				$article_size = 'medium-4 double-height';
				break;
			default:
				$article_size = 'medium-4 grid-sizer';
				break;
		}
	} elseif ( $style == 'style2' ) {

		switch ( $i ) {
			case 1:
			case 13:
				$article_size = 'medium-6';
				break;
			case 2:
			case 4:
			case 5:
			case 6:
			case 9:
			case 8:
			case 10:
			case 11:
			case 14:
			case 15:
			default:
				$article_size = 'medium-3 grid-sizer';
				break;
			case 3:
			case 7:
			case 12:
				$article_size = 'medium-3';
				break;
		}
	} elseif ( $style == 'style3' ) {

		switch ( $i ) {
			case 1:
			case 2:
			case 6:
			case 7:
			case 11:
			case 12:
				$article_size = 'medium-6';
				break;
			case 3:
			case 4:
			case 5:
			default:
				$article_size = 'medium-4';
				break;
		}
	}
	return $article_size;
}

/* Menu Icon Modification */
function thb_new_menu_items( $items ) {
		unset( $items['dashboard'] );
	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'thb_new_menu_items' );

/* Remove default wrappers. */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

/* Shop Headers */
add_action(
	'woocommerce_before_main_content',
	function() {
		if ( is_shop() || is_archive() ) {
			return get_template_part( 'inc/templates/misc/header-shop-filters' );
		}
	},
	5
);

/* Shop Page - Remove orderby & breadcrumb */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'thb_before_shop_loop_result_count', 'woocommerce_result_count', 20 );
add_action( 'thb_before_shop_loop_catalog_ordering', 'woocommerce_catalog_ordering', 30 );

/* Shop Page - Remove Breadcrumb */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'thb_breadcrumbs', 'woocommerce_breadcrumb', 20 );

/* Category Text */
function thb_before_subcategory_title() {
	echo '<div>';
}
add_action( 'woocommerce_before_subcategory_title', 'thb_before_subcategory_title', 15 );
function thb_subcategory_title() {
	echo '<span>' . esc_html__( 'Explore Now', 'theissue' ) . '</span>';
}
add_action( 'woocommerce_shop_loop_subcategory_title', 'thb_subcategory_title', 15 );
function thb_after_subcategory_title() {
	echo '</div>';
}
add_action( 'woocommerce_after_subcategory_title', 'thb_after_subcategory_title', 15 );
function thb_subcategory_count_html( $markup, $category ) {
	return '<mark class="count">' . $category->count . '</mark>';
}
add_filter( 'woocommerce_subcategory_count_html', 'thb_subcategory_count_html', 10, 2 );

/* Change Category Thumbnail Size */
function thb_template_loop_category_link_open( $category ) {
	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_src( $thumbnail_id, 'theissue-full' );
		$image = $image[0];
	} else {
		$image = wc_placeholder_img_src();
	}
	echo '<a href="' . get_term_link( $category, 'product_cat' ) . '" style="background-image:url(' . esc_url( $image ) . ')">';
}
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
add_action( 'woocommerce_before_subcategory', 'thb_template_loop_category_link_open', 10 );

/* Cart Page - Move Crosssells */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

/* Checkout */
add_action(
	'woocommerce_checkout_before_customer_details',
	function() {
		echo '<div class="row"><div class="small-12 large-8 columns">';
	},
	5
);

add_action(
	'woocommerce_checkout_after_customer_details',
	function() {
		echo '</div><div class="small-12 large-4 columns">';
	},
	30
);

add_action(
	'woocommerce_checkout_after_order_review',
	function() {
		echo '</div></div>';
	},
	30
);

/* Product Page */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
// woocommerce_before_shop_loop_item
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

// woocommerce_after_shop_loop_item
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// woocommerce_after_shop_loop_item_title
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item_title_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title_loop_rating', 'woocommerce_template_loop_rating', 5 );

// Add Breadcrumb
add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );

// Remove Sidebar
function thb_disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'thb_disable_woo_commerce_sidebar' );

// Product gallery/information layout
add_action(
	'woocommerce_before_single_product_summary',
	function() {
		?>
	<div class="row align-center">
		<div class="small-12 medium-6 columns">
		<?php
	},
	0
);
add_action(
	'woocommerce_before_single_product_summary',
	function() {
		?>
		</div>
		<div class="small-12 medium-6 columns product-information">
		<?php
	},
	100
);
add_action(
	'woocommerce_after_single_product_summary',
	function() {
		?>
		</div>
	</div>
		<?php
	},
	0
);

/* My Account Content */
add_action(
	'woocommerce_account_content',
	function() {
		?>
	<div class="row">
		<div class="small-12 columns">
		<?php
	},
	0
);
add_action(
	'woocommerce_account_content',
	function() {
		?>
		</div>
	</div>
		<?php
	},
	100
);

/* Wishlist */
add_action(
	'yith_wcwl_before_wishlist_form',
	function() {
		?>
	<div class="page-padding">
		<div class="row">
			<div class="small-12 columns">
				<div class="post-content no-vc">
		<?php
	},
	0
);
add_action(
	'yith_wcwl_after_wishlist_form',
	function() {
		?>
				</div>
			</div>
		</div>
	</div>
		<?php
	},
	0
);

/* Plugin Page Ajax Add to Cart */
function thb_woocommerce_single_product() {
	if ( ot_get_option( 'shop_product_ajax_addtocart', 'on' ) === 'off' ) {
		return;
	}

	function thb_ajax_add_to_cart_redirect_template() {
		$thb_ajax = filter_input( INPUT_GET, 'thb-ajax-add-to-cart', FILTER_VALIDATE_BOOLEAN );

		if ( $thb_ajax ) {
			wc_get_template( 'ajax/add-to-cart-fragments.php' );
			exit;
		}
	}
	add_action( 'wp', 'thb_ajax_add_to_cart_redirect_template', 1000 );
	function thb_woocommerce_after_add_to_cart_button() {
		global $product;
		?>
			<input type="hidden" name="action" value="wc_prod_ajax_to_cart" />
		<?php
		// Make sure we have the add-to-cart avaiable as button name doesn't submit via ajax.
		if ( $product->is_type( 'simple' ) ) {
			?>
			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"/>
			<?php
		}
	}
	add_action( 'woocommerce_after_add_to_cart_button', 'thb_woocommerce_after_add_to_cart_button' );
	function thb_woocommerce_display_site_notice() {
		?>
		<div class="thb_prod_ajax_to_cart_notices"></div>
		<?php
	}
	add_action( 'woocommerce_before_main_content', 'thb_woocommerce_display_site_notice', 10 );
}
add_action( 'before_woocommerce_init', 'thb_woocommerce_single_product' );
