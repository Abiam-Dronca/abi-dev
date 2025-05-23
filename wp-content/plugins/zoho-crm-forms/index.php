<?php

/* * ******************************************************************************************
 * Plugin Name: Zoho CRM Lead Magnet
 * Description: Websites are one of the most important sources of leads for your business. That means your CRM system should be well integrated with your website to contextually capture each and every visitor to turn them into a lead.Introducing the Zoho CRM Lead Capture plugin for Wordpress. This lets you create webforms, embed them in your website, and automatically capture leads directly into your CRM with zero attenuation.Not only is the integration easy to set-up but it's also easy on your wallet.
 * Version: 1.7.7.3
 * ***************************************************************************************** */
if (!defined('ABSPATH'))
    exit;

        define( 'ZCF_VERSION', '1.7.7.3' );
        define( 'ZCF_LBPLUGINFILE', __FILE__ );
        define( 'ZCF_LBPLUGIN_URL', untrailingslashit( plugins_url( '', ZCF_LBPLUGINFILE ) ) );
        zcf_define_url_constants();
        zcf_configfilesInclude();
        zcf_plugininit();
        zcf_hooksinit();
        zcf_allowed_tag();
        $crmnames = get_option("active_plugins");

        if (in_array("contact-form-7/wp-contact-form-7.php", $crmnames)) {
            require_once('includes/crmcontactform7.php');
        }

        require_once("includes/crmwebformsfieldsmapping.php");
        require_once("includes/crmcontactforminte.php");

        $ContactForm7 = new zcfactivehelper();
        $ActivePlugin = $ContactForm7->zcf_getContactfomActive();
        $get_debug_option = get_option("zcf_crmformswpbuilder_settings");
        if ($ActivePlugin != '') {
            require_once("includes/crmwebformfieldsfuntions.php");
        }
        require_once('includes/crmwebformshelper.php');
        require_once("includes/crmcontactformgenerator.php");
        require_once('includes/crmcustomfunctions.php');


    function zcf_lbplugin_baseurl( $path = '' ) {
	$url = plugins_url( $path, ZCF_LBPLUGINFILE );

	if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) ) {
		$url = 'https:' . substr( $url, 5 );
	}

	return $url;
    }
    function zcf_allowed_tag(){
      global $allowedposttags;
      $allowed_atts = array(
      'align'      => array(),
      'class'      => array(),
      'type'       => array(),
      'id'         => array(),
      'dir'        => array(),
      'lang'       => array(),
      'style'      => array(),
      'src'        => array(),
      'alt'        => array(),
      'href'       => array(),
      'rel'        => array(),
      'rev'        => array(),
      'target'     => array(),
      'novalidate' => array(),
      'selected'      => array(),
      'type'       => array(),
      'value'      => array(),
      'name'       => array(),
      'tabindex'   => array(),
      'action'     => array(),
      'method'     => array(),
      'for'        => array(),
      'width'      => array(),
      'height'     => array(),
      'data'       => array(),
      'title'      => array(),
      'onclick'      => array(),
      'onchange'      => array(),
      'onblur'      => array(),
      'span'      => array(),
      'data-toggle'      => array(),
      'data-placement'      => array(),
      'checked'      => array(),
      'data-id'     => array(),
      'data-label'     => array(),
      'onblur'        => array(),
      'data-value'      => array(),
      'order-pos'     => array(),
      'data-status'     => array(),
      'data-width'     => array(),
      'data-height'     => array(),
      'data-rtl'     => array(),
      'data-show-thumbnails'     => array(),
      'data-background-size'     => array(),
      'data-blur-background'     => array(),
      'data-background-color'     => array(),
      'data-thumbnail-background-color'     => array(),
      'data-alt'     => array(),
      'data-src'     => array(),
      

      );
      $allowedposttags['form']     = $allowed_atts;
      $allowedposttags['label']    = $allowed_atts;
      $allowedposttags['input']    = $allowed_atts;
      $allowedposttags['textarea'] = $allowed_atts;
      $allowedposttags['script']   = $allowed_atts;
      $allowedposttags['style']    = $allowed_atts;
      $allowedposttags['strong']   = $allowed_atts;
      $allowedposttags['table']    = $allowed_atts;
      $allowedposttags['span']     = $allowed_atts;
      $allowedposttags['div']      = $allowed_atts;
      $allowedposttags['h1']       = $allowed_atts;
      $allowedposttags['h2']       = $allowed_atts;
      $allowedposttags['selected'] = $allowed_atts;
      $allowedposttags['ul']       = $allowed_atts;
      $allowedposttags['li']       = $allowed_atts;
      $allowedposttags['option']   = $allowed_atts;
      $allowedposttags['select']   = $allowed_atts;
      $allowedposttags['br']       = $allowed_atts;
      $allowedposttags['tr']       = $allowed_atts;
      $allowedposttags['td']       = $allowed_atts;
      $allowedposttags['p']        = $allowed_atts;
      $allowedposttags['a']        = $allowed_atts;
      $allowedposttags['b']        = $allowed_atts;
      $allowedposttags['a']        = $allowed_atts;
     return $allowedposttags;
    }
     function zcf_hooksinit() {
        register_activation_hook(ZCF_LBPLUGINFILE, array('zcfmaincorehelpers', 'activate'));
        register_deactivation_hook(ZCF_LBPLUGINFILE, array('zcfmaincorehelpers', 'deactivate'));
        $check_sync_value = get_option('Sync_value_on_off');
        if ($check_sync_value == "On") {
            add_action('WPfile_update', array('zcf_CapturingClassAjax', 'zcf_capture_updating_users'));
            //add_action('user_register', array('zcf_CapturingClassAjax', 'zcf_capture_registering_users'));
        }
    }

     function zcf_define_url_constants() {
        zcf_defaultdefinemethod('ZCF_BASE_DIR_URI', plugin_dir_path(ZCF_LBPLUGINFILE));
        zcf_defaultdefinemethod('ZCF_BASE_SLUG', 'crmforms-builder');
        zcf_defaultdefinemethod('ZCF_BASE_DIR', WP_PLUGIN_URL . '/' . ZCF_BASE_SLUG . '/');
        zcf_defaultdefinemethod('ZCF_PLUGIN_NAME_SETTINGS', 'Zoho crm forms');
        zcf_defaultdefinemethod('ZCF_PLUGIN_VERSION', '1.0');
        zcf_defaultdefinemethod('ZCF_PLUGIN_NAME', 'Zoho CRM Forms');
        zcf_defaultdefinemethod('ZCF_PLUGIN_BASE_URL', site_url() . '/wp-admin/admin.php?page=crmforms-builder');
    }

     function zcf_defaultdefinemethod($name, $value) {
        if (!defined($name)) {
            define($name, $value);
        }
    }

     function zcf_plugininit() {
        if (is_admin()) :
            do_action('zcf_init');
            if (is_admin()) {
                include_once('includes/crminterfunction.php');
                zcfajaxcore::zcfforms_ajax_events();
            }

        endif;
    }

     function zcf_configfilesInclude() {
        include_once ( 'includes/crmconfigdefault.php' );
        $uciPages = array('crmforms-builder', 'formsettings-builder', 'lb-crmconfig','formsubmit-logs','crm-authentications',"crmforms-authendication");
        require_once("includes/crmwebformsfieldsmapping.php");
        require_once("includes/crmcontactforminte.php");
        $ContactFormPlugins = new zcfactivehelper();
        $ActivePlugin = $ContactFormPlugins->zcf_getContactfomActive();
        $get_debug_option = get_option("zcf_crmformswpbuilder_settings");
    }

    function zcf_plugin_assets() {
        $pages_list = array('crmforms-builder', 'formsettings-builder', 'create-thirdpartyform-builder', 'create-leadform-builder', 'create-contactform-builder', 'zoho-crm-form-builder','formsubmit-logs','crmforms-authendication','crm-authentications');
        if (sanitize_text_field(isset($_REQUEST['page'])) && in_array(sanitize_text_field($_REQUEST['page']), $pages_list)) {
           wp_register_style('zcfSelect2-css', zcf_lbplugin_baseurl('assets/css/select2.min.css', ZCF_LBPLUGINFILE));
            wp_enqueue_style('zcfSelect2-css');
            wp_register_style('zcfbase-css', zcf_lbplugin_baseurl('assets/css/base.css', ZCF_LBPLUGINFILE));
            wp_enqueue_style('zcfbase-css');
            //wp_register_style('zcffont-awesome-css', zcf_lbplugin_baseurl('assets/css/font-awesome/css/font-awesome.css', ZCF_LBPLUGINFILE));
          //  wp_enqueue_style('zcffont-awesome-css');
            wp_register_style('zcfjquery-confirm-css', zcf_lbplugin_baseurl('assets/css/jquery-confirm.min.css', ZCF_LBPLUGINFILE));
            wp_enqueue_style('zcfjquery-confirm-css');
            wp_register_script('zcfcustom', zcf_lbplugin_baseurl('assets/js/crmmain.js', ZCF_LBPLUGINFILE),array( 'jquery','jquery-ui-core' ,'jquery-ui-sortable','jquery-ui-widget'), ZCF_VERSION, false);
            wp_enqueue_script('zcfcustom');
            wp_localize_script( 'zcfcustom', 'ajax_object', array('ajax_url' => wp_nonce_url( 'admin-ajax.php' ),'zoho_crm_forms_nonce' => zcf_prepare_nonces()));
            wp_register_script('zcfjquery-confirm', zcf_lbplugin_baseurl('assets/js/jquery-confirm.min.js', ZCF_LBPLUGINFILE),array('jquery','jquery-ui-core','jquery-ui-widget'), ZCF_VERSION, false);
            wp_enqueue_script('zcfjquery-confirm');
            wp_register_script('zcfselect2-min-js', zcf_lbplugin_baseurl('assets/js/select2.min.js', ZCF_LBPLUGINFILE),array('jquery'), ZCF_VERSION, false);
            wp_enqueue_script('zcfselect2-min-js');
            wp_register_script('zfcrm-utils', zcf_lbplugin_baseurl('assets/js/config.js', ZCF_LBPLUGINFILE),array('jquery'), ZCF_VERSION, false);
            wp_enqueue_style('zfcustomcss', zcf_lbplugin_baseurl('assets/css/custom.css', ZCF_LBPLUGINFILE) );
            //do_action( 'init_assets' , 'init_assets');
        }
    }

    add_action( 'admin_head', 'zcf_add_nonce');
    add_action( 'admin_enqueue_scripts', 'zcf_plugin_assets', 20 );


    function zcf_frontend_enabledefault() {
        if (!is_admin()) {
            global $HelperObj;
            include_once ( 'includes/crmwebformshelper.php' );
            $HelperObj = new zcfmaincorehelpers;
            $activatedplugin = "crmformswpbuilder";
            $config = get_option("zcf_captcha_settings");
            if ($config['crmforms_recaptcha'] == 'yes') {
                wp_register_script('google-captcha-js', "https://www.google.com/recaptcha/api.js");
                wp_enqueue_script('google-captcha-js');
            }


            wp_register_style('zcffront-jquery-ui', zcf_lbplugin_baseurl('assets/css/jquery-ui.css', ZCF_LBPLUGINFILE));
            wp_enqueue_style('zcffront-jquery-ui');
            wp_register_style('zcffront-end-styles', zcf_lbplugin_baseurl('assets/css/frontendstyles.css', ZCF_LBPLUGINFILE));
            wp_enqueue_style('zcffront-end-styles');

        }
    }

  add_action( 'wp_enqueue_scripts', 'zcf_frontend_enabledefault', 20 );

