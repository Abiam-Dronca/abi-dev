<?php
  add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' );

  $vars = $wp_query->query_vars;
  $thb_extra_class = array_key_exists('thb_extra_class', $vars) ? $vars['thb_extra_class'] : false;

  $classes[] = 'post';
  $classes[] = 'style4';
  $classes[] = 'featured-style';
  $classes[] = $thb_extra_class;
  //$classes[] = 'center-contents';

  $thb_id = get_the_ID();
  $video_url = 'video' === get_post_format() ? get_post_meta($thb_id , 'post_video', true) : false;
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery thb-parallax" data-video="<?php echo esc_attr($video_url); ?>">
    <?php the_post_thumbnail( 'theissue-square-x2' ); ?>
  </figure>
  <div class="post-inner-content">
    <div>
      <?php do_action( 'thb_categories' ); ?>
      <?php do_action( 'thb_displayTitle', 'h3'); ?>
      <div class="post-excerpt">
        <?php the_excerpt(); ?>
      </div>
      <?php do_action( 'thb_post_bottom', true); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="btn style2 white"><?php esc_html_e( 'Read More', 'theissue' ); ?></a>
  </div>
</div>