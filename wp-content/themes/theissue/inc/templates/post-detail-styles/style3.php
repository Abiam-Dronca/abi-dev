<div class="post-detail-row has-article-padding">
	<div class="row">
		<div class="small-12 columns">
			<?php do_action( 'thb_before_article' ); ?>
		<article itemscope itemtype="http://schema.org/Article" <?php post_class( 'post post-detail post-detail-style3 post-white-title' ); ?> id="post-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">
				<?php do_action( 'thb_article_start' ); ?>
				<div class="post-over-title-container with-offset with-shadow">
					<div class="post-title-container">
					<?php do_action( 'thb_categories', true ); ?>
						<header class="post-title entry-header">
							<h1 class="entry-title" itemprop="headline">
							<?php if ( wp_doing_ajax() ) { ?>
								<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
							<?php } else { ?>
								<?php the_title(); ?>
							<?php } ?>
							</h1>
						</header>
					<?php do_action( 'thb_article_after_h1' ); ?>
					</div>
					<?php do_action( 'thb_article_featured_image', 'theissue-full-x2' ); ?>
				</div>
				<?php do_action( 'thb_after_article_title' ); ?>
				<div class="article-container">
					<div class="post-content-wrapper">
						<div class="thb-post-share-container">
							<?php do_action( 'thb_fixed_container' ); ?>
							<div class="post-content-container">
								<?php do_action( 'thb_ads_before_content' ); ?>
								<div class="post-content entry-content" itemprop="articleBody">
									<?php do_action( 'thb_before_article_content' ); ?>
									<?php the_content(); ?>
									<?php do_action( 'thb_after_article_content' ); ?>
									<?php get_template_part( 'inc/templates/post-detail-bits/readmore' ); ?>
									<?php get_template_part( 'inc/templates/post-detail-bits/source' ); ?>
								</div>
								<?php do_action( 'thb_ads_after_content' ); ?>
								<?php get_template_part( 'inc/templates/post-detail-bits/reviews' ); ?>
								<?php
								if ( ot_get_option( 'article_subscribe', 'on' ) === 'on' ) {
									get_template_part( 'inc/templates/post-detail-bits/subscribe' ); }
								?>
								<?php get_template_part( 'inc/templates/post-detail-bits/tags' ); ?>
								<?php get_template_part( 'inc/templates/post-detail-bits/reactions' ); ?>
								<?php get_template_part( 'inc/templates/post-detail-bits/author' ); ?>
								<?php do_action( 'thb_article_end' ); ?>
							</div>
						</div>
					</div>
					<aside class="sidebar">
						<?php
						if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {
							echo '<p class="thb-newsletter-warning-text">' . esc_html__( 'Administrators Only: This widget area can be edited from Appearance > Widgets > Article Sidebars.', 'theissue' ) . '</p>';
						}
						if ( wp_doing_ajax() ) {
							dynamic_sidebar( 'single-ajax' );
						} else {
							dynamic_sidebar( 'single' ); }
						?>
					</aside>
				</div>
		</article>
			<?php do_action( 'thb_after_article' ); ?>
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
endif;
			?>
			<?php get_template_part( 'inc/templates/post-detail-bits/related' ); ?>
	</div>
	</div>
	<?php
	if ( wp_doing_ajax() ) {
		do_action( 'thb_ads_after_article_ajax' );
	} else {
		do_action( 'thb_ads_after_article' ); }
	?>
</div>
