<?php
function thb_seealso( $content ) {
	if ( ! is_singular( 'post' ) ) {
		return $content; }
	if ( ! ( is_single() || is_admin() ) ) {
		return $content; }
	$article_seealso = ot_get_option( 'article_seealso', 'on' );
	if ( 'off' === $article_seealso ) {
		return $content;
	}

	$data  = explode( '</p>', $content );
	$count = count( $data );
	if ( $count < 5 ) {
		return $content;
	}

	$twothirds = floor( $count / 1.5 );

	array_splice( $data, $twothirds, 0, '<p>' . thb_get_seealsopost() . '</p>' );

	$content = implode( '</p>', $data );
	return $content;
}

add_filter( 'the_content', 'thb_seealso' );

function thb_get_seealsopost() {
	$id                       = get_the_id();
	$article_seealso_relation = ot_get_option( 'article_seealso_relation', 'cats' );
	if ( 'cats' === $article_seealso_relation ) {
		$cats     = get_the_category();
		$all_cats = '';
		foreach ( $cats as $cat ) {
			$all_cats .= $cat->term_id . ',';
		}
		$args = array(
			'cat'            => $all_cats,
			'post__not_in'   => array( $id ),
			'posts_per_page' => 1,
			'orderby'        => 'rand',
			'post_status'    => 'publish',
		);
	} elseif ( 'tags' === $article_seealso_relation ) {
		$tags    = wp_get_post_tags( $id );
		$tag_ids = array();
		foreach ( $tags as $individual_tag ) {
			$tag_ids[] = $individual_tag->term_id;
		}
		$args = array(
			'tag__in'        => $tag_ids,
			'post__not_in'   => array( $id ),
			'posts_per_page' => 1,
			'orderby'        => 'rand',
			'post_status'    => 'publish',
		);
	}

	$article_seealso_date = ot_get_option( 'article_seealso_date', '0' );

	if ( $article_seealso_date > 0 ) {
		$args['date_query'] = array(
			array(
				'inclusive' => true,
				'after'     => $article_seealso_date . ' months ago',
			),
		);
	}
	$seealso_query = new WP_Query( $args );

	ob_start();
	if ( $seealso_query->have_posts() ) :
		while ( $seealso_query->have_posts() ) :
			$seealso_query->the_post();
			get_template_part( 'inc/templates/post-styles/misc/see-also' );
		endwhile;
	endif;

	$out = ob_get_clean();

	wp_reset_query();

	return $out;

}
