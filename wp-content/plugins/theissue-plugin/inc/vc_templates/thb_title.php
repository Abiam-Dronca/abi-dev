<?php function thb_title( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_title', $atts );
	extract( $atts );
	$element_id = uniqid( 'thb-title-' );

	$el_class[] = 'thb_title';
	$el_class[] = $icon_image ? 'has-img' : '';
	$el_class[] = $style;
	$el_class[] = $extra_class;
	$el_class[] = in_array( $style, array( 'style4', 'style5', 'style6', 'style8', 'style9' ) ) ? $text_align : false;
	$img        = '';
	if ( $icon_image ) {
		$img = wpb_getImageBySize(
			array(
				'attach_id'  => $icon_image,
				'thumb_size' => 'full',
				'class'      => 'thb_image',
			)
		);
	}
	if ( in_array( $style, array( 'style2', 'style5' ) ) ) {
		$link = ( $link == '||' ) ? '' : $link;
		$link = vc_build_link( $link );

		$link_to  = $link['url'];
		$a_title  = $link['title'];
		$a_target = $link['target'] ? $link['target'] : '_self';
	}
	ob_start();
	?>
	<div class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>" id="<?php echo esc_attr( $element_id ); ?>">
	<div class="thb_title_inner">
		<?php if ( $style == 'style3' ) { ?>
		<div class="thb_title_icon">
			<?php if ( $icon_image ) { ?>
					<div class="thb_title_image">
						<?php echo $img['thumbnail']; ?>
					</div>
				<?php
			} else {
				get_template_part( 'assets/svg/' . $icon );
			}
			?>
		</div>
		<?php } ?>
		<?php
		if ( $style == 'style1' ) {
			get_template_part( 'assets/img/svg/left_brackets.svg' ); }
		?>
		<h2><?php echo wp_kses_post( $title ); ?></h2>
		<?php
		if ( $style == 'style1' ) {
			get_template_part( 'assets/img/svg/right_brackets.svg' ); }
		?>
		<?php if ( in_array( $style, array( 'style2', 'style5' ) ) && $link_to ) { ?>
			<a href="<?php echo esc_attr( $link_to ); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>"><?php echo esc_attr( $a_title ); ?></a>
			<?php } ?>
	</div>
	<?php if ( $icon_image_width && $icon_image ) { ?>
	<style>
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_image img {
					width: <?php echo esc_attr( $icon_image_width ); ?>px;
					height: auto;
				}
		</style>
	<?php } ?>
	<?php if ( 'style9' === $style && $bg_color ) { ?>
	<style>
				#<?php echo esc_attr( $element_id ); ?>.thb_title .thb_title_inner {
					background: <?php echo esc_attr( $bg_color ); ?>;
				}
		</style>
	<?php } ?>
	</div>
	<?php

	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_title', 'thb_title' );
