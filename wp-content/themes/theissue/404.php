<?php
get_header();
$fourofour_page_content = ot_get_option( '404_page_content' );
if ( $fourofour_page_content ) {
	do_action( 'thb_page_content', $fourofour_page_content );
} else {
	?>
	<div class="row">
		<div class="small-12 columns">
			<section class="content404">
				<div class="row align-center">
					<div class="small-12 medium-7 columns">
						<h5><?php esc_html_e( "Sorry, this page doesn't exist", 'theissue' ); ?></h5>
						<p><?php esc_html_e( 'We are sorry. But the page you are looking for cannot be found. You might try searching our site.', 'theissue' ); ?></p>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php
}
get_footer();
