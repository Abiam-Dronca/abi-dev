<?php

function thb_post_review_average() {
	$thb_id = get_the_ID();
	if ( get_post_meta( $thb_id, 'post_review', true ) === 'on' ) {
		$average = get_post_meta( $thb_id, 'post_review_average', true );
		return intval( $average, 10 );
	}
}
function thb_get_review_text( $score ) {
	switch ( $score ) {
		case in_array( $score, range( 0, 14 ) ):
			$state = esc_html__( 'Disaster', 'theissue' );
			$i     = 1;
			break;
		case in_array( $score, range( 15, 29 ) ):
			$state = esc_html__( 'Awful', 'theissue' );
			$i     = 2;
			break;
		case in_array( $score, range( 30, 44 ) ):
			$state = esc_html__( 'Mediocre', 'theissue' );
			$i     = 3;
			break;
		case in_array( $score, range( 45, 59 ) ):
			$state = esc_html__( 'Good', 'theissue' );
			$i     = 4;
			break;
		case in_array( $score, range( 60, 74 ) ):
			$state = esc_html__( 'Great', 'theissue' );
			$i     = 5;
			break;
		case in_array( $score, range( 75, 89 ) ):
			$state = esc_html__( 'Amazing', 'theissue' );
			$i     = 6;
			break;
		case in_array( $score, range( 90, 100 ) ):
			$state = esc_html__( 'Masterpiece', 'theissue' );
			$i     = 7;
			break;
	}

	return array(
		'state' => $state,
		'i'     => $i,
	);
}
function thb_post_review() {
	$thb_id = get_the_ID();
	if ( get_post_meta( $thb_id, 'post_review', true ) !== 'on' ) {
		return; }

	$style          = get_post_meta( $thb_id, 'post_review_style', true ) ? get_post_meta( $thb_id, 'post_review_style', true ) : 'style1';
	$post_review_bg = get_post_meta( $thb_id, 'post_review_bg', true ) ? get_post_meta( $thb_id, 'post_review_bg', true ) : get_post_thumbnail_id( $thb_id );
	$comments       = get_post_meta( $thb_id, 'post_review_comments', true );
	$score          = intval( get_post_meta( $thb_id, 'post_review_average', true ), 10 );
	$text           = thb_get_review_text( $score );

	?>
	<div class="thb-article-review <?php echo esc_attr( $style ); ?>" itemscope itemtype="http://schema.org/Review">
		<span class="hide" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Thing">
			<meta itemprop="name" content="<?php echo esc_attr( get_the_title( $thb_id ) ); ?>">
		</span>
		<?php if ( $style === 'style2' ) { ?>
			<figure class="thb-article-figure">
				<?php echo wp_get_attachment_image( $post_review_bg, 'theissue-full-x2' ); ?>
				<div class="thb-average" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
					<?php get_template_part( 'assets/img/svg/hexagon.svg' ); ?>
					<div class="thb-counter">
						<div class="counter" data-count="<?php echo esc_attr( $score ); ?>" data-speed="1000">0</div>
						<div class="thb-review-state"><?php echo esc_html( $text['state'] ); ?></div>
					</div>
					<span itemprop="ratingValue" class="hide"><?php echo esc_attr( $score ); ?></span><span class="hide" itemprop="bestRating">100</span>

				</div>
			</figure>
		<?php } ?>
		<div class="post_review_comments">
			<div class="row">
				<div class="small-12 medium-6 columns comment_section">
					<span class="post_review_comment pros"><?php get_template_part( 'assets/img/svg/pros.svg' ); ?><?php esc_html_e( 'Pros', 'theissue' ); ?></span>
					<?php
					if ( $comments ) {
						foreach ( $comments as $comment ) {
							?>
													<?php if ( $comment['feature_comment_type'] === 'positive' ) { ?>
						<p class="positive"><?php echo esc_attr( $comment['title'] ); ?></p>
						<?php } ?>
											<?php
						}
					}
					?>
				</div>
				<div class="small-12 medium-6 columns comment_section">
					<span class="post_review_comment cons"><?php get_template_part( 'assets/img/svg/cons.svg' ); ?><?php esc_html_e( 'Cons', 'theissue' ); ?></span>
					<?php
					if ( $comments ) {
						foreach ( $comments as $comment ) {
							?>
							<?php if ( $comment['feature_comment_type'] === 'negative' ) { ?>
						<p class="negative"><?php echo esc_attr( $comment['title'] ); ?></p>
						<?php } ?>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		<?php if ( $score && $style === 'style1' ) { ?>
		<div class="thb-review-style1-footer">
			<div class="thb-review-style1-title">
				<?php esc_html_e( 'Score', 'theissue' ); ?>
			</div>
			<div class="thb-review-style1-steps">
				<?php for ( $j = 1; $j <= 7; $j++ ) { ?>
					<?php $active = $text['i'] >= $j ? 'active' : ''; ?>
					<span class="step step-<?php echo esc_attr( $j . ' ' . $active ); ?>"></span>
				<?php } ?>
			</div>
			<figure class="thb-average" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
				<div class="thb-counter">
					<div class="counter" data-count="<?php echo esc_attr( $score ); ?>" data-speed="1000">0</div>
					<div class="thb-review-state"><?php echo esc_html( $text['state'] ); ?></div>
				</div>
				<span itemprop="ratingValue" class="hide"><?php echo esc_attr( $score ); ?></span>
				<span itemprop="bestRating" class="hide">100</span>
			</figure>
		</div>
		<?php } ?>
		<span class="hide" itemprop="author" itemscope itemtype="http://schema.org/Person">
			<?php $post_author_id = get_post_field( 'post_author', $thb_id ); ?>
		<span itemprop="name"><?php the_author_meta( 'display_name', $post_author_id ); ?></span>
		</span>
	</div>
	<?php
}
add_action( 'thb_post_review', 'thb_post_review' );
