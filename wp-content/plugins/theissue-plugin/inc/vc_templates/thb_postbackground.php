<?php function thb_postbackground( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_postbackground', $atts );
	extract( $atts );

	if ( $offset ) {
		$source .= '|offset:' . $offset;
	}
	$source_data = VcLoopSettings::parseData( $source );

	switch ( $style ) {
		case 'style1':
			$source_data['size'] = 1;
			break;
		case 'style2':
			$source_data['size'] = 4;
			break;
		case 'style3':
			$source_data['size'] = $columns ? intval( $columns ) : 4;
			break;
		case 'style4':
			$source_data['size'] = 4;
			break;
	}

	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$bg_posts      = $query_builder->build();
	$bg_posts      = $bg_posts[1];

	$classes[] = 'thb-post-background';
	$classes[] = 'thb-post-background-' . $style;

	ob_start();

	if ( $bg_posts->have_posts() ) { ?>
		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php if ( $style == 'style3' ) { ?>
				<div class="post-gallery post-background-gallery">
					<?php
					while ( $bg_posts->have_posts() ) :
						$bg_posts->the_post();
						?>
						<?php the_post_thumbnail( 'theissue-full-x2' ); ?>
					<?php endwhile; ?>
				</div>
				<div class="thb-carousel row max_width overflow-visible-only thb-background-hover" data-columns="<?php echo esc_attr( $columns ); ?>" data-infinite="false">
					<?php
					while ( $bg_posts->have_posts() ) :
						$bg_posts->the_post();
						?>
						<div class="columns">
							<div <?php post_class( 'post style12 featured-style featured-overflow' ); ?>>
								<div class="post-inner-content">
									<div class="post-overflow-content">
										<?php do_action( 'thb_categories' ); ?>
										<?php do_action( 'thb_displayTitle', 'h5' ); ?>
										<a href="<?php the_permalink(); ?>" class="featured-read-more"><?php esc_html_e( 'Read More', 'theissue' ); ?></a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php } elseif ( in_array( $style, array( 'style1', 'style2' ) ) ) { ?>
				<?php $row_class = $style == 'style1' ? 'align-center' : 'align-justify'; ?>
				<div class="row <?php echo esc_attr( $row_class ); ?> max_width">

					<?php
					$i = 1;
					while ( $bg_posts->have_posts() ) :
						$bg_posts->the_post();
						?>
						<?php if ( $i == 1 ) { ?>
							<div <?php post_class( 'post featured-style' ); ?>>
								<?php
									$id        = get_the_ID();
									$video_url = 'video' === get_post_format() ? get_post_meta( $id, 'post_video', true ) : false;
								?>
								<figure class="post-gallery thb-parallax" data-video="<?php echo esc_attr( $video_url ); ?>">
									<?php the_post_thumbnail( 'theissue-full-x2' ); ?>
								</figure>
							</div>
							<div class="small-12 medium-6 align-self-middle columns">
								<div class="post background-style center-contents white-post-content">
									<div class="post-inner-content">
										<?php do_action( 'thb_categories' ); ?>
										<?php do_action( 'thb_displayTitle', 'h2' ); ?>
										<a href="<?php the_permalink(); ?>" class="btn style1 pill-radius white"><?php esc_html_e( 'Read More', 'theissue' ); ?></a>
									</div>
								</div>
							</div>
						<?php } ?>
											<?php if ( $style == 'style2' ) { ?>
												<?php if ( $i == 2 ) { ?>
								<div class="small-12 medium-5 columns">
							<?php } ?>
												<?php if ( $i >= 2 ) { ?>
													<?php get_template_part( 'inc/templates/post-styles/thumbnail/style1' ); ?>
							<?php } ?>
												<?php if ( $i == $bg_posts->post_count ) { ?>
								</div>
							<?php } ?>
						<?php } ?>
										<?php
										$i++;
endwhile;
					?>
				</div>
			<?php } elseif ( $style == 'style4' ) { ?>
				<div class="row align-justify max_width">

					<?php
					$i = 1;
					while ( $bg_posts->have_posts() ) :
						$bg_posts->the_post();
						?>
						<?php if ( $i == 1 ) { ?>
							<div <?php post_class( 'post featured-style' ); ?>>
								<?php
									$id        = get_the_ID();
									$video_url = 'video' === get_post_format() ? get_post_meta( $id, 'post_video', true ) : false;
								?>
								<figure class="post-gallery thb-parallax" data-video="<?php echo esc_attr( $video_url ); ?>">
									<?php the_post_thumbnail( 'theissue-full-x2' ); ?>
								</figure>
							</div>
							<div class="small-12 medium-6 align-self-middle columns">
								<div class="post background-style white-post-content">
									<div class="post-inner-content">
										<?php do_action( 'thb_categories' ); ?>
										<?php do_action( 'thb_displayTitle', 'h1' ); ?>
										<?php do_action( 'thb_post_bottom', true ); ?>
									</div>
								</div>
							</div>
						<?php } ?>
											<?php if ( $i == 2 ) { ?>
							<div class="small-12 medium-5 columns sidebar-column">
						<?php } ?>
											<?php if ( $i >= 2 ) { ?>
												<?php
												set_query_var( 'thb_title_size', 'h5' );
												set_query_var( 'thb_extra_class', 'white-post-content' );
												get_template_part( 'inc/templates/post-styles/thumbnail/style10' );
												?>
						<?php } ?>
											<?php if ( $i == $bg_posts->post_count ) { ?>
							</div>
						<?php } ?>
										<?php
										$i++;
endwhile;
					?>
				</div>
			<?php } ?>
		</div>
		<?php
	}
	set_query_var( 'thb_extra_class', false );
	set_query_var( 'thb_title_size', false );
	$out = ob_get_clean();

	wp_reset_query();
	wp_reset_postdata();

	return $out;
}
thb_add_short( 'thb_postbackground', 'thb_postbackground' );
