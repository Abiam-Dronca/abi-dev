<?php
/**
 * All admin facing functions
 */
namespace Codexpert\ThumbPress\App;
use Codexpert\Plugin\Base;
use Codexpert\ThumbPress\Helper;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Admin
 * @author Codexpert <hi@codexpert.io>
 */
class Admin extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->server	= $this->plugin['server'];
		$this->version	= $this->plugin['Version'];

		$this->admin_url = admin_url( 'upload.php' );
	}

	/**
	 * Internationalization
	 */
	public function i18n() {
		load_plugin_textdomain( 'image-sizes', false, THUMBPRESS_DIR . '/languages/' );
	}

	/**
	 * Installer. Runs once when the plugin in activated.
	 *
	 * @since 1.0
	 */
	public function install() {
		if( get_option( 'image-sizes_survey_agreed' ) != 1 ) {
			delete_option( 'image-sizes_survey' );
		}

		if( ! get_option( 'image-sizes_version' ) ){
			update_option( 'image-sizes_version', $this->version );
		}
		
		if( ! get_option( 'image-sizes_install_time' ) ){
			update_option( 'image-sizes_install_time', time() );
		}
	}

	/**
	 * Enqueue JavaScripts and stylesheets
	 */
	public function enqueue_scripts() {
		$min = defined( 'THUMBPRESS_DEBUG' ) && THUMBPRESS_DEBUG ? '' : '.min';
		
		wp_enqueue_style( $this->slug, plugins_url( "/assets/css/admin{$min}.css", THUMBPRESS ), '', $this->version, 'all' );

		wp_enqueue_script( $this->slug, plugins_url( "/assets/js/admin{$min}.js", THUMBPRESS ), [ 'jquery' ], $this->version, true );
		
		$localized = array(
			'ajaxurl'		=> admin_url( 'admin-ajax.php' ),
			'nonce'			=> wp_create_nonce( $this->slug ),
			'regen'			=> __( 'Regenerate', 'image-sizes' ),
			'regening'		=> __( 'Regenerating..', 'image-sizes' ),
			'analyze'		=> __( 'Analyze', 'image-sizes' ),
			'analyzing'		=> __( 'Analyzing..', 'image-sizes' ),
			'analyzed'		=> __( 'Analyzed', 'image-sizes' ),
			'optimize'		=> __( 'Optimize', 'image-sizes' ),
			'optimizing'	=> __( 'Optimizing..', 'image-sizes' ),
			'optimized'		=> __( 'Optimized', 'image-sizes' ),
		);
		wp_localize_script( $this->slug, 'IMAGE_SIZES', apply_filters( "{$this->slug}-localized", $localized ) );
	}

	public function set_init_sizes() {
		update_option( '_image-sizes', Helper::default_image_sizes() );
	}

	/**
     * unset image size(s)
     *
     * @since 1.0
     */
    public function image_sizes( $sizes ){
        $disables = Helper::get_option( 'prevent_image_sizes', 'disables', [] );

        if( count( $disables ) ) :
        foreach( $disables as $disable ){
            unset( $sizes[ $disable ] );
        }
        endif;
        
        return $sizes;
    }

	public function action_links( $links ) {

		$new_links = [
			'settings'	=> sprintf( '<a href="%1$s">' . __( 'Settings', 'image-sizes' ) . '</a>', add_query_arg( 'page', $this->slug, $this->admin_url ) ),
			'setup_wizard'	=> sprintf( '<a href="%1$s">' . __( 'Setup Wizard', 'image-sizes' ) . '</a>', add_query_arg( 'page', "{$this->slug}_setup", $this->admin_url ) )
		];
		
		return array_merge( $new_links, $links );
	}

	public function plugin_row_meta( $plugin_meta, $plugin_file ) {
		
		if ( $this->plugin['basename'] === $plugin_file ) {
			$plugin_meta['help'] = '<a href="https://help.codexpert.io/" target="_blank" class="cx-help">' . __( 'Help', 'image-sizes' ) . '</a>';
		}

		return $plugin_meta;
	}

	public function footer_text( $text ) {
		if( get_current_screen()->parent_base != $this->slug ) return $text;

		return sprintf( __( 'If you like <strong>%1$s</strong>, please <a href="%2$s" target="_blank">leave us a %3$s rating</a> on WordPress.org! It\'d motivate and inspire us to make the plugin even better!', 'image-sizes' ), $this->name, "https://wordpress.org/support/plugin/{$this->slug}/reviews/?filter=5#new-post", '⭐⭐⭐⭐⭐' );
	}

	public function admin_notices() {
		
		if( ! current_user_can( 'manage_options' ) || get_option( "{$this->slug}_setup_done" ) == 1 ) return;

		?>
		<div class="notice notice-warning cx-notice cx-shadow is-dismissible">
			<h3><?php _e( 'Congratulations! You\'re almost there.. 🥳' ); ?></h3>
			<p><?php printf( __( 'Thanks for installing <strong>%1$s</strong>. In order to stop unnecessary image sizes from generating, you need disable them first.' ), $this->name ); ?></p>
			<p>
				<a class="button button-primary" href="<?php echo add_query_arg( 'page', "{$this->slug}_setup", $this->admin_url ); ?>"><?php _e( 'Run Setup Wizard', 'image-sizes' ); ?></a>
			</p>
		</div>
		<?php
	}
}