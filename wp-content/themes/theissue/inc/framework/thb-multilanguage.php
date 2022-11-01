<?php
if ( is_admin() ) {
	return;
}
// Custom Language Switcher.
function thb_language_switcher() {
	if ( function_exists( 'icl_get_languages' ) || defined( 'THB_DEMO_SITE' ) || function_exists( 'pll_the_languages' ) ) {
		$permalink = get_permalink();
		?>
	<ul class="thb-full-menu thb-language-switcher">
		<li class="menu-item menu-item-has-children">
			<a href="#">
				<?php
				if ( defined( 'THB_DEMO_SITE' ) ) {
					$languages = array(
						'en' => array(
							'language_code' => 'en',
							'active'        => 1,
							'url'           => $permalink,
							'native_name'   => 'English',
						),
						'fr' => array(
							'language_code' => 'fr',
							'active'        => 0,
							'url'           => $permalink,
							'native_name'   => 'Français',
						),
						'de' => array(
							'language_code' => 'de',
							'active'        => 0,
							'url'           => $permalink,
							'native_name'   => 'Deutsch',
						),
					);
				} elseif ( function_exists( 'pll_the_languages' ) ) {
					$languages = pll_the_languages( array( 'raw' => 1 ) );
				} elseif ( function_exists( 'icl_get_languages' ) ) {
					$languages = icl_get_languages( 'skip_missing=0' );
				}

				if ( 1 < count( $languages ) ) {
					if ( function_exists( 'pll_the_languages' ) ) { // Polylang
						foreach ( $languages as $l ) {
							echo esc_attr( $l['current_lang'] ? $l['name'] : '' );
						}
					} else { // WPML
						foreach ( $languages as $l ) {
							echo esc_attr( $l['active'] ? $l['native_name'] : '' );
						}
					}
				}
				?>
			</a>
			<ul class="sub-menu">
				<?php
				if ( 0 < count( $languages ) ) {
					foreach ( $languages as $l ) {
						if ( function_exists( 'pll_the_languages' ) ) {
							if ( ! $l['current_lang'] ) {
								echo '<li><a href="' . esc_url( $l['url'] ) . '" title="' . esc_attr( $l['name'] ) . '">' . esc_html( $l['name'] ) . '</a></li>';
							}
						} else {
							if ( ! $l['active'] ) {
								echo '<li><a href="' . esc_url( $l['url'] ) . '" title="' . esc_attr( $l['native_name'] ) . '">' . esc_html( $l['native_name'] ) . '</a></li>';
							}
						}
					}
				} else {
					echo '<li>' . esc_html__( 'Add Languages', 'theissue' ) . '</li>';
				}
				?>
			</ul>
		</li>
	</ul>
		<?php
	}
}
add_action( 'thb_language_switcher', 'thb_language_switcher' );

// Mobile.
function thb_language_switcher_mobile() {
	if ( function_exists( 'icl_get_languages' ) || defined( 'THB_DEMO_SITE' ) || function_exists( 'pll_the_languages' ) ) {
		$permalink = get_permalink();
		?>
	<div class="thb-language-switcher-mobile">
		<select class="thb-language-switcher-select">
			<?php
			if ( defined( 'THB_DEMO_SITE' ) ) {
				$languages = array(
					'en' => array(
						'language_code' => 'en',
						'active'        => 1,
						'url'           => $permalink,
						'native_name'   => 'English',
					),
					'fr' => array(
						'language_code' => 'fr',
						'active'        => 0,
						'url'           => $permalink,
						'native_name'   => 'Français',
					),
					'de' => array(
						'language_code' => 'de',
						'active'        => 0,
						'url'           => $permalink,
						'native_name'   => 'Deutsch',
					),
				);
			} elseif ( function_exists( 'pll_the_languages' ) ) {
				$languages = pll_the_languages( array( 'raw' => 1 ) );
			} elseif ( function_exists( 'icl_get_languages' ) ) {
				$languages = icl_get_languages( 'skip_missing=0' );
			}
			?>
			<?php
			if ( 0 < count( $languages ) ) {
				foreach ( $languages as $l ) {
					if ( function_exists( 'pll_the_languages' ) ) {
						?>
							<option value="<?php echo esc_url( $l['url'] ); ?>" <?php selected( $l['current_lang'], true ); ?>><?php echo esc_html( $l['name'] ); ?></option>
						<?php
					} else {
						?>
							<option value="<?php echo esc_url( $l['url'] ); ?>" <?php selected( $l['active'], true ); ?>><?php echo esc_html( $l['native_name'] ); ?></option>
						<?php
					}
				}
			} else {
				echo '<option>' . esc_html__( 'No lang. found.', 'theissue' ) . '</option>';
			}
			?>
		</select>
	</div>
		<?php
	}
}
add_action( 'thb_language_switcher_mobile', 'thb_language_switcher_mobile' );

// Flags
function thb_language_switcher_flags() {
	if ( function_exists( 'icl_get_languages' ) || defined( 'THB_DEMO_SITE' ) || function_exists( 'pll_the_languages' ) ) {
		$permalink = get_permalink();
		?>
	<div class="thb-language-switcher-flags">
			<?php
			if ( defined( 'THB_DEMO_SITE' ) ) {
				$languages = array(
					'en' => array(
						'language_code' => 'en',
						'active'        => 1,
						'url'           => $permalink,
						'native_name'   => 'English',
					),
					'fr' => array(
						'language_code' => 'fr',
						'active'        => 0,
						'url'           => $permalink,
						'native_name'   => 'Français',
					),
					'de' => array(
						'language_code' => 'de',
						'active'        => 0,
						'url'           => $permalink,
						'native_name'   => 'Deutsch',
					),
				);
			} elseif ( function_exists( 'pll_the_languages' ) ) {
				$languages = pll_the_languages( array( 'raw' => 1 ) );
			} elseif ( function_exists( 'icl_get_languages' ) ) {
				$languages = icl_get_languages( 'skip_missing=0' );
			}
			?>
			<?php
			if ( 0 < count( $languages ) ) {
				foreach ( $languages as $l ) {
					if ( function_exists( 'pll_the_languages' ) ) {
						?>
							<a href="<?php echo esc_url( $l['url'] ); ?>"><img src="<?php echo esc_url( $l['flag'] ); ?>" alt="<?php echo esc_attr( $l['name'] ); ?>"/></a>
						<?php
					} else {
						?>
							<a href="<?php echo esc_url( $l['url'] ); ?>"><img src="<?php echo esc_url( $l['country_flag_url'] ); ?>" alt="<?php echo esc_html( $l['native_name'] ); ?>" /></a>
						<?php
					}
				}
			} else {
				echo esc_html__( 'No lang. found.', 'theissue' );
			}
			?>
	</div>
		<?php
	}
}
add_action( 'thb_language_switcher_flags', 'thb_language_switcher_flags' );
