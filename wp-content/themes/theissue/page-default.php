<?php
	/**
	Template Name: Page Builder
	 */

$vc = class_exists( 'WPBakeryVisualComposerAbstract' );
?>
<?php get_header(); ?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
			<?php
			if ( post_password_required() ) {
				get_template_part( 'inc/templates/misc/password-protected' );
			} elseif ( $vc && ! thb_is_woocommerce() ) {
				?>
		<div <?php post_class(); ?>>
				<?php the_content(); ?>
		</div>
		<?php } elseif ( thb_is_woocommerce() ) { ?>
		<div <?php post_class(); ?>>
			<div class="row">
				<div class="small-12 columns">
					<div class="no-vc">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
		<?php
	endwhile;
endif;
?>
<?php
get_footer();
