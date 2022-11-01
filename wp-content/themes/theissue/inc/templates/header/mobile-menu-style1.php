<?php
	$color   = ot_get_option( 'mobile_menu_color', 'light' );
	$class[] = 'style1';
	$class[] = 'side-panel';
	$class[] = $color;
	$class[] = 'light' === $color ? 'dark-scroll' : false;
?>
<!-- Start Mobile Menu -->
<nav id="mobile-menu" class="<?php echo esc_attr( implode( ' ', $class ) ); ?>" data-behaviour="<?php echo esc_attr( ot_get_option( 'submenu_behaviour', 'thb-submenu' ) ); ?>">
	<a class="thb-mobile-close"><div><span></span><span></span></div></a>
		<?php do_action( 'thb_logo', 'logo_mobilemenu' ); ?>
		<div class="custom_scroll side-panel-inner" id="menu-scroll">
			<div class="mobile-menu-top">
				<?php
				$mobile_menu_override = ot_get_option( 'mobile_menu_override', false );
				if ( $mobile_menu_override ) {
					wp_nav_menu(
						array(
							'menu'       => $mobile_menu_override,
							'depth'      => 5,
							'container'  => false,
							'menu_class' => 'thb-mobile-menu',
							'walker'     => new thb_mobileDropdown(),
						)
					);
				} elseif ( has_nav_menu( 'nav-menu' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'nav-menu',
							'depth'          => 5,
							'container'      => false,
							'menu_class'     => 'thb-mobile-menu',
							'walker'         => new thb_mobileDropdown(),
						)
					);
				}
				?>
				<?php if ( has_nav_menu( 'secondary-menu' ) ) { ?>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'secondary-menu',
								'depth'          => 3,
								'container'      => false,
								'menu_class'     => 'thb-secondary-menu',
								'walker'         => new thb_mobileDropdown(),
							)
						);
				}
				?>
			</div>
			<div class="mobile-menu-bottom">
				<?php dynamic_sidebar( 'mobile-menu' ); ?>
				<?php if ( $mobile_menu_footer = ot_get_option( 'mobile_menu_footer' ) ) { ?>
					<div class="menu-footer">
						<?php echo do_shortcode( $mobile_menu_footer ); ?>
					</div>
				<?php } ?>
				<?php thb_get_social_list( true, false, 'thb-social-horizontal', 'mono-icons' ); ?>
				<?php if ( 'on' === ot_get_option( 'header_dark_mode_toggle_mobile', 'off' ) ) { ?>
					<div class="mobile-menu-toggle-container">
						<?php do_action( 'thb_dark_mode_switcher' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
</nav>
<!-- End Mobile Menu -->
