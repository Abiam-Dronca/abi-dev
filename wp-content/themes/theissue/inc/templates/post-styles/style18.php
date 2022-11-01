<?php
  $thb_title_size = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h6';
  $classes[] = 'post';
  $classes[] = 'style18';
?>
<div <?php post_class( $classes ); ?>>
  <figure class="post-gallery">
    <?php do_action( 'thb_post_icon' ); ?>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-rectangle-x2' ); ?></a>
  </figure>
  <div class="post-inner-content">
    <?php do_action( 'thb_categories' ); ?>
    <?php do_action( 'thb_displayTitle', $thb_title_size); ?>
    <?php do_action( 'thb_post_bottom', true); ?>
  </div>
</div>