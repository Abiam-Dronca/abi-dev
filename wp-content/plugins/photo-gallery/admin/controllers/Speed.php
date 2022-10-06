<?php

/**
 * Class SpeedController_bwg
 */
class SpeedController_bwg {
  /**
   * @var $model
   */
  private $model;
  /**
   * @var $view
   */
  private $view;
  /**
   * @var string $page
   */
  private $page;

  /**
   * @var string $booster_plugin_slug
   */
  private $booster_plugin_slug = 'tenweb-speed-optimizer/tenweb_speed_optimizer.php';

  /**
   * @var string $booster_plugin_zip_url
   */
  private $booster_plugin_zip_url = 'https://downloads.wordpress.org/plugin/tenweb-speed-optimizer.latest-stable.zip';

  /**
   * @var integer $booster_plugin_status 0-not installed, 1-not active, 2-active
  */
  private $booster_plugin_status = 0;

  /**
   * @var bool $booster_is_connected
   */
  private $booster_is_connected = FALSE;

  /**
   * @var bool $tenweb_is_paid
  */
  private $tenweb_is_paid = FALSE;

  /**
   * @var mixed $subscription_id
   */
  private $subscription_id = FALSE;

  /**
   * @var array $google_api_keys
  */
  private $google_api_keys = array();

  public function __construct() {
    $this->check_booster_status();
    $this->set_booster_data();

    $this->google_api_keys = array(
      'AIzaSyCQmF4ZSbZB8prjxci3GWVK4UWc-Yv7vbw',
      'AIzaSyAgXPc9Yp0auiap8L6BsHWoSVzkSYgHdrs',
      'AIzaSyCftPiteYkBsC2hamGbGax5D9JQ4CzexPU',
      'AIzaSyC-6oKLqdvufJnysAxd0O56VgZrCgyNMHg',
      'AIzaSyB1QHYGZZ6JIuUUce4VyBt5gF_-LwI5Xsk'
    );
    if ( class_exists('SpeedModel_bwg') && class_exists('SpeedView_bwg')) {
      $this->model = new SpeedModel_bwg();
      $this->view = new SpeedView_bwg();
    }

    $this->page = WDWLibrary::get('page');
  }

  /**
   * Set the data for Booster.
   *
   * @return void
   */
  public function set_booster_data() {
    $data = WDWLibrary::get_booster_data();
    $this->subscription_id = $data['subscription_id'];
    $this->booster_plugin_status = $data['booster_plugin_status'];
    $this->booster_is_connected = $data['booster_is_connected'];
    $this->tenweb_is_paid = $data['tenweb_is_paid'];
  }

  /**
   * Function is checking every time plugin status in wp with options and update option if somethin changed
   */
  public function check_booster_status() {
    $booster_plugin_status = get_option('bwg_speed');

    if( !empty($booster_plugin_status) && isset($booster_plugin_status['booster_plugin_status']) ) {
      $booster_plugin_status = $booster_plugin_status['booster_plugin_status'];
    } else {
      $booster_plugin_status = 0;
    }

    switch ( $booster_plugin_status ) {
      case 0:
        if ( $this->is_plugin_installed( $this->booster_plugin_slug ) ) {
          if ( is_plugin_active($this->booster_plugin_slug) ) {
            update_option('bwg_speed', array( 'booster_plugin_status' => 2 ), 1);
          } else {
            update_option('bwg_speed', array( 'booster_plugin_status' => 1 ), 1);
          }
        }
        break;
      case 1:
        if ( $this->is_plugin_installed( $this->booster_plugin_slug ) ) {
          if ( is_plugin_active($this->booster_plugin_slug) ) {
            update_option('bwg_speed', array( 'booster_plugin_status' => 2 ), 1);
          } else {
            update_option('bwg_speed', array( 'booster_plugin_status' => 1 ), 1);
          }
        } else {
          update_option('bwg_speed', array( 'booster_plugin_status' => 0 ), 1);
        }

        break;
      case 2:
        if ( $this->is_plugin_installed( $this->booster_plugin_slug ) ) {
          if ( !is_plugin_active($this->booster_plugin_slug) ) {
            update_option('bwg_speed', array( 'booster_plugin_status' => 1 ), 1);
          }
        } else {
          update_option('bwg_speed', array( 'booster_plugin_status' => 0 ), 1);
        }
        break;
    }
  }

