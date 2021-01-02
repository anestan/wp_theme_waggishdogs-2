<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores_tailwind
 */

get_header();
	
		
?>

	<main id="primary" class="site-main w-full max-w-3xl mx-auto px-5 flex-1">

		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'underscores_tailwind' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'underscores_tailwind' ) . '</span> <span class="nav-title">%title</span>',
					'screen_reader_text' => 'Continue reading: ',
					'class' => 'tw-apply-post-navigation'
				)
			);

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
