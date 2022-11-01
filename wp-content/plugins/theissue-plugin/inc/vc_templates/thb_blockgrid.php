<?php function thb_blockgrid( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_blockgrid', $atts );
	extract( $atts );

	if ( $offset ) {
		$source .= '|offset:' . $offset;
	}

	$source_data = VcLoopSettings::parseData( $source );

	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$slider_posts  = $query_builder->build();
	$slider_posts  = $slider_posts[1];

	switch ( $style ) {
		case 'style1':
			$ppp = thb_roundUpToAny( $source_data['size'], 5 );
			break;
		case 'style2':
			$ppp = thb_roundUpToAny( $source_data['size'], 6 );
			break;
		case 'style3':
			$ppp = thb_roundUpToAny( $source_data['size'], 3 );
			break;
		case 'style4':
			$ppp = thb_roundUpToAny( $source_data['size'], 5 );
			break;
		case 'style5':
			$ppp = thb_roundUpToAny( $source_data['size'], 5 );
			break;
		case 'style6':
			$ppp = thb_roundUpToAny( $source_data['size'], 5 );
			break;
		case 'style7':
			$ppp = thb_roundUpToAny( $source_data['size'], 3 );
			break;
		case 'style8':
			$ppp = thb_roundUpToAny( $source_data['size'], 3 );
			break;
		case 'style9':
			$ppp = thb_roundUpToAny( $source_data['size'], 3 );
			break;
		case 'style10':
			$ppp = thb_roundUpToAny( $source_data['size'], 7 );
			break;
		case 'style11':
			$ppp = thb_roundUpToAny( $source_data['size'], 5 );
			break;
		case 'style12':
			$ppp = thb_roundUpToAny( $source_data['size'], 5 );
			break;
		case 'style13':
			$ppp = thb_roundUpToAny( $source_data['size'], 10 );
			break;
		case 'style14':
			$ppp = thb_roundUpToAny( $source_data['size'], 8 );
			break;
	}

	$element_id = uniqid( 'thb-blockgrid-' );

	$el_class[] = 'thb-blockgrid';
	$el_class[] = 'thb-blockgrid-' . $style;
	ob_start();

	?>
	<div class="<?php echo esc_attr( implode( ' ', $el_class ) ); ?>">
		<?php
			$ids = wp_list_pluck( $slider_posts->posts, 'ID' );
			thb_DisplayBlockGrid( $style, $ids, $ppp );
		?>
	</div>

	<?php
	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_blockgrid', 'thb_blockgrid' );
