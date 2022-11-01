<?php function thb_twitter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_twitter', $atts );
	extract( $atts );
	ob_start();

	$username = $username !== '' ? $username : 'fuel_themes';

	$tweets = thb_gettweets( $count, $username );

	$classes[] = 'thb_twitter_container';
	$classes[] = $style;

	if ( $style == 'style2' ) {
		$classes[] = 'thb-carousel text-center';
	}
	$tweets = thb_gettweets( $count, $username );
	if ( array_key_exists( 'errors', $tweets ) ) {
		echo esc_html( $tweets['errors'][0]['message'] );
		return;
	}
	$twitter_data = thb_twitter_data( $tweets );
	?>
		<aside class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" data-pagination="true" data-columns="1">
		<?php foreach ( $twitter_data['tweets'] as $tweet ) { ?>
			<div class="thb_tweet">
				<p><?php echo wp_kses_post( $tweet['text'] ); ?></p>
				<a href="<?php echo esc_url( $tweet['url'] ); ?>" class="thb_tweet_time" target="_blank"><?php echo wp_kses_post( $tweet['time'] ); ?></a>
			</div>
		<?php } ?>
		<?php if ( $style == 'style1' ) { ?>
			<div class="thb_follow_us">
				<a href="https://twitter.com/<?php echo esc_attr( $username ); ?>" target="_blank"><i class="fa fa-twitter"></i> <?php esc_html_e( 'Follow us on Twitter', 'theissue' ); ?></a>
			</div>
		<?php } ?>
	</aside>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_twitter', 'thb_twitter' );
