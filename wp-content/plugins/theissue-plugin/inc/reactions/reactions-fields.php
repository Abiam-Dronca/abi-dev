<?php

/**
 * Add Sponsor Custom Fields.
 */
function thb_add_reaction_custom_fields() {
	$folder = theissue_plugin()->get_plugin_path() . 'assets/svg/';
	$svgs   = glob( $folder . '?*.php' );
	?>
	<div class="form-field">
		<label class="thb-main-label" for="tag-icon"><?php esc_html_e( 'Reaction Icon:', 'theissue' ); ?></label>
		<div class="term-icon-wrap">
			<?php
			foreach ( $svgs as $svg ) {
				$value = rtrim( basename( $svg ), '.php' );
				?>
				<label class="thb-icon-wrap" for="thb-icon-<?php echo esc_attr( $value ); ?>">
					<?php include $svg; ?>
					<input type="radio" name="thb_reaction_icon" id="thb-icon-<?php echo esc_attr( $value ); ?>" value="<?php echo esc_attr( $value ); ?>" />
					<span></span>
				</label>
			<?php } ?>
		</div>
	</div>
	<?php
}
add_action( 'thb-reactions_add_form_fields', 'thb_add_reaction_custom_fields' );

/**
 * Edit Reaction Custom Fields.
 */
function thb_edit_reaction_custom_fields( $tag, $taxonomy ) {
	$thb_reaction_icon = get_term_meta( $tag->term_id, 'thb_reaction_icon', true );
	$folder            = theissue_plugin()->get_plugin_path() . 'assets/svg/';
	$svgs              = glob( $folder . '?*.php' );
	?>
	<table class="form-table">
		<tbody>
			<tr class="form-field">
				<th scope="row"><label for="tag-icon" class="thb-main-label"><?php esc_html_e( 'Reaction Icon:', 'theissue' ); ?></label></th>
				<td>
					<div class="term-icon-wrap">
						<?php
						foreach ( $svgs as $svg ) {
							$value = rtrim( basename( $svg ), '.php' );
							?>
							<label class="thb-icon-wrap" for="thb-icon-<?php echo esc_attr( rtrim( basename( $svg ), '.php' ) ); ?>">
								<?php include $svg; ?>
								<input type="radio" name="thb_reaction_icon" id="thb-icon-<?php echo esc_attr( $value ); ?>" value="<?php echo esc_attr( $value ); ?>" <?php checked( $thb_reaction_icon, $value, true ); ?> />
								<span></span>
							</label>
						<?php } ?>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
}
add_action( 'thb-reactions_edit_form_fields', 'thb_edit_reaction_custom_fields', 10, 2 );

/**
 * Save Reaction Custom Fields.
 */
function thb_reaction_save_custom_form_fields( $term_id ) {
	$thb_reaction_icon = filter_input( INPUT_POST, 'thb_reaction_icon', FILTER_SANITIZE_STRING );
	update_term_meta( $term_id, 'thb_reaction_icon', $thb_reaction_icon );
}
add_action( 'create_thb-reactions', 'thb_reaction_save_custom_form_fields', 10, 2 );
add_action( 'edited_thb-reactions', 'thb_reaction_save_custom_form_fields', 10, 2 );

/**
 * Show Reaction Icon Column
 */
function thb_taxonomy_add_columns( $columns ) {
	$new_columns = array(
		'icon' => esc_html_x( 'Icon', 'taxonomy column name', 'theissue' ),
	);

	$columns = array_merge( $columns, $new_columns );

	return $columns;
}
add_filter( 'manage_edit-thb-reactions_columns', 'thb_taxonomy_add_columns' );
/**
 * Display custom columns content
 */
function thb_taxonomy_display_custom_columns_content( $content, $column_name, $term_id ) {
	$thb_reaction_icon = get_term_meta( $term_id, 'thb_reaction_icon', true );
	switch ( $column_name ) {
		case 'icon':
			ob_start();
			if ( $thb_reaction_icon ) {
				include theissue_plugin()->get_plugin_path() . 'assets/svg/' . $thb_reaction_icon . '.php';
			}
			$content = ob_get_clean();
			break;
	}
	return $content;
}

add_filter( 'manage_thb-reactions_custom_column', 'thb_taxonomy_display_custom_columns_content', 10, 3 );
