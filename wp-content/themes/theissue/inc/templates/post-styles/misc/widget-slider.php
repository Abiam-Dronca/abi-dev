<?php
  $classes[] = 'post';
  $classes[] = 'featured-style';
  $classes[] = 'center-contents';
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <?php the_post_thumbnail( 'theissue-square-x2' ); ?>
  </figure>
  <div class="post-inner-content">
    <?php do_action( 'thb_categories' ); ?>
    <?php do_action( 'thb_displayTitle', 'h5'); ?>
    <?php do_action( 'thb_post_bottom', false ); ?>
  </div>
</div>