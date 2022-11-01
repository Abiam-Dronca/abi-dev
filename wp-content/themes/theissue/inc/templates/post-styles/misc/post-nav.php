<?php
  $thb_id = get_the_ID();
  $classes[] = 'post';
  $classes[] = 'post-nav';
  $classes[] = 'featured-style';
  $classes[] = 'center-contents';
  $video_url = 'video' === get_post_format() ? get_post_meta($thb_id , 'post_video', true) : false;
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <?php the_post_thumbnail( 'theissue-square'); ?>
  </figure>
  <div class="post-inner-content">
    <?php do_action( 'thb_categories' ); ?>
    <?php do_action( 'thb_displayTitle', 'h6'); ?>
  </div>
</div>