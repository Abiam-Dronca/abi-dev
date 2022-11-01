<?php
// thb Social Links
class thb_widget_social_link extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_social_links',
			'description' => esc_html__( 'Display Your Social Links', 'theissue' ),
		);

		parent::__construct(
			'thb_social_links_widget',
			esc_html__( 'The Issue - Social Links', 'theissue' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'  => '',
			'layout' => 'thb-social-vertical',
			'style'  => 'icons-mono',
			'counts' => false,
		);
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		// Before Widget.
		echo $args['before_widget'];

		// Title.
		if ( $params['title'] ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $params['title'], $instance, $this->id_base ) . $args['after_title'] );
		}

		thb_get_social_list( true, $params['counts'], $params['layout'], $params['style'] );

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
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" class="widefat">
					<option value="thb-social-horizontal" <?php selected( $params['layout'], 'thb-social-horizontal' ); ?>><?php esc_html_e( 'Horizontal', 'theissue' ); ?></option>
					<option value="thb-social-vertical" <?php selected( $params['layout'], 'thb-social-vertical' ); ?>><?php esc_html_e( 'Vertical', 'theissue' ); ?></option>
				</select>
			</p>

			<!-- Style -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Style', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" class="widefat">
					<option value="mono-icons" <?php selected( $params['style'], 'mono-icons' ); ?>><?php esc_html_e( 'Icons Black', 'theissue' ); ?></option>
					<option value="color-icons" <?php selected( $params['style'], 'color-icons' ); ?>><?php esc_html_e( 'Icons Color', 'theissue' ); ?></option>
					<option value="border-mono" <?php selected( $params['style'], 'border-mono' ); ?>><?php esc_html_e( 'Icons Black with Border', 'theissue' ); ?></option>
					<option value="border-color" <?php selected( $params['style'], 'border-color' ); ?>><?php esc_html_e( 'Icons Color with Border', 'theissue' ); ?></option>
					<option value="fill-color" <?php selected( $params['style'], 'fill-color' ); ?>><?php esc_html_e( 'Color Background', 'theissue' ); ?></option>
					<option value="circle-mono" <?php selected( $params['style'], 'circle-mono' ); ?>><?php esc_html_e( 'Icons Black within Circle', 'theissue' ); ?></option>
					<option value="circle-color" <?php selected( $params['style'], 'circle-color' ); ?>><?php esc_html_e( 'Icons Color within Circle', 'theissue' ); ?></option>
					<option value="circle-fill" <?php selected( $params['style'], 'circle-fill' ); ?>><?php esc_html_e( 'Icons within Circle Color', 'theissue' ); ?></option>
				</select>
			</p>

			<!-- Counters -->
			<p>
				<input id="<?php echo esc_attr( $this->get_field_id( 'counts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counts' ) ); ?>" type="checkbox" <?php checked( $params['counts'], '1' ); ?> value="1" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'counts' ) ); ?>"><?php esc_html_e( 'Counts', 'theissue' ); ?></label>
			</p>

		<?php
	}
}
