<?php
	$pagination = thb_get_archive_pagination_style();
	$preloader  = 'style3' === $pagination ? true : false;
?>
<div class="row">
	<div class="small-12 columns">
	<div class="row thb-masonry archive-pagination-container" data-pagination-style="<?php echo esc_attr( $pagination ); ?>">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
		<div class="small-12 medium-4 columns">
				<?php get_template_part( 'inc/templates/post-styles/masonry/masonry-style2' ); ?>
		</div>
					<?php
		endwhile;
endif;
		?>
	</div>
	<?php thb_pagination( $preloader ); ?>
	</div>
</div>
