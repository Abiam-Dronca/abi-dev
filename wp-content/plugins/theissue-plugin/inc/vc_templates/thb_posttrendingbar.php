<?php function thb_posttrendingbar( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_posttrendingbar', $atts );
	extract( $atts );

	if ( $offset ) {
		$source .= '|offset:' . $offset; }
	$source_data    = VcLoopSettings::parseData( $source );
	$query_builder  = new ThbLoopQueryBuilder( $source_data );
	$trending_posts = $query_builder->build();
	$trending_posts = $trending_posts[1];

	$classes[] = 'thb-trending';
	$classes[] = $style;
	ob_start();

	if ( $trending_posts->have_posts() ) { ?>
		<div class="thb-trending-bar">
		<?php if ( $title ) { ?>
				<aside><?php echo esc_html( $title ); ?></aside>
		<?php } ?>
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-columns="1" data-navigation="false" data-pagination="false" data-autoplay="true" data-fade="true">
			<?php
			while ( $trending_posts->have_posts() ) :
				$trending_posts->the_post();
				?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endwhile; // end of the loop. ?>
			</div>
		</div>
		<?php
	}

	$out = ob_get_clean();
	wp_reset_postdata();

	return $out;
}
thb_add_short( 'thb_posttrendingbar', 'thb_posttrendingbar' );
