<?php function thb_videos( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_videos', $atts );
	extract( $atts );

	$source       .= '|offset:' . $offset;
	$source       .= '|post_format:post-format-video';
	$source_data   = VcLoopSettings::parseData( $source );
	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$video_posts   = $query_builder->build();
	$video_posts   = $video_posts[1];

	ob_start();
	if ( $video_posts->have_posts() ) { ?>
		<div class="thb-video-playlist" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_ajax_parse_embed' ) ); ?>">
			<?php
			$i = 1;
			while ( $video_posts->have_posts() ) :
				$video_posts->the_post();
				?>
				<?php if ( $i == 1 ) { ?>
					<div class="thb-video-holder">
						<div class="thb-video-element">
							<div class="flex-video widescreen">
									<?php
									$embed  = get_post_meta( get_the_ID(), 'post_video', true );
									$oembed = wp_oembed_get( $embed );

									echo apply_filters( 'embed_oembed_html', $oembed, $embed, false, false );
									?>
							</div>
						</div>
						<?php thb_preloader(); ?>
					</div>
				<?php } ?>
							<?php if ( $i == 1 ) { ?>
			<div class="thb-play-list-holder">
			<div class="custom_scroll dark-scroll">
		<?php } ?>
							<?php if ( $i >= 1 ) { ?>
								<?php get_template_part( 'inc/templates/post-styles/thumbnail/style6' ); ?>
		<?php } ?>
							<?php if ( $i == $video_posts->post_count ) { ?>
			</div>
			</div>
		<?php } ?>
						<?php
						$i++;
endwhile; // end of the loop.
			?>
		</div>
		<?php
	}
	wp_reset_postdata();
	$out = ob_get_clean();

	return $out;
}
thb_add_short( 'thb_videos', 'thb_videos' );
