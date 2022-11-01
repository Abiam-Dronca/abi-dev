<?php
class THB_Social_Links {

	public $transient_timeout = 12 * HOUR_IN_SECONDS;

	public function __construct() { }

	public static function instance() {
		static $instance = null;

		// Only run these methods if they haven't been run previously
		if ( null === $instance ) {
			$instance = new THB_Social_Links();
			$instance->init();
		}

		// Always return the instance
		return $instance;
	}
	/**
	 * Initialize module
	 */
	public function init() {
		require_once get_theme_file_path( '/inc/framework/thb-social-links/thb-random-user-agent.php' );
		require_once get_theme_file_path( '/inc/framework/thb-social-links/social-links-list.php' );
	}
	// Set Cache
	public function thb_set_cache( $cache_name, $cache ) {
		set_transient( $cache_name, $cache, $this->transient_timeout );
	}
	// Remote Get
	public function thb_remote_get( $args ) {
		$cache_name = 'thb_social_' . $args['name'] . '_' . $args['username'] . '_count';

		// Get Cache
		$data = get_transient( $cache_name );

		if ( ! $data ) {

			// Generate Url.
			$params     = http_build_query( $args['params'] );
			$remote_url = $params ? $args['url'] . '?' . $params : $args['url'];

			// Request
			$request_params = array(
				'timeout'    => 30,
				'user-agent' => thb_random_user_agent(),
				'headers'    => array(
					'Accept-language' => 'en',
				),
			);

			$request = wp_safe_remote_get( $remote_url, $request_params );

			if ( is_wp_error( $request ) ) {
				return false;
			}

			$data = wp_remote_retrieve_body( $request );
		}

		return $data;
	}

	// Medium
	public function thb_get_medium( $username ) {

		$result = array(
			'count' => 0,
		);

		// Check user
		if ( ! $username ) {
			$result['error'] = esc_html( 'Please enter a Medium User.', 'theissue' );
			return $result;
		}

		// Get Count
		$data = $this->thb_remote_get(
			array(
				'name'     => 'medium',
				'username' => $username,
				'url'      => 'https://medium.com/' . $username,
				'params'   => array(
					'format' => 'json',
				),
			)
		);

		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Set Count
		if ( isset( $data->message ) ) {
			// API Error
			$result['error'] = $data->message;
		} elseif ( $data ) {
			$data = str_replace( '])}while(1);</x>', '', $data );

			$data = json_decode( $data, true );

			if ( isset( $data['payload']['user']['userId'] ) ) {

				$user_id = $data['payload']['user']['userId'];

				if ( isset( $data['payload']['references']['SocialStats'][ $user_id ]['usersFollowedByCount'] ) ) {
					// Live Count
					$result['count'] = $data['payload']['references']['SocialStats'][ $user_id ]['usersFollowedByCount'];
				}
			}
		}

		// Set Cache
		$this->thb_set_cache( 'thb_social_medium_' . $username . '_count', $result );

		return $result;
	}
	// Youtube
	public function thb_get_youtube( $username ) {

		$channel_type = 'channel';
		$result       = array(
			'count' => 0,
		);

		// Check username
		if ( ! $username ) {
			$result['error'] = esc_html__( 'Please enter an YouTube User.', 'theissue' );
			return $result;
		}
		$thb_google_api_key = apply_filters( 'thb_google_api_key', ot_get_option( 'social_youtube_api_key' ) );

		if ( defined( 'THB_DEMO_SITE' ) ) {
			$thb_google_api_key = 'AIzaSyDwAwpB3ESvJbPLjhz9HpI4cH2OE8zAaNA';
		}
		// Generate Params
		switch ( $channel_type ) {
			case 'username':
				$params = array(
					'forUsername' => $username,
					'part'        => 'statistics',
					'key'         => $thb_google_api_key,
				);
				break;
			case 'channel':
			default:
				$params = array(
					'id'     => $username,
					'part'   => 'statistics',
					'fields' => 'items/statistics/subscriberCount',
					'key'    => $thb_google_api_key,
				);
				break;
		}

		// Get Count
		$data = $this->thb_remote_get(
			array(
				'name'     => 'youtube',
				'username' => $username,
				'url'      => 'https://www.googleapis.com/youtube/v3/channels/',
				'params'   => $params,
			)
		);
		if ( ! is_array( $data ) ) {
			$data = json_decode( $data );
		}

		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Set Count.
		if ( isset( $data->error->message ) ) {

			// API Error
			$result['error'] = $data->error->message;

		} elseif ( isset( $data->items[0]->statistics->subscriberCount ) ) {

			// Live Count
			$result['count'] = $data->items[0]->statistics->subscriberCount;

		} elseif ( isset( $data->items ) && empty( $data->items ) ) {

			// API Error
			$result['error'] = esc_html__( 'Please check your username or channel IDs.', 'theissue' );

		}

		// Set Cache
		$this->thb_set_cache( 'thb_social_youtube_' . $username . '_count', $result );

		return $result;
	}

