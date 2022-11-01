<?php

function thb_article_get_accounts( $share_url, $post_id, $options ) {
	$sharing_buttons  = ot_get_option( $options, array() );
	$sharing_accounts = array();
	$post_url         = esc_url( $share_url );
	$post_title       = wp_strip_all_tags( get_the_title( $post_id ) );
	$post_content     = get_post_field( 'post_content', intval( $post_id ) );
	$post_thumbnail   = get_the_post_thumbnail_url( intval( $post_id ), 'full' );
	$default_via      = apply_filters( 'thb_twitter_via', 'fuel_themes' );
	$twitter_user     = ot_get_option( 'social_twitter_user', $default_via );

	foreach ( $sharing_buttons as $button ) {
		switch ( $button ) {
			case 'facebook':
				$sharing_accounts['facebook'] = array(
					'slug'  => 'facebook',
					'url'   => esc_url( 'https://www.facebook.com/sharer.php?u=' . $share_url ),
					'icon'  => 'thb-icon-facebook',
					'label' => esc_html__( 'Share', 'theissue' ),
					'count' => 'thb_facebook_count',
				);
				break;
			case 'twitter':
				$sharing_accounts['twitter'] = array(
					'slug'  => 'twitter',
					'url'   => esc_url( 'https://twitter.com/intent/tweet?text=' . $post_title . '&via=' . $twitter_user . '&url=' . $share_url ),
					'icon'  => 'thb-icon-twitter',
					'label' => esc_html__( 'Tweet', 'theissue' ),
				);
				break;
			case 'pinterest':
				$sharing_accounts['pinterest'] = array(
					'slug'  => 'pinterest',
					'url'   => esc_url( 'https://pinterest.com/pin/create/bookmarklet/?url=' . $share_url . '&media=' . $post_thumbnail ),
					'icon'  => 'thb-icon-pinterest',
					'label' => esc_html__( 'Pin', 'theissue' ),
					'count' => 'thb_pinterest_count',
				);
				break;
			case 'linkedin':
				$sharing_accounts['linkedin'] = array(
					'slug'  => 'linkedin',
					'url'   => esc_url( 'https://www.linkedin.com/cws/share?url=' . $share_url ),
					'icon'  => 'thb-icon-linkedin',
					'label' => esc_html__( 'Share', 'theissue' ),
				);
				break;
			case 'email':
				$sharing_accounts['email'] = array(
					'slug'  => 'email',
					'url'   => esc_url( 'mailto:?subject=' . $post_title . '&body=' . $post_title . '%20' . $share_url ),
					'icon'  => 'thb-icon-mail',
					'label' => esc_html__( 'Share', 'theissue' ),
				);
				break;
			case 'vkontakte':
				$sharing_accounts['vkontakte'] = array(
					'slug'  => 'vkontakte',
					'url'   => esc_url( 'https://vk.com/share.php?url=' . $share_url ),
					'icon'  => 'thb-icon-vkontakte',
					'label' => esc_html__( 'Like', 'theissue' ),
				);
				break;
			case 'whatsapp':
				$sharing_accounts['whatsapp'] = array(
					'slug'  => 'whatsapp',
					'url'   => esc_url( 'https://wa.me/?text=' . $post_title . ' ' . $share_url ),
					'icon'  => 'thb-icon-whatsapp',
					'label' => esc_html__( 'Share', 'theissue' ),
				);
				break;
			case 'reddit':
				$sharing_accounts['reddit'] = array(
					'slug'  => 'reddit',
					'url'   => esc_url( 'https://reddit.com/submit?url=' . $share_url ),
					'icon'  => 'thb-icon-reddit',
					'label' => esc_html__( 'Share', 'theissue' ),
				);
				break;
			case 'telegram':
				$sharing_accounts['telegram'] = array(
					'slug'  => 'telegram',
					'url'   => esc_url( 'https://t.me/share/url?&text=' . $post_title . '&url=' . $share_url ),
					'icon'  => 'thb-icon-telegram',
					'label' => esc_html__( 'Share', 'theissue' ),
				);
				break;
			case 'flipboard':
				$sharing_accounts['flipboard'] = array(
					'slug'  => 'flipboard',
					'url'   => esc_url( 'https://share.flipboard.com/bookmarklet/popout?v=2&title=' . $post_title . '&url=' . $share_url ),
					'icon'  => 'thb-icon-flipboard',
					'label' => esc_html__( 'Share', 'theissue' ),
				);
				break;
		}
	}
	return $sharing_accounts;
}

