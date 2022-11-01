<?php function thb_location_parent( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_location_parent', $atts );
	extract( $atts );
	$thb_api_key  = ot_get_option( 'map_api_key' );
	$map_style    = rawurldecode( thb_decode( strip_tags( $map_style ) ) );
	$map_controls = explode( ',', $map_controls );

	$location_title = $location_description = '';
	preg_match_all( '/marker_title=\"(.*?)\"\smarker_description=\"(.*?)\"]/is', $content, $matches, PREG_OFFSET_CAPTURE );

	$locations = array();
	if ( isset( $matches[1] ) ) {
		for ( $i = 0; $i < sizeof( $matches[1] ); ++$i ) {
			$locations[] = array(
				'title'       => $matches[1][ $i ][0],
				'description' => $matches[2][ $i ][0],
			);
		}
	}
	$element_id = 'thb-office-locations-' . wp_rand( 10, 999 );
	ob_start(); ?>
	<?php if ( sizeof( $locations ) ) { ?>
		<div id="<?php echo esc_attr( $element_id ); ?>" class="thb-carousel row max_width thb_location_container" data-columns="4" data-pagination="true" data-infinite="false">
			<?php $i = 1; foreach ( $locations as $location ) { ?>
				<div class="columns">
					<div class="thb_location
					<?php
					if ( $i === 1 ) {
						?>
						active<?php } ?>">
						<h5><?php echo esc_attr( $i ); ?>. <?php echo esc_html( $location['title'] ); ?></h5>
						<?php echo wp_kses_post( thb_remove_p( $location['description'] ) ); ?>
					</div>
				</div>
			<?php $i++; } ?>
		</div>

	<?php } ?>
	<?php
		$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
		$regexr  = preg_match( $pattern, $height, $matches );
		$value   = isset( $matches[1] ) ? (float) $matches[1] : (float) WPBMap::getParam( 'thb_map_parent', 'height' );
		$unit    = isset( $matches[2] ) ? $matches[2] : 'vh';
		$height  = $value . $unit;
	?>
	<div class="thb_office_location
	<?php
	if ( $thb_api_key === '' ) {
		?>
		disabled<?php } ?>" style="height:<?php echo esc_attr( $height ); ?>" data-map-style="<?php echo esc_attr( $map_style ); ?>" data-map-zoom="<?php echo esc_attr( $zoom ); ?>" data-map-type="<?php echo esc_attr( $map_type ); ?>" data-pan-control="<?php echo esc_attr( in_array( 'panControl', $map_controls ) ); ?>" data-zoom-control="<?php echo esc_attr( in_array( 'zoomControl', $map_controls ) ); ?>" data-maptype-control="<?php echo esc_attr( in_array( 'mapTypeControl', $map_controls ) ); ?>" data-scale-control="<?php echo esc_attr( in_array( 'scaleControl', $map_controls ) ); ?>" data-streetview-control="<?php echo esc_attr( in_array( 'streetViewControl', $map_controls ) ); ?>">
		<?php if ( $thb_api_key !== '' ) { ?>
			<?php echo wpb_js_remove_wpautop( $content, false ); ?>
		<?php } else { ?>
			<?php esc_html_e( 'Please fill out Google Maps Api key inside Theme Options', 'theissue' ); ?>
		<?php } ?>
	</div>
	<style>
		<?php if ( $location_bg_color ) { ?>
			#<?php echo esc_attr( $element_id ); ?> .thb_location.active {
				background: <?php echo esc_attr( $location_bg_color ); ?>;
			}
		<?php } ?>
		<?php if ( $heading_color ) { ?>
			#<?php echo esc_attr( $element_id ); ?> h5 {
				color: <?php echo esc_attr( $heading_color ); ?>;
			}
		<?php } ?>
	</style>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_location_parent', 'thb_location_parent' );
