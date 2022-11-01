<?php function thb_categorylinks( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_categorylinks', $atts );
	extract( $atts );

	$el_class[] = 'thb-categorylinks';
	$el_class[] = $style;
	$el_class[] = $extra_class;
	$el_class[] = $alignment;
	$el_class[] = in_array( $style, array( 'style3', 'style4' ) ) ? 'row' : false;
	ob_start();

	$cats         = explode( ',', $cat );
	$col          = thb_translate_columns( $columns );
	$link_class[] = 'category-link-' . $style;
	$link_class[] = $style == 'style1' ? 'tag-cloud-link' : false;
	$link_class[] = in_array( $style, array( 'style3', 'style4' ) ) ? $col : false;
	$link_class[] = in_array( $style, array( 'style3', 'style4' ) ) ? 'small-6 columns' : false;
	?>
	<div class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>">
	<?php
	foreach ( $cats as $category ) {
		$term = get_term( $category ); if ( $term && isset( $term->term_id ) ) {
			?>
		<a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" class="<?php echo esc_attr( implode( ' ', $link_class ) ); ?>">
					<?php if ( in_array( $style, array( 'style3', 'style4' ) ) ) { ?>
			<figure>
						<?php
						$header_id = get_term_meta( $term->term_id, 'thb_cat_header_id', true );
						if ( $header_id ) {
							$image_size = $style == 'style3' ? 'theissue-thumbnail-x2' : 'theissue-square';
							echo wp_get_attachment_image( $header_id, $image_size );
						}
						?>
			</figure>
		<?php } ?>
		<span class="category-title"><?php echo esc_html( $term->name ); ?></span>
					<?php if ( in_array( $style, array( 'style4' ) ) ) { ?>
		<span class="category-count"><?php echo esc_html( $term->count ); ?> <?php esc_html_e( 'Articles', 'theissue' ); ?></span>
		<?php } ?>
		</a>
			<?php
		}
	}
	?>
	</div>
	<?php

	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_categorylinks', 'thb_categorylinks' );
