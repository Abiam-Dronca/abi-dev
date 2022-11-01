<?php
// Subscribe
class thb_widget_subscribe extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'thb_widget_subscribe',
			'description' => esc_html__( 'Display a Subscribe Box', 'theissue' ),
		);

		parent::__construct(
			'thb_subscribe_widget',
			esc_html__( 'The Issue - Subscribe', 'theissue' ),
			$widget_ops
		);

		$this->defaults = array(
			'title'       => '',
			'description' => '',
		);
	}

	function widget( $args, $instance ) {
		$params = array_merge( $this->defaults, $instance );

		// Before Widget.
		echo $args['before_widget'];

		?>
		<aside class="thb-newsletter-form">
			<?php
			if ( $params['title'] ) {
				?>
				<h4><?php echo esc_html( $params['title'] ); ?></h4><?php } ?>
			<?php
			if ( $params['description'] ) {
				?>
				<?php echo wp_kses_post( wpautop( $params['description'] ) ); ?><?php } ?>
			<?php if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) { ?>
				<p class="thb-newsletter-warning-text">
					<?php esc_html_e( 'This Newsletter text can be edited within Widget Settings.', 'theissue' ); ?>
				</p>
			<?php } ?>
			<form class="newsletter-form" action="#" method="post" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_subscription' ) ); ?>">
				<input placeholder="<?php esc_attr_e( 'Your E-Mail', 'theissue' ); ?>" type="text" name="widget_subscribe" class="widget_subscribe">
				<button type="submit" name="submit" class="btn black"><?php esc_html_e( 'SIGN UP', 'theissue' ); ?></button>
				<?php do_action( 'thb_after_newsletter_submit' ); ?>
			</form>
			<?php do_action( 'thb_after_newsletter_form' ); ?>
		</aside>
		<?php
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

			<!-- Content -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Short Description:', 'theissue' ); ?></label>
				<textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" class="widefat" rows="5"><?php echo esc_textarea( $params['description'] ); ?></textarea>
			</p>
		<?php
	}
}
