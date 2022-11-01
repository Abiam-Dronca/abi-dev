<?php function thb_postmasonry( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_postmasonry', $atts );
	extract( $atts );

	if ( $offset ) {
		$source .= '|offset:' . $offset; }

	$source_data   = VcLoopSettings::parseData( $source );
	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$masonry_posts = $query_builder->build();
	$masonry_posts = $masonry_posts[1];

	$rand = wp_rand( 10, 99 );

	$classes[] = 'row posts';
	$classes[] = 'thb-masonry';
	$classes[] = 'thb-post-masonry-' . $style;

	if ( $loadmore ) {
		$classes[] = 'pagination-style2';
	}
	$col = thb_translate_columns( $columns );
	ob_start();
	if ( $masonry_posts->have_posts() ) { ?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-loadmore="#loadmore-<?php echo esc_attr( $rand ); ?>" data-rand="<?php echo esc_attr( $rand ); ?>" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_masonry_ajax' ) ); ?>">
			<?php
			while ( $masonry_posts->have_posts() ) :
				$masonry_posts->the_post();
				?>
				<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
					<?php get_template_part( 'inc/templates/post-styles/masonry/masonry-' . $style ); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php
			wp_localize_script(
				'thb-app',
				'thb_postajax_' . $rand,
				array(
					'style'   => $style,
					'count'   => $source_data['size'],
					'loop'    => $source,
					'columns' => $columns,
				)
			);
		?>
		<?php if ( $loadmore ) { ?>
			<div class="text-center masonry_loader">
				<a class="thb_load_more btn pill-radius large black" id="loadmore-<?php echo esc_attr( $rand ); ?>"><?php esc_html_e( 'Show More Posts', 'theissue' ); ?></a>
			</div>
		<?php } ?>
		<?php
	}

	$out = ob_get_clean();

	wp_reset_query();
	wp_reset_postdata();

	return $out;
}
thb_add_short( 'thb_postmasonry', 'thb_postmasonry' );
