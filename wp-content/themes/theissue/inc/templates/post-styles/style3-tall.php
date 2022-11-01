<?php
  add_filter( 'excerpt_length', 'thb_short_excerpt_length' );
  $classes[] = 'post';
  $classes[] = 'style3';
  $classes[] = 'style3-tall';
?>
<div <?php post_class( $classes ); ?>>
  <div class="row no-padding">
    <div class="small-12 medium-5 columns">
      <figure class="post-gallery">
        <?php do_action( 'thb_post_icon' ); ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-square-x2' ); ?></a>
      </figure>
    </div>
    <div class="small-12 medium-7 columns">
      <div class="post-inner-content">
        <?php do_action( 'thb_categories' ); ?>
        <?php do_action( 'thb_displayTitle', 'h3'); ?>
        <div class="post-excerpt">
          <?php the_excerpt(); ?>
        </div>
        <?php do_action( 'thb_post_bottom', true); ?>
      </div>
    </div>
  </div>
</div>