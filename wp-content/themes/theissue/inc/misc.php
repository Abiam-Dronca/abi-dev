<?php
/* Body Classes */
function thb_body_classes( $classes ) {
	if ( is_single() ) {
		$article_dropcap = 'thb-dropcap-' . ot_get_option( 'article_dropcap', 'off' );
		$classes[]       = $article_dropcap;
	}
	$thb_dark_mode = ot_get_option( 'thb_dark_mode', 'off' );

	if ( get_option( 'thb_dark_mode' ) ) {
		$thb_dark_mode = 'on';
	}
	$dropdown_color = 'on' === $thb_dark_mode ? 'dark' : ot_get_option( 'full_menu_dropdown_color', 'light' );

	$classes[] = 'fixed-header-' . ot_get_option( 'fixed_header', 'on' );
	$classes[] = 'fixed-header-scroll-' . ot_get_option( 'fixed_header_scroll', 'on' );
	$classes[] = 'thb-dropdown-color-' . $dropdown_color;
	$classes[] = 'right-click-' . ot_get_option( 'right_click', 'on' );
	$classes[] = 'thb-borders-' . ot_get_option( 'site_borders', 'off' );
	$classes[] = 'thb-pinit-' . ot_get_option( 'thb_pinit', 'on' );
	$classes[] = 'thb-boxed-' . ot_get_option( 'general_boxed', 'off' );
	$classes[] = 'thb-dark-mode-' . $thb_dark_mode;
	$classes[] = 'thb-capitalize-' . ot_get_option( 'general_capitalize', 'off' );
	$classes[] = 'thb-parallax-' . ot_get_option( 'general_parallax', 'on' );
	$classes[] = 'thb-single-product-ajax-' . ot_get_option( 'shop_product_ajax_addtocart', 'on' );
	$classes[] = 'thb-article-sidebar-mobile-' . ot_get_option( 'article_sidebar_mobile', 'off' );
	return $classes;
}
add_filter( 'body_class', 'thb_body_classes' );

/* Change max image size */
function thb_max_srcset_image_width( $max_width, $size_array ) {
	$width = $size_array[0];
	return $width;
}
add_filter( 'max_srcset_image_width', 'thb_max_srcset_image_width', 10, 2 );

/* Boxed */
function thb_boxed_wrapper_before() {
	if ( 'off' === ot_get_option( 'general_boxed', 'off' ) ) {
		return; }
	?>
	<div class="thb-boxed-wrapper">
	<?php

}
add_action( 'thb_before_main', 'thb_boxed_wrapper_before', 3 );

function thb_boxed_wrapper_after() {
	if ( 'off' === ot_get_option( 'general_boxed', 'off' ) ) {
		return; }
	?>
	</div>
	<?php
}
add_action( 'thb_after_main', 'thb_boxed_wrapper_after', 3 );

/* Youtube & Vimeo Embeds */
function thb_remove_youtube_controls( $code, $url ) {
	$wp_oembed = new WP_oEmbed();
	$provider  = $wp_oembed->get_provider( $url );
	$data      = $wp_oembed->fetch( $provider, $url, array() );

	if ( ! $provider || false === $data ) {
		echo do_shortcode( '[video src="' . $url . '"]' );
		return;
	}
	if ( 'video' !== $data->type ) {
		return $code;
	}
	if ( $data->error ) {
		if ( $data->error->message ) {
			return '<div class="flex-video widescreen">' . esc_html( $data->error->message ) . '</div>';
		}
	}

	if ( ! in_array( $data->provider_name, array( 'Vimeo', 'YouTube' ), true ) ) {
		return $code;
	}
	if ( 'YouTube' === $data->provider_name ) {
		$splode   = array_reverse( explode( '/', $data->thumbnail_url ) );
		$video_id = $splode[1];
	} else {
		$video_id = $data->video_id;
	}
	if ( 'on' === ot_get_option( 'thb_custom_video_player', 'on' ) ) {
		return '<div class="flex-video widescreen ' . strtolower( $data->provider_name ) . '" data-plyr-embed-id="' . $video_id . '" data-plyr-provider="' . strtolower( $data->provider_name ) . '">' . $code . '</div>';
	} else {
		return '<div class="flex-video widescreen ' . strtolower( $data->provider_name ) . '">' . $code . '</div>';
	}
}

add_filter( 'embed_handler_html', 'thb_remove_youtube_controls', 10, 2 );
add_filter( 'embed_oembed_html', 'thb_remove_youtube_controls', 10, 2 );

add_filter( 'wp_video_shortcode_library', 'thb_no_mediaelement' );

function thb_no_mediaelement() {
	return '';
}

/* Loading Lazy */
function thb_modify_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	return str_replace( '<img', '<img loading="lazy"', $html );
}
/* Load Template */
function thb_load_template_part( $template_name ) {
	ob_start();
	get_template_part( $template_name );
	$var = ob_get_clean();
	return $var;
}
// Site Borders.
function thb_borders() {
	if ( 'on' === ot_get_option( 'site_borders', 'off' ) ) {
		?>
	<div class="thb-borders"></div>
		<?php
	}
}
add_action( 'thb_before_wrapper', 'thb_borders', 3 );

/* Mobile Menu */
function thb_mobile_menu() {
	get_template_part( 'inc/templates/header/mobile-menu-style1' );
}
add_action( 'thb_mobile_menu', 'thb_mobile_menu' );

