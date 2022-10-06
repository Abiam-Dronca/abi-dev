<?php

/**
 * Class SpeedView_bwg
 */
class SpeedView_bwg extends AdminView_bwg {

  public function __construct() {
    parent::__construct();
    wp_enqueue_style(BWG()->prefix . '_speed');
    wp_enqueue_script(BWG()->prefix . '_speed');
    wp_enqueue_script(BWG()->prefix . '_speed_circle');
  }

  /**
   * Display page.
   *
   * @param $params
  */
  public function display( $params = array() ) {
    ?>
    <div class="wrap">
      <?php
      $data = array(
        'title' => __('Image optimization is not active',  'photo-gallery'),
        'description' => __('Complete the sign up process to optimize your images for better website performance.', 'photo-gallery'),
        'html' => '<input type="email" class="bwg-sign-up-input" placeholder="Email address" />',
        'button1' => array(
          'title' => __('Sign up',  'photo-gallery'),
          'action' => 'onclick=\'sign_up_dashboard( this );\'',
          'class' => 'bwg-primary',
        ),
        'html2' => sprintf(__('By signing up, you agree to 10Web’s. %s and %s', 'photo-gallery'),
             '<a href="https://10web.io/terms-of-service/" target="_blank">' . __('Terms of Services',  'photo-gallery') . '</a>',
             '<a href="https://10web.io/privacy-policy/" target="_blank">' . __('Privacy Policy',  'photo-gallery') . '</a>'),
        'dismiss' => array(
          'action' => 'onclick=\'bwg_leaving_popup = true; jQuery(".bwg-popup-overlay").addClass("bwg-hidden");\'',
        ),
      );
      echo $this->popup($data);
      ?>
      <div class="bwg-speed-header">
        <?php
        if ( $params['booster_plugin_status'] !== 2 ) {
          $this->install_booster_view( $params['booster_plugin_status'] );
          $this->sign_up_booster_view( $params['booster_plugin_status'] );
          $this->connected_booster_view( $params );
          $this->connect_to_platform_view($params['booster_plugin_status']);
        }
        else {
          if ( !$params['booster_is_connected'] ) {
            if ( $params['subscription_id'] ) {
              $this->connect_to_platform_view($params['booster_plugin_status']);
            } else {
              $this->sign_up_booster_view( $params['booster_plugin_status'] );
            }
          }
          else {
            $this->connected_booster_view( $params );
          }
        }
        ?>
      </div>
      <div class="bwg-speed-body">
        <div class="bwg-speed-body-container">
          <?php
          if ( $params['booster_is_connected'] && !$params['tenweb_is_paid'] ) {
            $this->optimizer_on_free_connected($params);
          } elseif ( $params['booster_is_connected'] && $params['tenweb_is_paid'] ) {
              $this->optimizer_on_pro($params['dashboard_booster_url']);
          } else {
            $this->optimizer_on_free_not_connected($params);
          }
          ?>
          <p class="bwg-section-title"><?php esc_html_e('PageSpeed optimization', 'photo-gallery'); ?></p>
          <p class="bwg-description"><?php esc_html_e('Speed up your website and increase PageSpeed score by optimizing all images.', 'photo-gallery') ?></p>
          <div class="bwg-analyze-input-container">
              <input type="url" class="bwg-analyze-input <?php esc_attr_e( ( $params['page_is_public'] === 0 ) ? 'bwg-analyze-input-error' : ''); ?>" placeholder="<?php esc_html_e('Page URL', 'photo-gallery') ?>" value="">
              <?php if ( $params['page_is_public'] === 0 ) { ?>
                <p class="bwg-error-msg"><?php esc_html_e('This page is not public. Please publish the page to check the score.', 'photo-gallery'); ?></p>
              <?php } ?>
              <a class="bwg-analyze-input-button <?php esc_attr_e( ( !$params['page_is_public'] ) ? 'bwg-disable-analyze' : ''); ?>"><?php esc_html_e('Analyze', 'photo-gallery') ?></a>
          </div>

          <div class="bwg-analyze-info-container">
            <div class="bwg-analyze-info-left">
              <div class="bwg-analyze-info-left-cont">
                <div class="bwg-analyze-mobile-score">

                  <div class="speed_circle" data-thickness="6" data-id="mobile">
                    <p class="circle_animated"><?php echo esc_html($params['bwg_speed_score']['mobile_score']); ?></p>
                  </div>
                  <p class="bwg-score-name"><?php esc_html_e('Mobile Score',  'photo-gallery'); ?></p>
                  <p class="bwg-load-time bwg-load-time-mobile"><?php esc_html_e('Load Time:',  'photo-gallery'); ?> <span><?php echo esc_html($params['bwg_speed_score']['mobile_loading_time']); ?></span></p>
                </div>
                <div class="bwg-analyze-desktop-score">

                  <div class="speed_circle" data-thickness="6" data-id="desktop">
                    <p class="circle_animated"><?php echo esc_html($params['bwg_speed_score']['desktop_score']); ?></p>
                  </div>
                  <p class="bwg-score-name"><?php esc_html_e('Desktop Score',  'photo-gallery'); ?></p>
                  <p class="bwg-load-time bwg-load-time-desktop"><?php esc_html_e('Load Time:',  'photo-gallery'); ?> <span><?php echo esc_html($params['bwg_speed_score']['desktop_loading_time']); ?></span></p>
                </div>
              </div>
              <div class="bwg-analyze-score-info">
                <span><?php esc_html_e('Scale:',  'photo-gallery') ?></span>
                <span class="bwg-fast-icon bwg-score-icon"></span>90-100 <?php esc_html_e('(fast)',  'photo-gallery'); ?>
                <span class="bwg-averege-icon bwg-score-icon"></span>50-89 <?php esc_html_e('(average)',  'photo-gallery'); ?>
                <span class="bwg-slow-icon bwg-score-icon"></span>0-49 <?php esc_html_e('(slow)',  'photo-gallery'); ?>
              </div>
            </div>

            <div class="bwg-analyze-info-right">
              <p class="bwg-analyze-info-right-sub-title"><?php esc_html_e('Check your score with',  'photo-gallery') ?></p>
              <a href="https://pagespeed.web.dev/" target="_blank"><?php esc_html_e('Google PageSpeed Insights',  'photo-gallery') ?></a>
              <hr>
              <h3><?php esc_html_e('Analyzed page:',  'photo-gallery'); ?></h3>
              <p class="bwg-last-analyzed-page" title="<?php echo esc_html($params['bwg_speed_score']['url']); ?>"><?php echo esc_html($params['bwg_speed_score']['url']); ?></p>
              <div class="bwg-last-analyzed-date-container">
                <h3><?php esc_html_e('Last analyzed:',  'photo-gallery'); ?></h3>
                <p class="bwg-last-analyzed-date"><?php echo esc_html($params['bwg_speed_score']['last_analyzed_time']); ?></p>
              </div>
            </div>
          </div>
      </div>
    </div>
  <?php
  }

