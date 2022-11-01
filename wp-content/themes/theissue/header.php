<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php

	/**
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */

	wp_head();
	?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5DVLNXC');</script>
<!-- End Google Tag Manager -->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-65250801-19"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-65250801-19');
</script>

	<meta name="google-site-verification" content="hm3XgzMfp8ppO2rM5PABP7E-735wka5_2r70zIKEMgo" />
</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DVLNXC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<?php do_action( 'thb_before_wrapper' ); ?>
<!-- Start Wrapper -->
<div id="wrapper" class="thb-page-transition-<?php echo esc_attr( ot_get_option( 'page_transition', 'on' ) ); ?>">

	<?php if ( ot_get_option( 'fixed_header', 'on' ) === 'on' && ! thb_is_mobile() ) { ?>
		<!-- Start Fixed Header -->
		<?php

		if ( ot_get_option( 'header_style', 'style1' ) === 'style4' ) {
			$fixed = 'fixed-style2';
		} else {
			$fixed = 'fixed-style1';
		}
		if ( is_singular( 'post' ) ) {
			$fixed = 'fixed-article';
		}
		get_template_part( 'inc/templates/header/' . $fixed );

		?>
		<!-- End Fixed Header -->
	<?php } ?>
	<?php do_action( 'thb_before_header' ); ?>
	<?php
	// Sub-Header.
	if ( 'on' === ot_get_option( 'subheader', 'off' ) ) {
		get_template_part( 'inc/templates/subheader/style1' );
	}
	?>
	<?php get_template_part( 'inc/templates/header/mobile-style1' ); ?>
	<?php if ( ! thb_is_mobile() ) { ?>
		<!-- Start Header -->
		<?php get_template_part( 'inc/templates/header/' . ot_get_option( 'header_style', 'style1' ) ); ?>
		<!-- End Header -->
	<?php } ?>
	<?php do_action( 'thb_before_main' ); ?>
	<div role="main">
