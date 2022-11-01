<?php
	$classes[] = 'post';
	$classes[] = 'thumbnail-style6';
?>
<div <?php post_class( $classes ); ?> data-id="<?php the_ID(); ?>">
	<figure class="post-gallery">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'theissue-thumbnail' ); ?>
		<div class="post-video-play">
		<?php get_template_part( 'assets/img/svg/video.svg' ); ?>
		</div>
		<span class="now-playing"><?php esc_html_e( 'Now Playing', 'theissue' ); ?></span>
	</a>
	</figure>
	<div class="thumbnail-style6-inner">
		<div class="post-title">
			<h6><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><span><?php the_title(); ?></span></a></h6>
		</div>
	</div>
</div>
