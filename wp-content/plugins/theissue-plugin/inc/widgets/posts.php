<?php
// thb Posts
class thb_posts extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_posts',
			'description' => esc_html__( 'Display Your Posts', 'theissue' ),
		);

		parent::__construct(
			'thb_posts_widget',
			esc_html__( 'The Issue - Posts', 'theissue' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'           => '',
			'layout'          => 'thumbnail',
			'thumbnail_style' => 'style1',
			'counts'          => false,
			'posts_per_page'  => 5,
			'orderby'         => 'date',
			'order'           => 'desc',
			'time_frame'      => '',
			'trending_date'   => 365,
			'category'        => false,
		);
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		$query_args = array(
			'posts_per_page'      => $params['posts_per_page'],
			'order'               => $params['order'],
			'no_found_rows'       => true,
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		);

		// Category
		if ( $params['category'] ) {
			$query_args['cat'] = $params['category'];
		}

		// Post order.
		if ( 'shares' === $params['orderby'] ) {
			$query_args['orderby']  = 'meta_value_num';
			$query_args['meta_key'] = 'thb_all_counts';
		} elseif ( 'comments' === $params['orderby'] ) {
			$query_args['orderby'] = 'comment_count';
		} elseif ( 'views' === $params['orderby'] ) {
			if ( function_exists( 'thb_most_viewed' ) && function_exists( 'stats_get_from_restapi' ) ) {
				$posts__in = thb_most_viewed( $params['trending_date'], $params['posts_per_page'] );
				if ( ! is_wp_error( $posts__in ) ) {
					$query_args['post__in'] = $posts__in;
					$query_args['orderby']  = 'post__in';
				}
			}
		} elseif ( 'rand' === $params['orderby'] ) {
			$query_args['orderby'] = 'rand';
		}

		// Time Frame
		if ( $params['time_frame'] && 'views' !== $params['orderby'] ) {
			$query_args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'after'  => $params['time_frame'] . ' ago',
				),
			);
		}
		// Before Widget.
		echo $args['before_widget'];

		// Title.
		if ( $params['title'] ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $params['title'], $instance, $this->id_base ) . $args['after_title'] );
		}

		$widget_posts = new WP_Query( $query_args );

		if ( $params['layout'] === 'slider' ) {
			?>
			<div class="thb-carousel equal-height-carousel" data-columns="1" data-pagination="true" data-infinite="false">
			<?php
			while ( $widget_posts->have_posts() ) :
				$widget_posts->the_post();
				get_template_part( 'inc/templates/post-styles/misc/widget-slider' );
			endwhile;
			?>
			</div>
			<?php
		} elseif ( $params['layout'] === 'thumbnail' ) {
			$i = 1;
			while ( $widget_posts->have_posts() ) :
				$widget_posts->the_post();
				if ( $params['counts'] ) {
					set_query_var( 'thb_i', $i );
				}
				if ( $params['thumbnail_style'] === 'style1' ) {
					get_template_part( 'inc/templates/post-styles/thumbnail/style4' );
				} elseif ( $params['thumbnail_style'] === 'style2' ) {
					get_template_part( 'inc/templates/post-styles/thumbnail/style8' );
				} elseif ( $params['thumbnail_style'] === 'style3' ) {
					if ( $i == 1 ) {
						$classes[] = 'widget-video';
						$classes[] = 'widget-video-style2';
						?>
						<div <?php post_class( $classes ); ?>>
							<div class="post-gallery">
								<a href="<?php the_permalink(); ?>">
									<?php do_action( 'thb_post_icon' ); ?>
									<?php the_post_thumbnail( 'theissue-squaresmall-x2' ); ?>
								</a>
								<?php do_action( 'thb_displayTitle', 'h6' ); ?>
							</div>
						</div>
						<?php
					} else {
						get_template_part( 'inc/templates/post-styles/thumbnail/style9' );
					}
				}
				$i++;
			endwhile;
			set_query_var( 'thb_i', false );
		} elseif ( $params['layout'] === 'large' ) {
			while ( $widget_posts->have_posts() ) :
				$widget_posts->the_post();
				get_template_part( 'inc/templates/post-styles/misc/widget-large' );
			endwhile;
		}

		wp_reset_postdata();
		echo $args['after_widget'];
	}
	function update( $new_instance, $old_instance ) {
		$instance = $new_instance;

		return $instance;
	}
	function form( $instance ) {
		$params = array_merge( $this->defaults, $instance );
		?>
			<!-- Title -->
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'theissue' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $params['title'] ); ?>" /></p>

			<!-- Layout -->
			<p class="thb_widget_layout_row">
				<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" class="widefat">
					<option value="thumbnail" <?php selected( $params['layout'], 'thumbnail' ); ?>><?php esc_html_e( 'Thumbnail', 'theissue' ); ?></option>
					<option value="large" <?php selected( $params['layout'], 'large' ); ?>><?php esc_html_e( 'Large', 'theissue' ); ?></option>
					<option value="slider" <?php selected( $params['layout'], 'slider' ); ?>><?php esc_html_e( 'Slider', 'theissue' ); ?></option>
				</select>
			</p>

			<!-- Thumbnail Style -->
			<p class="thb_thumbnail_style_row">
				<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail_style' ) ); ?>"><?php esc_html_e( 'Thumbnail Style', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'thumbnail_style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'thumbnail_style' ) ); ?>" class="widefat">
					<option value="style1" <?php selected( $params['thumbnail_style'], 'style1' ); ?>><?php esc_html_e( 'Style - 1', 'theissue' ); ?></option>
					<option value="style2" <?php selected( $params['thumbnail_style'], 'style2' ); ?>><?php esc_html_e( 'Style - 2', 'theissue' ); ?></option>
					<option value="style3" <?php selected( $params['thumbnail_style'], 'style3' ); ?>><?php esc_html_e( 'Style - 3', 'theissue' ); ?></option>
				</select>
			</p>

			<!-- Counters -->
			<p class="thb_thumbnail_counter_row">
				<input id="<?php echo esc_attr( $this->get_field_id( 'counts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counts' ) ); ?>" type="checkbox" <?php checked( $params['counts'], '1' ); ?> value="1" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'counts' ) ); ?>"><?php esc_html_e( 'Display Counts?', 'theissue' ); ?></label>
			</p>

			<!-- Number of Posts -->
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"><?php esc_html_e( 'Number of Posts', 'theissue' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_per_page' ) ); ?>" type="number" value="<?php echo esc_attr( $params['posts_per_page'] ); ?>" /></p>

			<!-- Order by -->
			<p class="thb_orderby_row">
				<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order by', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat">
					<option value="date" <?php selected( $params['orderby'], 'date' ); ?>><?php esc_html_e( 'Date', 'theissue' ); ?></option>
					<option value="shares" <?php selected( $params['orderby'], 'shares' ); ?>><?php esc_html_e( 'Shares', 'theissue' ); ?></option>
					<option value="views" <?php selected( $params['orderby'], 'views' ); ?>><?php esc_html_e( 'Views', 'theissue' ); ?></option>
					<option value="comment_count" <?php selected( $params['orderby'], 'comment_count' ); ?>><?php esc_html_e( 'Comments', 'theissue' ); ?></option>
					<option value="rand" <?php selected( $params['orderby'], 'rand' ); ?>><?php esc_html_e( 'Random', 'theissue' ); ?></option>
				</select>
			</p>

			<!-- Order -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Order', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" class="widefat">
					<option value="desc" <?php selected( $params['order'], 'desc' ); ?>><?php esc_html_e( 'Descending', 'theissue' ); ?></option>
					<option value="asc" <?php selected( $params['order'], 'asc' ); ?>><?php esc_html_e( 'Ascending', 'theissue' ); ?></option>
				</select>
			</p>

			<!-- Time Frame -->
			<p class="thb_timeframe_row"><label for="<?php echo esc_attr( $this->get_field_id( 'time_frame' ) ); ?>"><?php esc_html_e( 'Time Frame', 'theissue' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'time_frame' ) ); ?>" placeholder="<?php esc_html_e( '6 months', 'theissue' ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'time_frame' ) ); ?>" type="text" value="<?php echo esc_attr( $params['time_frame'] ); ?>" /></p>

			<!-- Trending -->
			<p class="thb_trending_row"><label for="<?php echo esc_attr( $this->get_field_id( 'trending_date' ) ); ?>"><?php esc_html_e( 'Date filter', 'theissue' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'trending_date' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'trending_date' ) ); ?>" class="widefat">
				<option value="365"<?php selected( $params['trending_date'], '365' ); ?>><?php esc_html_e( 'All time', 'theissue' ); ?></option>
				<option value="1"<?php selected( $params['trending_date'], '1' ); ?>><?php esc_html_e( 'Last 24 hours', 'theissue' ); ?></option>
				<option value="7"<?php selected( $params['trending_date'], '7' ); ?>><?php esc_html_e( 'Last 7 days', 'theissue' ); ?></option>
				<option value="30"<?php selected( $params['trending_date'], '30' ); ?>><?php esc_html_e( 'Last month', 'theissue' ); ?></option>
			</select></p>

			<!-- Category -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" class="widefat" style="height: auto !important;" multiple="multiple" size="8">
					<?php
						$cat_args = array(
							'hide_empty'   => 0,
							'hierarchical' => 1,
							'selected'     => (array) $params['category'],
							'walker'       => new THB_Posts_Categories_Tree_Walker(),
						);

						$allowed_html = array(
							'option' => array(
								'class'    => true,
								'value'    => true,
								'selected' => true,
							),
						);

						echo wp_kses( walk_category_dropdown_tree( get_categories( $cat_args ), 0, $cat_args ), $allowed_html );
						?>
				</select>
			</p>
		<?php
	}
}
