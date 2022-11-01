<div class="post-detail-row has-article-padding">
	<div class="article-container">
		<?php do_action( 'thb_before_article' ); ?>
	<article itemscope itemtype="http://schema.org/Article" <?php post_class( 'post post-detail post-detail-style6' ); ?> id="post-<?php the_ID(); ?>" data-id="<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">
			<?php do_action( 'thb_article_start' ); ?>
		<div class="row align-center">
		<div class="small-12 columns">
			<div class="post-split-title-container with-offset">
			<div class="row no-padding">
				<div class="small-12 large-6 columns post-title-column">
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
				</div>
				<div class="small-12 large-6 columns">
				<?php do_action( 'thb_article_featured_image', 'theissue-square-x3' ); ?>
				</div>
			</div>
			</div>
		</div>
			</div>
			<?php do_action( 'thb_after_article_title' ); ?>
		<div class="row">
		<div class="small-12 columns">
			<div class="post-share-center-container">
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
		</div>
		</div>
	</article>
	</div>
	<div class="row">
		<div class="small-12 columns">
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
