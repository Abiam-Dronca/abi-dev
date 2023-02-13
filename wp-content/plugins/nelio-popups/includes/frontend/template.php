<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php
	/**
	 * Runs before wp_head.
	 *
	 * @since 1.0.20
	 */
	do_action( 'nelio_popup_head' );
	?>
	<?php wp_head(); ?>
	<style>body.single.single-nelio_popup { margin:0; padding:0; }</style>
	<style>body.single.single-nelio_popup > :first-child > :first-child { margin-top:0!important; }</style>
	<style>body.single.single-nelio_popup > :first-child > :last-child { margin-bottom:0!important; }</style>
</head>
<body <?php body_class(); ?>>
	<div class="
	<?php
		echo esc_attr(
			implode(
				' ',
				/**
				 * Filters the classes that appear in the div tag wrapping the popup content.
				 *
				 * @param array $classes list of classes.
				 *
				 * @since 1.0.5
				 */
				apply_filters( 'nelio_popup_content_classes', array( 'nelio-popup-content' ) )
			)
		);
		?>
	"><?php the_content(); ?></div>
	<?php
	/**
	 * Runs before wp_footer.
	 *
	 * @since 1.0.20
	 */
	do_action( 'nelio_popup_footer' );
	?>
	<?php wp_footer(); ?>
</body>
</html>
