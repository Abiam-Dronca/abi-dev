<?php
/**
 * Begin processing our comments
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}

?>
<div class="row">
	<div class="small-12 columns">
		<section id="comments">
			<a class="comment-button" id="comment-toggle">
				<?php comments_number( esc_html__( 'View Comments (0)', 'theissue' ), esc_html__( 'View Comment (1)', 'theissue' ), esc_html__( 'View Comments (%)', 'theissue' ) ); ?>
			</a>
			<div class="row align-center">
				<div class="small-12 medium-10 large-8 columns">
					<!-- Start #comments -->
					<div class="comments-container">
						<?php if ( have_comments() ) : ?>
							<ul class="commentlist cf">
								<?php
								wp_list_comments(
									array(
										'type'        => 'comment',
										'style'       => 'ul',
										'short_ping'  => true,
										'avatar_size' => 172,
									)
								);
								?>
							</ul>

							<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
								<div class="navigation">
									<div class="nav-previous"><?php previous_comments_link(); ?></div>
									<div class="nav-next"><?php next_comments_link(); ?></div>
								</div><!-- .navigation -->
							<?php } ?>

							<?php
							else :
								if ( ! comments_open() ) :
									?>
								<p class="nocomments"><?php esc_html_e( 'Comments are closed', 'theissue' ); ?></p>"
							<?php endif; /* end */ ?>

						<?php endif; /* end */ ?>
						<?php
							/* Comment Form */
							$commenter = wp_get_current_commenter();
							$req       = get_option( 'require_name_email' );
							$aria_req  = ( $req ? ' aria-required="true" data-required="true"' : '' );

							$defaults = array(
								'fields'               => apply_filters(
									'comment_form_default_fields',
									array(

										'author' => '<div class="row"><div class="small-12 medium-6 large-4 columns"><label>' . esc_html__( 'Name', 'theissue' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__( 'Name', 'theissue' ) . '" class="full"/></div>',

										'email'  => '<div class="small-12 medium-6 large-4 columns"><label>' . esc_html__( 'E-mail', 'theissue' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__( 'E-mail', 'theissue' ) . '" class="full" /></div>',

										'url'    => '<div class="small-12 medium-12 large-4 columns"><label>' . esc_html__(
											'Website',
											'theissue'
										) . '</label><input name="url" size="30" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" type="text" placeholder="' . esc_attr__(
											'Website',
											'theissue'
										) . '" class="full"/></div></div>',
									)
								),
								'comment_field'        => '<div class="row"><div class="small-12 columns"><textarea name="comment" id="comment"' . $aria_req . ' rows="3" cols="58" class="full" placeholder="' . esc_attr__( 'Your Comment', 'theissue' ) . '"></textarea></div></div>',
								'must_log_in'          => '<p class="must-log-in">' . sprintf(
									wp_kses(
										__( 'You must be <a href="%s">logged in</a> to post a comment.', 'theissue' ),
										array(
											'a' => array(
												'href'  => array(),
												'title' => array(),
											),
										)
									),
									wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
								) . '</p>',

								'logged_in_as'         => '<p class="logged-in-as">' . sprintf(
									wp_kses(
										__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'theissue' ),
										array(
											'a' => array(
												'href'  => array(),
												'title' => array(),
											),
										)
									),
									admin_url( 'profile.php' ),
									$user_identity,
									wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
								) . '</p>',

								'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.', 'theissue' ) . '</p>',
								'comment_notes_after'  => '',
								'id_form'              => 'form-comment',
								'id_submit'            => 'submit',
								'title_reply'          => esc_html__( 'Leave a Reply', 'theissue' ),
								'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'theissue' ),
								'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
								'title_reply_after'    => '</h4>',
								'cancel_reply_link'    => esc_attr__( 'Cancel reply', 'theissue' ),
								'class_submit'         => 'submit btn full large',
								'label_submit'         => esc_attr__( 'Submit Comment', 'theissue' ),
							);
							comment_form( $defaults );
							?>
					</div> <!-- .comments-container -->
				</div>
			</div> <!-- .row -->
		</section>
	</div>
</div> <!-- .row -->
