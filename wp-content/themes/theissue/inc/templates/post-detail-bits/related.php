<?php
if ( ot_get_option( 'article_related', 'on' ) === 'off' ) {
	return;
}

$article_related_relation = ot_get_option( 'article_related_relation', 'tags' );

$thb_id = get_the_id();
if ( 'cats' === $article_related_relation ) {
	$cats     = get_the_category( $thb_id );
	$all_cats = '';
	foreach ( $cats as $thb_cat ) {
		$all_cats .= $thb_cat->term_id . ',';
	}
	$args = array(
		'cat'                 => $all_cats,
		'post__not_in'        => array( $thb_id ),
		'posts_per_page'      => ot_get_option( 'article_related_count', '6' ),
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
	);
} else {
	$tags = wp_get_post_tags( $thb_id );

	if ( ! $tags ) {
		if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {
			?>
			<div class="row hide-on-print">
				<aside class="small-12 columns related-posts text-center">
					<p class="thb-newsletter-warning-text">
						<?php esc_html_e( 'Related Posts use tags, please make sure that your posts have the same tags.', 'theissue' ); ?>
					</p>
				</aside>
			</div>
			<?php
		}
		return;
	}

	$tag_ids = array();
	foreach ( $tags as $individual_tag ) {
		$tag_ids[] = $individual_tag->term_id;
	}
	$args = array(
		'tag__in'             => $tag_ids,
		'post__not_in'        => array( $thb_id ),
		'posts_per_page'      => ot_get_option( 'article_related_count', '6' ),
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
	);
}

$article_related_style = ot_get_option( 'article_related_style', 'style1' );

$related_posts = new WP_Query( $args );
if ( $related_posts->have_posts() ) :
	?>
<!-- Start Related Posts -->
<div class="row hide-on-print">
	<aside class="small-12 columns related-posts related-posts-<?php echo esc_attr( $article_related_style ); ?>">
		<h6 class="related-posts-title"><?php esc_html_e( 'Related Posts', 'theissue' ); ?></h6>
		<div class="row
		<?php
		if ( 'style4' === $article_related_style ) {
			?>
			align-center<?php } ?>">
			<?php
			while ( $related_posts->have_posts() ) :
				$related_posts->the_post();
				?>
				<?php if ( 'style1' === $article_related_style ) { ?>
					<div class="small-6 medium-4 large-2 columns">
						<?php get_template_part( 'inc/templates/post-styles/style2' ); ?>
					</div>
				<?php } ?>
				<?php if ( 'style2' === $article_related_style ) { ?>
					<div class="small-6 medium-6 large-3 columns">
						<?php get_template_part( 'inc/templates/post-styles/style2' ); ?>
					</div>
				<?php } ?>
				<?php if ( 'style3' === $article_related_style ) { ?>
					<div class="small-12 medium-6 large-4 columns">
						<?php get_template_part( 'inc/templates/post-styles/thumbnail/style5' ); ?>
					</div>
				<?php } ?>
				<?php if ( 'style4' === $article_related_style ) { ?>
					<div class="small-12 medium-10 large-8 columns">
						<?php get_template_part( 'inc/templates/post-styles/style15' ); ?>
					</div>
				<?php } ?>
			<?php endwhile; ?>
		</div>
	</aside>
</div>
<!-- End Related Posts -->
	<?php
endif;
wp_reset_postdata();
