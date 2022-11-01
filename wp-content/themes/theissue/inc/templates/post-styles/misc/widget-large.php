<?php
  $classes[] = 'post';
  $classes[] = 'widget-large';
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <?php do_action( 'thb_post_icon' ); ?>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-rectangle-x2' ); ?></a>
  </figure>
  <?php do_action( 'thb_categories' ); ?>
  <?php do_action( 'thb_displayTitle', 'h6'); ?>
  <?php do_action( 'thb_post_bottom', false ); ?>
</div>