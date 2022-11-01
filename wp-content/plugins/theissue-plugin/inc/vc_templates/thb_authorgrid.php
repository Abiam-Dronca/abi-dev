<?php function thb_authorgrid( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_authorgrid', $atts );
	extract( $atts );

	ob_start();
	if ( $author_ids === '' || $author_ids === ' ' ) {
		$all_authors = get_users(
			array(
				'role__not_in' => array( 'subscriber', 'customer', '1' ),
			)
		);
		$author_list = array_column( $all_authors, 'ID' );
	} else {
		$author_array = explode( ',', $author_ids );
		$author_list  = $author_array;
	}

	echo '<div class="row author_list">';
	foreach ( $author_list as $author ) {
		?>
			<div class="small-12 <?php echo esc_attr( $columns ); ?> columns">
				<div class="author_grid">
			<div class="thb-author-info">
			<?php
				$author_id = $author;
				$count     = count_user_posts( $author_id );
			?>
			<figure>
				<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php echo get_avatar( $author_id, '232', '', '', array( 'class' => 'lazyload' ) ); ?></a>
			</figure>
			<div class="thb-author-page-description">
				<h4><a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a></h4>
				<p><?php the_author_meta( 'description', $author_id ); ?></p>
			</div>
			</div>
			<div class="thb-author-page-meta">
			<?php if ( '' !== get_the_author_meta( 'url', $author_id ) ) { ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'url', $author_id ) ); ?>" class="author-link"><i class="thb-icon-link"></i></a>
			<?php } ?>
			<?php if ( '' !== get_the_author_meta( 'twitter', $author_id ) ) { ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'twitter', $author_id ) ); ?>" class="author-link-twitter"><i class="thb-icon-twitter"></i></a>
			<?php } ?>
			<?php if ( '' !== get_the_author_meta( 'facebook', $author_id ) ) { ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'facebook', $author_id ) ); ?>" class="author-link-facebook"><i class="thb-icon-facebook"></i></a>
			<?php } ?>
			<?php if ( '' !== get_the_author_meta( 'instagram', $author_id ) ) { ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'instagram', $author_id ) ); ?>" class="author-link-instagram"><i class="thb-icon-instagram"></i></a>
			<?php } ?>
			<?php if ( '' !== get_the_author_meta( 'youtube', $author_id ) ) { ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'youtube', $author_id ) ); ?>" class="author-link-youtube"><i class="thb-icon-youtube"></i></a>
			<?php } ?>
			<?php if ( '' !== get_the_author_meta( 'linkedin', $author_id ) ) { ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'linkedin', $author_id ) ); ?>" class="author-link-linkedin"><i class="thb-icon-linkedin"></i></a>
			<?php } ?>
			</div>
				</div>
			</div>
		<?php
	}
	echo '</div>';

	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_authorgrid', 'thb_authorgrid' );
