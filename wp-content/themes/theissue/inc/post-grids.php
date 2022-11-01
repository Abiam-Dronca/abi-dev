<?php
/* Display Post Grid Layouts */
function thb_DisplayPostGrid( $style, $columns, $excerpts, $featured_index, $i, $post_count = 0 ) {
	$featured_index = empty( $featured_index ) ? array() : explode( ',', $featured_index );
	$col            = thb_translate_columns( $columns );
	?>
	<?php if ( $style === 'style1-center' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_title_size', 'h4' ); ?>
			<?php set_query_var( 'thb_excerpt', $excerpts ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style1-center' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style1-left' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_excerpt', $excerpts ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style1' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style2' ) { ?>
		<?php if ( in_array( $i, $featured_index ) ) { ?>
			<?php get_template_part( 'inc/templates/post-styles/style11' ); ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/templates/post-styles/style3' ); ?>
		<?php } ?>
	<?php } ?>
	<?php if ( $style === 'style3' ) { ?>
		<?php if ( $i === 1 ) { ?>
			<div class="small-12 columns">
				<?php get_template_part( 'inc/templates/post-styles/style8' ); ?>
			</div>
		<?php } else { ?>
			<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
				<?php get_template_part( 'inc/templates/post-styles/style7' ); ?>
			</div>
		<?php } ?>
	<?php } ?>
	<?php if ( $style === 'style4' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/style12' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style5' ) { ?>
		<?php get_template_part( 'inc/templates/post-styles/style10' ); ?>
	<?php } ?>
	<?php if ( $style === 'style6' ) { ?>
		<?php set_query_var( 'thb_i', $i ); ?>
		<?php if ( $i == 1 ) { ?>
			<div class="small-12 medium-6 columns">
		<?php } ?>
		<?php if ( $i == ceil( $post_count / 2 ) + 1 ) { ?>
			</div>
			<div class="small-12 medium-6 columns">
		<?php } ?>
			<?php get_template_part( 'inc/templates/post-styles/thumbnail/style2' ); ?>
		<?php if ( $i == $post_count ) { ?>
			</div>
		<?php } ?>
	<?php } ?>
	<?php if ( $style === 'style7' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/thumbnail/style5' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style8' ) { ?>
		<?php if ( in_array( $i, $featured_index ) ) { ?>
			<?php get_template_part( 'inc/templates/post-styles/style11' ); ?>
		<?php } else { ?>
			<?php get_template_part( 'inc/templates/post-styles/style3-excerpt' ); ?>
		<?php } ?>
	<?php } ?>
	<?php if ( $style === 'style9' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/style4' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style10' ) { ?>
		<?php set_query_var( 'thb_extra_class', 'center-contents' ); ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_title_size', 'h4' ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style13' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style11' ) { ?>
		<?php set_query_var( 'thb_extra_class', 'center-contents' ); ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/style6-border' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style12' ) { ?>
		<div class="small-6 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/style14' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style13' ) { ?>
		<?php get_template_part( 'inc/templates/post-styles/style3-tall' ); ?>
	<?php } ?>
	<?php if ( $style === 'style14' ) { ?>
		<?php set_query_var( 'thb_extra_class', 'center-contents' ); ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/style6-border-shadow' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style15' ) { ?>
		<?php get_template_part( 'inc/templates/post-styles/style16' ); ?>
	<?php } ?>
	<?php if ( $style === 'style16' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php get_template_part( 'inc/templates/post-styles/thumbnail/style7' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style17' ) { ?>
		<?php get_template_part( 'inc/templates/post-styles/style17' ); ?>
	<?php } ?>
	<?php if ( $style === 'style18' ) { ?>
		<?php get_template_part( 'inc/templates/post-styles/style19' ); ?>
	<?php } ?>
	<?php if ( $style === 'style19' ) { ?>
		<?php if ( in_array( $i, $featured_index ) ) { ?>
			<?php get_template_part( 'inc/templates/post-styles/style11' ); ?>
		<?php } else { ?>
			<?php set_query_var( 'thb_excerpt', $excerpts ); ?>
			<?php set_query_var( 'thb_image_size', 'theissue-square-x2' ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style3-small' ); ?>
		<?php } ?>
	<?php } ?>
	<?php if ( $style === 'style20' ) { ?>
		<div class="small-6 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_title_size', 'h6' ); ?>
			<?php set_query_var( 'thb_i', $i ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style1-nocat' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style21' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_excerpt', $excerpts ); ?>
			<?php set_query_var( 'thb_title_size', 'h6' ); ?>
			<?php set_query_var( 'thb_image_size', 'theissue-rectangle-x2' ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style1' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style22' ) { ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_excerpt', $excerpts ); ?>
			<?php set_query_var( 'thb_title_size', 'h5' ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style1-noimg' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style23' ) { ?>
		<?php if ( $i === 1 ) { ?>
			<div class="small-12 columns">
				<?php set_query_var( 'thb_title_size', 'h3' ); ?>
				<?php set_query_var( 'thb_image_size', 'theissue-rectangle-x2' ); ?>
				<?php set_query_var( 'thb_excerpt_length', 'thb_mid_excerpt_length' ); ?>
				<?php get_template_part( 'inc/templates/post-styles/style19' ); ?>
			</div>
		<?php } else { ?>
			<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
				<?php set_query_var( 'thb_excerpt', $excerpts ); ?>
				<?php set_query_var( 'thb_title_size', 'h4' ); ?>
				<?php set_query_var( 'thb_image_size', 'theissue-squaresmall-x2' ); ?>
				<?php set_query_var( 'thb_excerpt_length', 'thb_short_excerpt_length' ); ?>
				<?php get_template_part( 'inc/templates/post-styles/style1' ); ?>
			</div>
		<?php } ?>
	<?php } ?>
	<?php if ( $style === 'style24' ) { ?>
		<?php set_query_var( 'thb_extra_class', 'center-bottom-contents' ); ?>
		<div class="small-12 <?php echo esc_attr( $col ); ?> columns">
			<?php set_query_var( 'thb_title_size', 'h4' ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style13' ); ?>
		</div>
	<?php } ?>
	<?php if ( $style === 'style25' ) { ?>
		<?php if ( in_array( $i, $featured_index ) ) { ?>
			<?php get_template_part( 'inc/templates/post-styles/style11' ); ?>
		<?php } else { ?>
			<?php set_query_var( 'thb_image_size', 'theissue-rectangle-x2' ); ?>
			<?php set_query_var( 'thb_title_size', 'h3' ); ?>
			<?php get_template_part( 'inc/templates/post-styles/style3' ); ?>
		<?php } ?>
	<?php } ?>
	<?php
}
