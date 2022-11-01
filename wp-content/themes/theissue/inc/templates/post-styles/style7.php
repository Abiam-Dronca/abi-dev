<?php
  $classes[] = 'post';
  $classes[] = 'style7';
  $classes[] = 'center-contents';
  $classes[] = 'block-category';
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <?php do_action( 'thb_post_icon' ); ?>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-square-x2' ); ?></a>
    <?php do_action( 'thb_categories' ); ?>
  </figure>
  <?php do_action( 'thb_displayTitle', 'h5' ); ?>
  <?php do_action( 'thb_post_bottom', true ); ?>
</div>