  /**
   * Execute.
   */
  public function execute() {
    $task = WDWLibrary::get('task');
    if ( $task != 'display' && method_exists($this, $task) ) {
      //check_admin_referer(BWG()->nonce, BWG()->nonce);
      $this->$task();
    }
    else {
      $this->display();
    }
  }

  /**
   * Get pages compressed from endpoint
   */
  public function get_pages_compressed() {
    $workspace_id = 0;
    $domain_id = 0;
    if ( defined('TENWEBIO_MANAGER_PREFIX') ) {
      $workspace_id = (int) get_site_option(TENWEBIO_MANAGER_PREFIX . '_workspace_id', 0);
      $domain_id = (int) get_option(TENWEBIO_MANAGER_PREFIX . '_domain_id', 0);
    }

    $return_empty_data = array('pages' => array(),
      'total_compressed_images' => 0,
      'total_not_compressed_images_size' => '0 B',
      'total_not_compressed_images_count' => 0
    );

    if ( $workspace_id == 0 || $domain_id == 0 ) {
      return $return_empty_data;
    }
    $url = '';
    if ( defined('TENWEBIO_API_URL') ) {
      $url = TENWEBIO_API_URL . "/compress/workspaces/" . $workspace_id . "/domains/" . $domain_id."/stat";
    }

    $access_token = get_site_option('tenweb_access_token');

    $args = array(
      'timeout'     => 120,
      'headers'     => array(
        "accept" => "application/x.10weboptimizer.v3+json",
        "authorization" => "Bearer " . $access_token,
      ),
    );
    $response = wp_remote_get($url, $args);
    $return_data = $return_empty_data;
    if ( is_array($response) && !is_wp_error($response) ) {
      $body = json_decode( $response['body'], 1 );
      if ( isset($body['status']) && $body['status'] == 200 ) {
        $data = $body['data'];
        $total_size = isset($data['not_compressed']['total_size']) ? $data['not_compressed']['total_size'] : 0;
        $total_not_compressed_images_size = WDWLibrary::formatBytes($total_size);
        $total_not_compressed_images_count = intval($data['not_compressed']['full']+$data['not_compressed']['thumbs']+$data['not_compressed']['other']);
        $pages_compressed = $data['pages_compressed'];
        $total_compressed_images = 0;


        $two_optimized_pages = \TenWebOptimizer\OptimizerUtils::getCriticalPages();

        /* Add new key permalink to $pages_compressed array */
        foreach ( $pages_compressed as $key => $compressed ) {
          $total_compressed_images += $compressed['images_count'];
          $page_id = $compressed['page_id'];
          if( $page_id == 'front_page' ) {
            $permalink = get_home_url();;
          } else {
            $permalink = get_permalink( $page_id );
          }
          if(substr($permalink, -1) == '/') {
            $permalink = substr($permalink, 0, -1);
          }
          $pages_compressed[$key]['permalink'] = $permalink;
          unset($two_optimized_pages[$page_id]);
        }

        $i = 0;
        /* Adding new pages which are optimized but haven't images and endpoint doesn't have that pages in response */
        foreach ( $two_optimized_pages as $page_id => $val ) {
          $pages_compressed_temp[$i]['page_id'] = $page_id;
          $pages_compressed_temp[$i]['images_count'] = 0;
          $pages_compressed_temp[$i]['permalink'] = $val['url'];
          $i++;
        }
        if ( !empty($pages_compressed_temp) ) {
          $pages_compressed = array_merge($pages_compressed, $pages_compressed_temp);
        }


        $home_url = get_home_url();
        $home_compressed = false;
        foreach ( $pages_compressed as $key => $page ) {
          $permalink = $page['permalink'];

          if(substr($permalink, -1) != '/') {
            $permalink = $permalink.'/';
          }
          if(substr($home_url, -1) != '/') {
            $home_url = $home_url.'/';
          }
          if ( $permalink == $home_url ) {
            $home_compressed = true;
            $temp_data[0] = $pages_compressed[$key];
            $temp_data[0]['permalink'] = 'Homepage';
            unset($pages_compressed[$key]);
            continue;
          }
        }

        if ( $home_compressed ) {
          $pages_compressed = array_merge( $temp_data, $pages_compressed );
        }

        $return_data['pages'] = $pages_compressed;
        $return_data['total_compressed_images'] = $total_compressed_images;
        $return_data['total_not_compressed_images_size'] = $total_not_compressed_images_size;
        $return_data['total_not_compressed_images_count'] = $total_not_compressed_images_count;
      }
      if ( $total_compressed_images != 0 || $total_not_compressed_images_size != 0 ) {
        update_option("bwg_optimized_pages", $return_data);
      } else {
        /* in case of returned data is 0 just get from db last data or run PG functionality to get count/size */
        $data = get_option("bwg_optimized_pages");
        if( !empty( $return_data ) ) {
          $return_data = $data;
        } else {
          $images_total_size = get_option('bwg_images_total_size');
          if ( !empty($images_total_size) ) {
            $return_data['total_not_compressed_images_size'] = $images_total_size;
            $return_data['total_not_compressed_images_count'] = $this->get_optimize_media_count();
          }
        }
      }
    } else {
      /* if getting error from endpoint try to get data from DB */
      $data = get_option("bwg_optimized_pages");
      if( !empty( $return_data ) ) {
        $return_data = $data;
      } else {
        $images_total_size = get_option('bwg_images_total_size');
        if ( !empty($images_total_size) ) {
          $return_data['total_not_compressed_images_size'] = $images_total_size;
          $return_data['total_not_compressed_images_count'] = $this->get_optimize_media_count();
        }
      }
    }
    return $return_data;
  }

