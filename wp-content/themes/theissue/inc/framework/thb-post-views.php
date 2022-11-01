<?php
// Get Page View Count
function thb_post_viewcount( $id ) {
	if ( function_exists( 'stats_get_from_restapi' ) ) {
		$id    = $id ? $id : get_the_ID();
		$args  = 'days=-1&post_id=' . $id;
		$cache = 'thb_postviews_count_' . $id;
		$count = get_transient( $cache );

		if ( false === $count ) {
			$stats = stats_get_from_restapi( array(), 'views/posts/?post_ids=' . $id );
			set_transient( $cache, $stats, 300 );
		}

		if ( null !== $stats['posts'][0]['views'] ) {
			echo esc_html( thb_number_abbreviation( esc_attr( $stats['posts'][0]['views'] ) ) );
		} else {
			echo '0';
		}
	} else {
		return null;
	}
}
add_action( 'thb_post_viewcount', 'thb_post_viewcount', 10, 1 );

// Most Viewedi
function thb_most_viewed( $time = 2, $num_posts = 5 ) {
	if ( function_exists( 'stats_get_from_restapi' ) ) {
		$cache = 'thb_most_viewed_' . $time;
		$stats = get_transient( $cache );

		if ( false === $stats ) {
			$stats = stats_get_from_restapi( array(), 'top-posts?max=' . absint( $num_posts + 30 ) . '&summarize=1&num=' . absint( $time ) );

			if ( ! empty( $stats->summary ) & ! empty( $stats->summary->postviews ) ) {
				foreach ( $stats->summary->postviews as $key ) {
					if ( 'page' !== $key->type && 'homepage' !== $key->type ) {
						$posts[] = $key->id;
						if ( count( $posts ) === $num_posts ) {
							break;
						}
					}
				}
				$stats = $posts;
				set_transient( $cache, $stats, 600 );
			}
		}
		if ( ! empty( $stats ) ) {
			return $stats;
		}
		return null;
	} else {
		return null;
	}
}