/* WooCommerce Check */
function thb_wc_supported() {
	return class_exists( 'WooCommerce' );
}
function thb_is_woocommerce() {
	if ( ! thb_wc_supported() ) {
		return false;
	}
	return ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() );
}
/* Menu Array */
function thb_getMenuArray() {
	$menus     = get_terms( 'nav_menu' );
	$new_menus = array();

	foreach ( $menus as $menu ) {
		$new_menus[ $menu->name ] = $menu->term_id;
	}
	return $new_menus;
}
/* Icon Array */
function thb_getIconArray( $empty = true ) {
	$icons = array(
		'Arrows Anticlockwise'                  => 'arrows_anticlockwise.svg',
		'Arrows Anticlockwise Dashed'           => 'arrows_anticlockwise_dashed.svg',
		'Arrows Button Down'                    => 'arrows_button_down.svg',
		'Arrows Button Off'                     => 'arrows_button_off.svg',
		'Arrows Button On'                      => 'arrows_button_on.svg',
		'Arrows Button Up'                      => 'arrows_button_up.svg',
		'Arrows Check'                          => 'arrows_check.svg',
		'Arrows Circle Check'                   => 'arrows_circle_check.svg',
		'Arrows Circle Down'                    => 'arrows_circle_down.svg',
		'Arrows Circle Downleft'                => 'arrows_circle_downleft.svg',
		'Arrows Circle Downright'               => 'arrows_circle_downright.svg',
		'Arrows Circle Left'                    => 'arrows_circle_left.svg',
		'Arrows Circle Minus'                   => 'arrows_circle_minus.svg',
		'Arrows Circle Plus'                    => 'arrows_circle_plus.svg',
		'Arrows Circle Remove'                  => 'arrows_circle_remove.svg',
		'Arrows Circle Right'                   => 'arrows_circle_right.svg',
		'Arrows Circle Up'                      => 'arrows_circle_up.svg',
		'Arrows Circle Upleft'                  => 'arrows_circle_upleft.svg',
		'Arrows Circle Upright'                 => 'arrows_circle_upright.svg',
		'Arrows Clockwise'                      => 'arrows_clockwise.svg',
		'Arrows Clockwise Dashed'               => 'arrows_clockwise_dashed.svg',
		'Arrows Compress'                       => 'arrows_compress.svg',
		'Arrows Deny'                           => 'arrows_deny.svg',
		'Arrows Diagonal'                       => 'arrows_diagonal.svg',
		'Arrows Diagonal2'                      => 'arrows_diagonal2.svg',
		'Arrows Down'                           => 'arrows_down.svg',
		'Arrows Down Double-34'                 => 'arrows_down_double-34.svg',
		'Arrows Downleft'                       => 'arrows_downleft.svg',
		'Arrows Downright'                      => 'arrows_downright.svg',
		'Arrows Drag Down'                      => 'arrows_drag_down.svg',
		'Arrows Drag Down Dashed'               => 'arrows_drag_down_dashed.svg',
		'Arrows Drag Horiz'                     => 'arrows_drag_horiz.svg',
		'Arrows Drag Left'                      => 'arrows_drag_left.svg',
		'Arrows Drag Left Dashed'               => 'arrows_drag_left_dashed.svg',
		'Arrows Drag Right'                     => 'arrows_drag_right.svg',
		'Arrows Drag Right Dashed'              => 'arrows_drag_right_dashed.svg',
		'Arrows Drag Up'                        => 'arrows_drag_up.svg',
		'Arrows Drag Up Dashed'                 => 'arrows_drag_up_dashed.svg',
		'Arrows Drag Vert'                      => 'arrows_drag_vert.svg',
		'Arrows Exclamation'                    => 'arrows_exclamation.svg',
		'Arrows Expand'                         => 'arrows_expand.svg',
		'Arrows Expand Diagonal1'               => 'arrows_expand_diagonal1.svg',
		'Arrows Expand Horizontal1'             => 'arrows_expand_horizontal1.svg',
		'Arrows Expand Vertical1'               => 'arrows_expand_vertical1.svg',
		'Arrows Fit Horizontal'                 => 'arrows_fit_horizontal.svg',
		'Arrows Fit Vertical'                   => 'arrows_fit_vertical.svg',
		'Arrows Glide'                          => 'arrows_glide.svg',
		'Arrows Glide Horizontal'               => 'arrows_glide_horizontal.svg',
		'Arrows Glide Vertical'                 => 'arrows_glide_vertical.svg',
		'Arrows Hamburger 2'                    => 'arrows_hamburger 2.svg',
		'Arrows Hamburger1'                     => 'arrows_hamburger1.svg',
		'Arrows Horizontal'                     => 'arrows_horizontal.svg',
		'Arrows Info'                           => 'arrows_info.svg',
		'Arrows Keyboard Alt'                   => 'arrows_keyboard_alt.svg',
		'Arrows Keyboard Cmd-29'                => 'arrows_keyboard_cmd-29.svg',
		'Arrows Keyboard Delete'                => 'arrows_keyboard_delete.svg',
		'Arrows Keyboard Down-28'               => 'arrows_keyboard_down-28.svg',
		'Arrows Keyboard Left'                  => 'arrows_keyboard_left.svg',
		'Arrows Keyboard Return'                => 'arrows_keyboard_return.svg',
		'Arrows Keyboard Right'                 => 'arrows_keyboard_right.svg',
		'Arrows Keyboard Shift'                 => 'arrows_keyboard_shift.svg',
		'Arrows Keyboard Tab'                   => 'arrows_keyboard_tab.svg',
		'Arrows Keyboard Up'                    => 'arrows_keyboard_up.svg',
		'Arrows Left'                           => 'arrows_left.svg',
		'Arrows Left Double-32'                 => 'arrows_left_double-32.svg',
		'Arrows Minus'                          => 'arrows_minus.svg',
		'Arrows Move'                           => 'arrows_move.svg',
		'Arrows Move2'                          => 'arrows_move2.svg',
		'Arrows Move Bottom'                    => 'arrows_move_bottom.svg',
		'Arrows Move Left'                      => 'arrows_move_left.svg',
		'Arrows Move Right'                     => 'arrows_move_right.svg',
		'Arrows Move Top'                       => 'arrows_move_top.svg',
		'Arrows Plus'                           => 'arrows_plus.svg',
		'Arrows Question'                       => 'arrows_question.svg',
		'Arrows Remove'                         => 'arrows_remove.svg',
		'Arrows Right'                          => 'arrows_right.svg',
		'Arrows Right Double-31'                => 'arrows_right_double-31.svg',
		'Arrows Rotate'                         => 'arrows_rotate.svg',
		'Arrows Rotate Anti'                    => 'arrows_rotate_anti.svg',
		'Arrows Rotate Anti Dashed'             => 'arrows_rotate_anti_dashed.svg',
		'Arrows Rotate Dashed'                  => 'arrows_rotate_dashed.svg',
		'Arrows Shrink'                         => 'arrows_shrink.svg',
		'Arrows Shrink Diagonal1'               => 'arrows_shrink_diagonal1.svg',
		'Arrows Shrink Diagonal2'               => 'arrows_shrink_diagonal2.svg',
		'Arrows Shrink Horizonal2'              => 'arrows_shrink_horizonal2.svg',
		'Arrows Shrink Horizontal1'             => 'arrows_shrink_horizontal1.svg',
		'Arrows Shrink Vertical1'               => 'arrows_shrink_vertical1.svg',
		'Arrows Shrink Vertical2'               => 'arrows_shrink_vertical2.svg',
		'Arrows Sign Down'                      => 'arrows_sign_down.svg',
		'Arrows Sign Left'                      => 'arrows_sign_left.svg',
		'Arrows Sign Right'                     => 'arrows_sign_right.svg',
		'Arrows Sign Up'                        => 'arrows_sign_up.svg',
		'Arrows Slide Down1'                    => 'arrows_slide_down1.svg',
		'Arrows Slide Down2'                    => 'arrows_slide_down2.svg',
		'Arrows Slide Left1'                    => 'arrows_slide_left1.svg',
		'Arrows Slide Left2'                    => 'arrows_slide_left2.svg',
		'Arrows Slide Right1'                   => 'arrows_slide_right1.svg',
		'Arrows Slide Right2'                   => 'arrows_slide_right2.svg',
		'Arrows Slide Up1'                      => 'arrows_slide_up1.svg',
		'Arrows Slide Up2'                      => 'arrows_slide_up2.svg',
		'Arrows Slim Down'                      => 'arrows_slim_down.svg',
		'Arrows Slim Down Dashed'               => 'arrows_slim_down_dashed.svg',
		'Arrows Slim Left'                      => 'arrows_slim_left.svg',
		'Arrows Slim Left Dashed'               => 'arrows_slim_left_dashed.svg',
		'Arrows Slim Right'                     => 'arrows_slim_right.svg',
		'Arrows Slim Right Dashed'              => 'arrows_slim_right_dashed.svg',
		'Arrows Slim Up'                        => 'arrows_slim_up.svg',
		'Arrows Slim Up Dashed'                 => 'arrows_slim_up_dashed.svg',
		'Arrows Square Check'                   => 'arrows_square_check.svg',
		'Arrows Square Down'                    => 'arrows_square_down.svg',
		'Arrows Square Downleft'                => 'arrows_square_downleft.svg',
		'Arrows Square Downright'               => 'arrows_square_downright.svg',
		'Arrows Square Left'                    => 'arrows_square_left.svg',
		'Arrows Square Minus'                   => 'arrows_square_minus.svg',
		'Arrows Square Plus'                    => 'arrows_square_plus.svg',
		'Arrows Square Remove'                  => 'arrows_square_remove.svg',
		'Arrows Square Right'                   => 'arrows_square_right.svg',
		'Arrows Square Up'                      => 'arrows_square_up.svg',
		'Arrows Square Upleft'                  => 'arrows_square_upleft.svg',
		'Arrows Square Upright'                 => 'arrows_square_upright.svg',
		'Arrows Squares'                        => 'arrows_squares.svg',
		'Arrows Stretch Diagonal1'              => 'arrows_stretch_diagonal1.svg',
		'Arrows Stretch Diagonal2'              => 'arrows_stretch_diagonal2.svg',
		'Arrows Stretch Diagonal3'              => 'arrows_stretch_diagonal3.svg',
		'Arrows Stretch Diagonal4'              => 'arrows_stretch_diagonal4.svg',
		'Arrows Stretch Horizontal1'            => 'arrows_stretch_horizontal1.svg',
		'Arrows Stretch Horizontal2'            => 'arrows_stretch_horizontal2.svg',
		'Arrows Stretch Vertical1'              => 'arrows_stretch_vertical1.svg',
		'Arrows Stretch Vertical2'              => 'arrows_stretch_vertical2.svg',
		'Arrows Switch Horizontal'              => 'arrows_switch_horizontal.svg',
		'Arrows Switch Vertical'                => 'arrows_switch_vertical.svg',
		'Arrows Up'                             => 'arrows_up.svg',
		'Arrows Up Double'                      => 'arrows_up_double.svg',
		'Arrows Upright'                        => 'arrows_upright.svg',
		'Arrows Vertical'                       => 'arrows_vertical.svg',
		'Basic Accelerator'                     => 'basic_accelerator.svg',
		'Basic Alarm'                           => 'basic_alarm.svg',
		'Basic Anchor'                          => 'basic_anchor.svg',
		'Basic Anticlockwise'                   => 'basic_anticlockwise.svg',
		'Basic Archive'                         => 'basic_archive.svg',
		'Basic Archive Full'                    => 'basic_archive_full.svg',
		'Basic Ban'                             => 'basic_ban.svg',
		'Basic Battery Charge'                  => 'basic_battery_charge.svg',
		'Basic Battery Empty'                   => 'basic_battery_empty.svg',
		'Basic Battery Full'                    => 'basic_battery_full.svg',
		'Basic Battery Half'                    => 'basic_battery_half.svg',
		'Basic Bolt'                            => 'basic_bolt.svg',
		'Basic Book'                            => 'basic_book.svg',
		'Basic Book Pen'                        => 'basic_book_pen.svg',
		'Basic Book Pencil'                     => 'basic_book_pencil.svg',
		'Basic Bookmark'                        => 'basic_bookmark.svg',
		'Basic Calculator'                      => 'basic_calculator.svg',
		'Basic Calendar'                        => 'basic_calendar.svg',
		'Basic Cards Diamonds'                  => 'basic_cards_diamonds.svg',
		'Basic Cards Hearts'                    => 'basic_cards_hearts.svg',
		'Basic Case'                            => 'basic_case.svg',
		'Basic Chronometer'                     => 'basic_chronometer.svg',
		'Basic Clessidre'                       => 'basic_clessidre.svg',
		'Basic Clock'                           => 'basic_clock.svg',
		'Basic Clockwise'                       => 'basic_clockwise.svg',
		'Basic Cloud'                           => 'basic_cloud.svg',
		'Basic Clubs'                           => 'basic_clubs.svg',
		'Basic Compass'                         => 'basic_compass.svg',
		'Basic Cup'                             => 'basic_cup.svg',
		'Basic Diamonds'                        => 'basic_diamonds.svg',
		'Basic Display'                         => 'basic_display.svg',
		'Basic Download'                        => 'basic_download.svg',
		'Basic Elaboration Bookmark Checck'     => 'basic_elaboration_bookmark_checck.svg',
		'Basic Elaboration Bookmark Minus'      => 'basic_elaboration_bookmark_minus.svg',
		'Basic Elaboration Bookmark Plus'       => 'basic_elaboration_bookmark_plus.svg',
		'Basic Elaboration Bookmark Remove'     => 'basic_elaboration_bookmark_remove.svg',
		'Basic Elaboration Briefcase Check'     => 'basic_elaboration_briefcase_check.svg',
		'Basic Elaboration Briefcase Download'  => 'basic_elaboration_briefcase_download.svg',
		'Basic Elaboration Briefcase Flagged'   => 'basic_elaboration_briefcase_flagged.svg',
		'Basic Elaboration Briefcase Minus'     => 'basic_elaboration_briefcase_minus.svg',
		'Basic Elaboration Briefcase Plus'      => 'basic_elaboration_briefcase_plus.svg',
		'Basic Elaboration Briefcase Refresh'   => 'basic_elaboration_briefcase_refresh.svg',
		'Basic Elaboration Briefcase Remove'    => 'basic_elaboration_briefcase_remove.svg',
		'Basic Elaboration Briefcase Search'    => 'basic_elaboration_briefcase_search.svg',
		'Basic Elaboration Briefcase Star'      => 'basic_elaboration_briefcase_star.svg',
		'Basic Elaboration Briefcase Upload'    => 'basic_elaboration_briefcase_upload.svg',
		'Basic Elaboration Browser Check'       => 'basic_elaboration_browser_check.svg',
		'Basic Elaboration Browser Download'    => 'basic_elaboration_browser_download.svg',
		'Basic Elaboration Browser Minus'       => 'basic_elaboration_browser_minus.svg',
		'Basic Elaboration Browser Plus'        => 'basic_elaboration_browser_plus.svg',
		'Basic Elaboration Browser Refresh'     => 'basic_elaboration_browser_refresh.svg',
		'Basic Elaboration Browser Remove'      => 'basic_elaboration_browser_remove.svg',
		'Basic Elaboration Browser Search'      => 'basic_elaboration_browser_search.svg',
		'Basic Elaboration Browser Star'        => 'basic_elaboration_browser_star.svg',
		'Basic Elaboration Browser Upload'      => 'basic_elaboration_browser_upload.svg',
		'Basic Elaboration Calendar Check'      => 'basic_elaboration_calendar_check.svg',
		'Basic Elaboration Calendar Cloud'      => 'basic_elaboration_calendar_cloud.svg',
		'Basic Elaboration Calendar Download'   => 'basic_elaboration_calendar_download.svg',
		'Basic Elaboration Calendar Empty'      => 'basic_elaboration_calendar_empty.svg',
		'Basic Elaboration Calendar Flagged'    => 'basic_elaboration_calendar_flagged.svg',
		'Basic Elaboration Calendar Heart'      => 'basic_elaboration_calendar_heart.svg',
		'Basic Elaboration Calendar Minus'      => 'basic_elaboration_calendar_minus.svg',
		'Basic Elaboration Calendar Next'       => 'basic_elaboration_calendar_next.svg',
		'Basic Elaboration Calendar Noaccess'   => 'basic_elaboration_calendar_noaccess.svg',
		'Basic Elaboration Calendar Pencil'     => 'basic_elaboration_calendar_pencil.svg',
		'Basic Elaboration Calendar Plus'       => 'basic_elaboration_calendar_plus.svg',
		'Basic Elaboration Calendar Previous'   => 'basic_elaboration_calendar_previous.svg',
		'Basic Elaboration Calendar Refresh'    => 'basic_elaboration_calendar_refresh.svg',
		'Basic Elaboration Calendar Remove'     => 'basic_elaboration_calendar_remove.svg',
		'Basic Elaboration Calendar Search'     => 'basic_elaboration_calendar_search.svg',
		'Basic Elaboration Calendar Star'       => 'basic_elaboration_calendar_star.svg',
		'Basic Elaboration Calendar Upload'     => 'basic_elaboration_calendar_upload.svg',
		'Basic Elaboration Cloud Check'         => 'basic_elaboration_cloud_check.svg',
		'Basic Elaboration Cloud Download'      => 'basic_elaboration_cloud_download.svg',
		'Basic Elaboration Cloud Minus'         => 'basic_elaboration_cloud_minus.svg',
		'Basic Elaboration Cloud Noaccess'      => 'basic_elaboration_cloud_noaccess.svg',
		'Basic Elaboration Cloud Plus'          => 'basic_elaboration_cloud_plus.svg',
		'Basic Elaboration Cloud Refresh'       => 'basic_elaboration_cloud_refresh.svg',
		'Basic Elaboration Cloud Remove'        => 'basic_elaboration_cloud_remove.svg',
		'Basic Elaboration Cloud Search'        => 'basic_elaboration_cloud_search.svg',
		'Basic Elaboration Cloud Upload'        => 'basic_elaboration_cloud_upload.svg',
		'Basic Elaboration Document Check'      => 'basic_elaboration_document_check.svg',
		'Basic Elaboration Document Cloud'      => 'basic_elaboration_document_cloud.svg',
		'Basic Elaboration Document Download'   => 'basic_elaboration_document_download.svg',
		'Basic Elaboration Document Flagged'    => 'basic_elaboration_document_flagged.svg',
		'Basic Elaboration Document Graph'      => 'basic_elaboration_document_graph.svg',
		'Basic Elaboration Document Heart'      => 'basic_elaboration_document_heart.svg',
		'Basic Elaboration Document Minus'      => 'basic_elaboration_document_minus.svg',
		'Basic Elaboration Document Next'       => 'basic_elaboration_document_next.svg',
		'Basic Elaboration Document Noaccess'   => 'basic_elaboration_document_noaccess.svg',
		'Basic Elaboration Document Note'       => 'basic_elaboration_document_note.svg',
		'Basic Elaboration Document Pencil'     => 'basic_elaboration_document_pencil.svg',
		'Basic Elaboration Document Picture'    => 'basic_elaboration_document_picture.svg',
		'Basic Elaboration Document Plus'       => 'basic_elaboration_document_plus.svg',
		'Basic Elaboration Document Previous'   => 'basic_elaboration_document_previous.svg',
		'Basic Elaboration Document Refresh'    => 'basic_elaboration_document_refresh.svg',
		'Basic Elaboration Document Remove'     => 'basic_elaboration_document_remove.svg',
		'Basic Elaboration Document Search'     => 'basic_elaboration_document_search.svg',
		'Basic Elaboration Document Star'       => 'basic_elaboration_document_star.svg',
		'Basic Elaboration Document Upload'     => 'basic_elaboration_document_upload.svg',
		'Basic Elaboration Folder Check'        => 'basic_elaboration_folder_check.svg',
		'Basic Elaboration Folder Cloud'        => 'basic_elaboration_folder_cloud.svg',
		'Basic Elaboration Folder Document'     => 'basic_elaboration_folder_document.svg',
		'Basic Elaboration Folder Download'     => 'basic_elaboration_folder_download.svg',
		'Basic Elaboration Folder Flagged'      => 'basic_elaboration_folder_flagged.svg',
		'Basic Elaboration Folder Graph'        => 'basic_elaboration_folder_graph.svg',
		'Basic Elaboration Folder Heart'        => 'basic_elaboration_folder_heart.svg',
		'Basic Elaboration Folder Minus'        => 'basic_elaboration_folder_minus.svg',
		'Basic Elaboration Folder Next'         => 'basic_elaboration_folder_next.svg',
		'Basic Elaboration Folder Noaccess'     => 'basic_elaboration_folder_noaccess.svg',
		'Basic Elaboration Folder Note'         => 'basic_elaboration_folder_note.svg',
		'Basic Elaboration Folder Pencil'       => 'basic_elaboration_folder_pencil.svg',
		'Basic Elaboration Folder Picture'      => 'basic_elaboration_folder_picture.svg',
		'Basic Elaboration Folder Plus'         => 'basic_elaboration_folder_plus.svg',
		'Basic Elaboration Folder Previous'     => 'basic_elaboration_folder_previous.svg',
		'Basic Elaboration Folder Refresh'      => 'basic_elaboration_folder_refresh.svg',
		'Basic Elaboration Folder Remove'       => 'basic_elaboration_folder_remove.svg',
		'Basic Elaboration Folder Search'       => 'basic_elaboration_folder_search.svg',
		'Basic Elaboration Folder Star'         => 'basic_elaboration_folder_star.svg',
		'Basic Elaboration Folder Upload'       => 'basic_elaboration_folder_upload.svg',
		'Basic Elaboration Mail Check'          => 'basic_elaboration_mail_check.svg',
		'Basic Elaboration Mail Cloud'          => 'basic_elaboration_mail_cloud.svg',
		'Basic Elaboration Mail Document'       => 'basic_elaboration_mail_document.svg',
		'Basic Elaboration Mail Download'       => 'basic_elaboration_mail_download.svg',
		'Basic Elaboration Mail Flagged'        => 'basic_elaboration_mail_flagged.svg',
		'Basic Elaboration Mail Heart'          => 'basic_elaboration_mail_heart.svg',
		'Basic Elaboration Mail Next'           => 'basic_elaboration_mail_next.svg',
		'Basic Elaboration Mail Noaccess'       => 'basic_elaboration_mail_noaccess.svg',
		'Basic Elaboration Mail Note'           => 'basic_elaboration_mail_note.svg',
		'Basic Elaboration Mail Pencil'         => 'basic_elaboration_mail_pencil.svg',
		'Basic Elaboration Mail Picture'        => 'basic_elaboration_mail_picture.svg',
		'Basic Elaboration Mail Previous'       => 'basic_elaboration_mail_previous.svg',
		'Basic Elaboration Mail Refresh'        => 'basic_elaboration_mail_refresh.svg',
		'Basic Elaboration Mail Remove'         => 'basic_elaboration_mail_remove.svg',
		'Basic Elaboration Mail Search'         => 'basic_elaboration_mail_search.svg',
		'Basic Elaboration Mail Star'           => 'basic_elaboration_mail_star.svg',
		'Basic Elaboration Mail Upload'         => 'basic_elaboration_mail_upload.svg',
		'Basic Elaboration Message Check'       => 'basic_elaboration_message_check.svg',
		'Basic Elaboration Message Dots'        => 'basic_elaboration_message_dots.svg',
		'Basic Elaboration Message Happy'       => 'basic_elaboration_message_happy.svg',
		'Basic Elaboration Message Heart'       => 'basic_elaboration_message_heart.svg',
		'Basic Elaboration Message Minus'       => 'basic_elaboration_message_minus.svg',
		'Basic Elaboration Message Note'        => 'basic_elaboration_message_note.svg',
		'Basic Elaboration Message Plus'        => 'basic_elaboration_message_plus.svg',
		'Basic Elaboration Message Refresh'     => 'basic_elaboration_message_refresh.svg',
		'Basic Elaboration Message Remove'      => 'basic_elaboration_message_remove.svg',
		'Basic Elaboration Message Sad'         => 'basic_elaboration_message_sad.svg',
		'Basic Elaboration Smartphone Cloud'    => 'basic_elaboration_smartphone_cloud.svg',
		'Basic Elaboration Smartphone Heart'    => 'basic_elaboration_smartphone_heart.svg',
		'Basic Elaboration Smartphone Noaccess' => 'basic_elaboration_smartphone_noaccess.svg',
		'Basic Elaboration Smartphone Note'     => 'basic_elaboration_smartphone_note.svg',
		'Basic Elaboration Smartphone Pencil'   => 'basic_elaboration_smartphone_pencil.svg',
		'Basic Elaboration Smartphone Picture'  => 'basic_elaboration_smartphone_picture.svg',
		'Basic Elaboration Smartphone Refresh'  => 'basic_elaboration_smartphone_refresh.svg',
		'Basic Elaboration Smartphone Search'   => 'basic_elaboration_smartphone_search.svg',
		'Basic Elaboration Tablet Cloud'        => 'basic_elaboration_tablet_cloud.svg',
		'Basic Elaboration Tablet Heart'        => 'basic_elaboration_tablet_heart.svg',
		'Basic Elaboration Tablet Noaccess'     => 'basic_elaboration_tablet_noaccess.svg',
		'Basic Elaboration Tablet Note'         => 'basic_elaboration_tablet_note.svg',
		'Basic Elaboration Tablet Pencil'       => 'basic_elaboration_tablet_pencil.svg',
		'Basic Elaboration Tablet Picture'      => 'basic_elaboration_tablet_picture.svg',
		'Basic Elaboration Tablet Refresh'      => 'basic_elaboration_tablet_refresh.svg',
		'Basic Elaboration Tablet Search'       => 'basic_elaboration_tablet_search.svg',
		'Basic Elaboration Todolist 2'          => 'basic_elaboration_todolist_2.svg',
		'Basic Elaboration Todolist Check'      => 'basic_elaboration_todolist_check.svg',
		'Basic Elaboration Todolist Cloud'      => 'basic_elaboration_todolist_cloud.svg',
		'Basic Elaboration Todolist Download'   => 'basic_elaboration_todolist_download.svg',
		'Basic Elaboration Todolist Flagged'    => 'basic_elaboration_todolist_flagged.svg',
		'Basic Elaboration Todolist Minus'      => 'basic_elaboration_todolist_minus.svg',
		'Basic Elaboration Todolist Noaccess'   => 'basic_elaboration_todolist_noaccess.svg',
		'Basic Elaboration Todolist Pencil'     => 'basic_elaboration_todolist_pencil.svg',
		'Basic Elaboration Todolist Plus'       => 'basic_elaboration_todolist_plus.svg',
		'Basic Elaboration Todolist Refresh'    => 'basic_elaboration_todolist_refresh.svg',
		'Basic Elaboration Todolist Remove'     => 'basic_elaboration_todolist_remove.svg',
		'Basic Elaboration Todolist Search'     => 'basic_elaboration_todolist_search.svg',
		'Basic Elaboration Todolist Star'       => 'basic_elaboration_todolist_star.svg',
		'Basic Elaboration Todolist Upload'     => 'basic_elaboration_todolist_upload.svg',
		'Basic Exclamation'                     => 'basic_exclamation.svg',
		'Basic Eye'                             => 'basic_eye.svg',
		'Basic Eye Closed'                      => 'basic_eye_closed.svg',
		'Basic Female'                          => 'basic_female.svg',
		'Basic Flag1'                           => 'basic_flag1.svg',
		'Basic Flag2'                           => 'basic_flag2.svg',
		'Basic Floppydisk'                      => 'basic_floppydisk.svg',
		'Basic Folder'                          => 'basic_folder.svg',
		'Basic Folder Multiple'                 => 'basic_folder_multiple.svg',
		'Basic Gear'                            => 'basic_gear.svg',
		'Basic Geolocalize-01'                  => 'basic_geolocalize-01.svg',
		'Basic Geolocalize-05'                  => 'basic_geolocalize-05.svg',
		'Basic Globe'                           => 'basic_globe.svg',
		'Basic Gunsight'                        => 'basic_gunsight.svg',
		'Basic Hammer'                          => 'basic_hammer.svg',
		'Basic Headset'                         => 'basic_headset.svg',
		'Basic Heart'                           => 'basic_heart.svg',
		'Basic Heart Broken'                    => 'basic_heart_broken.svg',
		'Basic Helm'                            => 'basic_helm.svg',
		'Basic Home'                            => 'basic_home.svg',
		'Basic Info'                            => 'basic_info.svg',
		'Basic Ipod'                            => 'basic_ipod.svg',
		'Basic Joypad'                          => 'basic_joypad.svg',
		'Basic Key'                             => 'basic_key.svg',
		'Basic Keyboard'                        => 'basic_keyboard.svg',
		'Basic Laptop'                          => 'basic_laptop.svg',
		'Basic Life Buoy'                       => 'basic_life_buoy.svg',
		'Basic Lightbulb'                       => 'basic_lightbulb.svg',
		'Basic Link'                            => 'basic_link.svg',
		'Basic Lock'                            => 'basic_lock.svg',
		'Basic Lock Open'                       => 'basic_lock_open.svg',
		'Basic Magic Mouse'                     => 'basic_magic_mouse.svg',
		'Basic Magnifier'                       => 'basic_magnifier.svg',
		'Basic Magnifier Minus'                 => 'basic_magnifier_minus.svg',
		'Basic Magnifier Plus'                  => 'basic_magnifier_plus.svg',
		'Basic Mail'                            => 'basic_mail.svg',
		'Basic Mail Multiple'                   => 'basic_mail_multiple.svg',
		'Basic Mail Open'                       => 'basic_mail_open.svg',
		'Basic Mail Open Text'                  => 'basic_mail_open_text.svg',
		'Basic Male'                            => 'basic_male.svg',
		'Basic Map'                             => 'basic_map.svg',
		'Basic Message'                         => 'basic_message.svg',
		'Basic Message Multiple'                => 'basic_message_multiple.svg',
		'Basic Message Txt'                     => 'basic_message_txt.svg',
		'Basic Mixer2'                          => 'basic_mixer2.svg',
		'Basic Mouse'                           => 'basic_mouse.svg',
		'Basic Notebook'                        => 'basic_notebook.svg',
		'Basic Notebook Pen'                    => 'basic_notebook_pen.svg',
		'Basic Notebook Pencil'                 => 'basic_notebook_pencil.svg',
		'Basic Paperplane'                      => 'basic_paperplane.svg',
		'Basic Pencil Ruler'                    => 'basic_pencil_ruler.svg',
		'Basic Pencil Ruler Pen '               => 'basic_pencil_ruler_pen .svg',
		'Basic Photo'                           => 'basic_photo.svg',
		'Basic Picture'                         => 'basic_picture.svg',
		'Basic Picture Multiple'                => 'basic_picture_multiple.svg',
		'Basic Pin1'                            => 'basic_pin1.svg',
		'Basic Pin2'                            => 'basic_pin2.svg',
		'Basic Postcard'                        => 'basic_postcard.svg',
		'Basic Postcard Multiple'               => 'basic_postcard_multiple.svg',
		'Basic Printer'                         => 'basic_printer.svg',
		'Basic Question'                        => 'basic_question.svg',
		'Basic Rss'                             => 'basic_rss.svg',
		'Basic Server'                          => 'basic_server.svg',
		'Basic Server2'                         => 'basic_server2.svg',
		'Basic Server Cloud'                    => 'basic_server_cloud.svg',
		'Basic Server Download'                 => 'basic_server_download.svg',
		'Basic Server Upload'                   => 'basic_server_upload.svg',
		'Basic Settings'                        => 'basic_settings.svg',
		'Basic Share'                           => 'basic_share.svg',
		'Basic Sheet'                           => 'basic_sheet.svg',
		'Basic Sheet Multiple '                 => 'basic_sheet_multiple .svg',
		'Basic Sheet Pen'                       => 'basic_sheet_pen.svg',
		'Basic Sheet Pencil'                    => 'basic_sheet_pencil.svg',
		'Basic Sheet Txt '                      => 'basic_sheet_txt .svg',
		'Basic Signs'                           => 'basic_signs.svg',
		'Basic Smartphone'                      => 'basic_smartphone.svg',
		'Basic Spades'                          => 'basic_spades.svg',
		'Basic Spread'                          => 'basic_spread.svg',
		'Basic Spread Bookmark'                 => 'basic_spread_bookmark.svg',
		'Basic Spread Text'                     => 'basic_spread_text.svg',
		'Basic Spread Text Bookmark'            => 'basic_spread_text_bookmark.svg',
		'Basic Star'                            => 'basic_star.svg',
		'Basic Tablet'                          => 'basic_tablet.svg',
		'Basic Target'                          => 'basic_target.svg',
		'Basic Todo'                            => 'basic_todo.svg',
		'Basic Todo Pen '                       => 'basic_todo_pen .svg',
		'Basic Todo Pencil'                     => 'basic_todo_pencil.svg',
		'Basic Todo Txt'                        => 'basic_todo_txt.svg',
		'Basic Todolist Pen'                    => 'basic_todolist_pen.svg',
		'Basic Todolist Pencil'                 => 'basic_todolist_pencil.svg',
		'Basic Trashcan'                        => 'basic_trashcan.svg',
		'Basic Trashcan Full'                   => 'basic_trashcan_full.svg',
		'Basic Trashcan Refresh'                => 'basic_trashcan_refresh.svg',
		'Basic Trashcan Remove'                 => 'basic_trashcan_remove.svg',
		'Basic Upload'                          => 'basic_upload.svg',
		'Basic Usb'                             => 'basic_usb.svg',
		'Basic Video'                           => 'basic_video.svg',
		'Basic Watch'                           => 'basic_watch.svg',
		'Basic Webpage'                         => 'basic_webpage.svg',
		'Basic Webpage Img Txt'                 => 'basic_webpage_img_txt.svg',
		'Basic Webpage Multiple'                => 'basic_webpage_multiple.svg',
		'Basic Webpage Txt'                     => 'basic_webpage_txt.svg',
		'Basic World'                           => 'basic_world.svg',
		'Ecommerce Bag'                         => 'ecommerce_bag.svg',
		'Ecommerce Bag Check'                   => 'ecommerce_bag_check.svg',
		'Ecommerce Bag Cloud'                   => 'ecommerce_bag_cloud.svg',
		'Ecommerce Bag Download'                => 'ecommerce_bag_download.svg',
		'Ecommerce Bag Minus'                   => 'ecommerce_bag_minus.svg',
		'Ecommerce Bag Plus'                    => 'ecommerce_bag_plus.svg',
		'Ecommerce Bag Refresh'                 => 'ecommerce_bag_refresh.svg',
		'Ecommerce Bag Remove'                  => 'ecommerce_bag_remove.svg',
		'Ecommerce Bag Search'                  => 'ecommerce_bag_search.svg',
		'Ecommerce Bag Upload'                  => 'ecommerce_bag_upload.svg',
		'Ecommerce Banknote'                    => 'ecommerce_banknote.svg',
		'Ecommerce Banknotes'                   => 'ecommerce_banknotes.svg',
		'Ecommerce Basket'                      => 'ecommerce_basket.svg',
		'Ecommerce Basket Check'                => 'ecommerce_basket_check.svg',
		'Ecommerce Basket Cloud'                => 'ecommerce_basket_cloud.svg',
		'Ecommerce Basket Download'             => 'ecommerce_basket_download.svg',
		'Ecommerce Basket Minus'                => 'ecommerce_basket_minus.svg',
		'Ecommerce Basket Plus'                 => 'ecommerce_basket_plus.svg',
		'Ecommerce Basket Refresh'              => 'ecommerce_basket_refresh.svg',
		'Ecommerce Basket Remove'               => 'ecommerce_basket_remove.svg',
		'Ecommerce Basket Search'               => 'ecommerce_basket_search.svg',
		'Ecommerce Basket Upload'               => 'ecommerce_basket_upload.svg',
		'Ecommerce Bath'                        => 'ecommerce_bath.svg',
		'Ecommerce Cart'                        => 'ecommerce_cart.svg',
		'Ecommerce Cart Check'                  => 'ecommerce_cart_check.svg',
		'Ecommerce Cart Cloud'                  => 'ecommerce_cart_cloud.svg',
		'Ecommerce Cart Content'                => 'ecommerce_cart_content.svg',
		'Ecommerce Cart Download'               => 'ecommerce_cart_download.svg',
		'Ecommerce Cart Minus'                  => 'ecommerce_cart_minus.svg',
		'Ecommerce Cart Plus'                   => 'ecommerce_cart_plus.svg',
		'Ecommerce Cart Refresh'                => 'ecommerce_cart_refresh.svg',
		'Ecommerce Cart Remove'                 => 'ecommerce_cart_remove.svg',
		'Ecommerce Cart Search'                 => 'ecommerce_cart_search.svg',
		'Ecommerce Cart Upload'                 => 'ecommerce_cart_upload.svg',
		'Ecommerce Cent'                        => 'ecommerce_cent.svg',
		'Ecommerce Colon'                       => 'ecommerce_colon.svg',
		'Ecommerce Creditcard'                  => 'ecommerce_creditcard.svg',
		'Ecommerce Diamond'                     => 'ecommerce_diamond.svg',
		'Ecommerce Dollar'                      => 'ecommerce_dollar.svg',
		'Ecommerce Euro'                        => 'ecommerce_euro.svg',
		'Ecommerce Franc'                       => 'ecommerce_franc.svg',
		'Ecommerce Gift'                        => 'ecommerce_gift.svg',
		'Ecommerce Graph1'                      => 'ecommerce_graph1.svg',
		'Ecommerce Graph2'                      => 'ecommerce_graph2.svg',
		'Ecommerce Graph3'                      => 'ecommerce_graph3.svg',
		'Ecommerce Graph Decrease'              => 'ecommerce_graph_decrease.svg',
		'Ecommerce Graph Increase'              => 'ecommerce_graph_increase.svg',
		'Ecommerce Guarani'                     => 'ecommerce_guarani.svg',
		'Ecommerce Kips'                        => 'ecommerce_kips.svg',
		'Ecommerce Lira'                        => 'ecommerce_lira.svg',
		'Ecommerce Megaphone'                   => 'ecommerce_megaphone.svg',
		'Ecommerce Money'                       => 'ecommerce_money.svg',
		'Ecommerce Naira'                       => 'ecommerce_naira.svg',
		'Ecommerce Pesos'                       => 'ecommerce_pesos.svg',
		'Ecommerce Pound'                       => 'ecommerce_pound.svg',
		'Ecommerce Receipt'                     => 'ecommerce_receipt.svg',
		'Ecommerce Receipt Bath'                => 'ecommerce_receipt_bath.svg',
		'Ecommerce Receipt Cent'                => 'ecommerce_receipt_cent.svg',
		'Ecommerce Receipt Dollar'              => 'ecommerce_receipt_dollar.svg',
		'Ecommerce Receipt Euro'                => 'ecommerce_receipt_euro.svg',
		'Ecommerce Receipt Franc'               => 'ecommerce_receipt_franc.svg',
		'Ecommerce Receipt Guarani'             => 'ecommerce_receipt_guarani.svg',
		'Ecommerce Receipt Kips'                => 'ecommerce_receipt_kips.svg',
		'Ecommerce Receipt Lira'                => 'ecommerce_receipt_lira.svg',
		'Ecommerce Receipt Naira'               => 'ecommerce_receipt_naira.svg',
		'Ecommerce Receipt Pesos'               => 'ecommerce_receipt_pesos.svg',
		'Ecommerce Receipt Pound'               => 'ecommerce_receipt_pound.svg',
		'Ecommerce Receipt Rublo'               => 'ecommerce_receipt_rublo.svg',
		'Ecommerce Receipt Rupee'               => 'ecommerce_receipt_rupee.svg',
		'Ecommerce Receipt Tugrik'              => 'ecommerce_receipt_tugrik.svg',
		'Ecommerce Receipt Won'                 => 'ecommerce_receipt_won.svg',
		'Ecommerce Receipt Yen'                 => 'ecommerce_receipt_yen.svg',
		'Ecommerce Receipt Yen2'                => 'ecommerce_receipt_yen2.svg',
		'Ecommerce Recept Colon'                => 'ecommerce_recept_colon.svg',
		'Ecommerce Rublo'                       => 'ecommerce_rublo.svg',
		'Ecommerce Rupee'                       => 'ecommerce_rupee.svg',
		'Ecommerce Safe'                        => 'ecommerce_safe.svg',
		'Ecommerce Sale'                        => 'ecommerce_sale.svg',
		'Ecommerce Sales'                       => 'ecommerce_sales.svg',
		'Ecommerce Ticket'                      => 'ecommerce_ticket.svg',
		'Ecommerce Tugriks'                     => 'ecommerce_tugriks.svg',
		'Ecommerce Wallet'                      => 'ecommerce_wallet.svg',
		'Ecommerce Won'                         => 'ecommerce_won.svg',
		'Ecommerce Yen'                         => 'ecommerce_yen.svg',
		'Ecommerce Yen2'                        => 'ecommerce_yen2.svg',
		'Music Beginning Button'                => 'music_beginning_button.svg',
		'Music Bell'                            => 'music_bell.svg',
		'Music Cd'                              => 'music_cd.svg',
		'Music Diapason'                        => 'music_diapason.svg',
		'Music Eject Button'                    => 'music_eject_button.svg',
		'Music End Button'                      => 'music_end_button.svg',
		'Music Fastforward Button'              => 'music_fastforward_button.svg',
		'Music Headphones'                      => 'music_headphones.svg',
		'Music Ipod'                            => 'music_ipod.svg',
		'Music Loudspeaker'                     => 'music_loudspeaker.svg',
		'Music Microphone'                      => 'music_microphone.svg',
		'Music Microphone Old'                  => 'music_microphone_old.svg',
		'Music Mixer'                           => 'music_mixer.svg',
		'Music Mute'                            => 'music_mute.svg',
		'Music Note Multiple'                   => 'music_note_multiple.svg',
		'Music Note Single'                     => 'music_note_single.svg',
		'Music Pause Button'                    => 'music_pause_button.svg',
		'Music Play Button'                     => 'music_play_button.svg',
		'Music Playlist'                        => 'music_playlist.svg',
		'Music Radio Ghettoblaster'             => 'music_radio_ghettoblaster.svg',
		'Music Radio Portable'                  => 'music_radio_portable.svg',
		'Music Record'                          => 'music_record.svg',
		'Music Recordplayer'                    => 'music_recordplayer.svg',
		'Music Repeat Button'                   => 'music_repeat_button.svg',
		'Music Rewind Button'                   => 'music_rewind_button.svg',
		'Music Shuffle Button'                  => 'music_shuffle_button.svg',
		'Music Stop Button'                     => 'music_stop_button.svg',
		'Music Tape'                            => 'music_tape.svg',
		'Music Volume Down'                     => 'music_volume_down.svg',
		'Music Volume Up'                       => 'music_volume_up.svg',
		'Software Add Vectorpoint'              => 'software_add_vectorpoint.svg',
		'Software Box Oval'                     => 'software_box_oval.svg',
		'Software Box Polygon'                  => 'software_box_polygon.svg',
		'Software Box Rectangle'                => 'software_box_rectangle.svg',
		'Software Box Roundedrectangle'         => 'software_box_roundedrectangle.svg',
		'Software Character'                    => 'software_character.svg',
		'Software Crop'                         => 'software_crop.svg',
		'Software Eyedropper'                   => 'software_eyedropper.svg',
		'Software Font Allcaps'                 => 'software_font_allcaps.svg',
		'Software Font Baseline Shift'          => 'software_font_baseline_shift.svg',
		'Software Font Horizontal Scale'        => 'software_font_horizontal_scale.svg',
		'Software Font Kerning'                 => 'software_font_kerning.svg',
		'Software Font Leading'                 => 'software_font_leading.svg',
		'Software Font Size'                    => 'software_font_size.svg',
		'Software Font Smallcapital'            => 'software_font_smallcapital.svg',
		'Software Font Smallcaps'               => 'software_font_smallcaps.svg',
		'Software Font Strikethrough'           => 'software_font_strikethrough.svg',
		'Software Font Tracking'                => 'software_font_tracking.svg',
		'Software Font Underline'               => 'software_font_underline.svg',
		'Software Font Vertical Scale'          => 'software_font_vertical_scale.svg',
		'Software Horizontal Align Center'      => 'software_horizontal_align_center.svg',
		'Software Horizontal Align Left'        => 'software_horizontal_align_left.svg',
		'Software Horizontal Align Right'       => 'software_horizontal_align_right.svg',
		'Software Horizontal Distribute Center' => 'software_horizontal_distribute_center.svg',
		'Software Horizontal Distribute Left'   => 'software_horizontal_distribute_left.svg',
		'Software Horizontal Distribute Right'  => 'software_horizontal_distribute_right.svg',
		'Software Indent Firstline'             => 'software_indent_firstline.svg',
		'Software Indent Left'                  => 'software_indent_left.svg',
		'Software Indent Right'                 => 'software_indent_right.svg',
		'Software Lasso'                        => 'software_lasso.svg',
		'Software Layers1'                      => 'software_layers1.svg',
		'Software Layers2'                      => 'software_layers2.svg',
		'Software Layout-8boxes'                => 'software_layout-8boxes.svg',
		'Software Layout'                       => 'software_layout.svg',
		'Software Layout 2columns'              => 'software_layout_2columns.svg',
		'Software Layout 3columns'              => 'software_layout_3columns.svg',
		'Software Layout 4boxes'                => 'software_layout_4boxes.svg',
		'Software Layout 4columns'              => 'software_layout_4columns.svg',
		'Software Layout 4lines'                => 'software_layout_4lines.svg',
		'Software Layout Header'                => 'software_layout_header.svg',
		'Software Layout Header 2columns'       => 'software_layout_header_2columns.svg',
		'Software Layout Header 3columns'       => 'software_layout_header_3columns.svg',
		'Software Layout Header 4boxes'         => 'software_layout_header_4boxes.svg',
		'Software Layout Header 4columns'       => 'software_layout_header_4columns.svg',
		'Software Layout Header Complex'        => 'software_layout_header_complex.svg',
		'Software Layout Header Complex2'       => 'software_layout_header_complex2.svg',
		'Software Layout Header Complex3'       => 'software_layout_header_complex3.svg',
		'Software Layout Header Complex4'       => 'software_layout_header_complex4.svg',
		'Software Layout Header Sideleft'       => 'software_layout_header_sideleft.svg',
		'Software Layout Header Sideright'      => 'software_layout_header_sideright.svg',
		'Software Layout Sidebar Left'          => 'software_layout_sidebar_left.svg',
		'Software Layout Sidebar Right'         => 'software_layout_sidebar_right.svg',
		'Software Magnete'                      => 'software_magnete.svg',
		'Software Pages'                        => 'software_pages.svg',
		'Software Paintbrush'                   => 'software_paintbrush.svg',
		'Software Paintbucket'                  => 'software_paintbucket.svg',
		'Software Paintroller'                  => 'software_paintroller.svg',
		'Software Paragraph'                    => 'software_paragraph.svg',
		'Software Paragraph Align Left'         => 'software_paragraph_align_left.svg',
		'Software Paragraph Align Right'        => 'software_paragraph_align_right.svg',
		'Software Paragraph Center'             => 'software_paragraph_center.svg',
		'Software Paragraph Justify All'        => 'software_paragraph_justify_all.svg',
		'Software Paragraph Justify Center'     => 'software_paragraph_justify_center.svg',
		'Software Paragraph Justify Left'       => 'software_paragraph_justify_left.svg',
		'Software Paragraph Justify Right'      => 'software_paragraph_justify_right.svg',
		'Software Paragraph Space After'        => 'software_paragraph_space_after.svg',
		'Software Paragraph Space Before'       => 'software_paragraph_space_before.svg',
		'Software Pathfinder Exclude'           => 'software_pathfinder_exclude.svg',
		'Software Pathfinder Intersect'         => 'software_pathfinder_intersect.svg',
		'Software Pathfinder Subtract'          => 'software_pathfinder_subtract.svg',
		'Software Pathfinder Unite'             => 'software_pathfinder_unite.svg',
		'Software Pen'                          => 'software_pen.svg',
		'Software Pen Add'                      => 'software_pen_add.svg',
		'Software Pen Remove'                   => 'software_pen_remove.svg',
		'Software Pencil'                       => 'software_pencil.svg',
		'Software Polygonallasso'               => 'software_polygonallasso.svg',
		'Software Reflect Horizontal'           => 'software_reflect_horizontal.svg',
		'Software Reflect Vertical'             => 'software_reflect_vertical.svg',
		'Software Remove Vectorpoint'           => 'software_remove_vectorpoint.svg',
		'Software Scale Expand'                 => 'software_scale_expand.svg',
		'Software Scale Reduce'                 => 'software_scale_reduce.svg',
		'Software Selection Oval'               => 'software_selection_oval.svg',
		'Software Selection Polygon'            => 'software_selection_polygon.svg',
		'Software Selection Rectangle'          => 'software_selection_rectangle.svg',
		'Software Selection Roundedrectangle'   => 'software_selection_roundedrectangle.svg',
		'Software Shape Oval'                   => 'software_shape_oval.svg',
		'Software Shape Polygon'                => 'software_shape_polygon.svg',
		'Software Shape Rectangle'              => 'software_shape_rectangle.svg',
		'Software Shape Roundedrectangle'       => 'software_shape_roundedrectangle.svg',
		'Software Slice'                        => 'software_slice.svg',
		'Software Transform Bezier'             => 'software_transform_bezier.svg',
		'Software Vector Box'                   => 'software_vector_box.svg',
		'Software Vector Composite'             => 'software_vector_composite.svg',
		'Software Vector Line'                  => 'software_vector_line.svg',
		'Software Vertical Align Bottom'        => 'software_vertical_align_bottom.svg',
		'Software Vertical Align Center'        => 'software_vertical_align_center.svg',
		'Software Vertical Align Top'           => 'software_vertical_align_top.svg',
		'Software Vertical Distribute Bottom'   => 'software_vertical_distribute_bottom.svg',
		'Software Vertical Distribute Center'   => 'software_vertical_distribute_center.svg',
		'Software Vertical Distribute Top'      => 'software_vertical_distribute_top.svg',
		'Weather Aquarius'                      => 'weather_aquarius.svg',
		'Weather Aries'                         => 'weather_aries.svg',
		'Weather Cancer'                        => 'weather_cancer.svg',
		'Weather Capricorn'                     => 'weather_capricorn.svg',
		'Weather Cloud'                         => 'weather_cloud.svg',
		'Weather Cloud Drop'                    => 'weather_cloud_drop.svg',
		'Weather Cloud Lightning'               => 'weather_cloud_lightning.svg',
		'Weather Cloud Snowflake'               => 'weather_cloud_snowflake.svg',
		'Weather Downpour Fullmoon'             => 'weather_downpour_fullmoon.svg',
		'Weather Downpour Halfmoon'             => 'weather_downpour_halfmoon.svg',
		'Weather Downpour Sun'                  => 'weather_downpour_sun.svg',
		'Weather Drop'                          => 'weather_drop.svg',
		'Weather First Quarter '                => 'weather_first_quarter .svg',
		'Weather Fog'                           => 'weather_fog.svg',
		'Weather Fog Fullmoon'                  => 'weather_fog_fullmoon.svg',
		'Weather Fog Halfmoon'                  => 'weather_fog_halfmoon.svg',
		'Weather Fog Sun'                       => 'weather_fog_sun.svg',
		'Weather Fullmoon'                      => 'weather_fullmoon.svg',
		'Weather Gemini'                        => 'weather_gemini.svg',
		'Weather Hail'                          => 'weather_hail.svg',
		'Weather Hail Fullmoon'                 => 'weather_hail_fullmoon.svg',
		'Weather Hail Halfmoon'                 => 'weather_hail_halfmoon.svg',
		'Weather Hail Sun'                      => 'weather_hail_sun.svg',
		'Weather Last Quarter'                  => 'weather_last_quarter.svg',
		'Weather Leo'                           => 'weather_leo.svg',
		'Weather Libra'                         => 'weather_libra.svg',
		'Weather Lightning'                     => 'weather_lightning.svg',
		'Weather Mistyrain'                     => 'weather_mistyrain.svg',
		'Weather Mistyrain Fullmoon'            => 'weather_mistyrain_fullmoon.svg',
		'Weather Mistyrain Halfmoon'            => 'weather_mistyrain_halfmoon.svg',
		'Weather Mistyrain Sun'                 => 'weather_mistyrain_sun.svg',
		'Weather Moon'                          => 'weather_moon.svg',
		'Weather Moondown Full'                 => 'weather_moondown_full.svg',
		'Weather Moondown Half'                 => 'weather_moondown_half.svg',
		'Weather Moonset Full'                  => 'weather_moonset_full.svg',
		'Weather Moonset Half'                  => 'weather_moonset_half.svg',
		'Weather Move2'                         => 'weather_move2.svg',
		'Weather Newmoon'                       => 'weather_newmoon.svg',
		'Weather Pisces'                        => 'weather_pisces.svg',
		'Weather Rain'                          => 'weather_rain.svg',
		'Weather Rain Fullmoon'                 => 'weather_rain_fullmoon.svg',
		'Weather Rain Halfmoon'                 => 'weather_rain_halfmoon.svg',
		'Weather Rain Sun'                      => 'weather_rain_sun.svg',
		'Weather Sagittarius'                   => 'weather_sagittarius.svg',
		'Weather Scorpio'                       => 'weather_scorpio.svg',
		'Weather Snow'                          => 'weather_snow.svg',
		'Weather Snow Fullmoon'                 => 'weather_snow_fullmoon.svg',
		'Weather Snow Halfmoon'                 => 'weather_snow_halfmoon.svg',
		'Weather Snow Sun'                      => 'weather_snow_sun.svg',
		'Weather Snowflake'                     => 'weather_snowflake.svg',
		'Weather Star'                          => 'weather_star.svg',
		'Weather Storm-11'                      => 'weather_storm-11.svg',
		'Weather Storm-32'                      => 'weather_storm-32.svg',
		'Weather Storm Fullmoon'                => 'weather_storm_fullmoon.svg',
		'Weather Storm Halfmoon'                => 'weather_storm_halfmoon.svg',
		'Weather Storm Sun'                     => 'weather_storm_sun.svg',
		'Weather Sun'                           => 'weather_sun.svg',
		'Weather Sundown'                       => 'weather_sundown.svg',
		'Weather Sunset'                        => 'weather_sunset.svg',
		'Weather Taurus'                        => 'weather_taurus.svg',
		'Weather Tempest'                       => 'weather_tempest.svg',
		'Weather Tempest Fullmoon'              => 'weather_tempest_fullmoon.svg',
		'Weather Tempest Halfmoon'              => 'weather_tempest_halfmoon.svg',
		'Weather Tempest Sun'                   => 'weather_tempest_sun.svg',
		'Weather Variable Fullmoon'             => 'weather_variable_fullmoon.svg',
		'Weather Variable Halfmoon'             => 'weather_variable_halfmoon.svg',
		'Weather Variable Sun'                  => 'weather_variable_sun.svg',
		'Weather Virgo'                         => 'weather_virgo.svg',
		'Weather Waning Cresent'                => 'weather_waning_cresent.svg',
		'Weather Waning Gibbous'                => 'weather_waning_gibbous.svg',
		'Weather Waxing Cresent'                => 'weather_waxing_cresent.svg',
		'Weather Waxing Gibbous'                => 'weather_waxing_gibbous.svg',
		'Weather Wind'                          => 'weather_wind.svg',
		'Weather Wind E'                        => 'weather_wind_E.svg',
		'Weather Wind N'                        => 'weather_wind_N.svg',
		'Weather Wind NE'                       => 'weather_wind_NE.svg',
		'Weather Wind NW'                       => 'weather_wind_NW.svg',
		'Weather Wind S'                        => 'weather_wind_S.svg',
		'Weather Wind SE'                       => 'weather_wind_SE.svg',
		'Weather Wind SW'                       => 'weather_wind_SW.svg',
		'Weather Wind W'                        => 'weather_wind_W.svg',
		'Weather Wind Fullmoon'                 => 'weather_wind_fullmoon.svg',
		'Weather Wind Halfmoon'                 => 'weather_wind_halfmoon.svg',
		'Weather Wind Sun'                      => 'weather_wind_sun.svg',
		'Weather Windgust'                      => 'weather_windgust.svg',
	);
	if ( $empty ) {
		$icons = array( 'Empty' => '' ) + $icons;
	}
	return $icons;
}
function thb_getIconArray_option_tree( $empty = true ) {
	$array     = thb_getIconArray( $empty );
	$new_array = array();
	foreach ( $array as $name => $value ) {
		$new_array[] = array(
			'label' => $name,
			'value' => $value,
		);
	}
	return $new_array;
}

