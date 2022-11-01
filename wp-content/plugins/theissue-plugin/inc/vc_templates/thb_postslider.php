<?php function thb_postslider( $atts, $content = null ) {
	$autoplay = true;
	$atts     = vc_map_get_attributes( 'thb_postslider', $atts );
	extract( $atts );

	ob_start();
	$pagi = ( $pagination == 'true' ? 'true' : 'false' );
	$nav  = ( $navigation == 'true' ? 'true' : 'false' );

	if ( $offset ) {
		$source .= '|offset:' . $offset; }
	$source_data    = VcLoopSettings::parseData( $source );
	$query_builder  = new ThbLoopQueryBuilder( $source_data );
	$carousel_posts = $query_builder->build();
	$carousel_posts = $carousel_posts[1];

	$classes[] = 'thb-carousel';
	$classes[] = 'thb-post-slider';
	$classes[] = 'thb-post-slider-' . $style;
	$classes[] = 'white-dots';
	$classes[] = $style == 'style1' ? 'center-arrows' : false;
	$classes[] = $style == 'style2' ? 'bottom-left-arrows' : false;

	$title_size = 'h1';
	if ( $carousel_posts->have_posts() ) { ?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-columns="1" data-pagination="<?php echo esc_attr( $pagi ); ?>" data-navigation="<?php echo esc_attr( $nav ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-autoplay-speed="<?php echo esc_attr( $autoplay_speed ); ?>">
			<?php
			while ( $carousel_posts->have_posts() ) :
				$carousel_posts->the_post();
				?>
				<div>
					<?php set_query_var( 'thb_title_size', $title_size ); ?>
					<?php set_query_var( 'thb_image_size', 'theissue-full-x2' ); ?>
					<?php set_query_var( 'thb_extra_class', 'center-contents' ); ?>
					<?php get_template_part( 'inc/templates/post-styles/style13' ); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php
	}
	set_query_var( 'thb_title_size', false );
	get_query_var( 'thb_image_size', false );
	set_query_var( 'thb_extra_class', false );
	$out = ob_get_clean();

	wp_reset_query();
	wp_reset_postdata();
	return $out;
}
thb_add_short( 'thb_postslider', 'thb_postslider' );
