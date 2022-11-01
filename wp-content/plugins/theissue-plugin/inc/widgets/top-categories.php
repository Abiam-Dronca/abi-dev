<?php
// thb Top Categories
class thb_top_categories extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_top_categories',
			'description' => esc_html__( 'Display Your Top Categories', 'theissue' ),
		);

		parent::__construct(
			'thb_top_categories_widget',
			esc_html__( 'The Issue - Top Categories', 'theissue' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'    => '',
			'category' => false,
		);
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		$categories = get_terms(
			array(
				'taxonomy'   => 'category',
				'hide_empty' => false,
				'orderby'    => 'count',
				'order'      => 'DESC',
				'include'    => $params['category'],
			)
		);

		// Before Widget.
		echo $args['before_widget'];

		// Title.
		if ( $params['title'] ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $params['title'], $instance, $this->id_base ) . $args['after_title'] );
		}

		foreach ( $categories as $cat ) {
			$thumb_id = get_term_meta( $cat->term_id, 'thb_cat_header_id', true );
			?>
			<a href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>" class="thb-widget-category-link">
				<?php echo wp_get_attachment_image( $thumb_id, 'theissue-rectangle-x2' ); ?>
				<div class="thb-widget-category-name">
					<span><?php echo esc_html( $cat->name ); ?></span>
					<span class="thb-widget-category-count"><?php echo esc_html( $cat->count ); ?></span>
				</div>
			</a>
			<?php
		}

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

			<!-- Category -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Categories', 'theissue' ); ?></label>
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