  /**
   * Display.
  */
  public function display() {
    $params = array();
    $params['booster_plugin_status'] = $this->booster_plugin_status;

    $media_count = $this->get_optimize_media_count();
    $params['media_count'] = $media_count;

    $params['page_is_public'] = WDWLibrary::get('status', '');

    $bwg_speed_score = get_option('bwg_speed_score');
    $data = array(
      'url' => get_home_url(),
      'desktop_score' => 0,
      'desktop_loading_time' => 0,
      'mobile_score' => 0,
      'mobile_loading_time' => 0,
      'last_analyzed_time' => '',
    );
    if ( !empty($bwg_speed_score) && !empty($bwg_speed_score['last']) && !empty($bwg_speed_score['last']['url']) ) {
      $last_url = $bwg_speed_score['last']['url'];
      if ( !empty($bwg_speed_score[$last_url]['desktop_score'])
        && !empty($bwg_speed_score[$last_url]['desktop_loading_time'])
        && !empty($bwg_speed_score[$last_url]['mobile_score'])
        && !empty($bwg_speed_score[$last_url]['mobile_loading_time'])
        && !empty($bwg_speed_score[$last_url]['last_analyzed_time']) ) {
        $data = array(
          'url' => $last_url,
          'desktop_score' => $bwg_speed_score[$last_url]['desktop_score'],
          'desktop_loading_time' => $bwg_speed_score[$last_url]['desktop_loading_time'],
          'mobile_score' => $bwg_speed_score[$last_url]['mobile_score'],
          'mobile_loading_time' => $bwg_speed_score[$last_url]['mobile_loading_time'],
          'last_analyzed_time' => $bwg_speed_score[$last_url]['last_analyzed_time'],
        );
      }
    }

    $params['bwg_speed_score'] = $data;
    $two_domain_id = get_site_option('tenweb_domain_id');
    $params['dashboard_booster_url'] = '';
    if ( defined("TENWEB_DASHBOARD") && !empty($two_domain_id) ) {
      $params['dashboard_booster_url'] = trim(TENWEB_DASHBOARD, '/') . '/websites/' . $two_domain_id . '/booster/frontend';
    }

    $params['booster_is_connected'] = $this->booster_is_connected;
    $params['tenweb_is_paid'] = $this->tenweb_is_paid;
    $params['subscription_id'] = $this->subscription_id;
    $images_total_size = get_option('bwg_images_total_size');
    if( empty($images_total_size) ) {
      $images_total_size = 0;
    }
    $params['images_total_size'] = $images_total_size;
    $params['two_domain_id'] = get_site_option('tenweb_domain_id');
    if ( $params['booster_is_connected'] && !$params['tenweb_is_paid'] ) {
      $params['pages_compressed'] = $this->get_pages_compressed();
    }

    $this->view->display($params);
  }

