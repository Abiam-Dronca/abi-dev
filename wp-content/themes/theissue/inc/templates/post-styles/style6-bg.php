<?php
  $classes[] = 'post';
  $classes[] = 'style6';
  $classes[] = 'style6-bg';
  $classes[] = 'center-contents';
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <?php do_action( 'thb_post_icon' ); ?>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-square-x2' ); ?></a>
  </figure>
  <div class="post-inner-content">
    <?php do_action( 'thb_categories' ); ?>
    <?php do_action( 'thb_displayTitle', 'h4'); ?>
    <?php do_action( 'thb_post_bottom', true); ?>
  </div>
</div>