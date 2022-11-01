<?php
/**
 * Initialize the meta boxes.
 */
add_action( 'admin_init', 'thb_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */


function thb_custom_meta_boxes() {

	/**
	 * Create a custom meta boxes array that we pass to
	 * the OptionTree Meta Box API Class.
	 */

	$page_metabox = array(
		'id'       => 'page_settings',
		'title'    => esc_html__( 'Page Settings', 'theissue' ),
		'pages'    => apply_filters(
			'theissue_page_metabox_pages',
			array( 'page' )
		),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'    => 'tab2',
				'label' => esc_html__( 'Page Settings', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Page Background', 'theissue' ),
				'id'    => 'page_bg',
				'type'  => 'background',
				'desc'  => esc_html__( 'Background settings for the page.', 'theissue' ),
			),
			array(
				'label' => esc_html__( 'Disable Footer', 'theissue' ),
				'id'    => 'disable_footer',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'When enabled, footer will not be shown on this page.', 'theissue' ),
				'std'   => 'off',
			),
			array(
				'id'    => 'tab5',
				'label' => esc_html__( 'Default Layout', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'id'    => 'standard_text',
				'label' => esc_html__( 'About Listing Settings', 'theissue' ),
				'desc'  => esc_html__( 'These settings are used when the page template is set to "Default Page Layout"', 'theissue' ),
				'type'  => 'textblock',
			),
			array(
				'label' => esc_html__( 'Display Title?', 'theissue' ),
				'id'    => 'display_title',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'Shows the page title by default.', 'theissue' ),
				'std'   => 'on',
			),
			array(
				'label' => esc_html__( 'Use Sidebar', 'theissue' ),
				'id'    => 'sidebar',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'Displays the Page Sidebar on this page.', 'theissue' ),
				'std'   => 'off',
			),
			array(
				'label'     => esc_html__( 'Use Custom Sidebar', 'theissue' ),
				'id'        => 'custom_sidebar',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Select another sidebar to display on this page.', 'theissue' ),
				'std'       => 'off',
				'condition' => 'use_sidebar:is(on)',
			),
			array(
				'label'     => esc_html__( 'Select Sidebar to use', 'theissue' ),
				'id'        => 'custom_sidebar_id',
				'type'      => 'sidebar_select',
				'desc'      => esc_html__( 'Select another sidebar to display on this page.', 'theissue' ),
				'std'       => 'off',
				'condition' => 'use_sidebar:is(on)',
			),
		),
	);

	$post_metabox = array(
		'id'       => 'post_meta_style',
		'title'    => esc_html__( 'Post Settings', 'theissue' ),
		'pages'    => apply_filters(
			'theissue_post_metabox_pages',
			array( 'post' )
		),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'    => 'tab0',
				'label' => esc_html__( 'General', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Primary Category', 'theissue' ),
				'id'    => 'post-primary-category',
				'type'  => 'category_select_auto',
				'desc'  => esc_html__( 'If the article has multiple categories, the one selected here will be used if you have selected "Display Primary Category Only" inside theme options.', 'theissue' ),
			),
			array(
				'label' => esc_html__( 'Override Featured Image?', 'theissue' ),
				'id'    => 'featured_image_override',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'When enabled, the image selected here will be displayed on article page, not the featured image.', 'theissue' ),
				'std'   => 'off',
			),
			array(
				'label'     => esc_html__( 'Override Featured Image Selection', 'theissue' ),
				'id'        => 'featured_image_override_id',
				'type'      => 'upload',
				'desc'      => esc_html__( 'Select which image to use as the featured image.', 'theissue' ),
				'class'     => 'ot-upload-attachment-id',
				'condition' => 'featured_image_override:is(on)',
			),
			array(
				'label' => esc_html__( 'Featured Image Credit', 'theissue' ),
				'id'    => 'standard-featured-credit',
				'type'  => 'text',
				'desc'  => esc_html__( 'Featured Image Credit, enter the copyright information for your featured image if needed.', 'theissue' ),
				'std'   => '',
			),
			array(
				'label'    => esc_html__( 'Via Source', 'theissue' ),
				'id'       => 'post_via',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'You can add via sources for your articles here', 'theissue' ),
				'settings' => array(
					array(
						'label' => esc_html__( 'Via Source URL', 'theissue' ),
						'id'    => 'post_source_url',
						'desc'  => esc_html__( 'Enter a URL for your via source here', 'theissue' ),
						'type'  => 'text',
					),
				),
			),
			array(
				'label'    => esc_html__( 'Source', 'theissue' ),
				'id'       => 'post_source',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'You can add sources for your articles here', 'theissue' ),
				'settings' => array(
					array(
						'label' => esc_html__( 'Source URL', 'theissue' ),
						'id'    => 'post_source_url',
						'desc'  => esc_html__( 'Enter a URL for your source here', 'theissue' ),
						'type'  => 'text',
					),
				),
			),
			array(
				'id'    => 'tab1',
				'label' => esc_html__( 'Article Layout', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Override Default Article Style?', 'theissue' ),
				'id'    => 'article_style_override',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'You can change the article style here', 'theissue' ),
				'std'   => 'off',
			),
			array(
				'label'     => esc_html__( 'Article Style', 'theissue' ),
				'id'        => 'post_style',
				'type'      => 'radio-image',
				'std'       => 'style1',
				'condition' => 'article_style_override:is(on)',
			),
			array(
				'id'    => 'tab3',
				'label' => esc_html__( 'Gallery Format', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Gallery Photos', 'theissue' ),
				'id'    => 'post-gallery-photos',
				'desc'  => esc_html__( 'Images selected here will be displayed inside the gallery.', 'theissue' ),
				'type'  => 'gallery',
			),
			array(
				'label' => esc_html__( 'Gallery Style', 'theissue' ),
				'id'    => 'post_gallery_style',
				'type'  => 'radio-image',
				'std'   => 'lightbox',
			),
			array(
				'id'    => 'tab4',
				'label' => esc_html__( 'Video Format', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Video URL', 'theissue' ),
				'id'    => 'post_video',
				'type'  => 'text',
				'desc'  => esc_html__( 'Video URL. You can find a list of websites you can embed here: <a href="http://codex.wordpress.org/Embeds">Wordpress Embeds</a>. Please make sure that you have also assigned a Featured Image to your post or the video background area will not be displayed.', 'theissue' ),
			),
			array(
				'id'    => 'tab5',
				'label' => esc_html__( 'Reviews', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'label' => esc_html__( 'Enable Reviews', 'theissue' ),
				'id'    => 'post_review',
				'type'  => 'on_off',
				'desc'  => esc_html__( 'Select yes, if you would like to display a review.', 'theissue' ),
				'std'   => 'off',
			),
			array(
				'label'     => esc_html__( 'Reviews Style', 'theissue' ),
				'id'        => 'post_review_style',
				'type'      => 'radio-image',
				'std'       => 'style1',
				'condition' => 'post_review:is(on)',
			),
			array(
				'label'     => esc_html__( 'Review Background', 'theissue' ),
				'id'        => 'post_review_bg',
				'type'      => 'upload',
				'desc'      => esc_html__( 'You can change the review background here.', 'theissue' ),
				'class'     => 'ot-upload-attachment-id',
				'operator'  => 'and',
				'condition' => 'post_review:is(on),post_review_style:is(style2)',
			),
			array(
				'label'        => esc_html__( 'Score', 'theissue' ),
				'id'           => 'post_review_average',
				'desc'         => esc_html__( 'Value should be between 0-100', 'theissue' ),
				'std'          => '50',
				'type'         => 'numeric-slider',
				'min_max_step' => '0,100,1',
				'condition'    => 'post_review:is(on)',
			),
			array(
				'label'     => esc_html__( 'Comments Positive/Negative', 'theissue' ),
				'id'        => 'post_review_comments',
				'type'      => 'list-item',
				'settings'  => array(
					array(
						'label'   => esc_html__( 'Comment Type', 'theissue' ),
						'id'      => 'feature_comment_type',
						'type'    => 'radio',
						'desc'    => esc_html__( 'Is this a negative or a positive comment?', 'theissue' ),
						'choices' => array(
							array(
								'label' => esc_html__( 'Positive', 'theissue' ),
								'value' => 'positive',
							),
							array(
								'label' => esc_html__( 'Negative', 'theissue' ),
								'value' => 'negative',
							),
						),
						'std'     => 'negative',
					),
				),
				'condition' => 'post_review:is(on)',
			),
			array(
				'id'    => 'tab6',
				'label' => esc_html__( 'Shop The Look', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'id'    => 'post_shopthelook',
				'label' => esc_html__( 'Select Products', 'theissue' ),
				'desc'  => esc_html__( 'Select products to display inside the Shop The Look section. Requires WooCommerce.', 'theissue' ),
				'type'  => 'product_select',
			),
			array(
				'id'    => 'tab7',
				'label' => esc_html__( 'Multiple Authors', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'id'    => 'post_multiauthor',
				'label' => esc_html__( 'Additional Authors for this post.', 'theissue' ),
				'desc'  => esc_html__( 'Select additional authors for the post.', 'theissue' ),
				'type'  => 'author_select_ajax',
			),
			array(
				'id'    => 'tab8',
				'label' => esc_html__( 'Read More', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'id'    => 'post_readmore',
				'label' => esc_html__( 'Select Articles', 'theissue' ),
				'desc'  => esc_html__( 'Select related articles to display inside the "Read More" section.', 'theissue' ),
				'type'  => 'post_select_ajax',
			),
			array(
				'id'    => 'tab9',
				'label' => esc_html__( 'Executive Summary', 'theissue' ),
				'type'  => 'tab',
			),
			array(
				'id'   => 'executive_summary',
				'type' => 'textarea_simple',
				'rows' => '3',
				'desc' => esc_html__( 'Each line will be interpreted as a bullet under the article title.', 'theissue' ),
			),
		),
	);
	/**
	 * Register our meta boxes using the
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box( $page_metabox );
	ot_register_meta_box( $post_metabox );
}
function thb_run_after_title_meta_boxes() {
		global $post, $wp_meta_boxes;
		// Output the `below_title` meta boxes:
		do_meta_boxes( get_current_screen(), 'after_title', $post );
}
add_action( 'edit_form_after_title', 'thb_run_after_title_meta_boxes' );
