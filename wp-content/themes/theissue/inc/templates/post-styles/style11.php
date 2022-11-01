<?php
	$thb_title_size = get_query_var( 'thb_title_size' ) ? get_query_var( 'thb_title_size' ) : 'h3';

	$classes[] = 'post';
	$classes[] = 'style11';
	$classes[] = 'featured-style';
	$classes[] = 'center-contents';

	$thb_id = get_the_ID();
	$video_url = 'video' === get_post_format() ? get_post_meta($thb_id , 'post_video', true) : false;
	if (!wp_oembed_get($video_url) && $video_url !== '') {
		$video_url = 'mp4:'.$video_url;
	}
?>
<div <?php post_class( $classes ); ?>>
	<figure class="post-gallery thb-parallax" data-video="<?php echo esc_attr($video_url); ?>">
		<?php the_post_thumbnail( 'theissue-square-x2' ); ?>
	</figure>
	<div class="post-inner-content">
		<?php do_action( 'thb_categories' ); ?>
		<?php do_action( 'thb_displayTitle', $thb_title_size); ?>
		<?php do_action( 'thb_post_bottom', true ); ?>
	</div>
</div>