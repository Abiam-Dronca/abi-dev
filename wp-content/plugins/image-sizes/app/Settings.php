<?php
/**
 * All settings related functions
 */
namespace Codexpert\ThumbPress\App;
use Codexpert\ThumbPress\Helper;
use Codexpert\Plugin\Base;

/**
 * @package Plugin
 * @subpackage Settings
 * @author Codexpert <hi@codexpert.io>
 */
class Settings extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->version	= $this->plugin['Version'];
	}
	
	public function init_menu() {
		
		$image_sizes = get_option( '_image-sizes', [] );

		$settings = [
			'id'            => $this->slug,
			'label'         => __( 'ThumbPress', 'image-sizes' ),
			'title'         => $this->name,
			'header'        => $this->name,
			'parent'        => 'upload.php',
			'priority'      => 10,
			'capability'    => 'manage_options',
			'icon'          => 'dashicons-image-crop',
			'position'      => '10.5',
			'sections'      => [
				'prevent_image_sizes'	=> 	[
					'id'        => 'prevent_image_sizes',
					'label'     => __( 'Disable Thumbnails', 'image-sizes' ),
					'icon'      => 'dashicons-images-alt2',
					'sticky'	=> false,
					'content'	=> Helper::get_template( 'disable-sizes', 'views/settings', [ 'image_sizes' => $image_sizes ] ),
					'fields'    => []
				],
				'image-sizes_regenerate'	=> [
					'id'        => 'image-sizes_regenerate',
					'label'     => __( 'Regenerate', 'image-sizes' ),
					'icon'      => 'dashicons-format-gallery',
					'hide_form'	=> true,
					'content'	=> Helper::get_template( 'regenerate-thumbnails', 'views/settings' ),
					'fields'    => []
				],
				'image-sizes_more_plugins'	=> [
					'id'        => 'image-sizes_more_plugins',
					'label'     => __( 'Supercharge', 'image-sizes' ),
					'icon'      => 'dashicons-superhero',
					'hide_form'	=> true,
					'content'	=> Helper::get_template( 'more-plugins', 'views/settings' ),
					'fields'    => []
				],
			],
		];

		new \Codexpert\Plugin\Settings( $settings );
	}
}