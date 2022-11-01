<?php
  $classes[] = 'post';
  $classes[] = 'center-contents';
  $classes[] = 'style14';
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-square'); ?></a>
  </figure>
  <?php do_action( 'thb_categories' ); ?>
  <?php do_action( 'thb_displayTitle', 'h5'); ?>
  <?php do_action( 'thb_post_bottom', true); ?>
</div>