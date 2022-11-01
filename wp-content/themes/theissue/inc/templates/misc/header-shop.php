<div class="row">
	<div class="small-12 columns">
	<div class="archive-title search-title <?php if ( is_shop() ) {
		?>shop-title<?php } ?>">
		<div class="row align-center">
		<div class="small-12 medium-8 large-5 columns">
			<?php if ( ! is_shop() ) { ?>
			<h1><?php woocommerce_page_title(); ?></h1>
				<?php
					/**
					 * Woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
				?>
			<?php } ?>
		</div>
		</div>
	</div>
	</div>
</div>