   /*
   * Get Total size of all images ajax action
   * */
  public function get_total_size_of_images() {
    $bwg_images_total_size = get_option('bwg_images_total_size');
    if ( !empty($bwg_images_total_size) ) {
      return $bwg_images_total_size;
    }
    $allowed_types = array('image/jpeg','image/jpg','image/png','image/gif','image/webp','image/svg','image/png');

    $args = array(
      'post_type' => 'attachment',
      'numberposts' => -1,
      'post_status' => null,
      'post_parent' => null, // any parent
    );
    $attachments = get_posts($args);
    if ($attachments) {
      $total = 0;
      foreach ($attachments as $post) {
        if ( !in_array($post->post_mime_type, $allowed_types) ) {
          continue;
        }

        $meta = wp_get_attachment_metadata( $post->ID );
        if ( isset($meta['filesize']) ) {
          $filesize = $meta['filesize'];
        } else {
          $path = get_attached_file($post->ID);
          if ( !file_exists($path) ) {
            continue;
          }
          $filesize = filesize($path);
        }
        $total += $filesize;
      }
    }

    global $wpdb;
    $sizes = $wpdb->get_col('Select `size` FROM `' . $wpdb->prefix . 'bwg_image` WHERE  `size`<>""');
    if ( !empty($sizes) ) {
      $sizes = array_map('WDWLibrary::convertToBytes', $sizes);
      $sizes = WDWLibrary::formatBytes( array_sum($sizes) + $total );
    } else {
      $sizes = WDWLibrary::formatBytes( $total );
    }
    update_option('bwg_images_total_size', $sizes, 1);
    echo json_encode(array("size" => $sizes));
    die;
  }

  /**
   * Top banner.
   */
  public function top_banner() {
    if ( !WDWLibrary::get_gallery_images_count() ) {
      return;
    }

    $booster_is_active = ( $this->booster_is_connected && $this->booster_plugin_status == 2 ) ? TRUE : FALSE;

    if ( $this->tenweb_is_paid === FALSE ) {
      // get optimize media count.
      $media_count = $this->get_optimize_media_count();
      $two_domain_id = get_site_option('tenweb_domain_id');
      $booster_upgrade_plan_url = "https://my.10web.io/websites/". $two_domain_id ."/booster/frontend?pricing=1";
      $params = array(
        'booster_is_active' => $booster_is_active,
        'booster_is_connectd' => $this->booster_is_connected,
        'media_count' => $media_count,
        'button' => array(
          'name' => ($booster_is_active) ? __('Upgrade', 'photo-gallery') : __('Optimize now', 'photo-gallery'),
          'url' => ($booster_is_active) ? $booster_upgrade_plan_url : add_query_arg(array( 'page' => 'speed_' . BWG()->prefix ), admin_url('admin.php')),
          'target' => ($booster_is_active) ? 'target="_blank"' : ''
        )
      );
      $this->view->top_banner($params);
    }
  }

