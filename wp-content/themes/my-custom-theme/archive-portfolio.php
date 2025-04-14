<?php get_header(); ?>

<h1>My Portfolio</h1>

<div class="portfolio-list">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="portfolio-item">
    <h2><?php the_title(); ?></h2>
    <?php if (has_post_thumbnail()) : ?>
        <div><?php the_post_thumbnail('medium'); ?></div>
        <?php endif; ?>
            <div><?php the_excerpt(); ?></div>
        </div>
    <?php endwhile; else : ?>
        <p>No portfolio items found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>