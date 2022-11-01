<?php function thb_button( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_button', $atts );
	extract( $atts );

	$element_id = uniqid( 'thb-button-' );
	$full_width = $full_width === 'true' ? 'full' : '';

	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link );

	$link_to  = $link['url'];
	$a_title  = $link['title'];
	$a_target = $link['target'] ? $link['target'] : '_self';

	// Lightbox
	if ( $lightbox == 'true' ) {
		if ( strpos( $link_to, 'youtu.be' ) !== false || strpos( $link_to, 'youtube.com' ) !== false || strpos( $link_to, 'player.vimeo.com' ) !== false ) {
			$class[] = 'mfp-video';
		} else {
			$class[] = 'mfp-image';
		}
	}
	// Classes
	$class[] = 'btn';
	$class[] = $style;
	$class[] = $size;
	$class[] = $full_width;
	$class[] = $color;
	$class[] = $border_radius;
	$class[] = $animation;
	$class[] = $extra_class;
	$class[] = $thb_shadow;
	$out     = '';
	if ( $icon ) {
		wp_enqueue_style( 'font-awesome' );
	}
	ob_start();
	?>
	<a id="<?php echo esc_attr( $element_id ); ?>" class="<?php echo esc_attr( implode( ' ', $class ) ); ?>" href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" role="button">
		<?php
		if ( $icon ) {
			?>
			<span class="thb-button-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></span><?php } ?>
		<span><?php echo esc_attr( $a_title ); ?></span></a>
	<?php
	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_button', 'thb_button' );