  /**
   * Install booster plugin
   */
  public function install_booster() {
    $speed_ajax_nonce = WDWLibrary::get('speed_ajax_nonce');
    if ( !wp_verify_nonce($speed_ajax_nonce, 'speed_ajax_nonce') ){
      die('Permission Denied.');
    }

    $plugin_slug = $this->booster_plugin_slug;
    $plugin_zip = $this->booster_plugin_zip_url;


    /* Check if new plugin is already installed */
    if ( $this->is_plugin_installed( $plugin_slug ) ) {
      $installed = true;
    } else {
      $installed = $this->install_plugin( $plugin_zip );
    }
    /* 0-not installed, 1-installed but not active, 2-active */
    $booster_plugin_status = 0;
    if ( !is_wp_error( $installed ) && $installed ) {
      $activate = activate_plugin( $plugin_slug );

      // To change 10Web Booster plugins status on Dashboard.
      if (class_exists('\Tenweb_Authorization\Helper')
        && method_exists('\Tenweb_Authorization\Helper', "check_site_state") ) {
        \Tenweb_Authorization\Helper::check_site_state(true);
      }
      /* Function activate_plugin return null when activate is success and false when not */
      if ( is_null($activate) ) {
        update_option('bwg_speed', array( 'booster_plugin_status' => 2 ), 1);
        $this->set_booster_data();
        $booster_plugin_status = 2;
      } else {
        update_option('bwg_speed', array( 'booster__plugin_status' => 1 ), 1);
        $booster_plugin_status = 1;
      }
    }
    echo json_encode( array(
                        'booster_plugin_status' => esc_html($booster_plugin_status),
                        'booster_is_connected' => esc_html($this->booster_is_connected),
                        'subscription_id' => esc_html($this->subscription_id),
                      ) );
    die;
  }

