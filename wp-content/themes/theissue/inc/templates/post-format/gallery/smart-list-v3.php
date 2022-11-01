<?php
$thb_id = get_the_ID();

$photos = thb_get_gallery_photos( $thb_id );
if ( ! is_array( $photos ) ) {
	return; }
$count = sizeof( $photos );

$count     = sizeof( $photos );
$classes[] = 'smart-list';
$classes[] = 'smart-list-v3';
$classes[] = 'gallery';

$i = 1;
?>
<div id="thb-smart-list-<?php echo esc_attr( $thb_id ); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php
	foreach ( $photos as $photo_id ) {
		$full_image = wp_get_attachment_image_src( $photo_id, 'full' );
		$the_image  = get_post( $photo_id );
		?>
	<div class="smart-list-item">
	<div class="thb-smart-list-image">
		<a href="<?php echo esc_url( $full_image[0] ); ?>">
		<?php echo wp_get_attachment_image( $photo_id, 'theissue-rectangle-x2' ); ?>
		</a>
		<div class="thb-smart-list-nav">
			<span class="arrow to_top
			<?php
			if ( 1 == $i ) {
				?>
					disabled<?php } ?>"><?php get_template_part( 'assets/img/svg/prev_arrow.svg' ); ?></span>
			<span class="arrow to_bottom
			<?php
			if ( $count == $i ) {
				?>
					disabled<?php } ?>"><?php get_template_part( 'assets/img/svg/next_arrow.svg' ); ?></span>
		</div>
	</div>
	<div class="thb-smart-list-content">
		<div class="smart-list-count"><?php echo esc_html( $i ); ?> / <?php echo esc_html( $count ); ?></div>
		<div>
		<?php if ( $the_image->post_title ) { ?>
			<div class="smart-list-title">
			<h5><?php echo esc_html( $the_image->post_title ); ?></h5>
			</div>
		<?php } ?>
		<?php if ( $the_image->post_excerpt ) { ?>
			<?php echo wp_kses_post( wpautop( $the_image->post_excerpt ) ); ?>
		<?php } ?>
		<?php if ( $the_image->post_content && ! empty( $the_image->post_content ) ) { ?>
			<small class="source"><?php esc_html_e( 'Source:', 'theissue' ); ?> <?php echo esc_html( $the_image->post_content ); ?></small>
		<?php } ?>
		</div>
	</div>
	</div>
	<?php $i++; } ?>
</div>