  /**
   * Optimizer section view when booster connected and pro version
   *
   * @param string $url dashboard booster url
  */
  public function optimizer_on_pro( $url ) {
    ?>
      <div class="bwg-analyze-img_optimizer-container bwg-optimize_on bwg-optimize_done">
        <div>
          <p class="bwg-section-title"><?php esc_html_e('You’re all set!',  'photo-gallery') ?></p>
          <p class="bwg-header-description"><?php esc_html_e('All images in media library are optimized.',  'photo-gallery') ?></p>
          <ul>
            <li><span></span><?php esc_html_e('Auto-optimize all uploaded images.',  'photo-gallery') ?></li>
            <li><span></span><?php esc_html_e('Configure WebP format conversion',  'photo-gallery') ?></li>
          </ul>
        </div>
        <div class="bwg-optimize_on-button-cont">
          <a href="<?php echo esc_url($url); ?>" target="_blank" class="bwg-optimize-add-pages"><?php esc_html_e('Manage',  'photo-gallery') ?></a>
        </div>
      </div>
    <?php
  }

  /**
   * Optimizer section view when booster connected and free version
   *
   * @param string $url dashboard booster url
  */
  public function optimizer_on_free_not_connected( $params ) {
    ?>
      <div class="bwg-img_optimizer-container bwg-img_optimizer-not-container">
        <div class="bwg-img_optimizer-left">
          <span class="bwg-not-optimized-info"><?php esc_html_e('Not Optimized',  'photo-gallery') ?></span>
          <h5><?php echo esc_html($params['media_count']); ?><span> <?php echo _n('image', 'images', $params['media_count'], 'photo-gallery'); ?></span></h5>
          <ul>
            <li><?php esc_html_e('Optimize all uploaded images',  'photo-gallery') ?></li>
            <li><?php esc_html_e('Serve Images in WebP format',  'photo-gallery') ?></li>
            <li><?php esc_html_e('Speed up website and reduce load time',  'photo-gallery') ?></li>
          </ul>
        </div>
        <div class="bwg-img_optimizer-right">
          <div class="bwg-img_optimizer-button-container">
            <div class="bwg-img_optimizer-info">
              <p class="bwg-section-description"><?php esc_html_e('Reduce image size by up to 40% without compromising the quality.',  'photo-gallery') ?></p>

              <p class="bwg-total_size"><?php esc_html_e('Total size:',  'photo-gallery') ?></p>
              <p class="bwg-total_size_value"><?php echo esc_html($params['images_total_size']) ?></p>
            </div>
              <a class="bwg-img_optimize-now-button"><?php echo __('Optimize Now',  'photo-gallery'); ?></a>
          </div>
        </div>
      </div>
    <?php
  }

