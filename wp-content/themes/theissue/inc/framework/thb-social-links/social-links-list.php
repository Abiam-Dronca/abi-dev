<?php
function thb_get_social_list( $labels = true, $counts = true, $layout = 'thb-social-vertical', $style = 'mono-icons' ) {

	$socials      = array(
		'facebook'  => array(
			'option' => ot_get_option( 'social_facebook_user' ),
			'label'  => esc_html__( 'Facebook', 'theissue' ),
			'url'    => esc_url( 'https://facebook.com/%1$s' ),
		),
		'twitter'   => array(
			'option' => ot_get_option( 'social_twitter_user' ),
			'label'  => esc_html__( 'Twitter', 'theissue' ),
			'url'    => esc_url( 'https://twitter.com/%1$s' ),
		),
		'instagram' => array(
			'option' => ot_get_option( 'social_instagram_user' ),
			'label'  => esc_html__( 'Instagram', 'theissue' ),
			'url'    => esc_url( 'https://instagram.com/%1$s' ),
		),
		'pinterest' => array(
			'option' => ot_get_option( 'social_pinterest_user' ),
			'label'  => esc_html__( 'Pinterest', 'theissue' ),
			'url'    => esc_url( 'https://pinterest.com/%1$s' ),
		),
		'youtube'   => array(
			'option' => ot_get_option( 'social_youtube_user' ),
			'label'  => esc_html__( 'Youtube', 'theissue' ),
			'url'    => array(
				'user'    => esc_url( 'https://youtube.com/user/%1$s' ),
				'channel' => esc_url( 'https://youtube.com/channel/%1$s' ),
			),
		),
		'medium'    => array(
			'option' => ot_get_option( 'social_medium_user' ),
			'label'  => esc_html__( 'Medium', 'theissue' ),
			'url'    => esc_url( 'https://medium.com/%1$s' ),
		),
		'vimeo'     => array(
			'option' => ot_get_option( 'social_vimeo_user' ),
			'label'  => esc_html__( 'Vimeo', 'theissue' ),
			'url'    => esc_url( 'https://vimeo.com/%1$s' ),
		),
		'linkedin'  => array(
			'option' => ot_get_option( 'social_linkedin_user' ),
			'label'  => esc_html__( 'Linkedin', 'theissue' ),
			'url'    => array(
				'personal' => esc_url( 'https://www.linkedin.com/in/%1$s' ),
				'business' => esc_url( 'https://www.linkedin.com/company/%1$s' ),
			),
		),
		'telegram'  => array(
			'option' => ot_get_option( 'social_telegram_user' ),
			'label'  => esc_html__( 'Telegram', 'theissue' ),
			'url'    => esc_url( 'https://t.me/%1$s' ),
		),
		'whatsapp'  => array(
			'option' => ot_get_option( 'social_whatsapp_user' ),
			'label'  => esc_html__( 'Whatsapp', 'theissue' ),
			'url'    => esc_url( '%1$s' ),
		),
	);
	$active_links = array_filter(
		$socials,
		function( $value ) {
			return $value['option'] !== '' || ! empty( $value['option'] );
		}
	);

	if ( $active_links ) {
		$classes[] = 'thb-social-links-container';
		$classes[] = $layout;
		$classes[] = $style;
		?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<?php
		foreach ( $active_links as $network => $value ) {

			if ( $value['option'] == '' || empty( $value['option'] ) ) {
				return; }

			if ( $counts ) {
				$data = thb_social_links_get_count( $network, $value['option'] );
			}

			if ( 'youtube' === $network ) {
				$yt_type = ot_get_option( 'social_youtube_type', 'channel' );
				$url     = sprintf( $value['url'][ $yt_type ], $value['option'] );
			} elseif ( 'linkedin' === $network ) {
				$in_type = ot_get_option( 'social_linkedin_type', 'business' );
				$url     = sprintf( $value['url'][ $in_type ], $value['option'] );
			} else {
				$url = sprintf( $value['url'], $value['option'] );
			}
			?>
		<div class="thb-social-link-wrap">
			<a href="<?php echo esc_url( $url ); ?>" target="_blank" class="thb-social-link social-link-<?php echo esc_attr( $network ); ?>" rel="noreferrer">
				<div class="thb-social-label-container">
					<div class="thb-social-icon-container"><i class="thb-icon-<?php echo esc_attr( $network ); ?>"></i></div>
					<?php
					if ( $labels ) {
						?>
						<div class="thb-social-label"><?php echo esc_html( $value['label'] ); ?></div><?php } ?>
				</div>
				<?php if ( $counts && ! empty( $data ) ) { ?>
					<div class="thb-social-count">
						<?php
						if ( array_key_exists( 'error', $data ) ) {
							echo esc_html( $data['error'] );
						} else {
							echo esc_html( $data['count'] ); }
						?>
					</div>
				<?php } ?>
			</a>
		</div>
		<?php } ?>
	</div>
		<?php
	}
}
