<?php
// thb About Widget
class thb_widget_about extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_about',
			'description' => esc_html__( 'Display your information', 'theissue' ),
		);

		parent::__construct(
			'thb_about_widget',
			esc_html__( 'The Issue - About Me', 'theissue' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'       => 'About Me',
			'image'       => '',
			'description' => '',
			'style'       => 'style1',
		);

		add_action( 'admin_enqueue_scripts', array( $this, 'thb_assets' ) );
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		// Before Widget.
		echo $args['before_widget'];

		// Title.
		if ( $params['title'] ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $params['title'], $instance, $this->id_base ) . $args['after_title'] );
		}

		?>
		<div class="thb-about-widget-holder <?php echo esc_attr( $params['style'] ); ?>">
			<?php if ( $params['image'] ) { ?>
				<figure>
					<?php echo wp_get_attachment_image( $params['image'], 'theissue-square-x2' ); ?>
				</figure>
			<?php } ?>
			<div class="thb-about-widget-description">
				<?php
				if ( $params['description'] ) {
					echo wpautop( $params['description'] );
				}
				?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}
	function thb_assets( $hook ) {
		if ( 'widgets.php' != $hook ) {
				return;
		}
		wp_enqueue_media();

		wp_localize_script(
			'thb-admin-meta',
			'ThbImageWidget',
			array(
				'frame_title'  => esc_html__( 'Select an Image', 'theissue' ),
				'button_title' => esc_html__( 'Insert Into Widget', 'theissue' ),
			)
		);
	}
	function update( $new_instance, $old_instance ) {
		$instance = $new_instance;

		return $instance;
	}
	// Settings form
	function form( $instance ) {
		$params = array_merge( $this->defaults, $instance );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title:', 'theissue' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $params['title'] ); ?>" class="widefat" />
		</p>
		<!-- Style -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Style', 'theissue' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" class="widefat">
				<option value="style1" <?php selected( $params['style'], 'style1' ); ?>><?php esc_html_e( 'Style - 1', 'theissue' ); ?></option>
				<option value="style2" <?php selected( $params['style'], 'style2' ); ?>><?php esc_html_e( 'Style - 2', 'theissue' ); ?></option>
			</select>
		</p>
		<div class="thb-widget-image-holder">
			<?php
			if ( $params['image'] ) {
				echo wp_get_attachment_image( $params['image'], 'theissue-square-x2' ); }
			?>
		</div>
		<p>
			<input name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" class="widefat" type="hidden" value="<?php echo esc_attr( $params['image'] ); ?>" />
			<input class="thb-upload-image button" type="button" value="<?php esc_attr_e( 'Upload Image', 'theissue' ); ?>" onclick="ThbImage.uploader( '<?php echo esc_attr( $this->id ); ?>', '<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>', '' ); return false;" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Short Description:', 'theissue' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" class="widefat" rows="5"><?php echo esc_textarea( $params['description'] ); ?></textarea>
		</p>
		<?php
	}
}
