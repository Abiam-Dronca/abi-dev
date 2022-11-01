<?php
  add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' );
  $classes[] = 'post';
  $classes[] = 'style17';
?>
<div <?php post_class( $classes ); ?>>
  <div class="row no-padding">
    <figure class="post-gallery small-12 columns">
      <?php do_action( 'thb_post_icon' ); ?>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-squaresmall-x2' ); ?></a>
    </figure>
    <div class="columns style17-content-column">
      <?php do_action( 'thb_categories' ); ?>
      <?php do_action( 'thb_displayTitle', 'h2'); ?>
      <div class="post-excerpt">
        <?php the_excerpt(); ?>
      </div>
      <?php do_action( 'thb_post_bottom', true); ?>
    </div>
  </div>
</div>