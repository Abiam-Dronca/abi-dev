<?php

  $thb_title_size = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h4';
  $thb_image_size = get_query_var( 'thb_image_size' ) ? get_query_var( 'thb_image_size' ) : 'theissue-square-x2';
  $classes[] = 'post';
  $classes[] = 'style12';
  $classes[] = 'featured-style';
  $classes[] = 'featured-overflow';
  $classes[] = 'center-contents';

  $thb_id = get_the_ID();
  $video_url = 'video' === get_post_format() ? get_post_meta($thb_id , 'post_video', true) : false;
  if (!wp_oembed_get($video_url) && $video_url !== '') {
    $video_url = 'mp4:'.$video_url;
  }
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery thb-parallax" data-video="<?php echo esc_attr($video_url); ?>">
    <?php the_post_thumbnail( $thb_image_size); ?>
  </figure>
  <div class="post-inner-content">
    <div class="post-overflow-content">
      <?php do_action( 'thb_categories' ); ?>
      <?php do_action( 'thb_displayTitle', $thb_title_size); ?>
      <?php do_action( 'thb_post_bottom', false ); ?>
      <a href="<?php the_permalink(); ?>" class="featured-read-more"><?php esc_html_e( 'Read More', 'theissue' ); ?></a>
    </div>
  </div>
</div>