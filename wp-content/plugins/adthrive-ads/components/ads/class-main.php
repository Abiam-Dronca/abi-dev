<?php
/**
 * Ads Main Class
 *
 * @package AdThrive Ads
 */

namespace AdThrive_Ads\Components\Ads;

/**
 * Main class
 */
class Main {

	/**
	 * Add hooks
	 */
	public function setup() {
		add_action( 'init', array( $this, 'init' ) );

		add_filter( 'adthrive_ads_options', array( $this, 'add_options' ), 10, 1 );

		add_action( 'cmb2_admin_init', array( $this, 'all_objects' ) );

		add_action( 'wp_head', array( $this, 'ad_head' ), 1 );

		add_action( 'wp_head', array( $this, 'adthrive_preload' ) );

		add_filter( 'body_class', array( $this, 'body_class' ) );

		add_action( 'wp_ajax_adthrive_terms', array( $this, 'ajax_terms' ) );

	}

	/**
	 * Init hook - check for parameter to update downloaded file
	 */
	public function init() {
	}

	/**
	 * AJAX method to get terms with the matched search query for the specified taxonomy
	 */
	public function ajax_terms() {
		if ( isset( $_GET['query'] ) ) {
			$query = sanitize_text_field( wp_unslash( $_GET['query'] ) );
		}

		if ( isset( $_GET['taxonomy'] ) ) {
			$taxonomy = sanitize_text_field( wp_unslash( $_GET['taxonomy'] ) );
		}

		wp_send_json( $this->get_term_selectize( $taxonomy, array( 'search' => $query ) ) );
	}

	/**
	 * Adds classes to disable ads based on the plugin settings
	 *
	 * @param string|array $classes One or more classes to add to the class list.
	 */
	public function body_class( $classes ) {
		if ( is_singular() ) {
			global $post;

			$disable = get_post_meta( get_the_ID(), 'adthrive_ads_disable', true );
			$disable_content_ads = get_post_meta( get_the_ID(), 'adthrive_ads_disable_content_ads', true );
			$disable_auto_insert_videos = get_post_meta( get_the_ID(), 'adthrive_ads_disable_auto_insert_videos', true );
			$re_enable_ads_on = get_post_meta( get_the_ID(), 'adthrive_ads_re_enable_ads_on', true );

			$disabled_categories = \AdThrive_Ads\Options::get( 'disabled_categories' );
			$disabled_tags = \AdThrive_Ads\Options::get( 'disabled_tags' );

			$categories = get_the_category( $post->ID );
			$tags = get_the_tags( $post->ID );

			$category_names = is_array( $categories ) ? array_map( array( $this, 'pluck_name' ), $categories ) : array();
			$tag_names = is_array( $tags ) ? array_map( array( $this, 'pluck_name' ), $tags ) : array();

			if ( ! $re_enable_ads_on || false === trim( $re_enable_ads_on ) || $re_enable_ads_on > time() ) {
				if ( $disable ) {
					$classes[] = 'adthrive-disable-all';
				}

				if ( $disable_content_ads || in_array( 'noads', $tag_names, true ) ) {
					$classes[] = 'adthrive-disable-content';
				}

				if ( $disable_auto_insert_videos || in_array( 'noads', $tag_names, true ) ) {
					$classes[] = 'adthrive-disable-video';
				}
			}

			if ( is_array( $disabled_categories ) && array_intersect( $disabled_categories, $category_names ) ) {
				$classes[] = 'adthrive-disable-all';
			} elseif ( is_array( $disabled_tags ) && array_intersect( $disabled_tags, $tag_names ) ) {
				$classes[] = 'adthrive-disable-all';
			}
		} elseif ( is_404() ) {
			$classes[] = 'adthrive-disable-all';
		}

		return $classes;
	}

	/**
	 * Gets the object name
	 *
	 * @param object $obj    An object with a name property
	 *
	 * @return string The object name
	 */
	private function pluck_name( $obj ) {
		return $obj->name;
	}

	/**
	 * Gets just the object name property
	 *
	 * @param object $obj    An object with a name property
	 *
	 * @return string An object with just a name property
	 */
	private function get_selectize( $obj ) {
		return array(
			'text' => $obj->name,
			'value' => $obj->name,
		);
	}

