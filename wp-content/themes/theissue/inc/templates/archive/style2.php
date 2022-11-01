<?php
	$pagination = thb_get_archive_pagination_style();
	$preloader  = 'style3' === $pagination ? true : false;
	set_query_var( 'thb_excerpt', true );
?>
<div class="row">
	<div class="small-12 medium-8 columns">
	<div class="archive-pagination-container" data-pagination-style="<?php echo esc_attr( $pagination ); ?>">
		<div class="row">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
			<div class="small-12 medium-6 columns">
				<?php get_template_part( 'inc/templates/post-styles/style1' ); ?>
			</div>
					<?php
		endwhile;
endif;
		?>
		</div>
	</div>
	<?php thb_pagination( $preloader ); ?>
	</div>
	<div class="small-12 medium-4 columns sidebar">
	<?php do_action( 'thb_archive_sidebar' ); ?>
	</div>
</div>
