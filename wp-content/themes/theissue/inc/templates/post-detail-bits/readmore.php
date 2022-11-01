<?php
$thb_id        = get_queried_object_id();
$post_readmore = get_post_meta( $thb_id, 'post_readmore', true );

if ( ! $post_readmore || '' === $post_readmore ) {
	return;
}
$args = array(
	'ignore_sticky_posts' => 1,
	'post_type'           => 'post',
	'post__in'            => $post_readmore,
);

$readmoreloop = new WP_Query( $args );

?>
<?php
if ( $readmoreloop->have_posts() ) {
	?>
	<aside class="thb-readmore">
		<div class="thb-readmore-title"><?php esc_html_e( 'Read More', 'theissue' ); ?></div>
		<?php
		while ( $readmoreloop->have_posts() ) :
			$readmoreloop->the_post();
			?>
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<?php
		endwhile;
		?>
	</aside>
	<?php
}
wp_reset_query();
