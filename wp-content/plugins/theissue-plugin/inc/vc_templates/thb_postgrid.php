<?php function thb_postgrid( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_postgrid', $atts );
	extract( $atts );
	global $wp_query;

	$paged = 1;
	if ( $style !== 'style6' & ( $pagination === 'true' || $pagination === 'style4' ) ) {
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		}
	}

	$source .= '|paged:' . $paged;
	if ( $offset ) {
		$source .= '|offset:' . $offset; }
	$source_data   = VcLoopSettings::parseData( $source );
	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$thb_posts     = $query_builder->build();
	$thb_posts     = $thb_posts[1];

	$temp_query = $wp_query;
	$wp_query   = $thb_posts;
	ob_start();

	$rand = wp_rand( 10, 99 );

	$classes[] = 'thb-post-grid';
	$classes[] = 'thb-post-grid-' . $style;
	$classes[] = ! in_array( $style, array( 'style2', 'style5', 'style13', 'style8', 'style15', 'style17', 'style18', 'style19', 'style25' ) ) ? 'row' : false;
	$classes[] = $style == 'style10' ? 'small-padding' : false;
	$classes[] = $style == 'style20' ? 'no-padding' : false;
	if ( $pagination && $style !== 'style6' ) {
		$classes[] = 'pagination-' . $pagination;
		$classes[] = $pagination == 'true' ? 'ajaxify-pagination' : '';
	}
	$post_count = $thb_posts->post_count;
	?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-loadmore="#loadmore-<?php echo esc_attr( $rand ); ?>" data-rand="<?php echo esc_attr( $rand ); ?>" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_posts_ajax' ) ); ?>">
		<?php
		$i = 1;
		while ( $thb_posts->have_posts() ) :
			$thb_posts->the_post();
			?>
						<?php thb_DisplayPostGrid( $style, $columns, $excerpts, $featured_index, $i, $post_count ); ?>
				<?php
				$i++;
endwhile; // end of the loop.
		?>
		<?php
		if ( $style !== 'style6' ) {
			if ( $pagination == 'true' ) {
				thb_pagination();
			} elseif ( $pagination == 'style2' || $pagination == 'style3' ) {
				wp_localize_script(
					'thb-app',
					'thb_postajax_' . $rand,
					array(
						'style'          => $style,
						'loop'           => $source,
						'excerpts'       => $excerpts,
						'count'          => $source_data['size'],
						'columns'        => $columns,
						'thb_i'          => $i,
						'featured_index' => $featured_index,
					)
				);
			} elseif ( $pagination == 'style4' ) {
				thb_pagination_prevnext();
			}
			?>
			<?php if ( $pagination == 'style2' ) { ?>
			<aside class="text-center masonry_loader">
				<a class="thb_load_more btn pill-radius large black" id="loadmore-<?php echo esc_attr( $rand ); ?>"><?php esc_html_e( 'Show More Posts', 'theissue' ); ?></a>
			</aside>
		<?php } ?>
		<?php } // not style6 ?>
		</div>
	<?php
	set_query_var( 'thb_excerpt', false );
	set_query_var( 'thb_title_size', false );
	set_query_var( 'thb_image_size', false );
	set_query_var( 'thb_excerpt_length', false );
	set_query_var( 'thb_i', false );

	$out      = ob_get_clean();
	$wp_query = $temp_query;
	wp_reset_query();
	wp_reset_postdata();

	return $out;
}
thb_add_short( 'thb_postgrid', 'thb_postgrid' );
