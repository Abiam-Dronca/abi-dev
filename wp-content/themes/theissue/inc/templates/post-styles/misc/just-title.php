<?php
	$classes[] = 'post';
	$classes[] = 'just-title-post';
?>
<div <?php post_class( $classes ); ?>>
	<?php do_action( 'thb_displayTitle', 'h6' ); ?>
</div>