/* Excerpts */
function thb_strip_shortcode_from_excerpt( $content ) {
	$content = strip_shortcodes( $content );
	return $content;
}
add_filter( 'the_excerpt', 'thb_strip_shortcode_from_excerpt' );

add_filter( 'excerpt_length', 'thb_default_excerpt_length' );
add_filter( 'excerpt_more', 'thb_default_excerpt_more' );

function thb_long_excerpt_length() {
	return 55;
}
function thb_default_excerpt_length() {
	return 55;
}
function thb_mid_excerpt_length() {
	return 43;
}
function thb_short_excerpt_length() {
	return 32;
}
function thb_supershort_excerpt_length() {
	return 15;
}
function thb_widget_excerpt_length() {
	return 10;
}

function thb_default_excerpt_more() {
	return '&hellip;';
}
/* Translate Columns */
function thb_translate_columns( $size ) {
	if ( $size == 6 ) {
		return 'medium-2';
	} elseif ( $size == 5 ) {
		return 'medium-1/5';
	} elseif ( $size == 4 ) {
		return 'medium-3';
	} elseif ( $size == 3 ) {
		return 'medium-4';
	} elseif ( $size == 2 ) {
		return 'medium-6';
	} else {
		return 'medium-12';
	}
}
/**
 * Shorten large numbers into abbreviations (i.e. 1,500 = 1.5k)
 *
 * @param int $number  Number to shorten
 * @return String   A number with a symbol
 */
