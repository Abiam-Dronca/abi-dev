<?php

// Utilities
$thb_animation_array    = array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Animation', 'theissue' ),
	'param_name' => 'animation',
	'value'      => array(
		'None'               => '',
		'Right to Left'      => 'animation right-to-left',
		'Left to Right'      => 'animation left-to-right',
		'Right to Left - 3D' => 'animation right-to-left-3d',
		'Left to Right - 3D' => 'animation left-to-right-3d',
		'Bottom to Top'      => 'animation bottom-to-top',
		'Top to Bottom'      => 'animation top-to-bottom',
		'Bottom to Top - 3D' => 'animation bottom-to-top-3d',
		'Top to Bottom - 3D' => 'animation top-to-bottom-3d',
		'Scale'              => 'animation scale',
		'Fade'               => 'animation fade-in',
	),
);
$thb_column_array       = array(
	'1 Column'  => 'medium-12',
	'2 Columns' => 'medium-6',
	'3 Columns' => 'medium-4',
	'4 Columns' => 'medium-3',
	'5 Columns' => 'medium-1/5',
	'6 Columns' => 'medium-2',
);
$thb_button_style_array = array(
	'Style 1' => 'style1',
	'Style 2' => 'style2',
);
$thb_offset_array       = array(
	'-100%' => '-100%',
	'-95%'  => '-95%',
	'-90%'  => '-90%',
	'-85%'  => '-85%',
	'-80%'  => '-80%',
	'-75%'  => '-75%',
	'-70%'  => '-70%',
	'-65%'  => '-65%',
	'-60%'  => '-60%',
	'-55%'  => '-55%',
	'-50%'  => '-50%',
	'-45%'  => '-45%',
	'-40%'  => '-40%',
	'-35%'  => '-35%',
	'-30%'  => '-30%',
	'-25%'  => '-25%',
	'-20%'  => '-20%',
	'-15%'  => '-15%',
	'-10%'  => '-10%',
	'-5%'   => '-5%',
	'0%'    => '0%',
	'5%'    => '5%',
	'10%'   => '10%',
	'15%'   => '15%',
	'20%'   => '20%',
	'25%'   => '25%',
	'30%'   => '30%',
	'35%'   => '35%',
	'40%'   => '40%',
	'45%'   => '45%',
	'50%'   => '50%',
	'55%'   => '55%',
	'60%'   => '60%',
	'65%'   => '65%',
	'70%'   => '70%',
	'75%'   => '75%',
	'80%'   => '80%',
	'85%'   => '85%',
	'90%'   => '90%',
	'95%'   => '95%',
	'100%'  => '100%',
);
function thb_vc_gradient_direction( $group_name = 'Styling' ) {
	return array(
		'type'             => 'dropdown',
		'heading'          => esc_html__( 'Gradient Direction', 'theissue' ),
		'param_name'       => 'bg_gradient_direction',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'You can change the gradient direction here.', 'theissue' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
		'value'            => array(
			'Top to Bottom'            => '0',
			'Bottom Left to Top Right' => '-135',
			'Top Left to Bottom Right' => '-45',
			'Left to Right'            => '-90',
		),
		'std'              => '-135',
	);
}
function thb_vc_gradient_color1( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 1', 'theissue' ),
		'param_name'       => 'bg_gradient1',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a first (top) color for the background gradient. Leave blank to disable.', 'theissue' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color2( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 2', 'theissue' ),
		'param_name'       => 'bg_gradient2',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a second (bottom) color for the background gradient.', 'theissue' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color3( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 1', 'theissue' ),
		'param_name'       => 'bg_gradient3',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a first (top) color for the background gradient. Leave blank to disable.', 'theissue' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color4( $group_name = 'Styling' ) {
	return array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Gradient Color 2', 'theissue' ),
		'param_name'       => 'bg_gradient4',
		'class'            => 'hidden-label',
		'description'      => esc_html__( 'Choose a second (bottom) color for the background gradient.', 'theissue' ),
		'group'            => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

// Visual Composer ROW Changes
vc_remove_param( 'vc_row', 'full_width' );
vc_remove_param( 'vc_row', 'gap' );
vc_remove_param( 'vc_row', 'equal_height' );
vc_remove_param( 'vc_row', 'css_animation' );
vc_remove_param( 'vc_row', 'video_bg' );
vc_remove_param( 'vc_row', 'video_bg_url' );
vc_remove_param( 'vc_row', 'video_bg_parallax' );
vc_remove_param( 'vc_row', 'parallax_speed_video' );

vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Full Width', 'theissue' ),
		'param_name'  => 'thb_full_width',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this row will fill the screen', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable Row Padding', 'theissue' ),
		'param_name'  => 'thb_row_padding',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this row wont leave padding on the sides', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable Column Padding', 'theissue' ),
		'param_name'  => 'thb_column_padding',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, the columns inside wont leave padding on the sides', 'theissue' ),
	)
);

vc_add_param(
	'vc_row',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Video Background', 'theissue' ),
		'param_name'  => 'thb_video_bg',
		'weight'      => 1,
		'description' => esc_html__( 'You can specify a video background file here (mp4). Row Background Image will be used as Poster.', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Video Overlay Color', 'theissue' ),
		'param_name'  => 'thb_video_overlay_color',
		'weight'      => 1,
		'description' => esc_html__( 'If you want, you can select an overlay color.', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable AutoPlay', 'theissue' ),
		'param_name'  => 'thb_video_play_button',
		'weight'      => 1,
		'value'       => array(
			'Yes' => 'thb_video_play_button_enabled',
		),
		'description' => esc_html__( 'If enabled, the video wont start automatically and can be toggled using the Play Button Element.', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Display Scroll to Bottom Arrow?', 'theissue' ),
		'param_name'  => 'thb_scroll_bottom',
		'value'       => array(
			'Yes' => 'true',
		),
		'description' => esc_html__( 'If you enable this, this will show an arrow at the bottom of the row', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Scroll to Bottom Arrow Style', 'theissue' ),
		'param_name'  => 'thb_scroll_bottom_style',
		'value'       => array(
			'Line'     => 'style1',
			'Mouse'    => 'style2',
			'Arrow'    => 'style3',
			'Triangle' => 'style4',
		),
		'description' => esc_html__( 'This changes the shape of the arrow', 'theissue' ),
		'dependency'  => array(
			'element' => 'thb_scroll_bottom',
			'value'   => array( 'true' ),
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Scroll to Bottom Arrow Color', 'theissue' ),
		'param_name'  => 'thb_scroll_bottom_color',
		'value'       => array(
			'Dark'  => 'dark',
			'Light' => 'light',
		),
		'description' => esc_html__( 'Color of the scroll to bottom arrow', 'theissue' ),
		'dependency'  => array(
			'element' => 'thb_scroll_bottom',
			'value'   => array( 'true' ),
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'theissue' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
	)
);
vc_add_param( 'vc_row', thb_vc_gradient_color1( 'Overlay' ) );
vc_add_param( 'vc_row', thb_vc_gradient_color2( 'Overlay' ) );
vc_add_param( 'vc_row', thb_vc_gradient_direction( 'Overlay' ) );

vc_add_param(
	'vc_row',
	array(
		'type'       => 'checkbox',
		'group'      => esc_html__( 'Dividers', 'theissue' ),
		'heading'    => esc_html__( 'Enable Dividers?', 'theissue' ),
		'param_name' => 'thb_shape_divider',
		'value'      => array(
			'Yes' => 'true',
		),

	)
);
vc_add_param(
	'vc_row',
	array(
		'type'       => 'thb_radio_image',
		'heading'    => esc_html__( 'Divider Shape', 'theissue' ),
		'param_name' => 'divider_shape',
		'group'      => esc_html__( 'Dividers', 'theissue' ),
		'options'    => array(
			'curve'         => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/curve.png',
			'tilt_v2'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/tilt_v2.png',
			'tilt'          => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/tilt.png',
			'triangle'      => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/triangle.png',
			'waves_alt'     => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves_alt.png',
			'waves_v2'      => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves_v2.png',
			'waves'         => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves.png',
			'waves_opacity' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/waves_opacity.png',
			'cloud'         => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/dividers/cloud.png',
		),
		'dependency' => array(
			'element' => 'thb_shape_divider',
			'value'   => array( 'true' ),
		),
	)
);

vc_add_param(
	'vc_row',
	array(
		'type'       => 'colorpicker',
		'heading'    => esc_html__( 'Divider Color', 'theissue' ),
		'param_name' => 'thb_divider_color',
		'group'      => esc_html__( 'Dividers', 'theissue' ),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'       => 'colorpicker',
		'heading'    => esc_html__( 'Divider 2 Color', 'theissue' ),
		'param_name' => 'thb_divider_color_2',
		'group'      => esc_html__( 'Dividers', 'theissue' ),
		'dependency' => array(
			'element' => 'thb_divider_position',
			'value'   => array( 'both' ),
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Divider Position', 'theissue' ),
		'param_name' => 'thb_divider_position',
		'group'      => esc_html__( 'Dividers', 'theissue' ),
		'value'      => array(
			'Bottom' => 'bottom',
			'Top'    => 'top',
			'Both'   => 'both',
		),
	)
);
vc_add_param(
	'vc_row',
	array(
		'type'        => 'textfield',
		'group'       => esc_html__( 'Dividers', 'theissue' ),
		'heading'     => esc_html__( 'Divider Height', 'theissue' ),
		'param_name'  => 'thb_divider_height',
		'description' => esc_html__( 'Enter a custom height for your shape divider in pixels without the "px"', 'theissue' ),
	)
);

// Inner Row
vc_remove_param( 'vc_row_inner', 'gap' );
vc_remove_param( 'vc_row_inner', 'equal_height' );
vc_remove_param( 'vc_row_inner', 'css_animation' );

vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Max Width', 'theissue' ),
		'param_name'  => 'thb_max_width',
		'value'       => array(
			'Yes' => 'max_width',
		),
		'std'         => 'max_width',
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, the row wont exceed the max width, especially inside a full-width parent row.', 'theissue' ),
	)
);

vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Disable Column Padding', 'theissue' ),
		'param_name'  => 'thb_column_padding',
		'value'       => array(
			'Yes' => 'true',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, the columns inside wont leave padding on the sides', 'theissue' ),
	)
);
vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'theissue' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'theissue' ),
	)
);
vc_add_param(
	'vc_row_inner',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
	)
);
// Columns
vc_remove_param( 'vc_column', 'css_animation' );
vc_add_param(
	'vc_column',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Column Content Color', 'theissue' ),
		'param_name'  => 'thb_color',
		'value'       => array(
			'Dark'  => 'thb-dark-column',
			'Light' => 'thb-light-column',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you white-colored contents for this column, select Light.', 'theissue' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Fixed Content', 'theissue' ),
		'param_name'  => 'fixed',
		'value'       => array(
			'Yes' => 'thb-fixed',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this column will be fixed.', 'theissue' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Column Content Color', 'theissue' ),
		'param_name'  => 'thb_color',
		'value'       => array(
			'Dark'  => 'thb-dark-column',
			'Light' => 'thb-light-column',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you white-colored contents for this column, select Light.', 'theissue' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Fixed Content', 'theissue' ),
		'param_name'  => 'fixed',
		'value'       => array(
			'Yes' => 'thb-fixed',
		),
		'weight'      => 1,
		'description' => esc_html__( 'If you enable this, this column will be fixed.', 'theissue' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'theissue' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'theissue' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'theissue' ),
		'param_name'  => 'thb_border_radius',
		'weight'      => 1,
		'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'theissue' ),
	)
);
vc_add_param(
	'vc_column',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
	)
);
vc_add_param(
	'vc_column_inner',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
		'param_name'  => 'box_shadow',
		'value'       => array(
			'No Shadow' => '',
			'Small'     => 'small-shadow',
			'Medium'    => 'medium-shadow',
			'Large'     => 'large-shadow',
			'X-Large'   => 'xlarge-shadow',
		),
		'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
	)
);
vc_add_param( 'vc_column', $thb_animation_array );
vc_add_param( 'vc_column_inner', $thb_animation_array );

// Text Area
vc_remove_param( 'vc_column_text', 'css_animation' );
vc_add_param( 'vc_column_text', $thb_animation_array );

// Empty Space
vc_add_param(
	'vc_empty_space',
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Mobile Height', 'theissue' ),
		'param_name'  => 'mobile_height',
		'admin_label' => true,
		'value'       => '',
		'weight'      => 1,
		'description' => esc_html__( 'You can change the height in mobile devices', 'theissue' ),
	)
);