/* Article Sharing Buttons - Top */
function thb_article_share_top() {
	$post_id         = get_the_ID();
	$post_url        = get_permalink();
	$sharing_buttons = thb_article_get_accounts( $post_url, $post_id, 'sharing_buttons_top' );
	$style           = ot_get_option( 'sharing_buttons_top_style', 'style1' );
	$sharing_counts  = ot_get_option( 'sharing_counts', 'on' );
	if ( empty( $sharing_buttons ) ) {
		return;
	}

	$classes[] = 'thb-social-top';
	$classes[] = $style;
	$classes[] = 'sharing-counts-' . $sharing_counts;

	if ( ! class_exists( 'TheIssue_plugin' ) ) {
		return;
	}
	?>
	<?php if ( in_array( $style, array( 'style1', 'style2', 'style3', 'style4' ), true ) ) { ?>
	<div class="thb-fixed-shares-container">
		<div class="thb-fixed sticky-post-shares">
	<?php } ?>
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<?php if ( 'on' === $sharing_counts ) { ?>
					<div class="thb-social-total">
						<span class="thb-social-total-count"><?php echo esc_attr( thb_numberAbbreviation( thb_all_count( $post_id ) ) ); ?></span>
						<span class="thb-social-total-text"><?php esc_html_e( 'Shares', 'theissue' ); ?></span>
					</div>
				<?php } ?>
				<div class="thb-social-top-buttons">
					<?php
					$i = 0;
					foreach ( $sharing_buttons as $button ) {
						if ( 'on' === $sharing_counts ) {
							if ( array_key_exists( 'count', $button ) ) {
								$count = thb_numberAbbreviation( $button['count']( $post_id ) );
							}
						}
						?>
					<div class="social-button-holder">
						<a href="<?php echo esc_attr( $button['url'] ); ?>" rel="noreferrer" class="social social-<?php echo esc_attr( $button['slug'] ); ?>"
											<?php
											if ( 'whatsapp' === $button['slug'] ) {
												?>
								data-action="share/whatsapp/share"<?php } ?>>
							<span class="thb-social-icon">
								<i class="<?php echo esc_attr( $button['icon'] ); ?>"></i>
							</span>
						<?php if ( 'on' === $sharing_counts ) { ?>
								<?php if ( array_key_exists( 'count', $button ) && $i < 4 ) { ?>
									<span class="thb-social-count"><?php echo esc_html( $count ); ?></span>
								<?php } ?>
							<?php } ?>
						</a>
					</div>
					<?php $i++; } ?>

				</div>
			</div>
	<?php if ( in_array( $style, array( 'style1', 'style2', 'style3', 'style4' ), true ) ) { ?>
		</div>
	</div>
	<?php } ?>
	<?php
}

/* Article Sharing Buttons - Bottom */
function thb_article_share_bottom() {
	$post_id         = get_the_ID();
	$post_url        = get_permalink();
	$sharing_buttons = thb_article_get_accounts( $post_url, $post_id, 'sharing_buttons_bottom' );
	$style           = ot_get_option( 'sharing_buttons_bottom_style', 'style1' );
	$sharing_counts  = ot_get_option( 'sharing_counts', 'on' );
	if ( empty( $sharing_buttons ) ) {
		return;
	}

	$classes[] = 'thb-social-footer';
	$classes[] = $style;
	$classes[] = 'sharing-counts-' . $sharing_counts;
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<?php if ( 'on' === $sharing_counts ) { ?>
			<div class="thb-social-total">
				<span class="thb-social-total-count"><?php echo esc_attr( thb_numberAbbreviation( thb_all_count( $post_id ) ) ); ?></span>
				<span class="thb-social-total-text"><?php esc_html_e( 'Shares', 'theissue' ); ?></span>
			</div>
		<?php } ?>
		<div class="thb-social-footer-buttons">

			<?php
				$i = 0;
			foreach ( $sharing_buttons as $button ) {
				if ( 'on' === $sharing_counts ) {
					if ( array_key_exists( 'count', $button ) ) {
						$count = thb_numberAbbreviation( $button['count']( $post_id ) );
					}
				}
				?>
			<div class="social-button-holder">
				<a href="<?php echo esc_attr( $button['url'] ); ?>" class="social social-<?php echo esc_attr( $button['slug'] ); ?>"
									<?php
									if ( 'whatsapp' === $button['slug'] ) {
										?>
						data-action="share/whatsapp/share"<?php } ?>>
					<span class="thb-social-icon">
						<i class="<?php echo esc_attr( $button['icon'] ); ?>"></i>
					<?php if ( $i < 4 ) { ?>
							<span class="thb-social-text"><?php echo esc_html( $button['label'] ); ?></span>
						<?php } ?>
					</span>
				<?php if ( 'on' === $sharing_counts ) { ?>
						<?php if ( array_key_exists( 'count', $button ) && $i < 4 ) { ?>
							<span class="thb-social-count"><?php echo esc_html( $count ); ?></span>
						<?php } ?>
					<?php } ?>
				</a>
			</div>
			<?php $i++; } ?>

		</div>
	</div>
	<?php
}

