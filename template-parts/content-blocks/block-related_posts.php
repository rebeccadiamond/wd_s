<?php
/**
 * The template used for displaying related posts.
 *
 * @package _s
 */

// Set up fields.
$title = get_sub_field( 'title' );
$related_posts = get_sub_field( 'related_posts' );
$animation_class = _s_get_animation_class();

// Display section if we have any posts.
if ( $related_posts ) :

	// Start a <container> with possible block options.
	_s_display_block_options(
		array(
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block container related-posts', // Container class.
		)
	);

	?>

	<div class="row <?php echo esc_attr( $animation_class ) ?>">

		<?php if ( $title ) : ?>
		<h2 class="content-block-title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<?php
		// Loop through recent posts.
		foreach ( $related_posts as $key => $post ) :

			// Convert post object to post data.
			setup_postdata( $post );

			// Display a card.
			_s_display_card( array(
					'title' => get_the_title(),
					'image' => _s_get_post_image_url( 'medium' ),
					'text'  => _s_get_the_excerpt( array(
							'length' => 20,
							'more'   => '...',
						)
					),
					'url'   => get_the_permalink(),
					'class' => 'col col-m-6 col-l-4',
				)
			);
		endforeach;
		wp_reset_postdata();
	?>
	</div><!-- .row -->
</section><!-- .recent-posts -->
<?php endif; ?>
