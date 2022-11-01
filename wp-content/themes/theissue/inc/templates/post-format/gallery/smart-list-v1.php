<?php
$thb_id = get_the_ID();

$photos = thb_get_gallery_photos($thb_id);
if (!is_array($photos)) { return; }
$count = sizeof($photos);

$classes[] = 'smart-list';
$classes[] = 'smart-list-v1';
$classes[] = 'gallery';

$i = 1;
?>
<div id="thb-smart-list-<?php echo esc_attr($thb_id); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
  <?php
    foreach ($photos as $photo_id) {
      $full_image = wp_get_attachment_image_src($photo_id, 'full');
      $the_image = get_post($photo_id);
  ?>
    <div class="smart-list-item">
      <div class="row">
        <div class="small-12 medium-7 small-order-2 medium-order-1 columns">
          <div class="thb-smart-list-content">
            <?php if ($the_image->post_title) { ?>
              <div class="smart-list-title">
                <div class="smart-list-count"><?php echo esc_html($i); ?></div>
                <h5><?php echo esc_html($the_image->post_title); ?></h5>
              </div>
            <?php } ?>
            <?php if ($the_image->post_excerpt) { ?>
              <p><?php echo wp_kses_post($the_image->post_excerpt); ?></p>
            <?php } ?>
            <?php if ($the_image->post_content) { ?>
              <small class="source"><?php esc_html_e( 'Source:', 'theissue' ); ?> <?php echo esc_html($the_image->post_content); ?></small>
            <?php } ?>
          </div>
        </div>
        <div class="small-12 medium-5 small-order-1 medium-order-2 columns">
          <div class="thb-smart-list-image">
            <a href="<?php echo esc_url($full_image[0]); ?>">
              <?php echo wp_get_attachment_image( $photo_id, 'theissue-square-2x' ); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php $i++; } ?>
</div>