// Toggle Accordion
vc_map(
	array(
		'name'            => esc_html__( 'Toggle / Accordion', 'theissue' ),
		'base'            => 'thb_accordion',
		'icon'            => 'thb_vc_ico_accordion',
		'class'           => 'thb_vc_sc_accordion wpb_vc_accordion wpb_vc_tta_accordion',
		'as_parent'       => array(
			'only' => 'vc_tta_section',
		),
		'category'        => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'          => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Allow collapsible all', 'theissue' ),
				'param_name'  => 'accordion',
				'description' => esc_html__( 'Select checkbox to turn the toggles to an accordion.', 'theissue' ),
				'value'       => array( esc_html__( 'Yes', 'theissue' ) => 'true' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Style 1' => 'style1',
					'Style 2' => 'style3',
				),
			),
		),
		'description'     => esc_html__( 'Toggles or Accordions', 'theissue' ),
		'js_view'         => 'VcBackendTtaAccordionView',
		'custom_markup'   => '
	<div class="vc_tta-container" data-vc-action="collapseAll">
		<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
			 <div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
					<div class="vc_tta-panel vc_tta-section-append">
						 <div class="vc_tta-panel-heading">
								<h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
									 <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
											 <span class="vc_tta-title-text">' . esc_html__( 'Add Section', 'theissue' ) . '</span>
												<i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
										</a>
								</h4>
						 </div>
					</div>
			 </div>
		</div>
	</div>',
		'default_content' => '[vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'theissue' ), 1 ) . '"][/vc_tta_section][vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'theissue' ), 2 ) . '"][/vc_tta_section]',
	)
);

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Accordion' );

class WPBakeryShortCode_thb_accordion extends WPBakeryShortCode_VC_Tta_Accordion { }

// Author Grid
vc_map(
	array(
		'name'        => esc_html__( 'Author List', 'theissue' ),
		'base'        => 'thb_authorgrid',
		'icon'        => 'thb_vc_ico_authorgrid',
		'class'       => 'thb_vc_sc_authorgrid',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => $thb_column_array,
				'description' => esc_html__( 'Select the layout of the authors.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Author IDs', 'theissue' ),
				'param_name'  => 'author_ids',
				'description' => esc_html__( 'Enter the Author IDs you would like to display seperated by comma. Leave empty for all authors.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display your Authors in a grid layout.', 'theissue' ),
	)
);

