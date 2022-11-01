<?php

// Register custom queries.
function thb_add_search_var( $public_query_vars ) {
	$public_query_vars[] = 'category';
	$public_query_vars[] = 'author';
	$public_query_vars[] = 'time';
	return $public_query_vars;
}
add_filter( 'query_vars', 'thb_add_search_var' );


function thb_search_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( $query->is_search ) {
			// author
			$author = get_query_var( 'author' );
			if ( $author ) {
				$query->set( 'author', $author );
			}

			// category
			$category = get_query_var( 'category' );
			if ( $category ) {
				$query->set( 'cat', $category );
			}

			// time
			$time = get_query_var( 'time' );
			if ( $time ) {
				switch ( $time ) {
					case 'today':
						$time_query = '1 day ago';
						break;
					case 'yesterday':
						$time_query = '2 day ago';
						break;
					case 'week':
						$time_query = '1 week ago';
						break;
					case 'month':
						$time_query = '1 month ago';
						break;
					case 'year':
						$time_query = '1 year ago';
						break;
				};
				$query->set(
					'date_query',
					array(
						array(
							'after' => $time_query,
						),
					)
				);
			}
		}
	}
}

add_action( 'pre_get_posts', 'thb_search_filter' );

/* Category Filter */
function thb_category_filter() {
	$activevar = get_query_var( 'category' );
	ob_start();
	?>
		<select name="thb_category_filter" class="thb-select2">
			<option value="<?php echo esc_url( remove_query_arg( 'category' ) ); ?>"><?php esc_html_e( 'All Categories', 'theissue' ); ?></option>
			<?php
			$args = array(
				'orderby' => 'name',
				'order'   => 'ASC',
				'parent'  => 0,
			);

			$categories = get_categories( $args );
			foreach ( $categories as $category ) {
				$thelink = add_query_arg( array( 'category' => $category->cat_ID ) );
				?>
				<option value="<?php echo esc_url( $thelink ); ?>" <?php selected( $category->cat_ID, $activevar ); ?>><?php echo esc_html( $category->name ); ?></option>
			<?php } ?>
		</select>
	<?php
	$out = ob_get_clean();
	echo '' . $out;
}
add_action( 'thb_category_filter', 'thb_category_filter', 3 );

/* Author Filter */
function thb_author_filter() {
	$activevar = get_query_var( 'author' );
	ob_start();

	?>
		<select name="thb_author_filter" class="thb-select2">
			<option value="<?php echo esc_url( remove_query_arg( 'author' ) ); ?>"><?php esc_html_e( 'All Authors', 'theissue' ); ?></option>
			<?php
			$args  = array(
				'role__not_in' => array( 'subscriber' ),
			);
			$users = get_users( $args );
			foreach ( $users as $user ) {
				if ( $user ) {
					$thelink = add_query_arg( array( 'author' => $user->ID ) );
					?>
				<option value="<?php echo esc_url( $thelink ); ?>" <?php selected( $user->ID, $activevar ); ?>><?php echo esc_html( $user->display_name ); ?></option>
					<?php
				}
			}
			?>
		</select>
	<?php
	$out = ob_get_clean();
	echo '' . $out;
}
add_action( 'thb_author_filter', 'thb_author_filter', 3 );

/* Time Filter */
function thb_time_filter() {
	$activevar = get_query_var( 'time' );

	$dates = array(
		'today'     => esc_html__( 'Today', 'theissue' ),
		'yesterday' => esc_html__( 'Yesterday', 'theissue' ),
		'week'      => esc_html__( 'This Week', 'theissue' ),
		'month'     => esc_html__( 'This Month', 'theissue' ),
		'year'      => esc_html__( 'This year', 'theissue' ),
	);

	ob_start();
	?>
		<select name="thb_time_filter" class="thb-select2">
			<option value="<?php echo esc_url( remove_query_arg( 'time' ) ); ?>"><?php esc_html_e( 'All Time', 'theissue' ); ?></option>
			<?php
			foreach ( $dates as $key => $value ) {
				$thelink = add_query_arg( array( 'time' => $key ) );
				?>
				<option value="<?php echo esc_url( $thelink ); ?>" <?php selected( $key, $activevar ); ?>><?php echo esc_html( $value ); ?></option>
			<?php } ?>
		</select>
	<?php
	$out = ob_get_clean();
	echo '' . $out;
}
add_action( 'thb_time_filter', 'thb_time_filter', 3 );
