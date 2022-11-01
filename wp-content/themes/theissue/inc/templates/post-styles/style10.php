<?php
  $classes[] = 'post';
  $classes[] = 'style10';
?>
<div <?php post_class( $classes ); ?>>
  <div class="row">
    <div class="small-12 medium-4 columns">
      <figure class="post-gallery">
        <?php do_action( 'thb_post_icon' ); ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-squaresmall-x2' ); ?></a>
      </figure>
    </div>
    <div class="columns style10-content-column">
      <?php do_action( 'thb_categories' ); ?>
      <?php do_action( 'thb_displayTitle', 'h5'); ?>
      <?php do_action( 'thb_post_bottom', true); ?>
    </div>
  </div>
</div>