function thb_numberAbbreviation( $number ) {
	$abbrevs = array(
		12 => 'T',
		9  => 'B',
		6  => 'M',
		3  => 'K',
		0  => '',
	);

	if ( $number > 999 ) {
		foreach ( $abbrevs as $exponent => $abbrev ) {
			if ( $number >= pow( 10, $exponent ) ) {
				$display_num = $number / pow( 10, $exponent );
				$decimals    = ( $exponent >= 3 && round( $display_num ) < 100 ) ? 1 : 0;
				return number_format( $display_num, $decimals ) . $abbrev;
			}
		}
	} else {
		return $number;
	}
}

/* Remove VC-added P tags */
function thb_remove_vc_added_p( $content ) {
	if ( substr( $content, 0, 4 ) === '</p>' ) {
		$content = substr( $content, 4 );
	}
	if ( substr( $content, -3 ) === '<p>' ) {
		$content = substr( $content, 0, -3 );
	}
	return $content;
}

/* Remove Empty P tags */
function thb_remove_p( $content ) {
	$to_remove = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']',
	);

	$content = strtr( $content, $to_remove );
	return $content;
}

add_filter( 'the_content', 'thb_remove_p' );

/* P tag fix for certain shortcodes */
function thb_shortcode_empty_paragraph_fix( $content ) {
	$block = join( '|', array( 'thb_slidetype', 'thb_fadetype' ) );

	// opening tag.
	$rep = preg_replace( "/(<p>)?(\n|\r)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", '[$3$4]', $content );

	// closing tag.
	$rep = preg_replace( "/(<p>)?(\n|\r)?\[\/($block)](<\/p>|<br \/>)?/", '[/$3]', $rep );

	return $rep;
}
add_filter( 'the_content', 'thb_shortcode_empty_paragraph_fix' );

