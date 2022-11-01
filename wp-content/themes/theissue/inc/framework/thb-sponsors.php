<?php
function thb_sponsors() {
	$thb_id = get_the_ID();
	if ( ! ( is_single() || is_admin() ) ) {
		return; }
	$post_sponsors_selected = get_the_terms( $thb_id, 'thb-sponsors' );

	if ( false !== $post_sponsors_selected && ! empty( $post_sponsors_selected ) && is_array( $post_sponsors_selected ) ) { ?>
		<aside class="thb-article-sponsors">
			<div class="sponsored-by"><?php esc_html_e( 'Sponsored by', 'theissue' ); ?></div>
			<?php foreach ( $post_sponsors_selected as $id ) { ?>
				<?php
					$sponsor                = get_term( $id );
					$thb_sponsor_logo_image = get_term_meta( $sponsor->term_id, 'thb_sponsor_logo_image', true );
					$thb_sponsor_url        = get_term_meta( $sponsor->term_id, 'thb_sponsor_url', true );
				?>
				<div class="thb-sponsor">
					<?php
					if ( ! empty( $thb_sponsor_url ) ) {
						?>
							<a href="<?php echo esc_url( $thb_sponsor_url ); ?>" target="_blank" rel="nofollow"><?php } ?>
						<div class="thb-sponsor-logo">
							<?php if ( $thb_sponsor_logo_image ) { ?>
								<?php echo wp_get_attachment_image( $thb_sponsor_logo_image, 'thb-sponsor-x2' ); ?>
							<?php } else { ?>
								<?php echo esc_html( $sponsor->name ); ?>
							<?php } ?>
						</div>
					<?php
					if ( ! empty( $thb_sponsor_url ) ) {
						?>
							</a><?php } ?>
				</div>
			<?php } ?>
		</aside>
		<?php
	}
}
add_action( 'thb_after_post_category', 'thb_sponsors', 10 );
