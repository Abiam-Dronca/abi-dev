<div class="row">
	<div class="small-12 columns">
		<div class="search-title">
			<h1>
				<span><?php echo esc_html__( 'Search Results for: ', 'theissue' ); ?></span>
				<strong>"<?php the_search_query(); ?>"</strong>
			</h1>
			<?php if ( 'on' === ot_get_option( 'search_filters', 'on' ) ) { ?>
				<div class="search-fields">
					<div class="row">
						<?php if ( 'on' === ot_get_option( 'search_filter_date', 'on' ) ) { ?>
						<div class="small-12 medium-4 columns">
							<label><?php esc_html_e( 'Date Range', 'theissue' ); ?></label>
							<?php do_action( 'thb_time_filter' ); ?>
						</div>
					<?php } ?>
				<?php if ( 'on' === ot_get_option( 'search_filter_category', 'on' ) ) { ?>
						<div class="small-12 medium-4 columns">
							<label><?php esc_html_e( 'Filter by Category', 'theissue' ); ?></label>
						<?php do_action( 'thb_category_filter' ); ?>
						</div>
					<?php } ?>
					<?php if ( 'on' === ot_get_option( 'search_filter_author', 'on' ) ) { ?>
						<div class="small-12medium-4 columns">
							<label><?php esc_html_e( 'Filter by Author', 'theissue' ); ?></label>
						<?php do_action( 'thb_author_filter' ); ?>
						</div>
					<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