// Archive Pagination.
function thb_get_archive_pagination_style() {
	if ( is_author() ) {
		$pagination_style = ot_get_option( 'author_pagination', 'style1' );
	} elseif ( is_tag() ) {
		$pagination_style = ot_get_option( 'tag_pagination', 'style1' );
	} elseif ( is_category() ) {
		$pagination_style = ot_get_option( 'category_pagination', 'style1' );
	} elseif ( is_search() ) {
		$pagination_style = ot_get_option( 'search_pagination', 'style1' );
	} else {
		$pagination_style = ot_get_option( 'archive_pagination', 'style1' );
	}
	return $pagination_style;
}
// Customized Pagination.
function thb_pagination( $preloader = false ) {
	the_posts_pagination(
		array(
			'prev_text' => thb_load_template_part( 'assets/img/svg/prev_arrow.svg' ),
			'next_text' => thb_load_template_part( 'assets/img/svg/next_arrow.svg' ),
			'mid_size'  => 2,
		)
	);
	if ( $preloader ) {
		thb_preloader();
	}
}
function thb_pagination_prevnext() {
	?>
	<div class="small-12 columns thb-prevnext-column">
		<div class="thb-prevnext">
			<?php
				the_posts_pagination(
					array(
						'prev_text' => '<div class="next-arrow">' . esc_html__( 'Newer Articles', 'theissue' ) . thb_load_template_part( 'assets/img/svg/next_double_arrow.svg' ) . '</div>',
						'next_text' => '<div class="prev-arrow">' . thb_load_template_part( 'assets/img/svg/prev_double_arrow.svg' ) . esc_html__( 'Older Articles', 'theissue' ) . '</div>',
						'end_size'  => 0,
						'mid_size'  => 0,
					)
				);
			?>
		</div>
	</div>
	<?php
}