	/**
	 * Add fields to the options metabox
	 */
	public function all_objects() {
		$post_meta = new_cmb2_box( array(
			'id' => 'adthrive_ads_object_metabox',
			'title' => __( 'AdThrive Ads', 'adthrive_ads' ),
			'object_types' => array( 'page', 'post' ),
		) );

		$post_meta->add_field( array(
			'name' => __( 'Disable all ads', 'adthrive_ads' ),
			'id' => 'adthrive_ads_disable',
			'type' => 'checkbox',
		) );

		$post_meta->add_field( array(
			'name' => __( 'Disable content ads', 'adthrive_ads' ),
			'id' => 'adthrive_ads_disable_content_ads',
			'type' => 'checkbox',
		) );

		$post_meta->add_field( array(
			'name' => __( 'Disable auto-insert video players', 'adthrive_ads' ),
			'id' => 'adthrive_ads_disable_auto_insert_videos',
			'type' => 'checkbox',
		) );

		$post_meta->add_field( array(
			'name' => __( 'Re-enable ads on', 'adthrive_ads' ),
			'desc' => __( 'All ads on this post will be enabled on the specified date', 'adthrive_ads' ),
			'id'   => 'adthrive_ads_re_enable_ads_on',
			'type' => 'text_date_timestamp',
		) );

		if ( \AdThrive_Ads\Options::get( 'disable_video_metadata' ) === 'on' ) {
			$post_meta->add_field( array(
				'name' => __( 'Enable Video Metadata', 'adthrive_ads' ),
				'desc' => __( 'Enable adding metadata to video player on this post', 'adthrive_ads' ),
				'id'   => 'adthrive_ads_enable_metadata',
				'type' => 'checkbox',
			) );
		} else {
			$post_meta->add_field( array(
				'name' => __( 'Disable Video Metadata', 'adthrive_ads' ),
				'desc' => __( 'Disable adding metadata to video player on this post', 'adthrive_ads' ),
				'id'   => 'adthrive_ads_disable_metadata',
				'type' => 'checkbox',
			) );
		}

	}

	/**
	 * Add fields to the options metabox
	 *
	 * @param CMB $cmb A CMB metabox instance
	 */
	public function add_options( $cmb ) {
		$cmb->add_field( array(
			'name' => __( 'Site Id', 'adthrive_ads' ),
			'desc' => __( 'Add your AdThrive Site ID', 'adthrive_ads' ),
			'id' => 'site_id',
			'type' => 'text',
			'attributes' => array(
				'required' => 'required',
				'pattern' => '[0-9a-f]{24}',
				'title' => 'The site id needs to match the one provided by AdThrive exactly',
			),
		) );

		$cmb->add_field( array(
			'name' => 'Disabled for Categories',
			'desc' => 'Disable ads for the selected categories.',
			'id' => 'disabled_categories',
			'type' => 'text',
			'escape_cb' => array( $this, 'selectize_escape' ),
			'sanitization_cb' => array( $this, 'selectize_sanitize' ),
		) );

		$cmb->add_field( array(
			'name' => 'Disabled for Tags',
			'desc' => 'Disable ads for the selected tags.',
			'id' => 'disabled_tags',
			'type' => 'text',
			'escape_cb' => array( $this, 'selectize_escape' ),
			'sanitization_cb' => array( $this, 'selectize_sanitize' ),
		) );

		$cmb->add_field( array(
			'name' => 'Disable Video Metadata',
			'desc' => 'Disable adding metadata to video players. Caution: This is a site-wide change. Only choose if metadata is being loaded another way.',
			'id' => 'disable_video_metadata',
			'type' => 'checkbox',
		) );

		$cmb->add_field( array(
			'name' => 'CLS Optimization',
			'desc' => "Enable solution to reduce ad-related CLS
			</br>Clear your site's cache after saving this setting to apply the update across your site. Get more details on CLS optimization <a href='https://help.adthrive.com/hc/en-us/articles/360048229151-How-can-I-reduce-Cumulative-Layout-Shift-CLS-from-ads-' target='_blank'>here.</a>",
			'id' => 'cls_optimization',
			'type' => 'checkbox',
		) );

		return $cmb;
	}

	/**
	 * Called for checkbox to properly default to true
	 */
	public function sanitize_checkbox( $value ) {
		return is_null( $value ) ? 0 : $value;
	}

	/**
	 * Convert a selectize field array value to string
	 *
	 * @param  mixed $value The actual field value.
	 * @return String Field value converted to a string
	 */
	public function selectize_escape( $value ) {
		if ( is_string( $value ) ) {
			return $value;
		}

		return ! empty( $value ) ? implode( ',', $value ) : null;
	}

	/**
	 * Convert a selectize field value to array
	 *
	 * @param  mixed $value The actual field value.
	 * @return array Field value converted to an array
	 */
	public function selectize_sanitize( $value ) {
		if ( is_array( $value ) ) {
			return $value;
		}

		return ! empty( $value ) ? explode( ',', $value ) : null;
	}

