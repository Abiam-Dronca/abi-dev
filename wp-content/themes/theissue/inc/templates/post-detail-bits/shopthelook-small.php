<?php
  if ( !thb_wc_supported() ) {
    return;
  }
  $post_shopthelook = get_post_meta(get_the_ID(), 'post_shopthelook', true);

  if ( !$post_shopthelook || $post_shopthelook == '' ) {
    return;
  }
  $args = array(
    'post_type' => 'product',
    'order_by' => 'post__in',
		'post__in' => $post_shopthelook,
    'posts_per_page' => -1,
    'ignore_sticky_posts' => 1
	);
	$shoptheloop = new WP_Query( $args );

?>
<?php if ( $shoptheloop->have_posts() ) { ?>
<div class="row">
	<div class="small-12 columns">
    <aside class="thb-shopthelook">
      <div class="thb-carousel products center-arrows offset-nav" data-columns="3" data-pagination="false" data-navigation="true">
        <?php while ( $shoptheloop->have_posts() ) : $shoptheloop->the_post(); ?>
          <div class="thb-mini-product columns">
            <?php
              $product = wc_get_product(get_the_id());

              if( $product->is_type( 'external' ) ) {
                $permalink = apply_filters( 'woocommerce_loop_product_link', $product->get_product_url(), $product );
              } else {
                $permalink = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
              }
            ?>
            <a <?php if( $product->is_type( 'external' ) ) { ?>target="_blank"<?php } ?> href="<?php echo esc_url( $permalink ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
              <?php the_post_thumbnail( 'theissue-thumbnail-3x'); ?>
              <div class="thb-shopthelook-content">
                <h6><?php the_title(); ?></h6>
                <p class="price"><?php echo $product->get_price_html(); ?></p>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </aside>
  </div>
</div>
<?php wp_reset_postdata(); }