/* Gradient Generation */
function thb_css_gradient( $color_start, $color_end, $angle = -32, $full = true ) {
	$return = 'linear-gradient( ' . str_replace( 'deg', '', $angle ) . 'deg,' . esc_attr( $color_end ) . ',' . esc_attr( $color_start ) . ' )';
	if ( $full === true ) {
		return 'background:' . $color_start . ';background:' . $return . ';';
	}
	return $return;
}

/* Post Categories Array */
function thb_blogCategories() {
	$cache_name = 'thb_blog_categories';
	// Get Cache.
	$data = get_transient( $cache_name );
	if ( $data ) {
		return $data;
	}
	$blog_categories = get_categories();
	$out             = array();
	foreach ( $blog_categories as $category ) {
		$out[ $category->name ] = $category->cat_ID;
	}
	set_transient( $cache_name, $out, HOUR_IN_SECONDS );
	return $out;
}

/* Product Categories Array */
function thb_productCategories() {
	if ( thb_wc_supported() ) {
		$cache_name = 'thb_wc_product_categories';

		// Get Cache
		$data = get_transient( $cache_name );

		if ( $data ) {
			return $data;
		}
		$args = array(
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => '0',
		);

		$product_categories = get_terms( 'product_cat', $args );
		$out                = array();
		if ( ! isset( $product_categories->errors ) ) {
			foreach ( $product_categories as $product_category ) {
				$out[ $product_category->name ] = $product_category->slug;
			}
		}
		// Set Cache
		set_transient( $cache_name, $out, HOUR_IN_SECONDS );
		return $out;
	}
}

