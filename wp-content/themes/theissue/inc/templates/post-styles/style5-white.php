<?php
  add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' );
  $classes[] = 'post';
  $classes[] = 'style5-white';
?>
<div <?php post_class( $classes ); ?>>
  <div class="row no-padding">
    <div class="small-12 medium-8 columns">
      <figure class="post-gallery">
        <?php do_action( 'thb_post_icon' ); ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-rectangle-x3'); ?></a>
      </figure>
    </div>
    <div class="small-12 medium-4 columns">
      <div class="post-inner-content">
        <?php do_action( 'thb_categories' ); ?>
        <?php do_action( 'thb_displayTitle', 'h3'); ?>
        <?php do_action( 'thb_post_bottom', true); ?>
      </div>
    </div>
  </div>
</div>