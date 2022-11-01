<?php
// thb Sticky Separator
class thb_widget_sticky_separator extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_sticky_separator',
			'description' => esc_html__( 'Widgets below this widget will be stickied to the sidebar. Please add only 1 Sticky Separator per sidebar.', 'theissue' ),
		);

		parent::__construct(
			'thb_sticky_separator_widget',
			esc_html__( 'The Issue - Sticky Separator', 'theissue' ),
			$widget_ops
		);
	}

	function widget( $args, $instance ) {
		echo '<hr class="thb-sticky-separator thb-fixed">';
	}
	function update( $new_instance, $old_instance ) {
		$instance = $new_instance;

		return $instance;
	}
	function form( $instance ) {
		?>
		<p><?php esc_html_e( 'Widgets below this widget will be stickied to the sidebar. Please add only 1 Sticky Separator per sidebar.', 'theissue' ); ?></p>
		<?php
	}
}
