<?php
namespace Codexpert\ThumbPress;
use Codexpert\ThumbPress\Helper;

$image_sizes 	= Helper::default_image_sizes();
$selected_sizes = Helper::get_option( 'prevent_image_sizes', 'disables', [] );

echo '
<div class="step-two">
<h1 class="disable-thumbnails">' . __( 'Save Your Space Now 🥳', 'image-sizes' ) . '</h1>
<p class="cx-wizard-sub">
	 ' . __( 'By default, WordPress generates these 4 image sizes- <span class= "thumb_size_italic">Thumbnail, Medium, Medium-large, Large.</span> Disable the ones which you don’t need. Also, you can disable the additional image sizes using the toggles below - ', 'image-sizes' ) . '
</p>

<table class="form-table" id="image_sizes-form-table">
	<thead>
		<tr>
			<th>' . __( 'Disable Thumbnail', 'image-sizes' ) . '</th>
			<th>' . __( 'Name', 'image-sizes' ) . '</th>
			<th>' . __( 'Type', 'image-sizes' ) . '</th>
			<th>' . __( 'Dimension (px)', 'image-sizes' ) . '</th>
		</tr>
	</thead>
	<tbody>
		<tr id="row-main-file">
			<td class="image_sizes-switch-col">
				<label class="image_sizes-switch">
				  <input type="checkbox" class="image_sizes-switch-checkbox" disabled>
				  <span class="image_sizes-slider round"></span>
				</label>
			</td>
			<td>' . __( 'Original Image', 'image-sizes' ) . '</td>
			<td>' . __( 'original', 'image-sizes' ) . '</td>
			<td>' . __( 'auto', 'image-sizes' ) . '</td>
		</tr>
';

foreach ( $image_sizes as $id => $size ) {
	$_checked = in_array( $id, $selected_sizes ) ? 'checked' : '';
	echo "
		<tr id='row-". esc_attr( $id ) ."'>
			<td class='image_sizes-switch-col'>
				<label class='image_sizes-switch'>
				  <input type='checkbox' class='checkbox check-this check-". esc_attr( $size['type'] ) ." image_sizes-switch-checkbox' name='disables[]' value='". esc_attr( $id ) ."' ". esc_attr( $_checked ) .">
				  <span class='image_sizes-slider round'></span>
				</label>
			</td>
			<td>". esc_html( $id ) ."</td>
			<td>". esc_html( $size['type'] ) ."</td>
			<td>". esc_html( $size['width'] ).'x'.esc_html( $size['height'] ) ."</td>
		</tr>";
}

echo '
	</tbody>
</table>
';
