<?php
  $classes[] = 'post';
  $classes[] = 'thumbnail-seealso';
?>
<div <?php post_class( $classes ); ?>>
  <span class="thb-seealso-text"><?php esc_html_e( 'See Also', 'theissue' ); ?></span>
  <figure class="post-gallery">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-thumbnail-x2' ); ?></a>
  </figure>
  <div class="thumbnail-seealso-inner">
    <?php do_action( 'thb_categories' ); ?>
    <?php do_action( 'thb_displayTitle', 'h6'); ?>
  </div>
</div>