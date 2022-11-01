<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'thb_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function thb_custom_theme_options() {

	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option( 'option_tree_settings', array() );

	/**
	 * Create a custom settings array that we pass to
	 * the OptionTree Settings API Class.
	 */
	$custom_settings = array(
		'sections' => array(
			array(
				'title' => esc_html__( 'General', 'theissue' ),
				'id'    => 'general',
			),
			array(
				'title' => esc_html__( 'Sub-Header', 'theissue' ),
				'id'    => 'subheader',
			),
			array(
				'title' => esc_html__( 'Header', 'theissue' ),
				'id'    => 'header',
			),
			array(
				'title' => esc_html__( 'Menu', 'theissue' ),
				'id'    => 'menu',
			),
			array(
				'title' => esc_html__( 'Newsletter', 'theissue' ),
				'id'    => 'newsletter',
			),
			array(
				'title' => esc_html__( 'Articles', 'theissue' ),
				'id'    => 'article',
			),
			array(
				'title' => esc_html__( 'Layouts', 'theissue' ),
				'id'    => 'layouts',
			),
			array(
				'title' => esc_html__( 'Shop', 'theissue' ),
				'id'    => 'shop',
			),
			array(
				'title' => esc_html__( 'Footer', 'theissue' ),
				'id'    => 'footer',
			),
			array(
				'title' => esc_html__( 'Typography', 'theissue' ),
				'id'    => 'typography',
			),
			array(
				'title' => esc_html__( 'Customization', 'theissue' ),
				'id'    => 'customization',
			),
			array(
				'title' => esc_html__( 'Advertising', 'theissue' ),
				'id'    => 'advertising',
			),
			array(
				'title' => esc_html__( 'Misc', 'theissue' ),
				'id'    => 'misc',
			),
			array(
				'title' => esc_html__( 'GDPR', 'theissue' ),
				'id'    => 'gdpr',
			),
		),
		'settings' => array(
			array(
				'id'      => 'general_tab0',
				'label'   => esc_html__( 'General', 'theissue' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'id'      => 'subscribe_text',
				'label'   => esc_html__( 'Download Subscription Emails', 'theissue' ),
				'desc'    => __( 'You can download the subscribed emails through the subscription element/widget here: <br><br> <a href="?thb_download_emails=true" class="button button-primary">Download Emails</a>', 'theissue' ),
				'type'    => 'textblock',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Dark Mode', 'theissue' ),
				'id'      => 'thb_dark_mode',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles Dark Mode.', 'theissue' ),
				'std'     => 'off',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Boxed', 'theissue' ),
				'id'      => 'general_boxed',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Wraps the body of the site content in a wrapper so that you can have different background color, similar to our demo, Issue - 07.', 'theissue' ),
				'std'     => 'off',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Lazy Load Images', 'theissue' ),
				'id'      => 'lazy_load',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle lazy-loading of images here.', 'theissue' ),
				'section' => 'general',
				'std'     => 'on',
			),
			array(
				'label'   => esc_html__( 'AJAX Search', 'theissue' ),
				'id'      => 'general_search_ajax',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle Ajax search on the search screen.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Pin-It Button for Images', 'theissue' ),
				'id'      => 'thb_pinit',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle Pin it functionality for your images.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Capitalized Article Titles', 'theissue' ),
				'id'      => 'general_capitalize',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When you toggle this on, all article titles will be capitalized.', 'theissue' ),
				'std'     => 'off',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Parallax Effects', 'theissue' ),
				'id'      => 'general_parallax',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can turn off the parallax effects and background videos for posts here.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Widget Style', 'theissue' ),
				'id'      => 'widget_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'general',
			),
			array(
				'id'      => 'general_tab1',
				'label'   => esc_html__( 'Article Meta', 'theissue' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Category', 'theissue' ),
				'id'      => 'post_meta_cat',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying article categories on listing pages.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'     => esc_html__( 'Display Primary Category', 'theissue' ),
				'id'        => 'post_meta_cat_primary',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Displays a single primary category instead of multiple categories.', 'theissue' ),
				'std'       => 'off',
				'section'   => 'general',
				'condition' => 'post_meta_cat:is(on)',
			),
			array(
				'label'   => esc_html__( 'Article Author', 'theissue' ),
				'id'      => 'post_meta_author',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying author name on listing pages.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Date', 'theissue' ),
				'id'      => 'post_meta_date',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying article date on listing pages.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Reading Time', 'theissue' ),
				'id'      => 'post_meta_reading_time',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying article reading time on listing pages.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Article Sharing', 'theissue' ),
				'id'      => 'post_meta_sharing',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Toggles displaying shares on listing pages.', 'theissue' ),
				'std'     => 'on',
				'section' => 'general',
			),
			array(
				'label'     => esc_html__( 'Article Sharing Icons', 'theissue' ),
				'id'        => 'post_meta_sharing_icons',
				'type'      => 'social_checkbox',
				'desc'      => esc_html__( 'You can choose which social networks to display on listing pages.', 'theissue' ),
				'section'   => 'general',
				'condition' => 'post_meta_sharing:is(on)',
			),
			array(
				'id'      => 'general_tab2',
				'label'   => esc_html__( 'Social Links', 'theissue' ),
				'type'    => 'tab',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Facebook Username', 'theissue' ),
				'id'      => 'social_facebook_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Facebook Access Token', 'theissue' ),
				'id'      => 'social_fb_access_token',
				'type'    => 'text',
				'desc'    => __( 'Please enter your Facebook Access Token here. You need to make sure that you have a <b>Verified Business Account</b> here: <a href="https://business.facebook.com/" target="_blank">https://business.facebook.com/</a>. <i>Here is a tutorial on how to get your access token: <a href="https://elfsight.com/blog/2017/10/how-to-get-facebook-access-token/" target="_blank">https://elfsight.com/blog/2017/10/how-to-get-facebook-access-token/</a></i>', 'theissue' ),
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Twitter Username', 'theissue' ),
				'id'      => 'social_twitter_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Instagram Username', 'theissue' ),
				'id'      => 'social_instagram_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Pinterest Username', 'theissue' ),
				'id'      => 'social_pinterest_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Youtube ID', 'theissue' ),
				'id'      => 'social_youtube_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Youtube Type', 'theissue' ),
				'id'      => 'social_youtube_type',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Is this a channel or a user?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Channel', 'theissue' ),
						'value' => 'channel',
					),
					array(
						'label' => esc_html__( 'Username', 'theissue' ),
						'value' => 'username',
					),
				),
				'std'     => 'channel',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Google API Key for Youtube', 'theissue' ),
				'id'      => 'social_youtube_api_key',
				'type'    => 'text',
				'desc'    => __( 'Please enter the Google Api Key for Youtube. You need to create a Credential that has access to YouTube Data API v3. Please visit <a href="https://cloud.google.com/" target="_blank">https://cloud.google.com/</a>', 'theissue' ),
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Medium Username', 'theissue' ),
				'id'      => 'social_medium_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Vimeo User ID', 'theissue' ),
				'id'      => 'social_vimeo_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Linkedin ID', 'theissue' ),
				'id'      => 'social_linkedin_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Linkedin Type', 'theissue' ),
				'id'      => 'social_linkedin_type',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Is this a person or a business?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Personal', 'theissue' ),
						'value' => 'personal',
					),
					array(
						'label' => esc_html__( 'Business', 'theissue' ),
						'value' => 'business',
					),
				),
				'std'     => 'business',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'Telegram Channel ID', 'theissue' ),
				'id'      => 'social_telegram_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'label'   => esc_html__( 'WhatsApp', 'theissue' ),
				'id'      => 'social_whatsapp_user',
				'type'    => 'text',
				'section' => 'general',
			),
			array(
				'id'      => 'newsletter_tab0',
				'label'   => esc_html__( 'General', 'theissue' ),
				'type'    => 'tab',
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'Display Newsletter Popup?', 'theissue' ),
				'id'      => 'newsletter',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Newsletter Popup?', 'theissue' ),
				'std'     => 'on',
				'section' => 'newsletter',
			),
			array(
				'label'     => esc_html__( 'Newsletter Lightbox Color', 'theissue' ),
				'id'        => 'newsletter_lightbox_color',
				'type'      => 'radio-image',
				'desc'      => esc_html__( 'You can choose your newsletter lightbox color here.', 'theissue' ),
				'std'       => 'light',
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter refresh interval', 'theissue' ),
				'id'        => 'newsletter-interval',
				'type'      => 'radio',
				'desc'      => esc_html__( 'When the user closes the popup, the newsletter will not be visible on the next page. After the below period, its going to be visible again unless he closes it again', 'theissue' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'Never - the popup will be shown every page', 'theissue' ),
						'value' => '0',
					),
					array(
						'label' => esc_html__( '1 Day', 'theissue' ),
						'value' => '1',
					),
					array(
						'label' => esc_html__( '2 Days', 'theissue' ),
						'value' => '2',
					),
					array(
						'label' => esc_html__( '3 Days', 'theissue' ),
						'value' => '3',
					),
					array(
						'label' => esc_html__( '1 Week', 'theissue' ),
						'value' => '7',
					),
					array(
						'label' => esc_html__( '2 Weeks', 'theissue' ),
						'value' => '14',
					),
					array(
						'label' => esc_html__( '3 Weeks', 'theissue' ),
						'value' => '21',
					),
					array(
						'label' => esc_html__( '1 Month', 'theissue' ),
						'value' => '30',
					),

				),
				'std'       => '1',
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'label'        => esc_html__( 'Newsletter Delay', 'theissue' ),
				'id'           => 'newsletter_delay',
				'std'          => '0',
				'type'         => 'numeric-slider',
				'min_max_step' => '0,120,1',
				'desc'         => esc_html__( 'You can delay the newsletter popup reveal by certain seconds.', 'theissue' ),
				'section'      => 'newsletter',
				'condition'    => 'newsletter:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter Image', 'theissue' ),
				'id'        => 'newsletter_image',
				'type'      => 'upload',
				'class'     => 'ot-upload-attachment-id',
				'desc'      => esc_html__( 'You can add an image to your newsletter if you want. This is optional.', 'theissue' ),
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter Background', 'theissue' ),
				'id'        => 'newsletter_bg',
				'type'      => 'background',
				'desc'      => esc_html__( 'You can change the background of the newsletter from here.', 'theissue' ),
				'section'   => 'newsletter',
				'condition' => 'newsletter:is(on)',
			),
			array(
				'id'      => 'newsletter_tab1',
				'label'   => esc_html__( 'Phrases & Translation', 'theissue' ),
				'type'    => 'tab',
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'Enable Translation & Disable language file', 'theissue' ),
				'id'      => 'newsletter_translation',
				'type'    => 'on_off',
				'desc'    => wp_kses_post( 'By enabling this, you are overriding the language files. This is not recommended if you are running a multi-language website. <em>Newsletter widgets and page builder elements have their own options to change the phrases.</em>', 'theissue' ),
				'std'     => 'off',
				'section' => 'newsletter',
			),
			array(
				'label'     => esc_html__( 'Newsletter Title', 'theissue' ),
				'id'        => 'newsletter_translation_title',
				'type'      => 'text',
				'section'   => 'newsletter',
				'condition' => 'newsletter_translation:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter Text', 'theissue' ),
				'id'        => 'newsletter_translation_text',
				'type'      => 'text',
				'section'   => 'newsletter',
				'condition' => 'newsletter_translation:is(on)',
			),
			array(
				'label'     => esc_html__( 'Newsletter GDPR Checkbox Text', 'theissue' ),
				'id'        => 'newsletter_checkbox_text',
				'type'      => 'text',
				'section'   => 'newsletter',
				'condition' => 'newsletter_translation:is(on)',
			),
			array(
				'id'      => 'newsletter_tab2',
				'label'   => esc_html__( 'MailChimp Integration', 'theissue' ),
				'type'    => 'tab',
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'MailChimp API Key', 'theissue' ),
				'id'      => 'newsletter_mailchimp_api',
				'type'    => 'text',
				'desc'    => wp_kses_post( '1) Log in to your MailChimp account.<br>2) Go to your Account.<br>3) Click the Extras drop-down menu and choose API keys.<br>4) Copy an existing API key or create a new one.<br>5) After saving your Theme Options, please choose a mail list below.', 'theissue' ),
				'section' => 'newsletter',
			),
			array(
				'label'   => esc_html__( 'MailChimp List', 'theissue' ),
				'id'      => 'newsletter_mailchimp_list',
				'type'    => 'mc_list_select',
				'desc'    => esc_html__( 'Your MailChimp lists will appear here after you have entered your API key and saved your Theme Options.', 'theissue' ),
				'std'     => '',
				'section' => 'newsletter',
			),
			array(
				'id'      => 'article_tab0',
				'label'   => esc_html__( 'General', 'theissue' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Article Top Content', 'theissue' ),
				'id'      => 'article_top_content',
				'type'    => 'page-select',
				'desc'    => esc_html__( 'This allows you to add contents of a page just above the article page. For example, a carousel for latest posts.', 'theissue' ),
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Article Top Content', 'theissue' ),
				'id'      => 'article_top_content',
				'type'    => 'page-select',
				'desc'    => esc_html__( 'This allows you to add contents of a page just above the article page. For example, a carousel for latest posts.', 'theissue' ),
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Default Article Style', 'theissue' ),
				'id'      => 'article_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Sidebar on Mobile', 'theissue' ),
				'id'      => 'article_sidebar_mobile',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Sidebar is hidden on mobile by default.', 'theissue' ),
				'std'     => 'off',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Infinite loading on Article Pages', 'theissue' ),
				'id'      => 'infinite_load',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can disable infinite scrolling on article pages', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( 'Restrict Infinite loading to Same Categories?', 'theissue' ),
				'id'        => 'infinite_load_category',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'You can restrict infinite scrolling to articles in the same category.', 'theissue' ),
				'std'       => 'off',
				'section'   => 'article',
				'condition' => 'infinite_load:is(on)',
			),
			array(
				'label'     => esc_html__( 'Number of Infinite Loaded Articles', 'theissue' ),
				'id'        => 'infinite_count',
				'type'      => 'text',
				'desc'      => esc_html__( 'Number of articles to load on scroll. Leave empty for no limit.', 'theissue' ),
				'section'   => 'article',
				'condition' => 'infinite_load:is(on)',
			),
			array(
				'label'   => esc_html__( 'DropCap', 'theissue' ),
				'id'      => 'article_dropcap',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the dropcap of the first letter of article text here.', 'theissue' ),
				'std'     => 'off',
				'section' => 'article',
			),
			array(
				'id'      => 'article_tab1',
				'label'   => esc_html__( 'Sharing Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Share Counts?', 'theissue' ),
				'id'      => 'sharing_counts',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can disable showing article counts.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => 'Article Top Sharing buttons',
				'id'      => 'sharing_buttons_top',
				'type'    => 'social_checkbox',
				'desc'    => 'You can choose which social networks to display and get counts from. ',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Article Top Share Style', 'theissue' ),
				'id'      => 'sharing_buttons_top_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( 'Display Read Next?', 'theissue' ),
				'id'        => 'sharing_style1_readnext',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'You can disable Read Next feature here', 'theissue' ),
				'std'       => 'on',
				'section'   => 'article',
				'operator'  => 'or',
				'condition' => 'sharing_buttons_top_style:is(style1),sharing_buttons_top_style:is(style2),sharing_buttons_top_style:is(style3),sharing_buttons_top_style:is(style4)',
			),
			array(
				'label'   => 'Article Bottom Sharing buttons',
				'id'      => 'sharing_buttons_bottom',
				'type'    => 'social_checkbox',
				'desc'    => 'You can choose which social networks to display and get counts from. ',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Article Bottom Share Style', 'theissue' ),
				'id'      => 'sharing_buttons_bottom_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'article',
			),
			array(
				'label'   => 'Fixed Header Sharing Buttons',
				'id'      => 'sharing_buttons_fixed',
				'type'    => 'social_checkbox',
				'desc'    => 'You can choose which social networks to display and get counts from.',
				'section' => 'article',
			),
			array(
				'id'      => 'article_tab2',
				'label'   => esc_html__( 'Article Blocks', 'theissue' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Category?', 'theissue' ),
				'id'      => 'article_cat',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays article category over article title', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( 'Display Primary Category', 'theissue' ),
				'id'        => 'article_cat_primary',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Displays a single primary category instead of multiple categories.', 'theissue' ),
				'std'       => 'off',
				'section'   => 'article',
				'condition' => 'article_cat:is(on)',
			),
			array(
				'label'   => esc_html__( 'Display Author Name?', 'theissue' ),
				'id'      => 'article_author_name',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This hides the Author Name below the article title.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Article Date?', 'theissue' ),
				'id'      => 'article_date',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This hides the Author Date below the article title.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Tags?', 'theissue' ),
				'id'      => 'article_tags',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays article tags at the bottom', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display "See Also" Article?', 'theissue' ),
				'id'      => 'article_seealso',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays a post related by categories inside the post content approximately after 60% of content. ', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( '"See Also" Relation', 'theissue' ),
				'id'        => 'article_seealso_relation',
				'type'      => 'radio',
				'desc'      => esc_html__( 'How should "See Also" articles be chosen?', 'theissue' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'Related by Categories', 'theissue' ),
						'value' => 'cats',
					),
					array(
						'label' => esc_html__( 'Related by Tags', 'theissue' ),
						'value' => 'tags',
					),
				),
				'std'       => 'cats',
				'section'   => 'article',
				'condition' => 'article_seealso:is(on)',
			),
			array(
				'label'     => esc_html__( '"See Also" Article Date Limit', 'theissue' ),
				'id'        => 'article_seealso_date',
				'type'      => 'radio',
				'desc'      => esc_html__( 'Related modified in the last X months will appear', 'theissue' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'All Time', 'theissue' ),
						'value' => '0',
					),
					array(
						'label' => esc_html__( '1 Month Ago', 'theissue' ),
						'value' => '1',
					),
					array(
						'label' => esc_html__( '3 Months Ago', 'theissue' ),
						'value' => '3',
					),
					array(
						'label' => esc_html__( '6 Months Ago', 'theissue' ),
						'value' => '6',
					),
					array(
						'label' => esc_html__( '12 Months Ago', 'theissue' ),
						'value' => '12',
					),
				),
				'std'       => '12',
				'section'   => 'article',
				'condition' => 'article_seealso:is(on)',
			),
			array(
				'label'   => esc_html__( 'Display Subscribe Box?', 'theissue' ),
				'id'      => 'article_subscribe',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays a subcription box at the bottom of the post.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Reactions?', 'theissue' ),
				'id'      => 'article_reactions',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays Reactions at the bottom of the post.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Author Info?', 'theissue' ),
				'id'      => 'article_author',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays author information at the bottom. Will only be displayed if the author description is filled.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Article Navigation?', 'theissue' ),
				'id'      => 'blog_nav',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays article navigation at the bottom', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( 'Limit Article Navigation to Same Categories?', 'theissue' ),
				'id'        => 'blog_nav_cat',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'When enabled, the prev/next posts will be limited to same categories.', 'theissue' ),
				'std'       => 'off',
				'section'   => 'article',
				'condition' => 'blog_nav:is(on)',
			),
			array(
				'id'      => 'article_tab3',
				'label'   => esc_html__( 'Related Articles', 'theissue' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Related Articles?', 'theissue' ),
				'id'      => 'article_related',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Displays related articles at the bottom.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'     => esc_html__( 'Related Articles Source', 'theissue' ),
				'id'        => 'article_related_relation',
				'type'      => 'radio',
				'desc'      => esc_html__( 'How should Related articles be chosen?', 'theissue' ),
				'choices'   => array(
					array(
						'label' => esc_html__( 'Related by Categories', 'theissue' ),
						'value' => 'cats',
					),
					array(
						'label' => esc_html__( 'Related by Tags', 'theissue' ),
						'value' => 'tags',
					),
				),
				'std'       => 'tags',
				'section'   => 'article',
				'condition' => 'article_related:is(on)',
			),
			array(
				'label'     => esc_html__( 'Related Articles Style', 'theissue' ),
				'id'        => 'article_related_style',
				'type'      => 'radio-image',
				'std'       => 'style1',
				'section'   => 'article',
				'condition' => 'article_related:is(on)',
			),
			array(
				'id'           => 'article_related_count',
				'label'        => esc_html__( 'Number of Related Articles', 'theissue' ),
				'type'         => 'numeric-slider',
				'min_max_step' => '3,12,1',
				'std'          => '6',
				'section'      => 'article',
				'condition'    => 'article_related:is(on)',
			),
			array(
				'id'      => 'article_tab4',
				'label'   => esc_html__( 'Lightbox Gallery', 'theissue' ),
				'type'    => 'tab',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Lightbox Color', 'theissue' ),
				'id'      => 'lightbox_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'Changes Lightbox color for the lightbox galleries', 'theissue' ),
				'std'     => 'lightbox-light',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Post Title', 'theissue' ),
				'id'      => 'lightbox_post_title',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This toggles displaying the post title inside the lightbox.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Image Title', 'theissue' ),
				'id'      => 'lightbox_image_title',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This toggles displaying the image title inside the lightbox.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Image Caption', 'theissue' ),
				'id'      => 'lightbox_image_caption',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This toggles displaying the image caption inside the lightbox.', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'label'   => esc_html__( 'Display Image Source', 'theissue' ),
				'id'      => 'lightbox_image_source',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This toggles displaying the image source inside the lightbox. Uses the Image Description', 'theissue' ),
				'std'     => 'on',
				'section' => 'article',
			),
			array(
				'id'      => 'archives_tab0',
				'label'   => esc_html__( 'Archive', 'theissue' ),
				'type'    => 'tab',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Layout', 'theissue' ),
				'id'      => 'archive_layout',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Archive Pagination Style', 'theissue' ),
				'id'      => 'archive_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on archive pages?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'theissue' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'id'      => 'archives_tab1',
				'label'   => esc_html__( 'Category', 'theissue' ),
				'type'    => 'tab',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Layout', 'theissue' ),
				'id'      => 'category_layout',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Category Pagination Style', 'theissue' ),
				'id'      => 'category_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on category pages?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'theissue' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'id'      => 'archives_tab2',
				'label'   => esc_html__( 'Tag', 'theissue' ),
				'type'    => 'tab',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Layout', 'theissue' ),
				'id'      => 'tag_layout',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Tag Pagination Style', 'theissue' ),
				'id'      => 'tag_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on tag pages?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'theissue' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'id'      => 'archives_tab3',
				'label'   => esc_html__( 'Search', 'theissue' ),
				'type'    => 'tab',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Layout', 'theissue' ),
				'id'      => 'search_layout',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Search Pagination Style', 'theissue' ),
				'id'      => 'search_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on search pages?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'theissue' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Display Search Filters?', 'theissue' ),
				'id'      => 'search_filters',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Search Filters', 'theissue' ),
				'std'     => 'on',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Date Range Filter', 'theissue' ),
				'id'      => 'search_filter_date',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Date Filter?', 'theissue' ),
				'std'     => 'on',
				'section' => 'layouts',
				'cond'    => 'search_filters:is(on)',
			),
			array(
				'label'   => esc_html__( 'Category Filter', 'theissue' ),
				'id'      => 'search_filter_category',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Category Filter?', 'theissue' ),
				'std'     => 'on',
				'section' => 'layouts',
				'cond'    => 'search_filters:is(on)',
			),
			array(
				'label'   => esc_html__( 'Author Filter', 'theissue' ),
				'id'      => 'search_filter_author',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Author Filter?', 'theissue' ),
				'std'     => 'on',
				'section' => 'layouts',
				'cond'    => 'search_filters:is(on)',
			),
			array(
				'id'      => 'archives_tab4',
				'label'   => esc_html__( 'Author', 'theissue' ),
				'type'    => 'tab',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Layout', 'theissue' ),
				'id'      => 'author_layout',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'label'   => esc_html__( 'Author Pagination Style', 'theissue' ),
				'id'      => 'author_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on author pages?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'theissue' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'layouts',
			),
			array(
				'id'      => 'shop_tab0',
				'label'   => esc_html__( 'General', 'theissue' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Catalog Mode', 'theissue' ),
				'id'      => 'shop_catalog_mode',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, this will hide add to cart buttons and prices along the site.', 'theissue' ),
				'section' => 'shop',
				'std'     => 'off',
			),
			array(
				'label'   => esc_html__( 'Shop Full-Width', 'theissue' ),
				'id'      => 'shop_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'If enabled, the shop page will be full-width', 'theissue' ),
				'section' => 'shop',
				'std'     => 'off',
			),
			array(
				'label'   => esc_html__( 'Product Listing Style', 'theissue' ),
				'id'      => 'shop_product_listing',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Listing Layout', 'theissue' ),
				'id'      => 'shop_product_listing_layout',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which layout would you like to use on listing pages?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Grid', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Alternating - 3 / 4 columns', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Alternating - 4 / 5 columns', 'theissue' ),
						'value' => 'style3',
					),
					array(
						'label' => esc_html__( 'Alternating - 5 / 6 columns', 'theissue' ),
						'value' => 'style4',
					),
					array(
						'label' => esc_html__( 'Alternating - 4 / 3 columns', 'theissue' ),
						'value' => 'style5',
					),
					array(
						'label' => esc_html__( 'Alternating - 5 / 4 columns', 'theissue' ),
						'value' => 'style6',
					),
					array(
						'label' => esc_html__( 'Alternating - 6 / 5 columns', 'theissue' ),
						'value' => 'style7',
					),
					array(
						'label' => esc_html__( 'Alternating - 4 / 4 / 3 columns', 'theissue' ),
						'value' => 'style8',
					),
				),
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'     => esc_html__( 'Products Per Row', 'theissue' ),
				'id'        => 'products_per_row',
				'std'       => 'thb-5',
				'type'      => 'radio',
				'choices'   => array(
					array(
						'label' => esc_html__( '2 Columns', 'theissue' ),
						'value' => 'large-6',
					),
					array(
						'label' => esc_html__( '3 Columns', 'theissue' ),
						'value' => 'large-4',
					),
					array(
						'label' => esc_html__( '4 Columns', 'theissue' ),
						'value' => 'large-3',
					),
					array(
						'label' => esc_html__( '5 Columns', 'theissue' ),
						'value' => 'thb-5',
					),
					array(
						'label' => esc_html__( '6 Columns', 'theissue' ),
						'value' => 'large-2',
					),
				),
				'section'   => 'shop',
				'condition' => 'shop_product_listing_layout:is(style1)',
			),
			array(
				'label'   => esc_html__( 'Product Pagination Style', 'theissue' ),
				'id'      => 'shop_product_listing_pagination',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which pagination syle would you like to use on shop page?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Regular Pagination', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Load More Button', 'theissue' ),
						'value' => 'style2',
					),
					array(
						'label' => esc_html__( 'Infinite Load', 'theissue' ),
						'value' => 'style3',
					),
				),
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Products Per Page', 'theissue' ),
				'id'      => 'products_per_page',
				'type'    => 'text',
				'section' => 'shop',
				'std'     => '12',
			),
			array(
				'label'   => esc_html__( 'Product Hover Image', 'theissue' ),
				'id'      => 'shop_product_hover',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When enabled, this shows a secondary product image on hover.', 'theissue' ),
				'section' => 'shop',
				'std'     => 'on',
			),
			array(
				'id'      => 'shop_tab2',
				'label'   => esc_html__( 'Product Page', 'theissue' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product Page Style', 'theissue' ),
				'id'      => 'shop_product_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Use Lightbox or Zoom?', 'theissue' ),
				'id'      => 'shop_product_lightbox',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Would you like to use a lightbox or a mouse hover zoom?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Lightbox', 'theissue' ),
						'value' => 'lightbox',
					),
					array(
						'label' => esc_html__( 'Zoom', 'theissue' ),
						'value' => 'zoom',
					),

				),
				'std'     => 'lightbox',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Use Ajax Add To Cart?', 'theissue' ),
				'id'      => 'shop_product_ajax_addtocart',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to use Ajax Add to Cart on product pages?', 'theissue' ),
				'std'     => 'on',
				'section' => 'shop',
			),
			array(
				'id'      => 'shop_tab4',
				'label'   => esc_html__( 'Misc', 'theissue' ),
				'type'    => 'tab',
				'section' => 'shop',
			),
			array(
				'label'   => esc_html__( 'Product "Just Arrived" Badge time', 'theissue' ),
				'id'      => 'shop_newness',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Products that are added before the below time will display the new product page', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Never - "Just Arrived" Badge will never be shown', 'theissue' ),
						'value' => '0',
					),
					array(
						'label' => esc_html__( '1 Day', 'theissue' ),
						'value' => '1',
					),
					array(
						'label' => esc_html__( '2 Days', 'theissue' ),
						'value' => '2',
					),
					array(
						'label' => esc_html__( '3 Days', 'theissue' ),
						'value' => '3',
					),
					array(
						'label' => esc_html__( '1 Week', 'theissue' ),
						'value' => '7',
					),
					array(
						'label' => esc_html__( '2 Weeks', 'theissue' ),
						'value' => '14',
					),
					array(
						'label' => esc_html__( '3 Weeks', 'theissue' ),
						'value' => '21',
					),
					array(
						'label' => esc_html__( '1 Month', 'theissue' ),
						'value' => '30',
					),
				),
				'std'     => '7',
				'section' => 'shop',
			),
			array(
				'id'      => 'subheader_tab0',
				'label'   => esc_html__( 'Sub-Header Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Display Sub-Header', 'theissue' ),
				'id'      => 'subheader',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Sub-Header?', 'theissue' ),
				'std'     => 'off',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Sub-Header Full Width', 'theissue' ),
				'id'      => 'thb_subheader_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'By default, the subheader on Peak Shops is limited to the grid, you can make it full width here.', 'theissue' ),
				'std'     => 'off',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Display Sub-Header on Mobile?', 'theissue' ),
				'id'      => 'subheader_mobile',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Sub-Header on mobile screens?', 'theissue' ),
				'std'     => 'off',
				'section' => 'subheader',
			),
			array(
				'label'   => esc_html__( 'Sub-Header Color', 'theissue' ),
				'id'      => 'subheader_color',
				'type'    => 'radio-image',
				'std'     => 'light',
				'section' => 'subheader',
			),
			array(
				'id'      => 'subheader_tab1',
				'label'   => esc_html__( 'Sub-Header - Left Content', 'theissue' ),
				'type'    => 'tab',
				'section' => 'subheader',
			),
			array(
				'label'    => esc_html__( 'Sections', 'theissue' ),
				'id'       => 'subheader_left_sections',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Add your desired sections here.', 'theissue' ),
				'settings' => array(
					array(
						'label'   => esc_html__( 'Section Type', 'theissue' ),
						'id'      => 'section_type',
						'type'    => 'select',
						'choices' => array(
							array(
								'label' => esc_html__( 'Menu', 'theissue' ),
								'value' => 'menu',
							),
							array(
								'label' => esc_html__( 'Text', 'theissue' ),
								'value' => 'text',
							),
							array(
								'label' => esc_html__( 'Dark/Light Toggle', 'theissue' ),
								'value' => 'dark_mode_toggle',
							),
							array(
								'label' => esc_html__( 'Language Switcher (WPML/Polylang)', 'theissue' ),
								'value' => 'ls',
							),
							array(
								'label' => esc_html__( 'Language Switcher Flags (WPML/Polylang)', 'theissue' ),
								'value' => 'ls_flag',
							),
							array(
								'label' => esc_html__( 'Dark / Light Toggle', 'theissue' ),
								'value' => 'dark_mode_toggle',
							),
							array(
								'label' => esc_html__( 'Social Links', 'theissue' ),
								'value' => 'social',
							),
						),
					),
					array(
						'label'     => esc_html__( 'Sub-Header Text', 'theissue' ),
						'id'        => 'text',
						'type'      => 'textarea',
						'desc'      => esc_html__( 'This content appears on the sub-header', 'theissue' ),
						'rows'      => '4',
						'condition' => 'section_type:is(text)',
					),
					array(
						'label'     => esc_html__( 'Sub-Header Menu', 'theissue' ),
						'id'        => 'menu',
						'type'      => 'menu_select',
						'desc'      => esc_html__( 'Menu to be displayed on the sub-header', 'theissue' ),
						'condition' => 'section_type:is(menu)',
					),
				),
				'section'  => 'subheader',
			),
			array(
				'id'      => 'subheader_tab2',
				'label'   => esc_html__( 'Sub-Header - Right Content', 'theissue' ),
				'type'    => 'tab',
				'section' => 'subheader',
			),
			array(
				'label'    => esc_html__( 'Sections', 'theissue' ),
				'id'       => 'subheader_right_sections',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Add your desired sections here.', 'theissue' ),
				'settings' => array(
					array(
						'label'   => esc_html__( 'Section Type', 'theissue' ),
						'id'      => 'section_type',
						'type'    => 'select',
						'choices' => array(
							array(
								'label' => esc_html__( 'Menu', 'theissue' ),
								'value' => 'menu',
							),
							array(
								'label' => esc_html__( 'Text', 'theissue' ),
								'value' => 'text',
							),
							array(
								'label' => esc_html__( 'Dark/Light Toggle', 'theissue' ),
								'value' => 'dark_mode_toggle',
							),
							array(
								'label' => esc_html__( 'Language Switcher (WPML/Polylang)', 'theissue' ),
								'value' => 'ls',
							),
							array(
								'label' => esc_html__( 'Language Switcher Flags (WPML/Polylang)', 'theissue' ),
								'value' => 'ls_flag',
							),
							array(
								'label' => esc_html__( 'Dark / Light Toggle', 'theissue' ),
								'value' => 'dark_mode_toggle',
							),
							array(
								'label' => esc_html__( 'Social Links', 'theissue' ),
								'value' => 'social',
							),
						),
					),
					array(
						'label'     => esc_html__( 'Sub-Header Text', 'theissue' ),
						'id'        => 'text',
						'type'      => 'textarea',
						'desc'      => esc_html__( 'This content appears on the sub-header', 'theissue' ),
						'rows'      => '4',
						'condition' => 'section_type:is(text)',
					),
					array(
						'label'     => esc_html__( 'Sub-Header Menu', 'theissue' ),
						'id'        => 'menu',
						'type'      => 'menu_select',
						'desc'      => esc_html__( 'Menu to be displayed on the sub-header', 'theissue' ),
						'condition' => 'section_type:is(menu)',
					),
				),
				'section'  => 'subheader',
			),
			array(
				'id'      => 'header_tab0',
				'label'   => esc_html__( 'General Header Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Style', 'theissue' ),
				'id'      => 'header_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Color', 'theissue' ),
				'id'      => 'header_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'Color of the header. You can change the background from Customization > Backgrounds.', 'theissue' ),
				'std'     => 'light-header',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Header Color', 'theissue' ),
				'id'      => 'mobile_header_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'Color of the mobile header if you want to change icons colors, etc for mobile.', 'theissue' ),
				'std'     => 'light-header',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header - Top Content', 'theissue' ),
				'id'      => 'header_top_content',
				'type'    => 'page-select',
				'desc'    => esc_html__( 'This allows you to add contents of a page above the header.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'     => esc_html__( 'Header - Top Content Parallax', 'theissue' ),
				'id'        => 'header_top_content_parallax',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'This adds a parallax effect to the content on top.', 'theissue' ),
				'std'       => 'on',
				'section'   => 'header',
				'condition' => 'header_top_content:not()',
			),
			array(
				'label'     => esc_html__( 'Header - Top Content on Article Pages', 'theissue' ),
				'id'        => 'header_top_content_article',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Display the Header Top Content on Article pages?', 'theissue' ),
				'std'       => 'on',
				'section'   => 'header',
				'condition' => 'header_top_content:not()',
			),
			array(
				'label'     => esc_html__( 'Header - Top Content on Shop Pages', 'theissue' ),
				'id'        => 'header_top_content_shop',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Display the Header Top Content on Shop related pages?', 'theissue' ),
				'std'       => 'on',
				'section'   => 'header',
				'condition' => 'header_top_content:not()',
			),
			array(
				'label'   => esc_html__( 'Header - Left Content', 'theissue' ),
				'id'      => 'header_left_content',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Allows you to add content on the LEFT of the logo if the selected header allows it.', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Nothing', 'theissue' ),
						'value' => '',
					),
					array(
						'label' => esc_html__( 'Social Links', 'theissue' ),
						'value' => 'social-links',
					),
					array(
						'label' => esc_html__( 'Subscribe Button', 'theissue' ),
						'value' => 'subscribe',
					),
					array(
						'label' => esc_html__( 'Advertisement', 'theissue' ),
						'value' => 'advertisement',
					),
				),
				'std'     => '',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header - Right Content', 'theissue' ),
				'id'      => 'header_right_content',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Allows you to add content on the RIGHT of the logo if the selected header allows it.', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Nothing', 'theissue' ),
						'value' => '',
					),
					array(
						'label' => esc_html__( 'Social Links', 'theissue' ),
						'value' => 'social-links',
					),
					array(
						'label' => esc_html__( 'Subscribe Button', 'theissue' ),
						'value' => 'subscribe',
					),
					array(
						'label' => esc_html__( 'Advertisement', 'theissue' ),
						'value' => 'advertisement',
					),
				),
				'std'     => '',
				'section' => 'header',
			),
			array(
				'label'     => esc_html__( 'Social Links - Counts', 'theissue' ),
				'id'        => 'header_content_social_counts',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Display social counts for social links?', 'theissue' ),
				'std'       => 'on',
				'section'   => 'header',
				'operator'  => 'or',
				'condition' => 'header_right_content:is(social-links),header_left_content:is(social-links)',
			),
			array(
				'id'      => 'header_tab1',
				'label'   => esc_html__( 'Fixed Header Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header', 'theissue' ),
				'id'      => 'fixed_header',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Display the fixed header?', 'theissue' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header - Full Width Content', 'theissue' ),
				'id'      => 'fixed_header_fullwidth',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'The contents of the fixed header are full width by default.', 'theissue' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'     => esc_html__( 'Fixed Header Color', 'theissue' ),
				'id'        => 'fixed_header_color',
				'type'      => 'radio-image',
				'desc'      => esc_html__( 'Color of the fixed header. You can change the background from Customization > Backgrounds.', 'theissue' ),
				'std'       => 'light-header',
				'section'   => 'header',
				'condition' => 'fixed_header:is(on)',
			),
			array(
				'label'   => esc_html__( 'Auto-Hide Fixed Header on Scroll', 'theissue' ),
				'id'      => 'fixed_header_scroll',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Fixed header is hidden when you scroll down and only shown when you scroll up.', 'theissue' ),
				'std'     => 'on',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Shadow', 'theissue' ),
				'id'      => 'fixed_header_shadow',
				'type'    => 'select',
				'desc'    => esc_html__( 'You can set your fixed header shadow here.', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'None', 'theissue' ),
						'value' => 'thb-fixed-noshadow',
					),
					array(
						'label' => esc_html__( 'Small', 'theissue' ),
						'value' => 'thb-fixed-shadow-style1',
					),
					array(
						'label' => esc_html__( 'Medium', 'theissue' ),
						'value' => 'thb-fixed-shadow-style2',
					),
					array(
						'label' => esc_html__( 'Large', 'theissue' ),
						'value' => 'thb-fixed-shadow-style3',
					),
				),
				'std'     => 'thb-fixed-shadow-style1',
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab5',
				'label'   => esc_html__( 'Logo Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Custom Logo Link', 'theissue' ),
				'id'      => 'logo_link',
				'type'    => 'text',
				'desc'    => esc_html__( 'You can set a custom logo link here. It links to your homepage by default.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Upload', 'theissue' ),
				'id'      => 'logo',
				'type'    => 'upload',
				'desc'    => esc_html__( 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Height', 'theissue' ),
				'id'      => 'logo_height',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Logo Upload', 'theissue' ),
				'id'      => 'mobile_logo',
				'type'    => 'upload',
				'desc'    => esc_html__( 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Logo Height', 'theissue' ),
				'id'      => 'logo_height_mobile',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the logo height for mobile screens from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Logo Upload', 'theissue' ),
				'id'      => 'logo_fixed',
				'type'    => 'upload',
				'desc'    => esc_html__( 'You can upload your logo here for the fixed header. This should be 80px in height for retina screens.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Logo Height', 'theissue' ),
				'id'      => 'logo_height_fixed',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the fixed logo height here.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Logo Upload', 'theissue' ),
				'id'      => 'logo_mobilemenu',
				'type'    => 'upload',
				'desc'    => esc_html__( 'You can upload your logo here for the mobile menu. This is optional.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Logo Height', 'theissue' ),
				'id'      => 'logo_height_mobilemenu',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'You can modify the mobile menu logo height here.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab6',
				'label'   => esc_html__( 'Dark Mode - Logo Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Upload', 'theissue' ),
				'id'      => 'logo_dark',
				'type'    => 'upload',
				'desc'    => esc_html__( 'Replaces your main logo when the dark mode is enabled.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Logo Upload', 'theissue' ),
				'id'      => 'mobile_logo_dark',
				'type'    => 'upload',
				'desc'    => esc_html__( 'Replaces your mobile logo when the dark mode is enabled', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Logo Upload', 'theissue' ),
				'id'      => 'logo_fixed_dark',
				'type'    => 'upload',
				'desc'    => esc_html__( 'Replaces your fixed header logo when the dark mode is enabled', 'theissue' ),
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab7',
				'label'   => esc_html__( 'Header Spacing', 'theissue' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Header Padding', 'theissue' ),
				'id'      => 'header_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects header on large screens. The values are in px.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Padding', 'theissue' ),
				'id'      => 'header_padding_fixed',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects the fixed header on large screens. The values are in px.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Header Padding', 'theissue' ),
				'id'      => 'header_padding_mobile',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects header on mobile screens for both regular and fixed versions. The values are in px.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'id'      => 'header_tab8',
				'label'   => esc_html__( 'Logo Spacing', 'theissue' ),
				'type'    => 'tab',
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Logo Padding', 'theissue' ),
				'id'      => 'logo_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects padding of the logo on large screens. The values are in px.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'label'   => esc_html__( 'Mobile Logo Padding', 'theissue' ),
				'id'      => 'logo_mobile_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'This affects padding of the logo on mobile screens. The values are in px.', 'theissue' ),
				'section' => 'header',
			),
			array(
				'id'      => 'menu_tab0',
				'label'   => esc_html__( 'Full Menu Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Full Menu Hover Style', 'theissue' ),
				'id'      => 'full_menu_hover_style',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Which hover style would you like to use?', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Standard', 'theissue' ),
						'value' => 'thb-standard',
					),
					array(
						'label' => esc_html__( 'Underline', 'theissue' ),
						'value' => 'thb-underline',
					),
					array(
						'label' => esc_html__( 'Line Through', 'theissue' ),
						'value' => 'thb-line-through',
					),
					array(
						'label' => esc_html__( 'Line Marker', 'theissue' ),
						'value' => 'thb-line-marker',
					),
				),
				'std'     => 'thb-standard',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Full Menu Dropdown Color', 'theissue' ),
				'id'      => 'full_menu_dropdown_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your dropdown color here.', 'theissue' ),
				'std'     => 'dark',
				'section' => 'menu',
			),
			array(
				'label'     => esc_html__( 'Underline/Line Marker Color', 'theissue' ),
				'id'        => 'thb_underline_color',
				'type'      => 'colorpicker',
				'desc'      => esc_html__( 'You can modify the underline color here.', 'theissue' ),
				'class'     => 'ot-colorpicker-opacity',
				'section'   => 'menu',
				'operator'  => 'OR',
				'condition' => 'full_menu_hover_style:is(thb-underline),full_menu_hover_style:is(thb-line-marker)',
			),
			array(
				'id'      => 'menu_margin',
				'label'   => esc_html__( 'Top Level Item Margin', 'theissue' ),
				'desc'    => esc_html__( 'If you want to fit more menu items to the given space, you can decrease the margin between them here. The default margin is 30px', 'theissue' ),
				'type'    => 'measurement',
				'section' => 'menu',
			),
			array(
				'id'      => 'menu_tab1',
				'label'   => esc_html__( 'Secondary Area Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'menu',
			),
			array(
				'id'      => 'secondary_text',
				'label'   => esc_html__( 'About Heading Typography', 'theissue' ),
				'desc'    => esc_html__( 'These are the icons that appear next to the full menu.', 'theissue' ),
				'type'    => 'textblock',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Dark/Light Toggle', 'theissue' ),
				'id'      => 'header_dark_mode_toggle',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can choose to display the dark mode toggle.', 'theissue' ),
				'std'     => 'off',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Dark/Light Toggle in Mobile Menu', 'theissue' ),
				'id'      => 'header_dark_mode_toggle_mobile',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Adds the Dark Mode toggle at the bottom of the mobile menu.', 'theissue' ),
				'std'     => 'off',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Trending Icon', 'theissue' ),
				'id'      => 'header_trending',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the trending icon here. Trending Posts require JetPack Plugin & its Stats module.', 'theissue' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'     => esc_html__( 'Trending Icon Style', 'theissue' ),
				'id'        => 'header_trending_icon',
				'type'      => 'radio-image',
				'std'       => 'v1',
				'section'   => 'menu',
				'condition' => 'header_trending:is(on)',
			),
			array(
				'label'        => esc_html__( 'Number of Trending Articles', 'theissue' ),
				'id'           => 'header_trending_count',
				'std'          => '5',
				'type'         => 'numeric-slider',
				'min_max_step' => '2,7,1',
				'section'      => 'menu',
				'condition'    => 'header_trending:is(on)',
			),
			array(
				'label'   => esc_html__( 'Search Icon', 'theissue' ),
				'id'      => 'header_search',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the search icon here.', 'theissue' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Cart Icon', 'theissue' ),
				'id'      => 'header_cart',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the cart icon here.', 'theissue' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Follow Dropdown', 'theissue' ),
				'id'      => 'header_follow',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the follow dropdown here.', 'theissue' ),
				'std'     => 'on',
				'section' => 'menu',
			),
			array(
				'label'     => esc_html__( 'Follow Dropdown - Counts', 'theissue' ),
				'id'        => 'header_follow_counts',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'You can toggle the social counts for the follow dropdown here.', 'theissue' ),
				'std'       => 'on',
				'section'   => 'menu',
				'condition' => 'header_follow:is(on)',
			),
			array(
				'label'     => esc_html__( 'Follow Dropdown - Subscription', 'theissue' ),
				'id'        => 'header_follow_subscribe',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'You can toggle the subscription form here.', 'theissue' ),
				'std'       => 'on',
				'section'   => 'menu',
				'condition' => 'header_follow:is(on)',
			),
			array(
				'id'      => 'menu_tab3',
				'label'   => esc_html__( 'Mobile Menu Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Override', 'theissue' ),
				'id'      => 'mobile_menu_override',
				'type'    => 'menu_select',
				'desc'    => esc_html__( 'Mobile Menu uses Main navigation menu by default. You can override it here.', 'theissue' ),
				'section' => 'menu',
			),
			array(
				'label'        => esc_html__( 'Mobile Menu Animation Speed', 'theissue' ),
				'id'           => 'mobile_menu_animation_speed',
				'desc'         => esc_html__( 'Speed of the mobile menu opening animation.', 'theissue' ),
				'std'          => '0.3',
				'type'         => 'numeric-slider',
				'min_max_step' => '0.01,1,0.01',
				'section'      => 'menu',
			),
			array(
				'label'   => esc_html__( 'Mobile Submenu Behaviour', 'theissue' ),
				'id'      => 'submenu_behaviour',
				'type'    => 'radio',
				'desc'    => esc_html__( 'You can choose how your arrows signs work', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Default - Clickable parent links', 'theissue' ),
						'value' => 'thb-default',
					),
					array(
						'label' => esc_html__( 'Open Submenu - Parent links open submenus', 'theissue' ),
						'value' => 'thb-submenu',
					),
				),
				'std'     => 'thb-submenu',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Color', 'theissue' ),
				'id'      => 'mobile_menu_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your mobile menu color here.', 'theissue' ),
				'std'     => 'light',
				'section' => 'menu',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Footer', 'theissue' ),
				'id'      => 'mobile_menu_footer',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the bottom of the menu. You can use your shortcodes here.', 'theissue' ),
				'rows'    => '4',
				'section' => 'menu',
			),
			array(
				'id'      => 'footer_tab0',
				'label'   => esc_html__( 'Footer Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Display Footer', 'theissue' ),
				'id'      => 'footer',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Footer?', 'theissue' ),
				'std'     => 'on',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Color', 'theissue' ),
				'id'      => 'footer_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your footer color here. You can also change your footer background from "Customization"', 'theissue' ),
				'std'     => 'light',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Full Width', 'theissue' ),
				'id'      => 'footer_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'By default, the footer on The Issue is limited to the grid. You can extend it to full width using this option.', 'theissue' ),
				'std'     => 'off',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Display Footer Logo?', 'theissue' ),
				'id'      => 'footer_logo',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Footer Logo on top of widgets?', 'theissue' ),
				'std'     => 'off',
				'section' => 'footer',
			),
			array(
				'label'     => esc_html__( 'Footer Logo Upload', 'theissue' ),
				'id'        => 'footer_logo_upload',
				'type'      => 'upload',
				'desc'      => esc_html__( 'You can upload your own footer logo here. Since this theme is retina-ready, <strong>please upload a double the size you set below.</strong>', 'theissue' ),
				'section'   => 'footer',
				'condition' => 'footer_logo:is(on)',
			),
			array(
				'label'     => esc_html__( 'Footer Logo Height', 'theissue' ),
				'id'        => 'footer_logo_height',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify the footer logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside footer', 'theissue' ),
				'section'   => 'footer',
				'condition' => 'footer_logo:is(on)',
			),
			array(
				'label'   => esc_html__( 'Footer Top Content', 'theissue' ),
				'id'      => 'footer_top_content',
				'type'    => 'page-select',
				'desc'    => esc_html__( 'This allows you to add contents of a page inside the footer.', 'theissue' ),
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Columns', 'theissue' ),
				'id'      => 'footer_columns',
				'type'    => 'radio-image',
				'std'     => 'threecolumns',
				'section' => 'footer',
			),

			array(
				'id'      => 'footer_tab2',
				'label'   => esc_html__( 'Sub-Footer Settings', 'theissue' ),
				'type'    => 'tab',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Display Sub-Footer', 'theissue' ),
				'id'      => 'subfooter',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to display the Sub-Footer?', 'theissue' ),
				'std'     => 'off',
				'section' => 'footer',
			),

			array(
				'label'   => esc_html__( 'Full Width', 'theissue' ),
				'id'      => 'subfooter_full_width',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'By default, the sub-footer on theissue is limited to the grid. You can extend it to full width using this option.', 'theissue' ),
				'std'     => 'off',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Color', 'theissue' ),
				'id'      => 'subfooter_color',
				'type'    => 'radio-image',
				'desc'    => esc_html__( 'You can choose your sub-footer color here. You can also change your sub-footer background from "Customization"', 'theissue' ),
				'std'     => 'light',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Style', 'theissue' ),
				'id'      => 'subfooter_style',
				'type'    => 'radio-image',
				'std'     => 'style1',
				'section' => 'footer',
			),
			array(
				'label'     => esc_html__( 'Display Sub-Footer Logo?', 'theissue' ),
				'id'        => 'subfooter_logo',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'Would you like to display the Subfooter Logo?', 'theissue' ),
				'std'       => 'off',
				'section'   => 'footer',
				'operator'  => 'or',
				'condition' => 'subfooter_style:is(style2),subfooter_style:is(style4),subfooter_style:is(style6)',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Logo', 'theissue' ),
				'id'        => 'subfooter_logo_upload',
				'type'      => 'upload',
				'desc'      => esc_html__( 'You can upload your own subfooter logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>', 'theissue' ),
				'section'   => 'footer',
				'condition' => 'subfooter_logo:is(on)',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Logo Height', 'theissue' ),
				'id'        => 'subfooter_logo_height',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify the subfooter logo height from here. This is maximum height, so your logo may get smaller depending on screen size', 'theissue' ),
				'section'   => 'footer',
				'condition' => 'subfooter_logo:is(on)',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Menu', 'theissue' ),
				'id'        => 'subfooter_menu',
				'type'      => 'menu_select',
				'desc'      => esc_html__( 'Menu to be displayed on the subfooter', 'theissue' ),
				'section'   => 'footer',
				'operator'  => 'or',
				'condition' => 'subfooter_style:is(style2),subfooter_style:is(style3),subfooter_style:is(style4),subfooter_style:is(style5),subfooter_style:is(style6)',

			),
			array(
				'label'   => esc_html__( 'Sub-Footer Text', 'theissue' ),
				'id'      => 'subfooter_text',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'Text Content to be displayed on the subfooter', 'theissue' ),
				'section' => 'footer',
			),
			array(
				'label'     => esc_html__( 'Sub-Footer Social Links', 'theissue' ),
				'id'        => 'subfooter_social_link',
				'type'      => 'on_off',
				'desc'      => esc_html__( 'You can toggle displaying social links here.', 'theissue' ),
				'section'   => 'footer',
				'std'       => 'on',
				'operator'  => 'or',
				'condition' => 'subfooter_style:is(style1),subfooter_style:is(style2),subfooter_style:is(style5)',
			),
			array(
				'label'    => esc_html__( 'Payment Icons to display', 'theissue' ),
				'id'       => 'footer_payment_icons',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Add your desired Payment Icons for the footer here', 'theissue' ),
				'settings' => array(
					array(
						'label'   => esc_html__( 'Payment Type', 'theissue' ),
						'id'      => 'payment_type',
						'type'    => 'select',
						'choices' => array(
							array(
								'label' => 'Visa',
								'value' => 'payment_visa',
							),
							array(
								'label' => 'MasterCard',
								'value' => 'payment_mc',
							),
							array(
								'label' => 'PayPal',
								'value' => 'payment_pp',
							),
							array(
								'label' => 'Discover',
								'value' => 'payment_discover',
							),
							array(
								'label' => 'Amazon Payments',
								'value' => 'payment_amazon',
							),
							array(
								'label' => 'Stripe',
								'value' => 'payment_stripe',
							),
							array(
								'label' => 'American Express',
								'value' => 'payment_amex',
							),
							array(
								'label' => 'Diners Club',
								'value' => 'payment_diners',
							),
							array(
								'label' => 'Google Wallet',
								'value' => 'payment_wallet',
							),
						),
					),
				),
				'section'  => 'footer',
			),
			array(
				'id'      => 'footer_tab4',
				'label'   => esc_html__( 'Measurements', 'theissue' ),
				'type'    => 'tab',
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Footer Padding', 'theissue' ),
				'id'      => 'footer_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'You can modify the footer padding here', 'theissue' ),
				'section' => 'footer',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Padding', 'theissue' ),
				'id'      => 'subfooter_padding',
				'type'    => 'spacing',
				'desc'    => esc_html__( 'You can modify the subfooter padding here', 'theissue' ),
				'section' => 'footer',
			),
			array(
				'id'      => 'misc_tab0',
				'label'   => esc_html__( 'General', 'theissue' ),
				'type'    => 'tab',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Google Maps API Key', 'theissue' ),
				'id'      => 'map_api_key',
				'type'    => 'text',
				'desc'    => __( 'Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>', 'theissue' ),
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Use Combined JavaScript Library?', 'theissue' ),
				'id'      => 'thb_combined_libraries',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When disabled, each javascript library will be loaded on its own. It will allow for greater control using plugins, but may hinder site speed as multiple files will be loaded instead of one.', 'theissue' ),
				'std'     => 'on',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Remove Default WPBakery Styles?', 'theissue' ),
				'id'      => 'thb_remove_wpbakery_styles',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'When enabled, theme removes default WPBakery element styling for speed. If you are going to use default WPbakery elements, you need to enable this.', 'theissue' ),
				'std'     => 'off',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Yoast SEO Breadcrumbs', 'theissue' ),
				'id'      => 'thb_yoast_breadcrumbs',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Disables Yoast Breadcrumbs if needed.', 'theissue' ),
				'std'     => 'off',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Rank Math Breadcrumbs', 'theissue' ),
				'id'      => 'thb_rankmath_breadcrumbs',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Disables Rank Math Breadcrumbs if needed.', 'theissue' ),
				'std'     => 'off',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Scroll To Top?', 'theissue' ),
				'id'      => 'scroll_to_top',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can enable the Scroll To Top button here', 'theissue' ),
				'std'     => 'on',
				'section' => 'misc',
			),
			array(
				'label'   => esc_html__( 'Scroll To Top - Style', 'theissue' ),
				'id'      => 'scroll_to_top_style',
				'type'    => 'radio',
				'desc'    => esc_html__( 'Select your Scroll To Top arrow style.', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Text', 'theissue' ),
						'value' => 'style1',
					),
					array(
						'label' => esc_html__( 'Icon', 'theissue' ),
						'value' => 'style2',
					),
				),
				'std'     => 'style1',
				'section' => 'misc',
				'cond'    => 'scroll_to_top:is(on)',
			),
			array(
				'label'   => esc_html__( 'Extra CSS', 'theissue' ),
				'id'      => 'extra_css',
				'type'    => 'css',
				'desc'    => esc_html__( 'Any CSS that you would like to add to the theme.', 'theissue' ),
				'section' => 'misc',
			),
			array(
				'id'      => 'misc_tab4',
				'label'   => esc_html__( 'Create Additional Sidebars', 'theissue' ),
				'type'    => 'tab',
				'section' => 'misc',
			),
			array(
				'id'      => 'sidebars_text',
				'label'   => esc_html__( 'About the sidebars', 'theissue' ),
				'desc'    => esc_html__( 'All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page', 'theissue' ),
				'std'     => '',
				'type'    => 'textblock',
				'section' => 'misc',
			),
			array(
				'label'    => esc_html__( 'Create Sidebars', 'theissue' ),
				'id'       => 'sidebars',
				'type'     => 'list-item',
				'desc'     => esc_html__( 'Please choose a unique title for each sidebar!', 'theissue' ),
				'section'  => 'misc',
				'settings' => array(
					array(
						'label' => esc_html__( 'ID', 'theissue' ),
						'id'    => 'id',
						'type'  => 'text',
						'desc'  => esc_html__( 'Please write a lowercase id, with <strong>no spaces</strong>', 'theissue' ),
					),
				),
			),
			array(
				'id'      => 'typography_tab1',
				'label'   => esc_html__( 'Font Families', 'theissue' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'id'      => 'font_cache_text',
				'label'   => esc_html__( 'Clear Font Cache', 'theissue' ),
				'desc'    => __( 'If you cant find Google Webfonts inside the boxes below, you can clear your transient for the font cache here: <br><br> <a href="themes.php?page=ot-theme-options&thb_clear_font_cache=true" class="button button-primary">Clear Font Cache</a>', 'theissue' ),
				'type'    => 'textblock',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Primary Font', 'theissue' ),
				'id'      => 'primary_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the primary font. Affects all headings except Post Titles', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Post Title Font', 'theissue' ),
				'id'      => 'secondary_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the post titles.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Content Font', 'theissue' ),
				'id'      => 'tertiary_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the general content.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Full Menu Font', 'theissue' ),
				'id'      => 'fullmenu_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the full menu. Uses the Secondary Font by default.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Font', 'theissue' ),
				'id'      => 'mobilemenu_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the mobile menu. Uses the Secondary Font by default.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Button Font', 'theissue' ),
				'id'      => 'button_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Family Setting for the button. Uses the Secondary Font by default.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Widget Title Font', 'theissue' ),
				'id'      => 'widget_title_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'This adds a separate font for styling of widget titles.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( '<EM> Font', 'theissue' ),
				'id'      => 'em_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'This adds a separate font for styling of EM tags so you can add stylish typographic elements.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( '<label> Font', 'theissue' ),
				'id'      => 'label_font',
				'type'    => 'typography',
				'desc'    => esc_html__( 'This adds a separate font for styling of label tags.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab2',
				'label'   => esc_html__( 'Typography', 'theissue' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Article Content Font', 'theissue' ),
				'id'      => 'body_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the body text inside article pages.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Article Category Font', 'theissue' ),
				'id'      => 'article_category_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the category titles above article titles.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Article Executive Summary Font', 'theissue' ),
				'id'      => 'article_executive_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the executive summary under the article heading.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Article Excerpt Font', 'theissue' ),
				'id'      => 'article_excerpt_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the excerpts (short text) on homepage, etc.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Full Menu Font', 'theissue' ),
				'id'      => 'fullmenu_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the full menu', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Full Menu Sub-Menu Font', 'theissue' ),
				'id'      => 'fullmenu_sub_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the sub-menus inside full menu', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Font', 'theissue' ),
				'id'      => 'mobilemenu_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the mobile menu', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Sub-Menu Font', 'theissue' ),
				'id'      => 'mobilemenu_sub_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the sub-menus inside mobile menu', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Secondary Mobile Menu Font', 'theissue' ),
				'id'      => 'mobilemenu_secondary_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the secondary mobile menu', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Footer Font', 'theissue' ),
				'id'      => 'mobilemenu_footer_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the mobile menu footer', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Social Icon Font', 'theissue' ),
				'id'      => 'mobilemenu_social_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the social icons inside the mobile menu.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Article DropCap Typography', 'theissue' ),
				'id'      => 'article_dropcap_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Changes the typography of the large letter (dropcap) of the article contents.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Widget Title Font', 'theissue' ),
				'id'      => 'widget_title_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the general widget titles', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Footer Widget Title Font', 'theissue' ),
				'id'      => 'widget_title_type_footer',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the footer widget titles', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Footer Text Font', 'theissue' ),
				'id'      => 'footer_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the footer widgets', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Full Menu Font', 'theissue' ),
				'id'      => 'subfooter_fullmenu_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the full menu inside the subfooter', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Copyright Text', 'theissue' ),
				'id'      => 'subfooter_copyright_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting for the copyright text inside the subfooter', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Social Icons Font-size ', 'theissue' ),
				'id'      => 'subfooter_social_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Setting specifically for the social icons inside the footer', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Scroll To Top Text', 'theissue' ),
				'id'      => 'scrolltotop_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Settings for the scroll to top text.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Archive Description Text', 'theissue' ),
				'id'      => 'archive_description_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Typography Settings for the description text under category / tag / archive pages.', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab3',
				'label'   => esc_html__( 'Heading Typography', 'theissue' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'id'      => 'heading_text',
				'label'   => esc_html__( 'About Heading Typography', 'theissue' ),
				'desc'    => esc_html__( 'These affect all h* tags inside the theme, so use wisely. Some particular headings may need additional css to target. The settings affect the desktop sizes only.', 'theissue' ),
				'type'    => 'textblock',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 1', 'theissue' ),
				'id'      => 'h1_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H1 tag', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 2', 'theissue' ),
				'id'      => 'h2_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H2 tag', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 3', 'theissue' ),
				'id'      => 'h3_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H3 tag', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 4', 'theissue' ),
				'id'      => 'h4_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H4 tag', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 5', 'theissue' ),
				'id'      => 'h5_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H5 tag', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Heading 6', 'theissue' ),
				'id'      => 'h6_type',
				'type'    => 'typography',
				'desc'    => esc_html__( 'Font Settings for the H6 tag', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'id'      => 'typography_tab4',
				'label'   => esc_html__( 'Font Support', 'theissue' ),
				'type'    => 'tab',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Google Font Subsets', 'theissue' ),
				'id'      => 'font_subsets',
				'type'    => 'radio',
				'desc'    => esc_html__( 'You can add additional character subset specific to your language.', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'No Subset', 'theissue' ),
						'value' => 'no-subset',
					),
					array(
						'label' => esc_html__( 'Latin Extended', 'theissue' ),
						'value' => 'latin-ext',
					),
					array(
						'label' => esc_html__( 'Greek', 'theissue' ),
						'value' => 'greek',
					),
					array(
						'label' => esc_html__( 'Cyrillic', 'theissue' ),
						'value' => 'cyrillic',
					),
					array(
						'label' => esc_html__( 'Vietnamese', 'theissue' ),
						'value' => 'vietnamese',
					),
				),
				'std'     => 'no-subset',
				'section' => 'typography',
			),
			array(
				'id'      => 'typekit_text',
				'label'   => esc_html__( 'About Adobe Fonts Support', 'theissue' ),
				'desc'    => esc_html__( 'Please make sure that you enter your Project ID or the fonts wont work. After adding Font Names, these names will appear on the font selection dropdown on the Font Families tab (at the bottom of the list).', 'theissue' ),
				'std'     => '',
				'type'    => 'textblock',
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Adobe Fonts Project ID', 'theissue' ),
				'id'      => 'typekit_id',
				'type'    => 'text',
				'desc'    => esc_html__( 'Paste the provided Project ID. <small>Usually 6-7 random letters</small>', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'   => esc_html__( 'Adobe Font Names', 'theissue' ),
				'id'      => 'typekit_fonts',
				'type'    => 'text',
				'desc'    => esc_html__( 'Enter your Adobe Font Name, seperated by comma. For example: futura-pt,aktiv-grotesk <strong>Do not leave spaces between commas</strong>', 'theissue' ),
				'section' => 'typography',
			),
			array(
				'label'    => esc_html__( 'Self Hosted Fonts', 'theissue' ),
				'id'       => 'self_hosted_fonts',
				'type'     => 'list-item',
				'settings' => array(
					array(
						'label'   => esc_html__( 'Font Stylesheet URL', 'theissue' ),
						'id'      => 'font_url',
						'type'    => 'text',
						'desc'    => esc_html__( 'URL of the font stylesheet (.css file) you want to use.', 'theissue' ),
						'section' => 'typography',
					),
					array(
						'label'   => esc_html__( 'Font Family Names', 'theissue' ),
						'id'      => 'font_name',
						'type'    => 'text',
						'desc'    => esc_html__( 'Enter your Font Family Name, use the name that will be used in css. For example: futura-pt, aktiv-grotesk. After saving, you will be able to use this name in the typography settings.', 'theissue' ),
						'section' => 'typography',
					),
				),
				'section'  => 'typography',
			),
			array(
				'id'      => 'customization_tab1',
				'label'   => esc_html__( 'Backgrounds', 'theissue' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Header Background', 'theissue' ),
				'id'      => 'header_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Fixed Header Background', 'theissue' ),
				'id'      => 'fixed_header_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Menu Background', 'theissue' ),
				'id'      => 'menu_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Menu Background', 'theissue' ),
				'id'      => 'submenu_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Search Background', 'theissue' ),
				'id'      => 'search_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Background', 'theissue' ),
				'id'      => 'footer_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub - Footer Background', 'theissue' ),
				'id'      => 'subfooter_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Background', 'theissue' ),
				'id'      => 'mobilemenu_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( '404 Page Background', 'theissue' ),
				'id'      => 'notfound_bg',
				'type'    => 'background',
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab2',
				'label'   => esc_html__( 'Colors', 'theissue' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Accent Color', 'theissue' ),
				'id'      => 'accent_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the accent color here, default red you see in some areas.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Icon Color', 'theissue' ),
				'id'      => 'mobile_menu_icon_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the hamburger menu icon color here.', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Full Menu Sub-Menu Border Color', 'theissue' ),
				'id'      => 'submenu_border_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the border color of the sub-menus under the full menu here.', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'DropCap Color', 'theissue' ),
				'id'      => 'article_dropcap_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can change the dropcap color here.', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Widget Title Color', 'theissue' ),
				'id'      => 'widget_title_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the widget title color here', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Widget Title Background Color', 'theissue' ),
				'id'      => 'widget_title_bg_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the widget title background color here. Depends on which widget style you are using.', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Widget Title Color', 'theissue' ),
				'id'      => 'footer_widget_title_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the footer widget title color here', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Text Color', 'theissue' ),
				'id'      => 'footer_text_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the footer text color here', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub - Footer Text Color', 'theissue' ),
				'id'      => 'subfooter_text_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'You can modify the sub-footer text color here', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab3',
				'label'   => esc_html__( 'Link Colors', 'theissue' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Article Content Link Color', 'theissue' ),
				'id'      => 'general_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link colors inside article contents here', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Article Title Link Color', 'theissue' ),
				'id'      => 'article_title_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the article title link colors here', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Article Category Link Color', 'theissue' ),
				'id'      => 'article_category_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the article category link colors here', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Full Menu Link Color', 'theissue' ),
				'id'      => 'fullmenu_link_color_dark',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link color of the full menu.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Menu Link Color', 'theissue' ),
				'id'      => 'submenu_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link colors inside the sub-menus of the full menu.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Link Color', 'theissue' ),
				'id'      => 'mobilemenu_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the link color of the mobile menu.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Mobile Menu Secondary Link Color', 'theissue' ),
				'id'      => 'mobilemenu_secondary_link_color',
				'type'    => 'link_color',
				'desc'    => esc_html__( 'You can modify the link color of the secondary mobile menu.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Post Category Link Color', 'theissue' ),
				'id'      => 'post_category_link_color',
				'type'    => 'link_color',
				'desc'    => esc_html__( 'Changes the color of the post category links.', 'theissue' ),
				'class'   => 'ot-colorpicker-opacity',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Footer Link Color', 'theissue' ),
				'id'      => 'footer_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the footer link color here', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Sub-Footer Link Color', 'theissue' ),
				'id'      => 'subfooter_link_color',
				'type'    => 'link_color',
				'class'   => 'ot-colorpicker-opacity',
				'desc'    => esc_html__( 'You can modify the sub-footer link color here', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'id'      => 'customization_tab4',
				'label'   => esc_html__( 'Page Transition', 'theissue' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Page Transition', 'theissue' ),
				'id'      => 'page_transition',
				'type'    => 'on_off',
				'desc'    => __( 'This will enable an animation between loading your pages. If you want to disable the transition on a specific link, simply add <code>do-not-animate</code> class to the link element.', 'theissue' ),
				'std'     => 'on',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Page Transition Style', 'theissue' ),
				'id'      => 'page_transition_style',
				'type'    => 'select',
				'desc'    => esc_html__( 'Select the effect you want to use for page transition', 'theissue' ),
				'choices' => array(
					array(
						'label' => esc_html__( 'Fade', 'theissue' ),
						'value' => 'thb-fade',
					),
					array(
						'label' => esc_html__( 'Fade Up', 'theissue' ),
						'value' => 'thb-fade-up',
					),
					array(
						'label' => esc_html__( 'Fade Down', 'theissue' ),
						'value' => 'thb-fade-down',
					),
					array(
						'label' => esc_html__( 'Swipe Left', 'theissue' ),
						'value' => 'thb-swipe-left',
					),
				),
				'std'     => 'thb-fade',
				'section' => 'customization',
			),
			array(
				'label'     => esc_html__( 'Swipe Overlay Background', 'theissue' ),
				'id'        => 'page_transition_overlay_bg',
				'type'      => 'background',
				'desc'      => esc_html__( 'Background settings for the page transition overlay', 'theissue' ),
				'section'   => 'customization',
				'condition' => 'page_transition_style:is(thb-swipe-left)',
			),
			array(
				'label'        => esc_html__( 'Fade In Speed', 'theissue' ),
				'id'           => 'page_transition_in_speed',
				'std'          => '1000',
				'type'         => 'numeric-slider',
				'section'      => 'customization',
				'min_max_step' => '100,3000,50',
				'desc'         => esc_html__( 'The speed of the animation in milisecconds.', 'theissue' ),
			),
			array(
				'label'        => esc_html__( 'Fade Out Speed', 'theissue' ),
				'id'           => 'page_transition_out_speed',
				'std'          => '500',
				'type'         => 'numeric-slider',
				'section'      => 'customization',
				'min_max_step' => '100,3000,50',
				'desc'         => esc_html__( 'The speed of the animation in milisecconds.', 'theissue' ),
			),
			array(
				'id'      => 'customization_tab6',
				'label'   => esc_html__( 'Site Border', 'theissue' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Site Border', 'theissue' ),
				'id'      => 'site_borders',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'This will add borders around the viewport.', 'theissue' ),
				'std'     => 'off',
				'section' => 'customization',
			),
			array(
				'label'     => esc_html__( 'Border Width', 'theissue' ),
				'id'        => 'site_borders_width',
				'type'      => 'measurement',
				'desc'      => esc_html__( 'You can modify border width here', 'theissue' ),
				'section'   => 'customization',
				'condition' => 'site_borders:is(on)',
			),
			array(
				'label'     => esc_html__( 'Border Color', 'theissue' ),
				'id'        => 'site_borders_color',
				'type'      => 'colorpicker',
				'desc'      => esc_html__( 'You can modify the border color here', 'theissue' ),
				'section'   => 'customization',
				'condition' => 'site_borders:is(on)',
			),
			array(
				'id'      => 'customization_tab7',
				'label'   => esc_html__( 'Other', 'theissue' ),
				'type'    => 'tab',
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Site Grid Size', 'theissue' ),
				'id'      => 'thb_grid_size',
				'type'    => 'measurement',
				'desc'    => esc_html__( 'By default, Grid size is 1270px. Rows also have 35px padding + 15px negative margin on each side, so your grid is 1270 - (50 x 2) = 1170px wide on desktops.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Right Click Protection', 'theissue' ),
				'id'      => 'right_click',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can disable right click here.', 'theissue' ),
				'section' => 'customization',
				'std'     => 'on',
			),
			array(
				'label'     => esc_html__( 'Right Click Text Content', 'theissue' ),
				'id'        => 'right_click_content',
				'type'      => 'textarea',
				'desc'      => esc_html__( 'This content appears inside the right click protection overlay.', 'theissue' ),
				'rows'      => '4',
				'section'   => 'customization',
				'condition' => 'right_click:is(on)',
			),
			array(
				'label'   => esc_html__( 'Custom 404 Page', 'theissue' ),
				'id'      => '404_page_content',
				'type'    => 'page-select',
				'desc'    => esc_html__( 'This allows you to override default 404 page and show a custom page.', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'label'   => esc_html__( 'Google Theme Color', 'theissue' ),
				'id'      => 'thb_google_theme_color',
				'type'    => 'colorpicker',
				'desc'    => esc_html__( 'Applied only on Android mobile devices, click <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android" target="_blank">here</a> to learn more about this', 'theissue' ),
				'section' => 'customization',
			),
			array(
				'id'      => 'gdpr_tab0',
				'label'   => esc_html__( 'Newsletter', 'theissue' ),
				'type'    => 'tab',
				'section' => 'gdpr',
			),
			array(
				'label'   => esc_html__( 'Newsletter Privacy Checkbox', 'theissue' ),
				'id'      => 'newsletter_privacy_checkbox',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle displaying a checkbox underneath the subscribe box.', 'theissue' ),
				'std'     => 'on',
				'section' => 'gdpr',
			),
			array(
				'label'   => esc_html__( 'Newsletter Privacy Checkbox - Checked by Default?', 'theissue' ),
				'id'      => 'newsletter_privacy_checkbox_checked',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can toggle the default state of the checkbox.', 'theissue' ),
				'std'     => 'on',
				'section' => 'gdpr',
			),
			array(
				'id'      => 'gdpr_tab1',
				'label'   => esc_html__( 'Cookie Bar', 'theissue' ),
				'type'    => 'tab',
				'section' => 'gdpr',
			),
			array(
				'label'   => esc_html__( 'Cookie Bar', 'theissue' ),
				'id'      => 'thb_cookie_bar',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'Would you like to show the cookie bar?', 'theissue' ),
				'std'     => 'off',
				'section' => 'gdpr',
			),
			array(
				'label'     => esc_html__( 'Cookie Bar Content', 'theissue' ),
				'id'        => 'thb_cookie_bar_content',
				'type'      => 'textarea',
				'desc'      => esc_html__( 'This content appears inside the cookie bar.', 'theissue' ),
				'rows'      => '4',
				'section'   => 'gdpr',
				'condition' => 'thb_cookie_bar:is(on)',
			),
			array(
				'id'      => 'advertising_tab0',
				'label'   => esc_html__( 'Header', 'theissue' ),
				'type'    => 'tab',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'Header - Left', 'theissue' ),
				'id'      => 'adv_header_left',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears to the left of the logo if the "Header - Left Content" is set to Advertisement.', 'theissue' ),
				'rows'    => '4',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'Header - Right', 'theissue' ),
				'id'      => 'adv_header_right',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears to the right of the logo if the "Header - Left Content" is set to Advertisement.', 'theissue' ),
				'rows'    => '4',
				'section' => 'advertising',
			),
			array(
				'id'      => 'advertising_tab1',
				'label'   => esc_html__( 'Articles', 'theissue' ),
				'type'    => 'tab',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'Before Content', 'theissue' ),
				'id'      => 'adv_before_content',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears before the content in article pages.', 'theissue' ),
				'rows'    => '4',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'After Content', 'theissue' ),
				'id'      => 'adv_after_content',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears after the content in article pages. Applies to Standard Post Formats.', 'theissue' ),
				'rows'    => '4',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'Article End', 'theissue' ),
				'id'      => 'adv_postend',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the bottom of the articles.', 'theissue' ),
				'rows'    => '4',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'Article End for Ajax loaded articles', 'theissue' ),
				'id'      => 'adv_postend_ajax',
				'type'    => 'textarea',
				'desc'    => esc_html__( 'This content appears at the bottom of the articles of ajax loaded articles.', 'theissue' ),
				'rows'    => '4',
				'section' => 'advertising',
			),
			array(
				'id'      => 'advertising_tab3',
				'label'   => esc_html__( 'Article Galleries', 'theissue' ),
				'type'    => 'tab',
				'section' => 'advertising',
			),
			array(
				'label'    => esc_html__( 'Lightbox Sidebar', 'theissue' ),
				'id'       => 'adv_lightbox_sidebar',
				'type'     => 'list-item',
				'settings' => array(
					array(
						'label' => esc_html__( 'Ad Code', 'theissue' ),
						'id'    => 'ad_code',
						'type'  => 'textarea',
						'desc'  => esc_html__( 'HTML code or Shortcode for your advertisement banner.', 'theissue' ),
					),
				),
				'desc'     => esc_html__( 'You can add multiple advertising codes. They will be looped indefinitely, meaning each slide will show the next ad code and after that, it will start from the first one.', 'theissue' ),
				'section'  => 'advertising',
			),
			array(
				'id'      => 'advertising_tab4',
				'label'   => esc_html__( 'Video Monetization', 'theissue' ),
				'type'    => 'tab',
				'section' => 'advertising',
			),
			array(
				'id'      => 'viai_text',
				'label'   => esc_html__( 'About Video Monetization', 'theissue' ),
				'desc'    => __( '1) Sign up for a <a href="https://www.vi.ai/publisher-video-monetization/" target="_blank">vi.ai account.</a><br>2) Grab your publisher ID from the code snippet.', 'theissue' ),
				'type'    => 'textblock',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'Custom Video Player', 'theissue' ),
				'id'      => 'thb_custom_video_player',
				'type'    => 'on_off',
				'desc'    => esc_html__( 'You can disable the custom video player here. However, you wont be able to use the monetization features', 'theissue' ),
				'std'     => 'on',
				'section' => 'advertising',
			),
			array(
				'label'   => esc_html__( 'VI.AI Publisher ID', 'theissue' ),
				'id'      => 'viai_publisher_id',
				'type'    => 'text',
				'desc'    => esc_html__( 'Enter your vi.ai Publisher ID here.', 'theissue' ),
				'section' => 'advertising',
			),
		),
	);
	apply_filters( 'theissue_theme_options', $custom_settings );
	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings );
	}
}
/**
 * Ajax Author Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_author_select_ajax' ) ) {

	function ot_type_author_select_ajax( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-author-select-ajax ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';
				echo '<select class="thb-author-search" multiple="multiple" style="width: 100%;" id="' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_name ) . '[]" data-placeholder="Search for an author&hellip;" data-action="thb_json_search_authors" data-security="' . esc_attr( wp_create_nonce( 'thb_json_search_ajax' ) ) . '">';
		if ( ! empty( $field_value ) ) {
			foreach ( $field_value as $author_id ) {
				echo '<option value="' . esc_attr( $author_id ) . '"' . selected( true, true, false ) . '>' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</option>';
			}
		} else {
			echo '<option value=""></option>';
		}
				echo '</select>';
			echo '</div>';

		echo '</div>';

	}
}
/**
 * Ajax Post Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_post_select_ajax' ) ) {

	function ot_type_post_select_ajax( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-post-select-ajax ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';
				echo '<select class="thb-post-search" multiple="multiple" style="width: 100%;" id="' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_name ) . '[]" data-placeholder="Search for an article&hellip;" data-action="thb_json_search_posts" data-security="' . esc_attr( wp_create_nonce( 'thb_json_search_ajax' ) ) . '">';
		if ( ! empty( $field_value ) ) {
			foreach ( $field_value as $post_id ) {
				$post = get_post( $post_id );
				if ( is_object( $post ) ) {
					echo '<option value="' . esc_attr( $post_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $post->post_title ) . '</option>';
				}
			}
		} else {
			echo '<option value=""></option>';
		}
				echo '</select>';
			echo '</div>';

		echo '</div>';

	}
}
/**
 * Ajax Product Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_product_select' ) ) {

	function ot_type_product_select( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-product-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';
		if ( ! thb_wc_supported() ) {
			esc_html_e( 'Please Enable WooCommerce to use this feature', 'theissue' );
		} else {
			echo '<select class="wc-product-search" multiple="multiple" style="width: 100%;" id="' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_name ) . '[]" data-placeholder="Search for a product&hellip;" data-action="woocommerce_json_search_products_and_variations">';

			if ( ! empty( $field_value ) ) {
				foreach ( $field_value as $product_id ) {
					$product = wc_get_product( $product_id );
					if ( is_object( $product ) ) {
						echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
					}
				}
			} else {
				echo '<option value=""></option>';
			}
			echo '</select>';
		}
			echo '</div>';

		echo '</div>';

	}
}
/**
 * Gradient option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 * @updated   2.2.0
 */
