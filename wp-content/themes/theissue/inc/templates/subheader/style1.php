<?php
	$classes[] = 'subheader style1';
	$classes[] = ot_get_option( 'subheader_color', 'light' );
	$classes[] = 'subheader-mobile-' . ot_get_option( 'subheader_mobile', 'off' );
	$classes[] = 'subheader-full-width-' . ot_get_option( 'thb_subheader_full_width', 'off' );

	$subheader_left_sections  = ot_get_option( 'subheader_left_sections' );
	$subheader_right_sections = ot_get_option( 'subheader_right_sections' );
?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="row subheader-row">
		<div class="small-12 medium-6 columns subheader-leftside">
			<?php do_action( 'thb_subheader_sections', $subheader_left_sections ); ?>
		</div>
		<div class="small-12 medium-6 columns subheader-rightside">
			<?php do_action( 'thb_subheader_sections', $subheader_right_sections ); ?>
		</div>
	</div>
</div>
