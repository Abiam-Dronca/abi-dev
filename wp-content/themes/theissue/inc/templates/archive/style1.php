<?php
	$pagination = thb_get_archive_pagination_style();
	$preloader  = 'style3' === $pagination ? true : false;
?>
<div class="row">
	<div class="small-12 medium-8 columns">
	<div class="archive-pagination-container" data-pagination-style="<?php echo esc_attr( $pagination ); ?>">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<?php get_template_part( 'inc/templates/post-styles/style3' ); ?>
					<?php
		endwhile;
endif;
		?>
	</div>
	<?php thb_pagination( $preloader ); ?>
	</div>
	<div class="small-12 medium-4 columns sidebar">
	<?php do_action( 'thb_archive_sidebar' ); ?>
	</div>
</div>
