<?php
$thb_id      = get_the_ID();
$post_source = get_post_meta( $thb_id, 'post_source', true );
$post_via    = get_post_meta( $thb_id, 'post_via', true );
?>
<?php if ( '' !== $post_source || '' !== $post_via ) { ?>
<div class="thb-entry-footer">
	<?php if ( '' !== $post_via ) { ?>
	<div class="post-source">
		<span><?php esc_html_e( 'Via:', 'theissue' ); ?> </span>
			<?php foreach ( $post_via as $source ) { ?>
				<a href="<?php echo esc_url( $source['post_source_url'] ); ?>" target="_blank" title="<?php echo esc_attr( $source['title'] ); ?>"><?php echo esc_attr( $source['title'] ); ?></a>
			<?php } ?>
	</div>
	<?php } ?>
	<?php if ( '' !== $post_source ) { ?>
	<div class="post-source">
		<span><?php esc_html_e( 'Source:', 'theissue' ); ?> </span>
			<?php foreach ( $post_source as $source ) { ?>
				<a href="<?php echo esc_url( $source['post_source_url'] ); ?>" target="_blank" title="<?php echo esc_attr( $source['title'] ); ?>"><?php echo esc_attr( $source['title'] ); ?></a>
			<?php } ?>
	</div>
	<?php } ?>
</div>
	<?php
}
