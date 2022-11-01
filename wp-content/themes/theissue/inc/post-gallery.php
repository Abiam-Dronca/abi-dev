<?php

function thb_get_gallery_photos( $id ) {
	if ( ! $id ) {
		return; }
	$post_gallery_photos = get_post_meta( $id, 'post-gallery-photos', true );

	$post_gallery_photos_arr = array();
	if ( $post_gallery_photos ) {
		$post_gallery_photos_arr = explode( ',', $post_gallery_photos );
	}
	return $post_gallery_photos_arr;
}

function thb_gallery_lightbox_button( $id ) {
	if ( ! $id ) {
		return;
	}
	$photos = thb_get_gallery_photos( $id );

	if ( ! is_array( $photos ) ) {
		return;
	}
	$count      = count( $photos );
	$first_four = array_slice( $photos, 0, 4 );
	$remaining  = $count - count( $first_four );

	?>
	<div class="thb-lightbox-button" data-href="#thb-post-gallery-<?php the_ID(); ?>">
		<div class="thb-lightbox-thumbs">
			<?php if ( $count ) { ?>
				<?php $i = 0; foreach ( $first_four as $photo_id ) { ?>
					<figure class="thb-lightbox-thumb
					<?php
					if ( $i + 1 == count( $first_four ) ) {
						?>
							remaining<?php } ?>">
						<?php echo wp_get_attachment_image( $photo_id, 'theissue-thumbnail-x2' ); ?>
						<?php
						if ( $i + 1 == count( $first_four ) && $remaining > 0 ) {
							?>
							<span>+<?php echo esc_html( $remaining ); ?></span><?php } ?>
					</figure>
				<?php $i++; } ?>
			<?php } ?>
		</div>
		<div class="thb-lightbox-text">
			<?php esc_html_e( 'View Gallery', 'theissue' ); ?>
		</div>
	</div>
	<?php

	get_template_part( 'inc/templates/post-format/gallery/lightbox' );
}
function thb_gallery_smart_list_v1() {
	get_template_part( 'inc/templates/post-format/gallery/smart-list-v1' );
}
function thb_gallery_smart_list_v2() {
	get_template_part( 'inc/templates/post-format/gallery/smart-list-v2' );
}
function thb_gallery_smart_list_v3() {
	get_template_part( 'inc/templates/post-format/gallery/smart-list-v3' );
}

function thb_lightbox_filter( $content ) {
	$id = get_the_ID();
	if ( 'gallery' !== get_post_format( $id ) ) {
		return;
	}

	$post_gallery_style = get_post_meta( $id, 'post_gallery_style', true );
	if ( $post_gallery_style === 'lightbox' ) {
		thb_gallery_lightbox_button( $id );
	}
	return $content;
}
add_action( 'thb_before_article_content', 'thb_lightbox_filter' );

function thb_smartlist_filter( $content ) {
	$id = get_the_ID();
	if ( 'gallery' !== get_post_format( $id ) ) {
		return; }

	$post_gallery_style = get_post_meta( $id, 'post_gallery_style', true );
	if ( $post_gallery_style === 'smart-list-v1' ) {
		thb_gallery_smart_list_v1();
	} elseif ( $post_gallery_style === 'smart-list-v2' ) {
		thb_gallery_smart_list_v2();
	} elseif ( $post_gallery_style === 'smart-list-v3' ) {
		thb_gallery_smart_list_v3();
	}
	return $content;
}
add_action( 'thb_after_article_content', 'thb_smartlist_filter' );