/* Archive Sidebar */
function thb_archive_sidebar() {
	if ( is_author() ) {
		dynamic_sidebar( 'author' );
	} elseif ( is_tag() ) {
		dynamic_sidebar( 'tag' );
	} elseif ( is_category() ) {
		$cat_id           = get_queried_object_id();
		$selected_sidebar = get_term_meta( $cat_id, 'thb_cat_sidebar', true );

		if ( '' === $selected_sidebar || ! $selected_sidebar ) {
			dynamic_sidebar( 'category' );
		} else {
			dynamic_sidebar( $selected_sidebar );
		}
	} elseif ( is_search() ) {
		dynamic_sidebar( 'search' );
	} else {
		dynamic_sidebar( 'archive' );
	}
}
add_action( 'thb_archive_sidebar', 'thb_archive_sidebar', 3 );

/* Social Icons */
function thb_social( $socials ) {
	if ( $socials ) {
		if ( count( $socials ) > 0 && $socials !== '' ) {
			echo '<aside class="socials">';
			foreach ( $socials as $social ) {
				?>
				<a href="<?php echo esc_url( $social['href'] ); ?>" class="social <?php echo esc_attr( $social['social_network'] ); ?>" target="_blank"><i class="thb-icon-<?php echo esc_attr( $social['social_network'] ); ?>"></i></a>
				<?php
			}
			echo '</aside>';
		}
	}
}
add_action( 'thb_social_links', 'thb_social', 3 );