function thb_sharing_top_filter() {

	$sharing_buttons_top_style = ot_get_option( 'sharing_buttons_top_style', 'style5' );

	if ( in_array( $sharing_buttons_top_style, array( 'style1', 'style2', 'style3', 'style4' ), true ) ) {
		add_action( 'thb_fixed_container', 'thb_fixed_container' );
		add_action( 'thb_article_fixed_socials', 'thb_article_share_top' );
		add_action( 'thb_article_read_next', 'thb_article_read_next' );
	} elseif ( 'style5' === $sharing_buttons_top_style ) {
		add_action( 'thb_article_after_post_inlineauthor', 'thb_article_share_top' );
	}
	if ( 'style1' === $sharing_buttons_top_style ) {
		add_action( 'thb_article_author_left', 'thb_article_author_left' );
	}
	add_action( 'thb_article_end', 'thb_article_share_bottom' );
}
add_action( 'thb_before_article', 'thb_sharing_top_filter' );

/* Shares on Fixed Header */
function thb_article_share_fixed() {
	$post_id         = get_the_ID();
	$post_url        = get_permalink();
	$sharing_buttons = thb_article_get_accounts( $post_url, $post_id, 'sharing_buttons_fixed' );
	$sharing_counts  = ot_get_option( 'sharing_counts', 'on' );
	if ( empty( $sharing_buttons ) ) {
		return; }

	$classes[] = 'thb-social-fixed';
	$classes[] = 'sharing-counts-' . $sharing_counts;
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<?php if ( comments_open() || get_comments_number() ) { ?>
			<div class="social-button-holder social-comment-holder">
				<?php get_template_part( 'assets/img/svg/comment.svg' ); ?><span><?php comments_number( esc_html__( '0 Comments', 'theissue' ), esc_html__( '1 Comment', 'theissue' ), esc_html__( '% Comments', 'theissue' ) ); ?></span>
			</div>
		<?php } ?>
		<?php
			$i = 0;
		foreach ( $sharing_buttons as $button ) {
			if ( 'on' === $sharing_counts ) {
				if ( array_key_exists( 'count', $button ) ) {
					$count = thb_numberAbbreviation( $button['count']( $post_id ) );
				}
			}
			?>
		<div class="social-button-holder">
			<a href="<?php echo esc_attr( $button['url'] ); ?>" class="social social-<?php echo esc_attr( $button['slug'] ); ?>"
								<?php
								if ( 'whatsapp' === $button['slug'] ) {
									?>
					data-action="share/whatsapp/share"<?php } ?>>
				<span class="thb-social-icon">
					<i class="<?php echo esc_attr( $button['icon'] ); ?>"></i>
				</span>
			<?php if ( 'on' === $sharing_counts ) { ?>
					<?php if ( array_key_exists( 'count', $button ) && $i < 4 ) { ?>
						<span class="thb-social-count"><?php echo esc_html( $count ); ?></span>
					<?php } ?>
				<?php } ?>
			</a>
		</div>
		<?php $i++; } ?>
	</div>
	<?php
}
add_action( 'thb_fixed_right', 'thb_article_share_fixed' );
add_action( 'thb_article_end', 'thb_article_share_fixed' );

// Yoast Breadcrumbs support.
if ( function_exists( 'yoast_breadcrumb' ) ) {
	add_action( 'thb_categories', 'thb_seo_plugins_breadcrumbs', 10, 1 );
	function thb_seo_plugins_breadcrumbs( $article ) {
		if ( function_exists( 'yoast_breadcrumb' ) && $article ) {
			if ( 'on' === ot_get_option( 'thb_yoast_breadcrumbs', 'off' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs" class="woocommerce-breadcrumb">', '</p>' );
			}
		} elseif ( function_exists( 'rank_math_the_breadcrumbs' ) && $article ) {
			if ( 'off' === ot_get_option( 'thb_rankmath_breadcrumbs', 'off' ) ) {
				return;
			}
			rank_math_the_breadcrumbs();
		}
	}
}
