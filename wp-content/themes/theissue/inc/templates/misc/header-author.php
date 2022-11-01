<div class="row">
  <div class="small-12 columns">
    <div class="thb-author-page">
      <div class="row align-center">
        <div class="small-12 medium-8 columns">
          <div class="thb-author-info">
            <?php
	      $thb_id = $author;
	      $count  = count_user_posts( $thb_id );
            ?>
            <figure>
              <?php echo get_avatar( $thb_id , '232', '', '', array('class' => 'lazyload')); ?>
            </figure>
            <div class="thb-author-page-description">
              <h4><?php the_author_meta('display_name', $thb_id ); ?></h4>
              <p><?php the_author_meta('description', $thb_id ); ?></p>
            </div>
          </div>
          <div class="thb-author-page-meta">
            <span><?php echo esc_attr($count); ?> <?php esc_html_e( 'Articles Published', 'theissue' ); ?></span>
            <strong><?php esc_html_e( '|', 'theissue' ); ?></strong>
            <span><?php esc_html_e( 'Follow:', 'theissue' ); ?></span>
            <?php if ( get_the_author_meta('url', $thb_id ) != '') { ?>
              <a href="<?php echo esc_url(get_the_author_meta('url', $thb_id )); ?>" class="author-link"><i class="thb-icon-link"></i></a>
            <?php } ?>
            <?php if ( get_the_author_meta('twitter', $thb_id ) != '') { ?>
              <a href="<?php echo esc_url(get_the_author_meta('twitter', $thb_id )); ?>" class="author-link-twitter"><i class="thb-icon-twitter"></i></a>
            <?php } ?>
            <?php if ( get_the_author_meta('facebook', $thb_id ) != '') { ?>
              <a href="<?php echo esc_url(get_the_author_meta('facebook', $thb_id )); ?>" class="author-link-facebook"><i class="thb-icon-facebook"></i></a>
            <?php } ?>
            <?php if ( get_the_author_meta('instagram', $thb_id ) != '') { ?>
              <a href="<?php echo esc_url(get_the_author_meta('instagram', $thb_id )); ?>" class="author-link-instagram"><i class="thb-icon-instagram"></i></a>
            <?php } ?>
            <?php if ( get_the_author_meta('youtube', $thb_id ) != '') { ?>
              <a href="<?php echo esc_url(get_the_author_meta('youtube', $thb_id )); ?>" class="author-link-youtube"><i class="thb-icon-youtube"></i></a>
	    <?php } ?> 
	    <?php if ( get_the_author_meta('linkedin', $thb_id ) != '') { ?>
              <a href="<?php echo esc_url(get_the_author_meta('linkedin', $thb_id )); ?>" class="author-link-linkedin"><i class="thb-icon-linkedin"></i></a>
            <?php }  ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
