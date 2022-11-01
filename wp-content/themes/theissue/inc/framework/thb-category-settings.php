<?php

if ( ! is_admin() ) {
	return;
}

/**
 * Edit category fields
 */

function thb_edit_category_vars( $term, $taxonomy ) {
	wp_enqueue_media();
	$image            = absint( get_term_meta( $term->term_id, 'thb_cat_header_id', true ) );
	$selected_layout  = get_term_meta( $term->term_id, 'thb_cat_layout', true );
	$selected_sidebar = get_term_meta( $term->term_id, 'thb_cat_sidebar', true );
	$archive_layouts  = thb_get_archive_layouts();

	?>
	<tr class="form-field">
		<th colspan="2"><h2><?php esc_html_e( 'The Issue Settings', 'theissue' ); ?></h2></th>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category Image', 'theissue' ); ?></label></th>
		<td>
			<div class="thb-upload-image-field">
				<div class="thb-image-holder">
					<?php
					if ( ! empty( $image ) ) {
						echo wp_get_attachment_image( $image, 'thumbnail' );
					}
					?>
				</div>

				<input type="hidden" class="thb-image-id" id="thb_cat_header_id" name="thb_cat_header_id" value="<?php echo esc_attr( $image ); ?>" />
				<a class="thb-upload-image button"><?php esc_html_e( 'Upload/Add image', 'theissue' ); ?></a>
				<a class="thb-remove-image button"><?php esc_html_e( 'Remove image', 'theissue' ); ?></a>
			</div>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category Sidebar', 'theissue' ); ?></label></th>
		<td>
			<select name="thb_cat_sidebar">
				<?php
					global $wp_registered_sidebars;
				?>
				<option value=""><?php esc_html_e( 'Default', 'theissue' ); ?></option>
				<?php foreach ( $wp_registered_sidebars as $sidebar ) { ?>
					<option value="<?php echo esc_attr( $sidebar['id'] ); ?>" <?php selected( $selected_sidebar, $sidebar['id'], true ); ?>><?php echo esc_attr( $sidebar['id'] ); ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Category Layout', 'theissue' ); ?></label></th>
		<td>
			<div class="thb-radio-images">
				<div class="thb-radio-image">
					<label for="thb-radio-image-default">
						<img src="<?php echo esc_url( Thb_Theme_Admin::$thb_theme_directory_uri . '/assets/img/admin/archives/style00.png' ); ?>" alt="Default" class="thb-radio-image-img"/>
						<input type="radio" name="thb_cat_layout" id="thb-radio-image-default" value="" <?php checked( '', $selected_layout, true ); ?> />
						<span></span>
					</label>
				</div>
				<?php foreach ( $archive_layouts as $layout ) { ?>
					<div class="thb-radio-image">
						<label for="thb-radio-image-<?php echo esc_attr( $layout['value'] ); ?>">
							<img src="<?php echo esc_url( $layout['src'] ); ?>" alt="<?php echo esc_attr( $layout['label'] ); ?>" class="thb-radio-image-img"/>
							<input type="radio" name="thb_cat_layout" id="thb-radio-image-<?php echo esc_attr( $layout['value'] ); ?>" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $layout['value'], $selected_layout, true ); ?> />
							<span></span>
						</label>
					</div>
				<?php } ?>
			</div>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'thb_edit_category_vars', 20, 2 );


/**
 * Save Category Variables
 */

function thb_category_var_save( $term_id ) {
	$thb_cat_header_id = filter_input( INPUT_POST, 'thb_cat_header_id', FILTER_VALIDATE_INT );
	$thb_cat_layout    = filter_input( INPUT_POST, 'thb_cat_layout', FILTER_SANITIZE_STRING );
	$thb_cat_sidebar   = filter_input( INPUT_POST, 'thb_cat_sidebar', FILTER_SANITIZE_STRING );
	if ( isset( $thb_cat_header_id ) ) {
		update_term_meta( $term_id, 'thb_cat_header_id', absint( $thb_cat_header_id ) );
	}
	if ( isset( $thb_cat_layout ) ) {
		update_term_meta( $term_id, 'thb_cat_layout', $thb_cat_layout );
	}
	if ( isset( $thb_cat_sidebar ) ) {
		update_term_meta( $term_id, 'thb_cat_sidebar', $thb_cat_sidebar );
	}
}

add_action( 'created_term', 'thb_category_var_save', 10, 3 );
add_action( 'edit_category', 'thb_category_var_save', 10, 3 );


/**
 * Header column added to category admin.
 */

function thb_cat_header_columns( $columns ) {
	$new_columns = array(
		'image' => esc_html__( 'Image', 'theissue' ),
	);

	$columns = array_merge( $columns, $new_columns );

	return $columns;

}

add_filter( 'manage_edit-category_columns', 'thb_cat_header_columns' );


/**
 * Thumbnail column value added to category admin.
 */

function thb_cat_header_column( $columns, $column, $id ) {

	if ( 'image' === $column ) {

		$image     = '';
		$header_id = get_term_meta( $id, 'thb_cat_header_id', true );

		if ( $header_id ) {
			$image    = wp_get_attachment_image_url( $header_id, 'thumbnail' );
			$columns .= '<img src="' . esc_url( $image ) . '" alt="Thumbnail" class="wp-post-image" height="40" width="40" />';
		}
	}

	return $columns;
}

add_filter( 'manage_category_custom_column', 'thb_cat_header_column', 10, 3 );