// AutoType
vc_map(
	array(
		'base'        => 'thb_autotype',
		'name'        => esc_html__( 'Auto Type', 'theissue' ),
		'description' => esc_html__( 'Animated text typing', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'icon'        => 'thb_vc_ico_autotype',
		'class'       => 'thb_vc_sc_autotype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'theissue' ),
				'param_name'  => 'typed_text',
				'value'       => '<h2>Unleash creativity with the powerful tools of *The Issue;Your Custom Content*</h2>',
				'description' => '
			Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*The Issue; Your Custom Content*</strong>',
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Animated Text Color', 'theissue' ),
				'param_name'  => 'thb_animated_color',
				'description' => esc_html__( 'Uses the accent color by default', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Type Speed', 'theissue' ),
				'param_name'  => 'typed_speed',
				'description' => esc_html__( 'Speed of the type animation. Default is 50', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Show Cursor?', 'theissue' ),
				'param_name'  => 'cursor',
				'value'       => array(
					'Yes' => '1',
				),
				'std'         => '1',
				'description' => esc_html__( 'If enabled, the text will always animate, looping through the sentences used.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Loop?', 'theissue' ),
				'param_name'  => 'loop',
				'value'       => array(
					'Yes' => '1',
				),
				'description' => esc_html__( 'If enabled, the text will always animate, looping through the sentences used.', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Button', 'theissue' ),
		'base'        => 'thb_button',
		'icon'        => 'thb_vc_ico_button',
		'class'       => 'thb_vc_sc_button',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'value'       => $thb_button_style_array,
				'description' => esc_html__( 'This changes the look of the button', 'theissue' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Link', 'theissue' ),
				'param_name'       => 'link',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Set your url & text for your button', 'theissue' ),
				'admin_label'      => true,
			),
			array(
				'type'             => 'iconpicker',
				'heading'          => esc_html__( 'Icon', 'theissue' ),
				'param_name'       => 'icon',
				'edit_field_class' => 'vc_col-sm-6',
				'settings'         => array(
					'emptyIcon'    => true,
					'iconsPerPage' => 200,
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Use lightbox?', 'theissue' ),
				'param_name'       => 'lightbox',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If you want to show images or video links inside a lightbox, enable this.', 'theissue' ),
			),
			$thb_animation_array,
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Full Width', 'theissue' ),
				'param_name'       => 'full_width',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If enabled, this will make the button fill its container', 'theissue' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Size', 'theissue' ),
				'param_name'       => 'size',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'medium',
				'value'            => array(
					'Small'   => 'small',
					'Medium'  => 'medium',
					'Large'   => 'large',
					'X-Large' => 'x-large',
				),
				'description'      => esc_html__( 'This changes the size of the button', 'theissue' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color', 'theissue' ),
				'param_name'       => 'color',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'accent',
				'value'            => array(
					'Black'  => 'black',
					'White'  => 'white',
					'Accent' => 'accent',
				),
				'description'      => esc_html__( 'This changes the color of the button', 'theissue' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Border Radius', 'theissue' ),
				'param_name'       => 'border_radius',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'small-radius',
				'value'            => array(
					'None'  => 'no-radius',
					'Small' => 'small-radius',
					'Pill'  => 'pill-radius',
				),
				'description'      => esc_html__( 'This changes the border-radius of the button. Some styles may not have this future.', 'theissue' ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Add Shadow on Hover?', 'theissue' ),
				'param_name'       => 'thb_shadow',
				'group'            => 'Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'thb_shadow',
				),
				'description'      => esc_html__( 'If enabled, this will add a shadow to the button', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Add an animated button', 'theissue' ),
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Block Button', 'theissue' ),
		'base'        => 'thb_button_block',
		'icon'        => 'thb_vc_ico_button_block',
		'class'       => 'thb_vc_sc_button_block',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Background Image', 'theissue' ),
				'param_name' => 'image',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Set your url & text for your button', 'theissue' ),
				'admin_label' => true,
			),
			$thb_animation_array,
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'Css', 'theissue' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Add a block button with image', 'theissue' ),
	)
);

// Block Button
vc_map(
	array(
		'name'        => esc_html__( 'Text Button', 'theissue' ),
		'base'        => 'thb_button_text',
		'icon'        => 'thb_vc_ico_button_text',
		'class'       => 'thb_vc_sc_button_text',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/text_button_styles/style5.png',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'This changes the look of the button', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Set your url & text for your button', 'theissue' ),
				'admin_label' => true,
			),
			$thb_animation_array,
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description' => esc_html__( 'Add a text button', 'theissue' ),
	)
);

// Cascading Images
vc_map(
	array(
		'name'                    => esc_html__( 'Cascading Images', 'theissue' ),
		'base'                    => 'thb_cascading_parent',
		'icon'                    => 'thb_vc_ico_cascading',
		'class'                   => 'thb_vc_sc_cascading',
		'content_element'         => true,
		'show_settings_on_create' => false,
		'category'                => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_parent'               => array( 'only' => 'thb_cascading' ),
		'description'             => esc_html__( 'Insert a cascading Image', 'theissue' ),
		'js_view'                 => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'     => esc_html__( 'Single Image', 'theissue' ),
		'base'     => 'thb_cascading',
		'icon'     => 'thb_vc_ico_cascading',
		'class'    => 'thb_vc_sc_cascading',
		'category' => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_child' => array( 'only' => 'thb_cascading_parent' ),
		'params'   => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Image', 'theissue' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Select Image for the layer', 'theissue' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Offset X', 'theissue' ),
				'param_name' => 'image_x',
				'value'      => $thb_offset_array,
				'std'        => '0%',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Offset Y', 'theissue' ),
				'param_name' => 'image_y',
				'value'      => $thb_offset_array,
				'std'        => '0%',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Size?', 'theissue' ),
				'param_name'  => 'retina',
				'value'       => array(
					'Yes' => 'retina_size',
				),
				'description' => esc_html__( 'If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.', 'theissue' ),
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Add Border Radius?', 'theissue' ),
				'param_name'  => 'radius',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can add Border Radius in px value.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add Box Shadow?', 'theissue' ),
				'param_name'  => 'thb_box_shadow',
				'value'       => array(
					'Yes' => 'thb_box_shadow',
				),
				'group'       => 'Styling',
				'description' => esc_html__( 'You can add a Box Shadow to your image.', 'theissue' ),
			),
		),
	)
);

class WPBakeryShortCode_thb_cascading_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_cascading extends WPBakeryShortCode {}

// Category Links
vc_map(
	array(
		'name'        => esc_html__( 'Category Links', 'theissue' ),
		'base'        => 'thb_categorylinks',
		'icon'        => 'thb_vc_ico_categorylinks',
		'class'       => 'thb_vc_sc_categorylinks',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_titles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_titles/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_titles/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/category_titles/style4.png',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'This changes the style of the category titles', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Alignment', 'theissue' ),
				'param_name'  => 'alignment',
				'admin_label' => true,
				'value'       => array(
					'Center' => 'align-center',
					'Left'   => 'align-left',
				),
				'std'         => 'align-center',
				'description' => esc_html__( 'This changes the alignment of the category titles', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'Six Columns'   => '6',
					'Five Columns'  => '5',
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
					'One Column'    => '1',
				),
				'std'         => '3',
				'description' => esc_html__( 'Select the layout of the categories.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style3', 'style4' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Post Categories', 'theissue' ),
				'param_name'  => 'cat',
				'value'       => thb_blogCategories(),
				'description' => esc_html__( 'Which categories would you like to show?', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description' => esc_html__( 'Display a list of categories', 'theissue' ),
	)
);

// Clients Parent
vc_map(
	array(
		'name'            => esc_html__( 'Clients', 'theissue' ),
		'base'            => 'thb_clients_parent',
		'icon'            => 'thb_vc_ico_clients',
		'class'           => 'thb_vc_sc_clients',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_parent'       => array( 'only' => 'thb_clients' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'value'       => array(
					'Style 1 (Grid)'                 => 'style1',
					'Style 2 (Carousel)'             => 'thb-carousel',
					'Style 3 (Grid with Titles)'     => 'style3',
					'Style 4 (Grid with Titles - 2)' => 'style4',
				),
				'description' => esc_html__( 'This changes the layout style of the client logos', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'thb_columns',
				'admin_label' => true,
				'value'       => array(
					'2 Columns' => 'small-6 large-6',
					'3 Columns' => 'small-6 large-4',
					'4 Columns' => 'small-6 large-3',
					'5 Columns' => 'small-6 thb-5',
					'6 Columns' => 'small-6 large-2',
				),
			),
			$thb_animation_array,
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Image Borders', 'theissue' ),
				'param_name'  => 'thb_image_borders',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If you enable this, the logos will have border', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1', 'thb-carousel', 'style4' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Size?', 'theissue' ),
				'param_name'  => 'retina',
				'value'       => array(
					'Yes' => 'retina_size',
				),
				'description' => esc_html__( 'If selected, the image will be display half-size, so it looks crisps on retina screens.', 'theissue' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Border Color', 'theissue' ),
				'param_name'  => 'thb_border_color',
				'admin_label' => true,
				'value'       => '#f0f0f0',
				'dependency'  => array(
					'element' => 'thb_image_borders',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Hover Effect', 'theissue' ),
				'param_name'  => 'thb_hover_effect',
				'admin_label' => true,
				'value'       => array(
					'None'                      => '',
					'Opacity'                   => 'thb-opacity',
					'Grayscale'                 => 'thb-grayscale',
					'Opacity with Accent hover' => 'thb-opacity with-accent',
				),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1', 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description'     => esc_html__( 'Partner/Client logos', 'theissue' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Client', 'theissue' ),
		'base'        => 'thb_clients',
		'icon'        => 'thb_vc_ico_clients',
		'class'       => 'thb_vc_sc_clients',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_child'    => array( 'only' => 'thb_clients_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'theissue' ),
				'param_name'  => 'image',
				'value'       => '',
				'description' => esc_html__( 'Add logo image here.', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'admin_label' => true,
				'description' => esc_html__( 'Add a link to client website if desired.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Single Client', 'theissue' ),
	)
);
class WPBakeryShortCode_thb_clients_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_clients extends WPBakeryShortCode {}

// Contact Map
vc_map(
	array(
		'name'            => esc_html__( 'Contact Map Parent', 'theissue' ),
		'base'            => 'thb_map_parent',
		'icon'            => 'thb_vc_ico_contactmap',
		'class'           => 'thb_vc_sc_contactmap',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_parent'       => array( 'only' => 'thb_map' ),
		'params'          => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Map Height', 'theissue' ),
				'param_name'  => 'height',
				'admin_label' => true,
				'value'       => 50,
				'description' => __( 'Enter height of the map in vh (0-100). For example, 50 will be 50% of viewport height and 100 will be full height. <small>Make sure you have filled in your Google Maps API inside Appearance > Theme Options.</small>', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Expand Toggle', 'theissue' ),
				'param_name'  => 'expand',
				'admin_label' => true,
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, this will show an expand button on the map.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Map Position', 'theissue' ),
				'param_name'  => 'position',
				'admin_label' => true,
				'value'       => array(
					'Map on the Left'  => 'map_left',
					'Map on the Right' => 'map_right',
				),
				'std'         => 'map_left',
				'description' => esc_html__( 'This affects which side the map will grow.', 'theissue' ),
				'dependency'  => array(
					'element' => 'expand',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Map Zoom', 'theissue' ),
				'param_name'  => 'zoom',
				'value'       => '0',
				'description' => esc_html__( 'Set map zoom level. Leave 0 to automatically fit to bounds.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Map Controls', 'theissue' ),
				'param_name'  => 'map_controls',
				'std'         => 'panControl, zoomControl, mapTypeControl, scaleControl',
				'value'       => array(
					esc_html__( 'Pan Control', 'theissue' ) => 'panControl',
					esc_html__( 'Zoom Control', 'theissue' ) => 'zoomControl',
					esc_html__( 'Map Type Control', 'theissue' ) => 'mapTypeControl',
					esc_html__( 'Scale Control', 'theissue' ) => 'scaleControl',
					esc_html__( 'Street View Control', 'theissue' ) => 'streetViewControl',
				),
				'description' => esc_html__( 'Toggle map options.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Map Type', 'theissue' ),
				'param_name'  => 'map_type',
				'std'         => 'roadmap',
				'value'       => array(
					esc_html__( 'Roadmap', 'theissue' )   => 'roadmap',
					esc_html__( 'Satellite', 'theissue' ) => 'satellite',
					esc_html__( 'Hybrid', 'theissue' )    => 'hybrid',
				),
				'description' => esc_html__( 'Choose map style.', 'theissue' ),
			),
			array(
				'type'        => 'textarea_raw_html',
				'heading'     => esc_html__( 'Map Style', 'theissue' ),
				'param_name'  => 'map_style',
				'description' => sprintf(
					/* translators: %1$s: link */
					esc_html__( 'Paste the style code here. Browse map styles in %1$sSnazzyMaps%2$s', 'theissue' ),
					'<a href="https://snazzymaps.com/" target="_blank">',
					'</a>'
				),
			),
		),
		'description'     => esc_html__( 'Insert your Contact Map', 'theissue' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'     => esc_html__( 'Contact Map Location', 'theissue' ),
		'base'     => 'thb_map',
		'icon'     => 'thb_vc_ico_contactmap',
		'class'    => 'thb_vc_sc_contactmap',
		'category' => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_child' => array( 'only' => 'thb_map_parent' ),
		'params'   => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Marker Image', 'theissue' ),
				'param_name'  => 'marker_image',
				'description' => esc_html__( 'Add your Custom marker image or use default one.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Marker', 'theissue' ),
				'param_name'  => 'retina_marker',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'yes',
				),
				'description' => esc_html__( 'Enabling this option will reduce the size of marker for 50%, example if marker is 32x32 it will be 16x16.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Latitude', 'theissue' ),
				'admin_label' => true,
				'param_name'  => 'latitude',
				'description' => sprintf(
					/* translators: %1$s: link */
					esc_html__( 'Enter latitude coordinate. To select map coordinates %1$sclick here%2$s.', 'theissue' ),
					'<a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">',
					'</a>'
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Longitude', 'theissue' ),
				'admin_label' => true,
				'param_name'  => 'longitude',
				'description' => esc_html__( 'Enter longitude coordinate.', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Marker Title', 'theissue' ),
				'param_name' => 'marker_title',
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__( 'Marker Description', 'theissue' ),
				'param_name' => 'marker_description',
			),
		),
	)
);

class WPBakeryShortCode_thb_map_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_map extends WPBakeryShortCode {}

// Content Carousel Shortcode
vc_map(
	array(
		'name'                    => esc_html__( 'Content Carousel', 'theissue' ),
		'base'                    => 'thb_content_carousel',
		'icon'                    => 'thb_vc_ico_content_carousel',
		'class'                   => 'thb_vc_sc_content_carousel',
		'as_parent'               => array( 'except' => 'thb_content_carousel' ),
		'category'                => esc_html__( 'by Fuel Themes', 'theissue' ),
		'show_settings_on_create' => true,
		'content_element'         => true,
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'thb_columns',
				'value'       => $thb_column_array,
				'description' => esc_html__( 'Select the layout.', 'theissue' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Display Slider Pagination', 'theissue' ),
				'param_name' => 'thb_pagination',
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Margins between items', 'theissue' ),
				'param_name'  => 'thb_margins',
				'group'       => 'Styling',
				'std'         => 'regular-padding',
				'value'       => array(
					'Regular' => 'regular-padding',
					'Mini'    => 'mini-padding',
					'Pixel'   => 'pixel-padding',
					'None'    => 'no-padding',
				),
				'description' => esc_html__( 'This will change the margins between items', 'theissue' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Overflow Visible?', 'theissue' ),
				'param_name' => 'thb_overflow',
				'value'      => array(
					'Yes' => 'overflow-visible-only',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'js_view'                 => 'VcColumnView',
		'description'             => esc_html__( 'Display your content in a carousel', 'theissue' ),
	)
);

class WPBakeryShortCode_Thb_Content_Carousel extends WPBakeryShortCodesContainer { }


// Counter shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Counter', 'theissue' ),
		'base'        => 'thb_counter',
		'icon'        => 'thb_vc_ico_counter',
		'class'       => 'thb_vc_sc_counter',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'theissue' ),
				'param_name' => 'style',
				'std'        => 'counter-style1',
				'value'      => array(
					'Counter Top'           => 'counter-style1',
					'Counter Top - Style 2' => 'counter-style4',
					'Counter Top - Style 3' => 'counter-style5',
					'Counter Below'         => 'counter-style3',
					'Counter Side'          => 'counter-style2',

				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'theissue' ),
				'param_name' => 'icon',
				'value'      => thb_getIconarray(),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style3' ),
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'theissue' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style3' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'theissue' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style3' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Alignment', 'theissue' ),
				'param_name' => 'alignment',
				'value'      => array(
					'Left'  => 'thb-side left',
					'Right' => 'thb-side right',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'counter-style2' ),
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Counter Color', 'theissue' ),
				'param_name' => 'thb_counter_color',
				'group'      => 'Styling',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Icon Color', 'theissue' ),
				'param_name' => 'thb_icon_color',
				'group'      => 'Styling',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Heading Color', 'theissue' ),
				'param_name' => 'thb_heading_color',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number to Count', 'theissue' ),
				'param_name'  => 'counter',
				'admin_label' => true,
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Thousands Separator', 'theissue' ),
				'param_name'  => 'thousand_separator',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'You can disable the thousand separator for ex: 1,999', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Separator Format', 'theissue' ),
				'param_name'  => 'thousand_separator_format',
				'std'         => '(,ddd).dd',
				'description' => esc_html__( 'You can change the thousands separator format. More info at https://github.hubspot.com/odometer/#format', 'theissue' ),
				'dependency'  => array(
					'element' => 'thousand_separator',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Text next to counter', 'theissue' ),
				'param_name'  => 'counter_text',
				'description' => esc_html__( 'You can append text after the counter, like %', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'counter-style1', 'counter-style4', 'counter-style5' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the counter animation', 'theissue' ),
				'param_name'  => 'speed',
				'value'       => '2000',
				'description' => esc_html__( 'Speed of the counter animation, default 1500', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading', 'theissue' ),
				'param_name'  => 'heading',
				'admin_label' => true,
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Description', 'theissue' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Include a small description for this counter', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Counters with icons', 'theissue' ),
	)
);

// Countdown shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Event Countdown', 'theissue' ),
		'base'        => 'thb_countdown',
		'icon'        => 'thb_vc_ico_event_countdown',
		'class'       => 'thb_vc_sc_event_countdown',
		'description' => esc_html__( 'Countdown module for your events.', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Upcoming Event Date', 'theissue' ),
				'param_name'  => 'date',
				'admin_label' => true,
				'value'       => '12/24/2016 12:00:00',
				'description' => esc_html__( 'Enter the due date for Event. eg : 12/24/2018 12:00:00 => month/day/year hour:minute:second', 'theissue' ),
			),
			array(
				'heading'    => esc_html__( 'UTC Timezone', 'theissue' ),
				'type'       => 'dropdown',
				'param_name' => 'offset',
				'value'      => array(
					'-12' => '-12',
					'-11' => '-11',
					'-10' => '-10',
					'-9'  => '-9',
					'-8'  => '-8',
					'-7'  => '-7',
					'-6'  => '-6',
					'-5'  => '-5',
					'-4'  => '-4',
					'-3'  => '-3',
					'-2'  => '-2',
					'-1'  => '-1',
					'0'   => '0',
					'+1'  => '+1',
					'+2'  => '+2',
					'+3'  => '+3',
					'+4'  => '+4',
					'+5'  => '+5',
					'+6'  => '+6',
					'+7'  => '+7',
					'+8'  => '+8',
					'+9'  => '+9',
					'+10' => '+10',
					'+12' => '+12',
				),
			),
		),
	)
);

// Fade Type
vc_map(
	array(
		'base'        => 'thb_fadetype',
		'name'        => esc_html__( 'Fade Type', 'theissue' ),
		'description' => esc_html__( 'Faded letter typing', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'icon'        => 'thb_vc_ico_fadetype',
		'class'       => 'thb_vc_sc_fadetype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'theissue' ),
				'param_name'  => 'fade_text',
				'value'       => '<h2>*Unleash creativity with the powerful tools of The Issue, Your Custom Contents*</h2>',
				'description' => 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. ',
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Animation Styles', 'theissue' ),
				'param_name'  => 'style',
				'value'       => array(
					'Linear, from bottom'  => 'style1',
					'Randomized, from top' => 'style2',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'This changes style of the animation', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

// Flip Box shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Flip Box', 'theissue' ),
		'base'        => 'thb_flipbox',
		'icon'        => 'thb_vc_ico_flipbox',
		'class'       => 'thb_vc_sc_flipbox',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'theissue' ),
				'param_name' => 'icon_front',
				'value'      => thb_getIconarray(),
				'group'      => esc_html__( 'Front Side', 'theissue' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'theissue' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'theissue' ),
				'group'       => esc_html__( 'Front Side', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'theissue' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'theissue' ),
				'group'       => esc_html__( 'Front Side', 'theissue' ),
			),
			array(
				'type'       => 'textarea_safe',
				'heading'    => esc_html__( 'Content', 'theissue' ),
				'param_name' => 'front_content',
				'group'      => esc_html__( 'Front Side', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Content Color', 'theissue' ),
				'param_name'  => 'front_text_color',
				'value'       => array(
					'Dark'  => 'dark',
					'Light' => 'light',
				),
				'description' => esc_html__( 'If you want white-colored contents for this side, select Light.', 'theissue' ),
				'group'       => esc_html__( 'Front Side', 'theissue' ),
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Background Image', 'theissue' ),
				'param_name' => 'front_bg_image',
				'group'      => esc_html__( 'Front Side', 'theissue' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'theissue' ),
				'param_name' => 'icon_back',
				'value'      => thb_getIconarray(),
				'group'      => esc_html__( 'Back Side', 'theissue' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'theissue' ),
				'param_name'  => 'icon_image_back',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'theissue' ),
				'group'       => esc_html__( 'Back Side', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'theissue' ),
				'param_name'  => 'icon_image_back_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'theissue' ),
				'group'       => esc_html__( 'Back Side', 'theissue' ),
			),
			array(
				'type'       => 'textarea_safe',
				'heading'    => esc_html__( 'Back Content', 'theissue' ),
				'param_name' => 'back_content',
				'group'      => esc_html__( 'Back Side', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Content Color', 'theissue' ),
				'param_name'  => 'back_text_color',
				'value'       => array(
					'Dark'  => 'dark',
					'Light' => 'light',
				),
				'description' => esc_html__( 'If you want white-colored contents for this side, select Light.', 'theissue' ),
				'group'       => esc_html__( 'Back Side', 'theissue' ),
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Background Image', 'theissue' ),
				'param_name' => 'back_bg_image',
				'group'      => esc_html__( 'Back Side', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Direction', 'theissue' ),
				'param_name'  => 'direction',
				'value'       => array(
					'Horizontal' => 'thb-flip-horizontal',
					'Vertical'   => 'thb-flip-vertical',
				),
				'std'         => 'thb-flip-horizontal',
				'description' => esc_html__( 'You can change the direction of the flipbox here.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Min Height', 'theissue' ),
				'param_name'  => 'min_height',
				'description' => esc_html__( 'Please enter the minimum height you would like for you box. Enter in number of pixels - Do not enter "px", default is "300"', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Add a link to your flipbox.', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description' => esc_html__( 'Add a Flip Box', 'theissue' ),
	)
);
vc_add_param( 'thb_flipbox', thb_vc_gradient_color1( 'Front Side' ) );
vc_add_param( 'thb_flipbox', thb_vc_gradient_color2( 'Front Side' ) );
vc_add_param( 'thb_flipbox', thb_vc_gradient_color3( 'Back Side' ) );
vc_add_param( 'thb_flipbox', thb_vc_gradient_color4( 'Back Side' ) );

/* Food Menu Item */
vc_map(
	array(
		'name'        => esc_html__( 'Food Menu Item', 'theissue' ),
		'base'        => 'thb_menu_item',
		'icon'        => 'thb_vc_ico_menu_item',
		'class'       => 'thb_vc_sc_menu_item',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this food item', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Price', 'theissue' ),
				'param_name'  => 'price',
				'description' => esc_html__( 'Price of this food item.', 'theissue' ),
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Description', 'theissue' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Include a small description for this food item.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Add a food menu item', 'theissue' ),
	)
);

// Free Scroll
vc_map(
	array(
		'name'        => esc_html__( 'Free Scroll', 'theissue' ),
		'base'        => 'thb_freescroll',
		'icon'        => 'thb_vc_ico_freescroll',
		'class'       => 'thb_vc_sc_freescroll',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Type', 'theissue' ),
				'param_name'  => 'type',
				'admin_label' => true,
				'std'         => 'images',
				'value'       => array(
					'Images'          => 'images',
					'Text'            => 'text',
					'Blog Posts'      => 'blog-posts',
					'Blog Categories' => 'blog-categories',
				),
				'description' => esc_html__( 'This changes the size of the button', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Direction', 'theissue' ),
				'param_name'  => 'direction',
				'std'         => 'thb-right-to-left',
				'value'       => array(
					'Right to Left' => 'thb-right-to-left',
					'Left to Right' => 'thb-left-to-right',
				),
				'description' => esc_html__( 'This changes the direction of the scroll.', 'theissue' ),
				'group'       => esc_html__( 'Settings', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Pause on Hover', 'theissue' ),
				'param_name'  => 'pause_on_hover',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'If enabled, the scrolling will stop on link_hover_sound', 'theissue' ),
				'group'       => esc_html__( 'Settings', 'theissue' ),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Text Content', 'theissue' ),
				'param_name'  => 'text_content',
				'description' => esc_html__( 'Enter text to scroll here', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'text' ),
				),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'blog-posts', 'products' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Post Categories', 'theissue' ),
				'param_name'  => 'cat',
				'value'       => thb_blogCategories(),
				'description' => esc_html__( 'Which categories would you like to show?', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'blog-categories' ),
				),
			),
			array(
				'type'       => 'attach_images',
				'heading'    => esc_html__( 'Select Images', 'theissue' ),
				'param_name' => 'images',
				'dependency' => array(
					'element' => 'type',
					'value'   => array( 'images' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use lightbox?', 'theissue' ),
				'param_name'  => 'lightbox',
				'value'       => array(
					'Yes' => 'mfp-gallery',
				),
				'description' => esc_html__( 'If you want to link your images to a lightbox, enable this.', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'images' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
				'param_name'  => 'box_shadow',
				'value'       => array(
					'No Shadow' => '',
					'Small'     => 'small-shadow',
					'Medium'    => 'medium-shadow',
					'Large'     => 'large-shadow',
					'X-Large'   => 'xlarge-shadow',
				),
				'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'images' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'thb_columns',
				'value'       => array(
					'Single Column' => 'small-12',
					'Two Columns'   => 'small-12 medium-6',
					'Three Columns' => 'small-12 medium-4',
					'Four Columns'  => 'small-12 medium-3',
					'Five Columns'  => 'small-12 thb-5',
				),
				'description' => esc_html__( 'Select the layout.', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'images', 'blog-posts' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Margins between items', 'theissue' ),
				'param_name'  => 'thb_margins',
				'std'         => 'regular-padding',
				'value'       => array(
					'Regular' => 'regular-padding',
					'Mini'    => 'mini-padding',
					'Pixel'   => 'pixel-padding',
					'None'    => 'no-padding',
				),
				'description' => esc_html__( 'This will change the margins between items', 'theissue' ),
				'dependency'  => array(
					'element' => 'type',
					'value'   => array( 'images', 'blog-posts', 'portfolios' ),
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
				'group'      => esc_html__( 'Settings', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Marquee your content', 'theissue' ),
	)
);

// Gradient Type
vc_map(
	array(
		'base'        => 'thb_gradienttype',
		'name'        => esc_html__( 'Gradient Type', 'theissue' ),
		'description' => esc_html__( 'Text with Gradient Color', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'icon'        => 'thb_vc_ico_gradienttype',
		'class'       => 'thb_vc_sc_gradienttype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'theissue' ),
				'param_name'  => 'gradient_text',
				'value'       => '<h2>Unleash creativity with the powerful tools of The Issue, Your Custom Content</h2>',
				'description' => 'Enter the content to display with gradient.',
				'admin_label' => true,
			),
			$thb_animation_array,
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
	)
);
vc_add_param( 'thb_gradienttype', thb_vc_gradient_color1() );
vc_add_param( 'thb_gradienttype', thb_vc_gradient_color2() );

// Horizontal List
vc_map(
	array(
		'name'        => esc_html__( 'Horizontal List', 'theissue' ),
		'base'        => 'thb_horizontal_list',
		'icon'        => 'thb_vc_ico_horizontal_list',
		'class'       => 'thb_vc_sc_horizontal_list',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Layout', 'theissue' ),
				'param_name' => 'thb_columns',
				'value'      => array(
					'Single Column' => '1',
					'2 Columns'     => '2',
					'3 Columns'     => '3',
					'4 Columns'     => '4',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Sizes', 'theissue' ),
				'param_name' => 'columns_2_size',
				'value'      => array(
					'50% | 50%' => '',
					'80% | 20%' => 'size2_80_20',
					'70% | 30%' => 'size2_70_30',
					'60% | 40%' => 'size2_60_40',
					'40% | 60%' => 'size2_40_60',
					'30% | 70%' => 'size2_30_70',
					'20% | 80%' => 'size2_20_80',
				),
				'dependency' => array(
					'element' => 'thb_columns',
					'value'   => array( '2' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Sizes', 'theissue' ),
				'param_name' => 'columns_3_size',
				'value'      => array(
					'33% | 33% | 33%' => '',
					'20% | 40% | 40%' => 'size3_20_40_40',
					'50% | 25% | 25%' => 'size3_50_25_25',
					'25% | 50% | 25%' => 'size3_25_50_25',
					'25% | 25% | 50%' => 'size3_25_25_50',
				),
				'dependency' => array(
					'element' => 'thb_columns',
					'value'   => array( '3' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Column Sizes', 'theissue' ),
				'param_name' => 'columns_4_size',
				'value'      => array(
					'25% | 25% | 25% | 25%' => '',
					'15% | 35% | 35% | 15%' => 'size4_15_35_35_15',
					'35% | 35% | 15% | 15%' => 'size4_35_35_15_15',
					'35% | 15% | 35% | 15%' => 'size4_35_15_35_15',
					'15% | 35% | 15% | 35%' => 'size4_15_35_15_35',
				),
				'dependency' => array(
					'element' => 'thb_columns',
					'value'   => array( '4' ),
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => sprintf( esc_html__( 'Text Alignment %s', 'theissue' ), '<span class="thb-row-heading">Column 1</span>' ),
				'param_name'       => 'column_1_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => '<span class="thb-row-heading">Column 2</span>',
				'param_name'       => 'column_2_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'dependency'       => array(
					'element' => 'thb_columns',
					'value'   => array( '2', '3', '4' ),
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => '<span class="thb-row-heading">Column 3</span>',
				'param_name'       => 'column_3_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'dependency'       => array(
					'element' => 'thb_columns',
					'value'   => array( '3', '4' ),
				),
			),
			array(
				'type'             => 'dropdown',
				'edit_field_class' => 'vc_col-sm-3',
				'heading'          => '<span class="thb-row-heading">Column 4</span>',
				'param_name'       => 'column_4_align',
				'value'            => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'dependency'       => array(
					'element' => 'thb_columns',
					'value'   => array( '4' ),
				),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 1 Content', 'theissue' ),
				'param_name'  => 'column_1_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'theissue' ),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 2 Content', 'theissue' ),
				'param_name'  => 'column_2_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_columns',
					'value'   => array( '2', '3', '4' ),
				),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 3 Content', 'theissue' ),
				'param_name'  => 'column_3_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_columns',
					'value'   => array( '3', '4' ),
				),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Column 4 Content', 'theissue' ),
				'param_name'  => 'column_4_content',
				'admin_label' => true,
				'description' => esc_html__( 'Enter your column text here', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_columns',
					'value'   => array( '4' ),
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Full Link URL', 'theissue' ),
				'param_name'  => 'url',
				'description' => esc_html__( 'Adding an URL for this will link your entire list item', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Color', 'theissue' ),
				'param_name'  => 'hover_color',
				'description' => esc_html__( 'Hover Color for this item', 'theissue' ),
				'group'       => 'Styling',
			),
			$thb_animation_array,
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'value'       => $thb_button_style_array,
				'description' => esc_html__( 'This changes the look of the button', 'theissue' ),
				'group'       => 'CTA Buttons',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Add Arrow', 'theissue' ),
				'param_name'       => 'add_arrow',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If enabled, will show an arrow on hover.', 'theissue' ),
				'dependency'       => array(
					'element' => 'style',
					'value'   => array( 'style1', 'style2', 'style3', 'style4' ),
				),
				'group'            => 'CTA Buttons',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'CTA Button 1', 'theissue' ),
				'param_name'  => 'cta_1',
				'description' => esc_html__( 'If you want to display a CTA button. Buttons are added to the last column.', 'theissue' ),
				'group'       => 'CTA Buttons',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'CTA Button 2', 'theissue' ),
				'param_name'  => 'cta_2',
				'description' => esc_html__( 'If you want to display another CTA button. Buttons are added to the last column.', 'theissue' ),
				'group'       => 'CTA Buttons',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Full Width', 'theissue' ),
				'param_name'       => 'full_width',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'value'            => array(
					'Yes' => 'true',
				),
				'description'      => esc_html__( 'If enabled, this will make the button fill its container', 'theissue' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Size', 'theissue' ),
				'param_name'       => 'size',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'medium',
				'value'            => array(
					'Small'   => 'small',
					'Medium'  => 'medium',
					'Large'   => 'large',
					'X-Large' => 'x-large',
				),
				'description'      => esc_html__( 'This changes the size of the button', 'theissue' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color', 'theissue' ),
				'param_name'       => 'color',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'accent',
				'value'            => array(
					'Black'    => 'black',
					'White'    => 'white',
					'Accent'   => 'accent',
					'Gradient' => 'gradient',
				),
				'description'      => esc_html__( 'This changes the color of the button', 'theissue' ),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Border Radius', 'theissue' ),
				'param_name'       => 'border_radius',
				'group'            => 'CTA Styling',
				'edit_field_class' => 'vc_col-sm-6',
				'std'              => 'small-radius',
				'value'            => array(
					'None'  => 'no-radius',
					'Small' => 'small-radius',
					'Pill'  => 'pill-radius',
				),
				'description'      => esc_html__( 'This changes the border-radius of the button. Some styles may not have this future.', 'theissue' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'See-Through Color for Gradients', 'theissue' ),
				'param_name'  => 'st_color',
				'group'       => 'CTA Styling',
				'description' => esc_html__( 'Some Gradient colors have white placeholders to mimick transparency. You can change this color depending on your background color.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Show your data in a horizontal list', 'theissue' ),
	)
);
vc_add_param( 'thb_horizontal_list', thb_vc_gradient_color1( 'CTA Styling' ) );
vc_add_param( 'thb_horizontal_list', thb_vc_gradient_color2( 'CTA Styling' ) );

// VC Gallery
vc_remove_param( 'vc_gallery', 'type' );
vc_remove_param( 'vc_gallery', 'title' );
vc_remove_param( 'vc_gallery', 'interval' );
vc_remove_param( 'vc_gallery', 'onclick' );
vc_remove_param( 'vc_gallery', 'source' );
vc_remove_param( 'vc_gallery', 'custom_srcs' );
vc_remove_param( 'vc_gallery', 'css_animation' );
vc_remove_param( 'vc_gallery', 'custom_links' );
vc_remove_param( 'vc_gallery', 'custom_links_target' );

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Gallery type', 'theissue' ),
		'param_name'  => 'gallery_type',
		'value'       => array(
			esc_html__( 'Regular Grid', 'theissue' ) => 'grid',
			esc_html__( 'Masonry Grid', 'theissue' ) => 'thb-portfolio',
		),
		'weight'      => 1,
		'description' => esc_html__( 'Select gallery style. If you are using Masonry Grid, you can set individual image sizes inside "Attachment Details > Masonry Size" when adding them to your gallery.', 'theissue' ),
	)
);

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'theissue' ),
		'param_name'  => 'thb_columns',
		'admin_label' => true,
		'value'       => array(
			'2 Columns' => 'small-6 large-6',
			'3 Columns' => 'small-6 large-4',
			'4 Columns' => 'small-6 large-3',
			'5 Columns' => 'small-6 thb-5',
			'6 Columns' => 'small-6 large-2',
		),
		'weight'      => 1,
		'dependency'  => array(
			'element' => 'gallery_type',
			'value'   => array( 'grid', 'thb-portfolio' ),
		),
	)
);

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Margins between items', 'theissue' ),
		'param_name'  => 'thb_margins',
		'group'       => 'Styling',
		'std'         => 'regular-padding',
		'value'       => array(
			'Regular' => 'regular-padding',
			'Mini'    => 'mini-padding',
			'Pixel'   => 'pixel-padding',
			'None'    => 'no-padding',
		),
		'weight'      => 1,
		'description' => esc_html__( 'This will change the margins between items', 'theissue' ),
	)
);

vc_add_param(
	'vc_gallery',
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Use lightbox?', 'theissue' ),
		'param_name'  => 'lightbox',
		'weight'      => 1,
		'value'       => array(
			'Yes' => 'mfp-gallery',
		),
		'description' => esc_html__( 'Images will link to their large versions using Lightbox.', 'theissue' ),
	)
);

vc_add_param( 'vc_gallery', $thb_animation_array );

// Iconbox
vc_map(
	array(
		'name'        => esc_html__( 'Iconbox', 'theissue' ),
		'base'        => 'thb_iconbox',
		'icon'        => 'thb_vc_ico_iconbox',
		'class'       => 'thb_vc_sc_iconbox',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Type', 'theissue' ),
				'param_name' => 'type',
				'value'      => array(
					'Top Icon - Line after icon'   => 'top type1',
					'Top Icon - Line after title'  => 'top type2',
					'Top Icon - Regular'           => 'top type3',
					'Top Icon - Border Around'     => 'top type4',
					'Top Icon - Border Top'        => 'top type5',
					'Top Icon - Border Around - 2' => 'top type6',
					'Left Icon - Style 1'          => 'left type1',
					'Left Icon - Style 2'          => 'left type2',
					'Right Icon - Style 1'         => 'right type1',
					'Right Icon - Style 2'         => 'right type2',
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Alignment', 'theissue' ),
				'param_name' => 'alignment',
				'value'      => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
					'Right'  => 'text-right',
				),
				'std'        => 'text-center',
				'dependency' => array(
					'element' => 'type',
					'value'   => array( 'top type1', 'top type2', 'top type3', 'top type4', 'top type5', 'top type6' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'theissue' ),
				'param_name' => 'icon',
				'value'      => thb_getIconarray(),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'theissue' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'theissue' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Add a link to the iconbox if desired.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Read More Style', 'theissue' ),
				'param_name'  => 'style',
				'value'       => array(
					'Style 1 (Line Left)'         => 'style1',
					'Style 2 (Line Bottom)'       => 'style2',
					'Style 3 (Arrow Left)'        => 'style3',
					'Style 4 (Arrow Right)'       => 'style4',
					'Style 5 (Arrow Right Small)' => 'style5',
				),
				'std'         => 'style5',
				'description' => esc_html__( 'This changes the look of the read more text', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading', 'theissue' ),
				'param_name'  => 'heading',
				'admin_label' => true,
				'group'       => 'Content',
			),
			array(
				'type'       => 'textarea_safe',
				'heading'    => esc_html__( 'Content', 'theissue' ),
				'param_name' => 'description',
				'group'      => 'Content',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Border Color for Style 5', 'theissue' ),
				'param_name' => 'thb_border_color',
				'group'      => 'Styling',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'SVG Icon Color', 'theissue' ),
				'param_name' => 'thb_icon_color',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Heading Color', 'theissue' ),
				'param_name'  => 'thb_heading_color',
				'group'       => 'Styling',
				'description' => esc_html__( 'Color of the heading', 'theissue' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text Color', 'theissue' ),
				'param_name'  => 'thb_text_color',
				'group'       => 'Styling',
				'description' => esc_html__( 'Color of the text', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading Font Size', 'theissue' ),
				'param_name'  => 'heading_font_size',
				'group'       => 'Styling',
				'description' => esc_html__( 'Enter any valid font-size: 16px, 14pt, etc.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Content Font Size', 'theissue' ),
				'param_name'  => 'description_font_size',
				'group'       => 'Styling',
				'description' => esc_html__( 'Enter any valid font-size: 16px, 14pt, etc.', 'theissue' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Hover SVG Icon Color', 'theissue' ),
				'param_name' => 'thb_icon_color_hover',
				'group'      => 'Hover Styling',
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Hover Image As Icon', 'theissue' ),
				'param_name'  => 'icon_image_hover',
				'description' => esc_html__( 'If you are using an image, you can set an hover image.', 'theissue' ),
				'group'       => 'Hover Styling',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Heading Color', 'theissue' ),
				'param_name'  => 'thb_heading_color_hover',
				'group'       => 'Hover Styling',
				'description' => esc_html__( 'Color of the heading', 'theissue' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Hover Text Color', 'theissue' ),
				'param_name'  => 'thb_text_color_hover',
				'group'       => 'Hover Styling',
				'description' => esc_html__( 'Color of the text', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Animation', 'theissue' ),
				'param_name'  => 'animation',
				'value'       => array(
					'Yes' => 'true',
				),
				'weight'      => 1,
				'std'         => 'true',
				'group'       => 'Animation',
				'description' => esc_html__( 'You can disable animation if you like.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Animation Speed', 'theissue' ),
				'param_name'  => 'animation_speed',
				'value'       => '1.5',
				'group'       => 'Animation',
				'description' => esc_html__( 'Speed of the animation in seconds', 'theissue' ),
				'dependency'  => array(
					'element' => 'animation',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description' => esc_html__( 'Iconboxes with different animations', 'theissue' ),
	)
);

// Icon List
vc_map(
	array(
		'name'        => esc_html__( 'Icon List', 'theissue' ),
		'base'        => 'thb_iconlist',
		'icon'        => 'thb_vc_ico_iconlist',
		'class'       => 'thb_vc_sc_iconlist',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'theissue' ),
				'param_name' => 'icon',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'fontawesome',
					'iconsPerPage' => 200,
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Icon Color', 'theissue' ),
				'param_name' => 'thb_icon_color',
				'group'      => 'Styling',
			),
			$thb_animation_array,
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Text Color', 'theissue' ),
				'param_name' => 'thb_text_color',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'exploded_textarea',
				'heading'     => esc_html__( 'List Content', 'theissue' ),
				'param_name'  => 'list_content',
				'admin_label' => true,
				'description' => esc_html__( 'Each line will be considered a list item as well as commas.', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description' => esc_html__( 'Display a list with icons', 'theissue' ),
	)
);

// Image shortcode
vc_map(
	array(
		'name'        => 'Image',
		'base'        => 'thb_image',
		'icon'        => 'thb_vc_ico_image',
		'class'       => 'thb_vc_sc_image wpb_vc_single_image',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Select Image', 'theissue' ),
				'param_name' => 'image',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Caption?', 'theissue' ),
				'param_name'  => 'caption',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If selected, the image caption will be displayed.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Caption Style', 'theissue' ),
				'param_name'  => 'caption_style',
				'value'       => array(
					'Style1' => 'style1',
					'Style2' => 'style2',
				),
				'description' => esc_html__( 'Select caption style.', 'theissue' ),
				'dependency'  => array(
					'element' => 'caption',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Text Below Image', 'theissue' ),
				'param_name' => 'content',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Retina Size?', 'theissue' ),
				'param_name'  => 'retina',
				'value'       => array(
					'Yes' => 'retina_size',
				),
				'description' => esc_html__( 'If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Full Width?', 'theissue' ),
				'param_name'  => 'full_width',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If selected, the image will always fill its container', 'theissue' ),
			),
			$thb_animation_array,
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image size', 'theissue' ),
				'param_name'  => 'img_size',
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image alignment', 'theissue' ),
				'param_name'  => 'alignment',
				'value'       => array(
					'Align left'   => 'alignleft',
					'Align right'  => 'alignright',
					'Align center' => 'aligncenter',
					'Align None'   => 'alignnone',
				),
				'description' => esc_html__( 'Select image alignment.', 'theissue' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Link to Full-Width Image?', 'theissue' ),
				'param_name' => 'lightbox',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Image link', 'theissue' ),
				'param_name'  => 'img_link',
				'description' => esc_html__( 'Enter url if you want this image to have link.', 'theissue' ),
				'dependency'  => array(
					'element'  => 'lightbox',
					'is_empty' => true,
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Lightbox Gallery ID', 'theissue' ),
				'param_name'  => 'gallery_id',
				'description' => esc_html__( 'The images with the same Gallery ID will be grouped as a gallery', 'theissue' ),
				'dependency'  => array(
					'element' => 'lightbox',
					'value'   => 'true',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Border Radius', 'theissue' ),
				'param_name'  => 'thb_border_radius',
				'group'       => 'Styling',
				'description' => esc_html__( 'You can add your own border-radius code here. For ex: 2px 2px 4px 4px', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
				'param_name'  => 'box_shadow',
				'value'       => array(
					'No Shadow' => '',
					'Small'     => 'small-shadow',
					'Medium'    => 'medium-shadow',
					'Large'     => 'large-shadow',
					'X-Large'   => 'xlarge-shadow',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style2' ),
				),
				'group'       => 'Styling',
				'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Image Max Width', 'theissue' ),
				'param_name'  => 'max_width',
				'value'       => array(
					'100%' => 'size_100',
					'125%' => 'size_125',
					'150%' => 'size_150',
					'175%' => 'size_175',
					'200%' => 'size_200',
					'225%' => 'size_225',
					'250%' => 'size_250',
					'275%' => 'size_275',
				),
				'std'         => 'size_100',
				'group'       => 'Styling',
				'description' => esc_html__( 'By default, image is contained within the columns, by setting this, you can extend the image over the container', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Video URL', 'theissue' ),
				'param_name'  => 'video_url',
				'group'       => esc_html__( 'Video', 'theissue' ),
				'description' => esc_html__( 'Please enter your video url here. (mp4 file)', 'theissue' ),
				'dependency'  => array(
					'element' => 'video',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Add an animated image', 'theissue' ),
	)
);

// Image Hotspots shortcode
vc_map(
	array(
		'name'             => esc_html__( 'Image Hot Spots', 'theissue' ),
		'base'             => 'thb_hotspots',
		'icon'             => 'thb_vc_ico_imagehotspots',
		'class'            => 'thb_vc_sc_hotspots',
		'front_enqueue_js' => array( Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/vendor/jquery.hotspot.js' ),
		'admin_enqueue_js' => array( Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/js/vendor/jquery.hotspot.js' ),
		'category'         => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'           => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Image', 'theissue' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'After selecting your image, you can then click on the image in the preview area to add your hotspots on the desired locations.', 'theissue' ),
			),
			array(
				'type'             => 'thb_hotspot_param',
				'heading'          => esc_html__( 'Image Preview', 'theissue' ),
				'param_name'       => 'thb_hotspot_data',
				'edit_field_class' => 'vc_column vc_col-sm-12',
				'description'      => esc_html__( 'Click to add a hotspot - Drag to move it', 'theissue' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'thb_tooltip_function',
				'heading'    => esc_html__( 'Tooltip Functionality', 'theissue' ),
				'value'      => array(
					'Show on Hover' => 'hover',
					'Show on Click' => 'click',
					'Show Always'   => 'always',
				),
				'std'        => 'hover',
				'group'      => esc_html__( 'Styling', 'theissue' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'thb_pin_color',
				'heading'    => esc_html__( 'Pin Color', 'theissue' ),
				'value'      => array(
					'Accent' => 'pin-accent',
					'Black'  => 'pin-black',
					'White'  => 'pin-white',
				),
				'std'        => 'accent',
				'group'      => esc_html__( 'Styling', 'theissue' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Pin Animation', 'theissue' ),
				'param_name' => 'animation',
				'value'      => array(
					'None'          => '',
					'Right to Left' => 'animation right-to-left',
					'Left to Right' => 'animation left-to-right',
					'Bottom to Top' => 'animation bottom-to-top',
					'Top to Bottom' => 'animation top-to-bottom',
					'Scale'         => 'animation scale',
					'Fade'          => 'animation fade-in',
				),
				'group'      => esc_html__( 'Styling', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Enable Pulsate Effect', 'theissue' ),
				'param_name'  => 'thb_pulsate',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'thb-pulsate',
				),
				'std'         => 'thb-pulsate',
				'description' => esc_html__( 'Shows a pulsate around the pin.', 'theissue' ),
				'group'       => esc_html__( 'Styling', 'theissue' ),
			),
		),
		'description'      => esc_html__( 'Add an image with hotspots', 'theissue' ),
	)
);

// Image Slider
vc_map(
	array(
		'name'        => esc_html__( 'Image Slider', 'theissue' ),
		'base'        => 'thb_image_slider',
		'icon'        => 'thb_vc_ico_image_slider',
		'class'       => 'thb_vc_sc_image_slider',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'attach_images',
				'heading'    => esc_html__( 'Select Images', 'theissue' ),
				'param_name' => 'images',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'thb_columns',
				'value'       => array(
					'Single Column' => '1',
					'Two Columns'   => 'small-12 medium-6',
					'Three Columns' => 'small-12 medium-4',
					'Four Columns'  => 'small-12 medium-3',
				),
				'description' => esc_html__( 'Select the layout.', 'theissue' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Use lightbox?', 'theissue' ),
				'param_name' => 'lightbox',
				'value'      => array(
					'Yes' => 'mfp-gallery',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Vertical Center Images', 'theissue' ),
				'param_name' => 'thb_center',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Equal Height Images', 'theissue' ),
				'param_name' => 'thb_equal_height',
				'value'      => array(
					'Yes' => 'true',
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Use Pagination', 'theissue' ),
				'param_name' => 'thb_pagination',
				'value'      => array(
					'Yes' => 'true',
				),
				'group'      => 'Controls',
				'std'        => 'true',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Display Prev/Next Slides ?', 'theissue' ),
				'param_name' => 'thb_next_slides',
				'value'      => array(
					'Yes' => 'overflow-visible',
				),
				'group'      => 'Controls',
				'std'        => 'overflow-visible',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'group'       => 'Controls',
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'group'       => 'Controls',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Add Slider with your images', 'theissue' ),
	)
);

// Page Menu
vc_map(
	array(
		'name'        => esc_html__( 'Page Menu', 'theissue' ),
		'base'        => 'thb_page_menu',
		'icon'        => 'thb_vc_ico_page_menu',
		'class'       => 'thb_vc_sc_page_menu',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Select Menu to display', 'theissue' ),
				'param_name'  => 'menu',
				'value'       => thb_getMenuarray(),
				'admin_label' => true,
				'description' => esc_html__( 'Select which menu to display on this page.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display a sub-menu for your page.', 'theissue' ),
	)
);

// Post Background
vc_map(
	array(
		'name'        => esc_html__( 'Posts Background', 'theissue' ),
		'base'        => 'thb_postbackground',
		'icon'        => 'thb_vc_ico_postbackground',
		'class'       => 'thb_vc_sc_postbackground',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_background/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_background/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_background/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_background/style4.png',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'Select the style of the posts.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'value'       => array(
					'Six Columns'   => '6',
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
				),
				'std'         => '3',
				'description' => esc_html__( 'Select the layout.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style3' ),
				),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Show your posts in a full-width background.', 'theissue' ),
	)
);

// Posts Block
vc_map(
	array(
		'name'        => esc_html__( 'Posts Block Grid', 'theissue' ),
		'base'        => 'thb_blockgrid',
		'icon'        => 'thb_vc_ico_blockgrid',
		'class'       => 'thb_vc_sc_blockgrid',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'options'     => array(
					'style1'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style1.png',
					'style2'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style2.png',
					'style3'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style3.png',
					'style4'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style4.png',
					'style5'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style5.png',
					'style6'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style6.png',
					'style7'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style7.png',
					'style8'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style8.png',
					'style9'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style9.png',
					'style10' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style10.png',
					'style11' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style11.png',
					'style12' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style12.png',
					'style13' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style13.png',
					'style14' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_blockgrid/style14.png',
				),
				'std'         => 'style1',
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display your posts in different block grid layouts.', 'theissue' ),
	)
);

// Posts Carousel
vc_map(
	array(
		'name'        => esc_html__( 'Posts Carousel', 'theissue' ),
		'base'        => 'thb_postcarousel',
		'icon'        => 'thb_vc_ico_postcarousel',
		'class'       => 'thb_vc_sc_postcarousel',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'std'         => 'style1',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style2.png',
					'style3' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style3.png',
					'style4' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style4.png',
					'style5' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style5.png',
					'style6' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style6.png',
					'style7' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_carousel/style7.png',
				),
				'description' => esc_html__( 'This changes the style of the posts', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Excerpts?', 'theissue' ),
				'param_name'  => 'excerpts',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'You can toggle Excerpts using this checkbox.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style1', 'style4', 'style7' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'value'       => array(
					'Six Columns'   => '6',
					'Five Columns'  => '5',
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
				),
				'std'         => '3',
				'description' => esc_html__( 'Select the layout.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style1', 'style2', 'style4', 'style5', 'style6', 'style7' ),
				),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Pagination', 'theissue' ),
				'param_name'  => 'pagination',
				'group'       => 'Controls',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'description' => esc_html__( 'If enabled, this will show pagination circles underneath', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Navigation Arrows', 'theissue' ),
				'param_name'  => 'navigation',
				'group'       => 'Controls',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'description' => esc_html__( 'If enabled, this will show navigation arrows on the side', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add Button?', 'theissue' ),
				'param_name'  => 'carousel_button',
				'group'       => 'Controls',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'This will add a button where pagination is usually displayed.', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Select Link & Text for the button', 'theissue' ),
				'param_name'  => 'link',
				'group'       => 'Controls',
				'description' => esc_html__( 'Select the attributes for the button.', 'theissue' ),
				'dependency'  => array(
					'element' => 'carousel_button',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Infinite', 'theissue' ),
				'param_name'  => 'infinite',
				'group'       => 'Controls',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'std'         => 'false',
				'description' => esc_html__( 'If enabled, the carousel will loop.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'group'       => 'Autoplay',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_carousel',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'group'       => 'Autoplay',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Display Posts from your blog in a Carousel', 'theissue' ),
	)
);

// Post Grid
vc_map(
	array(
		'name'        => esc_html__( 'Posts Grid', 'theissue' ),
		'base'        => 'thb_postgrid',
		'icon'        => 'thb_vc_ico_postgrid',
		'class'       => 'thb_vc_sc_postgrid',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'std'         => 'style1-center',
				'admin_label' => true,
				'options'     => array(
					'style1-center' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style1-center.png',
					'style1-left'   => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style1-left.png',
					'style2'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style2.png',
					'style3'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style3.png',
					'style4'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style4.png',
					'style5'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style5.png',
					'style6'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style6.png',
					'style7'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style7.png',
					'style8'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style8.png',
					'style9'        => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style9.png',
					'style10'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style10.png',
					'style11'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style11.png',
					'style12'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style12.png',
					'style13'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style13.png',
					'style14'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style14.png',
					'style15'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style15.png',
					'style16'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style16.png',
					'style17'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style17.png',
					'style18'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style18.png',
					'style19'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style19.png',
					'style20'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style20.png',
					'style21'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style21.png',
					'style22'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style22.png',
					'style23'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style23.png',
					'style24'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style24.png',
					'style25'       => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_grid_styles/style25.png',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Display Excerpts?', 'theissue' ),
				'param_name'  => 'excerpts',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'You can toggle Excerpts using this checkbox.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style1-left', 'style1-center', 'style19', 'style21', 'style22', 'style23' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'Six Columns'   => '6',
					'Five Columns'  => '5',
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
					'One Column'    => '1',
				),
				'std'         => '3',
				'description' => esc_html__( 'Select the layout of the posts.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style1-left', 'style1-center', 'style3', 'style4', 'style7', 'style9', 'style10', 'style11', 'style12', 'style14', 'style16', 'style20', 'style21', 'style22', 'style23' ),
				),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Featured Posts (Enlarged Post Image)', 'theissue' ),
				'param_name'  => 'featured_index',
				'description' => esc_html__( 'Enter the number for which posts to show as Featured (For ex, entering 1,3,5 will make those posts appear larger, these are not post IDs, just the number in which they appear)', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style2', 'style8', 'style19', 'style25' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pagination Options', 'theissue' ),
				'param_name'  => 'pagination',
				'group'       => 'Pagination / Load More',
				'value'       => array(
					'None'          => '',
					'Pagination'    => 'true',
					'Load More'     => 'style2',
					'Infinite Load' => 'style3',
					'Prev / Next'   => 'style4',
				),
				'description' => esc_html__( 'If enabled, this will show pagination underneath. Offset setting does not work.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display your posts in different grid layouts.', 'theissue' ),
	)
);

// Post Masonry
vc_map(
	array(
		'name'        => esc_html__( 'Posts Masonry', 'theissue' ),
		'base'        => 'thb_postmasonry',
		'icon'        => 'thb_vc_ico_postmasonry',
		'class'       => 'thb_vc_sc_postmasonry',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_masonry_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_masonry_styles/style2.png',
				),
				'std'         => 'style1',
				'description' => esc_html__( 'Select the style of the masonry.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
				),
				'description' => esc_html__( 'Select the layout of the masonry.', 'theissue' ),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add Load More Button?', 'theissue' ),
				'param_name'  => 'loadmore',
				'group'       => 'Load More',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'description' => esc_html__( 'Add Load More button at the bottom', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Show your posts in a masonry grid', 'theissue' ),
	)
);

// Posts Slider
vc_map(
	array(
		'name'        => esc_html__( 'Posts Slider', 'theissue' ),
		'base'        => 'thb_postslider',
		'icon'        => 'thb_vc_ico_postslider',
		'class'       => 'thb_vc_sc_postslider',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'std'         => 'style1',
				'options'     => array(
					'style1' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_slider_styles/style1.png',
					'style2' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/post_slider_styles/style2.png',
				),
				'description' => esc_html__( 'This changes the style of the posts', 'theissue' ),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Pagination', 'theissue' ),
				'param_name'  => 'pagination',
				'group'       => 'Controls',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'description' => esc_html__( 'If enabled, this will show pagination circles underneath', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Navigation Arrows', 'theissue' ),
				'param_name'  => 'navigation',
				'group'       => 'Controls',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'description' => esc_html__( 'If enabled, this will show navigation arrows on the side', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'group'       => 'Autoplay',
				'value'       => array(
					esc_html__( 'Yes', 'theissue' ) => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_carousel',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'group'       => 'Autoplay',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Display Posts from your blog in a Carousel', 'theissue' ),
	)
);

// Posts Trending Bar
vc_map(
	array(
		'name'        => esc_html__( 'Posts Trending Bar', 'theissue' ),
		'base'        => 'thb_posttrendingbar',
		'icon'        => 'thb_vc_ico_posttrendingbar',
		'class'       => 'thb_vc_sc_posttrendingbar',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'theissue' ),
				'param_name' => 'style',
				'std'        => 'style1',
				'value'      => array(
					'List'   => 'style1',
					'Ticker' => 'thb-carousel',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Enter a title if you want.', 'theissue' ),
			),
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display your posts in scrolling trending bar.', 'theissue' ),
	)
);

// Pricing Table Parent
vc_map(
	array(
		'name'            => esc_html__( 'Pricing Table', 'theissue' ),
		'base'            => 'thb_pricing_table',
		'icon'            => 'thb_vc_ico_pricing_table',
		'class'           => 'thb_vc_sc_pricing_table',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_parent'       => array( 'only' => 'thb_pricing_column' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'thb_pricing_style',
				'admin_label' => true,
				'std'         => 'style1',
				'value'       => array(
					'Style 1' => 'style1',
					'Style 2' => 'style2',
					'Style 3' => 'style3',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'thb_pricing_columns',
				'admin_label' => true,
				'value'       => array(
					'2 Columns' => 'large-6',
					'3 Columns' => 'large-4',
					'4 Columns' => 'medium-4 large-3',
					'5 Columns' => 'medium-6 thb-5',
					'6 Columns' => 'medium-4 large-2',
				),
			),
		),
		'description'     => esc_html__( 'Pricing Table', 'theissue' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Pricing Table Column', 'theissue' ),
		'base'        => 'thb_pricing_column',
		'icon'        => 'thb_vc_ico_pricing_table',
		'class'       => 'thb_vc_sc_pricing_table',
		'as_child'    => array( 'only' => 'thb_pricing_table' ),
		'params'      => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Highlight?', 'theissue' ),
				'param_name'  => 'highlight',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, this column will be hightlighted.', 'theissue' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'theissue' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Select an image if you would like to display one on top.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this pricing column', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Price', 'theissue' ),
				'param_name'  => 'price',
				'description' => esc_html__( 'Price of this pricing column.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Per', 'theissue' ),
				'param_name'  => 'per',
				'description' => esc_html__( 'To use after the price. For ex: /month', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Sub Title', 'theissue' ),
				'param_name'  => 'sub_title',
				'description' => esc_html__( 'Some information under the price.', 'theissue' ),
			),
			array(
				'type'        => 'textarea_html',
				'heading'     => esc_html__( 'Description', 'theissue' ),
				'param_name'  => 'content',
				'description' => esc_html__( 'Include a small description for this box, this text area supports HTML too.', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Pricing CTA Button', 'theissue' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Button at the end of the pricing table.', 'theissue' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Color', 'theissue' ),
				'param_name'  => 'accent_color',
				'group'       => 'Styling',
				'description' => esc_html__( 'Changes different areas of the pricing table based on selected style.', 'theissue' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Color 2', 'theissue' ),
				'param_name'  => 'accent_color_2',
				'group'       => 'Styling',
				'description' => esc_html__( 'Changes different areas of the pricing table based on selected style.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Add a pricing table', 'theissue' ),
	)
);

class WPBakeryShortCode_thb_pricing_table extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_pricing_column extends WPBakeryShortCode {}

// Products
vc_map(
	array(
		'name'        => esc_html__( 'Products', 'theissue' ),
		'base'        => 'thb_product',
		'icon'        => 'thb_vc_ico_product',
		'class'       => 'thb_vc_sc_product',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Product Sort', 'theissue' ),
				'param_name'  => 'product_sort',
				'value'       => array(
					'Best Sellers'      => 'best-sellers',
					'Latest Products'   => 'latest-products',
					'Top Rated'         => 'top-rated',
					'Featured Products' => 'featured-products',
					'Sale Products'     => 'sale-products',
					'By Category'       => 'by-category',
					'By Product ID'     => 'by-id',
				),
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Product Category', 'theissue' ),
				'param_name'  => 'cat',
				'value'       => thb_productCategories(),
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'theissue' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product IDs', 'theissue' ),
				'param_name'  => 'product_ids',
				'description' => esc_html__( 'Enter the products IDs you would like to display seperated by comma', 'theissue' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-id' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Items', 'theissue' ),
				'param_name'  => 'item_count',
				'value'       => '4',
				'description' => esc_html__( 'The number of products to show.', 'theissue' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers', 'featured-products' ),
				),
			),
			$thb_animation_array,
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use Carousel?', 'theissue' ),
				'param_name'  => 'thb_carousel',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If you enable this, products will be displayed inside a carousel', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'1 Column'  => '1',
					'2 Columns' => '2',
					'3 Columns' => '3',
					'4 Columns' => '4',
					'5 Columns' => '5',
					'6 Columns' => '6',
				),
				'description' => esc_html__( 'Select the layout of the posts.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description' => esc_html__( 'Add WooCommerce products', 'theissue' ),
	)
);

// Product List
vc_map(
	array(
		'name'        => esc_html__( 'Product List', 'theissue' ),
		'base'        => 'thb_product_list',
		'icon'        => 'thb_vc_ico_product_list',
		'class'       => 'thb_vc_sc_product_list',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of the widget', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Product Sort', 'theissue' ),
				'param_name'  => 'product_sort',
				'value'       => array(
					'Best Sellers'    => 'best-sellers',
					'Latest Products' => 'latest-products',
					'Top Rated'       => 'top-rated',
					'Sale Products'   => 'sale-products',
					'By Product ID'   => 'by-id',
				),
				'admin_label' => true,
				'description' => esc_html__( 'Select the order of the products you would like to show.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Product IDs', 'theissue' ),
				'param_name'  => 'product_ids',
				'description' => esc_html__( 'Enter the products IDs you would like to display seperated by comma', 'theissue' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-id' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Items', 'theissue' ),
				'param_name'  => 'item_count',
				'value'       => '4',
				'description' => esc_html__( 'The number of products to show.', 'theissue' ),
				'dependency'  => array(
					'element' => 'product_sort',
					'value'   => array( 'by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers' ),
				),
			),
		),
		'description' => esc_html__( 'Add WooCommerce products in a list', 'theissue' ),
	)
);

// Shop Grid
vc_map(
	array(
		'name'        => esc_html__( 'Product Category Grid', 'theissue' ),
		'base'        => 'thb_product_category_grid',
		'icon'        => 'thb_vc_ico_grid',
		'class'       => 'thb_vc_sc_grid',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Product Category', 'theissue' ),
				'param_name'  => 'cat',
				'value'       => thb_productCategories(),
				'description' => esc_html__( 'Select the categories you would like to display', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Style 1' => 'style1',
					'Style 2' => 'style2',
					'Style 3' => 'style3',
				),
				'description' => esc_html__( 'This applies different grid structures', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display Product Category Grid', 'theissue' ),
	)
);

// Product Categories
vc_map(
	array(
		'name'        => esc_html__( 'Product Categories', 'theissue' ),
		'base'        => 'thb_product_categories',
		'icon'        => 'thb_vc_ico_product_categories',
		'class'       => 'thb_vc_sc_product_categories',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Product Category', 'theissue' ),
				'param_name'  => 'cat',
				'value'       => thb_productCategories(),
				'description' => esc_html__( 'Select the categories you would like to display', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'admin_label' => true,
				'value'       => array(
					'Four Columns'  => '4',
					'Three Columns' => '3',
					'Two Columns'   => '2',
				),
				'description' => esc_html__( 'Select the layout of the products.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Add WooCommerce product categories', 'theissue' ),
	)
);

// Progress Bar Shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Progress Bar', 'theissue' ),
		'base'        => 'thb_progressbar',
		'icon'        => 'thb_vc_ico_progressbar',
		'class'       => 'thb_vc_sc_progressbar',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'Title of this progress bar', 'theissue' ),
				'value'       => 'Development',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Progress', 'theissue' ),
				'param_name'  => 'progress',
				'admin_label' => true,
				'description' => esc_html__( 'Value for this progress. Should be between 0 and 100', 'theissue' ),
				'value'       => '70',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Bar Color', 'theissue' ),
				'param_name'       => 'thb_bar_color',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Uses the accent color by default', 'theissue' ),
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Bar Color 2', 'theissue' ),
				'param_name'       => 'thb_bar_color_2',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Uses the accent color by default', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display progress bars in different colors', 'theissue' ),
	)
);

// Search Field
vc_map(
	array(
		'base'        => 'thb_searchfield',
		'name'        => esc_html__( 'Search Field', 'theissue' ),
		'description' => esc_html__( 'Adds a search form with different sizes', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'icon'        => 'thb_vc_ico_searchfield',
		'class'       => 'thb_vc_sc_searchfield',
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Placeholder', 'theissue' ),
				'param_name'  => 'placeholder',
				'description' => esc_html__( 'You can change the placeholder text here', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Size', 'theissue' ),
				'param_name'  => 'size',
				'admin_label' => true,
				'value'       => array(
					'Small'  => 'small',
					'Medium' => 'medium',
					'Large'  => 'large',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Add Border Radius?', 'theissue' ),
				'param_name'  => 'thb_border_radius',
				'value'       => array(
					'Yes' => 'border_radius',
				),
				'description' => esc_html__( 'When enabled, search form will have a pill shape.', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Border Color', 'theissue' ),
				'param_name'       => 'border_color',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Background Color', 'theissue' ),
				'param_name'       => 'background_color',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Border Focus Color', 'theissue' ),
				'param_name'       => 'border_color_active',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Background Focus Color', 'theissue' ),
				'param_name'       => 'background_color_active',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text Color', 'theissue' ),
				'param_name'       => 'text_color',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Placeholder Text Color', 'theissue' ),
				'param_name'       => 'placeholder_color',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),

			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icon Color', 'theissue' ),
				'param_name'       => 'icon_color',
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => 'Styling',
			),
		),
	)
);

// Slidetype
vc_map(
	array(
		'base'        => 'thb_slidetype',
		'name'        => esc_html__( 'Slide Type', 'theissue' ),
		'description' => esc_html__( 'Animated text scrolling', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'icon'        => 'thb_vc_ico_slidetype',
		'class'       => 'thb_vc_sc_slidetype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'theissue' ),
				'param_name'  => 'slide_text',
				'value'       => '<h2>*The Issue;Your Custom Contents*</h2>',
				'description' => 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*The Issue; Your Custom Content*</strong> which will create new lines at ;',
				'admin_label' => true,
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Lines'      => 'style1',
					'Words'      => 'style2',
					'Characters' => 'style3',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Animated Text Color', 'theissue' ),
				'param_name'  => 'thb_animated_color',
				'description' => esc_html__( 'Uses the accent color by default', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
	)
);

// Stroke type
vc_map(
	array(
		'base'        => 'thb_stroketype',
		'name'        => esc_html__( 'Stroke Type', 'theissue' ),
		'description' => esc_html__( 'Text with Stroke style', 'theissue' ),
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'icon'        => 'thb_vc_ico_stroketype',
		'class'       => 'thb_vc_sc_stroketype',
		'params'      => array(
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Content', 'theissue' ),
				'param_name'  => 'slide_text',
				'value'       => '<h1>The Issue</h1>',
				'description' => 'Enter the content to display with stroke.',
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text Color', 'theissue' ),
				'param_name'  => 'thb_color',
				'description' => esc_html__( 'Select text color', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Stroke Width', 'theissue' ),
				'param_name'  => 'stroke_width',
				'std'         => '2px',
				'description' => esc_html__( 'Enter the value for the stroke width. ', 'theissue' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
			$thb_animation_array,
		),
	)
);

// Subscription
vc_map(
	array(
		'name'        => esc_html__( 'Subscription Form', 'theissue' ),
		'base'        => 'thb_subscribe',
		'icon'        => 'thb_vc_ico_subscribe',
		'class'       => 'thb_vc_sc_subscribe',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'std'         => 'style1',
				'value'       => array(
					'Vertical'   => 'style1',
					'Horizontal' => 'style2',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'admin_label' => true,
				'param_name'  => 'title',
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Description', 'theissue' ),
				'param_name' => 'content',
			),
		),
		'description' => esc_html__( 'Add a subscription form', 'theissue' ),
	)
);

// Tabs
vc_map(
	array(
		'name'                    => esc_html__( 'Tabs', 'theissue' ),
		'base'                    => 'thb_tabs',
		'icon'                    => 'thb_vc_ico_thb_tabs',
		'class'                   => 'thb_vc_sc_thb_tabs wpb_vc_tabs wpb_vc_tta_tabs',
		'show_settings_on_create' => false,
		'as_parent'               => array(
			'only' => 'vc_tta_section',
		),
		'category'                => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'                  => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					'Style 2' => 'style2',
					'Style 3' => 'style3',
					'Style 4' => 'style4',
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'active_section',
				'heading'     => esc_html__( 'Active section', 'theissue' ),
				'value'       => 1,
				'description' => esc_html__( 'Enter active section number.', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Animate Tabs', 'theissue' ),
				'param_name'  => 'tabs_animation',
				'value'       => array(
					'Yes' => 'true',
				),
				'std'         => 'true',
				'description' => esc_html__( 'When enabled, tabs change with opacity effect', 'theissue' ),
			),
		),
		'description'             => esc_html__( 'Tabbed Content', 'theissue' ),
		'js_view'                 => 'VcBackendTtaTabsView',
		'custom_markup'           => '
	<div class="vc_tta-container" data-vc-action="collapse">
		<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
			<div class="vc_tta-tabs-container">'
						. '<ul class="vc_tta-tabs-list">'
						. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
						. '</ul>
			</div>
			<div class="vc_tta-panels vc_clearfix {{container-class}}">
				{{ content }}
			</div>
		</div>
	</div>',
		'default_content'         => '
		[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'theissue' ), 1 ) . '"][/vc_tta_section]
		[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'theissue' ), 2 ) . '"][/vc_tta_section]
	',
		'admin_enqueue_js'        => array(
			vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
		),
	)
);

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Tabs' );

class WPBakeryShortCode_thb_tabs extends WPBakeryShortCode_VC_Tta_Accordion { }

// Team Member Parent
vc_map(
	array(
		'name'            => esc_html__( 'Team Members', 'theissue' ),
		'base'            => 'thb_team_parent',
		'icon'            => 'thb_vc_ico_team',
		'class'           => 'thb_vc_sc_team',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_parent'       => array( 'only' => 'thb_team, thb_team_addnew' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Layout', 'theissue' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'value'       => array(
					'Style 1 (Grid)'     => 'style1',
					'Style 2 (Carousel)' => 'thb-carousel',
				),
				'description' => esc_html__( 'This changes the layout style of the team members', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Margins between items', 'theissue' ),
				'param_name'  => 'thb_margins',
				'group'       => 'Styling',
				'std'         => 'regular-padding',
				'value'       => array(
					'Regular' => 'regular-padding',
					'Mini'    => 'mini-padding',
					'Pixel'   => 'pixel-padding',
					'None'    => 'no-padding',
				),
				'description' => esc_html__( 'This will change the margins between team members.', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Team Member Style', 'theissue' ),
				'param_name'  => 'thb_member_style',
				'value'       => array(
					'Style 1 (Title under Image)'    => 'member_style1',
					'Style 2 (Title over Image)'     => 'member_style2',
					'Style 3 (Title over Image - 2)' => 'member_style3',
					'Style 4 (Title over Image - 3)' => 'member_style5',
					'Style 5 (Title under Image - Circular)' => 'member_style4',
				),
				'description' => esc_html__( 'This changes the style of the members', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'thb_columns',
				'admin_label' => true,
				'value'       => array(
					'1 Column'  => 'medium-12',
					'2 Columns' => 'large-6',
					'3 Columns' => 'large-4',
					'4 Columns' => 'medium-4 large-3',
					'5 Columns' => 'medium-6 thb-5',
					'6 Columns' => 'medium-4 large-2',
				),
			),
			$thb_animation_array,
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Text Color', 'theissue' ),
				'param_name'  => 'thb_text_color',
				'value'       => array(
					'Dark'  => 'team-dark',
					'Light' => 'team-light',
				),
				'group'       => 'Styling',
				'std'         => 'team-dark',
				'description' => esc_html__( 'Color of the text inside hover information', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'thb-carousel' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'true' ),
				),
			),
		),
		'description'     => esc_html__( 'Team Members', 'theissue' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Team Member', 'theissue' ),
		'base'        => 'thb_team',
		'icon'        => 'thb_vc_ico_team',
		'class'       => 'thb_vc_sc_team',
		'as_child'    => array( 'only' => 'thb_team_parent' ),
		'params'      => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'theissue' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Add Team Member image here.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Name', 'theissue' ),
				'param_name'  => 'name',
				'admin_label' => true,
				'description' => esc_html__( 'Name of the member.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Sub Title', 'theissue' ),
				'param_name'  => 'sub_title',
				'description' => esc_html__( 'Position or title of the member.', 'theissue' ),
			),
			array(
				'type'        => 'textarea_safe',
				'heading'     => esc_html__( 'Description', 'theissue' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Include a small description for this member, this text area supports HTML too.', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'You can set a global link for your team member here.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Facebook', 'theissue' ),
				'param_name'  => 'facebook',
				'group'       => esc_html__( 'Social Icons', 'theissue' ),
				'description' => esc_html__( 'Enter Facebook Link', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Twitter', 'theissue' ),
				'param_name'  => 'twitter',
				'group'       => esc_html__( 'Social Icons', 'theissue' ),
				'description' => esc_html__( 'Enter Twitter Link', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Linkedin', 'theissue' ),
				'param_name'  => 'linkedin',
				'group'       => esc_html__( 'Social Icons', 'theissue' ),
				'description' => esc_html__( 'Enter Linkedin Link', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Instagram', 'theissue' ),
				'param_name'  => 'instagram',
				'group'       => esc_html__( 'Social Icons', 'theissue' ),
				'description' => esc_html__( 'Enter Instagram Link', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Single Team Member', 'theissue' ),
	)
);
vc_add_param( 'thb_team_parent', thb_vc_gradient_color1() );
vc_add_param( 'thb_team_parent', thb_vc_gradient_color2() );
vc_add_param(
	'thb_team_parent',
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Shadow Color for Style 3', 'theissue' ),
		'param_name'  => 'box_shadow',
		'description' => esc_html__( 'Choose a shadow color if needed', 'theissue' ),
		'group'       => 'Styling',
	)
);

class WPBakeryShortCode_thb_team_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_team extends WPBakeryShortCode {}

// Testimonial Parent
vc_map(
	array(
		'name'            => esc_html__( 'Testimonials', 'theissue' ),
		'base'            => 'thb_testimonial_parent',
		'icon'            => 'thb_vc_ico_testimonial',
		'class'           => 'thb_vc_sc_testimonial',
		'content_element' => true,
		'category'        => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_parent'       => array( 'only' => 'thb_testimonial' ),
		'params'          => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'thb_style',
				'admin_label' => true,
				'value'       => array(
					'Single Column Slider - Style 1 (avatars)' => 'style1',
					'Single Column Slider - Style 2' => 'style2',
					'Single Column Slider - Style 3' => 'style4',
					'Single Column Slider - Style 4' => 'style7',
					'Single Column Slider - Style 5' => 'style8',
					'Multi Column Slider'            => 'style3',
					'Review Slider with Images'      => 'style5',
					'Grid'                           => 'style6',
				),
				'description' => esc_html__( 'This changes the layout style of the testimonials', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Columns', 'theissue' ),
				'param_name'  => 'columns',
				'value'       => $thb_column_array,
				'description' => esc_html__( 'This changes the column counts of the carousel or grid', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style3', 'style6' ),
				),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Display Slider Pagination', 'theissue' ),
				'param_name' => 'thb_pagination',
				'value'      => array(
					'Yes' => 'true',
				),
				'std'        => 'true',
				'dependency' => array(
					'element' => 'thb_style',
					'value'   => array( 'style1', 'style2', 'style3', 'style4', 'style7', 'style8' ),
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Auto Play', 'theissue' ),
				'param_name'  => 'autoplay',
				'group'       => esc_html__( 'Auto Play', 'theissue' ),
				'value'       => array(
					'Yes' => 'true',
				),
				'description' => esc_html__( 'If enabled, the carousel will autoplay.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Speed of the AutoPlay', 'theissue' ),
				'param_name'  => 'autoplay_speed',
				'value'       => '4000',
				'group'       => esc_html__( 'Auto Play', 'theissue' ),
				'description' => esc_html__( 'Speed of the autoplay, default 4000 (4 seconds)', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_style',
					'value'   => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style7', 'style8' ),
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description'     => esc_html__( 'Testimonials Slider or Grid', 'theissue' ),
		'js_view'         => 'VcColumnView',
	)
);

vc_map(
	array(
		'name'        => esc_html__( 'Testimonial', 'theissue' ),
		'base'        => 'thb_testimonial',
		'icon'        => 'thb_vc_ico_testimonial',
		'class'       => 'thb_vc_sc_testimonial',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'as_child'    => array( 'only' => 'thb_testimonial_parent' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Quote Title', 'theissue' ),
				'param_name'  => 'quote_title',
				'group'       => esc_html__( 'Quote', 'theissue' ),
				'description' => esc_html__( 'Title of the Quote', 'theissue' ),
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Quote', 'theissue' ),
				'param_name'  => 'quote',
				'group'       => esc_html__( 'Quote', 'theissue' ),
				'description' => esc_html__( 'Quote text', 'theissue' ),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Enable Review Stars', 'theissue' ),
				'param_name'  => 'thb_review',
				'value'       => array(
					'Yes' => 'true',
				),
				'group'       => esc_html__( 'Quote', 'theissue' ),
				'description' => esc_html__( 'If you enable this, stars will be shown to display user review.', 'theissue' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Review', 'theissue' ),
				'param_name'  => 'thb_review_stars',
				'value'       => array(
					'5 Stars' => '5',
					'4 Stars' => '4',
					'3 Stars' => '3',
					'2 Stars' => '2',
					'1 Stars' => '1',
					'0 Stars' => '0',
				),
				'group'       => esc_html__( 'Quote', 'theissue' ),
				'description' => esc_html__( 'Star rating of this review.', 'theissue' ),
				'dependency'  => array(
					'element' => 'thb_review',
					'value'   => array( 'true' ),
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Review Image', 'theissue' ),
				'param_name'  => 'review_image',
				'group'       => esc_html__( 'Quote', 'theissue' ),
				'description' => esc_html__( 'Set an image for this review. Used for Style 5.', 'theissue' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'theissue' ),
				'param_name'  => 'link',
				'group'       => esc_html__( 'Quote', 'theissue' ),
				'description' => esc_html__( 'Set a link for this slide. Used for Style 5.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Author', 'theissue' ),
				'param_name'  => 'author_name',
				'admin_label' => true,
				'group'       => esc_html__( 'Author', 'theissue' ),
				'description' => esc_html__( 'Name of the member.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Author Title', 'theissue' ),
				'param_name'  => 'author_title',
				'group'       => esc_html__( 'Author', 'theissue' ),
				'description' => esc_html__( 'Title that will appear below author name.', 'theissue' ),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Author Image', 'theissue' ),
				'param_name'  => 'author_image',
				'group'       => esc_html__( 'Author', 'theissue' ),
				'description' => esc_html__( 'Add Author image here.', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Single Testimonial', 'theissue' ),
	)
);
class WPBakeryShortCode_thb_testimonial_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_testimonial extends WPBakeryShortCode {}

// Title
vc_map(
	array(
		'name'        => esc_html__( 'Title', 'theissue' ),
		'base'        => 'thb_title',
		'icon'        => 'thb_vc_ico_title',
		'class'       => 'thb_vc_sc_title',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'thb_radio_image',
				'heading'     => esc_html__( 'Type', 'theissue' ),
				'param_name'  => 'style',
				'options'     => array(
					'style1'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style1.png',
					'style2'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style2.png',
					'style3'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style3.png',
					'style4'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style4.png',
					'style5'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style5.png',
					'style6'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style6.png',
					'style7'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style7.png',
					'style8'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style8.png',
					'style9'  => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style9.png',
					'style10' => Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/title_styles/style10.png',
				),
				'std'         => 'style1',
				'admin_label' => true,
				'description' => esc_html__( 'Select the title style.', 'theissue' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Text Alignment', 'theissue' ),
				'param_name' => 'text_align',
				'std'        => 'text-center',
				'value'      => array(
					'Left'   => 'text-left',
					'Center' => 'text-center',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style4', 'style5', 'style6', 'style7', 'style8', 'style9' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background Color', 'theissue' ),
				'param_name'  => 'bg_color',
				'description' => esc_html__( 'Background color of the title.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style9' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon', 'theissue' ),
				'param_name' => 'icon',
				'value'      => thb_getIconarray(),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style3' ),
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image As Icon', 'theissue' ),
				'param_name'  => 'icon_image',
				'description' => esc_html__( 'You can set an image instead of an icon.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style3' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image Width', 'theissue' ),
				'param_name'  => 'icon_image_width',
				'description' => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'style3' ),
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'theissue' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'The title text', 'theissue' ),
			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Link', 'theissue' ),
				'param_name'       => 'link',
				'edit_field_class' => 'vc_col-sm-6',
				'description'      => esc_html__( 'Set your url & text for your title', 'theissue' ),
				'dependency'       => array(
					'element' => 'style',
					'value'   => array( 'style2', 'style5' ),
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class Name', 'theissue' ),
				'param_name' => 'extra_class',
			),
		),
		'description' => esc_html__( 'Add a title to your sections', 'theissue' ),
	)
);

// Twitter shortcode
vc_map(
	array(
		'name'        => esc_html__( 'Twitter', 'theissue' ),
		'base'        => 'thb_twitter',
		'icon'        => 'thb_vc_ico_twitter',
		'class'       => 'thb_vc_sc_twitter',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'description' => esc_html__( 'Display your Tweets', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Style', 'theissue' ),
				'param_name'  => 'style',
				'value'       => array(
					'Style 1 - List'   => 'style1',
					'Style 2 - Slider' => 'style2',
				),
				'description' => esc_html__( 'This changes layout', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Twitter Username', 'theissue' ),
				'param_name'  => 'username',
				'admin_label' => true,
				'description' => esc_html__( 'Twitter username to retrieve tweets from.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Number of Tweets', 'theissue' ),
				'param_name'  => 'count',
				'admin_label' => true,
			),
		),
	)
);

// Video Lightbox
vc_map(
	array(
		'name'        => esc_html__( 'Video Lightbox', 'theissue' ),
		'base'        => 'thb_video_lightbox',
		'icon'        => 'thb_vc_ico_video_lightbox',
		'class'       => 'thb_vc_sc_video_lightbox',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'description' => esc_html__( 'Display Blog Posts from your blog', 'theissue' ),
		'params'      => array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'theissue' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Just Icon', 'theissue' )  => 'lightbox-style1',
					esc_html__( 'With Image', 'theissue' ) => 'lightbox-style2',
					esc_html__( 'With Text', 'theissue' )  => 'lightbox-style3',
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Video Link', 'theissue' ),
				'param_name'  => 'video',
				'admin_label' => true,
				'description' => esc_html__( 'URL of the video you want to link to. Youtube, Vimeo, etc.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Text for the link', 'theissue' ),
				'param_name'  => 'video_text',
				'admin_label' => true,
				'description' => esc_html__( 'Text you want to show next to the icon', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style3' ),
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Shape', 'theissue' ),
				'param_name' => 'icon_style',
				'value'      => array(
					'Style 1' => 'style1',
					'Style 2' => 'style2',
					'Style 3' => 'style3',
				),
				'group'      => 'Styling',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Size', 'theissue' ),
				'param_name' => 'icon_size',
				'value'      => array(
					'Inline'  => 'inline',
					'Regular' => 'regular',
					'Large'   => 'large',
					'X-Large' => 'xlarge',
				),
				'std'        => 'regular',
				'group'      => 'Styling',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'theissue' ),
				'param_name'  => 'icon_color',
				'description' => esc_html__( 'Color of the Play Icon', 'theissue' ),
				'group'       => 'Styling',
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Image', 'theissue' ),
				'param_name'  => 'image',
				'description' => esc_html__( 'Select image from media library.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style2' ),
				),
			),
			$thb_animation_array,
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Image Hover Style', 'theissue' ),
				'param_name' => 'hover_style',
				'value'      => array(
					'No Animation' => '',
					'Image Zoom'   => 'hover-style1',
					'Fade'         => 'hover-style2',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style2' ),
				),
				'group'      => 'Styling',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Box Shadow', 'theissue' ),
				'param_name'  => 'box_shadow',
				'value'       => array(
					'No Shadow' => '',
					'Small'     => 'small-shadow',
					'Medium'    => 'medium-shadow',
					'Large'     => 'large-shadow',
					'X-Large'   => 'xlarge-shadow',
				),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style2' ),
				),
				'group'       => 'Styling',
				'description' => esc_html__( 'Select from different shadow styles.', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Border Radius', 'theissue' ),
				'param_name'  => 'border_radius',
				'description' => esc_html__( 'Set border radius of the image. Please add px,em, etc.. as well.', 'theissue' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( 'lightbox-style2' ),
				),
				'group'       => 'Styling',
			),
		),
	)
);


// Video Playlist
vc_map(
	array(
		'name'        => esc_html__( 'Video Playlist', 'theissue' ),
		'base'        => 'thb_videos',
		'icon'        => 'thb_vc_ico_videos',
		'class'       => 'thb_vc_sc_videos',
		'category'    => esc_html__( 'by Fuel Themes', 'theissue' ),
		'params'      => array(
			array(
				'type'        => 'loop',
				'heading'     => esc_html__( 'Post Source', 'theissue' ),
				'param_name'  => 'source',
				'description' => esc_html__( 'Set your post source here. ', 'theissue' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Offset', 'theissue' ),
				'param_name'  => 'offset',
				'description' => esc_html__( 'You can offset your post with the number of posts entered in this setting', 'theissue' ),
			),
		),
		'description' => esc_html__( 'Display your video format posts in a playlist', 'theissue' ),
	)
);