	// Twitter
	public function thb_get_twitter( $username ) {

		$result = array(
			'count' => 0,
		);

		// Check username
		if ( ! $username ) {
			$result['error'] = esc_html__( 'Please enter a Twitter User.', 'theissue' );
			return $result;
		}

		$data = get_transient( 'thb_social_twitter_' . $username . '_count' );

		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Get Count
		if ( ! $data ) {

			// Get Access Token http://www.developerdrive.com/2013/06/oauth2-and-the-twitter-api-a-wordpress-plugin/
			$token = get_transient( 'thb_twitter_access_token' );
			if ( ! $token ) {
				$bearer_token_credential = 't0w3HYVODhFG0m34IFXg:lE7n2D4CFcikzCUIwF9JYj6fKSkjJ8la1oEmpYXk';
				$credentials             = thb_encode( $bearer_token_credential );

				$args = array(
					'method'      => 'POST',
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array(
						'Authorization' => 'Basic ' . $credentials,
						'Content-Type'  => 'application/x-www-form-urlencoded;charset=UTF-8',
					),
					'body'        => array( 'grant_type' => 'client_credentials' ),
				);

				add_filter( 'https_ssl_verify', '__return_false' );
				$response = wp_remote_post( esc_url( 'https://api.twitter.com/oauth2/token', null, '' ), $args );

				$keys = json_decode( wp_remote_retrieve_body( $response ) );

				$token = isset( $keys->access_token ) ? $keys->access_token : null;

				$this->thb_set_cache( 'thb_twitter_access_token', $token );
			}

			// Get Data
			$args = array(
				'httpversion' => '1.1',
				'blocking'    => true,
				'headers'     => array(
					'Authorization' => "Bearer $token",
				),
			);
			add_filter( 'https_ssl_verify', '__return_false' );

			$url = add_query_arg(
				array(
					'screen_name'     => $username,
					'count'           => '1',
					'exclude_replies' => true,
				),
				'https://api.twitter.com/1.1/statuses/user_timeline.json'
			);

			$response = wp_remote_get( $url, $args );
			remove_filter( 'https_ssl_verify', '__return_false' );

			// Set Data
			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

				$data = json_decode( wp_remote_retrieve_body( $response ) );

				if ( ! isset( $data->errors ) ) {
					$result['error'] = esc_html__( 'Not Available', 'theissue' );
				}
			} else {
				$data = json_decode( wp_remote_retrieve_body( $response ) );
			}
		}

		if ( 'string' === gettype( $data ) ) {
			$result['error'] = $data;
			return $result;
		}
		if ( isset( $data->error ) ) {
			$result['error'] = $data->error;
			return $result;
		}
		// Set Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {

			// Cached Count
			$result['count'] = $data['count'];

		} elseif ( isset( $data->errors ) ) {

			// API Error
			foreach ( $data->errors as $error ) {
				if ( isset( $error->message ) ) {
					$result['error'] = $error->message;

					break;
				}
			}
		} elseif ( isset( $data[0]->user->followers_count ) ) {

			// Live Count
			$result['count'] = $data[0]->user->followers_count;
		}

		// Set Cache
		$this->thb_set_cache( 'thb_social_twitter_' . $username . '_count', $result );

		return $result;
	}

	// Pinterest
	public function thb_get_pinterest( $username ) {

		$result = array(
			'count' => 0,
		);

		// Check username
		if ( ! $username ) {
			$result['error'] = esc_html__( 'Please enter a pinterest user name.', 'theissue' );
			return $result;
		}

		// Get Count
		$data = $this->thb_remote_get(
			array(
				'name'     => 'pinterest',
				'username' => $username,
				'url'      => 'https://api.pinterest.com/v3/pidgets/users/' . $username . '/pins',
				'params'   => array(),
			)
		);
		if ( ! is_array( $data ) ) {
			$data = json_decode( $data );
		}
		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Set Count
		if ( is_object( $data ) && isset( $data->data->user->follower_count ) ) {

			// Get Count
			$result['count'] = $data->data->user->follower_count;
		} elseif ( is_object( $data ) && isset( $data->status ) && 'failure' === $data->status ) {

			// API Error
			if ( isset( $data->message ) ) {
				$result['error'] = $data->message;
			}
		}

		// Set Cache
		$this->thb_set_cache( 'thb_social_pinterest_' . $username . '_count', $result );

		return $result;
	}

	// Facebook
	public function thb_get_facebook( $username ) {

		$result = array(
			'count' => 0,
		);

		// Check username
		if ( ! $username ) {
			$result['error'] = esc_html__( 'Please enter a Facebook user name.', 'theissue' );

			return $result;
		}

		$url = add_query_arg(
			array(
				'href'                  => rawurlencode( 'https://www.facebook.com/' . $username ),
				'domain'                => rawurlencode( home_url() ),
				'origin'                => rawurlencode( home_url() ),
				'adapt_container_width' => 'true',
				'relation'              => 'parent.parent',
				'container_width'       => '300',
				'hide_cover'            => 'false',
				'locale'                => 'en_US',
				'sdk'                   => 'joey',
				'show_facepile'         => 'false',
				'show_posts'            => 'false',
				'small_header'          => 'false',
				'width'                 => '500px',
				'app_id'                => false,
			),
			'https://www.facebook.com/plugins/page.php'
		);

		// Get Count
		$data = $this->thb_remote_get(
			array(
				'name'     => 'facebook',
				'username' => $username,
				'url'      => $url,
				'params'   => array(),
			)
		);

		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Set Count
		$fb_result = preg_match( '/<div[^>]*?>([^>]*?)like/s', $data, $facebook_data );

		if ( $fb_result ) {
			$fb_data_full = array_shift( $facebook_data );
			$fb_data_json = array_shift( $facebook_data );

			// Live Count.
			$result['count'] = abs( filter_var( wp_strip_all_tags( $fb_data_json ), FILTER_SANITIZE_NUMBER_INT ) );
		} else {
			$result['error'] = esc_html__( 'Data not found. Please check your user ID.', 'theissue' );
		}

		// Set Cache
		$this->thb_set_cache( 'thb_social_facebook_' . $username . '_count', $result );

		return $result;
	}

	// Instagram
	public function thb_get_instagram( $username ) {

		$result = array(
			'count' => 0,
		);

		// Check Username
		if ( ! $username ) {
			$result['error'] = esc_html__( 'Please enter an Instagram Username.', 'theissue' );
			return $result;
		}
		$cache_name = 'thb_social_instagram_' . $username . '_count';
		$data       = get_transient( $cache_name );

		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}
		// Get Count
		$data = $this->thb_remote_get(
			array(
				'name'     => 'instagram',
				'username' => $username,
				'url'      => 'https://www.instagram.com/' . $username,
				'params'   => array(),
			)
		);

		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Get Data
		preg_match( '/window\._sharedData = (.*);<\/script>/', $data, $ins_data );

		$ins_data_full = array_shift( $ins_data );
		$ins_data_json = array_shift( $ins_data );

		if ( $ins_data_json ) {
			$instagram_json = json_decode( $ins_data_json, true );
			// Live Count.
			if ( ! empty( $instagram_json['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'] ) ) {
				$result['count'] = (int) $instagram_json['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'];
			} else {
				$result['error'] = esc_html__( 'Please check your username.', 'theissue' );
			}
		} else {
			$result['error'] = esc_html__( 'Please check your username.', 'theissue' );
		}

		// Set Cache
		if ( $result['count'] ) {
			$this->thb_set_cache( $cache_name, $result );
		}

		return $result;
	}

	// Vimeo
	public function thb_get_vimeo( $username ) {

		$result = array(
			'count' => 0,
		);

		// Check username
		if ( ! $username ) {
			$result['error'] = esc_html__( 'Please enter Vimeo Channel ID.', 'theissue' );
			return $result;
		}

		// Get Count
		$data = $this->thb_remote_get(
			array(
				'name'     => 'vimeo',
				'username' => $username,
				'url'      => 'http://vimeo.com/api/v2/channel/' . $username . '/info.json',
				'params'   => array(),
			)
		);

		if ( ! is_array( $data ) ) {
			$data = json_decode( $data );
		}
		// Cached Count
		if ( is_array( $data ) && isset( $data['count'] ) ) {
			return $data;
		}

		// Set Count
		if ( is_object( $data ) && isset( $data->total_subscribers ) ) {
			// Get Count
			$result['count'] = $data->total_subscribers;
		} elseif ( is_object( $data ) && isset( $data->status ) && 'failure' === $data->status ) {

			// API Error
			if ( isset( $data->message ) ) {
				$result['error'] = $data->message;
			}
		}

		// Set Cache
		$this->thb_set_cache( 'thb_social_vimeo_' . $username . '_count', $result );

		return $result;
	}

	// Get count of social network
	public function thb_get_count( $network, $username ) {
		$count_function = 'thb_get_' . $network;

		// Get Count
		if ( method_exists( $this, $count_function ) && $username ) {
			return $this->$count_function( $username );
		}
	}
}
/**
 * Main function responsible for returning the instance
 *
 * @return THB_Social_Links
 */
function THB_Social_Links() {
	return THB_Social_Links::instance();
}

// Enjoy!
THB_Social_Links();

function thb_social_links_get_count( $network = '', $username ) {

	// Get Count.
	$counter = new THB_Social_Links();

	$result = $counter->thb_get_count( $network, $username );

	if ( isset( $result['count'] ) ) {
		$result['count'] = thb_numberAbbreviation( $result['count'] );
	}

	return $result;
}