if ( ! function_exists( 'ot_type_gradient' ) ) {

	function ot_type_gradient( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-colorpicker ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

				/* build colorpicker */
				echo '<div class="option-tree-ui-colorpicker-input-wrap">';
					$field_id_1    = $field_id . '_1';
					$field_name_1  = $field_name . '[0]';
					$field_value_1 = isset( $field_value[0] ) ? $field_value[0] : '';
					/* colorpicker JS */
					echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id_1 ) . '"); });</script>';

					/* input */
					echo '<input type="text" name="' . esc_attr( $field_name_1 ) . '" id="' . esc_attr( $field_id_1 ) . '" value="' . esc_attr( $field_value_1 ) . '" class="hide-color-picker ot-colorpicker-opacity ' . esc_attr( $field_class ) . '" />';

				echo '</div>';

				/* build colorpicker 2 */
				echo '<div class="option-tree-ui-colorpicker-input-wrap">';

					$field_id_2    = $field_id . '_2';
					$field_name_2  = $field_name . '[1]';
					$field_value_2 = isset( $field_value[1] ) ? $field_value[1] : '';
					/* colorpicker JS */
					echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id_2 ) . '"); });</script>';

					/* input */
					echo '<input type="text" name="' . esc_attr( $field_name_2 ) . '" id="' . esc_attr( $field_id_2 ) . '" value="' . esc_attr( $field_value_2 ) . '" class="hide-color-picker ot-colorpicker-opacity ' . esc_attr( $field_class ) . '" />';

				echo '</div>';

			echo '</div>';

		echo '</div>';

	}
}
/**
 * Social Checkbox option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_social_checkbox' ) ) {

	function ot_type_social_checkbox( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-category-checkbox type-checkbox ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

			echo '<ul class="option-tree-setting-wrap option-tree-sortable" data-name="' . esc_attr( $field_id ) . '" data-id="' . esc_attr( $post_id ) . '" data-type="' . esc_attr( $type ) . '">';

				$field_value = is_array( $field_value ) ? $field_value : array();

				$socials = array(
					'facebook'  => 'Facebook',
					'twitter'   => 'Twitter',
					'pinterest' => 'Pinterest',
					'linkedin'  => 'Linkedin',
					'vkontakte' => 'Vkontakte',
					'whatsapp'  => 'WhatsApp',
					'email'     => 'E-Mail',
					'reddit'    => 'Reddit',
					'telegram'  => 'Telegram',
					'flipboard' => 'Flipboard',
				);

				$ordered_array = array_merge( array_flip( $field_value ), $socials );

				/* build categories */
				if ( ! empty( $ordered_array ) ) {
					foreach ( $ordered_array as $social => $label ) {

						echo '<li class="ui-state-default list-list-item"><div class="option-tree-setting"><div class="open">';

							echo '<input type="checkbox"
								name="' . esc_attr( $field_name ) . '[' . esc_attr( $social ) . ']"
								id="' . esc_attr( $field_id ) . '-' . esc_attr( $social ) . '"
								value="' . esc_attr( $social ) . '" ' . ( isset( $field_value[ $social ] ) ? checked( $field_value[ $social ], $social, false ) : '' ) . '" class="option-tree-ui-checkbox ' . esc_attr( $field_class ) . '" />';
							echo '<label for="' . esc_attr( $field_id ) . '-' . esc_attr( $social ) . '">' . esc_attr( $label ) . '</label>';
						echo '</div></div></li>';
					}
				}

				echo '</ul>';

				echo '</div>';

				echo '</div>';

	}
}
/**
 * MC List Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_mc_list_select' ) ) {

	function ot_type_mc_list_select( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-mc-list-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

				/* build category */
				echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';

				/* get category array */
				$newsletter_mailchimp_api = ot_get_option( 'newsletter_mailchimp_api' );

				/* has cats */
		if ( ! $newsletter_mailchimp_api ) {
			echo '<option value="">' . esc_html__( 'No Lists Found', 'theissue' ) . '</option>';
		} else {
			$transient_name = 'thb_mc_lists_' . $newsletter_mailchimp_api;
			$data           = get_transient( $transient_name );

			if ( ! $data ) {
				$data = thb_mailchimp_request(
					'GET',
					'lists',
					array(
						'sort_field' => 'date_created',
						'sort_dir'   => 'DESC',
						'count'      => 1000,
					)
				);
				set_transient( $transient_name, $data, 12 * HOUR_IN_SECONDS );
			}
			if ( ! empty( $data ) ) {
				echo '<option value="">-- ' . esc_html__( 'Choose One', 'theissue' ) . ' --</option>';
				if ( is_array( $data ) && isset( $data['lists'] ) && $data['lists'] ) {
					foreach ( $data['lists'] as $list ) {
						echo '<option value="' . esc_attr( $list['id'] ) . '"' . selected( $field_value, $list['id'], false ) . '>' . esc_attr( $list['name'] ) . '</option>';
					}
				}
			} else {
				echo '<option value="">' . esc_html__( 'No Lists Found', 'theissue' ) . '</option>';
			}
		}

				echo '</select>';

			echo '</div>';

		echo '</div>';

	}
}

