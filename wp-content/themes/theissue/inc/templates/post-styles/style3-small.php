<?php
  add_filter( 'excerpt_length', 'thb_supershort_excerpt_length' );

  $thb_excerpt = get_query_var( 'thb_excerpt' ) ? get_query_var( 'thb_excerpt' ) : false;
  $thb_title_size = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h5';
  $thb_image_size = get_query_var( 'thb_image_size' ) ? get_query_var( 'thb_image_size' ) : 'theissue-squaresmall-x2';

  $classes[] = 'post';
  $classes[] = 'style3';
  $classes[] = 'style3-small';
?>
<div <?php post_class( $classes ); ?>>
  <div class="row align-middle no-padding">
    <div class="small-12 medium-6 columns">
      <figure class="post-gallery">
        <?php do_action( 'thb_post_icon' ); ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thb_image_size); ?></a>
      </figure>
    </div>
    <div class="small-12 medium-6 columns">
      <div class="post-inner-content">
        <?php do_action( 'thb_categories' ); ?>
        <?php do_action( 'thb_displayTitle', 'h4'); ?>
        <?php if ($thb_excerpt) { ?>
          <div class="post-excerpt">
            <?php the_excerpt(); ?>
          </div>
        <?php } ?>
        <?php do_action( 'thb_post_bottom', true); ?>
      </div>
    </div>
  </div>
</div>