	/**
	 * Add the AdThrive ads script
	 */
	public function ad_head() {
		$data['site_id'] = \AdThrive_Ads\Options::get( 'site_id' );
		$cls_optimization = \AdThrive_Ads\Options::get( 'cls_optimization' );
		// if cls_optimization is false in the plugin, cls could still be on in ads min, so we set this here
		$data['plugin_debug'] = isset( $_GET['plugin_debug'] ) && 'true' === sanitize_text_field( wp_unslash( $_GET['plugin_debug'] ) ) ? 'true' : 'false';
		$thrive_architect_enabled = isset( $_GET['tve'] ) && sanitize_key( $_GET['tve'] ) === 'true';
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			$request_uri = esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) );
			$widget_preview_active = strpos( $request_uri, 'wp-admin/widgets.php' ) !== false;
		} else {
			$widget_preview_active = false;
		}

		if ( isset( $data['site_id'] ) && preg_match( '/[0-9a-f]{24}/i', $data['site_id'] ) && ! $thrive_architect_enabled && ! $widget_preview_active ) {
			$body_classes = $this->body_class( [] );
			if ( 'on' === $cls_optimization ) {
				$cls_data = $this->parse_cls_deployment();
				$data = array_merge( $data, $cls_data );

				$data['site_js'] = $this->get_site_js();
				$data['site_css'] = $this->get_file_content( 'site.css' );
				$disable_all = in_array( 'adthrive-disable-all', $body_classes, true );
				if ( ! empty( $data['site_js'] ) ) {
					$decoded_data = json_decode( $data['site_js'] );
					if ( $this->has_essential_site_ads_keys( $decoded_data ) ) {
						require 'partials/insertion-includes.php';
						add_action('wp_head', function() use ( $data ) {
							$this->insert_cls_file( 'cls-disable-ads', $data );
						}, 100 );

						if ( ! $disable_all && null !== $decoded_data && isset( $decoded_data->adUnits ) ) {
							$adunits = $decoded_data->adUnits;
							foreach ( $adunits as $adunit ) {
								if ( 'Header' === $adunit->location && isset( $adunit->dynamic ) ) {
									if ( ! isset( $adunit->dynamic->spacing ) ) {
										$adunit->dynamic->spacing = 0;
									}
									if ( ! isset( $adunit->dynamic->max ) ) {
										$adunit->dynamic->max = 0;
									} else {
										$adunit->dynamic->max = (int) floor( $adunit->dynamic->max );
									}
									if ( ! isset( $adunit->sequence ) ) {
										$adunit->sequence = 1;
									}
									if ( true === $adunit->dynamic->enabled && 1 === $adunit->dynamic->max && 0 === $adunit->dynamic->spacing && 1 === $adunit->sequence ) {
										add_action('wp_head', function() use ( $data ) {
											$this->insert_cls_file( 'cls-header-insertion', $data );
										}, 101 );
									}
								}
							}
						}

						add_action('wp_footer', function() use ( $data ) {
							$this->insert_cls_file( 'cls-insertion', $data );
							$this->check_cls_insertion();
						}, 1 );
					} else {
						require 'partials/sync-error.php';
					}
				}
			}

			require 'partials/ads.php';
		}
	}

	/**
	 * Adthrive Preload hook - adds dns prefetch and preconnect elements to adthrive resources
	 */
	public function adthrive_preload() {
		echo '<link rel="dns-prefetch" href="https://ads.adthrive.com/">';
		echo '<link rel="preconnect" href="https://ads.adthrive.com/">';
		echo '<link rel="preconnect" href="https://ads.adthrive.com/" crossorigin>';
	}

	/**
	 * Returns true if all expected siteAds keys exist: siteId, siteName, adOptions, breakpoints, adUnits
	 * If these keys are not present, there was an issue syncing the siteAds data, and we shouldnt load any CLS
	 */
	private function has_essential_site_ads_keys( $site_ads_object ) {
		return ( null !== $site_ads_object && isset( $site_ads_object->siteId ) && isset( $site_ads_object->siteName ) && isset( $site_ads_object->adOptions ) && isset( $site_ads_object->breakpoints ) && isset( $site_ads_object->adUnits ) );
	}

	/**
	 * Returns the site js value.
	 * If a location is provided via query params, it will fetch the value from the specified endpoint.
	 * Otherwise, it will fetch the value from the site.js file on the file system.
	 */
	private function get_site_js() {
		$site_ads_environment = $this->get_site_ads_environment();
		if ( isset( $site_ads_environment ) ) {
			$response = $this->get_remote_site_ads( $site_ads_environment );
			if ( is_array( $response ) ) {
				return wp_remote_retrieve_body( $response );
			} else {
				esc_html_e( 'Bad response when retrieving site ads from envionment ' . $site_ads_environment );
				return null;
			}
		}
		return $this->get_file_content( 'site.js' );
	}

	/**
	 * Return the environment that site ads should be retrived from.
	 * Expected values are "production", "staging", "dev", or null.
	 */
	public function get_site_ads_environment() {
		return isset( $_GET['plugin_site_ads_environment'] ) ? substr( sanitize_text_field( wp_unslash( $_GET['plugin_site_ads_environment'] ) ), 0, 10 ) : null;
	}

	/**
	 * Check if cls insertion script tag has been inserted to page, if not set injectedFromPlugin to false
	 */
	private function check_cls_insertion() {
		$cls = "'cls-'";
		// phpcs:disable
		echo '<script data-no-optimize="1" data-cfasync="false">';
		echo '(function () {';
		echo 'var clsElements = document.querySelectorAll("script[id^=' . $cls . ']"); window.adthriveCLS && clsElements && clsElements.length === 0 ? window.adthriveCLS.injectedFromPlugin = false : ""; ';
		echo '})();';
		echo '</script>';
		// phpcs:enable
	}

	/**
	 * Returns hash value specified from the url params
	 */
	public function get_remote_cls_hash() {
		return isset( $_GET['plugin_remote_cls'] ) ? sanitize_text_field( wp_unslash( $_GET['plugin_remote_cls'] ) ) : '';
	}

	/**
	 * Get cls file endpoint url for the hash. If no hash specified, then return empty string
	 */
	public function get_remote_cls_file_url( $filename, $data ) {
		$remote_cls_hash = $this->get_remote_cls_hash();
		if ( '' !== $remote_cls_hash ) {
			return 'https://ads.adthrive.com/builds/core/' . $remote_cls_hash . '/js/cls/' . $filename . '.min.js?ts=' . strval( time() );
		}
		return '';
	}

	/**
	 * Inserts cls file content to script tag
	 * If debug options are enabled, makes request to remote url to fetch cls files.
	 */
	public function insert_cls_file( $filename, $data ) {
		// phpcs:disable
		$remote_cls_file_url = $this->get_remote_cls_file_url( $filename, $data );
		if ( '' !== $remote_cls_file_url ) {
			echo "<script data-no-optimize='1' data-cfasync='false' id='" . $filename . "-remote' src='" . $remote_cls_file_url . "'></script>";
		} else {
			$cls_content = $this->get_cls_file( $filename, $data );
			if ( '' !== $cls_content['branch'] ) {
				echo "<script data-no-optimize='1' data-cfasync='false' id='" . $filename . "-" . $cls_content['branch'] . "'>";
				echo $cls_content['content'];
				echo "</script>";
			}
		// phpcs:enable
		}
	}

	/**
	 * Get cls insertion file for the hash, if file for the hash is not found, return stable version
	 */
	public function get_cls_file( $filename, $data ) {
		if ( isset( $data['cls_branch'] ) ) {
			if ( isset( $data['cls_bucket'] ) && 'prod' !== $data['cls_bucket'] ) {
				$file_content = $this->get_file_content( 'js/insertion/min/' . $filename . '.' . $data['cls_branch'] . '.js' );
				if ( $file_content ) {
					return array(
						'branch' => $data['cls_branch'],
						'bucket' => $data['cls_bucket'],
						'content' => $file_content,
					);
				}
			}

			$stable_file_content = $this->get_file_content( 'js/insertion/min/' . $filename . '.stable.js' );
			if ( $stable_file_content ) {
				return array(
					'branch' => $data['cls_branch'],
					'bucket' => $data['cls_bucket'],
					'content' => $stable_file_content,
				);
			}
		}

		return array(
			'branch' => '',
			'bucket' => '',
			'content' => '',
		);
	}

	/**
	 * Parser CLS deployment file from file system and return deployment info
	 */
	private function parse_cls_deployment() {
		$output = array();
		$deploy_str = $this->get_file_content( 'cls-deployments.js' );
		if ( $deploy_str && strlen( $deploy_str ) > 1 ) {
			$cls_deployment = json_decode( $deploy_str );
			$output['cls_branch'] = $cls_deployment->stable;
			$output['cls_bucket'] = 'prod';

			if ( isset( $cls_deployment->test ) ) {
				$output['cls_branch'] = $cls_deployment->test;
				$output['cls_bucket'] = 'feature';
			}

			$cls_hash = $this->get_remote_cls_hash();
			if ( strlen( $cls_hash ) > 0 ) {
				$output['cls_branch'] = $cls_hash;
				$output['cls_bucket'] = 'debug';
			}
		}
		return $output;
	}

	/**
	 * Gets terms and displays them as options
	 *
	 * @param  String $taxonomy Taxonomy terms to retrieve. Default is category.
	 * @param  String|array $args Optional. get_terms optional arguments
	 * @return array An array of options that matches the CMB2 options array
	 */
	public function get_term_selectize( $taxonomy = 'category', $args = array() ) {
		$args['taxonomy'] = $taxonomy;
		$args = wp_parse_args( $args, array(
			'taxonomy' => 'category',
			'number' => 100,
		) );

		$taxonomy = $args['taxonomy'];

		$terms = (array) get_terms( $taxonomy, $args );

		return is_array( $terms ) ? array_map( array( $this, 'get_selectize' ), $terms ) : array();
	}

	/**
	 * Get the local file content
	 */
	private function get_file_content( $filename ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		if ( \WP_Filesystem() ) {
			global $wp_filesystem;

			return $wp_filesystem->get_contents( ADTHRIVE_ADS_PATH . $filename );
		}

		return false;
	}

	/**
	 * Returns the site id
	 */
	private function get_site_id() {
		return \AdThrive_Ads\Options::get( 'site_id' );
	}

	/**
	 * Returns query param needed to fetch the site ads value from a specific table.
	 */
	private function get_site_ads_config_query_param( $environment ) {
		if ( ! isset( $environment ) ) {
			return '';
		}
		$environment_config = array(
			'production' => 'Prod',
			'staging' => 'QA',
			'dev' => 'Dev',
		);
		if ( ! isset( $environment_config[ $environment ] ) ) {
			esc_html_e( 'Query param is not set for environment "' . $environment . '". Update $enviroment_config to include a value for this environment.' );
			return '';
		}
		return "&config=$environment_config[$environment]:all";
	}

	/**
	 * Fetches site ads value from endpoint
	 */
	private function get_remote_site_ads( $environment ) {
		$site_id = $this->get_site_id();
		$config_query_param = $this->get_site_ads_config_query_param( $environment );
		$remote = "https://ads.adthrive.com/api/v1/siteAds/$site_id?ts=" . strval( time() ) . $config_query_param;
		$response = wp_remote_get( $remote );
		$response_code = wp_remote_retrieve_response_code( $response );
		if ( 200 !== $response_code ) {
			esc_html_e( 'Unexpected response code when fetching remote site ads from ' . $remote . '. Response code: ' . $response_code );
		}
		if ( wp_remote_retrieve_body( $response ) === 'false' ) {
			esc_html_e( 'Error when fetch remote site ads from ' . $remote . '. Make sure you have siteAds defined for this environment.' );
		}
		return $response;
	}

	/**
	 * Get and save the latest site js and css file
	 */
	private function save_site_files() {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		global $wp;
		$filename = ADTHRIVE_ADS_PATH . 'site.js';
		$css_filename = ADTHRIVE_ADS_PATH . 'site.css';

		$site_ads_environment = $this->get_site_ads_environment();
		// use a transient to store the etag?
		$response = $this->get_remote_site_ads( $site_ads_environment );
		$successful_saves = array();

		if ( is_wp_error( $response ) ) {
			$successful_saves['site_ads_json'] = $response;
		}

		$response_text = wp_remote_retrieve_body( $response );
		if ( is_array( $response ) ) {
			if ( \WP_Filesystem() ) {
				global $wp_filesystem;

				$successful_saves['site_ads_json'] = $wp_filesystem->put_contents( $filename, $response_text, FS_CHMOD_FILE );

				$css_content = $this->get_remote_file( 'https://ads.adthrive.com/sites/' . $this->get_site_id() . '/ads.min.css?ts=' . strval( time() ) );
				if ( is_wp_error( $css_content ) ) {
					$successful_saves['css_content'] = $css_content;
				} else {
					$successful_saves['css_content'] = $wp_filesystem->put_contents( $css_filename, $css_content, FS_CHMOD_FILE );
				}
			} else {
				$successful_saves['site_ads_json'] = new \WP_Error( 'NO_FILESYSTEM', 'WP_Filesystem not available' );
			}
		}
		return $successful_saves;
	}

	/**
	 * Makes request to remote url and returns content
	 */
	private function get_remote_file( $url ) {
		$response = wp_remote_get( $url );
		$response_text = wp_remote_retrieve_body( $response );
		if ( is_array( $response ) ) {
			return $response_text;
		}
		return $response;
	}
}
