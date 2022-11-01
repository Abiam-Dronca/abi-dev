<div class="row">
	<div class="small-12 columns">
	<div class="archive-title search-title">
		<div class="row align-center">
		<div class="small-12 medium-8 large-5 columns">
		<h1><?php
		if ( is_category() ) {
			echo single_cat_title( '', false );
		} elseif ( is_tag() ) {
			echo single_tag_title( '', false );
		}
		?></h1>
		<?php
		if ( get_the_archive_description() ) {
			the_archive_description(); }
		?>
		<?php
		if ( is_category() ) {
			$the_category = get_queried_object();
			$terms        = get_terms(
				array(
					'taxonomy'   => 'category',
					'hide_empty' => false,
					'child_of'   => $the_category->term_id,
				)
			);
			if ( $terms ) {
				?>
			<div class="archive-sub-categories">
				<?php
				foreach ( $terms as $thb_term ) {
					?>
				<a href="<?php echo esc_url( get_term_link( $thb_term->term_id ) ); ?>" class="tag-cloud-link">
					<?php echo esc_html( $thb_term->name ); ?>
				</a>
				<?php } ?>
			</div>
				<?php
			}
		}
		?>
		</div>
		</div>
	</div>
	</div>
</div>
