<?php
	$thb_id         = get_the_ID();
	$display_title  = get_post_meta( $thb_id, 'display_title', true );
	$sidebar        = get_post_meta( $thb_id, 'sidebar', true ) ? get_post_meta( $thb_id, 'sidebar', true ) : 'off';
	$custom_sidebar = get_post_meta( $thb_id, 'custom_sidebar', true ) ? get_post_meta( $thb_id, 'custom_sidebar', true ) : 'off';
?>
<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ( post_password_required() ) {
			get_template_part( 'inc/templates/misc/password-protected' );
		} elseif ( thb_is_woocommerce() ) { ?>
			<div <?php post_class(); ?>>
				<div class="row">
					<div class="small-12 columns">
						<div class="no-vc">
							<?php the_content();?>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="non-VC-page">
				<div <?php post_class(); ?>>
					<div class="row">
						<?php if ( $display_title !== 'off' ) { ?>
							<div class="small-12 columns text-center">
								<div class="page-title">
									<h1><?php the_title(); ?></h1>
								</div>
							</div>
						<?php } ?>
						<div class="small-12<?php if ($sidebar === 'on' ) { ?> medium-9 sidebar-content<?php }?> columns">
							<div class="no-vc">
								<?php the_content();?>
								<?php wp_link_pages(); ?>
							</div>
						</div>
						<?php if ($sidebar === 'on' ) { ?>
							<div class="small-12 medium-3 columns sidebar">
								<?php
								if ( $custom_sidebar === 'on' ) {
									$custom_sidebar_id = get_post_meta( $thb_id, 'custom_sidebar_id', true );
									dynamic_sidebar($custom_sidebar_id);
								} else {
									dynamic_sidebar('page');
								} ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php if ( comments_open() || get_comments_number() ) : ?>
				<!-- Start #comments -->
				<?php comments_template('', true ); ?>
				<!-- End #comments -->
				<?php endif; ?>
			</div>
		<?php } ?>
	<?php endwhile; endif; ?>

<?php get_footer();
