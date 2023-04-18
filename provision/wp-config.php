<?php
$env = getenv( 'ENV' ) ? getenv( 'ENV'  ) : 'dev';


define( 'WP_ENV', $env );
if ( file_exists( dirname( __FILE__ ) . '/wp-config-' . $env . '.php' ) )
	require_once( dirname( __FILE__ ) . '/wp-config-' . $env . '.php' );
unset($env);

if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'FLUENTMAIL_AWS_ACCESS_KEY_ID', '782f810f-0432-411d-94bd-d002b6c8a0ec' );
define( 'FLUENTMAIL_AWS_SECRET_ACCESS_KEY', '4CR8Q~LL00U127fN32K_1K9XDQWXhULvg3Ox6cPn' );