/* Encoding */
function thb_encode( $value ) {
	$func = 'base64' . '_encode';
	return $func( $value );
}
function thb_decode( $value ) {
	$func = 'base64' . '_decode';
	return $func( $value );
}

/* Get Preloader */
function thb_preloader() {
	?>
	<div class="thb-preloader">
		<?php get_template_part( 'assets/img/svg/preloader-material.svg' ); ?>
	</div>
	<?php
}

/* Newsletter */
function thb_after_newsletter_submit() {
	thb_preloader();
}
add_filter( 'thb_after_newsletter_submit', 'thb_after_newsletter_submit' );

function thb_after_newsletter_form() {
	$newsletter_privacy_checkbox = ot_get_option( 'newsletter_privacy_checkbox', 'on' );

	$rand = wp_rand( 0, 1000 );
	if ( $newsletter_privacy_checkbox === 'on' ) {

		$newsletter_privacy_checkbox_checked = ot_get_option( 'newsletter_privacy_checkbox_checked', 'on' );
		?>
		<div class="thb-custom-checkbox">
			<input type="checkbox" id="thb-newsletter-privacy-<?php echo esc_attr( $rand ); ?>" name="thb-newsletter-privacy" class="thb-newsletter-privacy" <?php checked( 'on', $newsletter_privacy_checkbox_checked, true ); ?> >
			<label for="thb-newsletter-privacy-<?php echo esc_attr( $rand ); ?>">
				<?php
					$newsletter_translation = ot_get_option( 'newsletter_translation', 'off' );
				if ( 'on' === $newsletter_translation ) {
					$newsletter_checkbox_text = ot_get_option( 'newsletter_checkbox_text', 'I would like to receive news and special offers.' );
					echo esc_html( $newsletter_checkbox_text );
				} else {
					esc_html_e( 'I would like to receive news and special offers.', 'theissue' );
				}
				?>
			</label>
		</div>
		<?php
	}
}
add_filter( 'thb_after_newsletter_form', 'thb_after_newsletter_form' );

/* Add Lightbox Class */
function thb_image_rel( $content ) {
	$pattern     = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 class="mfp-image"$6>$7</a>';
	$content     = preg_replace( $pattern, $replacement, $content );
	return $content;
}
add_filter( 'the_content', 'thb_image_rel' );

/* Custom Password Protect Form */
function thb_password_form() {
	$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
	<p class="password-text">' . esc_html__( 'This is a protected area. Please enter your password:', 'theissue' ) . '</p>
	<input name="post_password" type="password" class="box" placeholder="' . esc_html__( 'Password', 'theissue' ) . '"/><input type="submit" name="Submit" class="btn" value="' . esc_attr__( 'Submit', 'theissue' ) . '" /></form>
	';
	return $o;
}
add_filter( 'the_password_form', 'thb_password_form' );

/* Add Shortcode */
function thb_add_short( $name, $call ) {
	$func = 'add' . '_shortcode';
	return $func( $name, $call );
}
function thb_add_svg_to_reply( $args, $comment, $post ) {
	$args['reply_text'] = thb_load_template_part( 'assets/img/svg/reply.svg' ) . $args['reply_text'];
	return $args;
}

add_filter( 'comment_reply_link_args', 'thb_add_svg_to_reply', 420, 4 );

/* Page Content */
function thb_page_content( $page ) {
	if ( $page ) {
		$args       = array(
			'page_id'     => $page,
			'post_status' => 'publish',
		);
		$page_query = new WP_Query( $args );
		if ( $page_query->have_posts() ) :
			while ( $page_query->have_posts() ) :
				$page_query->the_post();
				the_content();
		endwhile;
endif;

		echo '<style>';
		echo get_post_meta( $page, '_wpb_shortcodes_custom_css', true );
		echo '</style>';

		wp_reset_query();
	}
}
add_action( 'thb_page_content', 'thb_page_content', 99, 1 );

/* Cookie Bar */
function thb_add_cookiebar() {
	if (
		is_feed()
		|| intval( get_query_var( 'print' ) ) === 1
		|| intval( get_query_var( 'printpage' ) ) === 1
	) {
		return;
	}
	get_template_part( 'inc/templates/header/cookie-bar' );
}
add_action( 'wp_footer', 'thb_add_cookiebar', 10 );

/* Google Meta Theme Color (Phone) */
function thb_google_theme_color() {
	$thb_google_theme_color = ot_get_option( 'thb_google_theme_color' );
	if ( $thb_google_theme_color ) {
		?>
		<meta name="theme-color" content="<?php echo esc_attr( $thb_google_theme_color ); ?>">
		<?php
	}
}
add_action( 'wp_head', 'thb_google_theme_color' );

/* Preloader */
function thb_swipe_page_transition() {
	if ( 'thb-swipe-left' === ot_get_option( 'page_transition_style' ) && 'on' === ot_get_option( 'page_transition', 'on' ) ) {
		?>
		<div class="thb-page-transition-overlay"></div>
		<?php
	}
}
add_action( 'thb_after_wrapper', 'thb_swipe_page_transition' );

/* Right Click Content */
function thb_right_click() {
	if ( 'on' === ot_get_option( 'right_click', 'on' ) ) {
		?>
		<aside class="share_screen" id="right_click_content">
			<div class="row align-center">
				<div class="small-12 medium-8 large-6 columns">
					<?php echo do_shortcode( ot_get_option( 'right_click_content', wp_kses_post( '<h4 class="text-center">You can toggle right click protection within Theme Options and customize this message as well.</h4><p class="text-center">You can also add shortcodes here.</p>', 'theissue' ) ) ); ?>
				</div>
			</div>
		</aside>
		<?php
	}
}
add_action( 'wp_footer', 'thb_right_click' );

/* Footer Items */
function thb_footer_items() {
	if ( 'on' === ot_get_option( 'scroll_to_top', 'on' ) ) {
		$style = ot_get_option( 'scroll_to_top_style', 'style1' );
		?>
		<a id="scroll_to_top" class="<?php echo esc_attr( $style ); ?>">
			<?php if ( 'style1' === $style ) { ?>
				<span><?php esc_attr_e( 'Scroll To Top', 'theissue' ); ?></span>
			<?php } elseif ( 'style2' === $style ) { ?>
				<i class="thb-icon-up-open-mini"></i>
			<?php } ?>
		</a>
		<?php
	}
	?>
	<!-- Start Content Click Capture -->
	<div class="click-capture"></div>
	<!-- End Content Click Capture -->

	<?php do_action( 'thb_mobile_menu' ); ?>

	<?php do_action( 'thb_shop_filters' ); ?>
	<?php
}
add_action( 'wp_footer', 'thb_footer_items', 3 );

// Move Array Keys.
function thb_move_key_before( $arr, $find, $move ) {
	if ( ! isset( $arr[ $find ], $arr[ $move ] ) ) {
		return $arr;
	} else {
		$elem  = array( $move => $arr[ $move ] );
		$start = array_splice( $arr, 0, array_search( $find, array_keys( $arr ) ) );
		return $start + $elem + $arr;
	}
}
/* VC AJAX Support */
function thb_register_vc_shortcodes() {
	if ( class_exists( 'WPBMap' ) && method_exists( 'WPBMap', 'addAllMappedShortcodes' ) ) {
		WPBMap::addAllMappedShortcodes();
	}
}
add_action( 'thb_vc_ajax', 'thb_register_vc_shortcodes', 10 );

/* Custom Background Support */
function thb_change_custom_background_cb() {
	$background = get_background_image();
	$color      = get_background_color();

	if ( ! $background && ! $color ) {
		return; }

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
			$image = " background-image: url('$background' );";

			$repeat = get_theme_mod( 'background_repeat', 'repeat' );

		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
				$repeat = 'repeat';
		}

			$repeat = " background-repeat: $repeat;";

			$position = get_theme_mod( 'background_position_x', 'left' );

		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
				$position = 'left';
		}

			$position = " background-position: top $position;";

			$attachment = get_theme_mod( 'background_attachment', 'scroll' );

		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
				$attachment = 'scroll';
		}

			$attachment = " background-attachment: $attachment;";

			$style .= $image . $repeat . $position . $attachment;
	}
	?>
<style type="text/css">
body.custom-background #wrapper div[role="main"] { <?php echo trim( $style ); ?> }
</style>
	<?php
}

/* Mobile Check */
function thb_is_mobile() {
	$is_mobile = Thb_Theme_Admin::$thb_is_mobile;
	return ( $is_mobile->isMobile() && ! $is_mobile->isTablet() );
}
function thb_is_tablet() {
	$is_mobile = Thb_Theme_Admin::$thb_is_mobile;
	return $is_mobile->isTablet();
}

function thb_remove_metaboxes( $hook_suffix ) {
	if ( is_admin() ) {
		$screen = get_current_screen();
		if ( 'tribe_events' === $screen->id ) {
			remove_action( 'admin_print_styles-post-new.php', 'ot_admin_styles', 11 );
			remove_action( 'admin_print_styles-post.php', 'ot_admin_styles', 11 );
		}
	}

}
add_action( 'admin_enqueue_scripts', 'thb_remove_metaboxes' );

