<?php
// thb Authors
class thb_widget_authors extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_authors',
			'description' => esc_html__( 'Display Your Authors', 'theissue' ),
		);

		parent::__construct(
			'thb_authors_widget',
			esc_html__( 'The Issue - Authors', 'theissue' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'   => '',
			'authors' => array(),
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

		if ( $params['authors'] ) {

			foreach ( $params['authors'] as $id ) {
				?>
				<div class="thb-widget-author">
					<figure>
						<?php echo get_avatar( $id, '140', '', '', array( 'class' => 'lazyload' ) ); ?>
					</figure>
					<div class="thb-widget-author-description">
						<a href="<?php echo get_author_posts_url( $id ); ?>" rel="author"><?php the_author_meta( 'display_name', $id ); ?></a>
						<p><?php the_author_meta( 'description', $id ); ?></p>
					</div>
				</div>
				<?php
			}
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

			<!-- Authors-->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'authors' ) ); ?>"><?php esc_html_e( 'Authors', 'theissue' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'authors' ) ); ?>[]" id="<?php echo esc_attr( $this->get_field_id( 'authors' ) ); ?>" class="widefat" style="height: auto !important;" multiple="multiple" size="8">
					<?php
						$authors = get_users(
							array(
								'role__not_in' => array( '1', '2' ),
							)
						);
					if ( $authors ) {
						foreach ( $authors as $author ) {
							?>
								<option value="<?php echo esc_attr( $author->ID ); ?>" <?php selected( true, in_array( $author->ID, $params['authors'] ) ); ?>><?php echo esc_html( $author->data->display_name ); ?></option>
								<?php
						}
					}
					?>
				</select>
			</p>
		<?php
	}
}
