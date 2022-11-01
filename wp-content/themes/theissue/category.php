<?php get_header(); ?>
<?php get_template_part( 'inc/templates/misc/header-archive' ); ?>
<?php
$global_layout   = ot_get_option( 'category_layout', 'style1' );
$the_category    = get_queried_object_id();
$category_layout = get_term_meta( $the_category, 'thb_cat_layout', true );

if ( ! empty( $category_layout ) && '' !== $category_layout ) {
	$global_layout = $category_layout;
}
$get_category_layout = filter_input( INPUT_GET, 'category_layout', FILTER_SANITIZE_STRING );

if ( $get_category_layout ) {
	$global_layout = $get_category_layout;
}
?>
<?php get_template_part( 'inc/templates/archive/' . $global_layout ); ?>
<?php
get_footer();
