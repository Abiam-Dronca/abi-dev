<?php
  $classes[] = 'post';
  $classes[] = 'style9';
  $classes[] = 'center-contents';
?>
<div <?php post_class( $classes ); ?>>
  <?php do_action( 'thb_categories' ); ?>
  <?php do_action( 'thb_displayTitle', 'h2'); ?>
  <figure class="post-gallery">
    <?php do_action( 'thb_post_icon' ); ?>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-full-x2' ); ?></a>
  </figure>
  <div class="post-excerpt">
    <?php the_excerpt(); ?>
  </div>
  <?php do_action( 'thb_post_bottom', true); ?>
</div>