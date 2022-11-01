<?php
function thb_roundUpToAny( $n, $x = 5 ) {
	return intval( ( ceil( $n ) % $x === 0 ) ? ceil( $n ) : round( ( $n + $x / 2 ) / $x ) * $x );
}

/* Display Block Grid Layouts */
function thb_DisplayBlockGrid( $style, $posts, $ppp ) {
	$counts   = false;
	$postmeta = false;
	global $post;
	for ( $i = 1; $i <= $ppp; $i++ ) {

		$the_post = isset( $posts[ $i - 1 ] ) ? $posts[ $i - 1 ] : false;

		?>
		<?php if ( $style == 'style1' ) { ?>
			<?php
			if ( $i === 1 ) {
				echo '<div class="row"><div class="small-12 large-3 columns">';
			}
			if ( in_array( $i, array( 1, 2 ) ) ) {
				if ( $the_post ) {
					$post = get_post( $the_post );
					setup_postdata( $the_post );
					get_template_part( 'inc/templates/post-styles/style1-center' );
				} else {
					get_template_part( 'inc/templates/post-styles/placeholder' );
				}
			}

			if ( $i === 3 ) {
				echo '</div>';
				echo '<div class="small-12 large-6 columns">';
				if ( $the_post ) {
					$post = get_post( $the_post );
					setup_postdata( $the_post );
					set_query_var( 'thb_excerpt', true );
					set_query_var( 'thb_title_size', 'h2' );
					set_query_var( 'thb_excerpt_length', 'thb_short_excerpt_length' );
					get_template_part( 'inc/templates/post-styles/style1-center' );
					set_query_var( 'thb_excerpt', false );
					set_query_var( 'thb_title_size', '' );
				} else {
					get_template_part( 'inc/templates/post-styles/placeholder' );
				}
				echo '</div><div class="small-12 large-3 columns">';
			}

			if ( in_array( $i, array( 4, 5 ) ) ) {
				if ( $the_post ) {
					$post = get_post( $the_post );
					setup_postdata( $the_post );
					get_template_part( 'inc/templates/post-styles/style1-center' );
				} else {
					get_template_part( 'inc/templates/post-styles/placeholder' );
				}
			}
			if ( $i === 5 ) {
				echo '</div></div>';
			}
			?>
	<?php } elseif ( $style == 'style2' ) { ?>
			<?php
			if ( $i === 1 ) {
				echo '<div class="row">';
			}
			if ( in_array( $i, array( 1, 2 ) ) ) {
				echo '<div class="small-12 large-6 columns">';
				if ( $the_post ) {
					$post = get_post( $the_post );
					setup_postdata( $the_post );
					set_query_var( 'thb_image_size', 'theissue-rectangle-x3' );
					get_template_part( 'inc/templates/post-styles/style1-center' );
				} else {
					get_template_part( 'inc/templates/post-styles/placeholder' );
				}
				echo '</div>';
			}
			if ( $i === 2 ) {
				echo '</div><div class="row">';
			}
			if ( in_array( $i, array( 3, 4, 5, 6 ) ) ) {
				echo '<div class="small-6 large-3 columns">';
				if ( $the_post ) {
					$post = get_post( $the_post );
					setup_postdata( $the_post );
					set_query_var( 'thb_image_size', 'theissue-squaresmall-x2' );
					get_template_part( 'inc/templates/post-styles/style1-center' );
				} else {
					get_template_part( 'inc/templates/post-styles/placeholder' );
				}
				echo '</div>';
			}
			if ( $i === 6 ) {
				echo '</div>';
			}
			?>
	<?php } elseif ( $style == 'style3' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row">';
		}
		if ( $i === 1 ) {
			echo '<div class="small-12 large-8 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_title_size', 'h1' );
				set_query_var( 'thb_image_size', 'theissue-rectangle-x3' );
				get_template_part( 'inc/templates/post-styles/style1-center' );
				set_query_var( 'thb_excerpt', false );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 2 ) {
			echo '<div class="small-12 large-4 columns">';
		}
		if ( in_array( $i, array( 2, 3 ) ) ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_image_size', 'theissue-rectangle-x2' );
				get_template_part( 'inc/templates/post-styles/style1-center' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 3 ) {
			echo '</div></div>';
		}
		?>
	<?php } elseif ( $style == 'style4' ) { ?>
		<?php
		if ( $i === 1 ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/style5' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 2 ) {
			echo '<div class="row">';
		}
		if ( in_array( $i, array( 2, 3, 4, 5 ) ) ) {
			echo '<div class="small-6 large-3 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/style2' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 5 ) {
			echo '</div>';
		}
		?>
	<?php } elseif ( $style == 'style5' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row first-row regular-padding">';
		}
		if ( $i === 1 ) {
			echo '<div class="small-12 large-8 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_image_size', 'theissue-square-x3' );
				set_query_var( 'thb_title_size', 'h3' );
				get_template_part( 'inc/templates/post-styles/style12' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 2 ) {
			echo '<div class="small-12 large-4 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_image_size', 'theissue-square-x3' );
				set_query_var( 'thb_title_size', 'h4' );
				get_template_part( 'inc/templates/post-styles/style12' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div></div>';
		}
		if ( $i === 3 ) {
			echo '<div class="row second-row regular-padding">';
		}
		if ( in_array( $i, array( 3, 4, 5 ) ) ) {
			echo '<div class="small-12 large-4 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/style12' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 5 ) {
			echo '</div>';
		}
		?>
	<?php } elseif ( $style == 'style6' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row">';
		}
		if ( $i === 1 ) {
			echo '<div class="small-12 large-6 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_image_size', 'theissue-squaresmall-x2' );
				set_query_var( 'thb_title_size', 'h4' );
				get_template_part( 'inc/templates/post-styles/style1' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 2 ) {
			echo '<div class="small-12 large-6 columns">';
		}
		if ( in_array( $i, array( 2, 3, 4, 5 ) ) ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/thumbnail/style4' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 5 ) {
			echo '</div></div>';
		}
		?>
	<?php } elseif ( $style == 'style7' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row">';
		}
		if ( $i === 1 ) {
			echo '<div class="small-12 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/style11' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( in_array( $i, array( 2, 3 ) ) ) {
			echo '<div class="small-12 medium-6 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_title_size', 'h4' );
				get_template_part( 'inc/templates/post-styles/style11' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 3 ) {
			echo '</div>';
		}
		?>
	<?php } elseif ( $style == 'style8' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row align-middle">';
		}
		if ( in_array( $i, array( 1, 3 ) ) ) {
			echo '<div class="small-12 medium-3 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_title_size', 'h4' );
				get_template_part( 'inc/templates/post-styles/style1' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 2 ) {
			echo '<div class="small-12 medium-6 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_title_size', 'h1' );
				get_template_part( 'inc/templates/post-styles/style1-center' );

			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 3 ) {
			echo '</div>';
		}

		?>
	<?php } elseif ( $style == 'style9' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row">';
		}
		if ( $i === 1 ) {
			echo '<div class="small-12 medium-8 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_title_size', 'h4' );
				get_template_part( 'inc/templates/post-styles/style18' );
				set_query_var( 'thb_excerpt', false );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 2 ) {
			echo '<div class="small-12 medium-4 columns">';
		}
		if ( in_array( $i, array( 2, 3 ) ) ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_title_size', 'h6' );
				get_template_part( 'inc/templates/post-styles/style18' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 3 ) {
			echo '</div></div>';
		}
		?>
	<?php } elseif ( $style == 'style10' ) { ?>
		<?php
		if ( $i === 1 ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', false );
				set_query_var( 'thb_image_size', 'theissue-rectangle-x2' );
				set_query_var( 'thb_title_size', 'h3' );
				get_template_part( 'inc/templates/post-styles/style1-center' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 2 ) {
			echo '<div class="row">';

		}
		if ( in_array( $i, array( 2, 3, 4, 5, 6, 7 ) ) ) {
			echo '<div class="small-12 large-6 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/thumbnail/style4' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 7 ) {
			echo '</div>';
		}
		?>
	<?php } elseif ( $style == 'style11' ) { ?>
		<?php
		if ( $i === 1 ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/style5-white' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 2 ) {
			echo '<div class="row">';
		}
		if ( in_array( $i, array( 2, 3, 4, 5 ) ) ) {
			echo '<div class="small-6 large-3 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/style2-small' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( $i === 5 ) {
			echo '</div>';
		}
		?>
	<?php } elseif ( $style == 'style12' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row">';
		}
		if ( $i === 1 ) {
			echo '<div class="small-12 large-6 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_excerpt_length', 'thb_short_excerpt_length' );
				set_query_var( 'thb_image_size', 'theissue-squaresmall-x2' );
				set_query_var( 'thb_title_size', 'h3' );
				get_template_part( 'inc/templates/post-styles/style1' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div>';
		}
		if ( in_array( $i, array( 2, 4 ) ) ) {
			echo '<div class="small-6 large-3 columns">';
		}
		if ( in_array( $i, array( 2, 3, 4, 5 ) ) ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', false );
				set_query_var( 'thb_image_size', 'theissue-rectangle-x2' );
				set_query_var( 'thb_title_size', 'h6' );
				get_template_part( 'inc/templates/post-styles/style1' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( in_array( $i, array( 3, 5 ) ) ) {
			echo '</div>';
		}
		if ( $i === 5 ) {
			echo '</div>';
		}
		?>
	<?php } elseif ( $style == 'style13' ) { ?>
		<?php
		if ( $i === 1 ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_excerpt_length', 'thb_mid_excerpt_length' );
				set_query_var( 'thb_image_size', 'theissue-rectangle-x2' );
				set_query_var( 'thb_title_size', 'h3' );
				get_template_part( 'inc/templates/post-styles/style1' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 1 ) {
			echo '<ul class="thb-blockgrid-style13-posts">';
		}
		if ( in_array( $i, array( 2, 3, 4, 5, 6, 7, 8, 9, 10 ) ) ) {

			if ( $the_post ) {
				echo '<li>';
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/misc/just-title' );
				echo '</li>';
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 10 ) {
			echo '</ul>';
		}
		?>
	<?php } elseif ( $style == 'style14' ) { ?>
		<?php
		if ( $i === 1 ) {
			echo '<div class="row"><div class="small-12 large-3 columns">';
		}
		if ( in_array( $i, array( 1, 2 ) ) ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_image_size', 'theissue-rectangle-x2' );
				get_template_part( 'inc/templates/post-styles/style1' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 3 ) {
			echo '</div>';
			echo '<div class="small-12 large-6 columns">';
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				set_query_var( 'thb_excerpt', true );
				set_query_var( 'thb_title_size', 'h2' );
				set_query_var( 'thb_excerpt_length', 'thb_short_excerpt_length' );
				set_query_var( 'thb_image_size', 'theissue-squaresmall-x2' );
				get_template_part( 'inc/templates/post-styles/style1-center' );
				set_query_var( 'thb_excerpt', false );
				set_query_var( 'thb_title_size', '' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
			echo '</div><div class="small-12 large-3 columns">';
		}

		if ( in_array( $i, array( 4, 5, 6, 7, 8 ) ) ) {
			if ( $the_post ) {
				$post = get_post( $the_post );
				setup_postdata( $the_post );
				get_template_part( 'inc/templates/post-styles/thumbnail/style4' );
			} else {
				get_template_part( 'inc/templates/post-styles/placeholder' );
			}
		}
		if ( $i === 8 ) {
			echo '</div></div>';
		}
		?>
	<?php } ?>
		<?php
		set_query_var( 'thb_image_size', false );
		set_query_var( 'thb_title_size', false );
		set_query_var( 'thb_excerpt', false );
		set_query_var( 'thb_excerpt_length', false );
	} // End for loop
}
