<?php
if ( 'off' === ot_get_option( 'article_author', 'on' ) ) {
	return;
}
$thb_id = get_the_author_meta( 'ID' );
if ( '' === get_the_author_meta( 'description', $thb_id ) ) {
	return;
}
?>
<div class="thb-article-author style1">
	<?php echo get_avatar( $thb_id, '172', '', '', array( 'class' => 'lazyload' ) ); ?>
	<div class="author-content">
		<a href="<?php echo esc_url( get_author_posts_url( $thb_id ) ); ?>" rel="author"><?php the_author_meta( 'display_name', $thb_id ); ?></a>
		<?php if ( get_the_author_meta( 'url', $thb_id ) !== '' ) { ?>
			<a href="<?php echo esc_url( get_the_author_meta( 'url', $thb_id ) ); ?>" class="author-social"><i class="thb-icon-link"></i></a>
		<?php } ?>
		<?php if ( get_the_author_meta( 'twitter', $thb_id ) !== '' ) { ?>
			<a href="<?php echo esc_url( get_the_author_meta( 'twitter', $thb_id ) ); ?>" class="twitter author-social" target="_blank"><i class="thb-icon-twitter"></i></a>
		<?php } ?>
		<?php if ( get_the_author_meta( 'facebook', $thb_id ) !== '' ) { ?>
			<a href="<?php echo esc_url( get_the_author_meta( 'facebook', $thb_id ) ); ?>" class="facebook author-social" target="_blank"><i class="thb-icon-facebook"></i></a>
		<?php } ?>
		<?php if ( get_the_author_meta( 'instagram', $thb_id ) !== '' ) { ?>
			<a href="<?php echo esc_url( get_the_author_meta( 'instagram', $thb_id ) ); ?>" class="instagram author-social" target="_blank"><i class="thb-icon-instagram"></i></a>
		<?php } ?>
		<?php if ( get_the_author_meta( 'youtube', $thb_id ) !== '' ) { ?>
			<a href="<?php echo esc_url( get_the_author_meta( 'youtube', $thb_id ) ); ?>" class="youtube author-social"><i class="thb-icon-youtube"></i></a>
		<?php } ?>
		<?php if ( get_the_author_meta( 'linkedin', $thb_id ) !== '' ) { ?>
			<a href="<?php echo esc_url( get_the_author_meta( 'linkedin', $thb_id ) ); ?>" class="linkedin author-social"><i class="thb-icon-linkedin"></i></a>
		<?php } ?>
		<p><?php the_author_meta( 'description', $thb_id ); ?></p>
	</div>
</div>
<?php

$post_multiauthor = get_post_meta( get_the_id(), 'post_multiauthor', true );
if ( is_array( $post_multiauthor ) ) {
	foreach ( $post_multiauthor as $author ) {
		if ( intval( $author ) !== $thb_id ) {
			?>
			<div class="thb-article-author style1">
				<?php echo get_avatar( $author, '172', '', '', array( 'class' => 'lazyload' ) ); ?>
				<div class="author-content">
					<a href="<?php echo esc_url( get_author_posts_url( $author ) ); ?>" rel="author"><?php the_author_meta( 'display_name', $author ); ?></a>
					<?php if ( get_the_author_meta( 'twitter', $author ) !== '' ) { ?>
						<a href="<?php echo esc_url( get_the_author_meta( 'twitter', $author ) ); ?>" class="twitter author-social" target="_blank"><i class="thb-icon-twitter"></i></a>
					<?php } ?>
					<?php if ( get_the_author_meta( 'facebook', $author ) !== '' ) { ?>
						<a href="<?php echo esc_url( get_the_author_meta( 'facebook', $author ) ); ?>" class="facebook author-social" target="_blank"><i class="thb-icon-facebook"></i></a>
					<?php } ?>
					<?php if ( get_the_author_meta( 'instagram', $author ) !== '' ) { ?>
						<a href="<?php echo esc_url( get_the_author_meta( 'instagram', $author ) ); ?>" class="instagram author-social" target="_blank"><i class="thb-icon-instagram"></i></a>
					<?php } ?>
					<?php if ( get_the_author_meta( 'youtube', $author ) !== '' ) { ?>
						<a href="<?php echo esc_url( get_the_author_meta( 'youtube', $author ) ); ?>" class="youtube author-social"><i class="thb-icon-youtube"></i></a>
					<?php } ?>
					<?php if ( get_the_author_meta( 'linkedin', $author ) !== '' ) { ?>
						<a href="<?php echo esc_url( get_the_author_meta( 'linkedin', $author ) ); ?>" class="linkedin author-social"><i class="thb-icon-linkedin"></i></a>
					<?php } ?>
					<p><?php the_author_meta( 'description', $author ); ?></p>
				</div>
			</div>
			<?php
		}
	}
}
