<?php

// make sure it doesn't take to the wizard page again
update_option( 'image-sizes_setup_done', 1 );

$user = wp_get_current_user();
$user_name = $user->display_name;
echo '
<div class="step-one">
	<h1 class="cx-welcome">' . sprintf( __( 'Hello %s! 🎉', 'image-sizes' ), esc_html( $user_name ) ) .'</h1>
	<p class="cx-wizard-sub">' . __( 'Thank you for choosing our plugin!', 'image-sizes' ) . '</p>
	<p class="cx-wizard-sub">' . __( 'You can easily save up your space and make your website faster with', 'image-sizes' ) . '
		<span class="cx-wizard-sub-span">' . __( 'Stop Generating Unnecessary Thumbnails.', 'image-sizes' ) . '</span>
	</p>
	<p class="cx-wizard-sub">' . __( 'This quick installation wizard will let you do it in three steps and less than 30 seconds!', 'image-sizes' ) . '
	</p>
</div>';