  /**
   * Optimizer section view when booster connected and free version
   *
   * @param string $url dashboard booster url
  */
  public function optimizer_on_free_connected( $params ) {
    $compressed_count = intval(count($params['pages_compressed']['pages']));
    ?>
      <div class="bwg-img_optimizer-container">
        <div class="bwg-img_optimizer-left">
          <span class="bwg-optimized-info"><?php esc_html_e('Optimized for free',  'photo-gallery') ?></span>
          <h5><?php echo esc_html($params['pages_compressed']['total_compressed_images']); ?><span> <?php echo _n('image', 'images', $params['media_count'], 'photo-gallery'); ?></span></h5>
          <p class="bwg-section-description"><?php esc_html_e('Image optimization is performed only on 6 pages included in Free plan.',  'photo-gallery') ?></p>

          <div class="bwg-line_info_container">
            <span><?php esc_html_e('Optimized pages',  'photo-gallery') ?></span>
            <span><?php echo $compressed_count; esc_html_e(' of 6',  'photo-gallery')?></span>
          </div>
          <div class="bwg-line_container"><span class="bwg-size_<?php echo esc_attr($compressed_count); ?>"></span></div>
          <div class="bwg-section-bottom">
          <?php
          $pages = $params['pages_compressed']['pages'];
          $hompage = false;
          if ( !empty($pages) ) {
            foreach ( $pages as $page ) {
              if ( $page['permalink'] == 'Homepage' ) {
                  $hompage = true;
                  $path = $page['permalink'];
              } else {
                  $path = parse_url($page['permalink']);
                  $path["path"] = rtrim($path["path"] , "/");
                  $explode = explode("/", $path["path"]);

                  if ( count($explode) > 1 ) {
                    $path = '.../' . end($explode);
                  } else {
                    $path = '...' . $path['path'];
                  }
              }
              $image_count_text = '';
              if ( intval($page['images_count']) != 0 ) {
                $image_count_text = intval($page['images_count']).' '.esc_html__(' images',  'photo-gallery');
              }
              ?>
              <div class="bwg-most-image-cont">
                <div class="bwg-most-image-cont-path <?php echo $hompage ? 'bwg-hompage-path' : ''; ?>"><?php echo esc_html($path); ?></div>
                <div class="bwg-most-image-cont-img-count bwg-optimized"><?php echo esc_html($image_count_text) ?></div>
              </div>
              <?php
            }
          }
          ?>
          </div>
        </div>
        <div class="bwg-img_optimizer-right">
          <span class="bwg-not-optimized-info"><?php esc_html_e('Not Optimized',  'photo-gallery') ?></span>

          <h5><?php echo esc_html($params['pages_compressed']['total_not_compressed_images_count']); ?><span> <?php echo _n('image', 'images', $params['pages_compressed']['total_not_compressed_images_count'], 'photo-gallery'); ?></span></h5>
          <ul>
            <li><?php esc_html_e('Specify the most image-heavy pages',  'photo-gallery') ?></li>
            <li><?php esc_html_e('Optimize pages with photo galleries',  'photo-gallery') ?></li>
          </ul>

          <p><?php esc_html_e('Add pages with images you’d like to optimize.',  'photo-gallery') ?></p>
          <div class="bwg-img_optimizer-button-container">
            <div class="bwg-img_optimizer-info">
              <p><?php esc_html_e('Total size:',  'photo-gallery') ?></p>
              <p><?php echo esc_html($params['pages_compressed']['total_not_compressed_images_size']) ?></p>
            </div>
              <a class="bwg-img_add_pages_button" target="_blank" href="https://my.10web.io/websites/<?php echo $params['two_domain_id']; ?>/booster/frontend"><?php echo __('Add pages',  'photo-gallery'); ?></a>
          </div>
        </div>
      </div>
    <?php
  }

