<?php function thb_selection() {
	$id = get_queried_object_id();
	ob_start();
	?>
/* Options set in the admin page */

/* Typography */
	<?php if ( $primary_font = ot_get_option( 'primary_font' ) ) { ?>
body,
h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6,
.thb-lightbox-button .thb-lightbox-text,
.post .post-category,
.post.thumbnail-seealso .thb-seealso-text,
.thb-entry-footer,
.smart-list .smart-list-title .smart-list-count,
.smart-list .thb-smart-list-content .smart-list-count,
.thb-carousel.bottom-arrows .slick-bottom-arrows,
.thb-hotspot-container,
.thb-pin-it-container .thb-pin-it,
label,
input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
.testimonial-author,
.thb-article-sponsors,
input[type="submit"],
submit,
.button,
.btn,
.btn-block,
.btn-text,
.post .post-gallery .thb-post-icon,
.post .thb-post-bottom,
.woocommerce-MyAccount-navigation,
.featured_image_credit,
.widget .thb-widget-title,
.thb-readmore .thb-readmore-title,
.widget.thb_widget_instagram .thb-instagram-header,
.widget.thb_widget_instagram .thb-instagram-footer,
.thb-instagram-row figure .instagram-link,
.widget.thb_widget_top_reviews .post .widget-review-title-holder .thb-widget-score,
.thb-instagram-row figure,
.widget.thb_widget_top_categories .thb-widget-category-link .thb-widget-category-name,
.widget.thb_widget_twitter .thb-twitter-user,
.widget.thb_widget_twitter .thb-tweet .thb-tweet-time,
.widget.thb_widget_twitter .thb-tweet .thb-tweet-actions,
.thb-social-links-container,
.login-page-form,
.woocommerce .woocommerce-form-login .lost_password,
.woocommerce-message, .woocommerce-error, .woocommerce-notice, .woocommerce-info,
.woocommerce-success,
.select2,
.woocommerce-MyAccount-content legend,
.shop_table,
.thb-lightbox-button .thb-lightbox-thumbs,
.post.thumbnail-style6 .post-gallery .now-playing,
.widget.thb_widget_top_reviews .post .widget-review-title-holder .thb-widget-score strong,
.post.thumbnail-style8 .thumb_large_count,
.post.thumbnail-style4 .thumb_count,
.post .thb-read-more {
		<?php thb_typeoutput( $primary_font ); ?>
}
<?php } ?>
	<?php if ( $secondary_font = ot_get_option( 'secondary_font' ) ) { ?>
.post-title h1,
.post-title h2,
.post-title h3,
.post-title h4,
.post-title h5,
.post-title h6 {
		<?php thb_typeoutput( $secondary_font ); ?>
}
<?php } ?>
	<?php if ( $tertiary_font = ot_get_option( 'tertiary_font' ) ) { ?>
.post-content,
.post-excerpt,
.thb-article-subscribe p,
.thb-article-author p,
.commentlist .comment p, .commentlist .review p,
.thb-executive-summary,
.thb-newsletter-form p,
.search-title p,
.thb-product-detail .product-information .woocommerce-product-details__short-description,
.widget:not(.woocommerce) p,
.thb-author-info .thb-author-page-description p,
.wpb_text_column,
.no-vc,
.woocommerce-tabs .wc-tab,
.woocommerce-tabs .wc-tab p:not(.stars),
.thb-pricing-table .pricing-container .pricing-description,
.content404 p,
.subfooter p {
		<?php thb_typeoutput( $tertiary_font ); ?>
}
<?php } ?>
	<?php if ( $fullmenu_font = ot_get_option( 'fullmenu_font' ) ) { ?>
.thb-full-menu {
		<?php thb_typeoutput( $fullmenu_font ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_font = ot_get_option( 'mobilemenu_font' ) ) { ?>
.thb-mobile-menu,
.thb-secondary-menu {
		<?php thb_typeoutput( $mobilemenu_font ); ?>
}
<?php } ?>
	<?php if ( $article_dropcap_type = ot_get_option( 'article_dropcap_type' ) ) { ?>
.thb-dropcap-on .post-detail .post-content>p:first-of-type:first-letter,
.thb-dropcap-on .post-detail .post-content>.row:first-of-type .columns:first-of-type .wpb_text_column:first-of-type .wpb_wrapper>p:first-of-type:first-letter {
		<?php thb_typeoutput( $article_dropcap_type ); ?>
}
<?php } ?>
	<?php if ( $widget_title_font = ot_get_option( 'widget_title_font' ) ) { ?>
.widget.style1 .thb-widget-title,
.widget.style2 .thb-widget-title,
.widget.style3 .thb-widget-title {
		<?php thb_typeoutput( $widget_title_font ); ?>
}
<?php } ?>
	<?php if ( $em_font = ot_get_option( 'em_font' ) ) { ?>
em {
		<?php thb_typeoutput( $em_font ); ?>
}
<?php } ?>
	<?php if ( $label_font = ot_get_option( 'label_font' ) ) { ?>
label {
		<?php thb_typeoutput( $label_font ); ?>
}
<?php } ?>
	<?php if ( $button_font = ot_get_option( 'button_font' ) ) { ?>
input[type="submit"],
submit,
.button,
.btn,
.btn-block,
.btn-text {
		<?php thb_typeoutput( $button_font ); ?>
}
<?php } ?>
/* Typography */
	<?php if ( $body_type = ot_get_option( 'body_type' ) ) { ?>
.article-container .post-content,
.article-container .post-content p:not(.wp-block-cover-text) {
		<?php thb_typeoutput( $body_type ); ?>
}
<?php } ?>
	<?php if ( $article_category_type = ot_get_option( 'article_category_type' ) ) { ?>
.post .post-category {
		<?php thb_typeoutput( $article_category_type ); ?>
}
<?php } ?>
	<?php if ( $article_executive_type = ot_get_option( 'article_executive_type' ) ) { ?>
.post-detail .thb-executive-summary li {
		<?php thb_typeoutput( $article_executive_type ); ?>
}
<?php } ?>
	<?php if ( $article_excerpt_type = ot_get_option( 'article_excerpt_type' ) ) { ?>
.post .post-excerpt {
		<?php thb_typeoutput( $article_excerpt_type ); ?>
}
<?php } ?>
	<?php if ( $fullmenu_type = ot_get_option( 'fullmenu_type' ) ) { ?>
.thb-full-menu>li>a:not(.logolink) {
		<?php thb_typeoutput( $fullmenu_type ); ?>
}
<?php } ?>
	<?php if ( $fullmenu_sub_type = ot_get_option( 'fullmenu_sub_type' ) ) { ?>
.thb-full-menu li .sub-menu li a {
		<?php thb_typeoutput( $fullmenu_sub_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_type = ot_get_option( 'mobilemenu_type' ) ) { ?>
.thb-mobile-menu>li>a {
		<?php thb_typeoutput( $mobilemenu_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_sub_type = ot_get_option( 'mobilemenu_sub_type' ) ) { ?>
.thb-mobile-menu .sub-menu a {
		<?php thb_typeoutput( $mobilemenu_sub_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_secondary_type = ot_get_option( 'mobilemenu_secondary_type' ) ) { ?>
.thb-secondary-menu a {
		<?php thb_typeoutput( $mobilemenu_secondary_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_footer_type = ot_get_option( 'mobilemenu_footer_type' ) ) { ?>
#mobile-menu .menu-footer {
		<?php thb_typeoutput( $mobilemenu_footer_type ); ?>
}
<?php } ?>
	<?php if ( $mobilemenu_social_type = ot_get_option( 'mobilemenu_social_type' ) ) { ?>
#mobile-menu .thb-social-links-container .thb-social-link-wrap .thb-social-link .thb-social-icon-container {
		<?php thb_typeoutput( $mobilemenu_social_type ); ?>
}
<?php } ?>
	<?php if ( $widget_title_type = ot_get_option( 'widget_title_type' ) ) { ?>
.widget .thb-widget-title,
.widget.style2 .thb-widget-title,
.widget.style3 .thb-widget-title  {
		<?php thb_typeoutput( $widget_title_type ); ?>
}
<?php } ?>
	<?php if ( $widget_title_type_footer = ot_get_option( 'widget_title_type_footer' ) ) { ?>
.footer .widget .thb-widget-title,
.footer .widget.style2 .thb-widget-title,
.footer .widget.style3 .thb-widget-title {
		<?php thb_typeoutput( $widget_title_type_footer ); ?>
}
<?php } ?>
	<?php if ( $footer_type = ot_get_option( 'footer_type' ) ) { ?>
.footer .widget,
.footer .widget p {
		<?php thb_typeoutput( $footer_type ); ?>
}
<?php } ?>
	<?php if ( $subfooter_fullmenu_type = ot_get_option( 'subfooter_fullmenu_type' ) ) { ?>
.subfooter .thb-full-menu>li>a:not(.logolink) {
		<?php thb_typeoutput( $subfooter_fullmenu_type ); ?>
}
<?php } ?>
	<?php if ( $subfooter_copyright_type = ot_get_option( 'subfooter_copyright_type' ) ) { ?>
.subfooter p {
		<?php thb_typeoutput( $subfooter_copyright_type ); ?>
}
<?php } ?>
	<?php if ( $subfooter_social_type = ot_get_option( 'subfooter_social_type' ) ) { ?>
.subfooter .thb-social-links-container.thb-social-horizontal .thb-social-link-wrap .thb-social-icon-container,
.subfooter.style6 .thb-social-links-container.thb-social-horizontal .thb-social-link-wrap .thb-social-icon-container {
		<?php thb_typeoutput( $subfooter_social_type ); ?>
}
	<?php } ?>
	<?php if ( $scrolltotop_type = ot_get_option( 'scrolltotop_type' ) ) { ?>
#scroll_to_top {
		<?php thb_typeoutput( $scrolltotop_type ); ?>
}
<?php } ?>
	<?php if ( $archive_description_type = ot_get_option( 'archive_description_type' ) ) { ?>
.search-title p {
		<?php thb_typeoutput( $archive_description_type ); ?>
}
<?php } ?>
/* Heading Typography */
	<?php if ( $h1_type = ot_get_option( 'h1_type' ) ) { ?>
@media screen and (min-width: 1024px) {
	h1,
	.h1 {
		<?php thb_typeoutput( $h1_type ); ?>
	}
}
h1,
.h1 {
		<?php thb_typeoutput( $h1_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h2_type = ot_get_option( 'h2_type' ) ) { ?>
@media screen and (min-width: 1024px) {
	h2 {
		<?php thb_typeoutput( $h2_type ); ?>
	}
}
h2 {
		<?php thb_typeoutput( $h2_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h3_type = ot_get_option( 'h3_type' ) ) { ?>
@media screen and (min-width: 1024px) {
	h3 {
		<?php thb_typeoutput( $h3_type ); ?>
	}
}
h3 {
		<?php thb_typeoutput( $h3_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h4_type = ot_get_option( 'h4_type' ) ) { ?>
@media screen and (min-width: 1024px) {
	h4 {
		<?php thb_typeoutput( $h4_type ); ?>
	}
}
h4 {
		<?php thb_typeoutput( $h4_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h5_type = ot_get_option( 'h5_type' ) ) { ?>
@media screen and (min-width: 1024px) {
	h5 {
		<?php thb_typeoutput( $h5_type ); ?>
	}
}
h5 {
		<?php thb_typeoutput( $h5_type, false, false, true ); ?>
}
<?php } ?>
	<?php if ( $h6_type = ot_get_option( 'h6_type' ) ) { ?>
h6 {
		<?php thb_typeoutput( $h6_type ); ?>
}
<?php } ?>
/* Logo */
	<?php if ( $logo_height = ot_get_option( 'logo_height' ) ) { ?>
.logo-holder .logolink .logoimg {
	max-height: <?php thb_measurementoutput( $logo_height ); ?>;
}
.logo-holder .logolink .logoimg[src$=".svg"] {
	max-height: 100%;
	height: <?php thb_measurementoutput( $logo_height ); ?>;
}
<?php } ?>
	<?php if ( $logo_height_mobile = ot_get_option( 'logo_height_mobile' ) ) { ?>
@media screen and (max-width: 1023px) {
	.header.header-mobile .logo-holder .logolink .logoimg {
		max-height: <?php thb_measurementoutput( $logo_height_mobile ); ?>;
	}
	.header.header-mobile .logo-holder .logolink .logoimg[src$=".svg"] {
		max-height: 100%;
		height: <?php thb_measurementoutput( $logo_height_mobile ); ?>;
	}
}
<?php } ?>
	<?php if ( $logo_height_fixed = ot_get_option( 'logo_height_fixed' ) ) { ?>
.header.fixed:not(.header-mobile) .logo-holder .logolink .logoimg {
	max-height: <?php thb_measurementoutput( $logo_height_fixed ); ?>;
}
.header.fixed:not(.header-mobile) .logo-holder .logolink .logoimg {
	max-height: 100%;
	height: <?php thb_measurementoutput( $logo_height_fixed ); ?>;
}
<?php } ?>
	<?php if ( $logo_height_mobilemenu = ot_get_option( 'logo_height_mobilemenu' ) ) { ?>
#mobile-menu .logolink .logoimg {
	max-height: <?php thb_measurementoutput( $logo_height_mobilemenu ); ?>;
}
#mobile-menu .logolink .logoimg {
	max-height: 100%;
	height: <?php thb_measurementoutput( $logo_height_mobilemenu ); ?>;
}
<?php } ?>
/* Header Measurements */
	<?php if ( $thb_underline_color = ot_get_option( 'thb_underline_color' ) ) { ?>
.thb-full-menu.thb-underline > li > a:before,
.thb-full-menu.thb-line-marker > li > a:before {
	background: <?php echo esc_attr( $thb_underline_color ); ?> !important;
}
<?php } ?>
	<?php if ( $menu_margin = ot_get_option( 'menu_margin' ) ) { ?>
.thb-full-menu>li+li {
	margin-left: <?php thb_measurementoutput( $menu_margin ); ?>
}
<?php } ?>
	<?php if ( $header_padding = ot_get_option( 'header_padding' ) ) { ?>
.header:not(.fixed):not(.header-mobile):not(.style1) {
		<?php thb_paddingoutput( $header_padding ); ?>
}
.header.style1 .header-logo-row {
		<?php thb_paddingoutput( $header_padding ); ?>
}
<?php } ?>
	<?php if ( $header_padding_fixed = ot_get_option( 'header_padding_fixed' ) ) { ?>
.header.fixed:not(.header-mobile) {
		<?php thb_paddingoutput( $header_padding_fixed ); ?>
}
<?php } ?>
	<?php if ( $header_padding_mobile = ot_get_option( 'header_padding_mobile' ) ) { ?>
.header.header-mobile {
		<?php thb_paddingoutput( $header_padding_mobile ); ?>
}
<?php } ?>
	<?php if ( $logo_padding = ot_get_option( 'logo_padding' ) ) { ?>
.header:not(.header-mobile):not(.fixed) .logo-holder {
		<?php thb_paddingoutput( $logo_padding ); ?>
}
<?php } ?>
	<?php if ( $logo_mobile_padding = ot_get_option( 'logo_mobile_padding' ) ) { ?>
.header.header-mobile .logo-holder {
		<?php thb_paddingoutput( $logo_mobile_padding ); ?>
}
<?php } ?>
/* Colors */
	<?php if ( $accent_color = ot_get_option( 'accent_color' ) ) { ?>
a:hover,
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small,
h1 small a, h2 small a, h3 small a, h4 small a, h5 small a, h6 small a,
.secondary-area .thb-follow-holder .sub-menu .subscribe_part .thb-newsletter-form h4,
.secondary-area .thb-follow-holder .sub-menu .subscribe_part .thb-newsletter-form .newsletter-form .btn:hover,
.thb-full-menu.thb-standard > li.current-menu-item:not(.has-hash) > a,
.thb-full-menu > li > a:not(.logolink)[data-filter].active,
.thb-dropdown-color-dark .thb-full-menu .sub-menu li a:hover,
#mobile-menu.dark .thb-mobile-menu > li > a:hover,
#mobile-menu.dark .sub-menu a:hover,
#mobile-menu.dark .thb-secondary-menu a:hover,
.thb-secondary-menu a:hover,
.post .thb-read-more:hover,
.post:not(.white-post-content) .thb-post-bottom.sponsored-bottom ul li,
.post:not(.white-post-content) .thb-post-bottom .post-share:hover,
.thb-dropcap-on .post-detail .post-content>p:first-of-type:first-letter,
.thb-dropcap-on .post-detail .post-content>.row:first-of-type .columns:first-of-type .wpb_text_column:first-of-type .wpb_wrapper>p:first-of-type:first-letter,
.post-detail .thb-executive-summary li:before,
.thb-readmore p a,
input[type="submit"].white:hover,
.button.white:hover,
.btn.white:hover,
input[type="submit"].style2.accent,
.button.style2.accent,
.btn.style2.accent,
.search-title h1 strong,
.thb-author-page-meta a:hover,
.widget.thb_widget_top_reviews .post .widget-review-title-holder .thb-widget-score strong,
.thb-autotype .thb-autotype-entry,
.thb_location_container.row .thb_location h5,
.thb-page-menu li:hover a, .thb-page-menu li.current_page_item a,
.thb-tabs.style3 .vc_tta-panel-heading h4 a:hover,
.thb-tabs.style3 .vc_tta-panel-heading h4 a.active,
.thb-tabs.style4 .vc_tta-panel-heading h4 a:hover,
.thb-tabs.style4 .vc_tta-panel-heading h4 a.active,
.thb-iconbox.top.type5 .iconbox-content .thb-read-more,
.thb-testimonials.style7 .testimonial-author cite,
.thb-testimonials.style7 .testimonial-author span,
.thb-article-reactions .row .columns .thb-reaction.active .thb-reaction-count,
.thb-article-sponsors .sponsored-by,
.thb-cookie-bar .thb-cookie-text a,
.thb-pricing-table.style2 .pricing-container .thb_pricing_head .thb-price,
.thb-hotspot-container .product-hotspots .product-title .hotspots-buynow,
.plyr--full-ui input[type=range],
.woocommerce-checkout-payment .wc_payment_methods .wc_payment_method.payment_method_paypal .about_paypal,
.has-thb-accent-color,
.wp-block-button .wp-block-button__link.has-thb-accent-color {
	color: <?php echo esc_attr( $accent_color ); ?>;
}
.columns.thb-light-column .thb-newsletter-form .btn:hover,
.secondary-area .thb-trending-holder .thb-full-menu li.menu-item-has-children .sub-menu .thb-trending .thb-trending-tabs a.active,
.thb-full-menu.thb-line-marker > li > a:before,
#mobile-menu.dark .widget.thb_widget_subscribe .btn:hover,
.post .thb-read-more:after,
.post.style4 .post-gallery:after,
.post.style5 .post-inner-content,
.post.style13 .post-gallery:after,
.smart-list .smart-list-title .smart-list-count,
.smart-list.smart-list-v3 .thb-smart-list-nav .arrow:not(.disabled):hover,
.thb-custom-checkbox input[type="checkbox"]:checked + label:before,
input[type="submit"]:not(.white):not(.grey):not(.style2):not(.white):not(.add_to_cart_button):not(.accent):hover,
.button:not(.white):not(.grey):not(.style2):not(.white):not(.add_to_cart_button):not(.accent):hover,
.btn:not(.white):not(.grey):not(.style2):not(.white):not(.add_to_cart_button):not(.accent):hover,
input[type="submit"].grey:hover,
.button.grey:hover,
.btn.grey:hover,
input[type="submit"].accent, input[type="submit"].checkout,
.button.accent,
.button.checkout,
.btn.accent,
.btn.checkout,
input[type="submit"].style2.accent:hover,
.button.style2.accent:hover,
.btn.style2.accent:hover,
.btn-text.style3 .circle-btn,
.widget.thb_widget_top_categories .thb-widget-category-link:hover .thb-widget-category-name,
.thb-progressbar .thb-progress span,
.thb-page-menu.style1 li:hover a, .thb-page-menu.style1 li.current_page_item a,
.thb-client-row.thb-opacity.with-accent .thb-client:hover,
.thb-client-row .style4 .accent-color,
.thb-tabs.style1 .vc_tta-panel-heading h4 a:before,
.thb-testimonials.style7 .thb-carousel .slick-dots .select,
.thb-categorylinks.style2 a:after,
.thb-category-card:hover,
.thb-hotspot-container .thb-hotspot.pin-accent,
.pagination ul .page-numbers.current, .pagination ul .page-numbers:not(.dots):hover,
.pagination .nav-links .page-numbers.current,
.pagination .nav-links .page-numbers:not(.dots):hover,
.woocommerce-pagination ul .page-numbers.current,
.woocommerce-pagination ul .page-numbers:not(.dots):hover,
.woocommerce-pagination .nav-links .page-numbers.current,
.woocommerce-pagination .nav-links .page-numbers:not(.dots):hover,
.plyr__control--overlaid,
.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true],
.badge.onsale,
.demo_store,
.products .product .product_after_title .button:hover:after,
.woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a,
.has-thb-accent-background-color,
.wp-block-button .wp-block-button__link.has-thb-accent-background-color {
	background-color: <?php echo esc_attr( $accent_color ); ?>;
}
.thb-dark-mode-on .btn.grey:hover,
.thb-dark-mode-on .thb-pricing-table.style2 .pricing-container .btn:hover,
.thb-dark-mode-on .woocommerce-checkout-payment .wc_payment_methods+.place-order .button:hover {
	background-color: <?php echo esc_attr( $accent_color ); ?>;
}
input[type="submit"].accent:hover, input[type="submit"].checkout:hover,
.button.accent:hover,
.button.checkout:hover,
.btn.accent:hover,
.btn.checkout:hover {
	background-color: <?php echo esc_attr( thb_adjustColorLightenDarken( $accent_color, 10 ) ); ?>;
}
.post-detail .post-split-title-container,
.thb-article-reactions .row .columns .thb-reaction.active .thb-reaction-image,
.secondary-area .thb-follow-holder .sub-menu .subscribe_part {
	background-color: rgba(<?php echo esc_attr( thb_hex2rgb( $accent_color ) ); ?>, 0.05) !important;
}
.post.style6.style6-bg .post-inner-content {
	background-color: rgba(<?php echo esc_attr( thb_hex2rgb( $accent_color ) ); ?>, 0.15);
}
.thb-lightbox-button:hover {
	background-color: rgba(<?php echo esc_attr( thb_hex2rgb( $accent_color ) ); ?>, 0.05);
}
.thb-tabs.style3 .vc_tta-panel-heading h4 a:before {
	background-color: rgba(<?php echo esc_attr( thb_hex2rgb( $accent_color ) ); ?>, 0.4);
}
.secondary-area .thb-trending-holder .thb-full-menu li.menu-item-has-children .sub-menu .thb-trending .thb-trending-tabs a.active,
.post .post-title a:hover > span,
.post.sticky .post-title a>span,
.thb-lightbox-button:hover,
.thb-custom-checkbox label:before,
input[type="submit"].style2.accent,
.button.style2.accent,
.btn.style2.accent,
.thb-page-menu.style1 li:hover a, .thb-page-menu.style1 li.current_page_item a,
.thb-client-row.has-border.thb-opacity.with-accent .thb-client:hover,
.thb-iconbox.top.type5,
.thb-article-reactions .row .columns .thb-reaction:hover .thb-reaction-image,
.thb-article-reactions .row .columns .thb-reaction.active .thb-reaction-image,
.pagination ul .page-numbers.current, .pagination ul .page-numbers:not(.dots):hover,
.pagination .nav-links .page-numbers.current,
.pagination .nav-links .page-numbers:not(.dots):hover,
.woocommerce-pagination ul .page-numbers.current,
.woocommerce-pagination ul .page-numbers:not(.dots):hover,
.woocommerce-pagination .nav-links .page-numbers.current,
.woocommerce-pagination .nav-links .page-numbers:not(.dots):hover,
.woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a {
	border-color: <?php echo esc_attr( $accent_color ); ?>;
}
.thb-page-menu.style1 li:hover + li a, .thb-page-menu.style1 li.current_page_item + li a,
.woocommerce-MyAccount-navigation ul li:hover + li a, .woocommerce-MyAccount-navigation ul li.is-active + li a {
	border-top-color: <?php echo esc_attr( $accent_color ); ?>;
}
.text-underline-style:after, .post-detail .post-content > p > a:after, .post-detail .post-content>ul:not([class])>li>a:after, .post-detail .post-content>ol:not([class])>li>a:after, .wpb_text_column p > a:after, .smart-list .thb-smart-list-content p > a:after, .post-gallery-content .thb-content-row .columns.image-text p>a:after {
	border-bottom-color: <?php echo esc_attr( $accent_color ); ?>;
}
.secondary-area .thb-trending-holder .thb-full-menu li.menu-item-has-children .sub-menu .thb-trending .thb-trending-tabs a.active + a {
	border-left-color: <?php echo esc_attr( $accent_color ); ?>;
}
.header.fixed .thb-reading-indicator .thb-indicator .indicator-hover,
.header.fixed .thb-reading-indicator .thb-indicator .indicator-arrow,
.commentlist .comment .reply a:hover svg path,
.commentlist .review .reply a:hover svg path,
.btn-text.style4 .arrow svg:first-child,
.thb-iconbox.top.type5 .iconbox-content .thb-read-more svg,
.thb-iconbox.top.type5 .iconbox-content .thb-read-more svg .bar,
.thb-article-review.style2 .thb-article-figure .thb-average .thb-hexagon path {
	fill: <?php echo esc_attr( $accent_color ); ?>;
}
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
	.header.fixed .thb-reading-indicator:hover .thb-indicator .indicator-hover {
		fill: <?php echo esc_attr( $accent_color ); ?>;
	}
}
.header.fixed .thb-reading-indicator .thb-indicator .indicator-fill {
	stroke: <?php echo esc_attr( $accent_color ); ?>;
}
.thb-tabs.style2 .vc_tta-panel-heading h4 a.active {
	-moz-box-shadow: inset 0 -3px 0 <?php echo esc_attr( $accent_color ); ?>, 0 1px 0 <?php echo esc_attr( $accent_color ); ?>;
	-webkit-box-shadow: inset 0 -3px 0 <?php echo esc_attr( $accent_color ); ?>, 0 1px 0 <?php echo esc_attr( $accent_color ); ?>;
	box-shadow: inset 0 -3px 0 <?php echo esc_attr( $accent_color ); ?>, 0 1px 0 <?php echo esc_attr( $accent_color ); ?>;
}
<?php } ?>
	<?php if ( $mobile_menu_icon_color = ot_get_option( 'mobile_menu_icon_color' ) ) { ?>
.mobile-toggle-holder .mobile-toggle span,
.header.dark-header .mobile-toggle-holder .mobile-toggle span {
	background: <?php echo esc_attr( $mobile_menu_icon_color ); ?>;
}
<?php } ?>
	<?php if ( $submenu_border_color = ot_get_option( 'submenu_border_color' ) ) { ?>
.thb-full-menu .sub-menu {
	border-color: <?php echo esc_attr( $submenu_border_color ); ?>;
}
<?php } ?>
	<?php if ( $article_dropcap_color = ot_get_option( 'article_dropcap_color' ) ) { ?>
.thb-dropcap-on .post-detail .post-content>p:first-of-type:first-letter,
.thb-dropcap-on .post-detail .post-content>.row:first-of-type .columns:first-of-type .wpb_text_column:first-of-type .wpb_wrapper>p:first-of-type:first-letter {
	color: <?php echo esc_attr( $article_dropcap_color ); ?> !important;
}
	<?php } ?>
	<?php if ( $widget_title_color = ot_get_option( 'widget_title_color' ) ) { ?>
.widget .thb-widget-title {
	color: <?php echo esc_attr( $widget_title_color ); ?>;
}
<?php } ?>

	<?php if ( $footer_widget_title_color = ot_get_option( 'footer_widget_title_color' ) ) { ?>
.footer .widget .thb-widget-title,
.footer.dark .widget .thb-widget-title {
	color: <?php echo esc_attr( $footer_widget_title_color ); ?>;
}
<?php } ?>
	<?php if ( $widget_title_bg_color = ot_get_option( 'widget_title_bg_color' ) ) { ?>
.widget.style1 .thb-widget-title,
.widget.style2 .thb-widget-title,
.widget.style3 .thb-widget-title {
	background-color: <?php echo esc_attr( $widget_title_bg_color ); ?>;
}
<?php } ?>
	<?php if ( $footer_text_color = ot_get_option( 'footer_text_color' ) ) { ?>
.footer,
.footer p,
.footer.dark,
.footer.dark p {
	color: <?php echo esc_attr( $footer_text_color ); ?>;
}
<?php } ?>
	<?php if ( $subfooter_text_color = ot_get_option( 'subfooter_text_color' ) ) { ?>
.subfooter,
.subfooter p,
.subfooter.dark,
.subfooter.dark p {
	opacity: 1;
	color: <?php echo esc_attr( $subfooter_text_color ); ?>;
}
<?php } ?>
/* Link Colors */
	<?php if ( $general_link_color = ot_get_option( 'general_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $general_link_color, '.post .post-content p' ); ?>
		<?php thb_linkcoloroutput( $general_link_color, '.post-detail .post-content>ol:not([class])>li>' ); ?>
		<?php thb_linkcoloroutput( $general_link_color, '.post-detail .post-content>ul:not([class])>li>' ); ?>
<?php } ?>
	<?php if ( $article_title_link_color = ot_get_option( 'article_title_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $article_title_link_color, '.post:not(.post-white-title):not(.featured-style):not(.white-post-content) .post-title' ); ?>
<?php } ?>
	<?php if ( $article_category_link_color = ot_get_option( 'article_category_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $article_category_link_color, '.post:not(.post-white-title):not(.featured-style):not(.white-post-content) .post-category' ); ?>
<?php } ?>
	<?php if ( $fullmenu_link_color_dark = ot_get_option( 'fullmenu_link_color_dark' ) ) { ?>
		<?php thb_linkcoloroutput( $fullmenu_link_color_dark, '.thb-full-menu>li>' ); ?>
<?php } ?>
	<?php if ( $submenu_link_color = ot_get_option( 'submenu_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $submenu_link_color, '.thb-full-menu .sub-menu li' ); ?>
		<?php thb_linkcoloroutput( $submenu_link_color, '.thb-dropdown-color-dark .thb-full-menu .sub-menu li' ); ?>
<?php } ?>
	<?php if ( $post_category_link_color = ot_get_option( 'post_category_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $post_category_link_color, '.post:not(.featured-style):not(.post-detail) .post-category' ); ?>
		<?php thb_linkcoloroutput( $post_category_link_color, '.post.post-detail:not(.post-detail-style3):not(.post-detail-style5):not(.post-detail-style7):not(.post-detail-style9) .post-detail-category' ); ?>
<?php } ?>
	<?php if ( $footer_link_color = ot_get_option( 'footer_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $footer_link_color, '.footer .widget' ); ?>
		<?php
		if ( 'dark' === ot_get_option( 'footer_color' ) ) {
			thb_linkcoloroutput( $footer_link_color, '.footer.dark .widget' ); }
		?>
<?php } ?>
	<?php if ( $subfooter_link_color = ot_get_option( 'subfooter_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $subfooter_link_color, '.subfooter' ); ?>
		<?php thb_linkcoloroutput( $subfooter_link_color, '.subfooter .thb-full-menu>li' ); ?>
<?php } ?>
	<?php if ( $mobilemenu_link_color = ot_get_option( 'mobilemenu_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $mobilemenu_link_color, '#mobile-menu .thb-mobile-menu>li>' ); ?>
		<?php thb_linkcoloroutput( $mobilemenu_link_color, '#mobile-menu.dark .thb-mobile-menu>li>' ); ?>
<?php } ?>
	<?php if ( $mobilemenu_secondary_link_color = ot_get_option( 'mobilemenu_secondary_link_color' ) ) { ?>
		<?php thb_linkcoloroutput( $mobilemenu_secondary_link_color, '#mobile-menu .thb-secondary-menu' ); ?>
		<?php thb_linkcoloroutput( $mobilemenu_secondary_link_color, '#mobile-menu.dark .thb-secondary-menu' ); ?>
<?php } ?>

/* Backgrounds */
.page-id-<?php echo esc_attr( $id ); ?> #wrapper div[role="main"],
.postid-<?php echo esc_attr( $id ); ?> #wrapper div[role="main"] {
	<?php thb_bgoutput( get_post_meta( $id, 'page_bg', true ) ); ?>
}
	<?php if ( $mobilemenu_bg = ot_get_option( 'mobilemenu_bg' ) ) { ?>
#mobile-menu {
		<?php thb_bgoutput( $mobilemenu_bg ); ?>
}
<?php } ?>
	<?php if ( $header_bg = ot_get_option( 'header_bg' ) ) { ?>
.header:not(.fixed):not(.style1) {
		<?php thb_bgoutput( $header_bg ); ?>
}
.header.style1 .header-logo-row {
		<?php thb_bgoutput( $header_bg ); ?>
}
<?php } ?>
	<?php if ( $fixed_header_bg = ot_get_option( 'fixed_header_bg' ) ) { ?>
.header.fixed {
		<?php thb_bgoutput( $fixed_header_bg ); ?>
}
<?php } ?>
	<?php if ( $search_bg = ot_get_option( 'search_bg' ) ) { ?>
.thb-search-popup {
		<?php thb_bgoutput( $search_bg ); ?>
}
<?php } ?>
	<?php if ( $menu_bg = ot_get_option( 'menu_bg' ) ) { ?>
.header.style1 .header-menu-row,
.header.style2 .thb-navbar,
.header.style3 .row.menu-row,
.header.style5 .header-menu-row,
.header.style7 .header-menu-row {
		<?php thb_bgoutput( $menu_bg ); ?>
}
<?php } ?>
	<?php if ( $submenu_bg = ot_get_option( 'submenu_bg' ) ) { ?>
.thb-full-menu .sub-menu,
.thb-dropdown-color-dark .thb-full-menu .sub-menu {
		<?php thb_bgoutput( $submenu_bg ); ?>
}
<?php } ?>
	<?php if ( $footer_bg = ot_get_option( 'footer_bg' ) ) { ?>
.footer {
		<?php thb_bgoutput( $footer_bg ); ?>
}
<?php } ?>
	<?php if ( $subfooter_bg = ot_get_option( 'subfooter_bg' ) ) { ?>
.subfooter {
		<?php thb_bgoutput( $subfooter_bg ); ?>
}
<?php } ?>
	<?php if ( $notfound_bg = ot_get_option( 'notfound_bg' ) ) { ?>
.error404 #wrapper [role="main"] {
		<?php thb_bgoutput( $notfound_bg ); ?>
}
<?php } ?>
	<?php if ( $page_transition_overlay_bg = ot_get_option( 'page_transition_overlay_bg' ) ) { ?>
.thb-page-transition-overlay {
		<?php thb_bgoutput( $page_transition_overlay_bg ); ?>
}
<?php } ?>
	<?php if ( $newsletter_bg = ot_get_option( 'newsletter_bg' ) ) { ?>
.theme-popup.newsletter-popup {
		<?php thb_bgoutput( $newsletter_bg ); ?>
}
<?php } ?>
/* Footer Measurements */
	<?php if ( $footer_padding = ot_get_option( 'footer_padding' ) ) { ?>
.footer {
		<?php thb_paddingoutput( $footer_padding ); ?>
}
<?php } ?>
	<?php if ( $subfooter_padding = ot_get_option( 'subfooter_padding' ) ) { ?>
.subfooter {
		<?php thb_paddingoutput( $subfooter_padding ); ?>
}
<?php } ?>
	<?php if ( $footer_logo_height = ot_get_option( 'footer_logo_height' ) ) { ?>
.footer .footer-logo-holder .footer-logolink .logoimg {
	max-height: <?php thb_measurementoutput( $footer_logo_height ); ?>;
}
<?php } ?>
	<?php if ( $subfooter_logo_height = ot_get_option( 'subfooter_logo_height' ) ) { ?>
.subfooter .footer-logo-holder .logoimg {
	max-height: <?php thb_measurementoutput( $subfooter_logo_height ); ?>;
}
<?php } ?>
/* Grid Size */
	<?php if ( $thb_grid_size = ot_get_option( 'thb_grid_size' ) ) { ?>
.row {
	max-width: <?php thb_measurementoutput( $thb_grid_size ); ?>;
}
.row.max_width {
	max-width: <?php thb_measurementoutput( $thb_grid_size ); ?> !important;
}
<?php } ?>
/* Site Border */
	<?php if ( 'on' === ot_get_option( 'site_borders' ) ) { ?>
.thb-borders {
	border-color: <?php echo esc_attr( ot_get_option( 'site_borders_color' ) ); ?>;
}
		<?php if ( $site_borders_width = ot_get_option( 'site_borders_width', array( '8', 'px' ) ) ) { ?>
	@media only screen and (min-width: 40.063em) {
		.thb-borders {
			border-width: <?php thb_measurementoutput( $site_borders_width ); ?>;
		}
		.thb-borders-on #wrapper {
			padding: <?php thb_measurementoutput( $site_borders_width ); ?>;
		}
	}
	<?php } ?>
<?php } ?>
/* Extra CSS */
	<?php echo ot_get_option( 'extra_css' ); ?>
	<?php
	$out = ob_get_clean();
	// Remove comments
	$out = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out );
	// Remove space after colons
	$out = str_replace( ': ', ':', $out );
	// Remove whitespace
	$out = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $out );

	return $out;
}
