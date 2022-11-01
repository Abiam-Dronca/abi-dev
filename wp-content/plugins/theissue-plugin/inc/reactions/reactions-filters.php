<?php
function thb_get_post_reactions( $post_id ) {
	$reaction_votes = get_post_meta( $post_id, 'thb-reactions-votes', true );

	if ( ! is_array( $reaction_votes ) ) {
		$reaction_votes = array();
	}
	return $reaction_votes;
}
function thb_save_post_reactions() {
	$post_id        = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
	$reaction       = filter_input( INPUT_POST, 'reaction', FILTER_SANITIZE_STRING );
	$is_active      = filter_input( INPUT_POST, 'is_active', FILTER_VALIDATE_BOOLEAN );
	$reaction_votes = get_post_meta( $post_id, 'thb-reactions-votes', true );

	if ( ! is_array( $reaction_votes ) ) {
		$reaction_votes = array();
	}

	// Already Active
	if ( $is_active ) {
		$reaction_votes[ $reaction ] = $reaction_votes[ $reaction ] > 0 ? $reaction_votes[ $reaction ] - 1 : 0;
	} else {
		$reaction_votes[ $reaction ] = $reaction_votes[ $reaction ] + 1;
	}

	echo wp_json_encode( $reaction_votes );

	update_post_meta( $post_id, 'thb-reactions-votes', $reaction_votes );

	wp_die();
}
add_action( 'wp_ajax_thb_save_post_reactions', 'thb_save_post_reactions' );
add_action( 'wp_ajax_nopriv_thb_save_post_reactions', 'thb_save_post_reactions' );

function thb_render_reactions() {
	$post_id        = get_the_ID();
	$all_reactions  = get_terms(
		'thb-reactions',
		array(
			'hide_empty' => false,
		)
	);
	$count          = count( $all_reactions );
	$reaction_votes = thb_get_post_reactions( $post_id );

	// Cookies
	$cookie_name  = 'thb-reactions-' . $post_id;
	$cookie_value = array();
	if ( isset( $_COOKIE[ $cookie_name ] ) ) { // Cookie Exists
		$cookie_value = json_decode( stripslashes( $_COOKIE[ $cookie_name ] ), true );
	}
	if ( ! sizeof( $all_reactions ) ) {
		return;
	}

	?>
		<div class="thb-article-reactions" data-post-id="<?php echo esc_attr( $post_id ); ?>">
			<h6><?php esc_html_e( "What's Your Reaction?", 'theissue' ); ?></h6>
			<div class="row small-up-2 medium-up-<?php echo esc_attr( $count ); ?>">
				<?php
				foreach ( $all_reactions as $reaction ) {
					$vote_count = array_key_exists( $reaction->slug, $reaction_votes ) ? $reaction_votes[ $reaction->slug ] : 0;
					?>
					<div class="columns">
						<?php
						$class = array_key_exists( $reaction->slug, $cookie_value ) ? 'active' : false;
						?>
						<div class="thb-reaction <?php echo esc_attr( $class ); ?>" data-slug="<?php echo esc_attr( $reaction->slug ); ?>">
							<div class="thb-reaction-image">
							<?php
							$thb_reaction_icon = get_term_meta( $reaction->term_id, 'thb_reaction_icon', true );
							if ( $thb_reaction_icon ) {
								include theissue_plugin()->get_plugin_path() . 'assets/svg/' . $thb_reaction_icon . '.php';
							}
							?>
								<span class="thb-reaction-name"><?php echo esc_html( $reaction->name ); ?></span>
							</div>
							<span class="thb-reaction-count"><?php echo esc_html( $vote_count ); ?></span>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php
}
add_action( 'thb_render_reactions', 'thb_render_reactions', 10 );
