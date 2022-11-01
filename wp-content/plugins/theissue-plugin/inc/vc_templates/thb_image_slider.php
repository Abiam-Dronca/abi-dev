<?php function thb_image_slider( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_image_slider', $atts );
	extract( $atts );

	$element_id = 'thb-image-slider-' . wp_rand( 10, 999 );
	$el_class[] = 'thb-image-slider';
	$el_class[] = 'thb-carousel';
	$el_class[] = 'row';
	$el_class[] = $lightbox;
	$el_class[] = $thb_next_slides;
	$el_class[] = $thb_center === 'true' ? 'thb_center' : '';
	$el_class[] = $thb_equal_height === 'true' ? 'thb_equal_height' : '';
	$out        = '';
	ob_start();
	$images = explode( ',', $images );

	?>
	<div id="<?php echo esc_attr( $element_id ); ?>" class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>" data-pagination="<?php echo esc_attr( $thb_pagination ); ?>" data-center="<?php echo esc_attr( $thb_center ); ?>" data-columns="<?php echo esc_attr( $thb_columns ); ?>" data-infinite="true" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-autoplay-speed="<?php echo esc_attr( $autoplay_speed ); ?>">
		<?php
		foreach ( $images as $image ) {
			$image_link = wp_get_attachment_image_src( $image, 'full' );
			?>
				<figure class="columns">
				<?php if ( $lightbox ) { ?>
						<a href="<?php echo esc_attr( $image_link[0] ); ?>">
					<?php } ?>
				<?php
					echo wp_get_attachment_image(
						$image,
						'full',
						false,
						array(
							'class' => "attachment-$size_class size-$size_class thb-ignore-lazyload",
						)
					);
				?>
					<?php if ( $lightbox ) { ?>
						</a>
					<?php } ?>
				</figure>
				<?php
		}
		?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_image_slider', 'thb_image_slider' );
