<?php get_header(); ?>
<?php
	$thb_id   = $wp_query->get_queried_object_id();
	$style    = thb_get_article_style( $thb_id );
	$infinite = ot_get_option( 'infinite_load', 'on' );
?>
<div id="infinite-article" data-infinite="<?php echo esc_attr( $infinite ); ?>" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_infinite_ajax' ) ); ?>">
	<?php do_action( 'thb_page_content', ot_get_option( 'article_top_content' ) ); ?>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<?php
			if ( post_password_required() ) {
				get_template_part( 'inc/templates/misc/password-protected' );
			} else {
				get_template_part( 'inc/templates/post-detail-styles/' . $style );
			}
			?>
			<?php
	endwhile;
endif;
	?>
</div>
<?php
get_footer();