/**
 * Menu Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_menu_select' ) ) {

	function ot_type_menu_select( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

				/* build category */
				echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';

				/* get category array */
				$menus = get_terms( 'nav_menu' );

				/* has cats */
		if ( ! empty( $menus ) ) {
			echo '<option value="">-- ' . esc_html__( 'Choose One', 'theissue' ) . ' --</option>';
			foreach ( $menus as $menu ) {
				echo '<option value="' . esc_attr( $menu->slug ) . '"' . selected( $field_value, $menu->slug, false ) . '>' . esc_attr( $menu->name ) . '</option>';
			}
		} else {
			echo '<option value="">' . esc_html__( 'No Menus Found', 'theissue' ) . '</option>';
		}

				echo '</select>';

			echo '</div>';

		echo '</div>';

	}
}

/**
 * Category Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_select_auto' ) ) {

	function ot_type_category_select_auto( $args = array() ) {

		/* turns arguments array into variables */
		extract( $args );

		/* verify a description */
		$has_desc = $field_desc ? true : false;

		/* format setting outer wrapper */
		echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

			/* description */
		if ( $has_desc ) {
			echo '<div class="description">' . wp_kses_post( wp_specialchars_decode( $field_desc ) ) . '</div>'; }

			/* format setting inner wrapper */
			echo '<div class="format-setting-inner">';

				/* build category */
				echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . esc_attr( $field_class ) . '">';

				/* get category array */
				$categories = get_categories( apply_filters( 'ot_type_category_select_query', array( 'hide_empty' => false ), $field_id ) );

				echo '<option value="auto">' . esc_html__( 'Auto Select a Category', 'theissue' ) . '</option>';

				/* has cats */
		if ( ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				echo '<option value="' . esc_attr( $category->term_id ) . '"' . selected( $field_value, $category->term_id, false ) . '>' . esc_attr( $category->name ) . '</option>';
			}
		} else {
			echo '<option value="">' . esc_html__( 'No Categories Found', 'theissue' ) . '</option>';
		}

				echo '</select>';

			echo '</div>';

		echo '</div>';

	}
}
