<?php
/**
 * All Wizard related functions
 */
namespace Codexpert\ThumbPress\App;
use Codexpert\Plugin\Base;
use Codexpert\Plugin\Setup;

require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
require_once( ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php' );
require_once( ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php' );

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Wizard
 * @author Codexpert <hi@codexpert.io>
 */
class Wizard extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->version	= $this->plugin['Version'];
		$this->action( 'admin_print_styles', 'enqueue_styles' );
	}

	public function action_links( $links ) {
		$this->admin_url = admin_url( 'admin.php' );

		$new_links = [
			'wizard'	=> sprintf( '<a href="%1$s">%2$s</a>', add_query_arg( [ 'page' => "{$this->slug}_setup" ], $this->admin_url ), __( 'Setup Wizard', 'image-sizes' ) )
		];
		
		return array_merge( $new_links, $links );
	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->slug, plugins_url( "/assets/css/wizard.css", THUMBPRESS ), '', $this->version, 'all' );
		wp_enqueue_style( 'font-awesome-free', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' );

	}

	public function render() {

		// force setup once
		// if( get_option( "{$this->slug}_setup" ) != 1 ) {
		// 	update_option( "{$this->slug}_setup", 1 );
		// 	wp_safe_redirect( add_query_arg( [ 'page' => "{$this->slug}_setup" ], admin_url( 'admin.php' ) ) );
		// 	exit;
		// }

		$this->plugin['steps'] = [
			'welcome'	=> [
				'label'			=> __( 'Welcome', 'image_sizes' ),
				'template'		=> THUMBPRESS_DIR . '/views/wizard/welcome.php',
				'prev_text'		=> __( 'Skip for now', 'image-sizes' ),
				'prev_url'		=> add_query_arg( [ 'page' => 'image-sizes' ], admin_url( 'upload.php' ) ),
				'next_text'		=> __( 'Get Started..', 'image-sizes' ),
				'next_url'		=> add_query_arg( [ 'page' => 'image-sizes_setup', 'step' => 'disable-thumbnails' ], admin_url( 'admin.php' ) ),
			],
			'disable-thumbnails'	=> [
				'label'			=> __( 'Disable Thumbnails' ),
				'template'		=> THUMBPRESS_DIR . '/views/wizard/disable-thumbnails.php',
				'action'		=> [ $this, 'save_disabled_thumbnails' ],
			],
			'complete'	=> [
				'label'			=> __( 'Complete' ),
				'template'		=> THUMBPRESS_DIR . '/views/wizard/complete.php',
				'action'		=> [ $this, 'install_plugin' ],
				'redirect'		=> add_query_arg( [ 'page' => "{$this->slug}" ], admin_url( 'upload.php' ) )
			],
		];

		new Setup( $this->plugin );
	}

	public function save_disabled_thumbnails() {

		if ( isset( $_POST['disables'] ) ) {
    		update_option ( 'prevent_image_sizes', $this->sanitize( $_POST, 'array' ) );
		}

	} 

	public function install_plugin() {

		$skin     = new \WP_Ajax_Upgrader_Skin();
		$upgrader = new \Plugin_Upgrader( $skin );

		if ( isset( $_POST['woolementor'] ) ) {
			$upgrader->install( 'https://downloads.wordpress.org/plugin/woolementor.latest-stable.zip' );
			update_option( 'woolementor-activated', 1 );
			activate_plugin( 'woolementor/woolementor.php' );
		}

		if ( isset( $_POST['wc-affiliate'] ) ) {
			$upgrader->install( 'https://downloads.wordpress.org/plugin/wc-affiliate.latest-stable.zip' );
			update_option( 'wc-affiliate_setup', 1 );
			activate_plugin( 'wc-affiliate/wc-affiliate.php' );
		}

		if ( isset( $_POST['restrict-elementor-widgets'] ) ) {
			$upgrader->install( 'https://downloads.wordpress.org/plugin/restrict-elementor-widgets.latest-stable.zip' );
			activate_plugin( 'restrict-elementor-widgets/restrict-elementor-widgets.php' );
		}
	
	}

}