function zcf_frondendcustom() {
    wp_register_script('zcga.js', zcf_lbplugin_baseurl('assets/js/zcga.js', ZCF_LBPLUGINFILE),array( 'jquery','jquery-ui-core' ,'jquery-ui-datepicker'), ZCF_VERSION, false);
    wp_enqueue_script('zcga.js');


}

add_action('wp_enqueue_scripts', 'zcf_frondendcustom');
function zcf_adminhelpenable() {

    $current_screen = get_current_screen();

    $content = "<p>Websites are one of the most important sources of leads for your business. That means your CRM system should be well integrated with your website to contextually capture each and every visitor to turn them into a lead.<br>Introducing the Zoho CRM Lead Capture plugin for Wordpress. This lets you create webforms, embed them in your website, and automatically capture leads directly into your CRM with zero attenuation.<br>Not only is the integration easy to set-up but its also easy on your wallet. </p>";

    $current_screen->add_help_tab(array(
        'id' => 'sp_help_tab_callback',
        'title' => __('Help Links'),
        'callback' => 'zcf_tab3customdisplay'
            )
    );
}

add_action('admin_head', 'zcf_adminhelpenable');
add_filter( 'http_request_args', function ( $r ) {
	$r['sslverify'] = false;

	return $r;
} );
 function zcf_add_nonce(){
		printf(
			'<meta name="zoho_crm_forms_csrf_token" content="%s" />',
			wp_create_nonce( 'zoho_crm_forms_nonce' )
		);
	}

	 function zcf_prepare_nonces(){
		$ajax_nonces = array();
    $AJAX_ACTIONS  = array(
		'zcfupdateState',
    'zcfdeleteFieldsState',
    'zcf_send_mapped_config',
    'zcf_delete_mapped_config',
    'zcfnewlead_form',
    'zcfsend_mapping_configuration',
    'zcf_map_contactform_fields',
    'zcfmainFormsActions',
    'CheckformExits',
    'GetTemporaryFields',
    'FetcheditCrmFields',
    'FetchCrmFields',
    'GetAssignedToUser',
    'FetcheditCrmFields' ,
    'zcf_getModuleLayoutlist',
    'zcf_updateTitles',
    'zcf_updateTitles1'
	);
		foreach($AJAX_ACTIONS as $action ){
			$ajax_nonces[$action] = wp_create_nonce( $action.'_nonce' );
		}
		return $ajax_nonces;
	}

	 function zcf_validate_general_nonce(){
		$nonce = isset($_SERVER['HTTP_X_CSRF_TOKEN']) ? $_SERVER['HTTP_X_CSRF_TOKEN'] : '';
		if( ! wp_verify_nonce( $nonce, 'zoho_crm_forms_nonce' ) )
			json_response( 400, 'Nonce validation failed.' );
	}

function zcf_tab3customdisplay() {
    $content = "<input id='crm-ajax-nonce' type='hidden'  value='' name='create-leadform-builder' />";
    $allowedposttags = zcf_allowed_tag();
    echo wp_kses( $content, $allowedposttags );
}