  /**
   * Top banner.
   *
   * @param array $params
   */
  public function top_banner( $params = array() ) {
    $booster_is_active = $params['booster_is_active'];
    $media_count = $params['media_count'];
    $button = $params['button'];
    ?>
    <div class="bwg-booster-top-banner <?php echo esc_attr( (($booster_is_active) ? 'bwg-booster-active' : '') ); ?>">
      <?php if ( ! $booster_is_active ) { ?>
        <p class="bwg-booster-top-banner-wrapper-note">
          <span class="bwg-booster-top-banner-wrapper-note--text"><?php esc_html_e('Heavy images negatively affect your website load time and PageSpeed optimization.', 'photo-gallery'); ?></span>
        </p>
      <?php } ?>
      <div class="bwg-booster-top-banner-wrapper">
        <div>
          <p class="bwg-booster-top-banner-wrappe--images-count">
          <?php
            if ( $booster_is_active ) {
              esc_html_e('Get 10Web Booster Pro', 'photo-gallery');
            }
            else {
              $single = __('%s image can be optimized', 'photo-gallery');
		          $plural = __('%s images can be optimized', 'photo-gallery');
              echo wp_sprintf( _n($single, $plural, intval($media_count), 'photo-gallery'), $media_count );
            }
          ?>
          </p>
          <p>
          <?php
            if ( $booster_is_active ) {
              esc_html_e('Automatically optimize the entire website with all images.', 'photo-gallery');
            }
            else {
              esc_html_e('Improve PageSpeed optimization by optimizing your website.', 'photo-gallery');
            }
          ?>
          </p>
        </div>
        <div>
          <a href="<?php echo esc_url($button['url']); ?>" <?php echo esc_attr($button['target']); ?> class="bwg-booster-top-banner-wrappe--button"><?php echo esc_html($button['name']); ?></a>
        </div>
      </div>
    </div>
    <?php
  }

  /**
   * HTML content for case when booster plugin installed and the website has any subscription plan.
   *
   * @return void
  */
  public function connect_to_platform_view($booster_plugin_status) {
    ?>
    <div class="bwg-booster-container bwg-connect-to-dashboard-container <?php echo esc_html($booster_plugin_status != 2) ? 'bwg-hidden' : ''; ?>">
      <p class="bwg-section-title"><?php esc_html_e('10Web Booster plugin is installed!',  'photo-gallery') ?></p>
      <p class="bwg-description"><?php esc_html_e('Connect to 10Web dashboard to activate 10Web Booster on your website and start optimization process. Optimization will start automatically.',  'photo-gallery') ?></p>
      <div class="bwg-sign-up-dashboard-button-container">
        <a class="bwg-booster-button bwg-connect-to-dashboard-button"><?php esc_html_e('Connect', 'photo-gallery'); ?></a>
      </div>
    </div>
    <?php
  }

  /**
   * HTML content for case when booster plugin installed but user didn't sign up
   *
   * @param int $booster_plugin_status 2-active, 1-installed, 0-not installed
  */
  public function sign_up_booster_view( $booster_plugin_status ) {
  ?>
    <div class="bwg-booster-container bwg-sign_up-booster-container <?php echo esc_html($booster_plugin_status != 2) ? 'bwg-hidden' : ''; ?>">
      <p class="bwg-section-title"><?php esc_html_e('10Web Booster plugin is installed!',  'photo-gallery') ?></p>
      <p class="bwg-description"><?php esc_html_e('Use 10Web Website Booster to optimize all website images and boost PageSpeed score.',  'photo-gallery') ?></p>
      <ul class="bwg-install-booster-steps">
        <li class="bwg_so_check_active">
            <?php esc_html_e('Install 10Web Booster',  'photo-gallery') ?>
            <span><?php esc_html_e('Activate plugin on the website',  'photo-gallery') ?></span>
        </li>
        <li>
            <?php esc_html_e('Sign up and connect',  'photo-gallery') ?>
            <span><?php esc_html_e('Start the optimization process',  'photo-gallery') ?></span>
        </li>
        <li>
            <?php esc_html_e('Optimize all images',  'photo-gallery') ?>
            <span><?php esc_html_e('Speed up the entire website',  'photo-gallery') ?></span>
        </li>
      </ul>
      <input type="email" class="bwg-sign-up-input" placeholder="Email address">
      <div class="bwg-sign-up-dashboard-button-container">
        <a class="bwg-booster-button bwg-sign-up-dashboard-button"><?php esc_html_e('Sign up', 'photo-gallery'); ?></a>
        <div>
          <?php esc_html_e('By signing up, you agree to 10Web’s.', 'photo-gallery'); ?>
          <br>
          <a href="https://10web.io/terms-of-service/" target="_blank"><?php esc_html_e('Terms of Services',  'photo-gallery'); ?></a>
          <?php esc_html_e(' and ',  'photo-gallery'); ?>
          <a href="https://10web.io/privacy-policy/" target="_blank"><?php esc_html_e('Privacy Policy',  'photo-gallery'); ?></a>
        </div>
      </div>
    </div>
    <?php
  }

