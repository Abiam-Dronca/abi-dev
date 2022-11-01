<?php
  $classes[] = 'post';
  $classes[] = 'style15';
?>
<div <?php post_class( $classes ); ?>>
  <div class="row no-padding">
    <div class="columns style15-content-column">
      <?php do_action( 'thb_categories' ); ?>
      <?php do_action( 'thb_displayTitle', 'h2'); ?>
      <?php do_action( 'thb_post_bottom', false ); ?>
    </div>
    <figure class="post-gallery columns">
      <?php do_action( 'thb_post_icon' ); ?>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'theissue-thumbnail-x2' ); ?></a>
    </figure>
  </div>
</div>