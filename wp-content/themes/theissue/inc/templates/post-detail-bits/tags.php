<?php
if ( ot_get_option( 'article_tags', 'on' ) === 'off' ) {
	return;
}
$posttags = get_the_tags();
?>
<?php if ( ! empty( $posttags ) ) { ?>
<div class="thb-article-tags">
	<span><?php esc_html_e( 'Tags', 'theissue' ); ?></span>
	<div>
		<?php
		if ( $posttags ) {
			foreach ( $posttags as $thb_tag ) {
				?>
					<a href="<?php echo esc_url( get_tag_link( $thb_tag->term_id ) ); ?>" title="<?php echo esc_attr( get_tag_link( $thb_tag->name ) ); ?>"><?php echo esc_html( $thb_tag->name ); ?></a>
				<?php
			}
		}
		?>
	</div>
</div>
	<?php
}