  /**
   * html content for case when booster plugin installed but user didn't sign up
   *
   * @param arrar $params status->2-active, 1-installed, 0-not installed, booster url
  */
  public function connected_booster_view( $params = array() ) {
  ?>
    <div class="bwg-connected-booster-container <?php echo esc_html($params['booster_plugin_status'] != 2) ? 'bwg-hidden' : '';
    echo !$params['tenweb_is_paid'] ? ' bwg-is-free': '';?>">
      <div class="bwg-connected-booster-content">
        <div class="bwg-connected-booster-done-cont">
          <?php esc_html_e('Site is connected',  'photo-gallery') ?>
        </div>
        <p class="bwg-section-title"><?php esc_html_e('10Web Booster is active',  'photo-gallery') ?></p>
        <p class="bwg-header-description"><?php esc_html_e('Our plugin is now optimizing your website.',  'photo-gallery') ?></p>
        <p class="bwg-header-description"><?php esc_html_e('Manage optimization settings from the 10Web dashboard.',  'photo-gallery') ?></p>
        <?php
            if ( !$params['tenweb_is_paid'] ) { ?>
                <ul class="bwg-install-booster-steps">
                    <li class="bwg_so_check_active">
                        <?php esc_html_e('Install 10Web Booster',  'photo-gallery') ?>
                        <span><?php esc_html_e('Activate plugin on the website',  'photo-gallery') ?></span>
                    </li>
                    <li class="bwg_so_check_active">
                        <?php esc_html_e('Sign up and connect',  'photo-gallery') ?>
                        <span><?php esc_html_e('Start the optimization process',  'photo-gallery') ?></span>
                    </li>
                    <li>
                        <?php esc_html_e('Optimize all images',  'photo-gallery') ?>
                        <span><a href="https://my.10web.io/upgrade-plan" target="_blank"><?php esc_html_e('Upgrade to Booster Pro',  'photo-gallery') ?></a></span>
                    </li>
                </ul>
        <?php } ?>
      </div>
      <div class="button-container">
        <a href="<?php echo esc_url($params['dashboard_booster_url']); ?>" target="_blank" class="bwg-manage-booster"><?php esc_html_e('Manage',  'photo-gallery'); ?></a>
      </div>
    </div>
    <?php
  }

  /**
   * html content for case when booster plugin didn't installed
   *
   * @param int $booster_plugin_status 2-active, 1-installed, 0-not installed
  */
  public function install_booster_view( $booster_plugin_status ) {
    ?>
    <div class="bwg-install-booster-container">
      <p class="bwg-section-title"><?php esc_html_e('10Web Booster',  'photo-gallery') ?></p>
      <p class="bwg-header-description"><?php esc_html_e('Use 10Web Website Booster to optimize all website images and boost PageSpeed score.',  'photo-gallery') ?></p>
      <ul class="bwg-install-booster-steps">
        <li class="<?php echo esc_html($booster_plugin_status >= 0) ? 'bwg_so_check_active' : '';?>">
            <?php esc_html_e('Install 10Web Booster',  'photo-gallery') ?>
            <span><?php esc_html_e('Activate plugin on the website',  'photo-gallery') ?></span>
        </li>
        <li>
            <?php esc_html_e('Sign up and connect',  'photo-gallery') ?>
            <span><?php esc_html_e('Start the optimization process',  'photo-gallery') ?></span>
        </li>
        <li>
            <?php esc_html_e('Optimize all images',  'photo-gallery') ?>
            <span><?php esc_html_e('Speed up the entire website',  'photo-gallery') ?></span>
        </li>
      </ul>
      <div class="bwg-button-container-parent">
          <div class="button-container">
          <a class="bwg-install-booster"><?php echo esc_html($booster_plugin_status === 0) ? __('Install 10Web Booster plugin',  'photo-gallery') :  __('Activate 10Web Booster plugin',  'photo-gallery'); ?></a>
          <p><?php esc_html_e('Installing from WordPress repository',  'photo-gallery') ?></p>
          </div>
      </div>
    </div>
  <?php }
}
