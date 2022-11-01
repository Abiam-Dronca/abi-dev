<?php
if ( ot_get_option( 'article_reactions', 'on' ) === 'off' ) {
	return;
}
do_action( 'thb_render_reactions' );