  /**
   * Check if plugin already installed
   *
   * @param string $slug plugin's slug
   *
   * @return bool
  */
  public function is_plugin_installed( $slug ) {
    if ( ! function_exists( 'get_plugins' ) ) {
      require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    $all_plugins = get_plugins();

    if ( !empty( $all_plugins[$slug] ) ) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Install booster pluging using zip url
   *
   * @param $plugin_zip string which is url of the plugin zip
   *
   * @return bool
  */
  public function install_plugin( $plugin_zip = '' ) {
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    wp_cache_flush();

    $upgrader = new Plugin_Upgrader();
    $installed = $upgrader->install( $plugin_zip );
    return $installed;
  }

  /**
   * Get optimize media count.
   *
   * @param string $dir
   * @param array  $file_types
   *
   * @return array
  */
  public function get_optimize_media_count() {
    global $wpdb;
    $allowed_types = array('image/jpeg','image/jpg','image/png','image/gif','image/webp','image/svg');
    // get all wp-media attachments.
    $attachments = wp_count_attachments();
    $count_attachment = 0;
    if ( !empty($attachments) ) {
      foreach ( $attachments as $key => $attachment ) {
        if ( in_array($key, $allowed_types) ) {
          $count_attachment += $attachment;
        }
      }
    }

    // Get all Photo gallery media.
    $row = $wpdb->get_row( 'SELECT count(id) AS qty FROM `' . $wpdb->prefix . 'bwg_file_paths` WHERE is_dir = 0' );
    $count = intval($count_attachment) + intval($row->qty);

    return $count;
  }

  /**
   * Ajax action Sign up to dashboard action
   *
   * @return bool
  */
  public function sign_up_dashboard() {
    $speed_ajax_nonce = WDWLibrary::get('speed_ajax_nonce');
    if ( !wp_verify_nonce($speed_ajax_nonce, 'speed_ajax_nonce') ){
      die('Permission Denied.');
    }

    $bwg_email = WDWLibrary::get('bwg_email');
    $args = array(
      'method'      => 'POST',
      'headers'     => array(
        'Content-Type'  => 'application/x-www-form-urlencoded; charset=UTF-8',
        'Accept'        => 'application/x.10webcore.v1+json'
      ),
      'body'        => array(
                              'email' => $bwg_email,
                              'first_name' => '10Webber',
                              'last_name' => rand( 1000, 9999 ),
                              'product_id' => '101',
                              'service_key' => 'gTcjslfqqBFFwJKBnFgQYhkQEJpplLaDKfj',
                            ),
    );

    $url = 'https://core.10web.io/api/checkout/signup-via-magic-link';
    $result = wp_remote_post( $url, $args );
    ob_clean();
    if ( !empty($result) && isset( $result['body']) ) {
        $result = $result['body'];
    } else {
        echo json_encode( array('status' => 'error' ) );
        die;
    }

    $result = json_decode($result, 1);

    if ( isset($result['status']) && isset($result['data']['magic_data']) && $result['status'] == "ok" ) {
        $args = array();
        if ( isset($result['data']['magic_data']) ) {
          $magic_data = $result['data']['magic_data'];
          $args = array('magic_data' => $magic_data);
        }
        if ( class_exists('\TenWebOptimizer\OptimizerUtils') ) {
            $two_connect_link = \TenWebOptimizer\OptimizerUtils::get_tenweb_connection_link('login', $args);
            echo json_encode(array( 'status' => 'success', 'booster_connect_url' => $two_connect_link ));
        } else {
            echo json_encode( array('status' => 'error') );
        }
        die;
    } elseif( isset($result['error']) && $result['error']['status_code'] == "422" ) {
        if( class_exists('\TenWebOptimizer\OptimizerUtils') ) {
            $two_connect_link = \TenWebOptimizer\OptimizerUtils::get_tenweb_connection_link('login', array('login_request_plugin' => 'photo_gallery'));
            echo json_encode( array('status' => 'success', 'booster_connect_url' => $two_connect_link) );
        } else {
            echo json_encode( array('status' => 'error') );
        }
        die;
    }
    echo json_encode( array('status' => 'error') );
    die;
  }

  /**
   * Connect to dashboard.
   *
   * @return void
  */
  public function connect_to_dashboard() {
    $speed_ajax_nonce = WDWLibrary::get('speed_ajax_nonce');
    if ( !wp_verify_nonce($speed_ajax_nonce, 'speed_ajax_nonce') ){
      die('Permission Denied.');
    }

    if ( class_exists('\TenWebOptimizer\OptimizerUtils') ) {
      $two_connect_link = \TenWebOptimizer\OptimizerUtils::get_tenweb_connection_link('login');
      echo json_encode(array( 'status' => 'success', 'booster_connect_url' => $two_connect_link ));
    }
    else {
      echo json_encode(array( 'status' => 'error' ) );
    }
    die;
  }

  /**
   * Ajax action Get google page speed scor for desktop and mobile
   *
  */
  public function get_google_page_speed() {
    $speed_ajax_nonce = WDWLibrary::get('speed_ajax_nonce');
    $last_api_key_index = WDWLibrary::get('last_api_key_index', '');

    if ( !wp_verify_nonce($speed_ajax_nonce, 'speed_ajax_nonce') ){
      die('Permission Denied.');
    }

    $url = WDWLibrary::get('bwg_url');

    /* Check if url hasn't http or https add */
    if ( strpos($url, 'http') !== 0 ){
      if ( isset($_SERVER['HTTPS']) ) {
          $url = 'https://'.$url;
      } else {
          $url = 'http://'.$url;
      }
    }

    /* Check if the url is valid */
    if ( !filter_var($url, FILTER_VALIDATE_URL) ) {
      echo json_encode(array('error' => 1)); die;
    }

    $post_id = url_to_postid($url);
    $home_url = get_home_url();
    if ( $post_id !== 0 && get_post_status( $post_id ) != 'publish' && rtrim($url, "/") != rtrim($home_url, "/") ) {
      echo json_encode( array('error' => 1, 'msg' => esc_html__('This page is not public. Please publish the page to check the score.',  'photo-gallery')) );
      die;
    }

    if ( $last_api_key_index != '' ) {
      /* remove array value as this key already used and no need to try again during the retry */
      unset($this->google_api_keys[$last_api_key_index]);
    }
    $random_index = array_rand( $this->google_api_keys );
    $random_api_key = $this->google_api_keys[$random_index];
    $result = $this->bwg_google_speed_cron( $url, 'desktop', $random_api_key );
    if ( !empty($result['error']) || empty($result)) {
      /* Case when retry already done and $last_api_key_index is not empty */
      if ( $last_api_key_index != '' ) {
        echo json_encode(array( 'error' => 1 ));
      }
      else {
        echo json_encode(array( 'error' => 1, 'last_api_key_index' => $random_index ));
      }
      die;
    }
    $score['desktop'] = $result['score']*100;
    $score['desktop_loading_time'] = $result['loading_time'];

    $result = $this->bwg_google_speed_cron( $url, 'mobile', $random_api_key );
    if( !empty($result['error']) || empty($result) ) {
      /* Case when retry already done and $last_api_key_index is not empty */
      if ( $last_api_key_index != '' ) {
        echo json_encode(array( 'error' => 1 ));
      }
      else {
        echo json_encode(array( 'error' => 1, 'last_api_key_index' => $random_index ));
      }
      die;
    }
    $score['mobile'] = $result['score']*100;
    $score['mobile_loading_time'] = $result['loading_time'];

    $nowdate = current_time( 'mysql' );
    $nowdate = date('d.m.Y h:i:s a', strtotime($nowdate));

    $data = get_option('bwg_speed_score');
    $data[$url] = array(
      'desktop_score' => $score['desktop'],
      'desktop_loading_time' => $score['desktop_loading_time'],
      'mobile_score' => $score['mobile'],
      'mobile_loading_time' => $score['mobile_loading_time'],
      'last_analyzed_time' => $nowdate,
      'error' => 0
    );
    $data['last'] = array(
      'url' => $url
    );
    update_option('bwg_speed_score', $data, 1);

    $bwg_hompage_optimized = get_option('bwg_hompage_optimized');
    if ( rtrim($url, "/") == rtrim($home_url, "/") && !empty($bwg_hompage_optimized) && $bwg_hompage_optimized == 1 ) {
      update_option('bwg_hompage_optimized', 2);
    }
    ob_clean();
    echo json_encode(array(
                       'desktop_score' => esc_html($score['desktop']),
                       'desktop_loading_time' => esc_html($score['desktop_loading_time']),
                       'mobile_score' => esc_html($score['mobile']),
                       'mobile_loading_time' => esc_html($score['mobile_loading_time']),
                       'last_analyzed_time' => esc_html($nowdate),
                     ));
    die;
  }

  /**
   * Remote get action to get google speed score
   *
   * @param $page_url string which is url of the page which speed should counted
   * @param $strategy string parameter which get desktop or mobile
   *
   * @return array
   */
  public function bwg_google_speed_cron( $page_url, $strategy,  $key = 'AIzaSyCQmF4ZSbZB8prjxci3GWVK4UWc-Yv7vbw') {
    $url = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=" . $page_url . "&key=".$key;
    $url = ( $strategy == "mobile" ) ? $url . "&strategy=mobile" : $url;

    $response = wp_remote_get($url, array('timeout' => 300));
    $data = array();

    if (is_array($response) && !is_wp_error($response)) {

      $body = $response['body'];
      $body = json_decode($body);
      if (isset($body->error) ) {
        $data['error'] = 1;
      } else {
        $data['score'] = $body->lighthouseResult->categories->performance->score;
        $data['loading_time'] = $body->lighthouseResult->audits->interactive->displayValue;
      }
    } else {
      $data['error'] = 1;
    }
    return $data;
  }
}